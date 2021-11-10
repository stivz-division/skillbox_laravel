<?php

namespace App\Models\Contracts;

use Illuminate\Support\Collection;

interface HasTags
{
    public function getTags(): Collection;
}
