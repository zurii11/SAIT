<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'startStation' => $this->route->start_station_id,
            'stopStation' => $this->stop_station_id,
            'departureTime' => $this->start_time,
            'departureDate' => $this->date
        ];
    }
}
