<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    protected $table = 'user_socials';
    protected $guarded = ['id'];

    public function social(){
        return $this->belongsTo(Socials::class, 'socials_id');
    }
}
