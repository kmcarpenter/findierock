<?php
/**
 * File: ServiceCore
 * 	The base ServiceCore class.
 *
 * Version:
 * 	2010.02.18
 *
 * Copyright:
 * 	2009-2010 Ryan Parman <http://ryanparman.com>
 *
 * License:
 * 	MIT License - http://www.opensource.org/licenses/mit-license.php
 */


/*%******************************************************************************************%*/
// EXCEPTIONS

class ServiceCore_Exception extends Exception {}


/*%******************************************************************************************%*/
// CLASS

/**
 * Class: ServiceCore
 */
class ServiceCore
{
	/**
	 * Property: subclass
	 * 	The API subclass to point the request to. (This may or may not be needed.)
	 */
	var $subclass;

	/**
	 * Property: test_mode
	 * 	Whether we're in test mode or not.
	 */
	var $test_mode;

	/**
	 * Property: const_namespace
	 * 	This is used to look up the app_info values for this app.
	 */
	var $const_namespace;


	/*%******************************************************************************************%*/
	// CONSTRUCTOR

	/**
	 * Method: __construct()
	 * 	The constructor. This should be overridden in your extending class.
	 *
	 * Access:
	 * 	public
	 */
	public function __construct()
	{
		throw new ServiceCore_Exception('You need to override the "' . __FUNCTION__ . '()" method in your extending class, to set the default properties correctly.');
	}


	/*%******************************************************************************************%*/
	// SETTERS

	/**
	 * Method: test_mode()
	 * 	Enables test mode within the API. Enabling test mode will return the request URL instead of requesting it.
	 *
	 * Access:
	 * 	public
	 *
	 * Parameters:
	 * 	enabled - _boolean_ (Optional) Whether test mode is enabled or not.
	 *
	 * Returns:
	 * 	void
	 */
	public function test_mode($enabled = true)
	{
		// Set default values
		$this->test_mode = $enabled;
	}

	/**
	 * Method: set_app_info()
	 * 	Sets the basic application constants that are used throughout the app.
	 *
	 * Access:
	 * 	public
	 *
	 * Parameters:
	 * 	options - _array_ (Required) A set of values for the app, where the key is the app's namespace and the value is an array of key-value pairs. The namespace and key make up the constant's name.
	 */
	public function set_app_info($options)
	{
		if (count($options) > 0)
		{
			foreach ($options as $namespace => $pairs)
			{
				foreach ($pairs as $key => $value)
				{
					$this->const_namespace = strtoupper($namespace);
					$const = $this->const_namespace . '_' . strtoupper($key);

					if (!defined($const))
					{
						define($const, $value);
					}
					else
					{
						throw new ServiceCore_Exception($const . ' is already defined.');
					}
				}
			}

			// Make sure these are all defined.
			if (
				!defined($this->const_namespace . '_NAME') ||
				!defined($this->const_namespace . '_VERSION') ||
				!defined($this->const_namespace . '_URL') ||
				!defined($this->const_namespace . '_DESCRIPTION')
			)
			{
				throw new ServiceCore_Exception('When using ' . __FUNCTION__ . ', you must define: name, version, url and description.');
			}

			// Define this automatically.
			define($this->const_namespace . '_USERAGENT', constant($this->const_namespace . '_NAME') . '/' . constant($this->const_namespace . '_VERSION') . ' (' . constant($this->const_namespace . '_DESCRIPTION') . '; ' . constant($this->const_namespace . '_URL') . ')');
		}
	}


	/*%******************************************************************************************%*/
	// MAGIC METHODS

	/**
	 * Handle requests to properties
	 */
	public function __get($var)
	{
		throw new ServiceCore_Exception('You need to override the "' . __FUNCTION__ . '()" method in your extending class, to set the default properties correctly.');
	}

	/**
	 * Handle requests to methods
	 */
	public function __call($name, $args)
	{
		throw new ServiceCore_Exception('You need to override the "' . __FUNCTION__ . '()" method in your extending class, to set the default properties correctly.');
	}


	/*%******************************************************************************************%*/
	// REQUEST/RESPONSE

	/**
	 * Method: request()
	 * 	Requests the data, parses it, and returns it. Requires RequestCore and SimpleXML. You can extend the class and override this method to use another HTTP class.
	 *
	 * Parameters:
	 * 	url - _string_ (Required) The web service URL to request.
	 *
	 * Returns:
	 * 	ResponseCore object
	 */
	public function request($url)
	{
		if (!$this->test_mode)
		{
			// Include the RequestCore library.
			if (!class_exists('RequestCore'))
			{
				require_once 'lib/requestcore/requestcore.class.php';
			}

			if (class_exists('RequestCore'))
			{
				$http = new RequestCore($url);
				$http->set_useragent(constant($this->const_namespace . '_USERAGENT'));
				$http->send_request();

				$response = new stdClass();
				$response->header = $http->get_response_header();
				$response->body = $this->parse_response($http->get_response_body());
				$response->status = $http->get_response_code();

				return $response;
			}

			throw new ServiceCore_Exception('This class requires RequestCore to be loaded. Ensure that you\'ve initialized the submodules.');
		}

		return $url;
	}

	/**
	 * Method: parse_response()
	 * 	Default method for parsing the response data. You can extend the class and override this method for other response types.
	 *
	 * Parameters:
	 * 	data - _string_ (Required) The data to parse.
	 *
	 * Returns:
	 * 	mixed data
	 */
	public function parse_response($data)
	{
		if (stripos($data, '<?xml') !== false)
		{
			return new SimpleXMLElement($data, LIBXML_NOCDATA);
		}

		return $data;
	}
}
