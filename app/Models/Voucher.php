<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $primaryKey = 'voucher_id';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'discount',
        'expiration_date',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'voucher_id', 'voucher_id');
    }
}
