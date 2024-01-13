<?php

namespace App\Repositories\Write;

use App\Models\Result;

interface ResultWriteRepositoryInterface
{
    public function save(Result $result): Result;
}
