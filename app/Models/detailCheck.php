<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailCheck extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'details_check';
    protected $fillable = [
        'TenThietBi',
        'TrangThai',
        'XuLy',
        'Gia',
        'idCheck',
        'GhiChu'
    ];
    public function manCheck()
    {
        return $this->belongsTo(User::class, 'idNguoiKT', 'id');
    }
    public function backCheck()
    {
        return $this->belongsTo(check::class, 'idCheck', 'id');
    }
}
