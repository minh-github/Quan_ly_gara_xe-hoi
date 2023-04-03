<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_brands';
    protected $fillable = [
        'TenThuongHieu',
        'idQuocGia'
    ];
    public function cars()
    {
        return $this->hasMany(cars::class, 'idThuongHieu', 'id');
    }
    public function nation()
    {
        return $this->belongsTo(nation::class, 'idQuocGia', 'id');
    }
}
