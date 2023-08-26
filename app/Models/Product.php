<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nome', 'objetivo', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
}
