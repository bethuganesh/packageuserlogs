<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'login_at',
        'logout_at',
        'url',
        'ip_address',
        'browser',
        'visited_at',
        'ip_details'
    ];
}
