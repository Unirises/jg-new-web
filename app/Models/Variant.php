<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'additional_price',
        'item_variants_id',
    ];

    public function item_variant()
    {
        return $this->belongsTo(ItemVariant::class, 'item_variants_id', 'id');
    }
}
