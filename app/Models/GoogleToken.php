<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleToken extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_token',
        'refresh_token',
        'expires_at',
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
     protected $dates = [
        'expires_at',
    ];
}
