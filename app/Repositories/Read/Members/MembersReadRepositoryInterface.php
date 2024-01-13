<?php

namespace App\Repositories\Read\Members;

use App\Models\Member;

interface MembersReadRepositoryInterface
{
    public function getMemberIdByEmail(string $email): ?Member;
}
