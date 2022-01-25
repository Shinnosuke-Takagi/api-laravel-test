<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author' => new UserResource($this->whenLoaded('author')),
            'title'    => $this->title,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'tasks' => TaskResource::collection($this->whenLoaded('hasTasks')),
        ];
    }
}
