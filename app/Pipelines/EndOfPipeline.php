<?php

namespace App\Pipelines;

use App\Models\Pet;

class EndOfPipeline
{
    public function handle($query, $next)
    {
        return Pet::with(['treats'])->get();
    }
}