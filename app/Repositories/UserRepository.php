<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Get users by role.
     *
     * @param string $role
     * @return Collection
     */
    public function getUsersByRole(string $role): Collection
    {
        return $this->model->whereHas($role)->with($role)->get();
    }

    /**
     * Get active users.
     *
     * @return Collection
     */
    public function getActiveUsers(): Collection
    {
        return $this->model->whereNotNull('email_verified_at')->get();
    }
} 