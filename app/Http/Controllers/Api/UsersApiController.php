<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UsersApiController - A controller to act as the API endpoint for users.
 */
class UsersApiController extends Controller
{

    /**
     * Return an array of all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUsers()
    {
        return User::all();
    }

    /**
     * Add a user to the database.
     *
     * @param Request $request The body of the request.
     *
     * @return User
     */
    public function postUser(Request $request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role' => $request['role'],
        ]);
    }

    /**
     * Update an user stored in the database.
     *
     * @param User    $user    The user to update.
     * @param Request $request The body of the request.
     *
     * @return array
     */
    public function patchUser(User $user, Request $request)
    {
        $response = $user->update(['role' => $request['role']]);

        return compact('response');
    }
}
