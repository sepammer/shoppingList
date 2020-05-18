<?php

use App\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('lists', 'ShoppingListController@index');
Route::get('items', 'ShoppingListController@getItems');
Route::get('items/{list_id}', 'ShoppingListController@getItemsByList');
Route::get('/item/{item}', 'ShoppingListController@findItemById');
Route::get('/lists/{list}', 'ShoppingListController@findListById');
Route::get('/lists/checkid/{list}', 'ShoppingListController@checkListId');


// Authentication
Route::group(['middleware' => ['api', 'cors']], function () {
    Route::post('auth/login', 'Auth\ApiAuthController@login');
    Route::post('lists', 'ShoppingListController@saveList');
    Route::post('item', 'ShoppingListController@saveItem');

    Route::delete('/item/{id}', 'ShoppingListController@deleteItem');
    Route::delete('/list/{id}', 'ShoppingListController@deleteList');
});
