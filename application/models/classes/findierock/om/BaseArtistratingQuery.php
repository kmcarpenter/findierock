<?php


/**
 * Base class that represents a query for the 'artistrating' table.
 *
 * 
 *
 * @method     ArtistratingQuery orderByArtistid($order = Criteria::ASC) Order by the ArtistId column
 * @method     ArtistratingQuery orderByUserid($order = Criteria::ASC) Order by the UserId column
 * @method     ArtistratingQuery orderByRating($order = Criteria::ASC) Order by the Rating column
 * @method     ArtistratingQuery orderByComments($order = Criteria::ASC) Order by the Comments column
 *
 * @method     ArtistratingQuery groupByArtistid() Group by the ArtistId column
 * @method     ArtistratingQuery groupByUserid() Group by the UserId column
 * @method     ArtistratingQuery groupByRating() Group by the Rating column
 * @method     ArtistratingQuery groupByComments() Group by the Comments column
 *
 * @method     ArtistratingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ArtistratingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ArtistratingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ArtistratingQuery leftJoinArtist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Artist relation
 * @method     ArtistratingQuery rightJoinArtist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Artist relation
 * @method     ArtistratingQuery innerJoinArtist($relationAlias = null) Adds a INNER JOIN clause to the query using the Artist relation
 *
 * @method     ArtistratingQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ArtistratingQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ArtistratingQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     Artistrating findOne(PropelPDO $con = null) Return the first Artistrating matching the query
 * @method     Artistrating findOneOrCreate(PropelPDO $con = null) Return the first Artistrating matching the query, or a new Artistrating object populated from the query conditions when no match is found
 *
 * @method     Artistrating findOneByArtistid(int $ArtistId) Return the first Artistrating filtered by the ArtistId column
 * @method     Artistrating findOneByUserid(int $UserId) Return the first Artistrating filtered by the UserId column
 * @method     Artistrating findOneByRating(int $Rating) Return the first Artistrating filtered by the Rating column
 * @method     Artistrating findOneByComments(string $Comments) Return the first Artistrating filtered by the Comments column
 *
 * @method     array findByArtistid(int $ArtistId) Return Artistrating objects filtered by the ArtistId column
 * @method     array findByUserid(int $UserId) Return Artistrating objects filtered by the UserId column
 * @method     array findByRating(int $Rating) Return Artistrating objects filtered by the Rating column
 * @method     array findByComments(string $Comments) Return Artistrating objects filtered by the Comments column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseArtistratingQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseArtistratingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Artistrating', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ArtistratingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ArtistratingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ArtistratingQuery) {
			return $criteria;
		}
		$query = new ArtistratingQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$ArtistId, $UserId] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Artistrating|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ArtistratingPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ArtistratingPeer::ARTISTID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ArtistratingPeer::USERID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ArtistratingPeer::ARTISTID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ArtistratingPeer::USERID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the ArtistId column
	 * 
	 * @param     int|array $artistid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function filterByArtistid($artistid = null, $comparison = null)
	{
		if (is_array($artistid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ArtistratingPeer::ARTISTID, $artistid, $comparison);
	}

	/**
	 * Filter the query on the UserId column
	 * 
	 * @param     int|array $userid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ArtistratingPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query on the Rating column
	 * 
	 * @param     int|array $rating The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function filterByRating($rating = null, $comparison = null)
	{
		if (is_array($rating)) {
			$useMinMax = false;
			if (isset($rating['min'])) {
				$this->addUsingAlias(ArtistratingPeer::RATING, $rating['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rating['max'])) {
				$this->addUsingAlias(ArtistratingPeer::RATING, $rating['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ArtistratingPeer::RATING, $rating, $comparison);
	}

	/**
	 * Filter the query on the Comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function filterByComments($comments = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comments)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comments)) {
				$comments = str_replace('*', '%', $comments);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ArtistratingPeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query by a related Artist object
	 *
	 * @param     Artist $artist  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function filterByArtist($artist, $comparison = null)
	{
		return $this
			->addUsingAlias(ArtistratingPeer::ARTISTID, $artist->getArtistid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Artist relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
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
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(ArtistratingPeer::USERID, $user->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Artistrating $artistrating Object to remove from the list of results
	 *
	 * @return    ArtistratingQuery The current query, for fluid interface
	 */
	public function prune($artistrating = null)
	{
		if ($artistrating) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ArtistratingPeer::ARTISTID), $artistrating->getArtistid(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ArtistratingPeer::USERID), $artistrating->getUserid(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseArtistratingQuery
