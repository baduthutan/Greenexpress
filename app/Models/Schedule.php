<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $primaryKey = 'schedule_id';

    protected $fillable = [
        'from_location_id',
        'to_location_id',
        'departure_time',
        'departure_date',
        'ticket_price',
        'dst_id',
    ];

    public $timestamps = false;

    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from_location_id', 'location_id');
    }

    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_location_id', 'location_id');
    }

    public function dst()
    {
        return $this->belongsTo(Dst::class, 'dst_id', 'dst_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'schedule_id', 'schedule_id');
    }
}
