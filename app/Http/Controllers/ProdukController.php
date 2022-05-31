<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $parse['produks'] = Produk::latest()->get();
        return view('admin.produk.index', $parse);
    }

    public function create()
    {
        $parse['kategoris'] = Kategori::latest()->get();
        return view('admin.produk.create', $parse);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'berat' => 'required|numeric',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'deskripsi' => 'required',
        ]);

        // PROSES FILE GAMBAR
        $file = $request->file('gambar');
        $nameFile = 'tokovel-' . $file->getClientOriginalName();
        $file->move('img/produk', $nameFile);
        
        Produk::create([
            'id_prd' => Str::uuid(),
            'kat_id' => $request->kategori,
            'nm_prd' => Str::title($request->nama),
            'slug_prd' => Str::kebab($request->nama),
            'hrg_prd' => $request->harga,
            'stok_prd' => $request->stok,
            'brt_prd' => $request->berat,
            'gbr_prd' => $nameFile,
            'desk_prd' => $request->deskripsi,
        ]);

        return redirect()->route('produk.index')
            ->with('alert-primary', 'Selamat, produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $parse['produk'] = Produk::find($id);
        $parse['kategoris'] = Kategori::latest()->get();
        return view('admin.produk.edit', $parse);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'berat' => 'required|numeric',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:1024',
            'deskripsi' => 'required',
        ]);

        $produk = Produk::find($id);
        
        // PROSES FILE GAMBAR
        if ($request->file('gambar') != '') {
            // delete file
            FacadesFile::delete('img/produk/' . $produk->gbr_prd);

            // move File
            $file = $request->file('gambar');
            $nameFile = 'tokovel-' . $file->getClientOriginalName();
            $file->move('img/produk', $nameFile);
        } else {
            $nameFile = $produk->gbr_prd;
        }
        
        $produk->update([
            'id_prd' => Str::uuid(),
            'kat_id' => $request->kategori,
            'nm_prd' => Str::title($request->nama),
            'slug_prd' => Str::kebab($request->nama),
            'hrg_prd' => $request->harga,
            'stok_prd' => $request->stok,
            'brt_prd' => $request->berat,
            'gbr_prd' => $nameFile,
            'desk_prd' => $request->deskripsi,
        ]);

        return redirect()->route('produk.index')
            ->with('alert-warning', 'Selamat, produk berhasil diubah');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);

        // delete file
        FacadesFile::delete('img/produk/' . $produk->gbr_prd);

        $produk->delete();

        return redirect()->route('produk.index')
            ->with('alert-danger', 'Selamat, produk berhasil dihapus');
    }
}
