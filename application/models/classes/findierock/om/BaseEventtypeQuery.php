<?php


/**
 * Base class that represents a query for the 'eventtype' table.
 *
 * 
 *
 * @method     EventtypeQuery orderByEventtypeid($order = Criteria::ASC) Order by the EventTypeId column
 * @method     EventtypeQuery orderByType($order = Criteria::ASC) Order by the Type column
 *
 * @method     EventtypeQuery groupByEventtypeid() Group by the EventTypeId column
 * @method     EventtypeQuery groupByType() Group by the Type column
 *
 * @method     EventtypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EventtypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EventtypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EventtypeQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method     EventtypeQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method     EventtypeQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method     Eventtype findOne(PropelPDO $con = null) Return the first Eventtype matching the query
 * @method     Eventtype findOneOrCreate(PropelPDO $con = null) Return the first Eventtype matching the query, or a new Eventtype object populated from the query conditions when no match is found
 *
 * @method     Eventtype findOneByEventtypeid(int $EventTypeId) Return the first Eventtype filtered by the EventTypeId column
 * @method     Eventtype findOneByType(string $Type) Return the first Eventtype filtered by the Type column
 *
 * @method     array findByEventtypeid(int $EventTypeId) Return Eventtype objects filtered by the EventTypeId column
 * @method     array findByType(string $Type) Return Eventtype objects filtered by the Type column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseEventtypeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseEventtypeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Eventtype', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EventtypeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EventtypeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EventtypeQuery) {
			return $criteria;
		}
		$query = new EventtypeQuery();
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
	 * @return    Eventtype|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = EventtypePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    EventtypeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EventtypePeer::EVENTTYPEID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EventtypeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EventtypePeer::EVENTTYPEID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the EventTypeId column
	 * 
	 * @param     int|array $eventtypeid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventtypeQuery The current query, for fluid interface
	 */
	public function filterByEventtypeid($eventtypeid = null, $comparison = null)
	{
		if (is_array($eventtypeid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EventtypePeer::EVENTTYPEID, $eventtypeid, $comparison);
	}

	/**
	 * Filter the query on the Type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventtypeQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EventtypePeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query by a related Event object
	 *
	 * @param     Event $event  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventtypeQuery The current query, for fluid interface
	 */
	public function filterByEvent($event, $comparison = null)
	{
		return $this
			->addUsingAlias(EventtypePeer::EVENTTYPEID, $event->getEventtypeid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Event relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventtypeQuery The current query, for fluid interface
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
	 * @param     Eventtype $eventtype Object to remove from the list of results
	 *
	 * @return    EventtypeQuery The current query, for fluid interface
	 */
	public function prune($eventtype = null)
	{
		if ($eventtype) {
			$this->addUsingAlias(EventtypePeer::EVENTTYPEID, $eventtype->getEventtypeid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseEventtypeQuery
