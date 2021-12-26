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
                return $collection->put('Статей:', Article::count());
            })
            ->when($this->news, function ($collection) {
                return $collection->put('Новостей:', News::count());
            })
            ->when($this->tags, function ($collection) {
                return $collection->put('Тегов:', Tag::count());
            });

        Mail::to($this->email)->send(new ResultReportMail($reportMessages));
    }
}
