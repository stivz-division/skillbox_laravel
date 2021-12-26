<?php

namespace App\Jobs;

use App\Mail\ResultReportMail;
use App\Models\Article;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class ResultReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public string $email,
        public bool   $articles,
        public bool   $news,
        public bool   $tags
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reportMessages = collect();

        $reportMessages
            ->when($this->articles, function ($collection) {
                return $collection->put('Статей:', Cache::tags(['articles'])->remember('articles_count', 3600 * 24, function () {
                    Article::count();
                }));
            })
            ->when($this->news, function ($collection) {
                return $collection->put('Новостей:', Cache::tags(['news'])->remember('news_count', 3600 * 24, function () {
                    return News::count();
                }));
            })
            ->when($this->tags, function ($collection) {
                return $collection->put('Тегов:', Cache::tags(['tags'])->remember('tags_count', 3600 * 24, function () {
                    return Tag::count();
                }));
            });

        Mail::to($this->email)->send(new ResultReportMail($reportMessages));
    }
}
