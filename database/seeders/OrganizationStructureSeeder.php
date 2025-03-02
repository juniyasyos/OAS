<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\{
    User,
    Role,
    Position,
    Department,
    UserAssignment,
    GovernancePeriod,
    OrganizationStructure
};

class OrganizationStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::factory(5)->create()->collect();
        $organizationStructures = OrganizationStructure::factory(2)->create()->collect();
        $roles = Role::factory(3)->create()->collect();
        $users = User::factory(10)->create()->collect();

        $positions = collect([
            ['name' => 'Director', 'level' => 1, 'description' => 'Defines strategic direction and oversees high-level decision-making.'],
            ['name' => 'Manager', 'level' => 2, 'description' => 'Leads a department, sets goals, and manages resources effectively.'],
            ['name' => 'Supervisor', 'level' => 3, 'description' => 'Oversees team performance and ensures tasks are completed efficiently.'],
            ['name' => 'Staff', 'level' => 4, 'description' => 'Responsible for executing daily tasks and supporting operations.'],
        ])->map(fn($data) => Position::factory()->create($data));

        $governancePeriod = GovernancePeriod::factory()->create([
            'start_date' => Carbon::parse('2024-01-01'),
            'end_date' => Carbon::parse('2025-12-31'),
        ]);

        $users->each(function ($user) use ($departments, $organizationStructures, $roles, $positions, $governancePeriod) {
            UserAssignment::factory()->create([
                'user_id' => $user->id,
                'role_id' => $roles->random()->id,
                'department_id' => $departments->random()->id,
                'position_id' => $positions->random()->id,
                'governance_period_id' => $governancePeriod->id,
                'organization_structure_id' => $organizationStructures->random()->id,
                'assigned_at' => $governancePeriod->start_date,
            ]);
        });
    }
}
