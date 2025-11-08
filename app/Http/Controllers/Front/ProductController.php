<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_listing()
    {
        $products = Product::all();
        return view('front.product.index', compact('products'));
    }

    public function product_detail($slug)
    {
        $data = Product::with('stack')->where('slug', $slug)->firstOrFail();
        // Ambil 1 product random selain yang aktif
        // $nextproduct = product::inRandomOrder()
        //     ->where('id', '!=', $data->id)
        //     ->first();
        $nextProduct = product::where('id', '>', $data->id)
            ->orderBy('id', 'asc')
            ->first();

        if (!$nextProduct) {
            // Kalau sudah di product terakhir, ambil product pertama
            $nextProduct = product::orderBy('id', 'asc')->first();
        }
        $randomData = Product::inRandomOrder()->where('id', '!=', $data->id)->take(6)->get();
        return view(
            'front.product.detail',
            [
                'data' => $data,
                'randomData' => $randomData,
                'nextProduct' => $nextProduct,
                'nama' => $data->nama
            ]
        );
    }
}
