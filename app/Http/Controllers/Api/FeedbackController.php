<?php

namespace App\Http\Controllers\Api;

use App\Factory\FeedbackCreator;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    public function __invoke(FeedbackRequest $request)
    {

        $requestStorage = new FeedbackCreator('DB');
        $requestStorage->create($request->validated());

        $requestStorage = new FeedbackCreator('FILE');
        $requestStorage->create($request->validated());

        return response()->json([
            'message' => 'Заявка успешно отправлена'
        ]);
    }
}
