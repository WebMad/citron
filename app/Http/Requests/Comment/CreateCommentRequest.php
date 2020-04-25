<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\BaseRequest;

class CreateCommentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required',
            'user_id' => 'required|exists:users,id',
            'feed_id' => 'required|exists:feeds,id',
            'reply_id' => 'nullable|exists:comments,id',
            'is_discussion' => 'nullable|boolean',
            'is_resolved' => 'nullable|boolean',
        ];
    }
}
