# ServiceCore

**Foundation code for building PHP interfaces for RESTful web services.**

Provides core HTTP and caching classes, and a base class that is designed to be extended and overridden as needed.

## Under the hood

ServiceCore leverages [RequestCore](http://github.com/cloudfusion/requestcore) and [CacheCore](http://github.com/cloudfusion/cachecore), which were extracted from the [CloudFusion](http://github.com/cloudfusion/cloudfusion) toolkit.

It was born out of several years of experience with writing PHP interfaces for web service APIs, including [SimplePie](http://simplepie.org) and [CloudFusion](http://getcloudfusion.com).

## Requirements

* PHP 5.2
* cURL
* SimpleXML

### Includes
* [RequestCore](http://github.com/cloudfusion/requestcore)
* [CacheCore](http://github.com/cloudfusion/cachecore) (This isn't actually used anywhere yet.)

## Setup

	git clone git://github.com/skyzyx/servicecore.git
	cd servicecore
	git submodule update --init --recursive

The `--recursive` option was added in a 1.6.x version of Git, so make sure you're running the latest version.

## License & Copyright

This code is Copyright (c) 2009-2010, Ryan Parman. However, I'm licensing this code for others to use under the [MIT license](http://www.opensource.org/licenses/mit-license.php).
