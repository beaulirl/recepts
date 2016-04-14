<?php
/**
* class for settings configuration
*/
class ConfigurationManager
{
    const SETTINGS_FILE='config.php';
    /**
    * 
    * @param string $key 
    * @return string
    */
    public static function get($key)
    {
        $config = require(static::SETTINGS_FILE);
        return $config[$key];
    }
}