<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';
    use HasFactory;

    protected $guarded = [];

    public function product_images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function product_categories()
    {
        return $this->belongsTo(ProductCategories::class, 'category_id');
    }
}
