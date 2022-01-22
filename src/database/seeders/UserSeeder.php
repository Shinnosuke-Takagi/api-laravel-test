<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(
                Folder::factory()->count(3)->has(
                    Task::factory()->count(3),
                    'hasTasks'
                ),
                'hasFolders'
            )
            ->count(10)->create();
    }
}
