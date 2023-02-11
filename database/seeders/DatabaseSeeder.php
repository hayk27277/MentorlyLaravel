<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private UserRoleSeeder $userRoleSeeder,
        private MajorSeeder $majorSeeder
    ) {}

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->userRoleSeeder->run();
        $this->majorSeeder->run();
        User::factory(10)->create();
    }
}
