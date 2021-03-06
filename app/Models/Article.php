<?php

namespace App\Models;

use App\Events\UpdateArticle;
use App\Models\Contracts\HasTags;
use App\Services\TagsSynchronizer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class Article extends Model implements HasTags
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'owner_id',
        'mini_description',
        'description',
        'is_published'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function scopePublished(Builder $query)
    {
        $query->where('is_published', true);
    }

    public function setPublished($status = true)
    {
        $this->update(['is_published' => $status]);
    }

    public function setUnpublished()
    {
        $this->setPublished(false);
    }

    public function scopeSlug(Builder $builder, $slug)
    {
        $builder->where('slug', $slug);
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function isOwner(User $user): bool
    {
        return $this->owner_id === $user->id;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
