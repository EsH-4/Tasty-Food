<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class FixGaleriGambarExtensions extends Command
{
    protected $signature = 'galeri:fix-extensions';
    protected $description = 'Fix missing file extensions in galeri gambar column';

    public function handle()
    {
        $galeris = Galeri::all();
        $updatedCount = 0;

        foreach ($galeris as $galeri) {
            $gambar = $galeri->gambar;

            // If gambar already has an extension, skip
            if (pathinfo($gambar, PATHINFO_EXTENSION)) {
                continue;
            }

            // Search for matching file in storage/app/public/galeri with any extension
            $files = Storage::files('public/galeri');
            $matchedFile = null;

            foreach ($files as $file) {
                // Remove 'public/' prefix from file path
                $fileName = substr($file, 7);
                // Check if filename without extension matches gambar
                if (pathinfo($fileName, PATHINFO_FILENAME) === $gambar) {
                    $matchedFile = $fileName;
                    break;
                }
            }

            if ($matchedFile) {
                $galeri->gambar = $matchedFile;
                $galeri->save();
                $this->info("Updated galeri id {$galeri->id} gambar to {$matchedFile}");
                $updatedCount++;
            } else {
                $this->warn("No matching file found for galeri id {$galeri->id} gambar {$gambar}");
            }
        }

        $this->info("Total updated records: {$updatedCount}");
        return 0;
    }
}
