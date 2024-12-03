<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Define the relationship with Product
    public function products()
    {
        return $this->hasMany(Product::class, 'style_id', 'id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'style_id', 'id');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'style_id', 'id');
    }
}
