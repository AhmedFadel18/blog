<?php

namespace App\Http\Resources;

use App\Http\Resources\TagsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
            'title'=>$this->title,
            'description'=>$this->description,
            'image'=>$this->image,
            'status'=>$this->status == 1? 'Published' : 'Not Published',
            'slug'=>$this->slug,
            'tags'=>TagsResource::collection($this->tags),
            'published at'=>$this->created_at->format('d/m/y'),
        ];
    }
}
