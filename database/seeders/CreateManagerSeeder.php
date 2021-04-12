<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = User::create([
            'name' => User::ROLE_MANAGER,
            'email' => 'manager@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('manager'),
            'remember_token' => Str::random(10),
        ]);
        $role = Role::create(['name' => User::ROLE_MANAGER]);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $manager->assignRole([$role->id]);
    }
}
