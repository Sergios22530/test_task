<?php

namespace App\Repositories;

use App\Core\Repositories\CoreRepository;
use App\Models\User;

/**
 * Class UserRepository
 *
 */
class UserRepository extends CoreRepository
{
    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return User::class;
    }

    /**
     * @param $id
     * @return ?User
     */
    public function getById($id):?User
    {
        return $this->startConditions()->findOrFail($id);
    }

    public function findUser(?string $name = null, ?string $phoneNumber = null): ?User
    {
        if (!$name || !$phoneNumber) return null;

        return $this->startConditions()->byName($name)->byPhoneNumber($phoneNumber)->first();
    }


}
