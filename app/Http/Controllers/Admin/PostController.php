<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // Load all posts with their roles
        if (request()->ajax()) {
            $posts = Post::with(['author', 'kategori'])->select('*')->get();
            return datatables()->of($posts)
                // ->editColumn('harga', function ($row) {
                //     return 'Rp ' . number_format($row->harga, 0, ',', '.');
                // })
                ->addColumn('kategori', function ($post) {
                    return $post->kategori ? $post->kategori->nama : '-';
                })
                ->addColumn('author', function ($post) {
                    return $post->author ? $post->author->name : '-';
                })
                ->addColumn('aksi', function ($post) {
                    $button = '';

                    // $button .= '<button class="btn btn-warning btn-sm edit-post" data-id="' . $post->id . '" name="edit"><i class="ri-pencil-line"></i></button> ';

                    // Cek permission edit
                    if (Auth::user()->can('post.update')) {
                        $button .= '<button class="btn btn-sm btn-outline-warning btn-icon edit-post" data-id="' . $post->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('post.delete')) {
                        $button .= '<button class="btn btn-sm btn-outline-danger btn-icon hapus-post me-1" data-id="' . $post->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
                    }

                    if (!empty($post->thumbnail)) {
                        $button .= '<button class="btn btn-sm btn-outline-secondary btn-icon hapus-thumbnail" id="' . $post->id . '" name="hapus-thumbnail"><i class="tf-icons bx bx-scan-face" title="Hapus Thumbnail"></i></button>';
                    }

                    return $button !== '' ? $button : '<span class="text-muted">No Access</span>';
                })

                ->rawColumns(['aksi'])
                ->make(true);
        }
        $categories = \App\Models\KategoriBerita::all();
        return view('admin.post.index', compact('categories'));
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        try {
            // 🔹 Jika tag dikirim sebagai string (misal: "laravel,vue,api"), ubah jadi array
            if ($request->filled('tag') && is_string($request->tag)) {
                $tags = array_map('trim', explode(',', $request->input('tag')));
                $request->merge(['tag' => $tags]);
            }

            // 🔹 Validasi data
            $rules = [
                'judul' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:posts,slug,' . $id,
                'isi' => 'nullable|string',
                'tag' => 'nullable|array',
                'tag.*' => 'string|max:255',
                'kategori_id' => 'nullable|string',
                'is_slider' => 'nullable|string|in:0,1',
                'thumbnail' => 'nullable|image|max:2048',
            ];

            $validatedData = $request->validate($rules);

            // 🔹 Tentukan create / update
            $post = $id ? Post::findOrFail($id) : new Post();

            // 🔹 Handle upload thumbnail
            if ($request->hasFile('thumbnail')) {
                // Hapus file lama jika update
                if ($id && $post->thumbnail && file_exists(public_path('uploads/posts/' . $post->thumbnail))) {
                    unlink(public_path('uploads/posts/' . $post->thumbnail));
                }

                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('uploads/posts/'), $thumbnailName);
                $validatedData['thumbnail'] = $thumbnailName;
            }

            // 🔹 Tambahkan author_id (pengguna login)
            $validatedData['author_id'] = Auth::id();
            $validatedData['excerpt'] = Str::limit($request->isi, 100, '...');

            // 🔹 Ubah array tag jadi string sebelum disimpan
            if (!empty($request->tag) && is_array($request->tag)) {
                $validatedData['tag'] = implode(',', $request->tag);
            }

            // 🔹 Simpan post
            $post->fill($validatedData)->save();

            // 🔹 Response sukses
            return response()->json([
                'success' => true,
                'message' => $id ? 'Post updated successfully!' : 'Post created successfully!',
                'thumbnail' => $post->thumbnail ?? null
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Jika terjadi error lain
            Log::error('Error saving post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        if (!Auth::user()->can('post.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit post');
        }
        $post = Post::with(['author', 'kategori'])->findOrFail($id);
        return response()->json($post);
    }

    public function toggleAccept(Request $request)
    {
        $rules = [
            'id' => 'required|exists:posts,id',
            'is_slider' => 'required|boolean'
        ];

        $messages = [
            'id.required' => 'ID is required.',
            'id.exists' => 'Invalid page ID.',
            'is_slider.required' => 'Slider status is required.',
            'is_slider.boolean' => 'Slider status must be true or false.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['text' => $validator->errors()->first()], 422);
        }

        $post = Post::find($request->id);
        $post->is_slider = $request->is_slider;
        $post->save();

        return response()->json(['message' => 'Post updated successfully!']);
    }

    public function removeThumbnail($id)
    {
        $post = Post::findOrFail($id);

        if ($post->thumbnail && file_exists(public_path('uploads/posts/' . $post->thumbnail))) {
            unlink(public_path('uploads/posts/' . $post->thumbnail));
            $post->thumbnail = null;
            $post->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thumbnail berhasil dihapus.'
        ]);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('post.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus post');
        }
        $post = post::findOrFail($id);

        if ($post->thumbnail && file_exists(public_path('uploads/posts/' . $post->thumbnail))) {
            unlink(public_path('uploads/posts/' . $post->thumbnail));
        }

        $post->delete();

        return response()->json([
            'message' => 'Post successfully deleted.',
        ]);
    }
}
