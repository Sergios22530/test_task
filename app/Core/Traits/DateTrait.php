<?php

namespace App\Core\Traits;

use Illuminate\Support\Carbon;

/**
 * Trait DateTrait - Date mutators for eloquent Model
 * @package App\Core\Models\Traits
 *
 * @property string $defaultDateFormat
 */
trait DateTrait
{
    protected $defaultDateFormat = 'Y-m-d H:i:s';

    /**
     * Convert created_at date
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format($this->defaultDateFormat);
    }

}
