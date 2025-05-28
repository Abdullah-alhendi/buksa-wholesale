<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
        use HasFactory;

    protected $fillable = ['name', 'description','wholesale_price','stock', 'price', 'image', 'category_id',  'unit',
    'min_order'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reviews()
{
    return $this->hasMany(ProductReview::class);
}

}
