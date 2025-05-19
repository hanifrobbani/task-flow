<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\CompanyScope;

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

  public function project()
  {
    return $this->belongsTo(Projects::class, 'projects_id');
  }

  public function badge()
  {
    return $this->belongsTo(BadgeTask::class, 'badge_tasks_id');
  }

   protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);
    }
}
