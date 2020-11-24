<?php

namespace App\Pipelines;

class AddTreatForPet
{
    protected $treat;

    public function __construct($treat)
    {
        $this->treat = $treat;
    }
    public function handle($query, $next)
    {
        $query->treats()->create([
            'name' => $this->treat,
        ]);

        return $next($query);
    }
}