<?php
namespace App\Configs;

use App\Config;

/**
 * Class Role - A model of a role object.
 */
class Role extends Config
{

    /**
     * Returns the name of the configuration file.
     *
     * @return string
     */
    public function getFileName()
    {
        return 'roles';
    }

    /**
     * Returns a role for the provided role key.
     *
     * @param string $role The key of the role to return.
     *
     * @return array
     */
    public function getRole($role)
    {
        $roles = $this->getRoles();

        return $roles[$role];
    }

    /**
     * Returns an associative array of all possible roles.
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->getConfiguration();
    }

    /**
     * Returns an associative array of all possible roles with permission details.
     *
     * @return array
     */
    public function getHydratedRoles()
    {
        $roles = $this->getRoles();
        $permissions = (new Permission())->getPermissions();

        foreach ($roles as &$role) {
            foreach ($role['permissions'] as &$permission) {
                $permission = $permissions[$permission];
            }
        }

        return $roles;
    }
}
