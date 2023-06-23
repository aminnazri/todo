<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Todo::factory(10)->for(User::factory()->state(['email' => 'rasyidialwee@gmail.com']))->create();
        // Todo::factory(10)->for(User::factory())->create();
    }
}
