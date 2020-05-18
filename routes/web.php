<?php

Route::get('/', 'ShoppingListController@index');
Route::get('/list', 'ShoppingListController@index');
Route::get('/shoppinglist/user', 'ShoppingListController@getShoppinglistByUser');


//Route::get('/', function () {

//$items = DB::table('items')->get();
//return $items;
//}

//);
