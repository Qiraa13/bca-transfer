@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
    <h2 class="fw-bold" style="color: var(--bca-dark-blue);">Selamat Datang di e-Branch BCA</h2>
    <p class="text-muted">Pilih layanan yang Anda butuhkan</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card card-menu">
            <div class="card-body">
                <i class="bi bi-cash-stack"></i>
                <h5>Transaksi Tunai</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <a href="{{ route('menu.transfer') }}" class="text-decoration-none">
            <div class="card card-menu">
                <div class="card-body">
                    <i class="bi bi-arrow-left-right"></i>
                    <h5>Transfer</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <div class="card card-menu">
            <div class="card-body">
                <i class="bi bi-file-earmark-text"></i>
                <h5>Warkat</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-menu">
            <div class="card-body">
                <i class="bi bi-currency-exchange"></i>
                <h5>Valuta Asing</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-menu">
            <div class="card-body">
                <i class="bi bi-star-fill"></i>
                <h5>Layanan Prioritas</h5>
            </div>
        </div>
    </div>
</div>
@endsection