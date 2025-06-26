<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    public function departments(): BelongsTo {
        return $this->belongsTo(Department::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsToMany {
        return $this->belongsToMany(Brand::class, 'brands_products');
    }
}
