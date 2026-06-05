<?php

namespace App\Http\Controllers;

use App\Services\Bem\VerificationHistoryService;
use Illuminate\Http\Request;

class BemVerificationController extends Controller
{
    public function __construct(private readonly VerificationHistoryService $verificationHistoryService)
    {
    }

    public function index(Request $request)
    {
        return view('bem.riwayat_verifikasi', $this->verificationHistoryService->getList($request->query('month')));
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
