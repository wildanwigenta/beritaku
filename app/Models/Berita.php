<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $guarded = ['id_berita'];

    // public function kategori()
    // { 
    //     return $this->hasOne(Kategori::class, 'id_kategori', 'id_kategori');
    // }
}
