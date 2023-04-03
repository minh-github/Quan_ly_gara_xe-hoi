<?php

namespace Database\Seeders;

use App\Models\brands;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            brands::create([
                'TenThuongHieu' => Str::random(8),
                'idQuocGia' =>  '1',
            ]);
        }
    }
}
