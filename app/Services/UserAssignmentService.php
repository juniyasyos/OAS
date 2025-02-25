<?php

namespace App\Services;

use App\Repositories\UserAssignmentRepository;
use Illuminate\Support\Facades\Log;

class UserAssignmentService
{
    protected $repository;

    public function __construct(UserAssignmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function assignUser(array $data)
    {
        Log::info('Assigning user: ' . json_encode($data));
        return $this->repository->assignUser($data);
    }
}
