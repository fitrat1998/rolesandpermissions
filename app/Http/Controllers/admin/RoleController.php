<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        abort_if_forbidden('roles.show');

        if (auth()->user()->roles[0]->name) {
            $roles = Role::whereNotIn('name', ['super admin'])->get();;
            return view('admin.roles.index', compact('roles'));
        }

    }


    public function create()
    {
        abort_if_forbidden('roles.add');

        $permissions = Permission::all();
        return view('admin.roles.add', compact('permissions'));
    }


    public function store(Request $request)
    {
        abort_if_forbidden('roles.add');

        $validated = $request->validate([
            'name' => 'required|string|min:3',
        ]);


        $role = Role::create([
            'name' => $request->get('name'),
            'guard_name' => 'web',
        ]);

        $permissions = $request->get('permissions');
        $role->syncPermissions($permissions);
        if ($permissions) {
            foreach ($permissions as $key => $item) {
                $role->givePermissionTo($item);
            }
        }


        return redirect()->route('admin.roles.index')->with('success', 'Role added successfully');
    }

    public function edit($id)
    {
        abort_if_forbidden('roles.edit');
        $role = Role::find($id);

        abort_if($role->name == 'super admin' && !auth()->user()->hasRole('super admin'), 403);

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {

        abort_if_forbidden('roles.edit');

        $validated = $request->validate([
            'name' => 'required|string|min:3',
        ]);

        abort_if(!auth()->user()->hasRole('super admin'), 403);

        $permissions = $request->get('permissions');
        unset($request['permissions']);

        $role = Role::findOrFail($id);

        $role->fill($request->all());
        $role->syncPermissions($permissions);
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');


    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return redirect()->back()->with('success', 'Permission already exists ');
        }
        $role->givePermissionTo($request->permission);
        return redirect()->route('admin.roles.index')->with('success', 'Permission added successfully');


    }

    public function destroy($id)
    {

        abort_if_forbidden('roles.delete');
        $role = Role::find($id);

        if ($role->name == 'Super Admin') {
            message_set('You Cannot delete Super Admin Role!', 'warning', 3);
            return redirect()->back();
        }
        DB::table('model_has_roles')->where('role_id', $id)->delete();
        DB::table('role_has_permissions')->where('role_id', $id)->delete();
        $role->delete();
        message_set('Role is deleted', 'success', 3);

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');

    }


}
