<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\JsonResponse;

class RekeningController extends Controller
{
    public function show(string $nomorRekening): JsonResponse
    {
        $rekening = Rekening::with('user')
            ->where('nomor_rekening', $nomorRekening)
            ->first();

        if (!$rekening) {
            return response()->json([
                'message' => 'Rekening tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'nama' => $rekening->user->name,
            'phone' => $rekening->user->phone,
        ]);
    }
}