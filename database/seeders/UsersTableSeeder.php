<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        User::insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'hotels admin',
                'username' => 'admin_hotels',
                'email' => 'admin@yahoo.com',
                'password' => '$2y$10$D3wRvyUHjMpKAuskS.T6JuuAin8u0OLYtyYHZ0XgfmROjp1Jc1zTC',
                'gender' => 1,
                'phone' => '01007046215',
                'country' => 'Egypt',
                'bio' => '<p><em>Admin</em></p><p><br></p>',
                'role_id' => 1,
                'type' => 'traveller',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'test user',
                'username' => 'user_hotels',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$1H3KzNc8U44NhiYBhvFPPeLRMc58fowrz0yC7ZH8U2uREOhep6TDi',
                'gender' => 1,
                'phone' => '01024178367',
                'country' => 'Egypt',
                'bio' => '<p><strong>User Test</strong></p>',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'user 1',
                'username' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => '$2y$10$A4rNmMq9wQaLgXQzPCROiePZgcutyipOUYsCKvoy/IC.QCgbeERcy',
                'gender' => 1,
                'phone' => '01007046258',
                'country' => 'Egypt',
                'bio' => '',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'ahmed samy',
                'username' => 'ahmed_samy15',
                'email' => 'ahmed@gmail.com',
                'password' => '$2y$10$CKUVuqfubenx1dObxwsAcuCOpqY6MYO5GJU9ob5nnZOuPi5nrvZra',
                'gender' => 1,
                'phone' => '0100405421',
                'country' => 'Egypt',
                'bio' => '',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Mohamed Wael',
                'username' => 'wael74_',
                'email' => 'wael@gmail.com',
                'password' => '$2y$10$q0LgBTsDJH3wAHUTej8fnOcvaIx4ZQrMtEUcyedvua7HmxZotGxLa',
                'gender' => 1,
                'phone' => '01147856932',
                'country' => 'Egypt',
                'bio' => '',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'Mahmoud Adel',
                'username' => 'mahmoud_adel77',
                'email' => 'mahmoud_adel@gmail.com',
                'password' => '$2y$10$e5.EWYmCFNoWE1FiE1OIY.l1kArN6r24yG/aULPuRj3i85jcaKWpm',
                'gender' => 1,
                'phone' => '01002536987',
                'country' => 'Egypt',
                'bio' => '',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'Ahmed Samy',
                'username' => 'ahmed_samy2020',
                'email' => 'ahmed_samy@gmail.com',
                'password' => '$2y$10$1iAw5o0DNDrGA2P03QEN6Obw5mDDz4r2iC8e/SgQ7zqPiEIeXDsdy',
                'gender' => 1,
                'phone' => '01007046215',
                'country' => 'Egypt',
                'bio' => '<p><strong>Ahmed Samy</strong></p>',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'Mohamed Essam',
                'username' => 'mo_essam',
                'email' => 'mo_essam@gmail.com',
                'password' => '$2y$10$D4NIyp9ppiBf0MCwlKmNp.z/zaP2Z4dwfkXtGF7kluf9K87jI34q.',
                'gender' => 1,
                'phone' => '01024178367',
                'country' => 'United Arab Emirates',
                'bio' => '<p><br></p>',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            8 => 
            array (
                'id' => 12,
                'name' => 'Test Admin Aadd',
                'username' => 'test_admin',
                'email' => 'test@gmail.com',
                'password' => '$2y$10$fcwmaJ2lNjZZykRwWhR0ru0oqikYO4Cc/ZEORt0jWvGwFzZ79TKVO',
                'gender' => 1,
                'phone' => '01123654789',
                'country' => 'Afghanistan',
                'bio' => '<p><u>Test</u></p>',
                'role_id' => 1,
                'type' => 'traveller',
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'dev',
                'username' => 'dev_test',
                'email' => 'dev@mail.com',
                'password' => '$2y$10$.fP3nN1P5OPdrDVxvlQWyekhKjsduFVg3Z7j9kJhgr94MlCF43VUe',
                'gender' => 1,
                'phone' => '123456789',
                'country' => 'Afghanistan',
                'bio' => '<p><br></p>',
                'role_id' => 1,
                'type' => 'traveller',
            ),
            10 => 
            array (
                'id' => 20,
                'name' => 'John Doe',
                'username' => 'johndoekl',
                'email' => 'johndoe@eleo0.com',
                'password' => '$2y$10$lvQAYlf9rcCFOaH.g.5Jw.XsbzQtXju7ucjIM/vaLussOa5QYmQ0K',
                'gender' => 1,
                'phone' => '123456078',
                'country' => 'Egypt',
                'bio' => 'I am a developer',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            11 => 
            array (
                'id' => 24,
                'name' => 'Amr Elabsy',
                'username' => 'amrelabsy',
                'email' => 'amr@gmail.com',
                'password' => '$2y$10$QIvb0J2XpyepUfrwOIvMQOhLII/0f4rXLOXbaMJ21s1OU4oJEKb22',
                'gender' => 1,
                'phone' => '01236454789',
                'country' => 'Egypt',
                'bio' => 'I am a developer',
                'role_id' => 2,
                'type' => 'traveller',
            ),
            12 => 
            array (
                'id' => 26,
                'name' => 'Ahmed',
                'username' => 'amrelabsy',
                'email' => 'aly@company.com',
                'password' => '$2y$10$oeR6GZZaFNidYIjtJet95uynSeFCnLwpaAP0pj3Tc2JHBoduRA1E.',
                'gender' => 1,
                'phone' => '01236454987',
                'country' => 'Egypt',
                'bio' => 'I am a developer',
                'role_id' => 2,
                'type' => 'company',
            ),
        ));
        
        
    }
}