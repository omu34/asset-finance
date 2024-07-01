<?php

namespace App\Policies;

use App\Models\Videos;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class VideosPolicy
{
    public function view(User $user, Videos $videos)
    {
        return true;
        // $user->id === $videos->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, Videos $videos)
    {
        return true;
        // $user->id === $videos->user_id;
    }

    public function delete(User $user, Videos $videos)
    {
        return true;
        // $user->id === $videos->user_id;
    }
}
