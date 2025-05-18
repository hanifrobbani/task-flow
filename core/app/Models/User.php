<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];
    protected $table = 'users';

    public function UserSocials(): HasMany
    {
        return $this->hasMany(UserSocial::class, 'users_id');
    }
    public function UserSkills(): HasMany
    {
        return $this->hasMany(UserSkills::class, 'users_id');
    }

    public function userPosition()
    {
        return $this->belongsTo(CompanyPosition::class, 'company_positions_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'users_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'companies_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
