<?php

namespace App\Factories;

use App\Models\Feedback;

class FeedbackDatabase implements FeedbackFactory
{
    public function create(array $data)
    {
        return Feedback::create($data);
    }
}
