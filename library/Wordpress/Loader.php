<?php
require_once('Zend/Loader.php');

/**
 * The WordPress loader class is a quick filter that ensures only specific application
 * libraries are passed through to load handling.
 */
class WordPress_Loader extends Zend_Loader
{
    /**
     * Override of the loadClass method.
     *
     * @param string $class
     * @param string|array $dirs
     */
    public static function loadClass($class, $dirs = null)
    {
        $parts = split("_", $class );

        switch ( $parts[0] )
        {
        	case 'Amazon':
            case 'FindieRock':
            case 'LastFM':
            case 'MusicBrainz':
            case 'Propel':
            case 'Wordpress':
            case 'Zend':
            case 'Zenwerx':
                parent::loadClass($class, $dirs);
        }
    }

    /**
     * This handler has to be here for Zend_Loader invocation purposes
     *
     * @param class $class
     * @return string|boolean
     */
    public static function autoload($class)
    {
        try {
            self::loadClass($class);
            return $class;
        } catch (Exception $e) {
            return false;
        }
    }
}
?>
