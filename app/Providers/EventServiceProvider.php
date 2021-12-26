<?php

namespace App\Providers;

use App\Events\CreateArticle;
use App\Events\DeleteArticle;
use App\Events\UpdateArticle;
use App\Listeners\SendMailAdminCreateArticleListener;
use App\Listeners\SendMailAdminDeleteArticleListener;
use App\Listeners\SendMailAdminUpdateArticleListener;
use App\Models\Article;
//use App\Observers\ArticleObserver;
use App\Models\News;
use App\Models\Tag;
use App\Observers\ArticleObserver;
use App\Observers\NewsObserver;
use App\Observers\TagsObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
//        CreateArticle::class => [
//            SendMailAdminCreateArticleListener::class
//        ],
//        UpdateArticle::class => [
//            SendMailAdminUpdateArticleListener::class
//        ],
//        DeleteArticle::class => [
//            SendMailAdminDeleteArticleListener::class
//        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Article::observe(ArticleObserver::class);
        News::observe(NewsObserver::class);
        Tag::observe(TagsObserver::class);
    }
}
