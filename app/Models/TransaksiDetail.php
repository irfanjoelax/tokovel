<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id_det';

    public function transaksi()
    {
        return $this->belongsTo(TransaksiDetail::class, 'trx_id', 'id_trx');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'prd_id', 'id_prd');
    }
}
