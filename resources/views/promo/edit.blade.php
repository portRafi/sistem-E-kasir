@extends('layout.app')

@section('title', ' - Edit Promo')

@section('content')
<div class="container">
    <h1>Edit Promo</h1>

    <form action="{{ route('promo.update', ['level' => auth()->user()->level, 'promo' => $promo->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="nama_promo">Nama Promo</label>
            <input type="text" name="nama_promo" class="form-control" value="{{ $promo->nama_promo }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="barang_beli_id">Barang yang Dibeli</label>
            <select name="barang_beli_id" class="form-control" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $barang->id == $promo->barang_beli_id ? 'selected' : '' }}>
                        {{ $barang->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="jumlah_beli">Jumlah Pembelian</label>
            <input type="number" name="jumlah_beli" class="form-control" value="{{ $promo->jumlah_beli }}" min="1" required>
        </div>

        <div class="form-group mt-3">
            <label for="barang_bonus_id">Barang Bonus</label>
            <select name="barang_bonus_id" class="form-control" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $barang->id == $promo->barang_bonus_id ? 'selected' : '' }}>
                        {{ $barang->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="jumlah_bonus">Jumlah Bonus</label>
            <input type="number" name="jumlah_bonus" class="form-control" value="{{ $promo->jumlah_bonus }}" min="1" required>
        </div>

        <div class="form-group mt-3">
            <label for="berlaku_sampai">Berlaku Sampai</label>
            <input type="date" name="berlaku_sampai" class="form-control" value="{{ \Carbon\Carbon::parse($promo->berlaku_sampai)->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Promo</button>
    </form>
</div>
@endsection
