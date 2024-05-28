<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'user_id',
        'date',
        'source',
        'type',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
