<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;
protected $fillable = [
    'alat',
    'sn',
    'ruang',
    'type',
];

public function riwayat()
{
    return $this->hasMany(PemeliharaanDua::class, 'alat_id');
}
}
