<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Cache::tags(['articles'])
            ->remember('articles|' . \request('page', 1), 3600 * 24, function () {
                return Article::published()->with('tags')->latest()->simplePaginate(10);
            });

        return view('home', compact('articles'));
    }
}
