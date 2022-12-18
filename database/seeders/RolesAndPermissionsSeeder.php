<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
           
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
         ];
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

        // create roles and assign created permissions
        $role = Role::create(['name' => 'FYP Coordinator']);
        $role->givePermissionTo(Permission::all());
        
        $role = Role::create(['name' => 'Lecturer'])->givePermissionTo(['project-list']);
        $role = Role::create(['name' => 'Student'])->givePermissionTo(['project-list']);
        $role = Role::create(['name' => 'Public'])->givePermissionTo(['project-list']);

        $role1 = Role::where('name', 'FYP Coordinator')->first();
        $user = User::create([
            'name' => 'Fannie', 
            'email' => 'fannie@gmail.com',
            'password' => bcrypt('123456')
        ]); 
        $user->assignRole($role1);
        // $user1->assignRole()->where('name', 'FYP Coordinator');

        $role2 = Role::where('name', 'Lecturer')->first();
        $user = User::create([
            'name' => 'Dr. Chong', 
            'email' => 'chong@gmail.com',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole($role2);
        // $user2->assignRole()->where('name', 'Lecturer');

        // $role3 = Role::where('name', 'Lecturer')->first();
        $user = User::create([
            'name' => 'Dr. Lim', 
            'email' => 'lim@gmail.com',
            'password' => bcrypt('123456')
        ]); 
        $user->assignRole($role2);

        // $role = Role::where('name', 'Lecturer')->first();
        $user = User::create([
            'name' => 'Dr. Tan', 
            'email' => 'tan@gmail.com',
            'password' => bcrypt('123456')
        ]); 
        $user->assignRole($role2);

        $role3 = Role::where('name', 'Student')->first();
        $user = User::create([
            'name' => 'Ali', 
            'email' => 'ali@gmail.com',
            'password' => bcrypt('123456')
        ]); 
        $user->assignRole($role3);

        // $role = Role::where('name', 'Student')->first();
        $user = User::create([
            'name' => 'Muthu', 
            'email' => 'muthu@gmail.com',
            'password' => bcrypt('123456')
        ]); 
        $user->assignRole($role3);
        
        // $role = Role::where('name', 'Student')->first();
        $user = User::create([
            'name' => 'Ah Hock', 
            'email' => 'ahhock@gmail.com',
            'password' => bcrypt('123456')
        ]); 
        $user->assignRole($role3);

    }
}
