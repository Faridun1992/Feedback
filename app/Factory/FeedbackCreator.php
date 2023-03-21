<?php

namespace App\Factory;

use App\Factory\Factories\RequestStorageFactory;

class FeedbackCreator
{
    private $instance;

    public function __construct(string $storageOperation)
    {
        $this->instance = RequestStorageFactory::storageOperation($storageOperation);
    }
    public function create(array $data)
    {
        $this->instance->create($data);
    }
}
