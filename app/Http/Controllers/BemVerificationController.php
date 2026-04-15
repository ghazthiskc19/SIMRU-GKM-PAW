<?php

namespace App\Http\Controllers;

use App\Services\Bem\VerificationHistoryService;

class BemVerificationController extends Controller
{
    public function __construct(private readonly VerificationHistoryService $verificationHistoryService)
    {
    }

    public function index()
    {
        return view('bem.riwayat_verifikasi', $this->verificationHistoryService->getList('Oktober 2025'));
    }

    public function detail(int $id)
    {
        $detail = $this->verificationHistoryService->getDetailById($id);

        if (!$detail) {
            abort(404);
        }

        return view('bem.riwayat_verifikasi_detail', [
            'detail' => $detail,
        ]);
    }
}
