<?php

namespace App\Models\QueryBuilders;



use App\Core\Models\QueryBuilders\CoreEloquentBuilder;

/**
 * Class UserQueryBuilder
 */
class UserQueryBuilder extends CoreEloquentBuilder
{


    /**
     * Find user by name
     * @param $name
     * @return UserQueryBuilder
     */
    public function byName(?string $name = null)
    {
        return $this->where('name', $name);
    }

    /**
     * Find user by phone
     * @param $phone
     * @return UserQueryBuilder
     */
    public function byPhoneNumber(?string $phone = null)
    {
        return $this->where('phone_number', $phone);
    }

}
