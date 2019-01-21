<?php


/**
 * Base class that represents a query for the 'findie_wp_users' table.
 *
 * 
 *
 * @method     FindieWpUsersQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     FindieWpUsersQuery orderByUserLogin($order = Criteria::ASC) Order by the user_login column
 * @method     FindieWpUsersQuery orderByUserPass($order = Criteria::ASC) Order by the user_pass column
 * @method     FindieWpUsersQuery orderByUserNicename($order = Criteria::ASC) Order by the user_nicename column
 * @method     FindieWpUsersQuery orderByUserEmail($order = Criteria::ASC) Order by the user_email column
 * @method     FindieWpUsersQuery orderByUserUrl($order = Criteria::ASC) Order by the user_url column
 * @method     FindieWpUsersQuery orderByUserRegistered($order = Criteria::ASC) Order by the user_registered column
 * @method     FindieWpUsersQuery orderByUserActivationKey($order = Criteria::ASC) Order by the user_activation_key column
 * @method     FindieWpUsersQuery orderByUserStatus($order = Criteria::ASC) Order by the user_status column
 * @method     FindieWpUsersQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 *
 * @method     FindieWpUsersQuery groupById() Group by the ID column
 * @method     FindieWpUsersQuery groupByUserLogin() Group by the user_login column
 * @method     FindieWpUsersQuery groupByUserPass() Group by the user_pass column
 * @method     FindieWpUsersQuery groupByUserNicename() Group by the user_nicename column
 * @method     FindieWpUsersQuery groupByUserEmail() Group by the user_email column
 * @method     FindieWpUsersQuery groupByUserUrl() Group by the user_url column
 * @method     FindieWpUsersQuery groupByUserRegistered() Group by the user_registered column
 * @method     FindieWpUsersQuery groupByUserActivationKey() Group by the user_activation_key column
 * @method     FindieWpUsersQuery groupByUserStatus() Group by the user_status column
 * @method     FindieWpUsersQuery groupByDisplayName() Group by the display_name column
 *
 * @method     FindieWpUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FindieWpUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FindieWpUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FindieWpUsersQuery leftJoinUserLinkWp($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserLinkWp relation
 * @method     FindieWpUsersQuery rightJoinUserLinkWp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserLinkWp relation
 * @method     FindieWpUsersQuery innerJoinUserLinkWp($relationAlias = null) Adds a INNER JOIN clause to the query using the UserLinkWp relation
 *
 * @method     FindieWpUsers findOne(PropelPDO $con = null) Return the first FindieWpUsers matching the query
 * @method     FindieWpUsers findOneOrCreate(PropelPDO $con = null) Return the first FindieWpUsers matching the query, or a new FindieWpUsers object populated from the query conditions when no match is found
 *
 * @method     FindieWpUsers findOneById(int $ID) Return the first FindieWpUsers filtered by the ID column
 * @method     FindieWpUsers findOneByUserLogin(string $user_login) Return the first FindieWpUsers filtered by the user_login column
 * @method     FindieWpUsers findOneByUserPass(string $user_pass) Return the first FindieWpUsers filtered by the user_pass column
 * @method     FindieWpUsers findOneByUserNicename(string $user_nicename) Return the first FindieWpUsers filtered by the user_nicename column
 * @method     FindieWpUsers findOneByUserEmail(string $user_email) Return the first FindieWpUsers filtered by the user_email column
 * @method     FindieWpUsers findOneByUserUrl(string $user_url) Return the first FindieWpUsers filtered by the user_url column
 * @method     FindieWpUsers findOneByUserRegistered(string $user_registered) Return the first FindieWpUsers filtered by the user_registered column
 * @method     FindieWpUsers findOneByUserActivationKey(string $user_activation_key) Return the first FindieWpUsers filtered by the user_activation_key column
 * @method     FindieWpUsers findOneByUserStatus(int $user_status) Return the first FindieWpUsers filtered by the user_status column
 * @method     FindieWpUsers findOneByDisplayName(string $display_name) Return the first FindieWpUsers filtered by the display_name column
 *
 * @method     array findById(int $ID) Return FindieWpUsers objects filtered by the ID column
 * @method     array findByUserLogin(string $user_login) Return FindieWpUsers objects filtered by the user_login column
 * @method     array findByUserPass(string $user_pass) Return FindieWpUsers objects filtered by the user_pass column
 * @method     array findByUserNicename(string $user_nicename) Return FindieWpUsers objects filtered by the user_nicename column
 * @method     array findByUserEmail(string $user_email) Return FindieWpUsers objects filtered by the user_email column
 * @method     array findByUserUrl(string $user_url) Return FindieWpUsers objects filtered by the user_url column
 * @method     array findByUserRegistered(string $user_registered) Return FindieWpUsers objects filtered by the user_registered column
 * @method     array findByUserActivationKey(string $user_activation_key) Return FindieWpUsers objects filtered by the user_activation_key column
 * @method     array findByUserStatus(int $user_status) Return FindieWpUsers objects filtered by the user_status column
 * @method     array findByDisplayName(string $display_name) Return FindieWpUsers objects filtered by the display_name column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseFindieWpUsersQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseFindieWpUsersQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'FindieWpUsers', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FindieWpUsersQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FindieWpUsersQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FindieWpUsersQuery) {
			return $criteria;
		}
		$query = new FindieWpUsersQuery();
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
	 * @return    FindieWpUsers|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = FindieWpUsersPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FindieWpUsersPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FindieWpUsersPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the ID column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FindieWpUsersPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the user_login column
	 * 
	 * @param     string $userLogin The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserLogin($userLogin = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userLogin)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userLogin)) {
				$userLogin = str_replace('*', '%', $userLogin);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::USER_LOGIN, $userLogin, $comparison);
	}

	/**
	 * Filter the query on the user_pass column
	 * 
	 * @param     string $userPass The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserPass($userPass = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userPass)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userPass)) {
				$userPass = str_replace('*', '%', $userPass);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::USER_PASS, $userPass, $comparison);
	}

	/**
	 * Filter the query on the user_nicename column
	 * 
	 * @param     string $userNicename The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserNicename($userNicename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userNicename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userNicename)) {
				$userNicename = str_replace('*', '%', $userNicename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::USER_NICENAME, $userNicename, $comparison);
	}

	/**
	 * Filter the query on the user_email column
	 * 
	 * @param     string $userEmail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserEmail($userEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userEmail)) {
				$userEmail = str_replace('*', '%', $userEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::USER_EMAIL, $userEmail, $comparison);
	}

	/**
	 * Filter the query on the user_url column
	 * 
	 * @param     string $userUrl The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserUrl($userUrl = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userUrl)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userUrl)) {
				$userUrl = str_replace('*', '%', $userUrl);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::USER_URL, $userUrl, $comparison);
	}

	/**
	 * Filter the query on the user_registered column
	 * 
	 * @param     string|array $userRegistered The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserRegistered($userRegistered = null, $comparison = null)
	{
		if (is_array($userRegistered)) {
			$useMinMax = false;
			if (isset($userRegistered['min'])) {
				$this->addUsingAlias(FindieWpUsersPeer::USER_REGISTERED, $userRegistered['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userRegistered['max'])) {
				$this->addUsingAlias(FindieWpUsersPeer::USER_REGISTERED, $userRegistered['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::USER_REGISTERED, $userRegistered, $comparison);
	}

	/**
	 * Filter the query on the user_activation_key column
	 * 
	 * @param     string $userActivationKey The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserActivationKey($userActivationKey = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userActivationKey)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userActivationKey)) {
				$userActivationKey = str_replace('*', '%', $userActivationKey);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::USER_ACTIVATION_KEY, $userActivationKey, $comparison);
	}

	/**
	 * Filter the query on the user_status column
	 * 
	 * @param     int|array $userStatus The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserStatus($userStatus = null, $comparison = null)
	{
		if (is_array($userStatus)) {
			$useMinMax = false;
			if (isset($userStatus['min'])) {
				$this->addUsingAlias(FindieWpUsersPeer::USER_STATUS, $userStatus['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userStatus['max'])) {
				$this->addUsingAlias(FindieWpUsersPeer::USER_STATUS, $userStatus['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::USER_STATUS, $userStatus, $comparison);
	}

	/**
	 * Filter the query on the display_name column
	 * 
	 * @param     string $displayName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByDisplayName($displayName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($displayName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $displayName)) {
				$displayName = str_replace('*', '%', $displayName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FindieWpUsersPeer::DISPLAY_NAME, $displayName, $comparison);
	}

	/**
	 * Filter the query by a related UserLinkWp object
	 *
	 * @param     UserLinkWp $userLinkWp  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function filterByUserLinkWp($userLinkWp, $comparison = null)
	{
		return $this
			->addUsingAlias(FindieWpUsersPeer::ID, $userLinkWp->getIdWordpress(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserLinkWp relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function joinUserLinkWp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserLinkWp');
		
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
			$this->addJoinObject($join, 'UserLinkWp');
		}
		
		return $this;
	}

	/**
	 * Use the UserLinkWp relation UserLinkWp object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserLinkWpQuery A secondary query class using the current class as primary query
	 */
	public function useUserLinkWpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserLinkWp($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserLinkWp', 'UserLinkWpQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     FindieWpUsers $findieWpUsers Object to remove from the list of results
	 *
	 * @return    FindieWpUsersQuery The current query, for fluid interface
	 */
	public function prune($findieWpUsers = null)
	{
		if ($findieWpUsers) {
			$this->addUsingAlias(FindieWpUsersPeer::ID, $findieWpUsers->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseFindieWpUsersQuery
