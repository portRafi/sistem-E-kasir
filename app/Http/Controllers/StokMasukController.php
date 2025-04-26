<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokMasuk;
use App\Models\Barang;
class StokMasukController extends Controller
{

    public function create()
{
    $barangs = Barang::all(); // sementara tanpa filter
    return view('stok_masuk.create', compact('barangs'));
}
    public function store(Request $request)
{
    $request->validate([
        'barang_id' => 'required|exists:barangs,id',
        'jumlah' => 'required|integer|min:1',
        'harga_masuk' => 'required|numeric|min:0'
    ]);

    // Simpan histori stok masuk
    $stokMasuk = StokMasuk::create([
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
        'harga_masuk' => $request->harga_masuk,
        'tanggal' => now()
    ]);

    // Update stok barang
    $barang = Barang::find($request->barang_id);
    $barang->stok = ($barang->stok ?? 0) + $request->jumlah;
    $barang->save();

    return redirect()->back()->with('success', 'Stok berhasil ditambahkan.');
}
}