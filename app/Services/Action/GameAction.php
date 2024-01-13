<?php

namespace App\Services\Action;

use Exception;
use App\Models\Result;
use App\Services\Dto\GameDto;
use App\Exceptions\MemberNotFoundException;
use App\Repositories\Write\ResultWriteRepositoryInterface;
use App\Repositories\Read\Members\MembersReadRepositoryInterface;

class GameAction
{
    public function __construct(
        protected ResultWriteRepositoryInterface $resultWriteRepository,
        protected MembersReadRepositoryInterface $memberReadRepository
    ) {}

    /**
     * @throws Exception
     */
    public function run(GameDto $dto): Result
    {
        $member = '';

        if ($dto->email) {
            $member = $this->memberReadRepository->getMemberIdByEmail($dto->email);
            if (!$member) {
                throw new MemberNotFoundException();
            }
        }

        $result = Result::staticCreate($dto, $member);

        return $this->resultWriteRepository->save($result);
    }
}
