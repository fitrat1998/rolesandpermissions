<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('adminsuper.permissions.index',compact('permissions'));
    }


    public function create()
    {
        return view('adminsuper.permissions.add');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'title' => 'required|string|min:3',
        ]);


        Permission::create([
            'name' => $validated['name'],
            'title' => $validated['title'],
            'guard_name' => 'web',
        ]);


        return redirect()->route('permissions.index')->with('success', __('messages.success_permission_add'));
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('adminsuper.permissions.edit',compact('permission'));
    }

    public function update(Request $request,$id)
    {
       $validated = $request->validate([
            'name' => 'required|string|min:3',
        ]);

        $permission = Permission::find($id);

        $permission->update([
            'name' => $validated['name'],
        ]);


        return redirect()->route('permissions.index')->with('success', __('messages.success_permission_edit'));


    }

    public function destroy($id)
    {

        Permission::find($id)->delete();

        return redirect()->route('permissions.index')->with('success', __('messages.success_permission_delete'));

    }


}
