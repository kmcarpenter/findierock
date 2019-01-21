<?php


/**
 * Base class that represents a query for the 'artist' table.
 *
 * 
 *
 * @method     ArtistQuery orderByArtistid($order = Criteria::ASC) Order by the ArtistId column
 * @method     ArtistQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     ArtistQuery orderByCity($order = Criteria::ASC) Order by the City column
 * @method     ArtistQuery orderByProvince($order = Criteria::ASC) Order by the Province column
 * @method     ArtistQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     ArtistQuery orderByIntro($order = Criteria::ASC) Order by the Intro column
 * @method     ArtistQuery orderByBiography($order = Criteria::ASC) Order by the Biography column
 * @method     ArtistQuery orderByWebsite($order = Criteria::ASC) Order by the Website column
 * @method     ArtistQuery orderByTwitter($order = Criteria::ASC) Order by the Twitter column
 * @method     ArtistQuery orderByFacebook($order = Criteria::ASC) Order by the Facebook column
 * @method     ArtistQuery orderByRss($order = Criteria::ASC) Order by the RSS column
 * @method     ArtistQuery orderByBrokenup($order = Criteria::ASC) Order by the BrokenUp column
 * @method     ArtistQuery orderByLastfmid($order = Criteria::ASC) Order by the lastFmId column
 * @method     ArtistQuery orderByArtistcol($order = Criteria::ASC) Order by the artistcol column
 * @method     ArtistQuery orderBySlug($order = Criteria::ASC) Order by the Slug column
 * @method     ArtistQuery orderByHasphotos($order = Criteria::ASC) Order by the HasPhotos column
 * @method     ArtistQuery orderBySubmittedbyuser($order = Criteria::ASC) Order by the SubmittedByUser column
 *
 * @method     ArtistQuery groupByArtistid() Group by the ArtistId column
 * @method     ArtistQuery groupByName() Group by the Name column
 * @method     ArtistQuery groupByCity() Group by the City column
 * @method     ArtistQuery groupByProvince() Group by the Province column
 * @method     ArtistQuery groupByCountry() Group by the Country column
 * @method     ArtistQuery groupByIntro() Group by the Intro column
 * @method     ArtistQuery groupByBiography() Group by the Biography column
 * @method     ArtistQuery groupByWebsite() Group by the Website column
 * @method     ArtistQuery groupByTwitter() Group by the Twitter column
 * @method     ArtistQuery groupByFacebook() Group by the Facebook column
 * @method     ArtistQuery groupByRss() Group by the RSS column
 * @method     ArtistQuery groupByBrokenup() Group by the BrokenUp column
 * @method     ArtistQuery groupByLastfmid() Group by the lastFmId column
 * @method     ArtistQuery groupByArtistcol() Group by the artistcol column
 * @method     ArtistQuery groupBySlug() Group by the Slug column
 * @method     ArtistQuery groupByHasphotos() Group by the HasPhotos column
 * @method     ArtistQuery groupBySubmittedbyuser() Group by the SubmittedByUser column
 *
 * @method     ArtistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ArtistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ArtistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ArtistQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ArtistQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ArtistQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ArtistQuery leftJoinAlbum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Album relation
 * @method     ArtistQuery rightJoinAlbum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Album relation
 * @method     ArtistQuery innerJoinAlbum($relationAlias = null) Adds a INNER JOIN clause to the query using the Album relation
 *
 * @method     ArtistQuery leftJoinArtistrating($relationAlias = null) Adds a LEFT JOIN clause to the query using the Artistrating relation
 * @method     ArtistQuery rightJoinArtistrating($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Artistrating relation
 * @method     ArtistQuery innerJoinArtistrating($relationAlias = null) Adds a INNER JOIN clause to the query using the Artistrating relation
 *
 * @method     ArtistQuery leftJoinEventartist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Eventartist relation
 * @method     ArtistQuery rightJoinEventartist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Eventartist relation
 * @method     ArtistQuery innerJoinEventartist($relationAlias = null) Adds a INNER JOIN clause to the query using the Eventartist relation
 *
 * @method     Artist findOne(PropelPDO $con = null) Return the first Artist matching the query
 * @method     Artist findOneOrCreate(PropelPDO $con = null) Return the first Artist matching the query, or a new Artist object populated from the query conditions when no match is found
 *
 * @method     Artist findOneByArtistid(int $ArtistId) Return the first Artist filtered by the ArtistId column
 * @method     Artist findOneByName(string $Name) Return the first Artist filtered by the Name column
 * @method     Artist findOneByCity(string $City) Return the first Artist filtered by the City column
 * @method     Artist findOneByProvince(string $Province) Return the first Artist filtered by the Province column
 * @method     Artist findOneByCountry(string $Country) Return the first Artist filtered by the Country column
 * @method     Artist findOneByIntro(string $Intro) Return the first Artist filtered by the Intro column
 * @method     Artist findOneByBiography(string $Biography) Return the first Artist filtered by the Biography column
 * @method     Artist findOneByWebsite(string $Website) Return the first Artist filtered by the Website column
 * @method     Artist findOneByTwitter(string $Twitter) Return the first Artist filtered by the Twitter column
 * @method     Artist findOneByFacebook(string $Facebook) Return the first Artist filtered by the Facebook column
 * @method     Artist findOneByRss(string $RSS) Return the first Artist filtered by the RSS column
 * @method     Artist findOneByBrokenup(int $BrokenUp) Return the first Artist filtered by the BrokenUp column
 * @method     Artist findOneByLastfmid(string $lastFmId) Return the first Artist filtered by the lastFmId column
 * @method     Artist findOneByArtistcol(string $artistcol) Return the first Artist filtered by the artistcol column
 * @method     Artist findOneBySlug(string $Slug) Return the first Artist filtered by the Slug column
 * @method     Artist findOneByHasphotos(int $HasPhotos) Return the first Artist filtered by the HasPhotos column
 * @method     Artist findOneBySubmittedbyuser(int $SubmittedByUser) Return the first Artist filtered by the SubmittedByUser column
 *
 * @method     array findByArtistid(int $ArtistId) Return Artist objects filtered by the ArtistId column
 * @method     array findByName(string $Name) Return Artist objects filtered by the Name column
 * @method     array findByCity(string $City) Return Artist objects filtered by the City column
 * @method     array findByProvince(string $Province) Return Artist objects filtered by the Province column
 * @method     array findByCountry(string $Country) Return Artist objects filtered by the Country column
 * @method     array findByIntro(string $Intro) Return Artist objects filtered by the Intro column
 * @method     array findByBiography(string $Biography) Return Artist objects filtered by the Biography column
 * @method     array findByWebsite(string $Website) Return Artist objects filtered by the Website column
 * @method     array findByTwitter(string $Twitter) Return Artist objects filtered by the Twitter column
 * @method     array findByFacebook(string $Facebook) Return Artist objects filtered by the Facebook column
 * @method     array findByRss(string $RSS) Return Artist objects filtered by the RSS column
 * @method     array findByBrokenup(int $BrokenUp) Return Artist objects filtered by the BrokenUp column
 * @method     array findByLastfmid(string $lastFmId) Return Artist objects filtered by the lastFmId column
 * @method     array findByArtistcol(string $artistcol) Return Artist objects filtered by the artistcol column
 * @method     array findBySlug(string $Slug) Return Artist objects filtered by the Slug column
 * @method     array findByHasphotos(int $HasPhotos) Return Artist objects filtered by the HasPhotos column
 * @method     array findBySubmittedbyuser(int $SubmittedByUser) Return Artist objects filtered by the SubmittedByUser column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseArtistQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseArtistQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Artist', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ArtistQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ArtistQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ArtistQuery) {
			return $criteria;
		}
		$query = new ArtistQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Artist|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ArtistPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ArtistPeer::ARTISTID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ArtistPeer::ARTISTID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the ArtistId column
	 * 
	 * @param     int|array $artistid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByArtistid($artistid = null, $comparison = null)
	{
		if (is_array($artistid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ArtistPeer::ARTISTID, $artistid, $comparison);
	}

	/**
	 * Filter the query on the Name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the City column
	 * 
	 * @param     string $city The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByCity($city = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($city)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $city)) {
				$city = str_replace('*', '%', $city);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::CITY, $city, $comparison);
	}

	/**
	 * Filter the query on the Province column
	 * 
	 * @param     string $province The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByProvince($province = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($province)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $province)) {
				$province = str_replace('*', '%', $province);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::PROVINCE, $province, $comparison);
	}

	/**
	 * Filter the query on the Country column
	 * 
	 * @param     string $country The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByCountry($country = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($country)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $country)) {
				$country = str_replace('*', '%', $country);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::COUNTRY, $country, $comparison);
	}

	/**
	 * Filter the query on the Intro column
	 * 
	 * @param     string $intro The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByIntro($intro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($intro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $intro)) {
				$intro = str_replace('*', '%', $intro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::INTRO, $intro, $comparison);
	}

	/**
	 * Filter the query on the Biography column
	 * 
	 * @param     string $biography The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByBiography($biography = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($biography)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $biography)) {
				$biography = str_replace('*', '%', $biography);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::BIOGRAPHY, $biography, $comparison);
	}

	/**
	 * Filter the query on the Website column
	 * 
	 * @param     string $website The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByWebsite($website = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($website)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $website)) {
				$website = str_replace('*', '%', $website);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::WEBSITE, $website, $comparison);
	}

	/**
	 * Filter the query on the Twitter column
	 * 
	 * @param     string $twitter The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByTwitter($twitter = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($twitter)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $twitter)) {
				$twitter = str_replace('*', '%', $twitter);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::TWITTER, $twitter, $comparison);
	}

	/**
	 * Filter the query on the Facebook column
	 * 
	 * @param     string $facebook The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByFacebook($facebook = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($facebook)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $facebook)) {
				$facebook = str_replace('*', '%', $facebook);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::FACEBOOK, $facebook, $comparison);
	}

	/**
	 * Filter the query on the RSS column
	 * 
	 * @param     string $rss The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByRss($rss = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($rss)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $rss)) {
				$rss = str_replace('*', '%', $rss);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::RSS, $rss, $comparison);
	}

	/**
	 * Filter the query on the BrokenUp column
	 * 
	 * @param     int|array $brokenup The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByBrokenup($brokenup = null, $comparison = null)
	{
		if (is_array($brokenup)) {
			$useMinMax = false;
			if (isset($brokenup['min'])) {
				$this->addUsingAlias(ArtistPeer::BROKENUP, $brokenup['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($brokenup['max'])) {
				$this->addUsingAlias(ArtistPeer::BROKENUP, $brokenup['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ArtistPeer::BROKENUP, $brokenup, $comparison);
	}

	/**
	 * Filter the query on the lastFmId column
	 * 
	 * @param     string $lastfmid The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByLastfmid($lastfmid = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastfmid)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastfmid)) {
				$lastfmid = str_replace('*', '%', $lastfmid);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::LASTFMID, $lastfmid, $comparison);
	}

	/**
	 * Filter the query on the artistcol column
	 * 
	 * @param     string $artistcol The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByArtistcol($artistcol = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($artistcol)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $artistcol)) {
				$artistcol = str_replace('*', '%', $artistcol);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::ARTISTCOL, $artistcol, $comparison);
	}

	/**
	 * Filter the query on the Slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($slug)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $slug)) {
				$slug = str_replace('*', '%', $slug);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistPeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query on the HasPhotos column
	 * 
	 * @param     int|array $hasphotos The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByHasphotos($hasphotos = null, $comparison = null)
	{
		if (is_array($hasphotos)) {
			$useMinMax = false;
			if (isset($hasphotos['min'])) {
				$this->addUsingAlias(ArtistPeer::HASPHOTOS, $hasphotos['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($hasphotos['max'])) {
				$this->addUsingAlias(ArtistPeer::HASPHOTOS, $hasphotos['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ArtistPeer::HASPHOTOS, $hasphotos, $comparison);
	}

	/**
	 * Filter the query on the SubmittedByUser column
	 * 
	 * @param     int|array $submittedbyuser The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterBySubmittedbyuser($submittedbyuser = null, $comparison = null)
	{
		if (is_array($submittedbyuser)) {
			$useMinMax = false;
			if (isset($submittedbyuser['min'])) {
				$this->addUsingAlias(ArtistPeer::SUBMITTEDBYUSER, $submittedbyuser['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($submittedbyuser['max'])) {
				$this->addUsingAlias(ArtistPeer::SUBMITTEDBYUSER, $submittedbyuser['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ArtistPeer::SUBMITTEDBYUSER, $submittedbyuser, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ArtistPeer::SUBMITTEDBYUSER, $user->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'User');
		}
		
		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Filter the query by a related Album object
	 *
	 * @param     Album $album  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByAlbum($album, $comparison = null)
	{
		return $this
			->addUsingAlias(ArtistPeer::ARTISTID, $album->getArtistid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Album relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function joinAlbum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Album');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Album');
		}
		
		return $this;
	}

	/**
	 * Use the Album relation Album object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery A secondary query class using the current class as primary query
	 */
	public function useAlbumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlbum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Album', 'AlbumQuery');
	}

	/**
	 * Filter the query by a related Artistrating object
	 *
	 * @param     Artistrating $artistrating  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByArtistrating($artistrating, $comparison = null)
	{
		return $this
			->addUsingAlias(ArtistPeer::ARTISTID, $artistrating->getArtistid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Artistrating relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function joinArtistrating($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Artistrating');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Artistrating');
		}
		
		return $this;
	}

	/**
	 * Use the Artistrating relation Artistrating object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ArtistratingQuery A secondary query class using the current class as primary query
	 */
	public function useArtistratingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinArtistrating($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Artistrating', 'ArtistratingQuery');
	}

	/**
	 * Filter the query by a related Eventartist object
	 *
	 * @param     Eventartist $eventartist  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function filterByEventartist($eventartist, $comparison = null)
	{
		return $this
			->addUsingAlias(ArtistPeer::ARTISTID, $eventartist->getArtistid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Eventartist relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function joinEventartist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Eventartist');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Eventartist');
		}
		
		return $this;
	}

	/**
	 * Use the Eventartist relation Eventartist object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventartistQuery A secondary query class using the current class as primary query
	 */
	public function useEventartistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEventartist($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Eventartist', 'EventartistQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Artist $artist Object to remove from the list of results
	 *
	 * @return    ArtistQuery The current query, for fluid interface
	 */
	public function prune($artist = null)
	{
		if ($artist) {
			$this->addUsingAlias(ArtistPeer::ARTISTID, $artist->getArtistid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseArtistQuery
