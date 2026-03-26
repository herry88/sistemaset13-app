<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Aset</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        h1 { text-align: center; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; font-size: 9px; }
        th { background-color: #f0f0f0; }
        .text-center { text-align: center; }
        .text-end { text-align: right; }
        .footer { margin-top: 30px; text-align: right; font-size: 10px; }
    </style>
</head>
<body>
    <h1>LAPORAN ASET</h1>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kode</th>
                <th>Nama Aset</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Kondisi</th>
                <th>Jml</th>
                <th>Tanggal</th>
                <th class="text-end">Harga</th>
            </tr>
        </thead>
        <tbody>
            @forelse($asets as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_aset }}</td>
                    <td>{{ $item->nama_aset }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $item->lokasi->nama_lokasi ?? '-' }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td class="text-center">{{ $item->jumlah }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_perolehan)->format('d/m/Y') }}</td>
                    <td class="text-end">Rp {{ number_format($item->harga_perolehan, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="8" class="text-end">Total:</th>
                <th class="text-end">Rp {{ number_format($asets->sum('harga_perolehan'), 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('d/m/Y H:i:s') }}
    </div>
</body>
</html>
