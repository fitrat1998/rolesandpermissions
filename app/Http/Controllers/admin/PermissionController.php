<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index',compact('permissions'));
    }


    public function create()
    {
        return view('admin.permissions.create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|min:3',
        ]);


        Permission::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);


        return redirect()->route('admin.permissions.index')->with('success', 'Permission added successfully');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('admin.permissions.edit',compact('permission'));
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


        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully');


    }

    public function destroy($id)
    {

        Permission::find($id)->delete();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully');

    }


}
