<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param CommentRequest $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request, Article $article)
    {
        $article->comments()->create([
            'author_id' => $request->user()->id,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Комментарий добавлен');
    }

    /**
     * @param Article $article
     * @param Comment $comment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article, Comment $comment)
    {
        return view('articles.comments.edit', compact('article', 'comment'));
    }

    /**
     * @param CommentRequest $request
     * @param $article
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CommentRequest $request, $article, Comment $comment)
    {
        $comment->update([
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Комментарий изменен.');
    }
}
