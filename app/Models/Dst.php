<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dst extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'dst_start',
        'dst_end',
    ];
}