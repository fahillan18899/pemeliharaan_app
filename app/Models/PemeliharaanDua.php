<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeliharaanDua extends Model
{
    use HasFactory;
    protected $table = 'pemeliharaanduas';
    protected $fillable = [
    'alat_id',
    'waktu',
    'ket',
    'teknisi'
];

public function alat()
{
    return $this->belongsTo(Pemeliharaan::class, 'alat_id');
}

}
