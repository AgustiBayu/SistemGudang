<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal', 'jenisMutasi', 'jumlah','totalHarga', 'userId', 'barangId'];
    protected $casts = [
        'tanggal' => 'datetime:Y-m-d',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    // Relasi ke model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barangId');
    }
}
