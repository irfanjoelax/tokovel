<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KeranjangController extends Controller
{
    public function addCart($produkId)
    {
        if (Auth::check()) {
            $produk = Produk::find($produkId);

            Keranjang::updateOrInsert([
                'user_id'       => Auth::id(),
                'idprd_krj'     => $produk->id_prd,
                'nmprd_krj'     => $produk->nm_prd,
                'gbrprd_krj'    => $produk->gbr_prd,
                'hrgprd_krj'    => $produk->hrg_prd,
                'jml_krj'       => 1,
                'ttl_krj'       => $produk->hrg_prd * 1
            ]);

            return redirect('/user/keranjang');
        }

        return redirect()->route('login');
    }

    public function listCart()
    {
        $parse['carts'] = Keranjang::where('user_id', Auth::id())->get();
        return view('user.keranjang', $parse);
    }

    public function deleteCart($id)
    {
        Keranjang::find($id)->delete();
        return redirect(url()->previous());
    }

    public function checkout()
    {
        $parse['carts'] = Keranjang::where('user_id', Auth::id())->get();
        return view('user.checkout', $parse);
    }

    public function createTransaction(Request $request)
    {
        $keranjang = Keranjang::where('user_id', Auth::id());

        $idTransaksi = Str::uuid();

        Transaksi::create([
            'id_trx' => $idTransaksi,
            'user_id' => Auth::id(),
            'almt_trx' => $request->alamat,
            'telp_trx' => $request->telepon,
            'ttl_trx' => $keranjang->sum('ttl_krj'),
            'stts_trx' => 'pesanan diterima',
        ]);

        foreach ($keranjang->get() as $cart) {
            TransaksiDetail::create([
                'trx_id' => $idTransaksi,
                'prd_id' => $cart->idprd_krj,
                'jml_det' => $cart->jml_krj,
                'ttl_det' => $cart->ttl_krj,
            ]);

            $produk  = Produk::find($cart->idprd_krj);
            $produk->update([
                'stok_prd' =>  $produk->stok_prd - $cart->jml_krj
            ]);

            $keranjang->delete();
        }

        return redirect('/user/order');
    }
}
