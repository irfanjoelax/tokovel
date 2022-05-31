<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id_trx';

    protected $keyType = 'string';

    public $incrementing = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class, 'trx_id', 'id_trx');
    }
}
