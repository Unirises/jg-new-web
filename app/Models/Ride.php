<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Enums\ServiceStatus;
use App\Enums\ServiceType;
use App\Enums\VehicleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'driver_id',
        'index',
        'lat',
        'long',
        'heading',
        'vehicle_type',
        'ride_status',
        'available_at',
        'fee',
        'subtotal',
        'store_id',
        'payment_status',
        'service_type',
        'payment_method',
        'is_commission_paid',
        'special_instructions',
        'total_duration',
        'total_distance',
        'rating',
        'review',
        'is_reported',
        'payment_id',
    ];

    protected $hidden = [
        'user_id',
        'driver_id',
        'store_id',
        'is_commission_paid',
    ];

    protected $casts = [
        'vehicle_type' => VehicleType::class,  // previously known as car_type
        'service_status' => ServiceStatus::class,  // previously known as ride_status
        'payment_status' => PaymentStatus::class,
        'service_type' => ServiceType::class, // previously known as payment_type
        'payment_method' => PaymentMethod::class,
    ];

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function items()
    {
        return $this->hasMany(BoughtItem::class);
    }
}
