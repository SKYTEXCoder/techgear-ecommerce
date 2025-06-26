<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BrandType;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, create the brand types
        $chipsetType = BrandType::firstOrCreate(
            ['slug' => 'chipset-manufacturer'],
            ['name' => 'Chipset Manufacturer']
        );

        $aibPartnerType = BrandType::firstOrCreate(
            ['slug' => 'gpu-aib-partner'],
            ['name' => 'GPU AIB Partner']
        );

        // Now create the brands (without type field)
        $intel = Brand::firstOrCreate(
            ['slug' => 'intel'],
            ['name' => 'Intel', 'is_active' => true]
        );

        $amd = Brand::firstOrCreate(
            ['slug' => 'amd'],
            ['name' => 'AMD', 'is_active' => true]
        );

        $nvidia = Brand::firstOrCreate(
            ['slug' => 'nvidia'],
            ['name' => 'NVIDIA', 'is_active' => true]
        );

        $asus = Brand::firstOrCreate(
            ['slug' => 'asus'],
            ['name' => 'ASUS', 'is_active' => true]
        );

        $gigabyte = Brand::firstOrCreate(
            ['slug' => 'gigabyte'], // Fixed the slug from 'asus' to 'gigabyte'
            ['name' => 'Gigabyte', 'is_active' => true]
        );

        $msi = Brand::firstOrCreate(
            ['slug' => 'msi'],
            ['name' => 'MSI', 'is_active' => true]
        );

        $sapphire = Brand::firstOrCreate(
            ['slug' => 'sapphire'],
            ['name' => 'Sapphire', 'is_active' => true]
        );

        $xfx = Brand::firstOrCreate(
            ['slug' => 'xfx'],
            ['name' => 'XFX', 'is_active' => true]
        );

        $powercolor = Brand::firstOrCreate(
            ['slug' => 'powercolor'],
            ['name' => 'PowerColor', 'is_active' => true]
        );

        // Associate brands with their brand types
        $intel->brandTypes()->syncWithoutDetaching([$chipsetType->id]);
        $amd->brandTypes()->syncWithoutDetaching([$chipsetType->id]);
        $nvidia->brandTypes()->syncWithoutDetaching([$chipsetType->id]);

        $asus->brandTypes()->syncWithoutDetaching([$aibPartnerType->id]);
        $gigabyte->brandTypes()->syncWithoutDetaching([$aibPartnerType->id]);
        $msi->brandTypes()->syncWithoutDetaching([$aibPartnerType->id]);
        $sapphire->brandTypes()->syncWithoutDetaching([$aibPartnerType->id]);
        $xfx->brandTypes()->syncWithoutDetaching([$aibPartnerType->id]);
        $powercolor->brandTypes()->syncWithoutDetaching([$aibPartnerType->id]);

        // Find categories
        $processorsCategory = Category::where('slug', 'processors')->first();
        $gpusCategory = Category::where('slug', 'gpus')->first();

        // Associate brands with categories
        if ($processorsCategory) {
            $processorsCategory->brands()->syncWithoutDetaching([
                $intel->id,
                $amd->id,
            ]);
        }

        if ($gpusCategory) {
            $gpusCategory->brands()->syncWithoutDetaching([
                $intel->id,
                $amd->id,
                $nvidia->id,
                $asus->id,
                $gigabyte->id,
                $msi->id,
                $sapphire->id,
                $xfx->id,
                $powercolor->id,
            ]);
        }
    }
}
