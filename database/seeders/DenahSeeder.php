<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DenahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        // KB001 - KB005
        for ($i = 1; $i <= 5; $i++) {
            $data[] = [
                'denah_id' => 'KB' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'blok' => 'KB',
                'tenant_id' => null,
                'posisi_x' => 0,
                'posisi_y' => 0,
            ];
        }

        // KK007 - KK021
        for ($i = 7; $i <= 21; $i++) {
            $data[] = [
                'denah_id' => 'KK' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'blok' => 'KK',
                'tenant_id' => null,
                'posisi_x' => 0,
                'posisi_y' => 0,
            ];
        }

        // L001 - L109
        for ($i = 1; $i <= 109; $i++) {
            $data[] = [
                'denah_id' => 'L' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'blok' => 'L',
                'tenant_id' => null,
                'posisi_x' => 0,
                'posisi_y' => 0,
            ];
        }

        DB::table('denah')->insert($data);
    }
}
