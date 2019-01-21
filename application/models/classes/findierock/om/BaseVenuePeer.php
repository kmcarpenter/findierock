<?php


/**
 * Base static class for performing query and update operations on the 'venue' table.
 *
 * 
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseVenuePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'findierock';

	/** the table name for this class */
	const TABLE_NAME = 'venue';

	/** the related Propel class for this table */
	const OM_CLASS = 'Venue';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'findierock.Venue';

	/** the related TableMap class for this table */
	const TM_CLASS = 'VenueTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 20;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the VENUEID field */
	const VENUEID = 'venue.VENUEID';

	/** the column name for the ADDRESS field */
	const ADDRESS = 'venue.ADDRESS';

	/** the column name for the ADDRESS2 field */
	const ADDRESS2 = 'venue.ADDRESS2';

	/** the column name for the CITY field */
	const CITY = 'venue.CITY';

	/** the column name for the PROVINCE field */
	const PROVINCE = 'venue.PROVINCE';

	/** the column name for the COUNTRY field */
	const COUNTRY = 'venue.COUNTRY';

	/** the column name for the LATITUDE field */
	const LATITUDE = 'venue.LATITUDE';

	/** the column name for the LONGITUDE field */
	const LONGITUDE = 'venue.LONGITUDE';

	/** the column name for the PHONE field */
	const PHONE = 'venue.PHONE';

	/** the column name for the NAME field */
	const NAME = 'venue.NAME';

	/** the column name for the DESCRIPTION field */
	const DESCRIPTION = 'venue.DESCRIPTION';

	/** the column name for the WEBSITE field */
	const WEBSITE = 'venue.WEBSITE';

	/** the column name for the TWITTER field */
	const TWITTER = 'venue.TWITTER';

	/** the column name for the FACEBOOK field */
	const FACEBOOK = 'venue.FACEBOOK';

	/** the column name for the RSSFEED field */
	const RSSFEED = 'venue.RSSFEED';

	/** the column name for the CLOSED field */
	const CLOSED = 'venue.CLOSED';

	/** the column name for the LASTFMID field */
	const LASTFMID = 'venue.LASTFMID';

	/** the column name for the SLUG field */
	const SLUG = 'venue.SLUG';

	/** the column name for the HASPHOTOS field */
	const HASPHOTOS = 'venue.HASPHOTOS';

	/** the column name for the SUBMITTEDBYUSER field */
	const SUBMITTEDBYUSER = 'venue.SUBMITTEDBYUSER';

	/**
	 * An identiy map to hold any loaded instances of Venue objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Venue[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Venueid', 'Address', 'Address2', 'City', 'Province', 'Country', 'Latitude', 'Longitude', 'Phone', 'Name', 'Description', 'Website', 'Twitter', 'Facebook', 'Rssfeed', 'Closed', 'Lastfmid', 'Slug', 'Hasphotos', 'Submittedbyuser', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('venueid', 'address', 'address2', 'city', 'province', 'country', 'latitude', 'longitude', 'phone', 'name', 'description', 'website', 'twitter', 'facebook', 'rssfeed', 'closed', 'lastfmid', 'slug', 'hasphotos', 'submittedbyuser', ),
		BasePeer::TYPE_COLNAME => array (self::VENUEID, self::ADDRESS, self::ADDRESS2, self::CITY, self::PROVINCE, self::COUNTRY, self::LATITUDE, self::LONGITUDE, self::PHONE, self::NAME, self::DESCRIPTION, self::WEBSITE, self::TWITTER, self::FACEBOOK, self::RSSFEED, self::CLOSED, self::LASTFMID, self::SLUG, self::HASPHOTOS, self::SUBMITTEDBYUSER, ),
		BasePeer::TYPE_RAW_COLNAME => array ('VENUEID', 'ADDRESS', 'ADDRESS2', 'CITY', 'PROVINCE', 'COUNTRY', 'LATITUDE', 'LONGITUDE', 'PHONE', 'NAME', 'DESCRIPTION', 'WEBSITE', 'TWITTER', 'FACEBOOK', 'RSSFEED', 'CLOSED', 'LASTFMID', 'SLUG', 'HASPHOTOS', 'SUBMITTEDBYUSER', ),
		BasePeer::TYPE_FIELDNAME => array ('VenueId', 'Address', 'Address2', 'City', 'Province', 'Country', 'Latitude', 'Longitude', 'Phone', 'Name', 'Description', 'Website', 'Twitter', 'Facebook', 'RSSFeed', 'Closed', 'lastFmId', 'Slug', 'HasPhotos', 'SubmittedByUser', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Venueid' => 0, 'Address' => 1, 'Address2' => 2, 'City' => 3, 'Province' => 4, 'Country' => 5, 'Latitude' => 6, 'Longitude' => 7, 'Phone' => 8, 'Name' => 9, 'Description' => 10, 'Website' => 11, 'Twitter' => 12, 'Facebook' => 13, 'Rssfeed' => 14, 'Closed' => 15, 'Lastfmid' => 16, 'Slug' => 17, 'Hasphotos' => 18, 'Submittedbyuser' => 19, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('venueid' => 0, 'address' => 1, 'address2' => 2, 'city' => 3, 'province' => 4, 'country' => 5, 'latitude' => 6, 'longitude' => 7, 'phone' => 8, 'name' => 9, 'description' => 10, 'website' => 11, 'twitter' => 12, 'facebook' => 13, 'rssfeed' => 14, 'closed' => 15, 'lastfmid' => 16, 'slug' => 17, 'hasphotos' => 18, 'submittedbyuser' => 19, ),
		BasePeer::TYPE_COLNAME => array (self::VENUEID => 0, self::ADDRESS => 1, self::ADDRESS2 => 2, self::CITY => 3, self::PROVINCE => 4, self::COUNTRY => 5, self::LATITUDE => 6, self::LONGITUDE => 7, self::PHONE => 8, self::NAME => 9, self::DESCRIPTION => 10, self::WEBSITE => 11, self::TWITTER => 12, self::FACEBOOK => 13, self::RSSFEED => 14, self::CLOSED => 15, self::LASTFMID => 16, self::SLUG => 17, self::HASPHOTOS => 18, self::SUBMITTEDBYUSER => 19, ),
		BasePeer::TYPE_RAW_COLNAME => array ('VENUEID' => 0, 'ADDRESS' => 1, 'ADDRESS2' => 2, 'CITY' => 3, 'PROVINCE' => 4, 'COUNTRY' => 5, 'LATITUDE' => 6, 'LONGITUDE' => 7, 'PHONE' => 8, 'NAME' => 9, 'DESCRIPTION' => 10, 'WEBSITE' => 11, 'TWITTER' => 12, 'FACEBOOK' => 13, 'RSSFEED' => 14, 'CLOSED' => 15, 'LASTFMID' => 16, 'SLUG' => 17, 'HASPHOTOS' => 18, 'SUBMITTEDBYUSER' => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('VenueId' => 0, 'Address' => 1, 'Address2' => 2, 'City' => 3, 'Province' => 4, 'Country' => 5, 'Latitude' => 6, 'Longitude' => 7, 'Phone' => 8, 'Name' => 9, 'Description' => 10, 'Website' => 11, 'Twitter' => 12, 'Facebook' => 13, 'RSSFeed' => 14, 'Closed' => 15, 'lastFmId' => 16, 'Slug' => 17, 'HasPhotos' => 18, 'SubmittedByUser' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. VenuePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(VenuePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(VenuePeer::VENUEID);
			$criteria->addSelectColumn(VenuePeer::ADDRESS);
			$criteria->addSelectColumn(VenuePeer::ADDRESS2);
			$criteria->addSelectColumn(VenuePeer::CITY);
			$criteria->addSelectColumn(VenuePeer::PROVINCE);
			$criteria->addSelectColumn(VenuePeer::COUNTRY);
			$criteria->addSelectColumn(VenuePeer::LATITUDE);
			$criteria->addSelectColumn(VenuePeer::LONGITUDE);
			$criteria->addSelectColumn(VenuePeer::PHONE);
			$criteria->addSelectColumn(VenuePeer::NAME);
			$criteria->addSelectColumn(VenuePeer::DESCRIPTION);
			$criteria->addSelectColumn(VenuePeer::WEBSITE);
			$criteria->addSelectColumn(VenuePeer::TWITTER);
			$criteria->addSelectColumn(VenuePeer::FACEBOOK);
			$criteria->addSelectColumn(VenuePeer::RSSFEED);
			$criteria->addSelectColumn(VenuePeer::CLOSED);
			$criteria->addSelectColumn(VenuePeer::LASTFMID);
			$criteria->addSelectColumn(VenuePeer::SLUG);
			$criteria->addSelectColumn(VenuePeer::HASPHOTOS);
			$criteria->addSelectColumn(VenuePeer::SUBMITTEDBYUSER);
		} else {
			$criteria->addSelectColumn($alias . '.VENUEID');
			$criteria->addSelectColumn($alias . '.ADDRESS');
			$criteria->addSelectColumn($alias . '.ADDRESS2');
			$criteria->addSelectColumn($alias . '.CITY');
			$criteria->addSelectColumn($alias . '.PROVINCE');
			$criteria->addSelectColumn($alias . '.COUNTRY');
			$criteria->addSelectColumn($alias . '.LATITUDE');
			$criteria->addSelectColumn($alias . '.LONGITUDE');
			$criteria->addSelectColumn($alias . '.PHONE');
			$criteria->addSelectColumn($alias . '.NAME');
			$criteria->addSelectColumn($alias . '.DESCRIPTION');
			$criteria->addSelectColumn($alias . '.WEBSITE');
			$criteria->addSelectColumn($alias . '.TWITTER');
			$criteria->addSelectColumn($alias . '.FACEBOOK');
			$criteria->addSelectColumn($alias . '.RSSFEED');
			$criteria->addSelectColumn($alias . '.CLOSED');
			$criteria->addSelectColumn($alias . '.LASTFMID');
			$criteria->addSelectColumn($alias . '.SLUG');
			$criteria->addSelectColumn($alias . '.HASPHOTOS');
			$criteria->addSelectColumn($alias . '.SUBMITTEDBYUSER');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(VenuePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			VenuePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     Venue
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = VenuePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return VenuePeer::populateObjects(VenuePeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			VenuePeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      Venue $value A Venue object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Venue $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getVenueid();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A Venue object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Venue) {
				$key = (string) $value->getVenueid();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Venue object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     Venue Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to venue
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = VenuePeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = VenuePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = VenuePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				VenuePeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (Venue object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = VenuePeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = VenuePeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + VenuePeer::NUM_COLUMNS;
		} else {
			$cls = VenuePeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			VenuePeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related User table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUser(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(VenuePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			VenuePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(VenuePeer::SUBMITTEDBYUSER, UserPeer::USERID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of Venue objects pre-filled with their User objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Venue objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUser(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		VenuePeer::addSelectColumns($criteria);
		$startcol = (VenuePeer::NUM_COLUMNS - VenuePeer::NUM_LAZY_LOAD_COLUMNS);
		UserPeer::addSelectColumns($criteria);

		$criteria->addJoin(VenuePeer::SUBMITTEDBYUSER, UserPeer::USERID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = VenuePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = VenuePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = VenuePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				VenuePeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UserPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					UserPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Venue) to $obj2 (User)
				$obj2->addVenue($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(VenuePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			VenuePeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(VenuePeer::SUBMITTEDBYUSER, UserPeer::USERID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of Venue objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Venue objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		VenuePeer::addSelectColumns($criteria);
		$startcol2 = (VenuePeer::NUM_COLUMNS - VenuePeer::NUM_LAZY_LOAD_COLUMNS);

		UserPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(VenuePeer::SUBMITTEDBYUSER, UserPeer::USERID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = VenuePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = VenuePeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = VenuePeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				VenuePeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined User rows

			$key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = UserPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UserPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UserPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Venue) to the collection in $obj2 (User)
				$obj2->addVenue($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseVenuePeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseVenuePeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new VenueTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? VenuePeer::CLASS_DEFAULT : VenuePeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Venue or Criteria object.
	 *
	 * @param      mixed $values Criteria or Venue object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Venue object
		}

		if ($criteria->containsKey(VenuePeer::VENUEID) && $criteria->keyContainsValue(VenuePeer::VENUEID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.VenuePeer::VENUEID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a Venue or Criteria object.
	 *
	 * @param      mixed $values Criteria or Venue object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(VenuePeer::VENUEID);
			$value = $criteria->remove(VenuePeer::VENUEID);
			if ($value) {
				$selectCriteria->add(VenuePeer::VENUEID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(VenuePeer::TABLE_NAME);
			}

		} else { // $values is Venue object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the venue table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(VenuePeer::TABLE_NAME, $con, VenuePeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			VenuePeer::clearInstancePool();
			VenuePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Venue or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Venue object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			VenuePeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Venue) { // it's a model object
			// invalidate the cache for this single object
			VenuePeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(VenuePeer::VENUEID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				VenuePeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			VenuePeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Venue object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Venue $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Venue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(VenuePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(VenuePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(VenuePeer::DATABASE_NAME, VenuePeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Venue
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = VenuePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(VenuePeer::DATABASE_NAME);
		$criteria->add(VenuePeer::VENUEID, $pk);

		$v = VenuePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(VenuePeer::DATABASE_NAME);
			$criteria->add(VenuePeer::VENUEID, $pks, Criteria::IN);
			$objs = VenuePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseVenuePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseVenuePeer::buildTableMap();

