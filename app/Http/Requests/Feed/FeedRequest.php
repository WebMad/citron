<?php

namespace App\Http\Requests\Feed;

use App\Http\Requests\BaseRequest;

class FeedRequest extends BaseRequest
{
    /**
     * @param null $keys
     * @return array
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('feed');
        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:feeds,id'
        ];
    }
}
