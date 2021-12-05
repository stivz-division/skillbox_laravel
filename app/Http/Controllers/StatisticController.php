<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $longArticle = Article::query()
            ->selectRaw('slug, title, length(title) as length_title')
            ->whereRaw('length(title) = (select MAX(length(title)) from articles)')
            ->first();

        $shortArticle = Article::query()
            ->selectRaw('slug, title, length(title) as length_title')
            ->whereRaw('length(title) = (select MIN(length(title)) from articles)')
            ->first();

        $avgArticlesActiveUsers = User::query()
            ->has('articles', '>', '1')
            ->selectRaw('AVG((select count(*) from `articles` where `users`.`id` = `articles`.`owner_id`)) as avg_articles')
            ->first();

        $fickleArticle = Article::query()->latest('updated_at')->first();

        $popularArticle = Article::query()
            ->withCount('comments')
            ->latest('comments_count')
            ->first();

        return [
            'countArticles' => Article::count(),
            'countNews' => News::count(),
            'topAuthor' => User::query()->withCount('articles')->latest('articles_count')->first()->name,
//            'longArticle' => DB::table('articles')->selectRaw('length(title) as length_title, title')
//                ->latest('length_title')->first()->title,
            'longArticle' => [
                'title' => $longArticle->title,
                'link' => route('articles.show', $longArticle),
                'length_title' => $longArticle->length_title
            ],
//            'shortArticle' => DB::table('articles')->selectRaw('length(title) as length_title, title')
//                ->oldest('length_title')->first()->title,
            'shortArticle' => [
                'title' => $shortArticle->title,
                'link' => route('articles.show', $shortArticle),
                'length_title' => $shortArticle->length_title
            ],
            'avgArticlesActiveUsers' => +$avgArticlesActiveUsers->avg_articles,
            'fickleArticle' => [
                'title' => $fickleArticle->title,
                'link' => route('articles.show', $fickleArticle)
            ],
            'popularArticle' => [
                'title' => $popularArticle->title,
                'link' => route('articles.show', $popularArticle)
            ]
        ];
    }
}
