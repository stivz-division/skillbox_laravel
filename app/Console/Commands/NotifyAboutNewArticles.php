<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use App\Notifications\NewArticles;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification;

class NotifyAboutNewArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:notify {from? : format: Y-m-d} {to? : format: Y-m-d}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify about new articles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $from = date($this->argument('from'));
        $to = date($this->argument('to'));

        if (empty($from)) {
            $from = Carbon::now()->subDay(7)->format('Y-m-d');
        }

        if (empty($to)) {
            $to = Carbon::now()->addDay(1)->format('Y-m-d');
        }

        $articles = Article::query()->whereBetween('created_at', [$from, $to])->get();

        User::query()->chunk(50, function ($user) use ($articles) {
            Notification::send($user, new NewArticles($articles));
        });

        return Command::SUCCESS;
    }
}
