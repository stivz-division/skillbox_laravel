<?php

namespace App\Http\Controllers;

use App\Events\CreateArticle;
use App\Events\DeleteArticle;
use App\Events\UpdateArticle;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
        $this->middleware('can:update,article')->only(['edit', 'update']);
        $this->middleware('can:delete,article')->only(['destroy']);
    }

    /**
     * @return string
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * @param ArticleRequest $request
     * @param TagsSynchronizer $tagsSynchronizer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        $validData = $request->validated();

        $validData['owner_id'] = auth()->user()->id;

        $article = Article::create($validData);
        $tagsSynchronizer->sync($request->getTags(), $article);

        event(new CreateArticle($article));

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
     * @param TagsSynchronizer $tagsSynchronizer
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, TagsSynchronizer $tagsSynchronizer, Article $article)
    {
        $this->authorize('update', $article);

        $validData = $request->validated();
        $tagsSynchronizer->sync($request->getTags(), $article);
        $article->update($validData);


        /*
            Метод updated не срабатывает в Observe
        */
        event(new UpdateArticle($article));

        return back()->with('success', 'Данные изменены!');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Article $article)
    {
        /*
             Метод deleted срабатывает в Observe,
             но не отпрвляет mail и перенаправляет на уже удаленную статью
             что вызывает 404 ошибку
        */
        event(new DeleteArticle($article));

        $article->delete();
        return redirect(route('home'))->with('success', 'Статья удалена');
    }
}
