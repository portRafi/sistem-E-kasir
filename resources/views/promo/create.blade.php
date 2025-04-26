@extends('layout.app')

@section('title', ' - Tambah Promo')

@section('content')
<div class="container">
    <h1>Tambah Promo</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('promo.store', ['level' => auth()->user()->level]) }}" method="POST">
        @csrf

        <div class="form-group mt-3">
            <label for="nama_promo">Nama Promo</label>
            <input type="text" name="nama_promo" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="barang_beli_id">Barang yang Dibeli</label>
            <select name="barang_beli_id" class="form-control" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="jumlah_beli">Jumlah Pembelian</label>
            <input type="number" name="jumlah_beli" class="form-control" min="1" required>
        </div>

        <div class="form-group mt-3">
            <label for="barang_bonus_id">Barang Bonus</label>
            <select name="barang_bonus_id" class="form-control" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="jumlah_bonus">Jumlah Bonus</label>
            <input type="number" name="jumlah_bonus" class="form-control" min="1" required>
        </div>

        <div class="form-group mt-3">
            <label for="berlaku_sampai">Berlaku Sampai</label>
            <input type="date" name="berlaku_sampai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-4">Simpan Promo</button>
    </form>
</div>
@endsection
