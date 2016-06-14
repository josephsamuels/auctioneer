<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ItemsApiController - A controller to act as the API endpoint for items.
 */
class ItemsApiController extends Controller
{

    /**
     * Return an array of all items.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getItems()
    {
        return Item::all();
    }

    /**
     * Add an item to the database.
     *
     * @param Request $request The body of the request.
     *
     * @return Item
     */
    function postItem(Request $request)
    {
        $request['user_id'] = Auth::user()->id;

        return Item::create($request->all());
    }

    /**
     * Update an item stored in the database.
     *
     * @param Item    $item    The item to update.
     * @param Request $request The body of the request.
     *
     * @return array
     */
    function patchItem(Item $item, Request $request)
    {
        $response = $item->update($request->all());

        return compact('response');
    }

    /**
     * Remove an item stored in the database.
     *
     * @param Item $item The item to remove.
     *
     * @return array
     */
    function removeItem(Item $item)
    {
        $response = $item->delete();

        return compact('response');
    }
}
