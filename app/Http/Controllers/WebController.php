<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $parse['produkTerbaru'] = Produk::latest()->limit(8)->get();
        return view('welcome', $parse);
    }

    public function kategori()
    {
        $parse['kategoris'] = Kategori::latest()->get();
        return view('kategori', $parse);
    }

    public function kategoriDetail($slug)
    {
        $parse['kategori'] = Kategori::where('slug_kat', $slug)->first();
        return view('kategori_detail', $parse);
    }

    public function produk()
    {
        $parse['produks'] = Produk::paginate(4);
        return view('produk', $parse);
    }

    public function produkDetail($slug)
    {
        $parse['produk'] = Produk::where('slug_prd', $slug)->first();
        return view('produk_detail', $parse);
    }

    public function produkSearch(Request $request)
    {
        $parse['produks'] = Produk::where('nm_prd', 'like', '%' . $request->keyword . '%')->orWhere('desk_prd', 'like', '%' . $request->keyword . '%')->get();
        return view('produk_search', $parse);
    }
}
