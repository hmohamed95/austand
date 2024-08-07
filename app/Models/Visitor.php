<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'enrolled', 'called', 'remark', 'event_id', 'user_id'];



    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCalled(Builder $query, $called): Builder
    {
        return $query->where('called', $called);
    }

    public function scopeForEvent(Builder $query, $event_id): Builder
    {
        return $query->where('event_id', $event_id);
    }

}
