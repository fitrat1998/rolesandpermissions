<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();

        return view('departments.index', compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'super admin')->get();

        return view('departments.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        abort_if_forbidden('user.add');

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $department = Department::create([
            'name' => $request->name,
        ]);

        return redirect()->route('departments.index')->with('success', __('messages.success_department_add'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_if((!auth()->user()->can('user.edit') && auth()->id() != $id), 403);

        $user = auth()->user();

        if ($user->hasRole('super admin') && !auth()->user()->hasRole('super admin')) {
            message_set("У вас нет разрешения на редактирование администратора", 'error', 5);
            return redirect()->back();
        }

        $roles = Role::where('name', '!=', 'super admin')->get();

        $department = Department::find($id);


        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, $id)
    {
        abort_if((!auth()->user()->can('user.edit') && auth()->id() != $id), 403);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],

        ]);

        $department = Department::find($id);

        $department->update([
            'name' => $request->name,
        ]);

        return redirect()->route('departments.index')->with('success', __('messages.success_department_edit'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        abort_if_forbidden('user.delete');

        $department = Department::find($id);

        $user = auth()->user();

        if (!$user) {
            message_set("Foydalanuvchi topilmadi!", 'error', 5);
            return redirect()->back();
        }

        if ($user->hasRole('super admin') && !auth()->user()->hasRole('super admin')) {
            message_set("У вас нет разрешения на редактирование администратора", 'error', 5);
            return redirect()->back();
        }


        $department->delete();

        return redirect()->route('departments.index')->with('success', __('messages.success_department_delete'));
    }
}
