<?php

namespace Database\Seeders;

use App\Models\cars;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            cars::create([
                'TenXe' => Str::random(7),
                'idLoaiXe' => $i,
                'idNhaCungCap' => '2',
                'DoiXe' => rand(2010, 2022),
                'BienSo' => Str::random(3) . ' - ' . rand(000001, 999999),
                'MauSon' => 'Màu' . Str::random(6),
                'idThuongHieu' => $i,
                'GiaThueNgay' => rand(500000, 3000000),
                'GiaThueThang' => '0',
                'TinhTrang' => '4',
                'HinhAnh' => 'images/1679806642.Ảnh chụp Màn hình 2023-03-14 lúc 22.18.58.png',
                'AnhMoTa' => 'images/1679806642.Ảnh chụp Màn hình 2023-03-14 lúc 22.10.34.png|images/1679806642.Ảnh chụp Màn hình 2023-03-14 lúc 22.10.44.png|images/1679806642.Ảnh chụp Màn hình 2023-03-14 lúc 22.10.55.png',
                'idCheck' => $i + 5,
                'SoCho' => 7,
                'DungTich' => rand(1, 3) . '.' . rand(0, 9) . 'l',
                'SoKhung' => rand(6666666666, 8888888888),
                'SoMay' => rand(6666666666, 8888888888),
                'DangKyLanDau' => '18/8/2018',
                'HetDangKiem' => '18/8/2018',
                'HetHanBaoHiem' => '18/8/2018',
            ]);
        }
    }
}
