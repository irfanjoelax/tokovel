<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{

    public function index()
    {
        $parse['kategoris'] = Kategori::latest()->get();
        return view('admin.kategori.index', $parse);
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Kategori::create([
            'id_kat' => Str::uuid(),
            'nm_kat' => Str::title($request->nama),
            'slug_kat' => Str::kebab($request->nama)
        ]);

        return redirect()->route('kategori.index')
            ->with('alert-primary', 'Selamat, kategori berhasil ditambah kan');
    }

    public function edit($id)
    {
        $parse['kategori'] = Kategori::find($id);
        return view('admin.kategori.edit', $parse);
    }

    public function update(Request $request, $id)
    {
        Kategori::find($id)->update([
            'nm_kat' => Str::title($request->nama),
            'slug_kat' => Str::kebab($request->nama)
        ]);

        return redirect()->route('kategori.index')
            ->with('alert-warning', 'Selamat, kategori berhasil diubah');
    }

    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->route('kategori.index')
            ->with('alert-danger', 'Selamat, kategori berhasil dihapus');
    }
}
