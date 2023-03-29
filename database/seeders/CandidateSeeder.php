<?php

namespace Database\Seeders;

use App\Models\User;
use App\Support\Constants\UserRole;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($candidate) {
            $candidate->assignRole(UserRole::CANDIDATE);
        });
    }
}
