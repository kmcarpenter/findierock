<?php


/**
 * Base class that represents a row from the 'album' table.
 *
 * 
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseAlbum extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'AlbumPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AlbumPeer
	 */
	protected static $peer;

	/**
	 * The value for the albumid field.
	 * @var        int
	 */
	protected $albumid;

	/**
	 * The value for the artistid field.
	 * @var        int
	 */
	protected $artistid;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the label field.
	 * @var        string
	 */
	protected $label;

	/**
	 * The value for the copyright field.
	 * @var        string
	 */
	protected $copyright;

	/**
	 * The value for the producer field.
	 * @var        string
	 */
	protected $producer;

	/**
	 * The value for the lastfmid field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $lastfmid;

	/**
	 * The value for the releasedate field.
	 * @var        string
	 */
	protected $releasedate;

	/**
	 * The value for the albumtype field.
	 * @var        string
	 */
	protected $albumtype;

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
	 * @var        Artist
	 */
	protected $aArtist;

	/**
	 * @var        array Albumrating[] Collection to store aggregation of Albumrating objects.
	 */
	protected $collAlbumratings;

	/**
	 * @var        array Albumtrack[] Collection to store aggregation of Albumtrack objects.
	 */
	protected $collAlbumtracks;

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
		$this->lastfmid = '';
		$this->hasphotos = 0;
	}

	/**
	 * Initializes internal state of BaseAlbum object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [albumid] column value.
	 * 
	 * @return     int
	 */
	public function getAlbumid()
	{
		return $this->albumid;
	}

	/**
	 * Get the [artistid] column value.
	 * 
	 * @return     int
	 */
	public function getArtistid()
	{
		return $this->artistid;
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
	 * Get the [label] column value.
	 * 
	 * @return     string
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * Get the [optionally formatted] temporal [copyright] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCopyright($format = '%x')
	{
		if ($this->copyright === null) {
			return null;
		}


		if ($this->copyright === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->copyright);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->copyright, true), $x);
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
	 * Get the [producer] column value.
	 * 
	 * @return     string
	 */
	public function getProducer()
	{
		return $this->producer;
	}

	/**
	 * Get the [lastfmid] column value.
	 * 
	 * @return     string
	 */
	public function getLastfmid()
	{
		return $this->lastfmid;
	}

	/**
	 * Get the [optionally formatted] temporal [releasedate] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getReleasedate($format = '%x')
	{
		if ($this->releasedate === null) {
			return null;
		}


		if ($this->releasedate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->releasedate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->releasedate, true), $x);
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
	 * Get the [albumtype] column value.
	 * 
	 * @return     string
	 */
	public function getAlbumtype()
	{
		return $this->albumtype;
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
	 * Set the value of [albumid] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setAlbumid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->albumid !== $v) {
			$this->albumid = $v;
			$this->modifiedColumns[] = AlbumPeer::ALBUMID;
		}

		return $this;
	} // setAlbumid()

	/**
	 * Set the value of [artistid] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setArtistid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->artistid !== $v) {
			$this->artistid = $v;
			$this->modifiedColumns[] = AlbumPeer::ARTISTID;
		}

		if ($this->aArtist !== null && $this->aArtist->getArtistid() !== $v) {
			$this->aArtist = null;
		}

		return $this;
	} // setArtistid()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AlbumPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [label] column.
	 * 
	 * @param      string $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setLabel($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->label !== $v) {
			$this->label = $v;
			$this->modifiedColumns[] = AlbumPeer::LABEL;
		}

		return $this;
	} // setLabel()

	/**
	 * Sets the value of [copyright] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Album The current object (for fluent API support)
	 */
	public function setCopyright($v)
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

		if ( $this->copyright !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->copyright !== null && $tmpDt = new DateTime($this->copyright)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->copyright = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = AlbumPeer::COPYRIGHT;
			}
		} // if either are not null

		return $this;
	} // setCopyright()

	/**
	 * Set the value of [producer] column.
	 * 
	 * @param      string $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setProducer($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->producer !== $v) {
			$this->producer = $v;
			$this->modifiedColumns[] = AlbumPeer::PRODUCER;
		}

		return $this;
	} // setProducer()

	/**
	 * Set the value of [lastfmid] column.
	 * 
	 * @param      string $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setLastfmid($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lastfmid !== $v || $this->isNew()) {
			$this->lastfmid = $v;
			$this->modifiedColumns[] = AlbumPeer::LASTFMID;
		}

		return $this;
	} // setLastfmid()

	/**
	 * Sets the value of [releasedate] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Album The current object (for fluent API support)
	 */
	public function setReleasedate($v)
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

		if ( $this->releasedate !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->releasedate !== null && $tmpDt = new DateTime($this->releasedate)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->releasedate = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = AlbumPeer::RELEASEDATE;
			}
		} // if either are not null

		return $this;
	} // setReleasedate()

	/**
	 * Set the value of [albumtype] column.
	 * 
	 * @param      string $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setAlbumtype($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->albumtype !== $v) {
			$this->albumtype = $v;
			$this->modifiedColumns[] = AlbumPeer::ALBUMTYPE;
		}

		return $this;
	} // setAlbumtype()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = AlbumPeer::SLUG;
		}

		return $this;
	} // setSlug()

	/**
	 * Set the value of [hasphotos] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setHasphotos($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->hasphotos !== $v || $this->isNew()) {
			$this->hasphotos = $v;
			$this->modifiedColumns[] = AlbumPeer::HASPHOTOS;
		}

		return $this;
	} // setHasphotos()

	/**
	 * Set the value of [submittedbyuser] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setSubmittedbyuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->submittedbyuser !== $v) {
			$this->submittedbyuser = $v;
			$this->modifiedColumns[] = AlbumPeer::SUBMITTEDBYUSER;
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
			if ($this->lastfmid !== '') {
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

			$this->albumid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->artistid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->label = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->copyright = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->producer = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->lastfmid = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->releasedate = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->albumtype = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->slug = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->hasphotos = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->submittedbyuser = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = AlbumPeer::NUM_COLUMNS - AlbumPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Album object", $e);
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

		if ($this->aArtist !== null && $this->artistid !== $this->aArtist->getArtistid()) {
			$this->aArtist = null;
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
			$con = Propel::getConnection(AlbumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AlbumPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUser = null;
			$this->aArtist = null;
			$this->collAlbumratings = null;

			$this->collAlbumtracks = null;

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
			$con = Propel::getConnection(AlbumPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				AlbumQuery::create()
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
			$con = Propel::getConnection(AlbumPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AlbumPeer::addInstanceToPool($this);
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

			if ($this->aArtist !== null) {
				if ($this->aArtist->isModified() || $this->aArtist->isNew()) {
					$affectedRows += $this->aArtist->save($con);
				}
				$this->setArtist($this->aArtist);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AlbumPeer::ALBUMID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AlbumPeer::ALBUMID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AlbumPeer::ALBUMID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setAlbumid($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += AlbumPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAlbumratings !== null) {
				foreach ($this->collAlbumratings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAlbumtracks !== null) {
				foreach ($this->collAlbumtracks as $referrerFK) {
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

			if ($this->aArtist !== null) {
				if (!$this->aArtist->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArtist->getValidationFailures());
				}
			}


			if (($retval = AlbumPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlbumratings !== null) {
					foreach ($this->collAlbumratings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlbumtracks !== null) {
					foreach ($this->collAlbumtracks as $referrerFK) {
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
		$pos = AlbumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAlbumid();
				break;
			case 1:
				return $this->getArtistid();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getLabel();
				break;
			case 4:
				return $this->getCopyright();
				break;
			case 5:
				return $this->getProducer();
				break;
			case 6:
				return $this->getLastfmid();
				break;
			case 7:
				return $this->getReleasedate();
				break;
			case 8:
				return $this->getAlbumtype();
				break;
			case 9:
				return $this->getSlug();
				break;
			case 10:
				return $this->getHasphotos();
				break;
			case 11:
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
		$keys = AlbumPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAlbumid(),
			$keys[1] => $this->getArtistid(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getLabel(),
			$keys[4] => $this->getCopyright(),
			$keys[5] => $this->getProducer(),
			$keys[6] => $this->getLastfmid(),
			$keys[7] => $this->getReleasedate(),
			$keys[8] => $this->getAlbumtype(),
			$keys[9] => $this->getSlug(),
			$keys[10] => $this->getHasphotos(),
			$keys[11] => $this->getSubmittedbyuser(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUser) {
				$result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aArtist) {
				$result['Artist'] = $this->aArtist->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = AlbumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAlbumid($value);
				break;
			case 1:
				$this->setArtistid($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setLabel($value);
				break;
			case 4:
				$this->setCopyright($value);
				break;
			case 5:
				$this->setProducer($value);
				break;
			case 6:
				$this->setLastfmid($value);
				break;
			case 7:
				$this->setReleasedate($value);
				break;
			case 8:
				$this->setAlbumtype($value);
				break;
			case 9:
				$this->setSlug($value);
				break;
			case 10:
				$this->setHasphotos($value);
				break;
			case 11:
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
		$keys = AlbumPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAlbumid($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setArtistid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLabel($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCopyright($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setProducer($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastfmid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setReleasedate($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAlbumtype($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSlug($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setHasphotos($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSubmittedbyuser($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AlbumPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlbumPeer::ALBUMID)) $criteria->add(AlbumPeer::ALBUMID, $this->albumid);
		if ($this->isColumnModified(AlbumPeer::ARTISTID)) $criteria->add(AlbumPeer::ARTISTID, $this->artistid);
		if ($this->isColumnModified(AlbumPeer::NAME)) $criteria->add(AlbumPeer::NAME, $this->name);
		if ($this->isColumnModified(AlbumPeer::LABEL)) $criteria->add(AlbumPeer::LABEL, $this->label);
		if ($this->isColumnModified(AlbumPeer::COPYRIGHT)) $criteria->add(AlbumPeer::COPYRIGHT, $this->copyright);
		if ($this->isColumnModified(AlbumPeer::PRODUCER)) $criteria->add(AlbumPeer::PRODUCER, $this->producer);
		if ($this->isColumnModified(AlbumPeer::LASTFMID)) $criteria->add(AlbumPeer::LASTFMID, $this->lastfmid);
		if ($this->isColumnModified(AlbumPeer::RELEASEDATE)) $criteria->add(AlbumPeer::RELEASEDATE, $this->releasedate);
		if ($this->isColumnModified(AlbumPeer::ALBUMTYPE)) $criteria->add(AlbumPeer::ALBUMTYPE, $this->albumtype);
		if ($this->isColumnModified(AlbumPeer::SLUG)) $criteria->add(AlbumPeer::SLUG, $this->slug);
		if ($this->isColumnModified(AlbumPeer::HASPHOTOS)) $criteria->add(AlbumPeer::HASPHOTOS, $this->hasphotos);
		if ($this->isColumnModified(AlbumPeer::SUBMITTEDBYUSER)) $criteria->add(AlbumPeer::SUBMITTEDBYUSER, $this->submittedbyuser);

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
		$criteria = new Criteria(AlbumPeer::DATABASE_NAME);
		$criteria->add(AlbumPeer::ALBUMID, $this->albumid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getAlbumid();
	}

	/**
	 * Generic method to set the primary key (albumid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setAlbumid($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getAlbumid();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Album (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setArtistid($this->artistid);
		$copyObj->setName($this->name);
		$copyObj->setLabel($this->label);
		$copyObj->setCopyright($this->copyright);
		$copyObj->setProducer($this->producer);
		$copyObj->setLastfmid($this->lastfmid);
		$copyObj->setReleasedate($this->releasedate);
		$copyObj->setAlbumtype($this->albumtype);
		$copyObj->setSlug($this->slug);
		$copyObj->setHasphotos($this->hasphotos);
		$copyObj->setSubmittedbyuser($this->submittedbyuser);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAlbumratings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlbumrating($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAlbumtracks() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlbumtrack($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setAlbumid(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Album Clone of current object.
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
	 * @return     AlbumPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlbumPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     Album The current object (for fluent API support)
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
			$v->addAlbum($this);
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
			   $this->aUser->addAlbums($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Artist object.
	 *
	 * @param      Artist $v
	 * @return     Album The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setArtist(Artist $v = null)
	{
		if ($v === null) {
			$this->setArtistid(NULL);
		} else {
			$this->setArtistid($v->getArtistid());
		}

		$this->aArtist = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Artist object, it will not be re-added.
		if ($v !== null) {
			$v->addAlbum($this);
		}

		return $this;
	}


	/**
	 * Get the associated Artist object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Artist The associated Artist object.
	 * @throws     PropelException
	 */
	public function getArtist(PropelPDO $con = null)
	{
		if ($this->aArtist === null && ($this->artistid !== null)) {
			$this->aArtist = ArtistQuery::create()->findPk($this->artistid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aArtist->addAlbums($this);
			 */
		}
		return $this->aArtist;
	}

	/**
	 * Clears out the collAlbumratings collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAlbumratings()
	 */
	public function clearAlbumratings()
	{
		$this->collAlbumratings = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAlbumratings collection.
	 *
	 * By default this just sets the collAlbumratings collection to an empty array (like clearcollAlbumratings());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAlbumratings()
	{
		$this->collAlbumratings = new PropelObjectCollection();
		$this->collAlbumratings->setModel('Albumrating');
	}

	/**
	 * Gets an array of Albumrating objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Album is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Albumrating[] List of Albumrating objects
	 * @throws     PropelException
	 */
	public function getAlbumratings($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAlbumratings || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlbumratings) {
				// return empty collection
				$this->initAlbumratings();
			} else {
				$collAlbumratings = AlbumratingQuery::create(null, $criteria)
					->filterByAlbum($this)
					->find($con);
				if (null !== $criteria) {
					return $collAlbumratings;
				}
				$this->collAlbumratings = $collAlbumratings;
			}
		}
		return $this->collAlbumratings;
	}

	/**
	 * Returns the number of related Albumrating objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Albumrating objects.
	 * @throws     PropelException
	 */
	public function countAlbumratings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAlbumratings || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlbumratings) {
				return 0;
			} else {
				$query = AlbumratingQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAlbum($this)
					->count($con);
			}
		} else {
			return count($this->collAlbumratings);
		}
	}

	/**
	 * Method called to associate a Albumrating object to this object
	 * through the Albumrating foreign key attribute.
	 *
	 * @param      Albumrating $l Albumrating
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAlbumrating(Albumrating $l)
	{
		if ($this->collAlbumratings === null) {
			$this->initAlbumratings();
		}
		if (!$this->collAlbumratings->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAlbumratings[]= $l;
			$l->setAlbum($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Album is new, it will return
	 * an empty collection; or if this Album has previously
	 * been saved, it will retrieve related Albumratings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Album.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Albumrating[] List of Albumrating objects
	 */
	public function getAlbumratingsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AlbumratingQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getAlbumratings($query, $con);
	}

	/**
	 * Clears out the collAlbumtracks collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAlbumtracks()
	 */
	public function clearAlbumtracks()
	{
		$this->collAlbumtracks = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAlbumtracks collection.
	 *
	 * By default this just sets the collAlbumtracks collection to an empty array (like clearcollAlbumtracks());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAlbumtracks()
	{
		$this->collAlbumtracks = new PropelObjectCollection();
		$this->collAlbumtracks->setModel('Albumtrack');
	}

	/**
	 * Gets an array of Albumtrack objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Album is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Albumtrack[] List of Albumtrack objects
	 * @throws     PropelException
	 */
	public function getAlbumtracks($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAlbumtracks || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlbumtracks) {
				// return empty collection
				$this->initAlbumtracks();
			} else {
				$collAlbumtracks = AlbumtrackQuery::create(null, $criteria)
					->filterByAlbum($this)
					->find($con);
				if (null !== $criteria) {
					return $collAlbumtracks;
				}
				$this->collAlbumtracks = $collAlbumtracks;
			}
		}
		return $this->collAlbumtracks;
	}

	/**
	 * Returns the number of related Albumtrack objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Albumtrack objects.
	 * @throws     PropelException
	 */
	public function countAlbumtracks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAlbumtracks || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlbumtracks) {
				return 0;
			} else {
				$query = AlbumtrackQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAlbum($this)
					->count($con);
			}
		} else {
			return count($this->collAlbumtracks);
		}
	}

	/**
	 * Method called to associate a Albumtrack object to this object
	 * through the Albumtrack foreign key attribute.
	 *
	 * @param      Albumtrack $l Albumtrack
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAlbumtrack(Albumtrack $l)
	{
		if ($this->collAlbumtracks === null) {
			$this->initAlbumtracks();
		}
		if (!$this->collAlbumtracks->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAlbumtracks[]= $l;
			$l->setAlbum($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->albumid = null;
		$this->artistid = null;
		$this->name = null;
		$this->label = null;
		$this->copyright = null;
		$this->producer = null;
		$this->lastfmid = null;
		$this->releasedate = null;
		$this->albumtype = null;
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
			if ($this->collAlbumratings) {
				foreach ((array) $this->collAlbumratings as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAlbumtracks) {
				foreach ((array) $this->collAlbumtracks as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAlbumratings = null;
		$this->collAlbumtracks = null;
		$this->aUser = null;
		$this->aArtist = null;
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

} // BaseAlbum
