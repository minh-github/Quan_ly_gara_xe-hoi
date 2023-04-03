<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nation extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nations';
    protected $fillable = [
        'MaQuocGia',
        'TenQuocGia'
    ];
    public function lease()
    {
        return $this->hasMany(brands::class, 'idQuocGia', 'id');
    }
}
