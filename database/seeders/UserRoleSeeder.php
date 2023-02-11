<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

final class UserRoleSeeder extends Seeder
{
    public function __construct(
        private UserRole $userRole
    ) {}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->userRole->query()->insert([
            [
                'slug' => 'mentor',
                'name' => 'Mentor',
                'description' => 'Creates content to share knowledge in his domain.'
            ],
            [
                'slug' => 'mentee',
                'name' => 'Mentee',
                'description' => 'Watch and learn from content created by mentors.'
            ],
            [
                'slug' => 'admin',
                'name' => 'Admin',
                'description' => 'Manages sites settings and content.'
            ],
        ]);
    }
}
