<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Str;

class SlugService 
{
    public function generate($title, $model)
    {
        $slug = Str::slug($title);
        if($model::whereSlug($slug)->exists())
        {
            $slug = $slug .'-'. Str::uuid();
        }

        return $slug;
    }
}

