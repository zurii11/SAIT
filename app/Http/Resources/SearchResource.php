<?php

namespace App\Http\Resources;

use App\Models\Departure;
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
            'departureId' => $this['id'],
            'price' => $this['price'],
            // 'soldTickets' => Departure::find($this['id'])->tickets()->count(),
            'soldTickets' => $this['soldTickets'],
            'ticketsLeft' => $this['ticketsLeft'],
            'sellLimit' => 18,
            'startStation' => $this['route']['start_station'],
            'stopStations' => $this['route']['route_stops'],
            'searchedStop' => $this['searched_stop'],
            // 'stopType' => gettype($this->route->routeStops[0]),
            // 'stopType' => $this->route->routeStops[0],
            'departureTime' => $this['start_time'],
            'departureDate' => $this['date']
        ];
    }
}
