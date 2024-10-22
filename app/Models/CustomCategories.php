<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'custom_category_id',
        'custom_category_name',
        'icon',
    ];

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
