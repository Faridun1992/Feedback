<?php

namespace App\Factory\Operations;

use App\Factory\Common\FeedbackFactory;
use App\Models\Feedback;

class FeedbackDatabase implements FeedbackFactory
{
    public function create(array $data)
    {
        return Feedback::create($data);
    }
}
