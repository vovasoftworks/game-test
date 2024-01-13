<?php

namespace App\Repositories\Write;

use App\Exceptions\SavingErrorException;
use App\Models\Result;

class ResultWriteRepository implements ResultWriteRepositoryInterface
{
    /**
     * @throws SavingErrorException
     */
    public function save(Result $result): Result
    {
        if (!$result->save()) {
            throw new SavingErrorException();
        }

        return $result;
    }
}
