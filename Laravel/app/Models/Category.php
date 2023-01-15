<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Relationship to Faqitems
    public function faqitems()
    {
        return $this->hasMany(Faqitem::class, 'category_id');
    }
}
