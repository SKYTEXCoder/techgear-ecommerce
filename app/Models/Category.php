<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{

    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'depth',
        'department_id',
        'parent_category_id',
        'filterable_specifications',
        'is_active',
    ];

    protected $casts = [
        'filterable_specifications' => 'array',
        'is_active' => 'boolean',
        'depth' => 'integer',
    ];

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

    public function brands(): BelongsToMany {
        return $this->belongsToMany(Brand::class, 'brand_category');
    }

    public function parent(): BelongsTo {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }
}
