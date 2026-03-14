<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes; // Hapus ini - kontak permanen

class Contact extends Model
{
    // use SoftDeletes; // Hapus ini - kontak permanen

    protected $fillable = [
        'email',
        'phone',
        'location',
        'map_embed_url',
    ];

    // Informasi kontak permanen - tidak bisa dihapus
}
