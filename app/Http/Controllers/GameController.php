<?php

namespace App\Http\Controllers;


use Exception;
use App\Services\Dto\GameDto;
use App\Http\Request\GameRequest;
use App\Services\Action\GameAction;
use App\Http\Resources\ResultResource;

class GameController extends Controller
{
    /**
     * @throws Exception
     */
    public function __invoke(
        GameRequest $request,
        GameAction $playAction
    ): ResultResource {
        $dto = GameDto::fromRequest($request);

        $result = $playAction->run($dto);

        return new ResultResource($result);
    }
}
