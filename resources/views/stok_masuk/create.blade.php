@extends('layout.app')

@section('title', ' - Tambah Stok Masuk')

@section('content')
    <div class="container">
        <h4>Tambah Stok Barang</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('stok-masuk.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="barang_id">Pilih Barang</label>
                <select name="barang_id" class="form-control" required>
    @foreach($barangs as $barang)
    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
    @endforeach
</select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Stok Masuk</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
