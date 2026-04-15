<?php

namespace App\Http\Controllers;

class StudentHistoryController extends Controller
{
    public function index()
    {
        return view('riwayat_peminjaman');
    }
}
