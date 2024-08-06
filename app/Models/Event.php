<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'user_id'];



    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }

    public function programs(): HasManyThrough
    {
        return $this->hasManyThrough(Program::class, Visitor::class);
    }

    public function colleges(): HasManyThrough
    {
        return $this->hasManyThrough(College::class, Visitor::class);
    }



}
