<?php

namespace App\Http\Controllers\Api;

use App\Factory\FeedbackCreator;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    public function __invoke(FeedbackRequest $request)
    {

        (new FeedbackCreator('DB'))->create($request->validated());
        (new FeedbackCreator('FILE'))->create($request->validated());

        return response()->json([
            'message' => 'Заявка успешно отправлена'
        ]);
    }
}
