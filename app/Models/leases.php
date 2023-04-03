<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leases extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leases';
    protected $fillable = [
        'TrangThai',
        'TenNguoiThue',
        'SoDienThoai',
        'TamUng',
        'SoNgayThue',
        'NgayThue',
        'NgayTra',
        'ThanhTien',
        'GhiChuPhuThu',
        'GhiChuNhanHang',
        'CMNDT',
        'CMNDS',
        'idKTT',
        'idKTS',
        'TienThue',
        'TienDenBu',
        'PhuThu',
    ];
    public function lease()
    {
        return $this->hasMany(carsLeases::class, 'idChoThue', 'id');
    }
}
