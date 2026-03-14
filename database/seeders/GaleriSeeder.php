<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $galeris = [
            [
                'judul' => 'Gambar Galeri 1',
                'gambar' => 'galeri/anh-nguyen-kcA-c3f_3FE-unsplash.jpg'
            ],
            [
                'judul' => 'Gambar Galeri 2',
                'gambar' => 'galeri/anna-pelzer-IGfIGP5ONV0-unsplash.jpg'
            ],
            [
                'judul' => 'Gambar Galeri 3',
                'gambar' => 'galeri/brooke-lark-1Rm9GLHV0UA-unsplash.jpg'
            ],
            [
                'judul' => 'Gambar Galeri 4',
                'gambar' => 'galeri/brooke-lark-nBtmglfY0HU-unsplash.jpg'
            ],
            [
                'judul' => 'Gambar Galeri 5',
                'gambar' => 'galeri/brooke-lark-oaz0raysASk-unsplash.jpg'
            ],
            [
                'judul' => 'Gambar Galeri 6',
                'gambar' => 'galeri/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg'
            ],
           
        ];

        foreach ($galeris as $galeri) {
            Galeri::create($galeri);
        }
    }
}
