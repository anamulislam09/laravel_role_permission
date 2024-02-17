<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // show all rolles 
    public function Index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    // create all rolles 
    public function Create()
    {
        $permissions = Permission::all();
        $permission_groups = User::getpermissonGroups();
        return view('admin.roles.create', compact('permissions', 'permission_groups'));
    }

    // store all rolles 
    public function Store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50|unique:roles',
            ],
            [
                'name.required' => 'please give a role name',
            ]
        );
        // process data 
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        $notification = array('message' => 'Role created successfully', 'alert_type' => 'success');
        return redirect()->route('role.index')->with($notification);
    }

    // create all rolles 
    public function Edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissonGroups();
        return view('admin.roles.edit', compact('role', 'permissions', 'permission_groups'));
    }


    // update all rolles 
    public function Update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:50|unique:roles,name,' . $id,
            ],
            [
                'name.required' => 'please give a role name',
            ]
        );

        // process data 
        $role = Role::findById($id);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();

            $role->syncPermissions($permissions);
        }
        session()->flash('success', 'Role Updated successfully');
        return redirect()->route('role.index');
    }

    // delete permission 
    public function Destroy($id)
    {
        $role = Role::findById($id);
        if (!is_null($role)) {
            $role->delete();
        }
        $notification = array('message' => 'Role deleted successfully', 'alert_type' => 'success');
        return redirect()->route('role.index')->with($notification);
    }
}
