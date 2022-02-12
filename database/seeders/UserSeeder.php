<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $root = new Role();
        $root->name = 'root';
        $root->display_name = 'role.root.name';
        $root->description = 'role.root.description';
        $root->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'role.admin.name';
        $admin->description = 'role.admin.description';
        $admin->save();

        $moderator = new Role();
        $moderator->name = 'moderator';
        $moderator->display_name = 'role.moderator.name';
        $moderator->description = 'role.moderator.description';
        $moderator->save();

        $manager = new Role();
        $manager->name = 'manager';
        $manager->display_name = 'role.manager.name';
        $manager->description = 'role.manager.description';
        $manager->save();

        $client = new Role();
        $client->name = 'client';
        $client->display_name = 'role.client.name';
        $client->description = 'role.client.description';
        $client->save();

        // Users
        $user = new User();
        $user->name = 'The Shrike';
        $user->email = 'the.shrike@site.com';
        $user->password = bcrypt('1q2w3e4r');
        $user->role_id = $root->id;
        $user->save();

        $user = new User();
        $user->name = 'Meina Gladstone';
        $user->email = 'meina.gladstone@site.com';
        $user->password = bcrypt('1q2w3e4r');
        $user->role_id = $admin->id;
        $user->save();

        $user = new User();
        $user->name = 'Het Masteen';
        $user->email = 'het.masteen@site.com';
        $user->password = bcrypt('1q2w3e4r');
        $user->role_id = $moderator->id;
        $user->save();

        $user = new User();
        $user->name = 'Lamia Browne';
        $user->email = 'lamia.browne@site.com';
        $user->password = bcrypt('1q2w3e4r');
        $user->role_id = $manager->id;
        $user->save();

        $user = new User();
        $user->name = 'Lenar Hoyt';
        $user->email = 'lenar.hoyt@site.com';
        $user->password = bcrypt('1q2w3e4r');
        $user->role_id = $client->id;
        $user->save();

    }
}
