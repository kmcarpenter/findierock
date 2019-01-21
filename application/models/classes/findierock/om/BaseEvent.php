<?php


/**
 * Base class that represents a row from the 'event' table.
 *
 * 
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseEvent extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'EventPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        EventPeer
	 */
	protected static $peer;

	/**
	 * The value for the eventid field.
	 * @var        int
	 */
	protected $eventid;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the start field.
	 * @var        string
	 */
	protected $start;

	/**
	 * The value for the finish field.
	 * @var        string
	 */
	protected $finish;

	/**
	 * The value for the cover field.
	 * @var        string
	 */
	protected $cover;

	/**
	 * The value for the ageofmajority field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $ageofmajority;

	/**
	 * The value for the eventtypeid field.
	 * @var        int
	 */
	protected $eventtypeid;

	/**
	 * The value for the lastfmid field.
	 * @var        int
	 */
	protected $lastfmid;

	/**
	 * The value for the venueid field.
	 * @var        int
	 */
	protected $venueid;

	/**
	 * The value for the cancelled field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $cancelled;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the slug field.
	 * @var        string
	 */
	protected $slug;

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
	 * @var        Eventtype
	 */
	protected $aEventtype;

	/**
	 * @var        Venue
	 */
	protected $aVenue;

	/**
	 * @var        array Eventartist[] Collection to store aggregation of Eventartist objects.
	 */
	protected $collEventartists;

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
		$this->ageofmajority = 1;
		$this->cancelled = 0;
	}

	/**
	 * Initializes internal state of BaseEvent object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [eventid] column value.
	 * 
	 * @return     int
	 */
	public function getEventid()
	{
		return $this->eventid;
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
	 * Get the [optionally formatted] temporal [start] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getStart($format = 'Y-m-d H:i:s')
	{
		if ($this->start === null) {
			return null;
		}


		if ($this->start === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->start);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->start, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [finish] column value.
	 * 
	 * @return     string
	 */
	public function getFinish()
	{
		return $this->finish;
	}

	/**
	 * Get the [cover] column value.
	 * 
	 * @return     string
	 */
	public function getCover()
	{
		return $this->cover;
	}

	/**
	 * Get the [ageofmajority] column value.
	 * 
	 * @return     int
	 */
	public function getAgeofmajority()
	{
		return $this->ageofmajority;
	}

	/**
	 * Get the [eventtypeid] column value.
	 * 
	 * @return     int
	 */
	public function getEventtypeid()
	{
		return $this->eventtypeid;
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
	 * Get the [venueid] column value.
	 * 
	 * @return     int
	 */
	public function getVenueid()
	{
		return $this->venueid;
	}

	/**
	 * Get the [cancelled] column value.
	 * 
	 * @return     int
	 */
	public function getCancelled()
	{
		return $this->cancelled;
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
	 * Get the [slug] column value.
	 * 
	 * @return     string
	 */
	public function getSlug()
	{
		return $this->slug;
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
	 * Set the value of [eventid] column.
	 * 
	 * @param      int $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setEventid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->eventid !== $v) {
			$this->eventid = $v;
			$this->modifiedColumns[] = EventPeer::EVENTID;
		}

		return $this;
	} // setEventid()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = EventPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Sets the value of [start] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Event The current object (for fluent API support)
	 */
	public function setStart($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->start !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->start !== null && $tmpDt = new DateTime($this->start)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->start = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = EventPeer::START;
			}
		} // if either are not null

		return $this;
	} // setStart()

	/**
	 * Set the value of [finish] column.
	 * 
	 * @param      string $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setFinish($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->finish !== $v) {
			$this->finish = $v;
			$this->modifiedColumns[] = EventPeer::FINISH;
		}

		return $this;
	} // setFinish()

	/**
	 * Set the value of [cover] column.
	 * 
	 * @param      string $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setCover($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cover !== $v) {
			$this->cover = $v;
			$this->modifiedColumns[] = EventPeer::COVER;
		}

		return $this;
	} // setCover()

	/**
	 * Set the value of [ageofmajority] column.
	 * 
	 * @param      int $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setAgeofmajority($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ageofmajority !== $v || $this->isNew()) {
			$this->ageofmajority = $v;
			$this->modifiedColumns[] = EventPeer::AGEOFMAJORITY;
		}

		return $this;
	} // setAgeofmajority()

	/**
	 * Set the value of [eventtypeid] column.
	 * 
	 * @param      int $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setEventtypeid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->eventtypeid !== $v) {
			$this->eventtypeid = $v;
			$this->modifiedColumns[] = EventPeer::EVENTTYPEID;
		}

		if ($this->aEventtype !== null && $this->aEventtype->getEventtypeid() !== $v) {
			$this->aEventtype = null;
		}

		return $this;
	} // setEventtypeid()

	/**
	 * Set the value of [lastfmid] column.
	 * 
	 * @param      int $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setLastfmid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->lastfmid !== $v) {
			$this->lastfmid = $v;
			$this->modifiedColumns[] = EventPeer::LASTFMID;
		}

		return $this;
	} // setLastfmid()

	/**
	 * Set the value of [venueid] column.
	 * 
	 * @param      int $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setVenueid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->venueid !== $v) {
			$this->venueid = $v;
			$this->modifiedColumns[] = EventPeer::VENUEID;
		}

		if ($this->aVenue !== null && $this->aVenue->getVenueid() !== $v) {
			$this->aVenue = null;
		}

		return $this;
	} // setVenueid()

	/**
	 * Set the value of [cancelled] column.
	 * 
	 * @param      int $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setCancelled($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cancelled !== $v || $this->isNew()) {
			$this->cancelled = $v;
			$this->modifiedColumns[] = EventPeer::CANCELLED;
		}

		return $this;
	} // setCancelled()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = EventPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = EventPeer::SLUG;
		}

		return $this;
	} // setSlug()

	/**
	 * Set the value of [submittedbyuser] column.
	 * 
	 * @param      int $v new value
	 * @return     Event The current object (for fluent API support)
	 */
	public function setSubmittedbyuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->submittedbyuser !== $v) {
			$this->submittedbyuser = $v;
			$this->modifiedColumns[] = EventPeer::SUBMITTEDBYUSER;
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
			if ($this->ageofmajority !== 1) {
				return false;
			}

			if ($this->cancelled !== 0) {
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

			$this->eventid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->start = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->finish = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->cover = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->ageofmajority = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->eventtypeid = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->lastfmid = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->venueid = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->cancelled = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->description = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->slug = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->submittedbyuser = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Event object", $e);
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

		if ($this->aEventtype !== null && $this->eventtypeid !== $this->aEventtype->getEventtypeid()) {
			$this->aEventtype = null;
		}
		if ($this->aVenue !== null && $this->venueid !== $this->aVenue->getVenueid()) {
			$this->aVenue = null;
		}
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
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = EventPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUser = null;
			$this->aEventtype = null;
			$this->aVenue = null;
			$this->collEventartists = null;

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
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				EventQuery::create()
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
			$con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				EventPeer::addInstanceToPool($this);
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

			if ($this->aEventtype !== null) {
				if ($this->aEventtype->isModified() || $this->aEventtype->isNew()) {
					$affectedRows += $this->aEventtype->save($con);
				}
				$this->setEventtype($this->aEventtype);
			}

			if ($this->aVenue !== null) {
				if ($this->aVenue->isModified() || $this->aVenue->isNew()) {
					$affectedRows += $this->aVenue->save($con);
				}
				$this->setVenue($this->aVenue);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = EventPeer::EVENTID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(EventPeer::EVENTID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventPeer::EVENTID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setEventid($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += EventPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collEventartists !== null) {
				foreach ($this->collEventartists as $referrerFK) {
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

			if ($this->aEventtype !== null) {
				if (!$this->aEventtype->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEventtype->getValidationFailures());
				}
			}

			if ($this->aVenue !== null) {
				if (!$this->aVenue->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVenue->getValidationFailures());
				}
			}


			if (($retval = EventPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEventartists !== null) {
					foreach ($this->collEventartists as $referrerFK) {
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
		$pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEventid();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getStart();
				break;
			case 3:
				return $this->getFinish();
				break;
			case 4:
				return $this->getCover();
				break;
			case 5:
				return $this->getAgeofmajority();
				break;
			case 6:
				return $this->getEventtypeid();
				break;
			case 7:
				return $this->getLastfmid();
				break;
			case 8:
				return $this->getVenueid();
				break;
			case 9:
				return $this->getCancelled();
				break;
			case 10:
				return $this->getDescription();
				break;
			case 11:
				return $this->getSlug();
				break;
			case 12:
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
		$keys = EventPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEventid(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getStart(),
			$keys[3] => $this->getFinish(),
			$keys[4] => $this->getCover(),
			$keys[5] => $this->getAgeofmajority(),
			$keys[6] => $this->getEventtypeid(),
			$keys[7] => $this->getLastfmid(),
			$keys[8] => $this->getVenueid(),
			$keys[9] => $this->getCancelled(),
			$keys[10] => $this->getDescription(),
			$keys[11] => $this->getSlug(),
			$keys[12] => $this->getSubmittedbyuser(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUser) {
				$result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aEventtype) {
				$result['Eventtype'] = $this->aEventtype->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aVenue) {
				$result['Venue'] = $this->aVenue->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEventid($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setStart($value);
				break;
			case 3:
				$this->setFinish($value);
				break;
			case 4:
				$this->setCover($value);
				break;
			case 5:
				$this->setAgeofmajority($value);
				break;
			case 6:
				$this->setEventtypeid($value);
				break;
			case 7:
				$this->setLastfmid($value);
				break;
			case 8:
				$this->setVenueid($value);
				break;
			case 9:
				$this->setCancelled($value);
				break;
			case 10:
				$this->setDescription($value);
				break;
			case 11:
				$this->setSlug($value);
				break;
			case 12:
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
		$keys = EventPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEventid($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFinish($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCover($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAgeofmajority($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEventtypeid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLastfmid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setVenueid($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCancelled($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDescription($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSlug($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSubmittedbyuser($arr[$keys[12]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EventPeer::DATABASE_NAME);

		if ($this->isColumnModified(EventPeer::EVENTID)) $criteria->add(EventPeer::EVENTID, $this->eventid);
		if ($this->isColumnModified(EventPeer::NAME)) $criteria->add(EventPeer::NAME, $this->name);
		if ($this->isColumnModified(EventPeer::START)) $criteria->add(EventPeer::START, $this->start);
		if ($this->isColumnModified(EventPeer::FINISH)) $criteria->add(EventPeer::FINISH, $this->finish);
		if ($this->isColumnModified(EventPeer::COVER)) $criteria->add(EventPeer::COVER, $this->cover);
		if ($this->isColumnModified(EventPeer::AGEOFMAJORITY)) $criteria->add(EventPeer::AGEOFMAJORITY, $this->ageofmajority);
		if ($this->isColumnModified(EventPeer::EVENTTYPEID)) $criteria->add(EventPeer::EVENTTYPEID, $this->eventtypeid);
		if ($this->isColumnModified(EventPeer::LASTFMID)) $criteria->add(EventPeer::LASTFMID, $this->lastfmid);
		if ($this->isColumnModified(EventPeer::VENUEID)) $criteria->add(EventPeer::VENUEID, $this->venueid);
		if ($this->isColumnModified(EventPeer::CANCELLED)) $criteria->add(EventPeer::CANCELLED, $this->cancelled);
		if ($this->isColumnModified(EventPeer::DESCRIPTION)) $criteria->add(EventPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(EventPeer::SLUG)) $criteria->add(EventPeer::SLUG, $this->slug);
		if ($this->isColumnModified(EventPeer::SUBMITTEDBYUSER)) $criteria->add(EventPeer::SUBMITTEDBYUSER, $this->submittedbyuser);

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
		$criteria = new Criteria(EventPeer::DATABASE_NAME);
		$criteria->add(EventPeer::EVENTID, $this->eventid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getEventid();
	}

	/**
	 * Generic method to set the primary key (eventid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setEventid($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getEventid();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Event (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setStart($this->start);
		$copyObj->setFinish($this->finish);
		$copyObj->setCover($this->cover);
		$copyObj->setAgeofmajority($this->ageofmajority);
		$copyObj->setEventtypeid($this->eventtypeid);
		$copyObj->setLastfmid($this->lastfmid);
		$copyObj->setVenueid($this->venueid);
		$copyObj->setCancelled($this->cancelled);
		$copyObj->setDescription($this->description);
		$copyObj->setSlug($this->slug);
		$copyObj->setSubmittedbyuser($this->submittedbyuser);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getEventartists() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEventartist($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setEventid(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Event Clone of current object.
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
	 * @return     EventPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EventPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     Event The current object (for fluent API support)
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
			$v->addEvent($this);
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
			   $this->aUser->addEvents($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Eventtype object.
	 *
	 * @param      Eventtype $v
	 * @return     Event The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setEventtype(Eventtype $v = null)
	{
		if ($v === null) {
			$this->setEventtypeid(NULL);
		} else {
			$this->setEventtypeid($v->getEventtypeid());
		}

		$this->aEventtype = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Eventtype object, it will not be re-added.
		if ($v !== null) {
			$v->addEvent($this);
		}

		return $this;
	}


	/**
	 * Get the associated Eventtype object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Eventtype The associated Eventtype object.
	 * @throws     PropelException
	 */
	public function getEventtype(PropelPDO $con = null)
	{
		if ($this->aEventtype === null && ($this->eventtypeid !== null)) {
			$this->aEventtype = EventtypeQuery::create()->findPk($this->eventtypeid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aEventtype->addEvents($this);
			 */
		}
		return $this->aEventtype;
	}

	/**
	 * Declares an association between this object and a Venue object.
	 *
	 * @param      Venue $v
	 * @return     Event The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setVenue(Venue $v = null)
	{
		if ($v === null) {
			$this->setVenueid(NULL);
		} else {
			$this->setVenueid($v->getVenueid());
		}

		$this->aVenue = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Venue object, it will not be re-added.
		if ($v !== null) {
			$v->addEvent($this);
		}

		return $this;
	}


	/**
	 * Get the associated Venue object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Venue The associated Venue object.
	 * @throws     PropelException
	 */
	public function getVenue(PropelPDO $con = null)
	{
		if ($this->aVenue === null && ($this->venueid !== null)) {
			$this->aVenue = VenueQuery::create()->findPk($this->venueid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aVenue->addEvents($this);
			 */
		}
		return $this->aVenue;
	}

	/**
	 * Clears out the collEventartists collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEventartists()
	 */
	public function clearEventartists()
	{
		$this->collEventartists = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEventartists collection.
	 *
	 * By default this just sets the collEventartists collection to an empty array (like clearcollEventartists());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initEventartists()
	{
		$this->collEventartists = new PropelObjectCollection();
		$this->collEventartists->setModel('Eventartist');
	}

	/**
	 * Gets an array of Eventartist objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Event is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Eventartist[] List of Eventartist objects
	 * @throws     PropelException
	 */
	public function getEventartists($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEventartists || null !== $criteria) {
			if ($this->isNew() && null === $this->collEventartists) {
				// return empty collection
				$this->initEventartists();
			} else {
				$collEventartists = EventartistQuery::create(null, $criteria)
					->filterByEvent($this)
					->find($con);
				if (null !== $criteria) {
					return $collEventartists;
				}
				$this->collEventartists = $collEventartists;
			}
		}
		return $this->collEventartists;
	}

	/**
	 * Returns the number of related Eventartist objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Eventartist objects.
	 * @throws     PropelException
	 */
	public function countEventartists(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEventartists || null !== $criteria) {
			if ($this->isNew() && null === $this->collEventartists) {
				return 0;
			} else {
				$query = EventartistQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByEvent($this)
					->count($con);
			}
		} else {
			return count($this->collEventartists);
		}
	}

	/**
	 * Method called to associate a Eventartist object to this object
	 * through the Eventartist foreign key attribute.
	 *
	 * @param      Eventartist $l Eventartist
	 * @return     void
	 * @throws     PropelException
	 */
	public function addEventartist(Eventartist $l)
	{
		if ($this->collEventartists === null) {
			$this->initEventartists();
		}
		if (!$this->collEventartists->contains($l)) { // only add it if the **same** object is not already associated
			$this->collEventartists[]= $l;
			$l->setEvent($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Event is new, it will return
	 * an empty collection; or if this Event has previously
	 * been saved, it will retrieve related Eventartists from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Event.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Eventartist[] List of Eventartist objects
	 */
	public function getEventartistsJoinArtist($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventartistQuery::create(null, $criteria);
		$query->joinWith('Artist', $join_behavior);

		return $this->getEventartists($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->eventid = null;
		$this->name = null;
		$this->start = null;
		$this->finish = null;
		$this->cover = null;
		$this->ageofmajority = null;
		$this->eventtypeid = null;
		$this->lastfmid = null;
		$this->venueid = null;
		$this->cancelled = null;
		$this->description = null;
		$this->slug = null;
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
			if ($this->collEventartists) {
				foreach ((array) $this->collEventartists as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collEventartists = null;
		$this->aUser = null;
		$this->aEventtype = null;
		$this->aVenue = null;
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

} // BaseEvent
