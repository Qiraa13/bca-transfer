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
    <div class="wizard-step active">
        <div class="wizard-step-circle">3</div>
        <div class="wizard-step-label">Ringkasan Transaksi</div>
    </div>
</div>

<div class="form-card">
    <h4 class="mb-4 fw-bold" style="color: var(--bca-dark-blue);">Konfirmasi Transfer</h4>

    <div class="info-box mb-4">
        <i class="bi bi-info-circle-fill"></i>
        Harap periksa kembali data transfer Anda sebelum melanjutkan.
    </div>

    <div class="summary-item">
        <span class="summary-label">Metode Pengiriman</span>
        <span class="summary-value">{{ session('metode_pengiriman') }}</span>
    </div>

    <div class="summary-item">
        <span class="summary-label">Nama Pengirim</span>
        <span class="summary-value">{{ session('nama_pengirim') }}</span>
    </div>

    <div class="summary-item">
        <span class="summary-label">Nomor Rekening</span>
        <span class="summary-value">{{ session('nomor_rekening') }}</span>
    </div>

    <div class="summary-item">
        <span class="summary-label">Nomor Handphone</span>
        <span class="summary-value">{{ session('phone') }}</span>
    </div>

    <form action="{{ route('transfer.proses') }}" method="POST" class="mt-4">
        @csrf
        <div class="d-flex justify-content-between">
            <a href="{{ route('transfer.data-pengirim') }}" class="btn btn-outline-bca">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-bca">
                <i class="bi bi-check-circle"></i> Konfirmasi
            </button>
        </div>
    </form>
</div>
@endsection