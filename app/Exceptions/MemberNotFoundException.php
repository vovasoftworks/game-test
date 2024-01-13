<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class MemberNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("Member with email not found", Response::HTTP_NOT_FOUND);
    }
}
