<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Article $article)
    {
        return $article->isOwner($user);
    }

    public function delete(User $user, Article $article)
    {
        return $article->isOwner($user);
    }
}
