<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\CompanyScope;

class Message extends Model
{
    protected $table = 'messages';

    protected $guarded = [''];

    protected static function booted(): void
    {
        static::addGlobalScope(new CompanyScope);
    }
}
