<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\PermissionHelper;
use \Illuminate\Foundation\Application;
use Spatie\Permission\Models\Permission;
use \Illuminate\Contracts\View\{View,Factory};
use Illuminate\Http\{Request,RedirectResponse};
use App\Http\Controllers\Admin\Controller as Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of permissions
     * @return Factory|View|Application
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }


    /**
     * Show the form for creating a new permission
     * @return Factory|View|Application
     */
    public function create()
    {
        $categoriesWithPermissions = PermissionHelper::getCategoriesWithPermissions();
        return view('admin.permissions.create', compact('categoriesWithPermissions'));
    }


    /**
     * Store a newly created permission in the database and update JSON
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'category' => 'required|string'
        ]);

        // Create permission in the database
        $permission = Permission::create(['name' => $request->name]);
        PermissionHelper::updatePermissionInJson($permission->name, $request->category);

        return redirect()->route('permissions.index')->with('success', 'Permission created and added to JSON file successfully.');
    }


    /**
     * Show the form for editing a permission
     * @param Permission $permission
     * @return Factory|View|Application
     */
    public function edit(Permission $permission)
    {
        $categoriesWithPermissions = PermissionHelper::getCategoriesWithPermissions();

        // Find the current category of the permission in the JSON file
        $currentCategory = null;
        foreach ($categoriesWithPermissions as $category => $permissions) {
            if (in_array($permission->name, $permissions)) {
                $currentCategory = $category;
                break;
            }
        }

        return view('admin.permissions.edit', compact('permission', 'categoriesWithPermissions', 'currentCategory'));
    }


    /**
     * Update the specified permission in the database and JSON
     * @param Request $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        // Check if the permission is assigned to any roles or users
        if ($permission->roles()->count() > 0 || $permission->users()->count() > 0) {
            return redirect()->route('permissions.index')->with('error', 'Permission cannot be updated because it is assigned to one or more roles or users.');
        }

        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
            'category' => 'required|string'
        ]);

        // Update permission in the database & json
        $permission->update(['name' => $request->name]);
        PermissionHelper::updatePermissionInJson($request->name, $request->category, $permission->getOriginal('name'));

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully in both database and JSON.');
    }


    /**
     * Remove the specified permission from the database and JSON
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        // Check if the permission is assigned to any roles or users
        if ($permission->roles()->count() > 0 || $permission->users()->count() > 0) {
            return redirect()->route('permissions.index')->with('error', 'Permission cannot be deleted because it is assigned to one or more roles or users.');
        }

        // Delete permission from database & json
        $permission->delete();
        PermissionHelper::removePermissionFromJson($permission->name);

        return redirect()->route('permissions.index')->with('success', 'Permission deleted from both database and JSON file.');
    }


}
