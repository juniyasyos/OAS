<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\Position;
use App\Models\Department;
use App\Models\GovernancePeriod;
use App\Models\OrganizationStructure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAssignment>
 */
class UserAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'role_id' => Role::factory(),
            'department_id' => Department::factory(),
            'position_id' => Position::factory(),
            'governance_period_id' => GovernancePeriod::factory(),
            'organization_structure_id' => OrganizationStructure::factory(),
            'parent_id' => null,
            'assigned_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
