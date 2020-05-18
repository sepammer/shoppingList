<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'firstName' => 'Carl',
            'lastName' => 'Carlson',
            'email' => 'carl@carlson.at',
            'password' => bcrypt('carlson'),
            'additionalData' => 'sehr Freundlich',
            'type' => true,
        ]);

       DB::table('users')->insert([
                    'id' => '2',
                   'firstName' => 'Lenny',
                   'lastName' => 'Leonard',
                   'email' => 'lenny@leonard.at',
                   'password' => bcrypt('leonard'),
                    'additionalData' => 'nicht so Freundlich',
                   'type' => false,
               ]);

    }


}
