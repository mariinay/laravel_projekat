<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'advertisement';

    public function toArray($request)
    {
        return[
            'id' => $this->resource->id,
            'position' => $this->resource->position,
            'company' => new CompanyResource($this->resource->company),
            'description' => $this->resource->description,
            'user' => new UserResource($this->resource->user)
        ];


    }
}
