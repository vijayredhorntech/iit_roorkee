<?php

namespace App\Services;

use App\DTOs\UserData;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    /**
     * @var UserRepository
     */
    protected UserRepository $repository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    /**
     * Create a new user.
     *
     * @param UserData $userData
     * @return \App\Models\User
     */
    public function createUser(UserData $userData)
    {
        $attributes = $userData->toArray();
        $attributes['password'] = Hash::make($attributes['password']);
        
        return $this->repository->create($attributes);
    }

    /**
     * Get users by role.
     *
     * @param string $role
     * @return Collection
     */
    public function getUsersByRole(string $role): Collection
    {
        return $this->repository->getUsersByRole($role);
    }

    /**
     * Get active users.
     *
     * @return Collection
     */
    public function getActiveUsers(): Collection
    {
        return $this->repository->getActiveUsers();
    }
} 