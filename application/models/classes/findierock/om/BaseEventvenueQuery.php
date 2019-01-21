<?php


/**
 * Base class that represents a query for the 'eventvenue' table.
 *
 * 
 *
 * @method     EventvenueQuery orderByEventid($order = Criteria::ASC) Order by the EventId column
 * @method     EventvenueQuery orderByVenueid($order = Criteria::ASC) Order by the VenueId column
 * @method     EventvenueQuery orderByComments($order = Criteria::ASC) Order by the Comments column
 *
 * @method     EventvenueQuery groupByEventid() Group by the EventId column
 * @method     EventvenueQuery groupByVenueid() Group by the VenueId column
 * @method     EventvenueQuery groupByComments() Group by the Comments column
 *
 * @method     EventvenueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EventvenueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EventvenueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EventvenueQuery leftJoinEvent($relationAlias = '') Adds a LEFT JOIN clause to the query using the Event relation
 * @method     EventvenueQuery rightJoinEvent($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Event relation
 * @method     EventvenueQuery innerJoinEvent($relationAlias = '') Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method     EventvenueQuery leftJoinVenue($relationAlias = '') Adds a LEFT JOIN clause to the query using the Venue relation
 * @method     EventvenueQuery rightJoinVenue($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Venue relation
 * @method     EventvenueQuery innerJoinVenue($relationAlias = '') Adds a INNER JOIN clause to the query using the Venue relation
 *
 * @method     Eventvenue findOne(PropelPDO $con = null) Return the first Eventvenue matching the query
 * @method     Eventvenue findOneOrCreate(PropelPDO $con = null) Return the first Eventvenue matching the query, or a new Eventvenue object populated from the query conditions when no match is found
 *
 * @method     Eventvenue findOneByEventid(int $EventId) Return the first Eventvenue filtered by the EventId column
 * @method     Eventvenue findOneByVenueid(int $VenueId) Return the first Eventvenue filtered by the VenueId column
 * @method     Eventvenue findOneByComments(string $Comments) Return the first Eventvenue filtered by the Comments column
 *
 * @method     array findByEventid(int $EventId) Return Eventvenue objects filtered by the EventId column
 * @method     array findByVenueid(int $VenueId) Return Eventvenue objects filtered by the VenueId column
 * @method     array findByComments(string $Comments) Return Eventvenue objects filtered by the Comments column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseEventvenueQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseEventvenueQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Eventvenue', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EventvenueQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EventvenueQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EventvenueQuery) {
			return $criteria;
		}
		$query = new EventvenueQuery();
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
	 * @param     array[$EventId, $VenueId] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Eventvenue|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = EventvenuePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(EventvenuePeer::EVENTID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(EventvenuePeer::VENUEID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(EventvenuePeer::EVENTID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(EventvenuePeer::VENUEID, $key[1], Criteria::EQUAL);
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
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function filterByEventid($eventid = null, $comparison = null)
	{
		if (is_array($eventid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EventvenuePeer::EVENTID, $eventid, $comparison);
	}

	/**
	 * Filter the query on the VenueId column
	 * 
	 * @param     int|array $venueid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function filterByVenueid($venueid = null, $comparison = null)
	{
		if (is_array($venueid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EventvenuePeer::VENUEID, $venueid, $comparison);
	}

	/**
	 * Filter the query on the Comments column
	 * 
	 * @param     string $comments The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventvenueQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EventvenuePeer::COMMENTS, $comments, $comparison);
	}

	/**
	 * Filter the query by a related Event object
	 *
	 * @param     Event $event  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function filterByEvent($event, $comparison = null)
	{
		return $this
			->addUsingAlias(EventvenuePeer::EVENTID, $event->getEventid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Event relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function joinEvent($relationAlias = '', $joinType = Criteria::INNER_JOIN)
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
	public function useEventQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEvent($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Event', 'EventQuery');
	}

	/**
	 * Filter the query by a related Venue object
	 *
	 * @param     Venue $venue  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function filterByVenue($venue, $comparison = null)
	{
		return $this
			->addUsingAlias(EventvenuePeer::VENUEID, $venue->getVenueid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Venue relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function joinVenue($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Venue');
		
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
			$this->addJoinObject($join, 'Venue');
		}
		
		return $this;
	}

	/**
	 * Use the Venue relation Venue object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VenueQuery A secondary query class using the current class as primary query
	 */
	public function useVenueQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinVenue($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Venue', 'VenueQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Eventvenue $eventvenue Object to remove from the list of results
	 *
	 * @return    EventvenueQuery The current query, for fluid interface
	 */
	public function prune($eventvenue = null)
	{
		if ($eventvenue) {
			$this->addCond('pruneCond0', $this->getAliasedColName(EventvenuePeer::EVENTID), $eventvenue->getEventid(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(EventvenuePeer::VENUEID), $eventvenue->getVenueid(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseEventvenueQuery
