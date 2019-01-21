<?php


/**
 * Base class that represents a query for the 'trend' table.
 *
 * 
 *
 * @method     TrendQuery orderByTrendid($order = Criteria::ASC) Order by the TrendId column
 * @method     TrendQuery orderByTrendtypeid($order = Criteria::ASC) Order by the TrendTypeId column
 * @method     TrendQuery orderByTimestamp($order = Criteria::ASC) Order by the TimeStamp column
 * @method     TrendQuery orderByTrendtarget($order = Criteria::ASC) Order by the TrendTarget column
 * @method     TrendQuery orderBySessionid($order = Criteria::ASC) Order by the SessionId column
 *
 * @method     TrendQuery groupByTrendid() Group by the TrendId column
 * @method     TrendQuery groupByTrendtypeid() Group by the TrendTypeId column
 * @method     TrendQuery groupByTimestamp() Group by the TimeStamp column
 * @method     TrendQuery groupByTrendtarget() Group by the TrendTarget column
 * @method     TrendQuery groupBySessionid() Group by the SessionId column
 *
 * @method     TrendQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TrendQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TrendQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TrendQuery leftJoinTrendtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trendtype relation
 * @method     TrendQuery rightJoinTrendtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trendtype relation
 * @method     TrendQuery innerJoinTrendtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Trendtype relation
 *
 * @method     Trend findOne(PropelPDO $con = null) Return the first Trend matching the query
 * @method     Trend findOneOrCreate(PropelPDO $con = null) Return the first Trend matching the query, or a new Trend object populated from the query conditions when no match is found
 *
 * @method     Trend findOneByTrendid(int $TrendId) Return the first Trend filtered by the TrendId column
 * @method     Trend findOneByTrendtypeid(int $TrendTypeId) Return the first Trend filtered by the TrendTypeId column
 * @method     Trend findOneByTimestamp(string $TimeStamp) Return the first Trend filtered by the TimeStamp column
 * @method     Trend findOneByTrendtarget(int $TrendTarget) Return the first Trend filtered by the TrendTarget column
 * @method     Trend findOneBySessionid(string $SessionId) Return the first Trend filtered by the SessionId column
 *
 * @method     array findByTrendid(int $TrendId) Return Trend objects filtered by the TrendId column
 * @method     array findByTrendtypeid(int $TrendTypeId) Return Trend objects filtered by the TrendTypeId column
 * @method     array findByTimestamp(string $TimeStamp) Return Trend objects filtered by the TimeStamp column
 * @method     array findByTrendtarget(int $TrendTarget) Return Trend objects filtered by the TrendTarget column
 * @method     array findBySessionid(string $SessionId) Return Trend objects filtered by the SessionId column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseTrendQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTrendQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Trend', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TrendQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TrendQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TrendQuery) {
			return $criteria;
		}
		$query = new TrendQuery();
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
	 * @return    Trend|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TrendPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TrendPeer::TRENDID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TrendPeer::TRENDID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the TrendId column
	 * 
	 * @param     int|array $trendid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function filterByTrendid($trendid = null, $comparison = null)
	{
		if (is_array($trendid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TrendPeer::TRENDID, $trendid, $comparison);
	}

	/**
	 * Filter the query on the TrendTypeId column
	 * 
	 * @param     int|array $trendtypeid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function filterByTrendtypeid($trendtypeid = null, $comparison = null)
	{
		if (is_array($trendtypeid)) {
			$useMinMax = false;
			if (isset($trendtypeid['min'])) {
				$this->addUsingAlias(TrendPeer::TRENDTYPEID, $trendtypeid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($trendtypeid['max'])) {
				$this->addUsingAlias(TrendPeer::TRENDTYPEID, $trendtypeid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TrendPeer::TRENDTYPEID, $trendtypeid, $comparison);
	}

	/**
	 * Filter the query on the TimeStamp column
	 * 
	 * @param     string|array $timestamp The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function filterByTimestamp($timestamp = null, $comparison = null)
	{
		if (is_array($timestamp)) {
			$useMinMax = false;
			if (isset($timestamp['min'])) {
				$this->addUsingAlias(TrendPeer::TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($timestamp['max'])) {
				$this->addUsingAlias(TrendPeer::TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TrendPeer::TIMESTAMP, $timestamp, $comparison);
	}

	/**
	 * Filter the query on the TrendTarget column
	 * 
	 * @param     int|array $trendtarget The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function filterByTrendtarget($trendtarget = null, $comparison = null)
	{
		if (is_array($trendtarget)) {
			$useMinMax = false;
			if (isset($trendtarget['min'])) {
				$this->addUsingAlias(TrendPeer::TRENDTARGET, $trendtarget['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($trendtarget['max'])) {
				$this->addUsingAlias(TrendPeer::TRENDTARGET, $trendtarget['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TrendPeer::TRENDTARGET, $trendtarget, $comparison);
	}

	/**
	 * Filter the query on the SessionId column
	 * 
	 * @param     string $sessionid The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function filterBySessionid($sessionid = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sessionid)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sessionid)) {
				$sessionid = str_replace('*', '%', $sessionid);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TrendPeer::SESSIONID, $sessionid, $comparison);
	}

	/**
	 * Filter the query by a related Trendtype object
	 *
	 * @param     Trendtype $trendtype  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function filterByTrendtype($trendtype, $comparison = null)
	{
		return $this
			->addUsingAlias(TrendPeer::TRENDTYPEID, $trendtype->getTrendtypeid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Trendtype relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function joinTrendtype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Trendtype');
		
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
			$this->addJoinObject($join, 'Trendtype');
		}
		
		return $this;
	}

	/**
	 * Use the Trendtype relation Trendtype object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TrendtypeQuery A secondary query class using the current class as primary query
	 */
	public function useTrendtypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTrendtype($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Trendtype', 'TrendtypeQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Trend $trend Object to remove from the list of results
	 *
	 * @return    TrendQuery The current query, for fluid interface
	 */
	public function prune($trend = null)
	{
		if ($trend) {
			$this->addUsingAlias(TrendPeer::TRENDID, $trend->getTrendid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseTrendQuery
