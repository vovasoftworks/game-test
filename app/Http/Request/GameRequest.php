<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    const EMAIL = 'email';
    const MILLISECONDS = 'milliseconds';

    public function rules(): array
    {
        return [
            self::EMAIL => [
                'nullable',
                'email',
                'string',
            ],
            self::MILLISECONDS => [
                'required',
                'integer',
            ],
        ];
    }

    public function getEmail(): ?string
    {
        return  $this->get(self::EMAIL);

    }

    public function getMilliseconds(): int
    {
        return $this->get(self::MILLISECONDS);
    }
}
