<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id_prd';

    protected $keyType = 'string';

    public $incrementing = false;

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kat_id', 'id_kat');
    }

    public function detail()
    {
        return $this->hasOne(Produk::class, 'prd_id', 'id_prd');
    }
}
