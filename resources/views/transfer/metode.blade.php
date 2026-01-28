@extends('layouts.app')

@section('content')
<div class="wizard-steps">
    <div class="wizard-step active">
        <div class="wizard-step-circle">1</div>
        <div class="wizard-step-label">Isi Form</div>
    </div>
    <div class="wizard-step">
        <div class="wizard-step-circle">2</div>
        <div class="wizard-step-label">Konfirmasi Form</div>
    </div>
    <div class="wizard-step">
        <div class="wizard-step-circle">3</div>
        <div class="wizard-step-label">Ringkasan Transaksi</div>
    </div>
</div>

<div class="form-card">
    <h4 class="mb-4 fw-bold" style="color: var(--bca-dark-blue);">Transfer ke Bank Lain</h4>

    <form action="{{ route('transfer.metode.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="metode_pengiriman" class="form-label">Metode Pengiriman</label>
            <select class="form-control" id="metode_pengiriman" name="metode_pengiriman" required>
                <option value="BI-FAST" selected>BI-FAST</option>
            </select>
            <small class="text-muted">
                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#biayaModal">
                    Klik di sini untuk melihat info biaya
                </a>
            </small>
        </div>

        <div class="info-box">
            <i class="bi bi-info-circle-fill"></i>
            <strong>BI-FAST</strong> adalah metode transfer real-time ke bank lain dengan maksimal transfer Rp 250.000.000 per transaksi.
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('menu.transfer') }}" class="btn btn-outline-bca">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-bca">
                Selanjutnya <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </form>
</div>

<!-- Modal Info Biaya -->
<div class="modal fade" id="biayaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informasi Biaya BI-FAST</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nominal Transfer</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>s.d Rp 10.000.000</td>
                            <td>Rp 2.500</td>
                        </tr>
                        <tr>
                            <td>> Rp 10.000.000</td>
                            <td>Rp 5.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection