<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{

    public function index()
    {
        $roles = Role::with('permissions', 'users')->get();
        $permissions = Permission::all();
        $users = User::all();

        return view('backend.roles_permission.index', compact('roles', 'permissions', 'users'));
    }
    public function createRole()
    {

        return view('backend.roles_permission.create');
    }
    public function storeRole(Request $request)
    {
         $role = Role::create(['name' => $request->name]);

        return back()->with('success', 'Role created successfully');
    }

    public function createPermission(Request $request)
    {
        $permission = Permission::create(['name' => $request->name]);

        return back()->with('success', 'Permissions created successfully');
    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_name' => 'required|exists:roles,name'
        ]);

        $user = User::findOrFail($request->user_id);
        $user->assignRole($request->role_name);

        return redirect()->route('roles.index')->with('success', 'Role assigned successfully.');
    }

    public function assignPermission(Request $request)
    {
        $request->validate([
            'role_name' => 'required|exists:roles,name',
            'permission_name' => 'required|exists:permissions,name'
        ]);

        $role = Role::findByName($request->role_name);
        $role->givePermissionTo($request->permission_name);

        return redirect()->route('roles.index')->with('success', 'Permission assigned successfully.');
    }




}
