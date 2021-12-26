<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = Cache::tags(['news'])->remember('news|' . \request('page', 1), 3600 * 24, function () {
            return News::latest()->simplePaginate(10);
        });

        return view('news.index', compact('news'));
    }


    /**
     * @param $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($news)
    {
        $news = Cache::tags(['news'])->remember('load_news|' . $news, 3600 * 24, function () use ($news) {
            return News::with(['comments', 'comments.author'])
                ->findOrFail($news);
        });

        return view('news.show', compact('news'));
    }

}
