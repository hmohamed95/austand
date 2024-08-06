<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use HasFactory, SoftDeletes;


    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function visitors(): HasManyThrough
    {
        return $this->hasManyThrough(Visitor::class, Program::class);
    }

}
