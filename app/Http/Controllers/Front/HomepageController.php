<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Faq;
use App\Models\GeneralSetting;
use App\Models\KategoriProject;
use App\Models\Message;
use App\Models\Product;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Service;
use App\Models\Stack;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        // Logic to retrieve data for the homepage view
        $generalsettings = GeneralSetting::first();
        $completedprojects = Project::where('status', '1')->count();
        $clients = Client::all();
        $services = Service::all();
        $resumes = Resume::orderBy('mulai_dari', 'desc')->get();
        $faqs = Faq::limit(5)->get();
        $frontend = Stack::where('kategori_id', 1)->get();
        $backend = Stack::where('kategori_id', 2)->get();
        $design = Stack::where('kategori_id', 3)->get();
        $cloud = Stack::where('kategori_id', 4)->get();
        $profesional = Resume::where('jenis', 'profesional')->get();
        $akademik = Resume::where('jenis', 'akademik')->get();
        $layanan = Service::all();
        $produk = Product::inRandomOrder()->take(6)->get();
        $totalReviews = Testimoni::where('status', 1)->get();
        $averageRating = \App\Models\Testimoni::avg('rating');
        // Ambil kategori yang dipilih dari query parameter (misal: ?category=web-portfolio)
        $category = $request->get('category');

        // Jika ada kategori yang dipilih, filter projects berdasarkan kategori tersebut
        if ($category) {
            $projects = Project::whereHas('kategori', function ($query) use ($category) {
                $query->where('nama', $category);
            })->with('kategori')->get();
        } else {
            // Jika tidak ada kategori yang dipilih, tampilkan semua projects
            $projects = Project::with('kategori')->get();
        }

        // Ambil semua kategori untuk ditampilkan di filter
        $categories = KategoriProject::all();
        return view('front.homepage.index', compact('generalsettings', 'completedprojects', 'clients', 'services', 'resumes', 'faqs', 'frontend', 'backend', 'design', 'cloud', 'profesional', 'akademik', 'layanan', 'totalReviews', 'projects', 'categories', 'averageRating', 'produk'));
    }

    public function send_message(Request $request)
    {
        $rules = [
            'nama' => 'required|max:50',
            'email' => 'required|min:5|max:255',
            'no_hp' => 'required|min:5|max:15',
            'pesan' => 'required|min:5|max:255',
            'g-recaptcha-response' => 'required|captcha',
        ];
        $text = [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'no_hp.required' => 'Telp tidak boleh kosong',
            'pesan.required' => 'Pesan tidak boleh kosong',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter',
            'no_hp.min' => 'Telp minimal 5 karakter',
            'no_hp.max' => 'Telp maksimal 15 karakter',
            'pesan.min' => 'Pesan minimal 5 karakter',
            'pesan.max' => 'Pesan tidak boleh lebih dari 255 karakter',
            'g-recaptcha-response.required' => 'Recaptcha belum dicentang',
            'g-recaptcha-response.capthca' => 'Recaptcha bermasalah',
        ];
        $validator = Validator::make($request->all(), $rules, $text);

        if ($validator->fails()) {
            return response()->json(['success' => 0, 'text' => $validator->errors()->first()], 422);
        }
        $simpan = Message::create($request->all());
        if ($simpan) {
            return response()->json(['text' => 'Pesan berhasil terkirim'], 200);
        } else {
            return response()->json(['text' => 'Pesan gagal dikirim'], 422);
        }
    }
}
