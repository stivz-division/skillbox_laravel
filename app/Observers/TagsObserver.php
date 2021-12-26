<?php

namespace App\Observers;

use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class TagsObserver
{
    /**
     * @param Tag $tag
     * @return void
     */
    public function created(Tag $tag)
    {
        Cache::tags(['tags'])->flush();
    }

    /**
     * @param Tag $tag
     * @return void
     */
    public function updated(Tag $tag)
    {
        Cache::tags(['tags'])->flush();
    }

    /**
     * @param Tag $tag
     * @return void
     */
    public function deleted(Tag $tag)
    {
        Cache::tags(['tags'])->flush();
    }
}
