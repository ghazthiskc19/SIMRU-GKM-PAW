<?php

namespace App\Services\Bem;

use App\DTOs\Verification\VerificationHistoryItem;
use App\Repositories\Contracts\VerificationHistoryRepositoryInterface;

class VerificationHistoryService
{
    public function __construct(private readonly VerificationHistoryRepositoryInterface $repository)
    {
    }

    public function getList(?string $month = null): array
    {
        $selectedDate = $this->resolveSelectedDate($month);
        $selectedMonth = $this->formatMonthLabel($selectedDate);

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
            static function (array $item) use ($selectedDate, $allowedStatuses) {
                return !empty($item['tanggal_pengajuan'])
                    && in_array($item['status_raw'] ?? '', $allowedStatuses, true)
                    && date('Y-m', strtotime($item['tanggal_pengajuan'])) === $selectedDate->format('Y-m');
            }
        );

        $previousMonth = $selectedDate->modify('-1 month')->format('Y-m');
        $nextMonth = $selectedDate->modify('+1 month')->format('Y-m');

        return [
            'selectedMonth' => $selectedMonth,
            'items' => array_values($items),
            'previousMonth' => $previousMonth,
            'nextMonth' => $nextMonth,
        ];
    }

    private function resolveSelectedDate(?string $month): \DateTimeImmutable
    {
        if ($month && preg_match('/^\d{4}-\d{2}$/', $month)) {
            $date = \DateTimeImmutable::createFromFormat('Y-m-d', $month . '-01');
            if ($date !== false) {
                return $date;
            }
        }

        return new \DateTimeImmutable('first day of this month');
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
