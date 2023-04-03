<?php

namespace Database\Seeders;

use App\Models\typeCar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypecarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            typeCar::create([
                'TenLoaiXe' => Str::random(8),
            ]);
        }
    }
}
