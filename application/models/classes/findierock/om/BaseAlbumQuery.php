<?php


/**
 * Base class that represents a query for the 'album' table.
 *
 * 
 *
 * @method     AlbumQuery orderByAlbumid($order = Criteria::ASC) Order by the AlbumId column
 * @method     AlbumQuery orderByArtistid($order = Criteria::ASC) Order by the ArtistId column
 * @method     AlbumQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     AlbumQuery orderByLabel($order = Criteria::ASC) Order by the Label column
 * @method     AlbumQuery orderByCopyright($order = Criteria::ASC) Order by the Copyright column
 * @method     AlbumQuery orderByProducer($order = Criteria::ASC) Order by the Producer column
 * @method     AlbumQuery orderByLastfmid($order = Criteria::ASC) Order by the lastFmId column
 * @method     AlbumQuery orderByReleasedate($order = Criteria::ASC) Order by the ReleaseDate column
 * @method     AlbumQuery orderByAlbumtype($order = Criteria::ASC) Order by the AlbumType column
 * @method     AlbumQuery orderBySlug($order = Criteria::ASC) Order by the Slug column
 * @method     AlbumQuery orderByHasphotos($order = Criteria::ASC) Order by the HasPhotos column
 * @method     AlbumQuery orderBySubmittedbyuser($order = Criteria::ASC) Order by the SubmittedByUser column
 *
 * @method     AlbumQuery groupByAlbumid() Group by the AlbumId column
 * @method     AlbumQuery groupByArtistid() Group by the ArtistId column
 * @method     AlbumQuery groupByName() Group by the Name column
 * @method     AlbumQuery groupByLabel() Group by the Label column
 * @method     AlbumQuery groupByCopyright() Group by the Copyright column
 * @method     AlbumQuery groupByProducer() Group by the Producer column
 * @method     AlbumQuery groupByLastfmid() Group by the lastFmId column
 * @method     AlbumQuery groupByReleasedate() Group by the ReleaseDate column
 * @method     AlbumQuery groupByAlbumtype() Group by the AlbumType column
 * @method     AlbumQuery groupBySlug() Group by the Slug column
 * @method     AlbumQuery groupByHasphotos() Group by the HasPhotos column
 * @method     AlbumQuery groupBySubmittedbyuser() Group by the SubmittedByUser column
 *
 * @method     AlbumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AlbumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AlbumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AlbumQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     AlbumQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     AlbumQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     AlbumQuery leftJoinArtist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Artist relation
 * @method     AlbumQuery rightJoinArtist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Artist relation
 * @method     AlbumQuery innerJoinArtist($relationAlias = null) Adds a INNER JOIN clause to the query using the Artist relation
 *
 * @method     AlbumQuery leftJoinAlbumrating($relationAlias = null) Adds a LEFT JOIN clause to the query using the Albumrating relation
 * @method     AlbumQuery rightJoinAlbumrating($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Albumrating relation
 * @method     AlbumQuery innerJoinAlbumrating($relationAlias = null) Adds a INNER JOIN clause to the query using the Albumrating relation
 *
 * @method     AlbumQuery leftJoinAlbumtrack($relationAlias = null) Adds a LEFT JOIN clause to the query using the Albumtrack relation
 * @method     AlbumQuery rightJoinAlbumtrack($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Albumtrack relation
 * @method     AlbumQuery innerJoinAlbumtrack($relationAlias = null) Adds a INNER JOIN clause to the query using the Albumtrack relation
 *
 * @method     Album findOne(PropelPDO $con = null) Return the first Album matching the query
 * @method     Album findOneOrCreate(PropelPDO $con = null) Return the first Album matching the query, or a new Album object populated from the query conditions when no match is found
 *
 * @method     Album findOneByAlbumid(int $AlbumId) Return the first Album filtered by the AlbumId column
 * @method     Album findOneByArtistid(int $ArtistId) Return the first Album filtered by the ArtistId column
 * @method     Album findOneByName(string $Name) Return the first Album filtered by the Name column
 * @method     Album findOneByLabel(string $Label) Return the first Album filtered by the Label column
 * @method     Album findOneByCopyright(string $Copyright) Return the first Album filtered by the Copyright column
 * @method     Album findOneByProducer(string $Producer) Return the first Album filtered by the Producer column
 * @method     Album findOneByLastfmid(string $lastFmId) Return the first Album filtered by the lastFmId column
 * @method     Album findOneByReleasedate(string $ReleaseDate) Return the first Album filtered by the ReleaseDate column
 * @method     Album findOneByAlbumtype(string $AlbumType) Return the first Album filtered by the AlbumType column
 * @method     Album findOneBySlug(string $Slug) Return the first Album filtered by the Slug column
 * @method     Album findOneByHasphotos(int $HasPhotos) Return the first Album filtered by the HasPhotos column
 * @method     Album findOneBySubmittedbyuser(int $SubmittedByUser) Return the first Album filtered by the SubmittedByUser column
 *
 * @method     array findByAlbumid(int $AlbumId) Return Album objects filtered by the AlbumId column
 * @method     array findByArtistid(int $ArtistId) Return Album objects filtered by the ArtistId column
 * @method     array findByName(string $Name) Return Album objects filtered by the Name column
 * @method     array findByLabel(string $Label) Return Album objects filtered by the Label column
 * @method     array findByCopyright(string $Copyright) Return Album objects filtered by the Copyright column
 * @method     array findByProducer(string $Producer) Return Album objects filtered by the Producer column
 * @method     array findByLastfmid(string $lastFmId) Return Album objects filtered by the lastFmId column
 * @method     array findByReleasedate(string $ReleaseDate) Return Album objects filtered by the ReleaseDate column
 * @method     array findByAlbumtype(string $AlbumType) Return Album objects filtered by the AlbumType column
 * @method     array findBySlug(string $Slug) Return Album objects filtered by the Slug column
 * @method     array findByHasphotos(int $HasPhotos) Return Album objects filtered by the HasPhotos column
 * @method     array findBySubmittedbyuser(int $SubmittedByUser) Return Album objects filtered by the SubmittedByUser column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseAlbumQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAlbumQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Album', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AlbumQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AlbumQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AlbumQuery) {
			return $criteria;
		}
		$query = new AlbumQuery();
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
	 * @return    Album|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AlbumPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AlbumPeer::ALBUMID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AlbumPeer::ALBUMID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the AlbumId column
	 * 
	 * @param     int|array $albumid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByAlbumid($albumid = null, $comparison = null)
	{
		if (is_array($albumid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AlbumPeer::ALBUMID, $albumid, $comparison);
	}

	/**
	 * Filter the query on the ArtistId column
	 * 
	 * @param     int|array $artistid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByArtistid($artistid = null, $comparison = null)
	{
		if (is_array($artistid)) {
			$useMinMax = false;
			if (isset($artistid['min'])) {
				$this->addUsingAlias(AlbumPeer::ARTISTID, $artistid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($artistid['max'])) {
				$this->addUsingAlias(AlbumPeer::ARTISTID, $artistid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::ARTISTID, $artistid, $comparison);
	}

	/**
	 * Filter the query on the Name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AlbumPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the Label column
	 * 
	 * @param     string $label The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByLabel($label = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($label)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $label)) {
				$label = str_replace('*', '%', $label);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AlbumPeer::LABEL, $label, $comparison);
	}

	/**
	 * Filter the query on the Copyright column
	 * 
	 * @param     string|array $copyright The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByCopyright($copyright = null, $comparison = null)
	{
		if (is_array($copyright)) {
			$useMinMax = false;
			if (isset($copyright['min'])) {
				$this->addUsingAlias(AlbumPeer::COPYRIGHT, $copyright['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($copyright['max'])) {
				$this->addUsingAlias(AlbumPeer::COPYRIGHT, $copyright['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::COPYRIGHT, $copyright, $comparison);
	}

	/**
	 * Filter the query on the Producer column
	 * 
	 * @param     string $producer The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByProducer($producer = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($producer)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $producer)) {
				$producer = str_replace('*', '%', $producer);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AlbumPeer::PRODUCER, $producer, $comparison);
	}

	/**
	 * Filter the query on the lastFmId column
	 * 
	 * @param     string $lastfmid The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AlbumPeer::LASTFMID, $lastfmid, $comparison);
	}

	/**
	 * Filter the query on the ReleaseDate column
	 * 
	 * @param     string|array $releasedate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByReleasedate($releasedate = null, $comparison = null)
	{
		if (is_array($releasedate)) {
			$useMinMax = false;
			if (isset($releasedate['min'])) {
				$this->addUsingAlias(AlbumPeer::RELEASEDATE, $releasedate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($releasedate['max'])) {
				$this->addUsingAlias(AlbumPeer::RELEASEDATE, $releasedate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::RELEASEDATE, $releasedate, $comparison);
	}

	/**
	 * Filter the query on the AlbumType column
	 * 
	 * @param     string $albumtype The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByAlbumtype($albumtype = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($albumtype)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $albumtype)) {
				$albumtype = str_replace('*', '%', $albumtype);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AlbumPeer::ALBUMTYPE, $albumtype, $comparison);
	}

	/**
	 * Filter the query on the Slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AlbumPeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query on the HasPhotos column
	 * 
	 * @param     int|array $hasphotos The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByHasphotos($hasphotos = null, $comparison = null)
	{
		if (is_array($hasphotos)) {
			$useMinMax = false;
			if (isset($hasphotos['min'])) {
				$this->addUsingAlias(AlbumPeer::HASPHOTOS, $hasphotos['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($hasphotos['max'])) {
				$this->addUsingAlias(AlbumPeer::HASPHOTOS, $hasphotos['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::HASPHOTOS, $hasphotos, $comparison);
	}

	/**
	 * Filter the query on the SubmittedByUser column
	 * 
	 * @param     int|array $submittedbyuser The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterBySubmittedbyuser($submittedbyuser = null, $comparison = null)
	{
		if (is_array($submittedbyuser)) {
			$useMinMax = false;
			if (isset($submittedbyuser['min'])) {
				$this->addUsingAlias(AlbumPeer::SUBMITTEDBYUSER, $submittedbyuser['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($submittedbyuser['max'])) {
				$this->addUsingAlias(AlbumPeer::SUBMITTEDBYUSER, $submittedbyuser['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::SUBMITTEDBYUSER, $submittedbyuser, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(AlbumPeer::SUBMITTEDBYUSER, $user->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery The current query, for fluid interface
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
	 * Filter the query by a related Artist object
	 *
	 * @param     Artist $artist  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByArtist($artist, $comparison = null)
	{
		return $this
			->addUsingAlias(AlbumPeer::ARTISTID, $artist->getArtistid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Artist relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function joinArtist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Artist');
		
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
			$this->addJoinObject($join, 'Artist');
		}
		
		return $this;
	}

	/**
	 * Use the Artist relation Artist object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ArtistQuery A secondary query class using the current class as primary query
	 */
	public function useArtistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinArtist($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Artist', 'ArtistQuery');
	}

	/**
	 * Filter the query by a related Albumrating object
	 *
	 * @param     Albumrating $albumrating  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByAlbumrating($albumrating, $comparison = null)
	{
		return $this
			->addUsingAlias(AlbumPeer::ALBUMID, $albumrating->getAlbumid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Albumrating relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function joinAlbumrating($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Albumrating');
		
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
			$this->addJoinObject($join, 'Albumrating');
		}
		
		return $this;
	}

	/**
	 * Use the Albumrating relation Albumrating object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumratingQuery A secondary query class using the current class as primary query
	 */
	public function useAlbumratingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlbumrating($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Albumrating', 'AlbumratingQuery');
	}

	/**
	 * Filter the query by a related Albumtrack object
	 *
	 * @param     Albumtrack $albumtrack  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByAlbumtrack($albumtrack, $comparison = null)
	{
		return $this
			->addUsingAlias(AlbumPeer::ALBUMID, $albumtrack->getAlbumid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Albumtrack relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function joinAlbumtrack($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Albumtrack');
		
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
			$this->addJoinObject($join, 'Albumtrack');
		}
		
		return $this;
	}

	/**
	 * Use the Albumtrack relation Albumtrack object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumtrackQuery A secondary query class using the current class as primary query
	 */
	public function useAlbumtrackQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlbumtrack($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Albumtrack', 'AlbumtrackQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Album $album Object to remove from the list of results
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function prune($album = null)
	{
		if ($album) {
			$this->addUsingAlias(AlbumPeer::ALBUMID, $album->getAlbumid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAlbumQuery
