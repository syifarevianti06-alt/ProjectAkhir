<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    protected $table = 'pesanans';

    protected $fillable = [
        'user_id',
        'nomor_pesanan',
        'nama_penerima',
        'no_hp',
        'alamat_lengkap',
        'kecamatan',
        'kota',
        'kode_pos',
        'catatan',
        'metode_pembayaran',
        'total',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function detailPesanan(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }
}
