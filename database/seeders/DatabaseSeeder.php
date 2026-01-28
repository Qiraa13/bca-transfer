<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Rekening;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User 1
        $user1 = User::create([
            'name' => 'Budi Santoso',
            'phone' => '081234567890',
        ]);

        Rekening::create([
            'user_id' => $user1->id,
            'nomor_rekening' => '1234567890',
            'saldo' => 10000000.00,
        ]);

        // User 2
        $user2 = User::create([
            'name' => 'Siti Nurhaliza',
            'phone' => '082345678901',
        ]);

        Rekening::create([
            'user_id' => $user2->id,
            'nomor_rekening' => '0987654321',
            'saldo' => 5000000.00,
        ]);

        // User 3
        $user3 = User::create([
            'name' => 'Ahmad Fauzi',
            'phone' => '083456789012',
        ]);

        Rekening::create([
            'user_id' => $user3->id,
            'nomor_rekening' => '5555666677',
            'saldo' => 15000000.00,
        ]);

        // User 4
        $user4 = User::create([
            'name' => 'Dewi Lestari',
            'phone' => '084567890123',
        ]);

        Rekening::create([
            'user_id' => $user4->id,
            'nomor_rekening' => '9876543210',
            'saldo' => 8000000.00,
        ]);
    }
}