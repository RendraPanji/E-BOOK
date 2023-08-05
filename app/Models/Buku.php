<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'judul_buku',
        'deskripsi',
        'author',
        'gambar',
        'file',
        'id_penerbit',
        'id_kategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
    
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit', 'id');
    }
}
