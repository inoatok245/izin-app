<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // <-- pastikan ini ada

class Izin extends Model
{
    use HasFactory;

    // Izinkan mass assignment untuk kolom berikut
    protected $fillable = [
        'user_id',
        'alasan',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'file_bukti',
        'komentar_admin',
    ];

    /**
     * Relasi: Izin dimiliki oleh satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
