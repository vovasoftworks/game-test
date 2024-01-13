<?php

namespace App\Services\Dto;

use App\Http\Request\GameRequest;

class GameDto
{
    public function __construct(
        public ?string $email,
        public string $milliseconds,
    ) {
    }

    public static function fromRequest(GameRequest $request): GameDto
    {
        return new self(
            email: $request->getEmail(),
            milliseconds: $request->getMilliseconds()
        );
    }
}
