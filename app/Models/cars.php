<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars';
    protected  $primaryKey = 'id';
    protected $fillable = [
        'TenXe',
        'idLoaiXe',
        'idNhaCungCap',
        'DoiXe',
        'BienSo',
        'MauSon',
        'idThuongHieu',
        'GiaThueNgay',
        'GiaThueThang',
        'TinhTrang',
        'HinhAnh',
        'AnhMoTa',
        'idChoThue',
        'SoCho',
        'idCheck',
        'DungTich',
        'SoKhung',
        'SoMay',
        'DangKyLanDau',
        'HetDangKiem',
        'HetHanBaoHiem',
        'GhiChu',
    ];
    public function brand()
    {
        return $this->belongsTo(brands::class, 'idThuongHieu', 'id');
    }
    public function typeCar()
    {
        return $this->belongsTo(typeCar::class, 'idLoaiXe', 'id');
    }
    public function owner()
    {
        return $this->belongsTo(owners::class, 'idNhaCungCap', 'id');
    }
    public function lease()
    {
        return $this->hasMany(carsLeases::class, 'idXe', 'id');
    }
    public function check()
    {
        return $this->hasMany(check::class, 'id', 'idCheck');
    }
}
