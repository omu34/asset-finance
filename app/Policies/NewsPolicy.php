<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NewsPolicy
{
    public function view(User $user, News $news)
    {
        return true;
        // $user->id === $latestNews->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user, News $news)
    {
        return true;
        // $user->id === $latestNews->user_id;
    }

    public function delete(User $user, News $news)
    {
        return true;
        // $user->id === $latestNews->user_id;
    }
}
