<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    use HasFactory;

    protected $table = 'admin_users';

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'email_verified',
        'verify_token',
        'home_town',
        'city',
        'country',
        'pro_pic',
        'role_id',
        'status',
        'password',
    ];

}


