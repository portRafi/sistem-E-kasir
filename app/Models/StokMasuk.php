<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class StokMasuk extends Model
{
    use HasFactory;

    protected $table = 'stok_masuk'; // nama tabel
    protected $fillable = ['barang_id', 'jumlah', 'harga_masuk', 'tanggal'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
