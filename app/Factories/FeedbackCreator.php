<?php

namespace App\Factories;

class FeedbackCreator
{
    public function create(array $data)
    {
        (new FeedbackFile())->create($data);
        (new FeedbackDatabase())->create($data);
    }
}
