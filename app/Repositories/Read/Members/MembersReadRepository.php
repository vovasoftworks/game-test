<?php

namespace App\Repositories\Read\Members;

use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;

class MembersReadRepository implements MembersReadRepositoryInterface
{
    public function query(): Builder
    {
        return Member::query();
    }
    public function getMemberIdByEmail(string $email): ?Member
    {
        return $this->query()->where('email', $email)->first();
    }
}
