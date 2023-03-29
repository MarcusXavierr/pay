<?php

namespace Database\Seeders;

use App\Models\JobContractType as ModelsJobContractType;
use App\Support\Constants\JobContractType;
use Illuminate\Database\Seeder;

class JobContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobContractType::allContractTypes()->each(fn($role) => $this->createContractType($role));
    }

    private function createContractType(string $contractType)
    {
        ModelsJobContractType::firstOrCreate([ 'name' => $contractType ]);
    }
}
