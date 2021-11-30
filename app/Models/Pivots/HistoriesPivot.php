<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HistoriesPivot extends Pivot
{
    protected $casts = [
        'before' => 'collection',
        'after' => 'collection'
    ];
}
