<?php
namespace App\Configs;

use App\Config;

/**
 * Class Permission - A model of a permission object.
 */
class Permission extends Config
{

    /**
     * Returns the name of the configuration file.
     *
     * @return string
     */
    public function getFileName()
    {
        return 'permissions';
    }

    /**
     * Returns an associative array of all possible permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->getConfiguration();
    }
}
