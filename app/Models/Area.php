<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $primaryKey = 'area_id';

    public $timestamps = false;

    protected $fillable = [
        'area_name',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class, 'area_id', 'area_id');
    }
}
