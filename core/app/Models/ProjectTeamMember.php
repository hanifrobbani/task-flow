<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTeamMember extends Model
{
    protected $table = 'project_team_members';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
