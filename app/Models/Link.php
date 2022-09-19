<?php

namespace App\Models;

use App\Core\Traits\DateTrait;
use App\Models\QueryBuilders\LinkQueryBuilder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Link
 *
 * @property int $id
 * @property int|null $user_id User Id
 * @property string $uuid Link uuid
 * @property string|null $expired_at Expired Link date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUuid($value)
 * @method LinkQueryBuilder  byUserId($id)
 * @mixin \Eloquent
 *
 * @property ?User $user
 */
class Link extends Model
{
    use HasFactory, DateTrait, SoftDeletes;

    protected $fillable = [
        'user_id', 'expired_at', 'uuid'
    ];

    protected $hidden = ['updated_at', 'deleted_at'];


    public function newEloquentBuilder($query)
    {
        return new LinkQueryBuilder($query);
    }


    public function getExpiredAtAttribute()
    {
        return Carbon::parse($this->attributes['expired_at']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
