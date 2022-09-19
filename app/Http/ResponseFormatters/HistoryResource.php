<?php

namespace App\Http\ResponseFormatters;

use App\Models\Lottery;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        if (!$this->resource->count()) return $this->resource;
        return $this->resource->transform(function ($item) {
            /** @var Lottery $item */

            return [
                'result' => $item->result ? 'WIN' : 'LOSE',
                'random_value' => $item->random_value,
                'win_amount' => $item->win_amount,
                'created_at' => $item->created_at
            ];
        })->toArray();

    }


}
