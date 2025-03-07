<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roleName = auth()->user()->roles->first()->name;

         if ($roleName == 'admin') {
            $users = User::with('roles')->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['admin', 'super admin']);
            })->get();
        } else {
            $users = User::with('roles')->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'super admin');
            })->get();
        }



        return view('adminsuper.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if_forbidden('user.add');

        $roles = Role::where('name', '!=', 'super admin')->get();

        return view('adminsuper.users.add', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if_forbidden('user.add');

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->get('password')),
        ]);


        $user->assignRole($request->get('roles'));


        return redirect()->route('users.index')->with('success', __('messages.success_user_add'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_if((!auth()->user()->can('user.edit') && auth()->id() != $id), 403);

        $user = User::find($id);

        if ($user->hasRole('super admin') && !auth()->user()->hasRole('super admin')) {
            message_set("У вас нет разрешения на редактирование администратора", 'error', 5);
            return redirect()->back();
        }

        $roles = Role::where('name', '!=', 'super admin')->get();

        return view('adminsuper.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort_if((!auth()->user()->can('user.edit') && auth()->id() != $id), 403);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:users,login,' . $id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($id);

        if ($request->get('password') != null) {
            $user->password = Hash::make($request->get('password'));
        }

        unset($request['password']);


        $user->fill($request->all());
        $user->save();

        if (isset($request->roles)) $user->syncRoles($request->get('roles'));
        unset($user->roles);


        if (auth()->user()->can('user.edit'))
            return redirect()->route('users.index')->with('success', __('messages.success_user_edit'));
        else
            return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort_if_forbidden('user.delete');

        $user = User::find($id);

        if (!$user) {
            message_set("Foydalanuvchi topilmadi!", 'error', 5);
            return redirect()->back();
        }

        if ($user->hasRole('super admin') && !auth()->user()->hasRole('super admin')) {
            message_set("У вас нет разрешения на редактирование администратора", 'error', 5);
            return redirect()->back();
        }

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        DB::table('model_has_permissions')->where('model_id', $id)->delete();

        $user->delete();

        return redirect()->route('users.index')->with('success', __('messages.success_user_delete'));

    }
}
