<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class NewsCommentsController extends Controller
{
    /**
     * @param CommentRequest $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request, News $news)
    {
        $news->comments()->create([
            'author_id' => $request->user()->id,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Комментарий добавлен');
    }

    /**
     * @param News $news
     * @param Comment $comment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news, Comment $comment)
    {
        $routeUpdate = route('news.comments.update', [$news, $comment]);
        $routeBack = route('news.show', $news);
        return view('articles.comments.edit', compact('routeUpdate', 'routeBack', 'comment'));
    }

    /**
     * @param CommentRequest $request
     * @param $news
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CommentRequest $request, $news, Comment $comment)
    {
        $comment->update([
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Комментарий изменен.');
    }
}
