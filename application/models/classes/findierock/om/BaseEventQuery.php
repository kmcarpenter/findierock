<?php


/**
 * Base class that represents a query for the 'event' table.
 *
 * 
 *
 * @method     EventQuery orderByEventid($order = Criteria::ASC) Order by the EventId column
 * @method     EventQuery orderByName($order = Criteria::ASC) Order by the Name column
 * @method     EventQuery orderByStart($order = Criteria::ASC) Order by the Start column
 * @method     EventQuery orderByFinish($order = Criteria::ASC) Order by the Finish column
 * @method     EventQuery orderByCover($order = Criteria::ASC) Order by the Cover column
 * @method     EventQuery orderByAgeofmajority($order = Criteria::ASC) Order by the AgeOfMajority column
 * @method     EventQuery orderByEventtypeid($order = Criteria::ASC) Order by the EventTypeId column
 * @method     EventQuery orderByLastfmid($order = Criteria::ASC) Order by the lastFmId column
 * @method     EventQuery orderByVenueid($order = Criteria::ASC) Order by the VenueId column
 * @method     EventQuery orderByCancelled($order = Criteria::ASC) Order by the Cancelled column
 * @method     EventQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 * @method     EventQuery orderBySlug($order = Criteria::ASC) Order by the Slug column
 * @method     EventQuery orderBySubmittedbyuser($order = Criteria::ASC) Order by the SubmittedByUser column
 *
 * @method     EventQuery groupByEventid() Group by the EventId column
 * @method     EventQuery groupByName() Group by the Name column
 * @method     EventQuery groupByStart() Group by the Start column
 * @method     EventQuery groupByFinish() Group by the Finish column
 * @method     EventQuery groupByCover() Group by the Cover column
 * @method     EventQuery groupByAgeofmajority() Group by the AgeOfMajority column
 * @method     EventQuery groupByEventtypeid() Group by the EventTypeId column
 * @method     EventQuery groupByLastfmid() Group by the lastFmId column
 * @method     EventQuery groupByVenueid() Group by the VenueId column
 * @method     EventQuery groupByCancelled() Group by the Cancelled column
 * @method     EventQuery groupByDescription() Group by the Description column
 * @method     EventQuery groupBySlug() Group by the Slug column
 * @method     EventQuery groupBySubmittedbyuser() Group by the SubmittedByUser column
 *
 * @method     EventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EventQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     EventQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     EventQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     EventQuery leftJoinEventtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Eventtype relation
 * @method     EventQuery rightJoinEventtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Eventtype relation
 * @method     EventQuery innerJoinEventtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Eventtype relation
 *
 * @method     EventQuery leftJoinVenue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Venue relation
 * @method     EventQuery rightJoinVenue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Venue relation
 * @method     EventQuery innerJoinVenue($relationAlias = null) Adds a INNER JOIN clause to the query using the Venue relation
 *
 * @method     EventQuery leftJoinEventartist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Eventartist relation
 * @method     EventQuery rightJoinEventartist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Eventartist relation
 * @method     EventQuery innerJoinEventartist($relationAlias = null) Adds a INNER JOIN clause to the query using the Eventartist relation
 *
 * @method     Event findOne(PropelPDO $con = null) Return the first Event matching the query
 * @method     Event findOneOrCreate(PropelPDO $con = null) Return the first Event matching the query, or a new Event object populated from the query conditions when no match is found
 *
 * @method     Event findOneByEventid(int $EventId) Return the first Event filtered by the EventId column
 * @method     Event findOneByName(string $Name) Return the first Event filtered by the Name column
 * @method     Event findOneByStart(string $Start) Return the first Event filtered by the Start column
 * @method     Event findOneByFinish(string $Finish) Return the first Event filtered by the Finish column
 * @method     Event findOneByCover(string $Cover) Return the first Event filtered by the Cover column
 * @method     Event findOneByAgeofmajority(int $AgeOfMajority) Return the first Event filtered by the AgeOfMajority column
 * @method     Event findOneByEventtypeid(int $EventTypeId) Return the first Event filtered by the EventTypeId column
 * @method     Event findOneByLastfmid(int $lastFmId) Return the first Event filtered by the lastFmId column
 * @method     Event findOneByVenueid(int $VenueId) Return the first Event filtered by the VenueId column
 * @method     Event findOneByCancelled(int $Cancelled) Return the first Event filtered by the Cancelled column
 * @method     Event findOneByDescription(string $Description) Return the first Event filtered by the Description column
 * @method     Event findOneBySlug(string $Slug) Return the first Event filtered by the Slug column
 * @method     Event findOneBySubmittedbyuser(int $SubmittedByUser) Return the first Event filtered by the SubmittedByUser column
 *
 * @method     array findByEventid(int $EventId) Return Event objects filtered by the EventId column
 * @method     array findByName(string $Name) Return Event objects filtered by the Name column
 * @method     array findByStart(string $Start) Return Event objects filtered by the Start column
 * @method     array findByFinish(string $Finish) Return Event objects filtered by the Finish column
 * @method     array findByCover(string $Cover) Return Event objects filtered by the Cover column
 * @method     array findByAgeofmajority(int $AgeOfMajority) Return Event objects filtered by the AgeOfMajority column
 * @method     array findByEventtypeid(int $EventTypeId) Return Event objects filtered by the EventTypeId column
 * @method     array findByLastfmid(int $lastFmId) Return Event objects filtered by the lastFmId column
 * @method     array findByVenueid(int $VenueId) Return Event objects filtered by the VenueId column
 * @method     array findByCancelled(int $Cancelled) Return Event objects filtered by the Cancelled column
 * @method     array findByDescription(string $Description) Return Event objects filtered by the Description column
 * @method     array findBySlug(string $Slug) Return Event objects filtered by the Slug column
 * @method     array findBySubmittedbyuser(int $SubmittedByUser) Return Event objects filtered by the SubmittedByUser column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseEventQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseEventQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Event', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EventQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EventQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EventQuery) {
			return $criteria;
		}
		$query = new EventQuery();
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
	 * @return    Event|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = EventPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EventPeer::EVENTID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EventPeer::EVENTID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the EventId column
	 * 
	 * @param     int|array $eventid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByEventid($eventid = null, $comparison = null)
	{
		if (is_array($eventid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EventPeer::EVENTID, $eventid, $comparison);
	}

	/**
	 * Filter the query on the Name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EventPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the Start column
	 * 
	 * @param     string|array $start The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByStart($start = null, $comparison = null)
	{
		if (is_array($start)) {
			$useMinMax = false;
			if (isset($start['min'])) {
				$this->addUsingAlias(EventPeer::START, $start['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($start['max'])) {
				$this->addUsingAlias(EventPeer::START, $start['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::START, $start, $comparison);
	}

	/**
	 * Filter the query on the Finish column
	 * 
	 * @param     string $finish The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByFinish($finish = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($finish)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $finish)) {
				$finish = str_replace('*', '%', $finish);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EventPeer::FINISH, $finish, $comparison);
	}

	/**
	 * Filter the query on the Cover column
	 * 
	 * @param     string|array $cover The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByCover($cover = null, $comparison = null)
	{
		if (is_array($cover)) {
			$useMinMax = false;
			if (isset($cover['min'])) {
				$this->addUsingAlias(EventPeer::COVER, $cover['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cover['max'])) {
				$this->addUsingAlias(EventPeer::COVER, $cover['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::COVER, $cover, $comparison);
	}

	/**
	 * Filter the query on the AgeOfMajority column
	 * 
	 * @param     int|array $ageofmajority The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByAgeofmajority($ageofmajority = null, $comparison = null)
	{
		if (is_array($ageofmajority)) {
			$useMinMax = false;
			if (isset($ageofmajority['min'])) {
				$this->addUsingAlias(EventPeer::AGEOFMAJORITY, $ageofmajority['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ageofmajority['max'])) {
				$this->addUsingAlias(EventPeer::AGEOFMAJORITY, $ageofmajority['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::AGEOFMAJORITY, $ageofmajority, $comparison);
	}

	/**
	 * Filter the query on the EventTypeId column
	 * 
	 * @param     int|array $eventtypeid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByEventtypeid($eventtypeid = null, $comparison = null)
	{
		if (is_array($eventtypeid)) {
			$useMinMax = false;
			if (isset($eventtypeid['min'])) {
				$this->addUsingAlias(EventPeer::EVENTTYPEID, $eventtypeid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($eventtypeid['max'])) {
				$this->addUsingAlias(EventPeer::EVENTTYPEID, $eventtypeid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::EVENTTYPEID, $eventtypeid, $comparison);
	}

	/**
	 * Filter the query on the lastFmId column
	 * 
	 * @param     int|array $lastfmid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByLastfmid($lastfmid = null, $comparison = null)
	{
		if (is_array($lastfmid)) {
			$useMinMax = false;
			if (isset($lastfmid['min'])) {
				$this->addUsingAlias(EventPeer::LASTFMID, $lastfmid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastfmid['max'])) {
				$this->addUsingAlias(EventPeer::LASTFMID, $lastfmid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::LASTFMID, $lastfmid, $comparison);
	}

	/**
	 * Filter the query on the VenueId column
	 * 
	 * @param     int|array $venueid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByVenueid($venueid = null, $comparison = null)
	{
		if (is_array($venueid)) {
			$useMinMax = false;
			if (isset($venueid['min'])) {
				$this->addUsingAlias(EventPeer::VENUEID, $venueid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($venueid['max'])) {
				$this->addUsingAlias(EventPeer::VENUEID, $venueid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::VENUEID, $venueid, $comparison);
	}

	/**
	 * Filter the query on the Cancelled column
	 * 
	 * @param     int|array $cancelled The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByCancelled($cancelled = null, $comparison = null)
	{
		if (is_array($cancelled)) {
			$useMinMax = false;
			if (isset($cancelled['min'])) {
				$this->addUsingAlias(EventPeer::CANCELLED, $cancelled['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cancelled['max'])) {
				$this->addUsingAlias(EventPeer::CANCELLED, $cancelled['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::CANCELLED, $cancelled, $comparison);
	}

	/**
	 * Filter the query on the Description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EventPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the Slug column
	 * 
	 * @param     string $slug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
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
		return $this->addUsingAlias(EventPeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query on the SubmittedByUser column
	 * 
	 * @param     int|array $submittedbyuser The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterBySubmittedbyuser($submittedbyuser = null, $comparison = null)
	{
		if (is_array($submittedbyuser)) {
			$useMinMax = false;
			if (isset($submittedbyuser['min'])) {
				$this->addUsingAlias(EventPeer::SUBMITTEDBYUSER, $submittedbyuser['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($submittedbyuser['max'])) {
				$this->addUsingAlias(EventPeer::SUBMITTEDBYUSER, $submittedbyuser['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventPeer::SUBMITTEDBYUSER, $submittedbyuser, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::SUBMITTEDBYUSER, $user->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * Filter the query by a related Eventtype object
	 *
	 * @param     Eventtype $eventtype  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByEventtype($eventtype, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::EVENTTYPEID, $eventtype->getEventtypeid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Eventtype relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function joinEventtype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Eventtype');
		
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
			$this->addJoinObject($join, 'Eventtype');
		}
		
		return $this;
	}

	/**
	 * Use the Eventtype relation Eventtype object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventtypeQuery A secondary query class using the current class as primary query
	 */
	public function useEventtypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEventtype($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Eventtype', 'EventtypeQuery');
	}

	/**
	 * Filter the query by a related Venue object
	 *
	 * @param     Venue $venue  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByVenue($venue, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::VENUEID, $venue->getVenueid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Venue relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function joinVenue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useVenueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinVenue($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Venue', 'VenueQuery');
	}

	/**
	 * Filter the query by a related Eventartist object
	 *
	 * @param     Eventartist $eventartist  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function filterByEventartist($eventartist, $comparison = null)
	{
		return $this
			->addUsingAlias(EventPeer::EVENTID, $eventartist->getEventid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Eventartist relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventQuery The current query, for fluid interface
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
	 * @param     Event $event Object to remove from the list of results
	 *
	 * @return    EventQuery The current query, for fluid interface
	 */
	public function prune($event = null)
	{
		if ($event) {
			$this->addUsingAlias(EventPeer::EVENTID, $event->getEventid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseEventQuery
