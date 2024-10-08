<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'short_name', 'contact_person', 'contact_number', 'contact_email', 'user_id'];


    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function visitors(): Visitor
    {
        return Visitor::whereIn('id', function (Builder $query) {
            $query->select('visitor_id')
                  ->from('program_visitor')
                  ->join('programs', 'programs.id', '=', 'program_visitor.program_id')
                  ->whereIn('programs.id', $this->programs->pluck('id'));
        });
    }

    public function scopeSearch(Builder $query, $search): Builder
    {
        return $query->where('name', 'like', '%' . $search . '%')
                     ->orWhere('short_name', 'like', '%' . $search . '%');
    }

}
