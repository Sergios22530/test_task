<?php

namespace App\Core\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 *
 *
 * @property Model $model
 * @package App\Core\Repositories

 */
abstract class CoreRepository
{

    /** @var Model */
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
