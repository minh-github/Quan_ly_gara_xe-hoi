<?php

namespace Database\Seeders;

use App\Models\check;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            check::create([
                'TinhTrang' => '0',
                'TrangThaiCheck' => '0',
                'DenBu' => '0',
            ]);
        }
    }
}
