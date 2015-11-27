<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;
use App\Role;
use App\Permission;
use App\User;


class RolesAndPermissionsSeeder extends Seeder {

    public function run()
    {
        // create roles
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'performs administrative tasks',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $cashier = Role::create([
            'name' => 'cashier',
            'display_name' => 'Cashier',
            'description' => 'performs cashier tasks',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $user = Role::create([
            'name' => 'user',
            'display_name' => 'Portal User',
            'description' => 'performs all basic tasks like print receipt, etc...',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // create permissions
        $editUser = Permission::create([
            'name' => 'edit-user',
            'display_name' => 'Edit Users',
            'description' => 'manage users',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $reporting = Permission::create([
            'name' => 'reporting',
            'display_name' => 'Print Report, Print receipt',
            'description' => 'manage reports',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $editReporting = Permission::create([
            'name' => 'edit-reporting',
            'display_name' => 'Edit Report, Edit receipt',
            'description' => 'manage reports',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $receipt = Permission::create([
            'name' => 'view-receipt',
            'display_name' => 'View receipt, View Billings',
            'description' => 'View recipent and view billings',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // assign permissions to roles
        $admin->attachPermissions(array($editUser, $reporting, $receipt, $editReporting));
        $cashier->attachPermissions(array($reporting, $receipt, $editReporting));
        $user->attachPermissions(array($reporting, $receipt));

        // attach admin user to admin role
        $userAdmin = User::where('email', env('ADMIN_EMAIL'))->firstOrFail();
        $userAdmin->attachRole($admin);

        // assign default role to users
        $users = User::all();

        foreach($users as $normalUser) {
            if($normalUser->hasRole('user')) continue;

            $normalUser->attachRole($user);
        }
    }
}