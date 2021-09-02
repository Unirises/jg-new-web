<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoughtItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'quantity',
        'ride_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class);
    }
}
