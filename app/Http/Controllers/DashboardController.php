<?php

namespace App\Http\Controllers;

use App\Charts\TransaksiChart;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // setting data untuk tanggal setiap bulan
        $tanggalAwal    = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir   = date('Y-m-d');
        $tanggal        = $tanggalAwal;

        while (strtotime($tanggal) <= strtotime($tanggalAkhir)) {
            $labels[]   = (int) substr($tanggal, 8, 2);
            $dataTransaksi[]  = Transaksi::where('created_at', 'like', $tanggal . '%')->sum('ttl_trx');
            $tanggal    = date('Y-m-d', strtotime("+1 day", strtotime($tanggal)));
        }

        // Pembuatan Chart Transaksi
        $chartTransaksi = new TransaksiChart;
        $chartTransaksi->labels($labels);
        $chartTransaksi->dataset('Transaksi', 'line', $dataTransaksi)->color('#007bff')->backgroundColor('#17a2b8');

        // parsing data panel ke view
        $parse['TotalKategori']     = Kategori::count();
        $parse['TotalProduk']       = Produk::count();
        $parse['TotalTransaksi']    = Transaksi::count();
        $parse['TotalUser']         = User::role('user')->count();

        // parsing data chart ke view
        $parse['chartTransaksi']    = $chartTransaksi;
        $parse['tanggalAwal']       = $tanggalAwal;
        $parse['tanggalAkhir']      = $tanggalAkhir;

        return view('admin.dashboard', $parse);
    }
}
