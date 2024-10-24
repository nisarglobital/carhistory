<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\{View,Factory};
use Illuminate\Http\{Request,RedirectResponse};
use App\Http\Controllers\Admin\Controller as Controller;

class UserController extends Controller
{
    /**
     * Display a listing of roles
     * @return Factory|View|Application
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('id','desc')->get();
        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new role
     * @return Factory|View|Application
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }


    /**
     * Store a new role in the database
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $data = $request->all();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => $data['type'],
                'password' => Hash::make($data['password']),
            ]);

            // Find the new role from the request
            $role = $request->role;

            // Remove all current roles and assign the new role
            $user->syncRoles([$role]);

            return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
        }catch (\Exception $exception){
            return redirect()->route('admin.users.create')->withInput()->with('error', $exception->getMessage());
        }
    }


    /**
     * Show the form for editing a role
     * @param User $user
     * @return Factory|View|Application
     */
    public function edit(User $user)
    {
        $roles  = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }


    /**
     * Update a role in the database
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);

            $data = $request->all();
            $updatable = [
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => $data['type']
            ];
            if($request->input('password')){
                $updatable['password'] = Hash::make($data['password']);
            }

            $user->where('id', $user->id)->update($updatable);

            // Find the new role from the request
            $role = $request->role;

            // Remove all current roles and assign the new role
            $user->syncRoles([$role]);

            return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
        }catch (\Exception $exception){
            return redirect()->route('admin.users.edit', $user)->with('error', $exception->getMessage());
        }
    }


    /**
     * Delete a role from the database
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Role deleted successfully.');
    }
}
