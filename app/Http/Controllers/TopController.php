<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Action\TopResultsAction;
use App\Http\Resources\TopResultsResource;

class TopController extends Controller
{
    public function __invoke(Request $request, TopResultsAction $topResultsAction): TopResultsResource
    {
        $email = $request->get('email');
        $data = $topResultsAction->run($email);

        return new TopResultsResource($data);
    }
}
