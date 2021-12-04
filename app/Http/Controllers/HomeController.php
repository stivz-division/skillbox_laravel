<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::published()->with('tags')->latest()->simplePaginate(10);
        return view('home', compact('articles'));
    }
}
