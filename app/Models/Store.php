<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'representative_name',
        'representative_contact',
        'lat',
        'long',
        'address',
        'is_verified',
        'hero',
        'logo',
    ];

    public function categories()
    {
        return $this->hasMany(ItemCategory::class);
    }
}
