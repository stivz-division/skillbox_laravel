<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlePublishController extends Controller
{
    public function published(Article $article)
    {
        $article->setPublished();
        return back();
    }

    public function unpublished(Article $article)
    {
        $article->setUnpublished();
        return back();
    }
}
