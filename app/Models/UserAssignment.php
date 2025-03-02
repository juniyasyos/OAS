<?php

namespace App\Models;

use App\Models\User;
use App\Models\Position;
use App\Models\Department;
use App\Models\GovernancePeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAssignment extends Model
{
    /** @use HasFactory<\Database\Factories\UserAssignmentFactory> */
    use HasFactory;

    // add fillable
    protected $fillable = [
        'user_id',
        'role_id',
        'department_id',
        'position_id',
        'governance_period_id',
        'organization_structure_id',
        'parent_id',
        'assigned_at'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function governancePeriod(): BelongsTo
    {
        return $this->belongsTo(GovernancePeriod::class);
    }

    public function organizationStructure(): BelongsTo
    {
        return $this->belongsTo(OrganizationStructure::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    // Accessor: Format assigned date
    public function getFormattedAssignedDateAttribute()
    {
        return \Carbon\Carbon::parse($this->assigned_at)->format('d M Y');
    }
}
