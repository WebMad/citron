<?php

namespace App\Http\Services;

use App\Comment;

/**
 * Class CommentService
 * @package App\Http\Services
 */
class CommentService extends BaseService
{

    /**
     * CommentService constructor.
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
    }

}
