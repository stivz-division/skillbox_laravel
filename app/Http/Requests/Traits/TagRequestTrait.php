<?php

namespace App\Http\Requests\Traits;

use Illuminate\Support\Collection;

trait TagRequestTrait
{
    public function getTags(): Collection
    {
        return collect(explode(',', $this->tags));
    }
}
