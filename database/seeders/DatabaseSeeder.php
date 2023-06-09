<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JobPost;
use App\Models\User;
use App\Support\Constants\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CandidateSeeder::class,
            JobContractTypeSeeder::class,
        ]);

        $this->createAdmin();
        JobPost::factory(10)->create();
    }

    private function createAdmin()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $user->assignRole(UserRole::ADMIN);
    }
}
