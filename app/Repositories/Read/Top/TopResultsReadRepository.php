<?php

namespace App\Repositories\Read\Top;

use App\Models\Result;
use Illuminate\Database\Eloquent\Collection;

class TopResultsReadRepository implements TopResultsReadRepositoryInterface
{
    public function getTopResults($email): Collection
    {
        return Result::query()
            ->selectRaw('member_id, MIN(results.milliseconds) as milliseconds')
            ->join('members', 'members.id', '=', 'results.member_id')
            ->where('members.email', '!=', $email)
            ->groupBy('member_id')
            ->orderBy('milliseconds')
            ->limit(10)
            ->get();
    }

    public function getUserResult($email): ?Result
    {
        return Result::whereHas('member', function ($query) use ($email) {
            $query->where('email', $email);
        })
            ->orderBy('milliseconds')
            ->first();
    }
}
