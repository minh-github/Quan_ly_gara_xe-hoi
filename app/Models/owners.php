<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owners extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'owners';
    protected $fillable = [
        'id',
        'TenChuXe',
        'SDT',
        'CMT',
    ];
    public function cars()
    {
        return $this->hasMany(cars::class, 'idNhaCungCap', 'id');
    }
}
