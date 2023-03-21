<?php

namespace App\Factory\Operations;

use App\Factory\Common\FeedbackFactory;

class FeedbackFile implements FeedbackFactory
{
    public function create(array $data)
    {
        $file = fopen(storage_path('feedback.csv'), 'a');

        fputcsv($file, $data);

        fclose($file);
    }
}
