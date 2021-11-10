<?php

namespace App\Models;

use App\Models\Contracts\HasTags;
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
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished(Builder $query)
    {
        $query->where('is_published', true);
    }

    public function scopeSlug(Builder $builder, $slug)
    {
        $builder->where('slug', $slug);
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }
}
