<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treats extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pet_id',
    ];

    public function pet()
    {
        return $this->hasOne(Pet::class);
    }
}
