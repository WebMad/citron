<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\BaseRequest;

class UpdateCommentRequest extends CommentRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'text' => '',
            'user_id' => 'nullable|exists:users,id',
            'feed_id' => 'nullable|exists:feeds,id',
            'reply_id' => 'nullable|exists:comments,id',
            'is_discussion' => 'nullable|boolean',
            'is_resolved' => 'nullable|boolean',
        ]);
    }
}
