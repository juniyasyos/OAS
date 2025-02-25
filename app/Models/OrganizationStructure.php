<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationStructure extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationStructureFactory> */
    use HasFactory;

    // add fillable
    protected $fillable = ['name', 'description'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
