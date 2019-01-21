<?php


/**
 * Base class that represents a query for the 'eventartist' table.
 *
 * 
 *
 * @method     EventartistQuery orderByEventid($order = Criteria::ASC) Order by the EventId column
 * @method     EventartistQuery orderByArtistid($order = Criteria::ASC) Order by the ArtistId column
 * @method     EventartistQuery orderByComments($order = Criteria::ASC) Order by the Comments column
 * @method     EventartistQuery orderByHeadliner($order = Criteria::ASC) Order by the HeadLiner column
 *
 * @method     EventartistQuery groupByEventid() Group by the EventId column
 * @method     EventartistQuery groupByArtistid() Group by the ArtistId column
 * @method     EventartistQuery groupByComments() Group by the Comments column
 * @method     EventartistQuery groupByHeadliner() Group by the HeadLiner column
 *
 * @method     EventartistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EventartistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EventartistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EventartistQuery leftJoinArtist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Artist relation
 * @method     EventartistQuery rightJoinArtist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Artist relation
 * @method     EventartistQuery innerJoinArtist($relationAlias = null) Adds a INNER JOIN clause to the query using the Artist relation
 *
 * @method     EventartistQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method     EventartistQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method     EventartistQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method     Eventartist findOne(PropelPDO $con = null) Return the first Eventartist matching the query
 * @method     Eventartist findOneOrCreate(PropelPDO $con = null) Return the first Eventartist matching the query, or a new Eventartist object populated from the query conditions when no match is found
 *
 * @method     Eventartist findOneByEventid(int $EventId) Return the first Eventartist filtered by the EventId column
 * @method     Eventartist findOneByArtistid(int $ArtistId) Return the first Eventartist filtered by the ArtistId column
 * @method     Eventartist findOneByComments(string $Comments) Return the first Eventartist filtered by the Comments column
 * @method     Eventartist findOneByHeadliner(int $HeadLiner) Return the first Eventartist filtered by the HeadLiner column
 *
 * @method     array findByEventid(int $EventId) Return Eventartist objects filtered by the EventId column
 * @method     array findByArtistid(int $ArtistId) Return Eventartist objects filtered by the ArtistId column
 * @method     array findByComments(string $Comments) Return Eventartist objects filtered by the Comments column
 * @method     array findByHeadliner(int $HeadLiner) Return Eventartist objects filtered by the HeadLiner column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseEventartistQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseEventartistQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Eventartist', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EventartistQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EventartistQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EventartistQuery) {
			return $criteria;
		}
		$query = new EventartistQuery();
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
	 * @param     array[$EventId, $ArtistId] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Eventartist|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = EventartistPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    EventartistQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(EventartistPeer::EVENTID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(EventartistPeer::ARTISTID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EventartistQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(EventartistPeer::EVENTID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(EventartistPeer::ARTISTID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the EventId column
	 * 
	 * @param     int|array $eventid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventartistQuery The current query, for fluid interface
	 */
	public function filterByEventid($eventid = null, $comparison = null)
	{
		if (is_array($eventid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EventartistPeer::EVENTID, $eventid, $comparison);
	}

	/**
	 * Filter the query on the ArtistId column
	 * 
	 * @param     int|array $artistid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventartistQuery The current query, for fluid interface
	 */
	public function filterByArtistid($artistid = null, $comparison = null)
	{
		if (is_array($artistid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EventartistPeer::ARTISTID, $artistid, $comparison);
	}

	/**
	 * Filter the query on the Comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventartistQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EventartistPeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query on the HeadLiner column
	 * 
	 * @param     int|array $headliner The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventartistQuery The current query, for fluid interface
	 */
	public function filterByHeadliner($headliner = null, $comparison = null)
	{
		if (is_array($headliner)) {
			$useMinMax = false;
			if (isset($headliner['min'])) {
				$this->addUsingAlias(EventartistPeer::HEADLINER, $headliner['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($headliner['max'])) {
				$this->addUsingAlias(EventartistPeer::HEADLINER, $headliner['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventartistPeer::HEADLINER, $headliner, $comparison);
	}

	/**
	 * Filter the query by a related Artist object
	 *
	 * @param     Artist $artist  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventartistQuery The current query, for fluid interface
	 */
	public function filterByArtist($artist, $comparison = null)
	{
		return $this
			->addUsingAlias(EventartistPeer::ARTISTID, $artist->getArtistid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Artist relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventartistQuery The current query, for fluid interface
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
	 * Filter the query by a related Event object
	 *
	 * @param     Event $event  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventartistQuery The current query, for fluid interface
	 */
	public function filterByEvent($event, $comparison = null)
	{
		return $this
			->addUsingAlias(EventartistPeer::EVENTID, $event->getEventid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Event relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventartistQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Eventartist $eventartist Object to remove from the list of results
	 *
	 * @return    EventartistQuery The current query, for fluid interface
	 */
	public function prune($eventartist = null)
	{
		if ($eventartist) {
			$this->addCond('pruneCond0', $this->getAliasedColName(EventartistPeer::EVENTID), $eventartist->getEventid(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(EventartistPeer::ARTISTID), $eventartist->getArtistid(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseEventartistQuery
