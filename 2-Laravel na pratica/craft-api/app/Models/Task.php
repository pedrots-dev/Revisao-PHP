<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'done',
        'finish'
    ];

    protected $casts = [
        'done' => 'boolean',
        'finish' => 'datetime'
    ];
}
