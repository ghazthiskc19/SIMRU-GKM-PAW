<?php

namespace App\Http\Controllers;

class StudentHistoryController extends Controller
{
    public function index()
    {
        return view('riwayat_peminjaman', [
            'items' => $this->historyItems(),
        ]);
    }

    public function detail(int $id)
    {
        $item = collect($this->historyItems())->firstWhere('id', $id);

        if (!$item) {
            abort(404);
        }

        return view('riwayat_peminjaman_detail', [
            'item' => $item,
        ]);
    }

    public function laporanIndex()
    {
        return view('riwayat_laporan', [
            'items' => $this->laporanItems(),
        ]);
    }

    public function laporanDetail(int $id)
    {
        $item = collect($this->laporanItems())->firstWhere('id', $id);

        if (!$item) {
            abort(404);
        }

        return view('riwayat_laporan_detail', [
            'item' => $item,
        ]);
    }

    private function historyItems(): array
    {
        return [
            [
                'id' => 1,
                'ruangan' => 'GKM 4.1',
                'hari_tanggal' => 'Senin, 20 Oktober 2025',
                'pukul' => '07.00 - 10.00',
                'status' => 'Proses Pengajuan',
                'status_class' => 'badge-warning',
                'footer' => 'Dalam Proses Verifikasi oleh Staff AdKeu BEM',
                'status_title' => 'Verifikasi Sedang Berlangsung',
                'status_time' => '20 Oct 2025 | 10.45 WIB',
                'tanggal' => '20 Oktober 2025',
                'waktu' => '07.00 - 10.00 WIB',
                'tempat' => 'GKM 4.1',
                'kegiatan' => 'Kegiatan Organisasi',
                'lembaga' => 'HMDTIF',
                'description' => [
                    'Surat peminjaman ruangan sudah terkirim ke sistem dan sedang diverifikasi oleh Staff Administrasi dan Keuangan BEM Filkom.',
                    'Status pengajuan saat ini adalah <strong>proses pengajuan</strong>. Anda dapat menunggu pembaruan status selanjutnya pada halaman riwayat.',
                ],
            ],
            [
                'id' => 2,
                'ruangan' => 'GKM 4.1',
                'hari_tanggal' => 'Jumat, 17 Oktober 2025',
                'pukul' => '07.00 - 10.00',
                'status' => 'Ditolak/Dibatalkan',
                'status_class' => 'badge-danger',
                'footer' => 'Alasan Penolakan: Konflik Jadwal dengan Kuliah Tamu',
                'status_title' => 'Pengajuan Ditolak',
                'status_time' => '17 Oct 2025 | 14.20 WIB',
                'tanggal' => '17 Oktober 2025',
                'waktu' => '07.00 - 10.00 WIB',
                'tempat' => 'GKM 4.1',
                'kegiatan' => 'Rapat Koordinasi',
                'lembaga' => 'HMDTIF',
                'description' => [
                    'Pengajuan peminjaman tidak dapat diproses karena ruangan sudah digunakan untuk kegiatan lain pada jadwal yang sama.',
                    'Silakan lakukan pengajuan ulang pada waktu atau ruangan yang berbeda agar proses verifikasi dapat dilanjutkan.',
                ],
            ],
            [
                'id' => 3,
                'ruangan' => 'GKM 4.1',
                'hari_tanggal' => 'Kamis, 16 Oktober 2025',
                'pukul' => '07.00 - 10.00',
                'status' => 'Selesai Dipinjam',
                'status_class' => 'badge-success',
                'footer' => '',
                'status_title' => 'Peminjaman Selesai',
                'status_time' => '16 Oct 2025 | 11.30 WIB',
                'tanggal' => '16 Oktober 2025',
                'waktu' => '07.00 - 10.00 WIB',
                'tempat' => 'GKM 4.1',
                'kegiatan' => 'Workshop',
                'lembaga' => 'HMDTIF',
                'description' => [
                    'Peminjaman ruangan telah selesai dilaksanakan sesuai jadwal yang diajukan.',
                    'Terima kasih telah menggunakan SIMRU GKM. Anda dapat membuat pengajuan baru kapan saja melalui menu peminjaman.',
                ],
            ],
        ];
    }

    private function laporanItems(): array
    {
        return [
            [
                'id' => 1,
                'ruangan' => 'GKM 4.1',
                'hari_tanggal' => 'Senin, 20 Oktober 2025',
                'pukul' => '07.00 - 10.00',
                'status' => 'Sedang Ditinjau',
                'status_class' => 'badge-warning',
                'footer' => 'Dalam Proses Verifikasi dan Review oleh Staff Filkom',
                'status_title' => 'Laporan Sedang Ditinjau',
                'status_time' => '20 Oct 2025 | 17.05 WIB',
                'tanggal' => '20 Oktober 2025',
                'waktu' => '07.00 - 10.00 WIB',
                'tempat' => 'GKM 4.1',
                'kegiatan' => 'Workshop',
                'lembaga' => 'HMDTIF',
                'description' => [
                    'Laporan masalah sedang ditinjau oleh Staff Perlengkapan Filkom.',
                    'Harap menunggu hingga proses verifikasi dan review selesai. Pembaruan status akan muncul pada riwayat laporan.',
                ],
            ],
            [
                'id' => 2,
                'ruangan' => 'GKM 4.2',
                'hari_tanggal' => 'Jumat, 17 Oktober 2025',
                'pukul' => '07.00 - 10.00',
                'status' => 'Ditolak/Dibatalkan',
                'status_class' => 'badge-danger',
                'footer' => 'Alasan Penolakan: Tidak sesuai dengan ketentuan',
                'status_title' => 'Laporan Ditolak',
                'status_time' => '17 Oct 2025 | 15.30 WIB',
                'tanggal' => '17 Oktober 2025',
                'waktu' => '07.00 - 10.00 WIB',
                'tempat' => 'GKM 4.2',
                'kegiatan' => 'Rapat Divisi',
                'lembaga' => 'HMDTIF',
                'description' => [
                    'Laporan tidak dapat diproses karena detail permasalahan belum memenuhi ketentuan pelaporan.',
                    'Silakan kirim ulang laporan dengan informasi yang lebih lengkap agar dapat ditinjau kembali.',
                ],
            ],
            [
                'id' => 3,
                'ruangan' => 'GKM 4.1',
                'hari_tanggal' => 'Kamis, 16 Oktober 2025',
                'pukul' => '07.00 - 10.00',
                'status' => 'Selesai',
                'status_class' => 'badge-success',
                'footer' => '',
                'status_title' => 'Laporan Selesai',
                'status_time' => '16 Oct 2025 | 12.10 WIB',
                'tanggal' => '16 Oktober 2025',
                'waktu' => '07.00 - 10.00 WIB',
                'tempat' => 'GKM 4.1',
                'kegiatan' => 'Kegiatan Organisasi',
                'lembaga' => 'HMDTIF',
                'description' => [
                    'Laporan masalah telah selesai diproses oleh pihak terkait.',
                    'Tindak lanjut sudah dilakukan dan kondisi ruangan dinyatakan normal kembali.',
                ],
            ],
        ];
    }
}
