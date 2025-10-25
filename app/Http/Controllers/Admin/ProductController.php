<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stack;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // Load all products with their roles
        if (request()->ajax()) {
            $products = product::with('stack')->select('*')->get();
            return datatables()->of($products)
                ->editColumn('harga', function ($row) {
                    return 'Rp ' . number_format($row->harga, 0, ',', '.');
                })
                ->addColumn('aksi', function ($product) {
                    $button = '';

                    // $button .= '<button class="btn btn-warning btn-sm edit-product" data-id="' . $product->id . '" name="edit"><i class="ri-pencil-line"></i></button> ';

                    // Cek permission edit
                    if (Auth::user()->can('product.update')) {
                        $button .= '<button class="btn btn-sm btn-outline-warning btn-icon edit-product" data-id="' . $product->id . '" name="edit"><span class="tf-icons bx bxs-edit"></span></button> ';
                    }

                    // Cek permission delete
                    if (Auth::user()->can('product.delete')) {
                        $button .= '<button class="btn btn-sm btn-outline-danger btn-icon hapus-product" data-id="' . $product->id . '" name="delete"><span class="tf-icons bx bx-trash"></span></button>';
                    }

                    return $button !== '' ? $button : '<span class="text-muted">No Access</span>';
                })

                ->rawColumns(['aksi'])
                ->make(true);
        }
        $stacks = \App\Models\Stack::all();
        return view('admin.product.index', compact('stacks'));
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        // Validation rules
        $rules = [
            'nama' => 'nullable|string|max:255',
            'slug' => $id
                ? 'nullable|string|max:255' . $id
                : 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'link' => 'nullable|string',
            'stack' => 'nullable|array', // Pastikan stacks adalah array
            'thumbnail' => 'nullable|image|max:2048',
        ];

        // Validasi request
        $validatedData = $request->validate($rules);

        // Menentukan apakah ini create atau update
        $product = $id ? Product::findOrFail($id) : new Product();

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            if ($id && $product->thumbnail && file_exists(public_path('uploads/products/' . $product->thumbnail))) {
                unlink(public_path('uploads/products/' . $product->thumbnail));  // Hapus thumbnail lama jika update
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path('uploads/products/'), $thumbnailName);
            $validatedData['thumbnail'] = $thumbnailName;
        }

        // Save product data
        $product->fill($validatedData)->save();

        // Handle many-to-many relationship for stacks (relasi many-to-many)
        if ($request->has('stacks')) {
            // Menyimpan relasi many-to-many dengan menggunakan sync
            $product->stack()->sync($request->stacks);  // sync() akan memperbarui relasi dengan stacks yang dipilih
        }

        // Return response
        return response()->json([
            'message' => $id ? 'Product updated successfully!' : 'Product created successfully!',
            'thumbnail' => $product->thumbnail ?? null
        ]);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('product.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit product');
        }
        $product = Product::with('stack')->findOrFail($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('product.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus product');
        }
        $product = product::findOrFail($id);

        $product->stack()->detach();
        if ($product->thumbnail && file_exists(public_path('uploads/products/' . $product->thumbnail))) {
            unlink(public_path('uploads/products/' . $product->thumbnail));
        }
        $product->delete();

        return response()->json([
            'message' => 'product successfully deleted.',
        ]);
    }
}
