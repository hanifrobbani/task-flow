<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Skill;
use App\Models\Socials;
use App\Models\UserSkills;
use App\Models\UserSocial;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = Hash::make('admin');
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => $password
        ]);
        Skill::create([
            'name' => 'admin',
            'logo' => '<i class="devicon-laravel-original colored"></i>',
        ]);
        Socials::create([
            'name' => 'admin',
            'logo' => '<i class="devicon-laravel-original colored"></i>',
            'platform' => 'Laravel',
        ]);
        
        UserSkills::create([
            'skill' => 'Laravel',
            'users_id' => '1',
            'skills_id' => '1',
        ]);
        UserSocial::create([
            'link' => 'Laravel',
            'socials_id' => '1',
            'users_id' => '1',
        ]);


    }
}
