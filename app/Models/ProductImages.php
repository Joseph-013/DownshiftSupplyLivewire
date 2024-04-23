<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    public $table = 'product_images';
    use HasFactory;

    protected $guarded = [];
}
