<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
    'nama_promo',
    'barang_beli_id',
    'jumlah_beli',
    'barang_bonus_id',
    'jumlah_bonus',
    'berlaku_sampai',
];


    public function barangBeli()
    {
        return $this->belongsTo(Barang::class, 'barang_beli_id');
    }

    public function barangBonus()
    {
        return $this->belongsTo(Barang::class, 'barang_bonus_id');
    }
}
