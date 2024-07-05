<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dst extends Model
{
    use HasFactory;

    protected $primaryKey = 'dst_id';

    public $timestamps = false;

    protected $fillable = [
        'start_date',
        'end_date',
    ];
}
