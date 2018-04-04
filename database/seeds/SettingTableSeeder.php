<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'Test Blog',
            'address' => 'Tasmania',
            'contact_number' => '123456789',
            'contact_email' => 'info@testblog.com'
        ]);
    }
}
