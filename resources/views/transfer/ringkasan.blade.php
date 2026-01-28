@extends('layouts.app')

@section('content')
<div class="wizard-steps">
    <div class="wizard-step completed">
        <div class="wizard-step-circle"><i class="bi bi-check"></i></div>
        <div class="wizard-step-label">Isi Form</div>
    </div>
    <div class="wizard-step completed">
        <div class="wizard-step-circle"><i class="bi bi-check"></i></div>
        <div class="wizard-step-label">Konfirmasi Form</div>
    </div>
    <div class="wizard-step completed">
        <div class="wizard-step-circle"><i class="bi bi-check"></i></div>
        <div class="wizard-step-label">Ringkasan Transaksi</div>
    </div>
</div>

<div class="form-card text-center">
    <div class="success-icon">
        <i class="bi bi-check-lg"></i>
    </div>

    <h3 class="fw-bold mb-3" style="color: var(--bca-dark-blue);">Transaksi Berhasil!</h3>
    <p class="text-muted mb-4">Transfer Anda telah diproses</p>

    <div class="text-start mt-5">
        <div class="summary-item">
            <span class="summary-label">Status</span>
            <span class="summary-value text-success">
                <i class="bi bi-check-circle-fill"></i> Berhasil
            </span>
        </div>

        <div class="summary-item">
            <span class="summary-label">Metode Pengiriman</span>
            <span class="summary-value">{{ $transfer->metode_pengiriman }}</span>
        </div>

        <div class="summary-item">
            <span class="summary-label">Waktu Transaksi</span>
            <span class="summary-value">{{ $transfer->created_at->format('d/m/Y H:i:s') }}</span>
        </div>

        <div class="summary-item">
            <span class="summary-label">Nama Pengirim</span>
            <span class="summary-value">{{ session('nama_pengirim') }}</span>
        </div>

        <div class="summary-item">
            <span class="summary-label">Nomor Rekening</span>
            <span class="summary-value">{{ $transfer->rekening_pengirim }}</span>
        </div>

        <div class="summary-item">
            <span class="summary-label">Nomor Handphone</span>
            <span class="summary-value">{{ session('phone') }}</span>
        </div>
    </div>

    <div class="mt-5">
        <a href="{{ route('transfer.reset') }}" class="btn btn-bca btn-lg">
            <i class="bi bi-house-door"></i> Kembali ke Beranda
        </a>
    </div>
</div>
@endsection