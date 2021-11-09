<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagsSynchronizer
{

    public function sync(Collection $tags, Model $model)
    {
        /** @var Collection $articleTags */
        $articleTags = $model->tags->keyBy('name');

        $formTags = $tags->keyBy(function ($item) {
            return $item;
        });

        $tagsToAttach = $formTags->diffKeys($articleTags);

        $syncIds = $articleTags->intersectByKeys($formTags)->pluck('id');

        foreach ($tagsToAttach as $tag) {
            $newTag = Tag::query()->firstOrCreate(['name' => $tag]);
            $syncIds[] = $newTag->id;
        }

        $model->tags()->sync($syncIds);
    }
}
