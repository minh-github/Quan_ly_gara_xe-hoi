<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class check extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'check';
    protected $fillable = [
        'TinhTrang',
        'TrangThaiCheck',
        'GhiChu',
        'DenBu'
    ];
    public function detail()
    {
        return $this->hasMany(detailCheck::class, 'idCheck', 'id');
    }
    public function car()
    {
        return $this->belongsTo(cars::class, 'idCheck', 'id');
    }
}
