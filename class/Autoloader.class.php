<?php
namespace PWD3;

/**
 * Class Autoloader :
 * Charge les class dynamiquement.
 */
class Autoloader
{
    /**
     * Enregistre les classes dans le __autoload
     * @return void
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__, "autoload"]);
    }

    /**
     * @param string $class
     * 
     * @return void
     */
    public static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . "\\") === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            // var_dump($class);
            require("class\\" . $class . ".class.php");
        }
    }
}
