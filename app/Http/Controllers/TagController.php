<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $articles = $tag->articles;
        $news = $tag->news;
        return view('tags.index', compact('articles', 'news'));
    }
}
