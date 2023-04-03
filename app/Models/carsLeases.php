<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carsLeases extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars_leases';
    protected $fillable = [
        'idXe',
        'idChoThue',
    ];
    public function car()
    {
        return $this->belongsTo(cars::class, 'idXe', 'id');
    }
    public function lease()
    {
        return $this->belongsTo(leases::class, 'idChoThue', 'id');
    }
}
