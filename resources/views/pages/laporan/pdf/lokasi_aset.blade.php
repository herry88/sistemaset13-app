<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Lokasi Aset</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { text-align: center; font-size: 18px; }
        h2 { font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        .text-center { text-align: center; }
        .text-end { text-align: right; }
        .footer { margin-top: 30px; text-align: right; font-size: 10px; }
    </style>
</head>
<body>
    <h1>LAPORAN LOKASI ASET</h1>
    <h2>Periode: {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d/m/Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama Lokasi</th>
                <th>Keterangan</th>
                <th class="text-end">Jumlah Aset</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lokasi as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lokasi }}</td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                    <td class="text-end">{{ $item->asets_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Total:</th>
                <th class="text-end">{{ $lokasi->sum('asets_count') }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('d/m/Y H:i:s') }}
    </div>
</body>
</html>
