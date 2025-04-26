<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo ;
use App\Models\Barang;
use App\Models\Transaksi;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $promos = Promo::with(['barangBeli', 'barangBonus'])->latest()->get();
    return view('promo.index', compact('promos'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('promo.create', compact('barangs'));
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi opsional
        $request->validate([
            'nama_promo' => 'required',
            'barang_beli_id' => 'required|integer',
            'jumlah_beli' => 'required|integer',
            'barang_bonus_id' => 'required|integer',
            'jumlah_bonus' => 'required|integer',
            'berlaku_sampai' => 'required|date',
        ]);
    
        Promo::create([
            'nama_promo' => $request->nama_promo,
            'barang_beli_id' => $request->barang_beli_id,
            'jumlah_beli' => $request->jumlah_beli,
            'barang_bonus_id' => $request->barang_bonus_id,
            'jumlah_bonus' => $request->jumlah_bonus,
            'berlaku_sampai' => $request->berlaku_sampai,
        ]);
    
        return redirect()->back()->with('success', 'Promo berhasil ditambahkan!');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($level, $id)
{
    $promo = Promo::findOrFail($id);
    $barangs = Barang::all();
    return view('promo.edit', compact('promo', 'barangs'));
}

public function update(Request $request, $level, $id)
{
    $request->validate([
        'nama_promo' => 'required',
        'barang_beli_id' => 'required|exists:barangs,id',
        'jumlah_beli' => 'required|integer|min:1',
        'barang_bonus_id' => 'required|exists:barangs,id',
        'jumlah_bonus' => 'required|integer|min:1',
        'berlaku_sampai' => 'required|date',
    ]);

    $promo = Promo::findOrFail($id);
    $promo->update([
        'nama_promo' => $request->nama_promo,
        'barang_beli_id' => $request->barang_beli_id,
        'jumlah_beli' => $request->jumlah_beli,
        'barang_bonus_id' => $request->barang_bonus_id,
        'jumlah_bonus' => $request->jumlah_bonus,
        'berlaku_sampai' => $request->berlaku_sampai,
    ]);

    return redirect()->route('promo.index', ['level' => $level])->with('success', 'Promo berhasil diupdate!');
}


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($level, $id)
{
    $promo = Promo::findOrFail($id);
    $promo->delete();

    return redirect()->route('promo.index', ['level' => $level])->with('success', 'Promo berhasil dihapus.');
}


    public function getPromoByBarangId($barang_id)
    {
        $promo = Promo::where('barang_id', $barang_id)->first();
        return response()->json($promo);
    }
    public function getPromoById($id)
    {
        $promo = Promo::find($id);
        return response()->json($promo);
    }
    public function getPromoByBarangIdAndQty($barang_id, $qty)
    {
        $promo = Promo::where('barang_id', $barang_id)
            ->where('beli_qty', '<=', $qty)
            ->orderBy('beli_qty', 'desc')
            ->first();

        return response()->json($promo);
    }
}
