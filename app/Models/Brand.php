<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'logo_path',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'brand_category');
    }

    public function brandTypes(): BelongsToMany {
        return $this->belongsToMany(BrandType::class, 'brand_brand_type');
    }

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'brands_products');
    }
}
