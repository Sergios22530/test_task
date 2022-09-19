<?php

namespace App\Repositories;

use App\Core\Repositories\CoreRepository;
use App\Models\Link;
use Illuminate\Support\Collection;

/**
 * Class LinkRepository
 *
 */
class LinkRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Link::class;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->startConditions()->get();
    }

    /**
     * @param string|null $uuid
     * @return ?Link
     */
    public function getByUUID(?string $uuid = null): ?Link
    {
        return $this->startConditions()->where('uuid',$uuid)->first();
    }

    /**
     * @param array $attributes
     * @return Link
     */
    public function create(array $attributes): Link
    {
        return $this->startConditions()::create($attributes);
    }

    /**
     * @param $model
     * @return mixed
     */
    public function delete($model)
    {
        return $model->delete();
    }



}
