<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSkills extends Model
{
    protected $table = 'user_skills';
    protected $guarded = ['id'];

    public function skills(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skills_id');
    }

    public function user_id(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
