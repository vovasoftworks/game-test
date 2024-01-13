<?php

namespace App\Repositories\Read\Top;

use App\Models\Result;
use Illuminate\Database\Eloquent\Collection;

interface TopResultsReadRepositoryInterface
{
    public function getTopResults($email): Collection;
    public function getUserResult($email): ?Result;
}
