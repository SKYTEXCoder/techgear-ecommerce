<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Processors',
                'slug' => Str::slug('Processors'),
                'description' => 'Processors are the brains of your computer, handling all the calculations and tasks necessary for smooth operation.',
                'depth' => 0,
                'department_id' => 1,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Motherboards',
                'slug' => Str::slug('Motherboards'),
                'description' => 'Motherboards connect all components of your computer, allowing communication between the CPU, memory, and peripherals.',
                'depth' => 0,
                'department_id' => 1,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Graphics Cards',
                'slug' => Str::slug('Graphics Cards'),
                'description' => 'Graphics cards render images and videos, providing high-quality visuals for gaming, design, and multimedia tasks.',
                'depth' => 0,
                'department_id' => 1,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Memory (RAM)',
                'slug' => Str::slug('Memory RAM'),
                'description' => 'RAM provides fast, temporary storage for your computer to quickly access data and run multiple applications smoothly.',
                'depth' => 0,
                'department_id' => 1,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Storage Devices',
                'slug' => Str::slug('Storage Devices'),
                'description' => 'Storage devices like SSDs and HDDs store your operating system, applications, and personal files securely.',
                'depth' => 0,
                'department_id' => 1,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Power Supplies',
                'slug' => Str::slug('Power Supplies'),
                'description' => 'Power supplies provide stable and reliable power to all components of your computer system.',
                'depth' => 0,
                'department_id' => 1,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Computer Cases',
                'slug' => Str::slug('Computer Cases'),
                'description' => 'Computer cases house and protect all internal components, offering cooling and expansion options.',
                'depth' => 0,
                'department_id' => 1,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Monitors',
                'slug' => Str::slug('Monitors'),
                'description' => 'Monitors display the visual output from your computer, essential for work, gaming, and entertainment.',
                'depth' => 0,
                'department_id' => 2,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Keyboards',
                'slug' => Str::slug('Keyboards'),
                'description' => 'Keyboards are input devices used to type and interact with your computer efficiently.',
                'depth' => 0,
                'department_id' => 2,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mice',
                'slug' => Str::slug('Mice'),
                'description' => 'Mice are pointing devices that allow you to navigate and control your computer with precision.',
                'depth' => 0,
                'department_id' => 2,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('categories')->insert($categories);
    }
}
