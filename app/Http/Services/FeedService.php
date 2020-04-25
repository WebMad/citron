<?php

namespace App\Http\Services;

use App\Feed;

/**
 * Class FeedService
 * @package App\Http\Services
 */
class FeedService extends BaseService
{

    /**
     * FeedService constructor.
     * @param Feed $feed
     */
    public function __construct(Feed $feed)
    {
        parent::__construct($feed);
    }

}
