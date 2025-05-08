<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];
    protected $table = 'tasks';
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

}
