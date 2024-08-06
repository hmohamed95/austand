<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'short_name', 'contact_person', 'contact_number', 'contact_email', 'user_id'];


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



}
