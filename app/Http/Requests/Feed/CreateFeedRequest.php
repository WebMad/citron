<?php

namespace App\Http\Requests\Feed;

use App\Http\Requests\BaseRequest;

class CreateFeedRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_id' => 'required|exists:feed_types,id'
        ];
    }
}
