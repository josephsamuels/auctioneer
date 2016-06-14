<?php
namespace App\Models;

use App\Configs\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User - A model of a user object.
 */
class User extends Authenticatable
{

    /**
     * @var array $fillable The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * @var array $hidden The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Returns an array of all user permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        $role = (new Role())->getRole($this->role);
        $permissions = $role['permissions'];

        while(array_key_exists('inherits', $role)) {
            $role = (new Role())->getRole($role['inherits']);
            $permissions = array_merge($permissions, $role['permissions']);
        }

        return array_unique($permissions);
    }
}
