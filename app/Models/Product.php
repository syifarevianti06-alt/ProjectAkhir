<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'price',
        'image',
        'stock',
        'sizes',
        'colors',
    ];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    /**
     * Foto-foto tambahan produk
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}