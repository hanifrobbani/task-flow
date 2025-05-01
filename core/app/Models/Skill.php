<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skill extends Model
{
    protected $table = 'skills';
    protected $guarded = ['id'];

    public function skills(): HasMany
    {
        return $this->hasMany(UserSkills::class, 'skills_id');
    }
}
