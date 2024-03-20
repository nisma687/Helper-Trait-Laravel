<?php


// app/Traits/Loggable.php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait Loggable
{
    public function logAction($message)
    {
        Log::info($message);
    }
}
