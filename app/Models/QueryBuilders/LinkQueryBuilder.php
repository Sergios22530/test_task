<?php

namespace App\Models\QueryBuilders;


use App\Core\Models\QueryBuilders\CoreEloquentBuilder;

/**
 * Class LinkQueryBuilder
 */
class LinkQueryBuilder extends CoreEloquentBuilder
{

    /**
     * Find link by user
     * @param $id
     * @return LinkQueryBuilder
     */
    public function byUserId(?int $id = null)
    {
        return $this->where('user_id', $id);
    }

}
