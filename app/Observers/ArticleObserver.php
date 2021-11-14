<?php

namespace App\Observers;

use App\Mail\CreateArticle;
use App\Mail\DeleteArticle;
use App\Mail\UpdateArticle;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;

class ArticleObserver
{

    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        Mail::to(config('app.admin_email'))
            ->queue(new CreateArticle($article));
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        Mail::to(config('app.admin_email'))
            ->queue(new UpdateArticle($article));
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        Mail::to(config('app.admin_email'))
            ->queue(new DeleteArticle([
                'title' => $article->title,
                'mini_description' => $article->mini_description
            ]));
    }
}
