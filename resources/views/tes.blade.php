<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="transaksi-container">
        <div class="transaksi-header">
            <h2>Laporan</h2>
        </div>
        <div class="transaksi-details">
            <table style="width: 100%; margin-bottom: 30px">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Kode Kasir</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembali</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($transaksi_invoice as $item)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->kode_transaksi}}</td>
                    <td>{{$item->tanggal}}</td>
                    <td>{{$item->kode_kasir}}</td>
                    <td>{{$item->formatRupiah('total')}}</td>
                    <td>{{$item->formatRupiah('bayar')}}</td>
                    <td>{{$item->formatRupiah('kembali')}}</td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>