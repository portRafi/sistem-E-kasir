<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\TransaksiSementara;
use App\Models\TransaksiDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Promo as PromoModel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('tanggal', 'desc')->get();

        return view('laporan.index', compact('transaksi'));
    }

    public function tambahBarang(Request $request)
{
    // Ambil barang yang dibeli user
    $barangId = $request->barang_id;
    $jumlah = $request->jumlah;

    // Simpan ke keranjang (contoh kode keranjang kamu sendiri)
    // session()->push('cart', ['id' => $barangId, 'qty' => $jumlah]);

    // Cek apakah ada promo aktif
    $promo = Promo::where('barang_beli_id', $barangId)
        ->where('berlaku_sampai', '>=', Carbon::today())
        ->first();

    if ($promo && $jumlah >= $promo->jumlah_beli) {
        // Hitung berapa kali promo terpenuhi
        $bonusTimes = intdiv($jumlah, $promo->jumlah_beli);
        $jumlahBonus = $promo->jumlah_bonus * $bonusTimes;

        // Tambahkan barang bonus ke keranjang (contoh)
        // session()->push('cart', ['id' => $promo->barang_bonus_id, 'qty' => $jumlahBonus, 'bonus' => true]);
    }

    return back()->with('success', 'Barang ditambahkan ke keranjang');
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($kodeTransaksi)
    {
        $data = TransaksiDetail::where('kode_transaksi', $kodeTransaksi)->get();
        
        return view('laporan.view', compact('data'));
    }
    
    public function hiden($kodeTransaksi)
    {
        $data = TransaksiDetail::where('kode_transaksi', $kodeTransaksi)->get();
        
        return view('report.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        
    }

    public function printPDF($transaksi_invoice)
     {
        $transaksi_invoice = TransaksiInvoice::where('print_pdf', $transaksi_invoice)->get(); 

        $pdf = Pdf::loadView('laporan.print', compact('transaksi_invoice'));
        return $pdf->stream();

    }

    public function print($kode_transaksi)
     {
        $id_transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->first();
        $transaksi = Transaksi::find($id_transaksi->id);
        $transaksi_detail = TransaksiDetail::where('kode_transaksi', $kode_transaksi)->get();

        $pdf = Pdf::loadView('laporan.print', compact('transaksi', 'transaksi_detail'));
        return $pdf->stream();

    }
    
    public function cari(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $tanggalSampai = Carbon::parse($sampai)->addDays(1)->format('Y-m-d');
        
        $transaksi = Transaksi::whereBetween('tanggal', [$dari, $tanggalSampai])->get();
        
        return view('laporan.cari',compact('transaksi', 'dari', 'sampai'));
    }
    
    public function printTanggal($dari, $sampai)
    {
        $tanggalSampai = Carbon::parse($sampai)->addDays(1)->format('Y-m-d');
        $transaksi = Transaksi::whereBetween('tanggal', [$dari, $tanggalSampai])->get();
        
        $totalAll = 0;
        foreach($transaksi as $data)
        {
            $totalAll += $data->total;
        }

        $total = number_format($totalAll, 0, ',', '.');

        $pdf = Pdf::loadView('laporan.printTanggal', compact('transaksi', 'dari', 'sampai', 'total'));
        return $pdf->stream();
    }
}
