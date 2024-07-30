<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'Abbigliamento',
        'Elettronica',
        'Salute e Bellezza',
        'Tempo Libero',
        'Lettura',
        'Motori',
        'Accessori',
        'Giardinaggio',
        'Bambini',
        'Vacanza'
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
