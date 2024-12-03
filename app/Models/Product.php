<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function ParentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function style()
    {
        return $this->belongsTo(Style::class, 'style_id');
    }

    public function colour()
    {
        return $this->belongsTo(Colour::class, 'colour_id');
    }

    public function assembly()
    {
        return $this->belongsTo(Assembly::class, 'assembly_id');
    }
}
