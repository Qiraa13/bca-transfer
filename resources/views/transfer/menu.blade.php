@extends('layouts.app')

@section('content')
<div class="mb-4">
    <a href="{{ route('home') }}" class="btn btn-outline-bca">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="text-center mb-5">
    <h2 class="fw-bold" style="color: var(--bca-dark-blue);">Transfer</h2>
    <p class="text-muted">Pilih jenis transfer yang ingin dilakukan</p>
</div>

<div class="row g-4 justify-content-center">
    <div class="col-md-5">
        <a href="{{ route('transfer.metode') }}" class="text-decoration-none">
            <div class="card card-menu">
                <div class="card-body">
                    <i class="bi bi-bank2"></i>
                    <h5>Transfer ke Bank Lain</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-5">
        <div class="card card-menu">
            <div class="card-body">
                <i class="bi bi-building"></i>
                <h5>Transfer ke Rekening BCA</h5>
            </div>
        </div>
    </div>
</div>
@endsection