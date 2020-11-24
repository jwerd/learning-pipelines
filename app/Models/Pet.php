<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name'
    ];

    public function treats()
    {
        return $this->hasMany(Treats::class);
    }
}
