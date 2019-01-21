<?php



/**
 * Skeleton subclass for representing a row from the 'artist' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.findierock
 */
class Artist extends BaseArtist {
	public function getLinkifiedBiography()
	{
		$bio = $this->getBiography();
		$pattern = "@\b(https?://)?(([0-9a-zA-Z_!~*'().&=+$%-]+:)?[0-9a-zA-Z_!~*'().&=+$%-]+\@)?(([0-9]{1,3}\.){3}[0-9]{1,3}|([0-9a-zA-Z_!~*'()-]+\.)*([0-9a-zA-Z][0-9a-zA-Z-]{0,61})?[0-9a-zA-Z]\.[a-zA-Z]{2,6})(:[0-9]{1,4})?((/[0-9a-zA-Z_!~*'().;?:\@&=+$,%#-]+)*/?)@";
		$http = "/href=\"((?!http).*)\"/i";

		$bio = preg_replace($pattern, '<a href="\0">\0</a>', $bio);
		$bio = preg_replace($http, "href=\"http://\\1\"", $bio);

		return $bio;
	}
} // Artist
