<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $table = 'companies';
    protected $guarded = [''];

    public function employee(): HasMany
    {
        return $this->hasMany(User::class, 'companies_id');
    }
}
