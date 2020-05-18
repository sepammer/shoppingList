<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

             DB::table('items')->insert([
                'title' => 'Schienbeinschoner',
                'maxPrice' => '25',
                'price' => '15',
                'list_id' => '1',
                'done' => false,
                 'quantity' => '1'
             ]);

        DB::table('items')->insert([
            'title' => 'Adidas Nemeziz',
            'maxPrice' => '200',
            'price' => '150',
            'list_id' => '1',
            'done' => false,
                  'quantity' => '2'
        ]);

        DB::table('items')->insert([
            'title' => 'Trikot',
            'maxPrice' => '50',
            'price' => '45',
            'list_id' => '1',
            'done' => false,
            'quantity' => '9'
        ]);

        DB::table('items')->insert([
            'title' => 'Eier',
            'maxPrice' => '2.5',
            'price' => '1.5',
            'list_id' => '2',
            'done' => false,
            'quantity' => '7'
        ]);

        DB::table('items')->insert([
            'title' => 'Schnitzel',
            'maxPrice' => '20',
            'price' => '15',
            'list_id' => '2',
            'done' => false,
            'quantity' => '11'
        ]);

        DB::table('items')->insert([
            'title' => 'Bier',
            'maxPrice' => '50',
            'price' => '45',
            'list_id' => '2',
            'done' => false,
            'quantity' => '2'
        ]);

        DB::table('items')->insert([
            'title' => 'Blumenerde',
            'maxPrice' => '25',
            'price' => '15',
            'list_id' => '3',
            'done' => false,
            'quantity' => '1'
        ]);

        DB::table('items')->insert([
            'title' => 'Hochbeet',
            'maxPrice' => '200',
            'price' => '150',
            'list_id' => '3',
            'done' => false,
            'quantity' => '3'
        ]);

        DB::table('items')->insert([
            'title' => 'Spaten',
            'maxPrice' => '50',
            'price' => '45',
            'list_id' => '3',
            'done' => false,
            'quantity' => '6'
        ]);

    }
}
