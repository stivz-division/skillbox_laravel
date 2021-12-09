<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Jobs\ResultReportJob;
use App\Models\Article;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        return view('admin.reports.results');
    }

    public function report()
    {
        $articles = (bool) \request('articles', false);
        $news = (bool) \request('news', false);
        $tags = (bool) \request('tags', false);

        ResultReportJob::dispatch(auth()->user()->email, $articles, $news, $tags);

        return back()->with('success', 'Отчет формируется. По готовности будет выслан на Вашу почту.');
    }
}
