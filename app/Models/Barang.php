<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'namaBarang', 'kategory', 'harga'];

    protected $hidden = ['created_at', 'updated_at'];
}
