<?php

use Illuminate\Database\Seeder;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




            $sList = DB::table('shopping_lists')->first();

            DB::table('feedback')->insert([
                'text' => 'Bitte schnell abholen',
                'list_id' => $sList->id,
                'user_id' => 1,
            ]);

    }
}
