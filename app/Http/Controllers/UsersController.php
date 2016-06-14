<?php
namespace App\Http\Controllers;

/**
 * Class UsersController - A class to act as a controller for users.
 */
class UsersController extends Controller
{

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Returns the index page for users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('users.index');
    }
}
