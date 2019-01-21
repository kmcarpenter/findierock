<?php


/**
 * Base class that represents a row from the 'venue' table.
 *
 * 
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseVenue extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'VenuePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        VenuePeer
	 */
	protected static $peer;

	/**
	 * The value for the venueid field.
	 * @var        int
	 */
	protected $venueid;

	/**
	 * The value for the address field.
	 * @var        string
	 */
	protected $address;

	/**
	 * The value for the address2 field.
	 * @var        string
	 */
	protected $address2;

	/**
	 * The value for the city field.
	 * @var        string
	 */
	protected $city;

	/**
	 * The value for the province field.
	 * @var        string
	 */
	protected $province;

	/**
	 * The value for the country field.
	 * @var        string
	 */
	protected $country;

	/**
	 * The value for the latitude field.
	 * @var        double
	 */
	protected $latitude;

	/**
	 * The value for the longitude field.
	 * @var        double
	 */
	protected $longitude;

	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the website field.
	 * @var        string
	 */
	protected $website;

	/**
	 * The value for the twitter field.
	 * @var        string
	 */
	protected $twitter;

	/**
	 * The value for the facebook field.
	 * @var        string
	 */
	protected $facebook;

	/**
	 * The value for the rssfeed field.
	 * @var        string
	 */
	protected $rssfeed;

	/**
	 * The value for the closed field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $closed;

	/**
	 * The value for the lastfmid field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $lastfmid;

	/**
	 * The value for the slug field.
	 * @var        string
	 */
	protected $slug;

	/**
	 * The value for the hasphotos field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $hasphotos;

	/**
	 * The value for the submittedbyuser field.
	 * @var        int
	 */
	protected $submittedbyuser;

	/**
	 * @var        User
	 */
	protected $aUser;

	/**
	 * @var        array Event[] Collection to store aggregation of Event objects.
	 */
	protected $collEvents;

	/**
	 * @var        array Venuerating[] Collection to store aggregation of Venuerating objects.
	 */
	protected $collVenueratings;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->closed = 0;
		$this->lastfmid = 0;
		$this->hasphotos = 0;
	}

	/**
	 * Initializes internal state of BaseVenue object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [venueid] column value.
	 * 
	 * @return     int
	 */
	public function getVenueid()
	{
		return $this->venueid;
	}

	/**
	 * Get the [address] column value.
	 * 
	 * @return     string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the [address2] column value.
	 * 
	 * @return     string
	 */
	public function getAddress2()
	{
		return $this->address2;
	}

	/**
	 * Get the [city] column value.
	 * 
	 * @return     string
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Get the [province] column value.
	 * 
	 * @return     string
	 */
	public function getProvince()
	{
		return $this->province;
	}

	/**
	 * Get the [country] column value.
	 * 
	 * @return     string
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * Get the [latitude] column value.
	 * 
	 * @return     double
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Get the [longitude] column value.
	 * 
	 * @return     double
	 */
	public function getLongitude()
	{
		return $this->longitude;
	}

	/**
	 * Get the [phone] column value.
	 * 
	 * @return     string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [website] column value.
	 * 
	 * @return     string
	 */
	public function getWebsite()
	{
		return $this->website;
	}

	/**
	 * Get the [twitter] column value.
	 * 
	 * @return     string
	 */
	public function getTwitter()
	{
		return $this->twitter;
	}

	/**
	 * Get the [facebook] column value.
	 * 
	 * @return     string
	 */
	public function getFacebook()
	{
		return $this->facebook;
	}

	/**
	 * Get the [rssfeed] column value.
	 * 
	 * @return     string
	 */
	public function getRssfeed()
	{
		return $this->rssfeed;
	}

	/**
	 * Get the [closed] column value.
	 * 
	 * @return     int
	 */
	public function getClosed()
	{
		return $this->closed;
	}

	/**
	 * Get the [lastfmid] column value.
	 * 
	 * @return     int
	 */
	public function getLastfmid()
	{
		return $this->lastfmid;
	}

	/**
	 * Get the [slug] column value.
	 * 
	 * @return     string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * Get the [hasphotos] column value.
	 * 
	 * @return     int
	 */
	public function getHasphotos()
	{
		return $this->hasphotos;
	}

	/**
	 * Get the [submittedbyuser] column value.
	 * 
	 * @return     int
	 */
	public function getSubmittedbyuser()
	{
		return $this->submittedbyuser;
	}

	/**
	 * Set the value of [venueid] column.
	 * 
	 * @param      int $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setVenueid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->venueid !== $v) {
			$this->venueid = $v;
			$this->modifiedColumns[] = VenuePeer::VENUEID;
		}

		return $this;
	} // setVenueid()

	/**
	 * Set the value of [address] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = VenuePeer::ADDRESS;
		}

		return $this;
	} // setAddress()

	/**
	 * Set the value of [address2] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setAddress2($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address2 !== $v) {
			$this->address2 = $v;
			$this->modifiedColumns[] = VenuePeer::ADDRESS2;
		}

		return $this;
	} // setAddress2()

	/**
	 * Set the value of [city] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setCity($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = VenuePeer::CITY;
		}

		return $this;
	} // setCity()

	/**
	 * Set the value of [province] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setProvince($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->province !== $v) {
			$this->province = $v;
			$this->modifiedColumns[] = VenuePeer::PROVINCE;
		}

		return $this;
	} // setProvince()

	/**
	 * Set the value of [country] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setCountry($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = VenuePeer::COUNTRY;
		}

		return $this;
	} // setCountry()

	/**
	 * Set the value of [latitude] column.
	 * 
	 * @param      double $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setLatitude($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->latitude !== $v) {
			$this->latitude = $v;
			$this->modifiedColumns[] = VenuePeer::LATITUDE;
		}

		return $this;
	} // setLatitude()

	/**
	 * Set the value of [longitude] column.
	 * 
	 * @param      double $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setLongitude($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->longitude !== $v) {
			$this->longitude = $v;
			$this->modifiedColumns[] = VenuePeer::LONGITUDE;
		}

		return $this;
	} // setLongitude()

	/**
	 * Set the value of [phone] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = VenuePeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = VenuePeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = VenuePeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [website] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setWebsite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->website !== $v) {
			$this->website = $v;
			$this->modifiedColumns[] = VenuePeer::WEBSITE;
		}

		return $this;
	} // setWebsite()

	/**
	 * Set the value of [twitter] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setTwitter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->twitter !== $v) {
			$this->twitter = $v;
			$this->modifiedColumns[] = VenuePeer::TWITTER;
		}

		return $this;
	} // setTwitter()

	/**
	 * Set the value of [facebook] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setFacebook($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->facebook !== $v) {
			$this->facebook = $v;
			$this->modifiedColumns[] = VenuePeer::FACEBOOK;
		}

		return $this;
	} // setFacebook()

	/**
	 * Set the value of [rssfeed] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setRssfeed($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rssfeed !== $v) {
			$this->rssfeed = $v;
			$this->modifiedColumns[] = VenuePeer::RSSFEED;
		}

		return $this;
	} // setRssfeed()

	/**
	 * Set the value of [closed] column.
	 * 
	 * @param      int $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setClosed($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->closed !== $v || $this->isNew()) {
			$this->closed = $v;
			$this->modifiedColumns[] = VenuePeer::CLOSED;
		}

		return $this;
	} // setClosed()

	/**
	 * Set the value of [lastfmid] column.
	 * 
	 * @param      int $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setLastfmid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->lastfmid !== $v || $this->isNew()) {
			$this->lastfmid = $v;
			$this->modifiedColumns[] = VenuePeer::LASTFMID;
		}

		return $this;
	} // setLastfmid()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = VenuePeer::SLUG;
		}

		return $this;
	} // setSlug()

	/**
	 * Set the value of [hasphotos] column.
	 * 
	 * @param      int $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setHasphotos($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->hasphotos !== $v || $this->isNew()) {
			$this->hasphotos = $v;
			$this->modifiedColumns[] = VenuePeer::HASPHOTOS;
		}

		return $this;
	} // setHasphotos()

	/**
	 * Set the value of [submittedbyuser] column.
	 * 
	 * @param      int $v new value
	 * @return     Venue The current object (for fluent API support)
	 */
	public function setSubmittedbyuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->submittedbyuser !== $v) {
			$this->submittedbyuser = $v;
			$this->modifiedColumns[] = VenuePeer::SUBMITTEDBYUSER;
		}

		if ($this->aUser !== null && $this->aUser->getUserid() !== $v) {
			$this->aUser = null;
		}

		return $this;
	} // setSubmittedbyuser()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->closed !== 0) {
				return false;
			}

			if ($this->lastfmid !== 0) {
				return false;
			}

			if ($this->hasphotos !== 0) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->venueid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->address = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->address2 = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->city = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->province = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->country = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->latitude = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->longitude = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->phone = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->name = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->description = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->website = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->twitter = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->facebook = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->rssfeed = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->closed = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->lastfmid = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->slug = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->hasphotos = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
			$this->submittedbyuser = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 20; // 20 = VenuePeer::NUM_COLUMNS - VenuePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Venue object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aUser !== null && $this->submittedbyuser !== $this->aUser->getUserid()) {
			$this->aUser = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = VenuePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUser = null;
			$this->collEvents = null;

			$this->collVenueratings = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				VenueQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(VenuePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				VenuePeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUser !== null) {
				if ($this->aUser->isModified() || $this->aUser->isNew()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = VenuePeer::VENUEID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(VenuePeer::VENUEID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.VenuePeer::VENUEID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setVenueid($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += VenuePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collEvents !== null) {
				foreach ($this->collEvents as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collVenueratings !== null) {
				foreach ($this->collVenueratings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}


			if (($retval = VenuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEvents !== null) {
					foreach ($this->collEvents as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collVenueratings !== null) {
					foreach ($this->collVenueratings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VenuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getVenueid();
				break;
			case 1:
				return $this->getAddress();
				break;
			case 2:
				return $this->getAddress2();
				break;
			case 3:
				return $this->getCity();
				break;
			case 4:
				return $this->getProvince();
				break;
			case 5:
				return $this->getCountry();
				break;
			case 6:
				return $this->getLatitude();
				break;
			case 7:
				return $this->getLongitude();
				break;
			case 8:
				return $this->getPhone();
				break;
			case 9:
				return $this->getName();
				break;
			case 10:
				return $this->getDescription();
				break;
			case 11:
				return $this->getWebsite();
				break;
			case 12:
				return $this->getTwitter();
				break;
			case 13:
				return $this->getFacebook();
				break;
			case 14:
				return $this->getRssfeed();
				break;
			case 15:
				return $this->getClosed();
				break;
			case 16:
				return $this->getLastfmid();
				break;
			case 17:
				return $this->getSlug();
				break;
			case 18:
				return $this->getHasphotos();
				break;
			case 19:
				return $this->getSubmittedbyuser();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. 
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = VenuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getVenueid(),
			$keys[1] => $this->getAddress(),
			$keys[2] => $this->getAddress2(),
			$keys[3] => $this->getCity(),
			$keys[4] => $this->getProvince(),
			$keys[5] => $this->getCountry(),
			$keys[6] => $this->getLatitude(),
			$keys[7] => $this->getLongitude(),
			$keys[8] => $this->getPhone(),
			$keys[9] => $this->getName(),
			$keys[10] => $this->getDescription(),
			$keys[11] => $this->getWebsite(),
			$keys[12] => $this->getTwitter(),
			$keys[13] => $this->getFacebook(),
			$keys[14] => $this->getRssfeed(),
			$keys[15] => $this->getClosed(),
			$keys[16] => $this->getLastfmid(),
			$keys[17] => $this->getSlug(),
			$keys[18] => $this->getHasphotos(),
			$keys[19] => $this->getSubmittedbyuser(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUser) {
				$result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VenuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setVenueid($value);
				break;
			case 1:
				$this->setAddress($value);
				break;
			case 2:
				$this->setAddress2($value);
				break;
			case 3:
				$this->setCity($value);
				break;
			case 4:
				$this->setProvince($value);
				break;
			case 5:
				$this->setCountry($value);
				break;
			case 6:
				$this->setLatitude($value);
				break;
			case 7:
				$this->setLongitude($value);
				break;
			case 8:
				$this->setPhone($value);
				break;
			case 9:
				$this->setName($value);
				break;
			case 10:
				$this->setDescription($value);
				break;
			case 11:
				$this->setWebsite($value);
				break;
			case 12:
				$this->setTwitter($value);
				break;
			case 13:
				$this->setFacebook($value);
				break;
			case 14:
				$this->setRssfeed($value);
				break;
			case 15:
				$this->setClosed($value);
				break;
			case 16:
				$this->setLastfmid($value);
				break;
			case 17:
				$this->setSlug($value);
				break;
			case 18:
				$this->setHasphotos($value);
				break;
			case 19:
				$this->setSubmittedbyuser($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VenuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setVenueid($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAddress($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAddress2($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCity($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setProvince($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCountry($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLatitude($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLongitude($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPhone($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setName($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDescription($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setWebsite($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTwitter($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFacebook($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRssfeed($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setClosed($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setLastfmid($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSlug($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setHasphotos($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setSubmittedbyuser($arr[$keys[19]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(VenuePeer::DATABASE_NAME);

		if ($this->isColumnModified(VenuePeer::VENUEID)) $criteria->add(VenuePeer::VENUEID, $this->venueid);
		if ($this->isColumnModified(VenuePeer::ADDRESS)) $criteria->add(VenuePeer::ADDRESS, $this->address);
		if ($this->isColumnModified(VenuePeer::ADDRESS2)) $criteria->add(VenuePeer::ADDRESS2, $this->address2);
		if ($this->isColumnModified(VenuePeer::CITY)) $criteria->add(VenuePeer::CITY, $this->city);
		if ($this->isColumnModified(VenuePeer::PROVINCE)) $criteria->add(VenuePeer::PROVINCE, $this->province);
		if ($this->isColumnModified(VenuePeer::COUNTRY)) $criteria->add(VenuePeer::COUNTRY, $this->country);
		if ($this->isColumnModified(VenuePeer::LATITUDE)) $criteria->add(VenuePeer::LATITUDE, $this->latitude);
		if ($this->isColumnModified(VenuePeer::LONGITUDE)) $criteria->add(VenuePeer::LONGITUDE, $this->longitude);
		if ($this->isColumnModified(VenuePeer::PHONE)) $criteria->add(VenuePeer::PHONE, $this->phone);
		if ($this->isColumnModified(VenuePeer::NAME)) $criteria->add(VenuePeer::NAME, $this->name);
		if ($this->isColumnModified(VenuePeer::DESCRIPTION)) $criteria->add(VenuePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(VenuePeer::WEBSITE)) $criteria->add(VenuePeer::WEBSITE, $this->website);
		if ($this->isColumnModified(VenuePeer::TWITTER)) $criteria->add(VenuePeer::TWITTER, $this->twitter);
		if ($this->isColumnModified(VenuePeer::FACEBOOK)) $criteria->add(VenuePeer::FACEBOOK, $this->facebook);
		if ($this->isColumnModified(VenuePeer::RSSFEED)) $criteria->add(VenuePeer::RSSFEED, $this->rssfeed);
		if ($this->isColumnModified(VenuePeer::CLOSED)) $criteria->add(VenuePeer::CLOSED, $this->closed);
		if ($this->isColumnModified(VenuePeer::LASTFMID)) $criteria->add(VenuePeer::LASTFMID, $this->lastfmid);
		if ($this->isColumnModified(VenuePeer::SLUG)) $criteria->add(VenuePeer::SLUG, $this->slug);
		if ($this->isColumnModified(VenuePeer::HASPHOTOS)) $criteria->add(VenuePeer::HASPHOTOS, $this->hasphotos);
		if ($this->isColumnModified(VenuePeer::SUBMITTEDBYUSER)) $criteria->add(VenuePeer::SUBMITTEDBYUSER, $this->submittedbyuser);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(VenuePeer::DATABASE_NAME);
		$criteria->add(VenuePeer::VENUEID, $this->venueid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getVenueid();
	}

	/**
	 * Generic method to set the primary key (venueid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setVenueid($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getVenueid();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Venue (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setAddress($this->address);
		$copyObj->setAddress2($this->address2);
		$copyObj->setCity($this->city);
		$copyObj->setProvince($this->province);
		$copyObj->setCountry($this->country);
		$copyObj->setLatitude($this->latitude);
		$copyObj->setLongitude($this->longitude);
		$copyObj->setPhone($this->phone);
		$copyObj->setName($this->name);
		$copyObj->setDescription($this->description);
		$copyObj->setWebsite($this->website);
		$copyObj->setTwitter($this->twitter);
		$copyObj->setFacebook($this->facebook);
		$copyObj->setRssfeed($this->rssfeed);
		$copyObj->setClosed($this->closed);
		$copyObj->setLastfmid($this->lastfmid);
		$copyObj->setSlug($this->slug);
		$copyObj->setHasphotos($this->hasphotos);
		$copyObj->setSubmittedbyuser($this->submittedbyuser);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getEvents() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEvent($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getVenueratings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addVenuerating($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setVenueid(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Venue Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     VenuePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new VenuePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     Venue The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUser(User $v = null)
	{
		if ($v === null) {
			$this->setSubmittedbyuser(NULL);
		} else {
			$this->setSubmittedbyuser($v->getUserid());
		}

		$this->aUser = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addVenue($this);
		}

		return $this;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUser(PropelPDO $con = null)
	{
		if ($this->aUser === null && ($this->submittedbyuser !== null)) {
			$this->aUser = UserQuery::create()->findPk($this->submittedbyuser, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUser->addVenues($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Clears out the collEvents collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEvents()
	 */
	public function clearEvents()
	{
		$this->collEvents = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEvents collection.
	 *
	 * By default this just sets the collEvents collection to an empty array (like clearcollEvents());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initEvents()
	{
		$this->collEvents = new PropelObjectCollection();
		$this->collEvents->setModel('Event');
	}

	/**
	 * Gets an array of Event objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Venue is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Event[] List of Event objects
	 * @throws     PropelException
	 */
	public function getEvents($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEvents || null !== $criteria) {
			if ($this->isNew() && null === $this->collEvents) {
				// return empty collection
				$this->initEvents();
			} else {
				$collEvents = EventQuery::create(null, $criteria)
					->filterByVenue($this)
					->find($con);
				if (null !== $criteria) {
					return $collEvents;
				}
				$this->collEvents = $collEvents;
			}
		}
		return $this->collEvents;
	}

	/**
	 * Returns the number of related Event objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Event objects.
	 * @throws     PropelException
	 */
	public function countEvents(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEvents || null !== $criteria) {
			if ($this->isNew() && null === $this->collEvents) {
				return 0;
			} else {
				$query = EventQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByVenue($this)
					->count($con);
			}
		} else {
			return count($this->collEvents);
		}
	}

	/**
	 * Method called to associate a Event object to this object
	 * through the Event foreign key attribute.
	 *
	 * @param      Event $l Event
	 * @return     void
	 * @throws     PropelException
	 */
	public function addEvent(Event $l)
	{
		if ($this->collEvents === null) {
			$this->initEvents();
		}
		if (!$this->collEvents->contains($l)) { // only add it if the **same** object is not already associated
			$this->collEvents[]= $l;
			$l->setVenue($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Venue is new, it will return
	 * an empty collection; or if this Venue has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Venue.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Event[] List of Event objects
	 */
	public function getEventsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getEvents($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Venue is new, it will return
	 * an empty collection; or if this Venue has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Venue.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Event[] List of Event objects
	 */
	public function getEventsJoinEventtype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventQuery::create(null, $criteria);
		$query->joinWith('Eventtype', $join_behavior);

		return $this->getEvents($query, $con);
	}

	/**
	 * Clears out the collVenueratings collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addVenueratings()
	 */
	public function clearVenueratings()
	{
		$this->collVenueratings = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collVenueratings collection.
	 *
	 * By default this just sets the collVenueratings collection to an empty array (like clearcollVenueratings());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initVenueratings()
	{
		$this->collVenueratings = new PropelObjectCollection();
		$this->collVenueratings->setModel('Venuerating');
	}

	/**
	 * Gets an array of Venuerating objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Venue is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Venuerating[] List of Venuerating objects
	 * @throws     PropelException
	 */
	public function getVenueratings($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collVenueratings || null !== $criteria) {
			if ($this->isNew() && null === $this->collVenueratings) {
				// return empty collection
				$this->initVenueratings();
			} else {
				$collVenueratings = VenueratingQuery::create(null, $criteria)
					->filterByVenue($this)
					->find($con);
				if (null !== $criteria) {
					return $collVenueratings;
				}
				$this->collVenueratings = $collVenueratings;
			}
		}
		return $this->collVenueratings;
	}

	/**
	 * Returns the number of related Venuerating objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Venuerating objects.
	 * @throws     PropelException
	 */
	public function countVenueratings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collVenueratings || null !== $criteria) {
			if ($this->isNew() && null === $this->collVenueratings) {
				return 0;
			} else {
				$query = VenueratingQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByVenue($this)
					->count($con);
			}
		} else {
			return count($this->collVenueratings);
		}
	}

	/**
	 * Method called to associate a Venuerating object to this object
	 * through the Venuerating foreign key attribute.
	 *
	 * @param      Venuerating $l Venuerating
	 * @return     void
	 * @throws     PropelException
	 */
	public function addVenuerating(Venuerating $l)
	{
		if ($this->collVenueratings === null) {
			$this->initVenueratings();
		}
		if (!$this->collVenueratings->contains($l)) { // only add it if the **same** object is not already associated
			$this->collVenueratings[]= $l;
			$l->setVenue($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Venue is new, it will return
	 * an empty collection; or if this Venue has previously
	 * been saved, it will retrieve related Venueratings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Venue.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Venuerating[] List of Venuerating objects
	 */
	public function getVenueratingsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = VenueratingQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getVenueratings($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->venueid = null;
		$this->address = null;
		$this->address2 = null;
		$this->city = null;
		$this->province = null;
		$this->country = null;
		$this->latitude = null;
		$this->longitude = null;
		$this->phone = null;
		$this->name = null;
		$this->description = null;
		$this->website = null;
		$this->twitter = null;
		$this->facebook = null;
		$this->rssfeed = null;
		$this->closed = null;
		$this->lastfmid = null;
		$this->slug = null;
		$this->hasphotos = null;
		$this->submittedbyuser = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collEvents) {
				foreach ((array) $this->collEvents as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collVenueratings) {
				foreach ((array) $this->collVenueratings as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collEvents = null;
		$this->collVenueratings = null;
		$this->aUser = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseVenue
