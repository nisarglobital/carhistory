<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helpers\PermissionHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\{View,Factory};
use Spatie\Permission\Models\{Role,Permission};
use App\Http\Controllers\Admin\Controller as Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of roles
     * @return Factory|View|Application
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new role
     * @return Factory|View|Application
     */
    public function create()
    {
        $categoriesWithPermissions = PermissionHelper::getCategoriesWithPermissions();

        $permissions = Permission::all();
        return view('admin.roles.create', compact('categoriesWithPermissions', 'permissions'));
    }


    /**
     * Store a new role in the database
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }


    /**
     * Show the form for editing a role
     * @param Role $role
     * @return Factory|View|Application
     */
    public function edit(Role $role)
    {
        $categoriesWithPermissions = PermissionHelper::getCategoriesWithPermissions();

        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.roles.edit', compact('role', 'categoriesWithPermissions', 'permissions', 'rolePermissions'));
    }


    /**
     * Update a role in the database
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }


    /**
     * Delete a role from the database
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
