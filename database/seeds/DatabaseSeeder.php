<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Open a try/catch block
        try {
            // Begin a transaction
            DB::beginTransaction();

            $this->call([
                UserSeeder::class,
                ChannelsSeeder::class,
            ]);

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
