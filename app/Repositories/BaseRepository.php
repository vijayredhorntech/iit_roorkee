<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritDoc}
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, array $attributes): Model
    {
        $model = $this->find($id);
        if ($model) {
            $model->update($attributes);
        }
        return $model;
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id) > 0;
    }
} 