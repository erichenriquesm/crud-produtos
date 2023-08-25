<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_id', 'user_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */

}
