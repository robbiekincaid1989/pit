<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate the Admin account
        \App\Models\User::factory(1)->create(['name' => 'robbies7897', 'email' => 'robbiek7897@gmail.com', 'is_admin' => true]);
    }
}
