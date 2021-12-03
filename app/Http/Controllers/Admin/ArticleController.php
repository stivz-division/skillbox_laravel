<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()->simplePaginate(20);
        return view('admin.articles.index', compact('articles'));
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, TagsSynchronizer $tagsSynchronizer, Article $article)
    {
        $validData = $request->validated();
        $tagsSynchronizer->sync($request->getTags(), $article);
        $article->update($validData);

        return back()->with('success', 'Данные изменены!');
    }
}
