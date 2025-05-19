<?php

namespace App\Models;
use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;

class BadgeProject extends Model
{
    protected $guarded = [''];

    protected $table = 'badge_projects';
     protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);
    }
}
