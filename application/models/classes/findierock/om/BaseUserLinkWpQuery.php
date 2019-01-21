<?php


/**
 * Base class that represents a query for the 'user_link_wp' table.
 *
 * 
 *
 * @method     UserLinkWpQuery orderByIdZend($order = Criteria::ASC) Order by the id_zend column
 * @method     UserLinkWpQuery orderByIdWordpress($order = Criteria::ASC) Order by the id_wordpress column
 *
 * @method     UserLinkWpQuery groupByIdZend() Group by the id_zend column
 * @method     UserLinkWpQuery groupByIdWordpress() Group by the id_wordpress column
 *
 * @method     UserLinkWpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserLinkWpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserLinkWpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserLinkWpQuery leftJoinFindieWpUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the FindieWpUsers relation
 * @method     UserLinkWpQuery rightJoinFindieWpUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FindieWpUsers relation
 * @method     UserLinkWpQuery innerJoinFindieWpUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the FindieWpUsers relation
 *
 * @method     UserLinkWpQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     UserLinkWpQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     UserLinkWpQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     UserLinkWp findOne(PropelPDO $con = null) Return the first UserLinkWp matching the query
 * @method     UserLinkWp findOneOrCreate(PropelPDO $con = null) Return the first UserLinkWp matching the query, or a new UserLinkWp object populated from the query conditions when no match is found
 *
 * @method     UserLinkWp findOneByIdZend(int $id_zend) Return the first UserLinkWp filtered by the id_zend column
 * @method     UserLinkWp findOneByIdWordpress(int $id_wordpress) Return the first UserLinkWp filtered by the id_wordpress column
 *
 * @method     array findByIdZend(int $id_zend) Return UserLinkWp objects filtered by the id_zend column
 * @method     array findByIdWordpress(int $id_wordpress) Return UserLinkWp objects filtered by the id_wordpress column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseUserLinkWpQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserLinkWpQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'UserLinkWp', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserLinkWpQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserLinkWpQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserLinkWpQuery) {
			return $criteria;
		}
		$query = new UserLinkWpQuery();
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
	 * @param     array[$id_zend, $id_wordpress] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    UserLinkWp|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserLinkWpPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UserLinkWpQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(UserLinkWpPeer::ID_ZEND, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(UserLinkWpPeer::ID_WORDPRESS, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserLinkWpQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(UserLinkWpPeer::ID_ZEND, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(UserLinkWpPeer::ID_WORDPRESS, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the id_zend column
	 * 
	 * @param     int|array $idZend The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserLinkWpQuery The current query, for fluid interface
	 */
	public function filterByIdZend($idZend = null, $comparison = null)
	{
		if (is_array($idZend) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserLinkWpPeer::ID_ZEND, $idZend, $comparison);
	}

	/**
	 * Filter the query on the id_wordpress column
	 * 
	 * @param     int|array $idWordpress The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserLinkWpQuery The current query, for fluid interface
	 */
	public function filterByIdWordpress($idWordpress = null, $comparison = null)
	{
		if (is_array($idWordpress) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserLinkWpPeer::ID_WORDPRESS, $idWordpress, $comparison);
	}

	/**
	 * Filter the query by a related FindieWpUsers object
	 *
	 * @param     FindieWpUsers $findieWpUsers  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserLinkWpQuery The current query, for fluid interface
	 */
	public function filterByFindieWpUsers($findieWpUsers, $comparison = null)
	{
		return $this
			->addUsingAlias(UserLinkWpPeer::ID_WORDPRESS, $findieWpUsers->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the FindieWpUsers relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserLinkWpQuery The current query, for fluid interface
	 */
	public function joinFindieWpUsers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('FindieWpUsers');
		
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
			$this->addJoinObject($join, 'FindieWpUsers');
		}
		
		return $this;
	}

	/**
	 * Use the FindieWpUsers relation FindieWpUsers object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FindieWpUsersQuery A secondary query class using the current class as primary query
	 */
	public function useFindieWpUsersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinFindieWpUsers($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'FindieWpUsers', 'FindieWpUsersQuery');
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserLinkWpQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(UserLinkWpPeer::ID_ZEND, $user->getUserid(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserLinkWpQuery The current query, for fluid interface
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
	 * @param     UserLinkWp $userLinkWp Object to remove from the list of results
	 *
	 * @return    UserLinkWpQuery The current query, for fluid interface
	 */
	public function prune($userLinkWp = null)
	{
		if ($userLinkWp) {
			$this->addCond('pruneCond0', $this->getAliasedColName(UserLinkWpPeer::ID_ZEND), $userLinkWp->getIdZend(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(UserLinkWpPeer::ID_WORDPRESS), $userLinkWp->getIdWordpress(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseUserLinkWpQuery
