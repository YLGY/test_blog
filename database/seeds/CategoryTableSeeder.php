<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'Hello World'
        ]);

        \App\Category::create([
            'name' => 'Outdoor'
        ]);

        \App\Category::create([
            'name' => 'Travel'
        ]);

        \App\Category::create([
            'name' => 'Tree'
        ]);

        \App\Category::create([
            'name' => 'Far away'
        ]);
    }
}
