<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'short_name', 'contact_person', 'contact_number', 'contact_email', 'user_id', 'type'];


    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function visitors(): BelongsToMany
    {
        return $this->belongsToMany(Visitor::class);
    }

    public function scopeForCollege(Builder $query, $collegeId): Builder
    {
       //if null, return all programs
        if ($collegeId === null) {
            return $query;
        }

        return $query->where('college_id', $collegeId);
    }



}
