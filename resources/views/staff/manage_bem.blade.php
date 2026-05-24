@extends('layouts.app')

@section('title', 'Manage BEM - Sistem Informasi Manajemen Ruangan GKM')

@push('styles')
	@vite(['resources/css/list_ruangan_style.css', 'resources/js/list_ruangan.js'])
	<style>
		.btn-wrapper-crud {
			display: flex;
			gap: 12px;
			width: 100%;
		}

		.btn-wrapper-crud .btn-crud {
			flex: 1;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			padding: 10px 14px;
			border: 0;
			border-radius: 12px;
			font-weight: 600;
			text-decoration: none;
			cursor: pointer;
		}

		.btn-wrapper-crud .btn-create {
			background: #2f6f4e;
			color: #fff;
		}

		.btn-wrapper-crud .btn-edit {
			background: #f0b429;
			color: #1f1f1f;
		}

		.btn-wrapper-crud .btn-delete {
			background: #d64545;
			color: #ffffff;
		}

		.bem-avatar {
			width: 54px;
			height: 54px;
			border-radius: 50%;
			object-fit: cover;
			background: rgba(255,255,255,0.12);
			flex-shrink: 0;
		}
	</style>
@endpush

@section('page')
	@php
		$userRole = auth()->user()?->role;
	@endphp
	@include('partials.header', ['id' => 2, 'judul' => 'Manage BEM', 'kembaliKe' => '/menu'])

	<div class="content list-ruangan-content">
		@if($userRole == 'administrasi')
			<div class="btn-wrapper-crud" style="margin-bottom: 16px;">
				<a href="{{ route('staff.bem.create') }}" class="btn-crud btn-create">Create BEM</a>
			</div>
		@endif

		<section class="ruangan-list" aria-label="Daftar akun BEM yang tersedia">
			@foreach($DataBem as $bem)
				<article class="ruangan-card" data-bem-id="{{ $bem->id_bem }}">
					<div class="ruangan-card-header">
						<div class="ruangan-thumbnail">
							<img class="bem-avatar" src="{{ $bem->foto ? asset('storage/'.$bem->foto) : asset('images/hero_ruangan.png') }}" alt="Foto {{ $bem->name }}">
						</div>
						<div class="ruangan-info">
							<h2 class="ruangan-name">{{ $bem->name }}</h2>
							<button class="ruangan-toggle" type="button" aria-expanded="false" aria-label="Lihat detail {{ $bem->name }}">
								<span>Detail Akun</span>
								<img src="{{ asset('images/icon_arrow_down.svg') }}" alt="" aria-hidden="true">
							</button>
						</div>
					</div>

					<div class="ruangan-details" hidden>
						<div class="ruangan-detail-content">
							<p><strong>NIM:</strong> <span class="detail-capacity">{{ $bem->nim }}</span></p>
							<p><strong>Email:</strong> <span class="detail-facilities">{{ $bem->email }}</span></p>
							<p><strong>Program Studi:</strong> <span class="detail-facilities">{{ $bem->prodi }}</span></p>
							<p><strong>Jabatan:</strong> <span class="detail-facilities">{{ $bem->jabatan }}</span></p>
						</div>

						@if($userRole == 'administrasi')
							<div class="btn-wrapper-crud">
								<a href="{{ route('staff.bem.edit', ['id' => $bem->id_bem]) }}" class="btn-crud btn-edit">Edit</a>
												<form action="{{ route('staff.bem.destroy', ['id' => $bem->id_bem]) }}" method="POST" data-confirm-submit="Yakin ingin menghapus akun BEM ini?" style="flex:1; margin:0;">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn-crud btn-delete" style="width:100%;">Delete</button>
								</form>
							</div>
						@endif
					</div>
				</article>
			@endforeach
		</section>
	</div>

	@include('partials.bottom-nav', ['active' => 'menu'])
@endsection
