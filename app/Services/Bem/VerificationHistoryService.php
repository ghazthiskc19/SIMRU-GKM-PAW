<?php

namespace App\Services\Bem;

use App\DTOs\Verification\VerificationHistoryItem;
use App\Repositories\Contracts\VerificationHistoryRepositoryInterface;

class VerificationHistoryService
{
    public function __construct(private readonly VerificationHistoryRepositoryInterface $repository)
    {
    }

    public function getList(): array
    {
        $now = new \DateTimeImmutable();
        $currentMonth = $now->format('m');
        $currentYear = $now->format('Y');

        $allowedStatuses = [
            'Sudah Terverifikasi',
            'Sudah Tervalidasi/Disetujui',
            'Disetujui',
        ];

        $items = array_filter(
            array_map(
                static fn (array $item) => VerificationHistoryItem::fromArray($item)->toArray(),
                $this->repository->all()
            ),
            static function (array $item) use ($currentMonth, $currentYear, $allowedStatuses) {
                return !empty($item['tanggal_pengajuan'])
                    && in_array($item['status_raw'] ?? '', $allowedStatuses, true)
                    && date('m', strtotime($item['tanggal_pengajuan'])) === $currentMonth
                    && date('Y', strtotime($item['tanggal_pengajuan'])) === $currentYear;
            }
        );

        return [
            'selectedMonth' => $this->formatMonthLabel($now),
            'items' => array_values($items),
        ];
    }

    private function formatMonthLabel(\DateTimeInterface $date): string
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

        return sprintf('%s %s', $months[(int) $date->format('m')] ?? $date->format('F'), $date->format('Y'));
    }

    public function getDetailById(int $id): ?array
    {
        $item = $this->repository->findById($id);
        if (!$item) {
            return null;
        }

        $detail = VerificationHistoryItem::fromArray($item)->toArray();
        $allowedStatuses = [
            'Sudah Terverifikasi',
            'Sudah Tervalidasi/Disetujui',
            'Disetujui',
        ];

        if (!in_array($detail['status_raw'] ?? '', $allowedStatuses, true)) {
            return null;
        }

        return $detail;
    }
}
