<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // Load all users with their roles
        if (request()->ajax()) {
            $users = User::with(['role'])->select('users.*')->get();
            return datatables()->of($users)
                ->addColumn('role', function ($role) {
                    return optional($role->role)->name ?: 'N/A';
                })
                ->addColumn('aksi', function ($user) {
                    $button = '';

                    // $button .= '<button class="btn btn-warning btn-sm edit-user" data-id="' . $user->id . '" name="edit"><i class="ri-pencil-line"></i></button> ';

                    // Cek permission edit
                    if (Auth::user()->can('users.update')) {
                        $button .= '<button class="btn btn-sm btn-outline-warning btn-icon edit-user" data-id="' . $user->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('users.delete')) {
                        $button .= '<button class="btn btn-sm btn-outline-danger btn-icon hapus-user" data-id="' . $user->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
                    }

                    return $button !== '' ? $button : '<span class="text-muted">No Access</span>';
                })

                ->rawColumns(['aksi'])
                ->make(true);
        }
        $role = Role::all();
        return view('admin.users.index', compact('role') + [
            'canUpdateStatus' => Auth::user()->can('users.update')
        ]);
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $rules = [
            'name' => 'nullable|string|max:255',
            'username' => $id
                ? 'nullable|string|max:255|unique:users,username,' . $id
                : 'required|string|max:255|unique:users,username',
            'password' => $id
                ? 'nullable|string|min:8'
                : 'required|string|min:8',
            'role_id' => 'nullable|integer|exists:roles,id',
            'permissions' => 'nullable|array', // opsional: jika kamu ingin custom permission per user
            'permissions.*' => 'string|exists:permissions,name',
            'is_active' => 'nullable|boolean',
            'avatar' => 'nullable|image|max:2048',
        ];

        $validatedData = $request->validate($rules);
        $user = $id ? User::findOrFail($id) : new User();

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            if ($id && $user->avatar && file_exists(public_path('uploads/users/' . $user->avatar))) {
                unlink(public_path('uploads/users/' . $user->avatar));
            }

            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('uploads/users/'), $avatarName);
            $validatedData['avatar'] = $avatarName;
        }

        // Handle password hashing
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        // Save user data
        $user->fill($validatedData)->save();

        // === ✅ Assign Role ===
        if ($request->filled('role_id')) {
            $guard = $user->guard_name ?? 'web'; // Default ke 'web' jika tidak diset
            $role = Role::where('id', $request->role_id)->where('guard_name', $guard)->firstOrFail();
            $user->syncRoles([$role->name]);
        }

        // === ✅ Assign Direct Permissions (optional) ===
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions); // array of permission names
        }

        return response()->json([
            'message' => $id ? 'User updated successfully!' : 'User created successfully!',
            'avatar' => $user->avatar ?? null
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('users.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit user');
        }
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('users.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus user');
        }
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User successfully deleted.',
        ]);
    }

    public function profile()
    {
        // Find the user by ID and ensure the authenticated user is authorized to update this profile
        $user = Auth::user(); // Fetch user by the provided ID

        // Check if the logged-in user is authorized to update the profile
        if (Auth::id() !== $user->id) {
            // Optionally, redirect or show an error if the user is trying to access another user's profile
            return redirect()->route('dashboard')->with('error', 'Unauthorized access to profile.');
        }

        return view('admin.users.update', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'bio' => 'nullable|string|max:500',
            // Ensure the profile picture is optional, an image, and has a valid file type and size
            // Adjust the max size as needed (e.g., 2048 KB = 2 MB)
            // You can also add 'dimensions' rule to restrict image dimensions if needed
            // 'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->bio = $request->bio;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            $oldprofile_picturePath = public_path('uploads/users/' . $user->profile_picture);
            if ($user->profile_picture && file_exists($oldprofile_picturePath)) {
                unlink($oldprofile_picturePath);
            }

            $profile_pictureName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/users'), $profile_pictureName);
            $user->profile_picture = $profile_pictureName;
        }

        $user->save();

        return response()->json([
            'message' => 'Profil berhasil diperbarui.',
            'profile' => [
                'name' => $user->name,
                'profile_picture' => $user->profile_picture ? asset('uploads/users/' . $user->profile_picture) : null,
            ]
        ]);
    }
}
