<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Projects extends Model
{
    protected $table = 'projects';
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function teamMembers(): HasMany
    {
        return $this->hasMany(ProjectTeamMember::class, 'projects_id');
    }

    public function task(): HasMany
    {
        return $this->hasMany(Task::class, 'projects_id');
    }

}
