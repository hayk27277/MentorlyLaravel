<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

final class MajorSeeder extends Seeder
{
    public function __construct(
        private Major $major
    ) {
    }

    public function run(): void
    {
        $this->major->query()->insert([
            [
                'name' => 'Programming',
                'description' => 'Programming involves tasks such as analysis,
                 generating algorithms, profiling algorithms accuracy and resource consumption.',
            ],
            [
                'name' => 'Physics',
                'description' => 'Physics is the branch of science that deals
                 with the structure of matter and how the fundamental constituents of the universe interact.',
            ],
            [
                'name' => 'Mathematics',
                'description' => 'Mathematics is the science and study of quality, structure, space, and change.
                 Mathematicians seek out patterns, formulate new conjectures, and establish truth by rigorous
                 deduction from appropriately chosen axioms and definitions.',
            ],
            [
                'name' => 'History',
                'description' => 'History is the systematic study and documentation of human activity.',
            ],
        ]);
    }
}
