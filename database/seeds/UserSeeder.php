<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emails = ['hoangvan149dhv', 'hoangvandhv149'];
        foreach ($emails as $key => $email) {
            DB::table('users')->insert([
                'name' => $email,
                'email' => $email.'@gmail.com',
                'password' => Hash::make('123456'),
            ]);
        }
    }
}
