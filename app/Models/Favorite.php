<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_buku'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    
    public function bukus()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
