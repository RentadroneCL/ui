<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Media extends JsonResource
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
            'id' => $this->id,
            'name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'size' => $this->size,
            'public_url' => $this->getUrl(),
            'data' => $this->getCustomProperty('data'),
            'raw_data' => $this->getCustomProperty('raw_data'),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
