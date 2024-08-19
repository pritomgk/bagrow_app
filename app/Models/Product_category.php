<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    protected $primaryKey = 'procat_id';

    protected $fillable = [
        'title',
        'image',
        'description',
        'position',
    ];

}
