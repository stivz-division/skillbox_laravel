<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function taggable()
    {
        return $this->morphTo('taggable');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable')
            ->with('tags');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }
}
