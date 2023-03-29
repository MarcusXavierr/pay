<?php

namespace Database\Seeders;

use App\Support\Constants\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::allRoles()->each(fn($role) => $this->createRole($role));
    }

    private function createRole(string $roleName)
    {
        Role::findOrCreate($roleName);
    }
}
