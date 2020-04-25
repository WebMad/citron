<?php

namespace App\Http\Requests\Feed;

class UpdateFeedRequest extends FeedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'type_id' => 'required|exists:feed_types,id'
        ]);
    }
}
