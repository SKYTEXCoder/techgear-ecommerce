<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon_svg_path',
        'has_new_products',
        'is_active',
        'is_currently_featured',
    ];

    public function categories() {
        return $this->hasMany(Category::class);
    }
}
