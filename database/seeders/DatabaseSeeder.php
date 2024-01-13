<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Member::factory(10000)->create();
    }
}
