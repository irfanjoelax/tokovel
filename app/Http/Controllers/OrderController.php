<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $idUser = Auth::id();
        $parse['transaksis'] = Transaksi::where('user_id', $idUser)->get();
        return view('user.order', $parse);
    }

    public function detail($id_transaksi)
    {
        $parse['transaksi'] = Transaksi::find($id_transaksi);
        return view('user.order_detail', $parse);
    }
}
