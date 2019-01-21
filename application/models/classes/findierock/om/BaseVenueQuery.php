<?php


/**
 * Base class that represents a query for the 'venue' table.
 *
 * 
 *
 * @method     VenueQuery orderByVenueid($order = Criteria::ASC) Order by the VenueId column
 * @method     VenueQuery orderByAddress($order = Criteria::ASC) Order by the Address column
 * @method     VenueQuery orderByAddress2($order = Criteria::ASC) Order by the Address2 column
 * @method     VenueQuery orderByCity($order = Criteria::ASC) Order by the City column
 * @method     VenueQuery orderByProvince($order = Criteria::ASC) Order by the Province column
 * @method     VenueQuery orderByCountry($order = Criteria::ASC) Order by the Country column
 * @method     VenueQuery orderByLatitude($order = Criteria::ASC) Order by the Latitude column
 * @method     VenueQuery orderByLongitude($order = Criteria::ASC) Order by the Longitude column
 * @method     VenueQuery orderByPhone($order = Criteria::ASC) Order by the Phone column
 * @method     VenueQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     VenueQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 * @method     VenueQuery orderByWebsite($order = Criteria::ASC) Order by the Website column
 * @method     VenueQuery orderByTwitter($order = Criteria::ASC) Order by the Twitter column
 * @method     VenueQuery orderByFacebook($order = Criteria::ASC) Order by the Facebook column
 * @method     VenueQuery orderByRssfeed($order = Criteria::ASC) Order by the RSSFeed column
 * @method     VenueQuery orderByClosed($order = Criteria::ASC) Order by the Closed column
 * @method     VenueQuery orderByLastfmid($order = Criteria::ASC) Order by the lastFmId column
 * @method     VenueQuery orderBySlug($order = Criteria::ASC) Order by the Slug column
 * @method     VenueQuery orderByHasphotos($order = Criteria::ASC) Order by the HasPhotos column
 * @method     VenueQuery orderBySubmittedbyuser($order = Criteria::ASC) Order by the SubmittedByUser column
 *
 * @method     VenueQuery groupByVenueid() Group by the VenueId column
 * @method     VenueQuery groupByAddress() Group by the Address column
 * @method     VenueQuery groupByAddress2() Group by the Address2 column
 * @method     VenueQuery groupByCity() Group by the City column
 * @method     VenueQuery groupByProvince() Group by the Province column
 * @method     VenueQuery groupByCountry() Group by the Country column
 * @method     VenueQuery groupByLatitude() Group by the Latitude column
 * @method     VenueQuery groupByLongitude() Group by the Longitude column
 * @method     VenueQuery groupByPhone() Group by the Phone column
 * @method     VenueQuery groupByName() Group by the Name column
 * @method     VenueQuery groupByDescription() Group by the Description column
 * @method     VenueQuery groupByWebsite() Group by the Website column
 * @method     VenueQuery groupByTwitter() Group by the Twitter column
 * @method     VenueQuery groupByFacebook() Group by the Facebook column
 * @method     VenueQuery groupByRssfeed() Group by the RSSFeed column
 * @method     VenueQuery groupByClosed() Group by the Closed column
 * @method     VenueQuery groupByLastfmid() Group by the lastFmId column
 * @method     VenueQuery groupBySlug() Group by the Slug column
 * @method     VenueQuery groupByHasphotos() Group by the HasPhotos column
 * @method     VenueQuery groupBySubmittedbyuser() Group by the SubmittedByUser column
 *
 * @method     VenueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     VenueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     VenueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     VenueQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     VenueQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     VenueQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     VenueQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method     VenueQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method     VenueQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method     VenueQuery leftJoinVenuerating($relationAlias = null) Adds a LEFT JOIN clause to the query using the Venuerating relation
 * @method     VenueQuery rightJoinVenuerating($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Venuerating relation
 * @method     VenueQuery innerJoinVenuerating($relationAlias = null) Adds a INNER JOIN clause to the query using the Venuerating relation
 *
 * @method     Venue findOne(PropelPDO $con = null) Return the first Venue matching the query
 * @method     Venue findOneOrCreate(PropelPDO $con = null) Return the first Venue matching the query, or a new Venue object populated from the query conditions when no match is found
 *
 * @method     Venue findOneByVenueid(int $VenueId) Return the first Venue filtered by the VenueId column
 * @method     Venue findOneByAddress(string $Address) Return the first Venue filtered by the Address column
 * @method     Venue findOneByAddress2(string $Address2) Return the first Venue filtered by the Address2 column
 * @method     Venue findOneByCity(string $City) Return the first Venue filtered by the City column
 * @method     Venue findOneByProvince(string $Province) Return the first Venue filtered by the Province column
 * @method     Venue findOneByCountry(string $Country) Return the first Venue filtered by the Country column
 * @method     Venue findOneByLatitude(double $Latitude) Return the first Venue filtered by the Latitude column
 * @method     Venue findOneByLongitude(double $Longitude) Return the first Venue filtered by the Longitude column
 * @method     Venue findOneByPhone(string $Phone) Return the first Venue filtered by the Phone column
 * @method     Venue findOneByName(string $Name) Return the first Venue filtered by the Name column
 * @method     Venue findOneByDescription(string $Description) Return the first Venue filtered by the Description column
 * @method     Venue findOneByWebsite(string $Website) Return the first Venue filtered by the Website column
 * @method     Venue findOneByTwitter(string $Twitter) Return the first Venue filtered by the Twitter column
 * @method     Venue findOneByFacebook(string $Facebook) Return the first Venue filtered by the Facebook column
 * @method     Venue findOneByRssfeed(string $RSSFeed) Return the first Venue filtered by the RSSFeed column
 * @method     Venue findOneByClosed(int $Closed) Return the first Venue filtered by the Closed column
 * @method     Venue findOneByLastfmid(int $lastFmId) Return the first Venue filtered by the lastFmId column
 * @method     Venue findOneBySlug(string $Slug) Return the first Venue filtered by the Slug column
 * @method     Venue findOneByHasphotos(int $HasPhotos) Return the first Venue filtered by the HasPhotos column
 * @method     Venue findOneBySubmittedbyuser(int $SubmittedByUser) Return the first Venue filtered by the SubmittedByUser column
 *
 * @method     array findByVenueid(int $VenueId) Return Venue objects filtered by the VenueId column
 * @method     array findByAddress(string $Address) Return Venue objects filtered by the Address column
 * @method     array findByAddress2(string $Address2) Return Venue objects filtered by the Address2 column
 * @method     array findByCity(string $City) Return Venue objects filtered by the City column
 * @method     array findByProvince(string $Province) Return Venue objects filtered by the Province column
 * @method     array findByCountry(string $Country) Return Venue objects filtered by the Country column
 * @method     array findByLatitude(double $Latitude) Return Venue objects filtered by the Latitude column
 * @method     array findByLongitude(double $Longitude) Return Venue objects filtered by the Longitude column
 * @method     array findByPhone(string $Phone) Return Venue objects filtered by the Phone column
 * @method     array findByName(string $Name) Return Venue objects filtered by the Name column
 * @method     array findByDescription(string $Description) Return Venue objects filtered by the Description column
 * @method     array findByWebsite(string $Website) Return Venue objects filtered by the Website column
 * @method     array findByTwitter(string $Twitter) Return Venue objects filtered by the Twitter column
 * @method     array findByFacebook(string $Facebook) Return Venue objects filtered by the Facebook column
 * @method     array findByRssfeed(string $RSSFeed) Return Venue objects filtered by the RSSFeed column
 * @method     array findByClosed(int $Closed) Return Venue objects filtered by the Closed column
 * @method     array findByLastfmid(int $lastFmId) Return Venue objects filtered by the lastFmId column
 * @method     array findBySlug(string $Slug) Return Venue objects filtered by the Slug column
 * @method     array findByHasphotos(int $HasPhotos) Return Venue objects filtered by the HasPhotos column
 * @method     array findBySubmittedbyuser(int $SubmittedByUser) Return Venue objects filtered by the SubmittedByUser column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseVenueQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseVenueQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Venue', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new VenueQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    VenueQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof VenueQuery) {
			return $criteria;
		}
		$query = new VenueQuery();
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
	 * @return    Venue|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = VenuePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(VenuePeer::VENUEID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(VenuePeer::VENUEID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the VenueId column
	 * 
	 * @param     int|array $venueid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByVenueid($venueid = null, $comparison = null)
	{
		if (is_array($venueid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(VenuePeer::VENUEID, $venueid, $comparison);
	}

	/**
	 * Filter the query on the Address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByAddress($address = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($address)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $address)) {
				$address = str_replace('*', '%', $address);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(VenuePeer::ADDRESS, $address, $comparison);
	}

	/**
	 * Filter the query on the Address2 column
	 * 
	 * @param     string $address2 The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByAddress2($address2 = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($address2)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $address2)) {
				$address2 = str_replace('*', '%', $address2);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(VenuePeer::ADDRESS2, $address2, $comparison);
	}

	/**
	 * Filter the query on the City column
	 * 
	 * @param     string $city The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(VenuePeer::CITY, $city, $comparison);
	}

	/**
	 * Filter the query on the Province column
	 * 
	 * @param     string $province The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(VenuePeer::PROVINCE, $province, $comparison);
	}

	/**
	 * Filter the query on the Country column
	 * 
	 * @param     string $country The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(VenuePeer::COUNTRY, $country, $comparison);
	}

	/**
	 * Filter the query on the Latitude column
	 * 
	 * @param     double|array $latitude The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (is_array($latitude)) {
			$useMinMax = false;
			if (isset($latitude['min'])) {
				$this->addUsingAlias(VenuePeer::LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($latitude['max'])) {
				$this->addUsingAlias(VenuePeer::LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(VenuePeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query on the Longitude column
	 * 
	 * @param     double|array $longitude The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (is_array($longitude)) {
			$useMinMax = false;
			if (isset($longitude['min'])) {
				$this->addUsingAlias(VenuePeer::LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($longitude['max'])) {
				$this->addUsingAlias(VenuePeer::LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(VenuePeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query on the Phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByPhone($phone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phone)) {
				$phone = str_replace('*', '%', $phone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(VenuePeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the Name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(VenuePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the Description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(VenuePeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the Website column
	 * 
	 * @param     string $website The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(VenuePeer::WEBSITE, $website, $comparison);
	}

	/**
	 * Filter the query on the Twitter column
	 * 
	 * @param     string $twitter The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(VenuePeer::TWITTER, $twitter, $comparison);
	}

	/**
	 * Filter the query on the Facebook column
	 * 
	 * @param     string $facebook The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(VenuePeer::FACEBOOK, $facebook, $comparison);
	}

	/**
	 * Filter the query on the RSSFeed column
	 * 
	 * @param     string $rssfeed The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByRssfeed($rssfeed = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($rssfeed)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $rssfeed)) {
				$rssfeed = str_replace('*', '%', $rssfeed);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(VenuePeer::RSSFEED, $rssfeed, $comparison);
	}

	/**
	 * Filter the query on the Closed column
	 * 
	 * @param     int|array $closed The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByClosed($closed = null, $comparison = null)
	{
		if (is_array($closed)) {
			$useMinMax = false;
			if (isset($closed['min'])) {
				$this->addUsingAlias(VenuePeer::CLOSED, $closed['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($closed['max'])) {
				$this->addUsingAlias(VenuePeer::CLOSED, $closed['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(VenuePeer::CLOSED, $closed, $comparison);
	}

	/**
	 * Filter the query on the lastFmId column
	 * 
	 * @param     int|array $lastfmid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByLastfmid($lastfmid = null, $comparison = null)
	{
		if (is_array($lastfmid)) {
			$useMinMax = false;
			if (isset($lastfmid['min'])) {
				$this->addUsingAlias(VenuePeer::LASTFMID, $lastfmid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastfmid['max'])) {
				$this->addUsingAlias(VenuePeer::LASTFMID, $lastfmid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(VenuePeer::LASTFMID, $lastfmid, $comparison);
	}

	/**
	 * Filter the query on the Slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(VenuePeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query on the HasPhotos column
	 * 
	 * @param     int|array $hasphotos The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByHasphotos($hasphotos = null, $comparison = null)
	{
		if (is_array($hasphotos)) {
			$useMinMax = false;
			if (isset($hasphotos['min'])) {
				$this->addUsingAlias(VenuePeer::HASPHOTOS, $hasphotos['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($hasphotos['max'])) {
				$this->addUsingAlias(VenuePeer::HASPHOTOS, $hasphotos['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(VenuePeer::HASPHOTOS, $hasphotos, $comparison);
	}

	/**
	 * Filter the query on the SubmittedByUser column
	 * 
	 * @param     int|array $submittedbyuser The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterBySubmittedbyuser($submittedbyuser = null, $comparison = null)
	{
		if (is_array($submittedbyuser)) {
			$useMinMax = false;
			if (isset($submittedbyuser['min'])) {
				$this->addUsingAlias(VenuePeer::SUBMITTEDBYUSER, $submittedbyuser['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($submittedbyuser['max'])) {
				$this->addUsingAlias(VenuePeer::SUBMITTEDBYUSER, $submittedbyuser['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(VenuePeer::SUBMITTEDBYUSER, $submittedbyuser, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(VenuePeer::SUBMITTEDBYUSER, $user->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VenueQuery The current query, for fluid interface
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
	 * Filter the query by a related Event object
	 *
	 * @param     Event $event  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByEvent($event, $comparison = null)
	{
		return $this
			->addUsingAlias(VenuePeer::VENUEID, $event->getVenueid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Event relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function joinEvent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Event');
		
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
			$this->addJoinObject($join, 'Event');
		}
		
		return $this;
	}

	/**
	 * Use the Event relation Event object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery A secondary query class using the current class as primary query
	 */
	public function useEventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEvent($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Event', 'EventQuery');
	}

	/**
	 * Filter the query by a related Venuerating object
	 *
	 * @param     Venuerating $venuerating  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function filterByVenuerating($venuerating, $comparison = null)
	{
		return $this
			->addUsingAlias(VenuePeer::VENUEID, $venuerating->getVenueid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Venuerating relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function joinVenuerating($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Venuerating');
		
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
			$this->addJoinObject($join, 'Venuerating');
		}
		
		return $this;
	}

	/**
	 * Use the Venuerating relation Venuerating object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VenueratingQuery A secondary query class using the current class as primary query
	 */
	public function useVenueratingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinVenuerating($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Venuerating', 'VenueratingQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Venue $venue Object to remove from the list of results
	 *
	 * @return    VenueQuery The current query, for fluid interface
	 */
	public function prune($venue = null)
	{
		if ($venue) {
			$this->addUsingAlias(VenuePeer::VENUEID, $venue->getVenueid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseVenueQuery
