<?php

namespace App\Http\Controllers\Api;

use App\Factories\FeedbackCreator;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    public function __invoke(FeedbackRequest $request, FeedbackCreator $feedbackCreator)
    {
        $feedbackCreator->create($request->validated());

        return response()->json([
            'message' => 'Заявка успешно отправлена'
        ]);
    }
}
