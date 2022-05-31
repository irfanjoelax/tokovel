<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $parse['transaksis'] = Transaksi::latest()->get();
        return view('admin.transaksi.index', $parse);
    }

    public function detail($id_transaksi)
    {
        $parse['transaksi'] = Transaksi::find($id_transaksi);
        return view('admin.transaksi.detail', $parse);
    }

    public function update($id_transaksi)
    {
        Transaksi::find($id_transaksi)->update([
            'stts_trx' => 'pesanan dikirim'
        ]);

        return redirect(url()->previous());
    }
}
