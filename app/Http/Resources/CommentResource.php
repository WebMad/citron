<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $comment = [
            'id' => $this->id,
            'text' => $this->text,
            'user_id' => $this->user_id,
            'feed_id' => $this->feed_id,
            'reply_id' => $this->reply_id,
            'is_discussion' => $this->is_discussion,
            'is_resolved' => $this->is_resolved,
            'created_at' => (new \DateTime($this->created_at))->format('H:i:s d.m.Y'),
            'updated_at' => (new \DateTime($this->updated_at))->format('H:i:s d.m.Y'),
            'can_delete' => Auth::id() == $this->user_id,
            'can_edit' => Auth::id() == $this->user_id,
        ];
        if ($this->user_id) {
            $comment['user'] = $this->user;
        }
        $comment['comments_tree'] = CommentResource::collection($this->comments_tree);
        return $comment;
    }
}
