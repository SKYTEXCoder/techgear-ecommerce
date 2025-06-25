<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{

    protected static function booted() {
        static::saving(function ($category) {
            $category->depth = $category->calculateDepth();
        });
    }

    public function calculateDepth() {
        $depth = 0;
        $parent = $this->parent;
        while ($parent) {
            $depth++;
            $parent = $parent->parent;
        }
        return $depth;
    }

    public function parent(): BelongsTo {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }
}
