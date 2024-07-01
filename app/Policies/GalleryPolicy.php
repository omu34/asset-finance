<?php

namespace App\Policies;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GalleryPolicy
{
    public function view(User $user, Gallery $gallery)
    {
        return true;
        // $user->id === $latestGallery->user_id;
    }

    public function create(User $user)
    {
        return true;
        // $user->role === 'admin';
    }

    public function update(User $user,Gallery $gallery)
    {
        return true;
        // $user->id === $latestGallery->user_id;
    }

    public function delete(User $user, Gallery $gallery)
    {
        return true;
        // $user->id === $latestGallery->user_id;
    }
}
