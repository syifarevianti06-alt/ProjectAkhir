<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug','category','description','price','image','stock','sizes','colors'];
    protected $casts = ['sizes' => 'array', 'colors' => 'array'];

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.') . ',00';
    }
}