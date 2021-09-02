<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'lat',
        'long',
        'ride_id',
        'distance',
        'duration',
        'arrivalTime',
        'place',
        'address',
        'polyline',
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }
}
