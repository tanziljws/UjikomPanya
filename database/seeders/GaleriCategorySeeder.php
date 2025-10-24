<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update only galeri records that don't have a category or have empty category
        $updated = Galeri::whereNull('kategori')
            ->orWhere('kategori', '')
            ->update(['kategori' => 'Umum']);
        
        $this->command->info("Updated {$updated} galeri records to 'Umum' category.");
    }
}
