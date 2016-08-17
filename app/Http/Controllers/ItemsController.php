<?php
namespace App\Http\Controllers;

/**
 * Class ItemsController - A class to act as a controller for items.
 */
class ItemsController extends Controller
{

    /**
     * Returns the index page for items.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('items.index');
    }

    /**
     * Returns the print page for items.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function printItems()
    {
        return view('items.print');
    }
}
