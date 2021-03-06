<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Services\TagsSynchronizer;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = News::query()->latest()->simplePaginate(20);
        return view('admin.news.index', compact('news'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * @param NewsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        $newNews['author_id'] = auth()->id();
        $newNews = $newNews + $request->validated();
        $news = News::create($newNews);
        $tagsSynchronizer->sync($request->getTags(), $news);
        return back()->with('success', 'Новость добавлена.');
    }

    /**
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * @param NewsRequest $request
     * @param News $news
     */
    public function update(NewsRequest $request, News $news, TagsSynchronizer $tagsSynchronizer)
    {
        $news->update($request->validated());
        $tagsSynchronizer->sync($request->getTags(), $news);
        return back()->with('success', 'Новость изменена.');
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
