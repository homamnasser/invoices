<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'HomamNasser',
            'email' => 'homam.naser.3@gmail.com',
            'password' => bcrypt('12345678'),
            'roles_name' => ["owner"],
            'Status' => 'مفعل',
        ]);

        $role = Role::create(['name' => 'owner']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


    }
}


