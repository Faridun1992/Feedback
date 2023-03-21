<?php

namespace App\Factory\Factories;


use App\Factory\Operations\FeedbackDatabase;
use App\Factory\Operations\FeedbackFile;

class RequestStorageFactory
{
    private static $instances = [
        'DB' => FeedbackDatabase::class,
        'FILE' => FeedbackFile::class,
    ];

    public static function storageOperation(string $storage)
    {
        if (isset(self::$instances[$storage])) {
            return new self::$instances[$storage];
        }
        return null;
    }
}
