<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerProfile extends Model
{
    protected $fillable = [
        'user_id',
        'store_name',
        'phone',
        'category',
        'address',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
