<?php


/**
 * Base class that represents a row from the 'artist' table.
 *
 * 
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseArtist extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'ArtistPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ArtistPeer
	 */
	protected static $peer;

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
	 * The value for the intro field.
	 * @var        string
	 */
	protected $intro;

	/**
	 * The value for the biography field.
	 * @var        string
	 */
	protected $biography;

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
	 * The value for the rss field.
	 * @var        string
	 */
	protected $rss;

	/**
	 * The value for the brokenup field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $brokenup;

	/**
	 * The value for the lastfmid field.
	 * @var        string
	 */
	protected $lastfmid;

	/**
	 * The value for the artistcol field.
	 * @var        string
	 */
	protected $artistcol;

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
	 * @var        array Album[] Collection to store aggregation of Album objects.
	 */
	protected $collAlbums;

	/**
	 * @var        array Artistrating[] Collection to store aggregation of Artistrating objects.
	 */
	protected $collArtistratings;

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
		$this->brokenup = 0;
		$this->hasphotos = 0;
	}

	/**
	 * Initializes internal state of BaseArtist object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
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
	 * Get the [intro] column value.
	 * 
	 * @return     string
	 */
	public function getIntro()
	{
		return $this->intro;
	}

	/**
	 * Get the [biography] column value.
	 * 
	 * @return     string
	 */
	public function getBiography()
	{
		return $this->biography;
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
	 * Get the [rss] column value.
	 * 
	 * @return     string
	 */
	public function getRss()
	{
		return $this->rss;
	}

	/**
	 * Get the [brokenup] column value.
	 * 
	 * @return     int
	 */
	public function getBrokenup()
	{
		return $this->brokenup;
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
	 * Get the [artistcol] column value.
	 * 
	 * @return     string
	 */
	public function getArtistcol()
	{
		return $this->artistcol;
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
	 * Set the value of [artistid] column.
	 * 
	 * @param      int $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setArtistid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->artistid !== $v) {
			$this->artistid = $v;
			$this->modifiedColumns[] = ArtistPeer::ARTISTID;
		}

		return $this;
	} // setArtistid()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ArtistPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [city] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setCity($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = ArtistPeer::CITY;
		}

		return $this;
	} // setCity()

	/**
	 * Set the value of [province] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setProvince($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->province !== $v) {
			$this->province = $v;
			$this->modifiedColumns[] = ArtistPeer::PROVINCE;
		}

		return $this;
	} // setProvince()

	/**
	 * Set the value of [country] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setCountry($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = ArtistPeer::COUNTRY;
		}

		return $this;
	} // setCountry()

	/**
	 * Set the value of [intro] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setIntro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->intro !== $v) {
			$this->intro = $v;
			$this->modifiedColumns[] = ArtistPeer::INTRO;
		}

		return $this;
	} // setIntro()

	/**
	 * Set the value of [biography] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setBiography($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->biography !== $v) {
			$this->biography = $v;
			$this->modifiedColumns[] = ArtistPeer::BIOGRAPHY;
		}

		return $this;
	} // setBiography()

	/**
	 * Set the value of [website] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setWebsite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->website !== $v) {
			$this->website = $v;
			$this->modifiedColumns[] = ArtistPeer::WEBSITE;
		}

		return $this;
	} // setWebsite()

	/**
	 * Set the value of [twitter] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setTwitter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->twitter !== $v) {
			$this->twitter = $v;
			$this->modifiedColumns[] = ArtistPeer::TWITTER;
		}

		return $this;
	} // setTwitter()

	/**
	 * Set the value of [facebook] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setFacebook($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->facebook !== $v) {
			$this->facebook = $v;
			$this->modifiedColumns[] = ArtistPeer::FACEBOOK;
		}

		return $this;
	} // setFacebook()

	/**
	 * Set the value of [rss] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setRss($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rss !== $v) {
			$this->rss = $v;
			$this->modifiedColumns[] = ArtistPeer::RSS;
		}

		return $this;
	} // setRss()

	/**
	 * Set the value of [brokenup] column.
	 * 
	 * @param      int $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setBrokenup($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->brokenup !== $v || $this->isNew()) {
			$this->brokenup = $v;
			$this->modifiedColumns[] = ArtistPeer::BROKENUP;
		}

		return $this;
	} // setBrokenup()

	/**
	 * Set the value of [lastfmid] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setLastfmid($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lastfmid !== $v) {
			$this->lastfmid = $v;
			$this->modifiedColumns[] = ArtistPeer::LASTFMID;
		}

		return $this;
	} // setLastfmid()

	/**
	 * Set the value of [artistcol] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setArtistcol($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->artistcol !== $v) {
			$this->artistcol = $v;
			$this->modifiedColumns[] = ArtistPeer::ARTISTCOL;
		}

		return $this;
	} // setArtistcol()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = ArtistPeer::SLUG;
		}

		return $this;
	} // setSlug()

	/**
	 * Set the value of [hasphotos] column.
	 * 
	 * @param      int $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setHasphotos($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->hasphotos !== $v || $this->isNew()) {
			$this->hasphotos = $v;
			$this->modifiedColumns[] = ArtistPeer::HASPHOTOS;
		}

		return $this;
	} // setHasphotos()

	/**
	 * Set the value of [submittedbyuser] column.
	 * 
	 * @param      int $v new value
	 * @return     Artist The current object (for fluent API support)
	 */
	public function setSubmittedbyuser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->submittedbyuser !== $v) {
			$this->submittedbyuser = $v;
			$this->modifiedColumns[] = ArtistPeer::SUBMITTEDBYUSER;
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
			if ($this->brokenup !== 0) {
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

			$this->artistid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->city = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->province = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->country = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->intro = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->biography = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->website = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->twitter = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->facebook = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->rss = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->brokenup = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->lastfmid = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->artistcol = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->slug = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->hasphotos = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->submittedbyuser = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 17; // 17 = ArtistPeer::NUM_COLUMNS - ArtistPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Artist object", $e);
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
			$con = Propel::getConnection(ArtistPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ArtistPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUser = null;
			$this->collAlbums = null;

			$this->collArtistratings = null;

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
			$con = Propel::getConnection(ArtistPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ArtistQuery::create()
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
			$con = Propel::getConnection(ArtistPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ArtistPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = ArtistPeer::ARTISTID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ArtistPeer::ARTISTID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ArtistPeer::ARTISTID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setArtistid($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ArtistPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAlbums !== null) {
				foreach ($this->collAlbums as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArtistratings !== null) {
				foreach ($this->collArtistratings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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


			if (($retval = ArtistPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlbums !== null) {
					foreach ($this->collAlbums as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArtistratings !== null) {
					foreach ($this->collArtistratings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = ArtistPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getArtistid();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getCity();
				break;
			case 3:
				return $this->getProvince();
				break;
			case 4:
				return $this->getCountry();
				break;
			case 5:
				return $this->getIntro();
				break;
			case 6:
				return $this->getBiography();
				break;
			case 7:
				return $this->getWebsite();
				break;
			case 8:
				return $this->getTwitter();
				break;
			case 9:
				return $this->getFacebook();
				break;
			case 10:
				return $this->getRss();
				break;
			case 11:
				return $this->getBrokenup();
				break;
			case 12:
				return $this->getLastfmid();
				break;
			case 13:
				return $this->getArtistcol();
				break;
			case 14:
				return $this->getSlug();
				break;
			case 15:
				return $this->getHasphotos();
				break;
			case 16:
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
		$keys = ArtistPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getArtistid(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getCity(),
			$keys[3] => $this->getProvince(),
			$keys[4] => $this->getCountry(),
			$keys[5] => $this->getIntro(),
			$keys[6] => $this->getBiography(),
			$keys[7] => $this->getWebsite(),
			$keys[8] => $this->getTwitter(),
			$keys[9] => $this->getFacebook(),
			$keys[10] => $this->getRss(),
			$keys[11] => $this->getBrokenup(),
			$keys[12] => $this->getLastfmid(),
			$keys[13] => $this->getArtistcol(),
			$keys[14] => $this->getSlug(),
			$keys[15] => $this->getHasphotos(),
			$keys[16] => $this->getSubmittedbyuser(),
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
		$pos = ArtistPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setArtistid($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setCity($value);
				break;
			case 3:
				$this->setProvince($value);
				break;
			case 4:
				$this->setCountry($value);
				break;
			case 5:
				$this->setIntro($value);
				break;
			case 6:
				$this->setBiography($value);
				break;
			case 7:
				$this->setWebsite($value);
				break;
			case 8:
				$this->setTwitter($value);
				break;
			case 9:
				$this->setFacebook($value);
				break;
			case 10:
				$this->setRss($value);
				break;
			case 11:
				$this->setBrokenup($value);
				break;
			case 12:
				$this->setLastfmid($value);
				break;
			case 13:
				$this->setArtistcol($value);
				break;
			case 14:
				$this->setSlug($value);
				break;
			case 15:
				$this->setHasphotos($value);
				break;
			case 16:
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
		$keys = ArtistPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setArtistid($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCity($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setProvince($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCountry($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIntro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBiography($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setWebsite($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTwitter($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFacebook($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRss($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBrokenup($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLastfmid($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setArtistcol($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSlug($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setHasphotos($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setSubmittedbyuser($arr[$keys[16]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ArtistPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArtistPeer::ARTISTID)) $criteria->add(ArtistPeer::ARTISTID, $this->artistid);
		if ($this->isColumnModified(ArtistPeer::NAME)) $criteria->add(ArtistPeer::NAME, $this->name);
		if ($this->isColumnModified(ArtistPeer::CITY)) $criteria->add(ArtistPeer::CITY, $this->city);
		if ($this->isColumnModified(ArtistPeer::PROVINCE)) $criteria->add(ArtistPeer::PROVINCE, $this->province);
		if ($this->isColumnModified(ArtistPeer::COUNTRY)) $criteria->add(ArtistPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(ArtistPeer::INTRO)) $criteria->add(ArtistPeer::INTRO, $this->intro);
		if ($this->isColumnModified(ArtistPeer::BIOGRAPHY)) $criteria->add(ArtistPeer::BIOGRAPHY, $this->biography);
		if ($this->isColumnModified(ArtistPeer::WEBSITE)) $criteria->add(ArtistPeer::WEBSITE, $this->website);
		if ($this->isColumnModified(ArtistPeer::TWITTER)) $criteria->add(ArtistPeer::TWITTER, $this->twitter);
		if ($this->isColumnModified(ArtistPeer::FACEBOOK)) $criteria->add(ArtistPeer::FACEBOOK, $this->facebook);
		if ($this->isColumnModified(ArtistPeer::RSS)) $criteria->add(ArtistPeer::RSS, $this->rss);
		if ($this->isColumnModified(ArtistPeer::BROKENUP)) $criteria->add(ArtistPeer::BROKENUP, $this->brokenup);
		if ($this->isColumnModified(ArtistPeer::LASTFMID)) $criteria->add(ArtistPeer::LASTFMID, $this->lastfmid);
		if ($this->isColumnModified(ArtistPeer::ARTISTCOL)) $criteria->add(ArtistPeer::ARTISTCOL, $this->artistcol);
		if ($this->isColumnModified(ArtistPeer::SLUG)) $criteria->add(ArtistPeer::SLUG, $this->slug);
		if ($this->isColumnModified(ArtistPeer::HASPHOTOS)) $criteria->add(ArtistPeer::HASPHOTOS, $this->hasphotos);
		if ($this->isColumnModified(ArtistPeer::SUBMITTEDBYUSER)) $criteria->add(ArtistPeer::SUBMITTEDBYUSER, $this->submittedbyuser);

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
		$criteria = new Criteria(ArtistPeer::DATABASE_NAME);
		$criteria->add(ArtistPeer::ARTISTID, $this->artistid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getArtistid();
	}

	/**
	 * Generic method to set the primary key (artistid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setArtistid($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getArtistid();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Artist (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setCity($this->city);
		$copyObj->setProvince($this->province);
		$copyObj->setCountry($this->country);
		$copyObj->setIntro($this->intro);
		$copyObj->setBiography($this->biography);
		$copyObj->setWebsite($this->website);
		$copyObj->setTwitter($this->twitter);
		$copyObj->setFacebook($this->facebook);
		$copyObj->setRss($this->rss);
		$copyObj->setBrokenup($this->brokenup);
		$copyObj->setLastfmid($this->lastfmid);
		$copyObj->setArtistcol($this->artistcol);
		$copyObj->setSlug($this->slug);
		$copyObj->setHasphotos($this->hasphotos);
		$copyObj->setSubmittedbyuser($this->submittedbyuser);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAlbums() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlbum($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getArtistratings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addArtistrating($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getEventartists() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEventartist($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setArtistid(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Artist Clone of current object.
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
	 * @return     ArtistPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ArtistPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     Artist The current object (for fluent API support)
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
			$v->addArtist($this);
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
			   $this->aUser->addArtists($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Clears out the collAlbums collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAlbums()
	 */
	public function clearAlbums()
	{
		$this->collAlbums = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAlbums collection.
	 *
	 * By default this just sets the collAlbums collection to an empty array (like clearcollAlbums());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAlbums()
	{
		$this->collAlbums = new PropelObjectCollection();
		$this->collAlbums->setModel('Album');
	}

	/**
	 * Gets an array of Album objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Artist is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Album[] List of Album objects
	 * @throws     PropelException
	 */
	public function getAlbums($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAlbums || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlbums) {
				// return empty collection
				$this->initAlbums();
			} else {
				$collAlbums = AlbumQuery::create(null, $criteria)
					->filterByArtist($this)
					->find($con);
				if (null !== $criteria) {
					return $collAlbums;
				}
				$this->collAlbums = $collAlbums;
			}
		}
		return $this->collAlbums;
	}

	/**
	 * Returns the number of related Album objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Album objects.
	 * @throws     PropelException
	 */
	public function countAlbums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAlbums || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlbums) {
				return 0;
			} else {
				$query = AlbumQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByArtist($this)
					->count($con);
			}
		} else {
			return count($this->collAlbums);
		}
	}

	/**
	 * Method called to associate a Album object to this object
	 * through the Album foreign key attribute.
	 *
	 * @param      Album $l Album
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAlbum(Album $l)
	{
		if ($this->collAlbums === null) {
			$this->initAlbums();
		}
		if (!$this->collAlbums->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAlbums[]= $l;
			$l->setArtist($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Artist is new, it will return
	 * an empty collection; or if this Artist has previously
	 * been saved, it will retrieve related Albums from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Artist.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Album[] List of Album objects
	 */
	public function getAlbumsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AlbumQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getAlbums($query, $con);
	}

	/**
	 * Clears out the collArtistratings collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addArtistratings()
	 */
	public function clearArtistratings()
	{
		$this->collArtistratings = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collArtistratings collection.
	 *
	 * By default this just sets the collArtistratings collection to an empty array (like clearcollArtistratings());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initArtistratings()
	{
		$this->collArtistratings = new PropelObjectCollection();
		$this->collArtistratings->setModel('Artistrating');
	}

	/**
	 * Gets an array of Artistrating objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Artist is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Artistrating[] List of Artistrating objects
	 * @throws     PropelException
	 */
	public function getArtistratings($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collArtistratings || null !== $criteria) {
			if ($this->isNew() && null === $this->collArtistratings) {
				// return empty collection
				$this->initArtistratings();
			} else {
				$collArtistratings = ArtistratingQuery::create(null, $criteria)
					->filterByArtist($this)
					->find($con);
				if (null !== $criteria) {
					return $collArtistratings;
				}
				$this->collArtistratings = $collArtistratings;
			}
		}
		return $this->collArtistratings;
	}

	/**
	 * Returns the number of related Artistrating objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Artistrating objects.
	 * @throws     PropelException
	 */
	public function countArtistratings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collArtistratings || null !== $criteria) {
			if ($this->isNew() && null === $this->collArtistratings) {
				return 0;
			} else {
				$query = ArtistratingQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByArtist($this)
					->count($con);
			}
		} else {
			return count($this->collArtistratings);
		}
	}

	/**
	 * Method called to associate a Artistrating object to this object
	 * through the Artistrating foreign key attribute.
	 *
	 * @param      Artistrating $l Artistrating
	 * @return     void
	 * @throws     PropelException
	 */
	public function addArtistrating(Artistrating $l)
	{
		if ($this->collArtistratings === null) {
			$this->initArtistratings();
		}
		if (!$this->collArtistratings->contains($l)) { // only add it if the **same** object is not already associated
			$this->collArtistratings[]= $l;
			$l->setArtist($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Artist is new, it will return
	 * an empty collection; or if this Artist has previously
	 * been saved, it will retrieve related Artistratings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Artist.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Artistrating[] List of Artistrating objects
	 */
	public function getArtistratingsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ArtistratingQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getArtistratings($query, $con);
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
	 * If this Artist is new, it will return
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
					->filterByArtist($this)
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
					->filterByArtist($this)
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
			$l->setArtist($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Artist is new, it will return
	 * an empty collection; or if this Artist has previously
	 * been saved, it will retrieve related Eventartists from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Artist.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Eventartist[] List of Eventartist objects
	 */
	public function getEventartistsJoinEvent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventartistQuery::create(null, $criteria);
		$query->joinWith('Event', $join_behavior);

		return $this->getEventartists($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->artistid = null;
		$this->name = null;
		$this->city = null;
		$this->province = null;
		$this->country = null;
		$this->intro = null;
		$this->biography = null;
		$this->website = null;
		$this->twitter = null;
		$this->facebook = null;
		$this->rss = null;
		$this->brokenup = null;
		$this->lastfmid = null;
		$this->artistcol = null;
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
			if ($this->collAlbums) {
				foreach ((array) $this->collAlbums as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collArtistratings) {
				foreach ((array) $this->collArtistratings as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collEventartists) {
				foreach ((array) $this->collEventartists as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAlbums = null;
		$this->collArtistratings = null;
		$this->collEventartists = null;
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

} // BaseArtist
