<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px 8px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Peminjaman Ruangan</h2>
        <p>Tanggal: {{ date('d-m-Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Nama Pemohon</th>
                <th>Ruangan</th>
                <th>Status</th>
                <th>Alasan Penolakan</th>
                <th>Nama Kegiatan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
            </tr>
        </thead>
        <tbody>
            @forelse (($items ?? []) as $row)
                <tr>
                    <td>{{ $row['id_peminjaman'] }}</td>
                    <td>{{ $row['nama'] }}</td>
                    <td>{{ $row['ruangan'] }}</td>
                    <td>{{ $row['status'] }}</td>
                    <td>{{ $row['alasan_penolakan'] ?? '-' }}</td>
                    <td>{{ $row['nama_kegiatan'] ?? '-' }}</td>
                    <td>{{ $row['waktu_mulai'] ?? '-' }}</td>
                    <td>{{ $row['waktu_selesai'] ?? '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="8" style="text-align:center">Tidak ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
