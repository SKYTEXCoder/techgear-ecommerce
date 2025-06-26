<?php

namespace Database\Seeders;

use App\Models\Category;
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
                'name' => 'Mouses',
                'slug' => Str::slug('Mouses'),
                'description' => 'Mouses are pointing devices that allow you to navigate and control your computer with precision.',
                'depth' => 0,
                'department_id' => 2,
                'parent_category_id' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('categories')->insert($categories);

        // Get the inserted categories for creating relationships with subcategories
        $processors = Category::where('slug', 'processors')->first();
        $motherboards = Category::where('slug', 'motherboards')->first();
        $graphicsCards = Category::where('slug', 'graphics-cards')->first();
        $ram = Category::where('slug', 'memory-ram')->first();
        $storage = Category::where('slug', 'storage-devices')->first();
        $powerSupplies = Category::where('slug', 'power-supplies')->first();
        $cases = Category::where('slug', 'computer-cases')->first();
        $monitors = Category::where('slug', 'monitors')->first();
        $keyboards = Category::where('slug', 'keyboards')->first();
        $mouses = Category::where('slug', 'mouses')->first();

        // Now create subcategories
        $subcategories = [
            // Processor subcategories
            [
                'name' => 'Intel Processors',
                'slug' => Str::slug('Intel Processors'),
                'description' => 'Intel processors offering a balance of performance and efficiency.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $processors->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AMD Processors',
                'slug' => Str::slug('AMD Processors'),
                'description' => 'AMD processors are famously known for their multi-core performance and value.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $processors->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Motherboard subcategories
            [
                'name' => 'Intel Motherboards',
                'slug' => Str::slug('Intel Motherboards'),
                'description' => 'Motherboards designed for Intel processors with various chipsets.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $motherboards->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AMD Motherboards',
                'slug' => Str::slug('AMD Motherboards'),
                'description' => 'Motherboards designed for AMD processors featuring various socket types.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $motherboards->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Graphics card subcategories
            [
                'name' => 'NVIDIA Graphics Cards',
                'slug' => Str::slug('NVIDIA Graphics Cards'),
                'description' => 'Graphics cards featuring NVIDIA GPUs for gaming and professional applications.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $graphicsCards->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AMD Graphics Cards',
                'slug' => Str::slug('AMD Graphics Cards'),
                'description' => 'Graphics cards featuring AMD Radeon GPUs with competitive performance.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $graphicsCards->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Intel Graphics Cards',
                'slug' => Str::slug('Intel Graphics Cards'),
                'description' => 'Graphics cards featuring Intel GPUs, known for their integrated graphics solutions and INTEL ARC discrete ones.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $graphicsCards->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // RAM subcategories
            [
                'name' => 'DDR4 Memory',
                'slug' => Str::slug('DDR4 Memory'),
                'description' => 'DDR4 memory modules offering improved performance and energy efficiency.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $ram->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DDR5 Memory',
                'slug' => Str::slug('DDR5 Memory'),
                'description' => 'Next-generation DDR5 memory with higher speeds and capacities.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $ram->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Storage subcategories
            [
                'name' => 'Solid State Drives (SSD)',
                'slug' => Str::slug('Solid State Drives SSD'),
                'description' => 'Fast storage devices with no moving parts for improved speed and reliability.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $storage->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hard Disk Drives (HDD)',
                'slug' => Str::slug('Hard Disk Drives HDD'),
                'description' => 'Traditional storage with rotating disks offering high capacity at lower costs.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $storage->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'External Storage',
                'slug' => Str::slug('External Storage'),
                'description' => 'Portable storage solutions for backups and extra capacity on the go.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $storage->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Power supply subcategories
            [
                'name' => 'Modular PSUs',
                'slug' => Str::slug('Modular PSUs'),
                'description' => 'Power supplies with detachable cables for better cable management.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $powerSupplies->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Non-modular PSUs',
                'slug' => Str::slug('Non modular PSUs'),
                'description' => 'Traditional power supplies with fixed cables at affordable prices.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $powerSupplies->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Case subcategories
            [
                'name' => 'Mid Tower Cases',
                'slug' => Str::slug('Mid Tower Cases'),
                'description' => 'Standard-sized cases suitable for most builds.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $cases->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Full Tower Cases',
                'slug' => Str::slug('Full Tower Cases'),
                'description' => 'Large cases with extensive room for components and cooling.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $cases->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mini-ITX Cases',
                'slug' => Str::slug('Mini ITX Cases'),
                'description' => 'Compact cases designed for small form factor builds.',
                'depth' => 1,
                'department_id' => 1,
                'parent_category_id' => $cases->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Monitor subcategories
            [
                'name' => 'Gaming Monitors',
                'slug' => Str::slug('Gaming Monitors'),
                'description' => 'Monitors with high refresh rates and low response times for gaming.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $monitors->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Professional Monitors',
                'slug' => Str::slug('Professional Monitors'),
                'description' => 'Monitors with accurate color reproduction for design and creative work.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $monitors->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ultrawide Monitors',
                'slug' => Str::slug('Ultrawide Monitors'),
                'description' => 'Extra-wide monitors for immersive experiences and multitasking.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $monitors->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Keyboard subcategories
            [
                'name' => 'Mechanical Keyboards',
                'slug' => Str::slug('Mechanical Keyboards'),
                'description' => 'Keyboards with individual mechanical switches for enhanced typing experience.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $keyboards->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Membrane Keyboards',
                'slug' => Str::slug('Membrane Keyboards'),
                'description' => 'Standard keyboards with membrane switches for general use.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $keyboards->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wireless Keyboards',
                'slug' => Str::slug('Wireless Keyboards'),
                'description' => 'Keyboards without cables for a cleaner desk setup.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $keyboards->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Mouse subcategories
            [
                'name' => 'Gaming Mice',
                'slug' => Str::slug('Gaming Mice'),
                'description' => 'Mice with precise sensors and programmable buttons for gaming.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $mouses->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wireless Mice',
                'slug' => Str::slug('Wireless Mice'),
                'description' => 'Mice without cables for freedom of movement and cleaner setups.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $mouses->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ergonomic Mice',
                'slug' => Str::slug('Ergonomic Mice'),
                'description' => 'Mice designed to reduce strain and provide comfortable long-term use.',
                'depth' => 1,
                'department_id' => 2,
                'parent_category_id' => $mouses->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($subcategories);

        // For third-level categories (example for one subcategory)
        $nvidiagpu = Category::where('slug', 'nvidia-graphics-cards')->first();
        $amdgpu = Category::where('slug', 'amd-graphics-cards')->first();

        $thirdLevelCategories = [
            [
                'name' => 'NVIDIA GeForce RTX 50 Series',
                'slug' => Str::slug('NVIDIA GeForce RTX 50 Series'),
                'description' => 'Latest generation of NVIDIA graphics cards with ray tracing and DLSS.',
                'depth' => 2,
                'department_id' => 1,
                'parent_category_id' => $nvidiagpu->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NVIDIA GeForce RTX 40 Series',
                'slug' => Str::slug('NVIDIA GeForce RTX 40 Series'),
                'description' => 'Latest generation of NVIDIA graphics cards with ray tracing and DLSS.',
                'depth' => 2,
                'department_id' => 1,
                'parent_category_id' => $nvidiagpu->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NVIDIA GeForce RTX 30 Series',
                'slug' => Str::slug('NVIDIA GeForce RTX 30 Series'),
                'description' => 'Previous generation of NVIDIA graphics cards with ray tracing technology.',
                'depth' => 2,
                'department_id' => 1,
                'parent_category_id' => $nvidiagpu->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NVIDIA GeForce RTX 20 Series',
                'slug' => Str::slug('NVIDIA GeForce RTX 20 Series'),
                'description' => 'Latest generation of NVIDIA graphics cards with ray tracing and DLSS.',
                'depth' => 2,
                'department_id' => 1,
                'parent_category_id' => $nvidiagpu->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NVIDIA GeForce GTX Series',
                'slug' => Str::slug('NVIDIA GeForce GTX Series'),
                'description' => 'Latest generation of NVIDIA graphics cards with ray tracing and DLSS.',
                'depth' => 2,
                'department_id' => 1,
                'parent_category_id' => $nvidiagpu->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AMD Radeon RX 9000 Series',
                'slug' => Str::slug('AMD Radeon RX 9000 Series'),
                'description' => 'The latest generation of AMD discrete graphics cards with RDNA 4 architecture.',
                'depth' => 2,
                'department_id' => 1,
                'parent_category_id' => $amdgpu->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AMD Radeon RX 7000 Series',
                'slug' => Str::slug('AMD Radeon RX 7000 Series'),
                'description' => 'Latest generation of AMD graphics cards with RDNA 3 architecture.',
                'depth' => 2,
                'department_id' => 1,
                'parent_category_id' => $amdgpu->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AMD Radeon RX 6000 Series',
                'slug' => Str::slug('AMD Radeon RX 6000 Series'),
                'description' => 'Previous generation of AMD graphics cards with RDNA 2 architecture.',
                'depth' => 2,
                'department_id' => 1,
                'parent_category_id' => $amdgpu->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($thirdLevelCategories);
    }
}
