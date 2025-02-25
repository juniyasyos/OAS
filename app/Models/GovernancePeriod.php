<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovernancePeriod extends Model
{
    /** @use HasFactory<\Database\Factories\GovernancePeriodFactory> */
    use HasFactory;

    // add fillable
    protected $fillable = ['start_date', 'end_date', 'description'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    // Accessor: Format date
    public function getFormattedStartDateAttribute()
    {
        return \Carbon\Carbon::parse($this->start_date)->format('d M Y');
    }
}
