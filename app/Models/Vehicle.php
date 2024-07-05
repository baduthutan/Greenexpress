<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $primaryKey = 'vehicle_id';

    public $timestamps = false;

    protected $fillable = [
        'vehicle_type',
        'capacity',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'vehicle_id', 'vehicle_id');
    }
}
