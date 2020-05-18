<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Item;
use App\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use PhpParser\Error;
use JWTAuth;

class ShoppingListController extends Controller
{

    public function index(){
        $lists = DB::table('shopping_lists')->get();
       return $lists;

     // $items = ShoppingList::all();
     // return $items;
          //view('lists.index', compact('lists'));
    }


//find Item by id
public function findItemByID($id) : Item
{
    $item = Item::where('id', $id)->get()->first();
    return $item;
}

public function getItems(){
    $items = DB::table('items')->get();
    return $items;
}

public function getItemsByList($list_id)
{
    {

        try {
            $item_list = DB::find($list_id);
            if ($item_list) {

                $item_list->title;
                $item_list->quantity;
                $item_list->price;
                $item_list->maxPrice;
                $item_list->done;

                return response()->json([
                    'items' => $item_list
                ], 200);
            } else {
                return response()->json([], 404);
            }

        } catch (Error $e) {
            return response()->json([
                'response' => 'error',
                'message' => $e->getMessage()
            ]);
        }

    }
}

   //find list by id
    public function findListById($id)
    {
        $shoppinglist = Shoppinglist::where('id', $id)->get()->first();
        return $shoppinglist;

    }

    public function checkListId($id){
        $shoppinglist = Shoppinglist::where('id', $id)->get()->first();
        return $shoppinglist != null ? response()->json('List with ID:  ' . $id . ' exists.', 200) :
            response()->json('List with ID: ' . $id . ' does not exists.', 404);

    }

    public function getShoppinglistByUser(Request $req)
    {
        try {

            $shoppinglists = Shoppinglist::where('user_id', $this->getUID($req))->get();

            foreach ($shoppinglists as $list){
                $list->item;
                $list->comment;
            }

            return response()->json([
                'shopping_lists' => $shoppinglists
            ], 200);

        } catch (Error $e) {
            return response()->json([
                'response' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }





    public function updateList($id)
    {

    }

    public function saveList(Request $request) {
        $request = $this->parseReq($request);
        DB::beginTransaction();

        try {
            $shoppinglist = Shoppinglist::create([

                'user_id' => $request->user_id,
                'title' => $request->title,
                'dueDate' => $request->dueDate,
                'feedback' => $request->feedback,

            ]);
            DB::commit();
        }

        catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'response' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function saveItem(Request $request) {
        $request = $this->parseReq($request);
        DB::beginTransaction();

        try {
         $item = Item::create([

                'list_id' => $request->list_id,
                'title' => $request->title,
                'maxPrice' => $request->maxPrice,
                 'price' => $request->price

            ]);
            DB::commit();
        }


        catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'response' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function deleteList($id):JsonResponse{
        $list = ShoppingList::where('id', $id)->first();

        if ($list != null){
            $list->delete();
        }
        else {
            throw new \Exception("List couldn't be deleted - it does not exist");

        }
        return response()->json('List successfully deleted.', 200);
    }

    public function deleteItem( $id) : JsonResponse{

    $item = Item::where('id', $id)->first();
    $title = $item->title;
    if ($item != null){
        $item->delete();
    }
    else {
        throw new \Exception("Item couldn't be deleted - it does not exist");

    }
    return response()->json('Item (' .$title.') successfully deleted.', 200);
    }

    private function parseReq(Request $req) : Request{
        $date = new \DateTime($req->dueDate);
        $req['dueDate'] = $date;

        return $req;
    }

    private function getUID($req) : int{

        $token = $req->bearerToken();
        return JWTAuth::getPayload($token)['user']->id;

    }


}