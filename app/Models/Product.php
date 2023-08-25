<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'value', 'description',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */


     public function Usuarios(){
        return $this->belongsToMany(User::class, UserProduct::class, 'id', 'user_id');
     }
}
