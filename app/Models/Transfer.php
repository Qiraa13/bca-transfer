<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'rekening_pengirim',
        'metode_pengiriman',
        'bank_tujuan',
        'nominal',
        'status',
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
    ];
}