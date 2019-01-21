<?php


/**
 * Base class that represents a query for the 'member' table.
 *
 * 
 *
 * @method     MemberQuery orderByMemberid($order = Criteria::ASC) Order by the MemberId column
 * @method     MemberQuery orderByScreenname($order = Criteria::ASC) Order by the ScreenName column
 *
 * @method     MemberQuery groupByMemberid() Group by the MemberId column
 * @method     MemberQuery groupByScreenname() Group by the ScreenName column
 *
 * @method     MemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Member findOne(PropelPDO $con = null) Return the first Member matching the query
 * @method     Member findOneOrCreate(PropelPDO $con = null) Return the first Member matching the query, or a new Member object populated from the query conditions when no match is found
 *
 * @method     Member findOneByMemberid(int $MemberId) Return the first Member filtered by the MemberId column
 * @method     Member findOneByScreenname(string $ScreenName) Return the first Member filtered by the ScreenName column
 *
 * @method     array findByMemberid(int $MemberId) Return Member objects filtered by the MemberId column
 * @method     array findByScreenname(string $ScreenName) Return Member objects filtered by the ScreenName column
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseMemberQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMemberQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'findierock', $modelName = 'Member', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MemberQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MemberQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MemberQuery) {
			return $criteria;
		}
		$query = new MemberQuery();
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
	 * @return    Member|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MemberPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MemberQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MemberPeer::MEMBERID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MemberQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MemberPeer::MEMBERID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the MemberId column
	 * 
	 * @param     int|array $memberid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberQuery The current query, for fluid interface
	 */
	public function filterByMemberid($memberid = null, $comparison = null)
	{
		if (is_array($memberid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MemberPeer::MEMBERID, $memberid, $comparison);
	}

	/**
	 * Filter the query on the ScreenName column
	 * 
	 * @param     string $screenname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MemberQuery The current query, for fluid interface
	 */
	public function filterByScreenname($screenname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($screenname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $screenname)) {
				$screenname = str_replace('*', '%', $screenname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MemberPeer::SCREENNAME, $screenname, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Member $member Object to remove from the list of results
	 *
	 * @return    MemberQuery The current query, for fluid interface
	 */
	public function prune($member = null)
	{
		if ($member) {
			$this->addUsingAlias(MemberPeer::MEMBERID, $member->getMemberid(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMemberQuery
