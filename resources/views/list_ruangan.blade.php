@extends('layouts.app')

@section('title', 'List Ruangan - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
    @vite(['resources/css/list_ruangan_style.css', 'resources/js/list_ruangan.js'])
@endpush

@section('page')
    @php
        $userRole = auth()->user()?->role;
    @endphp
    @include('partials.header', ['id' => 2, 'judul' => 'List Ruangan', 'kembaliKe' => '/menu'])

    <div class="content list-ruangan-content">
        <section class="ruangan-list" aria-label="Daftar ruangan yang tersedia">
            @if($userRole == 'administrasi')
                <div class="btn-wrapper-crud">
                    <a href="{{ route('staff.ruangan.create') }}" class="btn-crud btn-edit">Create Ruangan</a>
                </div>
            @endif
            @foreach($DataRuangan as $ruangan)
                @php
                 $thumbnail = $ruangan->path_images
                @endphp
                <article class="ruangan-card" data-ruangan-id="{{ $ruangan->id_ruangan }}">
                    <div class="ruangan-card-header">
                        <div class="ruangan-thumbnail"></div>
                        <div class="ruangan-info">
                            <h2 class="ruangan-name">{{ $ruangan->nama_ruangan }}</h2>
                            <button class="ruangan-toggle" type="button" aria-expanded="false" aria-label="Lihat detail {{ $ruangan->nama_ruangan }}">
                                <span>Detail Ruangan</span>
                                <img src="{{ asset('images/icon_arrow_down.svg') }}" alt="" aria-hidden="true">
                            </button>
                        </div>
                    </div>
                    
                    <div class="ruangan-details" hidden>
                        <div class="ruangan-detail-content">
                            <p><strong>Ukuran Ruangan:</strong> <span class="detail-capacity">{{ $ruangan->kapasitas }}</span></p>
                            <p><strong>Fasilitas:</strong> <span class="detail-facilities">{{ $ruangan->fasilitas}}</span></p>
                        </div>
                        @if($userRole == 'administrasi')
                            <div class="btn-wrapper-crud">
                                <a href="{{ route('staff.ruangan.edit-ruangan', ['id' => $ruangan->id_ruangan]) }}" class="btn-crud btn-edit">Edit</a>
                                <form action="{{ route('staff.ruangan.delete', ['id' => $ruangan->id_ruangan]) }}" method="GET" data-confirm-submit="Yakin ingin menghapus ruangan ini?" style="flex:1; margin:0;">
                                    <button type="submit" class="btn-crud btn-delete" style="width:100%;">Delete</button>
                                </form>
                            </div>
                        @endif
                        <button class="btn-detail-ruangan" type="button" data-ruangan-id="{{ $ruangan->id_ruangan }}">Lihat Detail Ruangan</button>
                    </div>
                </article>
            @endforeach
        </section>
    </div>

    @include('partials.bottom-nav', ['active' => 'menu'])
@endsection
