<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'namaBarang', 'kategory', 'harga','stok'];

    protected $hidden = ['created_at', 'updated_at'];

    public function mutasis()
    {
        return $this->hasMany(Mutasi::class);
    }
}
