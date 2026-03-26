<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Mutasi Aset</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10px; }
        h1 { text-align: center; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; font-size: 9px; }
        th { background-color: #f0f0f0; }
        .text-center { text-align: center; }
        .footer { margin-top: 30px; text-align: right; font-size: 10px; }
    </style>
</head>
<body>
    <h1>LAPORAN MUTASI ASET</h1>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Lokasi Asal</th>
                <th>Lokasi Tujuan</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mutasis as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->aset->kode_aset ?? '-' }}</td>
                    <td>{{ $item->aset->nama_aset ?? '-' }}</td>
                    <td>{{ $item->lokasiAsal->nama_lokasi ?? '-' }}</td>
                    <td>{{ $item->lokasiTujuan->nama_lokasi ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mutasi)->format('d/m/Y') }}</td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('d/m/Y H:i:s') }}
    </div>
</body>
</html>
