<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Model\User::all('id') as $user) {
            DB::table('channels')->insert([
                'user_id' => $user->id,
                'channel_id' => 1,
            ]);
        }
    }
}
