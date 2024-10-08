<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public $table = 'details';
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
