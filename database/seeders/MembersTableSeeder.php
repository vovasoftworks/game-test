<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    public function run(): void
    {
        Member::factory(10000)->create();
    }
}
