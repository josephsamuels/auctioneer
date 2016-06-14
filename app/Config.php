<?php
namespace App;

/**
 * Class Config - A class to access configuration files.
 */
abstract class Config
{

    /**
     * @var array The loaded configuration.
     */
    protected static $configuration = [];

    /**
     * Config constructor.
     */
    public function __construct()
    {
        if (!isset(static::$configuration[$this->getFileName()])) {
            $uri = resource_path() . '/configs/' . $this->getFileName() . '.json';

            static::$configuration[$this->getFileName()] = json_decode(file_get_contents($uri), true);
        }
    }

    /**
     * Returns the configuration.
     *
     * @return array
     */
    public function getConfiguration()
    {
        return static::$configuration[$this->getFileName()];
    }

    /**
     * Returns the name of the configuration file.
     *
     * @return string
     */
    public abstract function getFileName();
}
