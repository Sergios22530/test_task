<?php

namespace App\Models;

use App\Core\Traits\DateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Lottery
 *
 * @property int $id
 * @property int|null $user_id User Id
 * @property int $result Result
 * @property int $percent Lottery percent
 * @property int $random_value Random result
 * @property int $win_amount Win Amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery whereRandomValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lottery whereWinAmount($value)
 * @mixin \Eloquent
 *
 * @property ?User $user
 */
class Lottery extends Model
{
    use HasFactory, DateTrait, SoftDeletes;

    protected $fillable = [
        'user_id', 'random_value', 'win_amount','result','percent'
    ];

    protected $hidden = ['updated_at', 'deleted_at'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
