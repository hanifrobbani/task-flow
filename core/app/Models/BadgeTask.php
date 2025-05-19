<?php

namespace App\Models;
use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Model;

class BadgeTask extends Model
{
    protected  $guarded = [''];
    protected $table = 'badge_tasks';

    protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);
    }
}
