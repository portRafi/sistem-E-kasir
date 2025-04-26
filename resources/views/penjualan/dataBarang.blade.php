<!-- Modal -->
<div class="modal fade" id="data-barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title text-primary" id="exampleModalLabel">
                    <i class="fas fa-boxes mr-2"></i>Data Barang
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="searchInput" placeholder="Cari barang...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div style="overflow-y: scroll; max-height: 400px;">
                            <table class="table table-hover table-striped" id="table">
                                <thead class="thead-light sticky-top">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Stok</th>
                                        <th class="text-center">Diskon</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $item)
                                    <tr>
                                        <form action="/{{auth()->user()->level}}/penjualan/store" method="POST">
                                            @csrf
                                            <td class="text-center align-middle">
                                                {{$loop->iteration}}
                                                <input class="form-control" type="text" value="{{$nomor}}" name="kode_transaksi" hidden>
                                            </td>
                                            <td class="align-middle">
                                                <strong>{{$item->nama}}</strong>
                                                <input class="form-control" type="text" value="{{$item->id}}" name="barang_id" hidden>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-dark font-weight-bold">{{$item->formatRupiah('harga_jual')}}</span>
                                                <input class="form-control" type="text" value="{{$item->harga_jual}}" name="harga" hidden>
                                            </td>
                                            <td style="width: 15%" class="align-middle">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-outline-secondary qty-btn" onclick="decrementQty(this)">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input class="form-control text-center jumlah" type="number" name="jumlah" id="jumlah" value="1" min="1" max="{{$item->stok}}">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-outline-secondary qty-btn" onclick="incrementQty(this, {{$item->stok}})">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            @if($item->stok > 0)
                                            <td class="text-center align-middle">
                                                <span class="badge badge-success px-2 py-1">{{$item->stok}}</span>
                                                <input type="text" value="{{$item->stok}}" hidden>
                                                <input class="form-control" type="text" value="1" hidden>
                                            </td>
                                            @endif
                                            @if($item->stok <= 0)
                                            <td class="text-center align-middle">
                                                <span class="badge badge-danger px-2 py-1">Stok Habis</span>
                                            </td>
                                            @endif
                                            <td class="text-center align-middle">
                                                @if($item->diskon > 0)
                                                <span class="badge badge-warning text-dark px-2 py-1">{{$item->diskon}}%</span>
                                                @else
                                                <span class="badge badge-light px-2 py-1">0%</span>
                                                @endif
                                                <input class="form-control" type="text" value="{{$item->diskon}}" name="diskon" hidden>
                                            </td>
                                            @if($item->stok <= 0)
                                            <td class="text-center align-middle">
                                                <button type="submit" id="tambah" class="btn btn-sm btn-danger" disabled>
                                                    <i class="fa fa-plus"></i> Tambah
                                                </button>
                                            </td>
                                            @endif
                                            @if($item->stok > 0)
                                            <td class="text-center align-middle">
                                                <button type="submit" id="tambah" class="btn btn-sm btn-success">
                                                    <i class="fa fa-plus"></i> Tambah
                                                </button>
                                            </td>
                                            @endif
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function incrementQty(button, maxStock) {
    let input = button.parentNode.parentNode.querySelector('input');
    if (parseInt(input.value) < maxStock) {
        input.value = parseInt(input.value) + 1;
    }
}

function decrementQty(button) {
    let input = button.parentNode.parentNode.querySelector('input');
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
    }
}

// Fungsi pencarian
document.getElementById('searchInput').addEventListener('keyup', function() {
    let input = this.value.toLowerCase();
    let rows = document.querySelectorAll('#table tbody tr');
    
    rows.forEach(function(row) {
        let text = row.textContent.toLowerCase();
        if(text.includes(input)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>