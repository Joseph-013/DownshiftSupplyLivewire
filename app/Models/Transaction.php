<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table = 'transactions';
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'purchaseDate' => 'datetime',
    ];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
