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

    public function scopeSearch($query){
        if (request()->has('search_company')) {
            return $query->where('name', 'like', '%' . request('search_company') . '%')
                    ->orWhere('field_of_work', 'like', '%' . request('search_company') . '%');
        } else {
            return $query;
        }
    }
}
