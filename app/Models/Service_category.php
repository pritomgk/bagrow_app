<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_category extends Model
{
    use HasFactory;

    protected $table = 'service_categories';

    protected $primaryKey = 'sercat_id';

    protected $fillable = [
        'title',
        'image',
        'description',
        'position',
    ];


    static public function home_sercats(){
        return self::limit(5)->get();
    }














}

