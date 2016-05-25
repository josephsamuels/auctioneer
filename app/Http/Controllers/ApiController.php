<?php
namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getItems()
    {
        return Item::all();
    }

    function postItem(Request $request)
    {
        $request['user_id'] = Auth::user()->id;

        return Item::create($request->all());
    }

    function patchItem($id, Request $request)
    {
        $response = Item::find($id)->update($request->all());

        return compact('response');
    }

    function removeItem($id)
    {
        $response = Item::find($id)->delete();

        return compact('response');
    }
}
