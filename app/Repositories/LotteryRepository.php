<?php

namespace App\Repositories;

use App\Core\Repositories\CoreRepository;
use App\Models\Link;
use App\Models\Lottery;
use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Class LotteryRepository
 */
class LotteryRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Lottery::class;
    }

    /**
     * @return Collection
     */
    public function getLastHistory(User $user): Collection
    {
        return $this->startConditions()->where('user_id', $user->id)->orderByDesc('id')->limit(3)->get();
    }

    /**
     * @param array $attributes
     * @return Link
     */
    public function create(array $attributes): Lottery
    {
        return $this->startConditions()::create($attributes);
    }

}
