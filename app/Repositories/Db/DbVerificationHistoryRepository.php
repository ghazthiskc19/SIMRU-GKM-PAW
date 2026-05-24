<?php

namespace App\Repositories\Db;

use App\Models\Peminjaman;
use App\Models\ruangan;
use App\Repositories\Contracts\VerificationHistoryRepositoryInterface;

class DbVerificationHistoryRepository implements VerificationHistoryRepositoryInterface
{
    public function all(): array
    {
        return Peminjaman::orderBy('tanggal_pengajuan', 'desc')
            ->get()
            ->map(fn (Peminjaman $item) => $this->mapItem($item))
            ->toArray();
    }

    public function findById(int $id): ?array
    {
        $item = Peminjaman::find($id);

        return $item ? $this->mapItem($item) : null;
    }

    private function mapItem(Peminjaman $item): array
    {
        $status = $this->mapStatus($item->status_peminjaman);
        $waktuMulai = strtotime($item->waktu_mulai);
        $waktuSelesai = strtotime($item->waktu_selesai);

        // Get user data
        $user = \App\Models\User::find($item->id_users);

        return [
            'id' => $item->id_peminjaman,
            'ruangan' => $this->resolveRuanganName($item->id_ruangan),
            'hari_tanggal' => $this->formatTanggalPemakaian($waktuMulai),
            'jam_mulai' => $waktuMulai ? date('H.i', $waktuMulai) : null,
            'jam_selesai' => $waktuSelesai ? date('H.i', $waktuSelesai) : null,
            'status_text' => $status['text'],
            'status_title' => $status['title'],
            'status_badge_class' => $status['badge'],
            'footer' => $status['footer'],
            'tanggal_pengajuan' => $item->tanggal_pengajuan,
            // Detail fields
            'nama' => $user?->name ?? 'Pengguna Tidak Diketahui',
            'nim' => $user?->nim ?? '-',
            'program_studi' => $user?->prodi ?? '-',
            'tanggal_pemakaian' => $this->formatTanggalPemakaian($waktuMulai),
            'jam_mulai_lengkap' => $waktuMulai ? date('H:i', $waktuMulai) : '-',
            'jam_selesai_lengkap' => $waktuSelesai ? date('H:i', $waktuSelesai) : '-',
            'alasan_peminjaman' => $item->nama_kegiatan ?? '-',
            'sarana_prasarana' => '-',
            'alat_tambahan' => '-',
            'dokumen' => $item->path_surat ? [$item->path_surat] : [],
            'catatan_verifikasi' => $item->alasan_penolakan ?? '-',
        ];
    }

    private function resolveRuanganName(?int $id): string
    {
        if (!$id) {
            return 'Ruangan Tidak Diketahui';
        }

        $ruangan = ruangan::find($id);

        return $ruangan?->nama_ruangan ?? 'GKM ' . $id;
    }

    private function formatTanggalPemakaian(int $timestamp): string
    {
        if (!$timestamp) {
            return '';
        }

        $hari = $this->indonesianDayName($timestamp);
        $tanggal = date('j', $timestamp);
        $bulan = $this->indonesianMonthName((int) date('n', $timestamp));
        $tahun = date('Y', $timestamp);

        return sprintf('%s, %s %s %s', $hari, $tanggal, $bulan, $tahun);
    }

    private function indonesianDayName(int $timestamp): string
    {
        $days = [
            'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
        ];

        return $days[(int) date('w', $timestamp)];
    }

    private function indonesianMonthName(int $month): string
    {
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return $months[$month] ?? $months[1];
    }

    private function mapStatus(?string $status): array
    {
        return match ($status) {
            'Proses Pengajuan' => [
                'text' => 'Menunggu Verifikasi',
                'title' => 'Laporan Sedang Ditinjau',
                'badge' => 'badge-warning',
                'footer' => 'Pengajuan masih menunggu proses verifikasi.',
            ],
            'Sudah Terverifikasi' => [
                'text' => 'Telah diverifikasi',
                'title' => 'Peminjaman Terverifikasi',
                'badge' => 'badge-success',
                'footer' => 'Peminjaman telah diverifikasi oleh BEM.',
            ],
            'Sudah Tervalidasi/Disetujui', 'Disetujui' => [
                'text' => 'Telah diverifikasi',
                'title' => 'Peminjaman Disetujui',
                'badge' => 'badge-success',
                'footer' => 'Peminjaman sudah disetujui.',
            ],
            'Ditolak' => [
                'text' => 'Ditolak/Dibatalkan',
                'title' => 'Laporan Ditolak / Dibatalkan',
                'badge' => 'badge-danger',
                'footer' => 'Pengajuan peminjaman telah ditolak.',
            ],
            default => [
                'text' => $status ?: 'Status Tidak Diketahui',
                'title' => $status ?: 'Status Tidak Diketahui',
                'badge' => 'badge-info',
                'footer' => null,
            ],
        };
    }
}
