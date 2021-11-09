<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @return string
     */
    public function create()
    {
        return view('articles.create');
    }


    public function store(ArticleRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        $validData = $request->validated();
        $article = Article::create($validData);
        $tagsSynchronizer->sync(collect(explode(',', $validData['tags'])), $article);
        return redirect(route('home'))->with('success', 'Статья добавлена');


    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * @param ArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, TagsSynchronizer $tagsSynchronizer, Article $article)
    {
        $validData = $request->validated();
        $tagsSynchronizer->sync(collect(explode(',', $validData['tags'])), $article);
        $article->update($validData);
        return back()->with('success', 'Данные изменены!');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect(route('home'))->with('success', 'Статья удалена');
    }
}
