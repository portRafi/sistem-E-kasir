@extends('layout.app')

@section('title', ' - Daftar Promo')

@section('content')
<div class="container">
    <h1>Daftar Promo</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card-header bg-white">
    <h4 class="position-absolute">Daftar Promo</h4>
    <div class="card-header-form float-right">
        <a href="{{ route('promo.create') }}" class="btn btn-sm btn-outline-success">
            <i class="fa fa-plus"></i> Tambah Promo
        </a>
    </div>
</div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Promo</th>
                <th>Barang Dibeli</th>
                <th>Jumlah</th>
                <th>Barang Bonus</th>
                <th>Jumlah Bonus</th>
                <th>Berlaku Sampai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promos as $promo)
            <tr>
                <td>{{ $promo->nama_promo }}</td>
                <td>{{ $promo->barangBeli->nama ?? '-' }}</td>
                <td>{{ $promo->jumlah_beli }}</td>
                <td>{{ $promo->barangBonus->nama ?? '-' }}</td>
                <td>{{ $promo->jumlah_bonus }}</td>
                <td>{{ $promo->berlaku_sampai }}</td>
                <td>
                <a href="{{ route('promo.edit', ['level' => auth()->user()->level, 'promo' => $promo->id]) }}">
                    <button type="button" class="btn btn-sm btn-warning">Edit</button>
                </a>
                <form action="{{ route('promo.destroy', ['level' => auth()->user()->level, 'promo' => $promo->id]) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus promo ini?')">Hapus</button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection