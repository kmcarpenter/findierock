<?php
	
	class Zenwerx_Cache_KeyCleaner
	{
		public static function MakeValidKey($value)
		{
			$value = preg_replace('/[\'"]/', '', $value);
	        $value = preg_replace('/[^a-z0-9_]/i', '_', $value);
	        $value = preg_replace('/_[_]*/', '_', $value);
	        $value = preg_replace('/_$/', '', $value);
	        $value = preg_replace('/^_/', '', $value);
	        
	        return $value;
		}
	}
?>