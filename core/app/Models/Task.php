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

    public function user()
    { 
      return $this->belongsTo(User::class, 'users_id');      
    }

    public function project(){
      return $this->belongsTo(Projects::class, 'projects_id');
    }
}
