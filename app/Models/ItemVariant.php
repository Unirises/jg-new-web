<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min',
        'max',
        'item_id'
    ];

    public function variants()
    {
        return $this->hasMany(Variant::class, 'item_variants_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
