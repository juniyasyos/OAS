<?php

namespace App\Repositories;

use App\Models\UserAssignment;

class UserAssignmentRepository
{
    public function getAll()
    {
        return UserAssignment::with(['user', 'role', 'department', 'position'])->get();
    }

    public function getByUserId(int $userId): ?UserAssignment
    {
        return UserAssignment::where('user_id', $userId)->first();
    }

    public function assignUser(array $data): UserAssignment
    {
        return UserAssignment::create($data);
    }

    public function deleteAssignment(int $id): bool
    {
        return UserAssignment::destroy($id);
    }
}
