<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'nomor_lapangan',
        'jam_mulai',
        'jam_selesai',
    ];

    // Relasi: Jadwal memiliki banyak Pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'jadwal_id');
    }
}
