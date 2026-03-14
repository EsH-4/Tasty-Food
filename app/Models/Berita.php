<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['judul', 'slug', 'penulis', 'konten', 'konten_lengkap', 'gambar', 'tanggal_publikasi'];

    protected $dates = ['deleted_at'];
}
