<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    public $table = 'product_categories';
    use HasFactory;

    protected $guarded = [];
}
