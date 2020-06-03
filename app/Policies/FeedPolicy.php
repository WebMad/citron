<?php

namespace App\Policies;

use App\Feed;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class FeedPolicy
 * @package App\Policies
 */
class FeedPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any feeds.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the feed.
     *
     * @param \App\User $user
     * @param \App\Feed $feed
     * @return mixed
     */
    public function view(User $user, Feed $feed)
    {
//        $feed_tasks = $feed->tasks()->with(['project'])->pluck('project.id');
//        $user_projects = $user->projects()->pluck('id');
//        var_dump($feed_tasks);
        return true;
    }

    /**
     * Determine whether the user can create feeds.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the feed.
     *
     * @param \App\User $user
     * @param \App\Feed $feed
     * @return mixed
     */
    public function update(User $user, Feed $feed)
    {
        //
    }

    /**
     * Determine whether the user can delete the feed.
     *
     * @param \App\User $user
     * @param \App\Feed $feed
     * @return mixed
     */
    public function delete(User $user, Feed $feed)
    {
        //
    }

    /**
     * Determine whether the user can restore the feed.
     *
     * @param \App\User $user
     * @param \App\Feed $feed
     * @return mixed
     */
    public function restore(User $user, Feed $feed)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the feed.
     *
     * @param \App\User $user
     * @param \App\Feed $feed
     * @return mixed
     */
    public function forceDelete(User $user, Feed $feed)
    {
        //
    }
}
