@extends('layouts.app')

@section('content')
<div class="wizard-steps">
    <div class="wizard-step completed">
        <div class="wizard-step-circle"><i class="bi bi-check"></i></div>
        <div class="wizard-step-label">Isi Form</div>
    </div>
    <div class="wizard-step active">
        <div class="wizard-step-circle">2</div>
        <div class="wizard-step-label">Konfirmasi Form</div>
    </div>
    <div class="wizard-step">
        <div class="wizard-step-circle">3</div>
        <div class="wizard-step-label">Ringkasan Transaksi</div>
    </div>
</div>

<div class="form-card">
    <h4 class="mb-4 fw-bold" style="color: var(--bca-dark-blue);">Data Pengirim</h4>

    <form action="{{ route('transfer.data-pengirim.store') }}" method="POST" id="formDataPengirim">
        @csrf

        <div class="mb-4">
            <label for="nomor_rekening" class="form-label">Nomor Rekening Pengirim <span class="text-danger">*</span></label>
            <input 
                type="text" 
                class="form-control" 
                id="nomor_rekening" 
                name="nomor_rekening" 
                placeholder="Masukkan nomor rekening"
                required
                autocomplete="off"
            >
            <div class="error-message" id="error-rekening">
                <i class="bi bi-exclamation-circle"></i> Rekening tidak ditemukan
            </div>
            <div class="spinner-border spinner-border-sm text-primary mt-2" role="status" id="loading-rekening" style="display: none;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="mb-4">
            <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
            <input 
                type="text" 
                class="form-control" 
                id="nama_pengirim" 
                name="nama_pengirim" 
                readonly
                placeholder="Masukan Nama Pengirim"
            >
        </div>

        <div class="mb-4">
            <label for="phone" class="form-label">Nomor Handphone Pengirim</label>
            <input 
                type="text" 
                class="form-control" 
                id="phone" 
                name="phone" 
                readonly
                placeholder="Masukan Nomor Handphone Pengirim"
            >
        </div>

        

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('transfer.metode') }}" class="btn btn-outline-bca">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-bca" id="btnNext" disabled>
                Selanjutnya <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    let debounceTimer;
    const nomorRekeningInput = document.getElementById('nomor_rekening');
    const namaPengirimInput = document.getElementById('nama_pengirim');
    const phoneInput = document.getElementById('phone');
    const errorMessage = document.getElementById('error-rekening');
    const loadingSpinner = document.getElementById('loading-rekening');
    const btnNext = document.getElementById('btnNext');

    nomorRekeningInput.addEventListener('input', function() {
        const nomorRekening = this.value.trim();

        // Reset
        namaPengirimInput.value = '';
        phoneInput.value = '';
        errorMessage.classList.remove('show');
        btnNext.disabled = true;

        // Clear previous timer
        clearTimeout(debounceTimer);

        if (nomorRekening.length === 0) {
            loadingSpinner.style.display = 'none';
            return;
        }

        // Show loading
        loadingSpinner.style.display = 'inline-block';

        // Debounce 500ms
        debounceTimer = setTimeout(() => {
            fetch(`/api/rekening/${nomorRekening}`)
                .then(response => response.json())
                .then(data => {
                    loadingSpinner.style.display = 'none';

                    if (data.nama && data.phone) {
                        // Success
                        namaPengirimInput.value = data.nama;
                        phoneInput.value = data.phone;
                        btnNext.disabled = false;
                        errorMessage.classList.remove('show');
                    } else {
                        // Not found
                        errorMessage.classList.add('show');
                        btnNext.disabled = true;
                    }
                })
                .catch(error => {
                    loadingSpinner.style.display = 'none';
                    errorMessage.classList.add('show');
                    btnNext.disabled = true;
                });
        }, 500);
    });
</script>
@endpush