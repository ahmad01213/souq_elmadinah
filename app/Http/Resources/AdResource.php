<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'title' => $this->title,
            'desc' => $this->desc,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'sub_cat_id' => $this->sub_cat_id,
            'published' => $this->published,
            'date' => $this->created_at,
        ];      }
}
