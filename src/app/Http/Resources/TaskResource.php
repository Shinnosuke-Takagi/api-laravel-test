<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $created_at = new Carbon($this->created_at);
        $updated_at = new Carbon($this->updated_at);
        return [
            'data' => [
                'type' => 'task',
                'id' => $this->id,
                'content' => $this->content,
                'created_at' => $created_at->format('Y/m/d H:i'),
                'updated_at' => $updated_at->format('Y/m/d H:i'),
                'belongsFolder' => $this->belongsFolder->title,
            ],
            'links' => [
                'self' => url('/task/' . $this->id),
            ],
        ];
    }
}
