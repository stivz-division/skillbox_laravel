<?php

namespace App\Observers;

use App\Events\ArticleInformer;
use App\Mail\CreateArticle;
use App\Mail\DeleteArticle;
use App\Mail\UpdateArticle;
use App\Models\Article;
use App\Services\PushAll;
use Illuminate\Support\Facades\Cache;
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
        Cache::tags(['articles'])->flush();
//        push_all('Новая статья!', $article->title);

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
        Cache::tags(['articles'])->flush();
        Mail::to(config('app.admin_email'))
            ->queue(new UpdateArticle($article));
    }

    /**
     * @param Article $article
     * @return void
     */
    public function updating(Article $article)
    {
        ArticleInformer::dispatch($article, $article->getDirty());
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        Cache::tags(['articles'])->flush();
        Mail::to(config('app.admin_email'))
            ->queue(new DeleteArticle([
                'title' => $article->title,
                'mini_description' => $article->mini_description
            ]));
    }
}
