<?php

namespace App\Models;

use App\Models\Contracts\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model implements HasTags
{
    use HasFactory;

    protected $fillable = [
        'author_id', 'title', 'description'
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
