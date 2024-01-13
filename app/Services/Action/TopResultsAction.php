<?php

namespace App\Services\Action;

use Illuminate\Support\Facades\DB;
use App\Repositories\Read\Top\TopResultsReadRepositoryInterface;

class TopResultsAction
{
    private static int $place = 1;

    public function __construct(
        protected TopResultsReadRepositoryInterface $repository
    ) {}

    public function run($email): array
    {
        $topResults = $this->repository->getTopResults($email);

        $response = [
            'top' => $this->transformResults($topResults),
            'self' => null,
        ];

        if ($email) {
            $userResult = $this->repository->getUserResult($email);

            if ($userResult) {
                $response['self']['email'] = $email;
                $response['self']['milliseconds'] = $userResult['milliseconds'];
                $response['self']['place'] = DB::table('results as r')
                    ->join('members', 'members.id', '=', 'r.member_id')
                    ->where('members.email', '=', $email)
                    ->select(
                        'r.*',
                        DB::raw('ROW_NUMBER() OVER (ORDER BY id ASC) AS serial_num')
                    )
                    ->orderBy('milliseconds', 'desc')
                    ->first();
            }
        }

        return $response;
    }

    private function transformResults($results)
    {
        return $results->map(function ($result) {
            return $this->transformResult($result);
        });
    }

    private function transformResult($result): array
    {
        $email = explode('@', $result->member->email);
        $hiddenEmail = substr($email[0], 0, 2) . '******@' . $email[1];

        return [
            'email' =>$hiddenEmail,
            'place' => self::$place++,
            'milliseconds' => $result->milliseconds,
        ];
    }
}
