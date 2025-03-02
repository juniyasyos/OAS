<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Position
 */
class Position extends Model
{
    use HasFactory, SoftDeletes;

    // Define fillable fields
    protected $fillable = ['name', 'level', 'description'];

    // Guard ID from mass assignment
    protected $guarded = ['id'];

    // Hide timestamps in responses
    protected $hidden = ['created_at', 'updated_at'];
}
