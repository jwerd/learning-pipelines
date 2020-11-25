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
        foreach($this->treat as $treat) {
            $query->treats()->updateOrCreate([
                'name' => $treat,
            ]);
        }

        return $next($query);
    }
}