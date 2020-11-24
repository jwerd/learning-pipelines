<?php

namespace App\Pipelines;

use App\Models\Pet as PetModel;

class AddPetsPipeline
{
    protected $pet;

    public function __construct(array $pet)
    {
        $this->pet = $pet;
    }

    public function handle($query, $next)
    {
        PetModel::updateOrCreate($this->pet);

        return $next($query);
    }
}