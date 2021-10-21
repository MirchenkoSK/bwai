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
        $root->display_name = 'Superuser';
        $root->description = 'Hat Zugang zu Ereignissen und Debug-Seiten';
        $root->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin';
        $admin->description = 'Hat Zugang zu allen Verwaltungsseiten';
        $admin->save();

        $moderator = new Role();
        $moderator->name = 'moderator';
        $moderator->display_name = 'Moderator';
        $moderator->description = 'Hat Zugang zu einigen Bereichen des Admin-Bereichs';
        $moderator->save();

        $manager = new Role();
        $manager->name = 'manager';
        $manager->display_name = 'Manager';
        $manager->description = 'Hat Zugang zum Managerbereich';
        $manager->save();

        $client = new Role();
        $client->name = 'client';
        $client->display_name = 'Kunde';
        $client->description = 'Hat Zugang zum Bereich "Kunde"';
        $client->save();

        // Users
        $user = new User();
        $user->name = 'The Shrike';
        $user->email = 'the.shrike@wolframium.net';
        $user->password = bcrypt('123456');
        $user->role_id = $root->id;
        $user->save();

        $user = new User();
        $user->name = 'Meina Gladstone';
        $user->email = 'meina.gladstone@wolframium.net';
        $user->password = bcrypt('123456');
        $user->role_id = $admin->id;
        $user->save();

        $user = new User();
        $user->name = 'Het Masteen';
        $user->email = 'het.masteen@wolframium.net';
        $user->password = bcrypt('123456');
        $user->role_id = $moderator->id;
        $user->save();

        $user = new User();
        $user->name = 'Lamia Browne';
        $user->email = 'lamia.browne@wolframium.net';
        $user->password = bcrypt('123456');
        $user->role_id = $manager->id;
        $user->save();

        $user = new User();
        $user->name = 'Lenar Hoyt';
        $user->email = 'lenar.hoyt@wolframium.net';
        $user->password = bcrypt('123456');
        $user->role_id = $client->id;
        $user->save();

        // PROTECTED USER
        $user = new User();
        $user->name = 'MirchenkoSK';
        $user->email = 'mirchenkosk@gmail.com';
        $user->password = bcrypt('alvenmark0');
        $user->role_id = $admin->id;
        $user->save();
    }
}
