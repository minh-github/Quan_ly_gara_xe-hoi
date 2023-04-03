<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeCar extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_cars';
    protected $fillable = [
        'TenLoaiXe',
        'GhiChu',
    ];
    public function cars()
    {
        return $this->hasMany(cars::class, 'idLoaiXe', 'id');
    }
}
