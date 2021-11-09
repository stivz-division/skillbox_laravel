<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
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
}
