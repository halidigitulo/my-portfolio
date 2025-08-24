<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::with('permissions')->select('roles.*');

            return DataTables::of($roles)
                ->addColumn('permissions', function ($role) {
                    return $role->permissions->map(function ($p) {
                        $color = 'secondary';
                        if (str_contains($p->name, '.create')) $color = 'success';
                        elseif (str_contains($p->name, '.read')) $color = 'info';
                        elseif (str_contains($p->name, '.update')) $color = 'warning';
                        elseif (str_contains($p->name, '.delete')) $color = 'danger';

                        return "<span class='badge bg-{$color} me-1'>{$p->name}</span>";
                    })->implode(' ');
                })
                ->addColumn('action', function ($role) {
                    $editBtn = '';
                    $deleteBtn = '';

                    if (auth()->user()->can('roles.update')) {
                        $editBtn = "<button class='btn btn-sm btn-outline-warning btn-icon btn-edit' data-id='{$role->id}'><span class='tf-icons bx bxs-edit'></span></button>";
                    }

                    if (auth()->user()->can('roles.delete')) {
                        $deleteBtn = "<button class='btn btn-sm btn-outline-danger btn-icon btn-delete' data-id='{$role->id}'><span class='tf-icons bx bx-trash'></span></button>";
                    }

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['permissions', 'action']) // biar HTML badge dan tombol tidak di-escape
                ->make(true);
        }

        $permissions = Permission::all();
        $groupedPermissions = [];
        foreach ($permissions as $perm) {
            [$module, $action] = explode('.', $perm->name);
            $groupedPermissions[$module][$action] = $perm;
        }

        return view('admin.roles.index', compact('permissions', 'groupedPermissions'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()->can('roles.create')) {
            abort(403, 'Anda tidak punya akses untuk menyimpan roles');
        }
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        $role->syncPermissions($request->permissions ?? []);
        return response()->json(['message' => 'Role created']);
    }

    public function show($id)
    {
        if (!Auth::user()->can('roles.read')) {
            abort(403, 'Anda tidak punya akses untuk menyimpan roles');
        }
        $role = Role::findOrFail($id);
        $permissions = $role->permissions->pluck('name');

        return response()->json([
            'id' => $role->id,
            'name' => $role->name,
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request, Role $role)
    {
        if (!Auth::user()->can('roles.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit user');
        }
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);
        return response()->json(['message' => 'Role updated']);
    }

    public function destroy(Role $role)
    {
        if (!Auth::user()->can('roles.delete')) {
            abort(403, 'Anda tidak punya akses untuk mengedit user');
        }
        $role->delete();
        return response()->json(['message' => 'Role deleted']);
    }
}
