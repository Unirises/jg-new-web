<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'item_categories_id',
        'is_available',
        'photo',
    ];

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'item_categories_id', 'id');
    }

    public function getPriceAttribute($value)
    {
        return (string) floatval($value);
    }

    public function item_variants()
    {
        return $this->hasMany(ItemVariant::class, 'item_id', 'id');
    }
}
