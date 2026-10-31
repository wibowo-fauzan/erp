<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $treatments = config('treatments');

        foreach ($treatments as $data) {
            Treatment::query()->create([
                'slug' => $data['slug'] ?? null,
                'name' => $data['title'] ?? null,
                'filter' => $data['filter'] ?? null,
                'category' => $data['category'] ?? null,
                'price' => $data['price'] ?? null,
                'duration_minutes' => $data['duration'] ?? null,
                'description' => $data['description'] ?? null,
                'image' => $data['image'] ?? null,
                'action' => $data['action'] ?? null,
                'is_primary' => $data['primary'] ?? false,
                'alt' => $data['alt'] ?? null,
                'is_active' => true,
            ]);
        }
    }
}
