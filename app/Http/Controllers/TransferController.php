<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TransferController extends Controller
{
    public function menu(): View
    {
        return view('transfer.menu');
    }

    public function metode(): View
    {
        return view('transfer.metode');
    }

    public function storeMetode(Request $request): RedirectResponse
    {
        $request->validate([
            'metode_pengiriman' => 'required|in:BI-FAST',
        ]);

        session(['metode_pengiriman' => $request->metode_pengiriman]);

        return redirect()->route('transfer.data-pengirim');
    }

    public function dataPengirim(): View
    {
        if (!session('metode_pengiriman')) {
            return redirect()->route('transfer.metode');
        }

        return view('transfer.data_pengirim');
    }

    public function storeDataPengirim(Request $request): RedirectResponse
    {
        $request->validate([
            'nomor_rekening' => 'required|exists:rekenings,nomor_rekening',
            'nama_pengirim' => 'required',
            'phone' => 'required',
        ]);

        session([
            'nomor_rekening' => $request->nomor_rekening,
            'nama_pengirim' => $request->nama_pengirim,
            'phone' => $request->phone,
        ]);

        return redirect()->route('transfer.konfirmasi');
    }

    public function konfirmasi(): View
    {
        if (!session('nomor_rekening')) {
            return redirect()->route('transfer.metode');
        }

        return view('transfer.konfirmasi');
    }

    public function proses(Request $request): RedirectResponse
    {
        // Simpan transaksi
        Transfer::create([
            'rekening_pengirim' => session('nomor_rekening'),
            'metode_pengiriman' => session('metode_pengiriman'),
            'bank_tujuan' => 'Bank Lain',
            'nominal' => 0,
            'status' => 'berhasil',
        ]);

        session(['transfer_id' => Transfer::latest()->first()->id]);

        return redirect()->route('transfer.ringkasan');
    }

    public function ringkasan(): View
    {
        if (!session('transfer_id')) {
            return redirect()->route('home');
        }

        $transfer = Transfer::find(session('transfer_id'));

        return view('transfer.ringkasan', compact('transfer'));
    }

    public function reset(): RedirectResponse
    {
        session()->forget(['metode_pengiriman', 'nomor_rekening', 'nama_pengirim', 'phone', 'transfer_id']);
        return redirect()->route('home');
    }
}