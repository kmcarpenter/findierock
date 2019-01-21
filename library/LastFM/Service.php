<?php
class LastFM_Service
{
	const API_KEY    = "f4283c482a6cf31643cc96556d9e1cb2";
	const API_STRING = "http://ws.audioscrobbler.com/2.0/?method=%s&api_key=%s&format=json%s";
	const BATCH_SIZE = 30;
	const MATCH_LIMIT = 100;

	public function __construct($apiKey = self::API_KEY, $endpoint = self::API_STRING)
	{
	}

	private function callMethod($method)
	{
	    	$ch = curl_init();
       		$timeout = 3; // set to zero for no timeout
	       	curl_setopt($ch, CURLOPT_URL, $method);
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        	$data = curl_exec($ch);
	        curl_close($ch);
			unset($ch);
			
    		return $data;
	}

	private function callMethodMulti($methods)
	{
		if (!is_array($methods))
		{
			$methods = array( $methods );
		}

		$mh = curl_multi_init();
		$handles = array();
		foreach($methods as $method)
		{
    		$ch = curl_init();
	        $timeout = 3; // set to zero for no timeout
       		curl_setopt($ch, CURLOPT_URL, $method);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

			curl_multi_add_handle($mh, $ch);
			$handles[] = $ch;
		}

		$running = null;
		do
		{
			curl_multi_exec($mh, $running);
		} while ($running > 0);

		$data = array();
		foreach($handles as $handle)
		{
			$data[]  = curl_multi_getcontent($handle);
			curl_multi_remove_handle($mh, $handle);
			unset($handle);
		}

		curl_multi_close($mh);
		unset($mh);
		
    	return $data;
	}

	private function buildApiCall($method, $args = array())
	{
		$argString = "";
		foreach($args as $name => $val)
		{
			$val = urlencode($val);
			$argString .= "&$name=$val";
		}
		return sprintf(self::API_STRING, $method, self::API_KEY, $argString);
	}
	
	private function doApiCall($method, $params)
	{
		$call = $this->buildApiCall($method, $params);

		$response = $this->callMethod($call);
		
		$data = json_decode($response);
		unset($response);
		
		return $data;
	}

	private function doMultiApiCall($method, $params)
	{
		$calls = array();

		foreach($params as $param)
		{
			$calls[] = $this->buildApiCall($method, $param);
		}

		$responses = array();
		while (count($calls) > 0)
		{
			$realCalls = array();
			for ($i=0;$i<self::BATCH_SIZE;$i++)
			{
				$call = array_pop($calls);
				if (!$call)
					break;

				$realCalls[] = $call;
			}
			$interimResponses = $this->callMethodMulti($realCalls);
			$responses = array_merge($responses, $interimResponses);
			sleep(1);
		}

		$data = array();
		foreach($responses as $response)
		{
			$data[] = json_decode($response);
			unset($response);
		}
		unset($responses);
		
		return $data;
	}

	public function getMetros($country)
	{
		return $this->doApiCall("geo.getmetros", array("country" => $country));
	}

	public function getEvents($city, $radius, $page, $limit = self::MATCH_LIMIT)
	{
		return $this->doApiCall("geo.getevents", array("location" => $city, "distance" => $radius, "page" => $page, "limit" => $limit) );
	}

	public function getMultiEvents($city, $radius, $pages, $limit = self::MATCH_LIMIT)
	{
		$params = array();
		for ($i = 1; $i<=$pages;$i++)
		{
			$params[] = array("location" => $city, "distance" => $radius, "page" => $i, "limit" => $limit);
		}
		return $this->doMultiApiCall("geo.getevents", $params );
	}
	
	public function getEventInfo($eventId)
	{
		return $this->doApiCall("event.getInfo", array("event" => $eventId));
	}

	public function searchArtists($artist, $limit = self::MATCH_LIMIT)
	{
		return $this->doApiCall("artist.search", array("artist" => $artist, "limit" => $limit));
	}

	public function getArtistInfoById($artistId)
	{
		return $this->doApiCall("artist.getInfo", array("mbid" => $artistId));
	}
	
	public function getArtistInfoByName($artistName)
	{
		return $this->doApiCall("artist.getInfo", array("artist" => $artistName));
	}
	
	public function getAlbums($artistId)
	{
		return $this->doApiCall("artist.getTopAlbums", array("artist" => $artistId));
	}
	
	public function getAlbumInfo($albumId)
	{
		return $this->doApiCall("album.getInfo", array("mbid" => $albumId));
	}
	
	public function getVenueEvents($venueId, $limit = self::MATCH_LIMIT)
	{
		return $this->doApiCall("venue.getEvents", array("venue" => $venueId, "limit" => $limit));
	}
	
	public function getVenuePastEvents($venueId, $limit = self::MATCH_LIMIT)
	{
		return $this->doApiCall("venue.getPastEvents", array("venue" => $venueId, "limit" => $limit));
	}
}

?>
