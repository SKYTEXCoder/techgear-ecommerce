<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'PC Parts & Components',
                'slug' => Str::slug('PC Parts & Components'),
                'has_new_products' => false,
                'is_currently_featured' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peripherals',
                'slug' => Str::slug('Peripherals'),
                'has_new_products' => false,
                'is_currently_featured' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Full Systems',
                'slug' => Str::slug('Full Systems'),
                'has_new_products' => false,
                'is_currently_featured' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accessories',
                'slug' => Str::slug('Accessories'),
                'has_new_products' => false,
                'is_currently_featured' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Games & Software',
                'slug' => Str::slug('Games & Software'),
                'has_new_products' => false,
                'is_currently_featured' => false,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('departments')->insert($departments);
    }
}
