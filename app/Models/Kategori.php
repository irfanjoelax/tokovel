<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id_kat';

    protected $keyType = 'string';

    public $incrementing = false;

    public function produks()
    {
        return $this->hasMany('App\Models\Produk', 'kat_id', 'id_kat');
    }
}
