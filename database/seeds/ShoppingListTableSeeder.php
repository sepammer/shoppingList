<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ShoppingListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            DB::table('shopping_lists')->insert([
                'id' => '1',
                'title' => 'Fußballsachen',
                'dueDate' => new DateTime(),
                'user_id' => 1,
                'feedback' => 'Ist nicht so dringend',
            ]);

        DB::table('shopping_lists')->insert([
            'id' => '2',
            'title' => 'Einkaufen',
            'dueDate' => '22.09.2020',
            'user_id' => 1,
            'feedback' => 'Bitte sofort erledigen, habe schon Hunger!',
        ]);

        DB::table('shopping_lists')->insert([
            'id' => '3',
            'title' => 'Baumarkt',
            'dueDate' => '11.11.2021',
            'user_id' => 1,
            'feedback' => 'Gibt es dort auch Bier?',
        ]);

    }
}
