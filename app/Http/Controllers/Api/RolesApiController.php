<?php
namespace App\Http\Controllers\Api;

use App\Configs\Role;
use App\Http\Controllers\Controller;

/**
 * Class RolesApiController - A controller to act as the API endpoint for roles.
 */
class RolesApiController extends Controller
{

    /**
     * Return an array of all roles.
     *
     * @return array
     */
    public function getRoles()
    {
        return (new Role())->getRoles();
    }
}
