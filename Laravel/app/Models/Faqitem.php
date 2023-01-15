<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqitem extends Model
{
    use HasFactory;

    // Relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
