<?php

namespace Database\Seeders;

use App\Models\ToDo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class todoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ToDo::create([
            'text' => '自習',
            'priority' => '1',
        ]);

        ToDo::create([
            'text' => '昼寝',
            'priority' => '3',
        ]);

    }
}
