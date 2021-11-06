<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $appeals = Appeal::query()->latest()->get();

        return view('admin.feedback.index', compact('appeals'));
    }
}
