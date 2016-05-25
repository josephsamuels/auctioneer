<?php
namespace App\Http\Controllers;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('item.index');
    }
}
