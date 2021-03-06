<?php
/**
 * Yes... I totally ripped this off darryl
 * - Mike
 * Partial View Caching
 * @author  dclarke
 * @version $Id: Partial.php 195 2010-11-28 04:22:22Z dclarke $
 */
class FindieRock_Helper_Partial extends Zend_View_Helper_Partial
{
    /**
     * @var Zend_Cache_Core
     */
    protected $_cacheObj = null;

    function partial($name = null, $module = null, $model = null, $cache = true) {
	/*
        if (0 == func_num_args()) {
            return $this;
        }

        if ($cache) {
            if (($this->_cacheObj = Zend_Registry::get('cache')) != true) {
                $cache = false;
            }
        }
        // rotate for happy params.
        if ((null === $model) && (null !== $module)) {
            $model  = $module;
            $module = null;
        }

        $key = false;
        if (($model || $module) && $cache) {
            // generate cache key based on module and model?!
            $key = str_replace(array('.', '-', '/'), '_', $name).md5(serialize($module) . serialize($model));
            // look for cached copy
            if ($cache && ($partial = $this->_cacheObj->load($key)) == true) {
                // log
                return $partial;
            }
        }
	*/
        // get fresh rendered
        $partial = parent::partial($name, $module, $model);
	/*
        // save to cache
        if ($partial && $key && $cache) {
            $this->_cacheObj->save($partial, $key);
        }
	*/
        // return data
        return $partial;
    }
}
