<?php


/**
 * Base class that represents a query for the 'albumtrack' table.
 *
 * 
 *
 * @method     AlbumtrackQuery orderByTrackid($order = Criteria::ASC) Order by the TrackId column
 * @method     AlbumtrackQuery orderByAlbumid($order = Criteria::ASC) Order by the AlbumId column
 * @method     AlbumtrackQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     AlbumtrackQuery orderByFile($order = Criteria::ASC) Order by the File column
 * @method     AlbumtrackQuery orderByLength($order = Criteria::ASC) Order by the Length column
 * @method     AlbumtrackQuery orderByLastfmid($order = Criteria::ASC) Order by the lastFmId column
 *
 * @method     AlbumtrackQuery groupByTrackid() Group by the TrackId column
 * @method     AlbumtrackQuery groupByAlbumid() Group by the AlbumId column
 * @method     AlbumtrackQuery groupByName() Group by the Name column
 * @method     AlbumtrackQuery groupByFile() Group by the File column
 * @method     AlbumtrackQuery groupByLength() Group by the Length column
 * @method     AlbumtrackQuery groupByLastfmid() Group by the lastFmId column
 *
 * @method     AlbumtrackQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AlbumtrackQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AlbumtrackQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AlbumtrackQuery leftJoinAlbum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Album relation
 * @method     AlbumtrackQuery rightJoinAlbum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Album relation
 * @method     AlbumtrackQuery innerJoinAlbum($relationAlias = null) Adds a INNER JOIN clause to the query using the Album relation
 *
 * @method     Albumtrack findOne(PropelPDO $con = null) Return the first Albumtrack matching the query
 * @method     Albumtrack findOneOrCreate(PropelPDO $con = null) Return the first Albumtrack matching the query, or a new Albumtrack object populated from the query conditions when no match is found
 *
 * @method     Albumtrack findOneByTrackid(int $TrackId) Return the first Albumtrack filtered by the TrackId column
 * @method     Albumtrack findOneByAlbumid(int $AlbumId) Return the first Albumtrack filtered by the AlbumId column
 * @method     Albumtrack findOneByName(string $Name) Return the first Albumtrack filtered by the Name column
 * @method     Albumtrack findOneByFile(string $File) Return the first Albumtrack filtered by the File column
 * @method     Albumtrack findOneByLength(int $Length) Return the first Albumtrack filtered by the Length column
 * @method     Albumtrack findOneByLastfmid(string $lastFmId) Return the first Albumtrack filtered by the lastFmId column
 *
 * @method     array findByTrackid(int $TrackId) Return Albumtrack objects filtered by the TrackId column
 * @method     array findByAlbumid(int $AlbumId) Return Albumtrack objects filtered by the AlbumId column
 * @method     array findByName(string $Name) Return Albumtrack objects filtered by the Name column
 * @method     array findByFile(string $File) Return Albumtrack objects filtered by the File column
 * @method     array findByLength(int $Length) Return Albumtrack objects filtered by the Length column
 * @method     array findByLastfmid(string $lastFmId) Return Albumtrack objects filtered by the lastFmId column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseAlbumtrackQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAlbumtrackQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Albumtrack', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AlbumtrackQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AlbumtrackQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AlbumtrackQuery) {
			return $criteria;
		}
		$query = new AlbumtrackQuery();
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
	 * @return    Albumtrack|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AlbumtrackPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AlbumtrackQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AlbumtrackPeer::TRACKID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AlbumtrackPeer::TRACKID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the TrackId column
	 * 
	 * @param     int|array $trackid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
	 */
	public function filterByTrackid($trackid = null, $comparison = null)
	{
		if (is_array($trackid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AlbumtrackPeer::TRACKID, $trackid, $comparison);
	}

	/**
	 * Filter the query on the AlbumId column
	 * 
	 * @param     int|array $albumid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
	 */
	public function filterByAlbumid($albumid = null, $comparison = null)
	{
		if (is_array($albumid)) {
			$useMinMax = false;
			if (isset($albumid['min'])) {
				$this->addUsingAlias(AlbumtrackPeer::ALBUMID, $albumid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($albumid['max'])) {
				$this->addUsingAlias(AlbumtrackPeer::ALBUMID, $albumid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumtrackPeer::ALBUMID, $albumid, $comparison);
	}

	/**
	 * Filter the query on the Name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AlbumtrackPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the File column
	 * 
	 * @param     string $file The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
	 */
	public function filterByFile($file = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($file)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $file)) {
				$file = str_replace('*', '%', $file);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AlbumtrackPeer::FILE, $file, $comparison);
	}

	/**
	 * Filter the query on the Length column
	 * 
	 * @param     int|array $length The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
	 */
	public function filterByLength($length = null, $comparison = null)
	{
		if (is_array($length)) {
			$useMinMax = false;
			if (isset($length['min'])) {
				$this->addUsingAlias(AlbumtrackPeer::LENGTH, $length['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($length['max'])) {
				$this->addUsingAlias(AlbumtrackPeer::LENGTH, $length['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumtrackPeer::LENGTH, $length, $comparison);
	}

	/**
	 * Filter the query on the lastFmId column
	 * 
	 * @param     string $lastfmid The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AlbumtrackPeer::LASTFMID, $lastfmid, $comparison);
	}

	/**
	 * Filter the query by a related Album object
	 *
	 * @param     Album $album  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
	 */
	public function filterByAlbum($album, $comparison = null)
	{
		return $this
			->addUsingAlias(AlbumtrackPeer::ALBUMID, $album->getAlbumid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Album relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Albumtrack $albumtrack Object to remove from the list of results
	 *
	 * @return    AlbumtrackQuery The current query, for fluid interface
	 */
	public function prune($albumtrack = null)
	{
		if ($albumtrack) {
			$this->addUsingAlias(AlbumtrackPeer::TRACKID, $albumtrack->getTrackid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAlbumtrackQuery
