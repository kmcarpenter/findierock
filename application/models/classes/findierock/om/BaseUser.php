<?php


/**
 * Base class that represents a row from the 'user' table.
 *
 * 
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseUser extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'UserPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UserPeer
	 */
	protected static $peer;

	/**
	 * The value for the userid field.
	 * @var        int
	 */
	protected $userid;

	/**
	 * The value for the username field.
	 * @var        string
	 */
	protected $username;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * @var        array Album[] Collection to store aggregation of Album objects.
	 */
	protected $collAlbums;

	/**
	 * @var        array Albumrating[] Collection to store aggregation of Albumrating objects.
	 */
	protected $collAlbumratings;

	/**
	 * @var        array Artist[] Collection to store aggregation of Artist objects.
	 */
	protected $collArtists;

	/**
	 * @var        array Artistrating[] Collection to store aggregation of Artistrating objects.
	 */
	protected $collArtistratings;

	/**
	 * @var        array Event[] Collection to store aggregation of Event objects.
	 */
	protected $collEvents;

	/**
	 * @var        array UserLinkWp[] Collection to store aggregation of UserLinkWp objects.
	 */
	protected $collUserLinkWps;

	/**
	 * @var        array Venue[] Collection to store aggregation of Venue objects.
	 */
	protected $collVenues;

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
	 * Get the [userid] column value.
	 * 
	 * @return     int
	 */
	public function getUserid()
	{
		return $this->userid;
	}

	/**
	 * Get the [username] column value.
	 * 
	 * @return     string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of [userid] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setUserid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->userid !== $v) {
			$this->userid = $v;
			$this->modifiedColumns[] = UserPeer::USERID;
		}

		return $this;
	} // setUserid()

	/**
	 * Set the value of [username] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = UserPeer::USERNAME;
		}

		return $this;
	} // setUsername()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = UserPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UserPeer::EMAIL;
		}

		return $this;
	} // setEmail()

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

			$this->userid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->password = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->email = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collAlbums = null;

			$this->collAlbumratings = null;

			$this->collArtists = null;

			$this->collArtistratings = null;

			$this->collEvents = null;

			$this->collUserLinkWps = null;

			$this->collVenues = null;

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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				UserQuery::create()
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				UserPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = UserPeer::USERID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(UserPeer::USERID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserPeer::USERID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setUserid($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = UserPeer::doUpdate($this, $con);
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

			if ($this->collAlbumratings !== null) {
				foreach ($this->collAlbumratings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArtists !== null) {
				foreach ($this->collArtists as $referrerFK) {
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

			if ($this->collEvents !== null) {
				foreach ($this->collEvents as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserLinkWps !== null) {
				foreach ($this->collUserLinkWps as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collVenues !== null) {
				foreach ($this->collVenues as $referrerFK) {
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


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlbums !== null) {
					foreach ($this->collAlbums as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlbumratings !== null) {
					foreach ($this->collAlbumratings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArtists !== null) {
					foreach ($this->collArtists as $referrerFK) {
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

				if ($this->collEvents !== null) {
					foreach ($this->collEvents as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserLinkWps !== null) {
					foreach ($this->collUserLinkWps as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collVenues !== null) {
					foreach ($this->collVenues as $referrerFK) {
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUserid();
				break;
			case 1:
				return $this->getUsername();
				break;
			case 2:
				return $this->getPassword();
				break;
			case 3:
				return $this->getEmail();
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
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserid(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getPassword(),
			$keys[3] => $this->getEmail(),
		);
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUserid($value);
				break;
			case 1:
				$this->setUsername($value);
				break;
			case 2:
				$this->setPassword($value);
				break;
			case 3:
				$this->setEmail($value);
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
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserid($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPassword($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmail($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::USERID)) $criteria->add(UserPeer::USERID, $this->userid);
		if ($this->isColumnModified(UserPeer::USERNAME)) $criteria->add(UserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(UserPeer::PASSWORD)) $criteria->add(UserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(UserPeer::EMAIL)) $criteria->add(UserPeer::EMAIL, $this->email);

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
		$criteria = new Criteria(UserPeer::DATABASE_NAME);
		$criteria->add(UserPeer::USERID, $this->userid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getUserid();
	}

	/**
	 * Generic method to set the primary key (userid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setUserid($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getUserid();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of User (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setUsername($this->username);
		$copyObj->setPassword($this->password);
		$copyObj->setEmail($this->email);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAlbums() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlbum($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAlbumratings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlbumrating($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getArtists() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addArtist($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getArtistratings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addArtistrating($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getEvents() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEvent($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUserLinkWps() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserLinkWp($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getVenues() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addVenue($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getVenueratings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addVenuerating($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setUserid(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     User Clone of current object.
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
	 * @return     UserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserPeer();
		}
		return self::$peer;
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related Albums from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Album[] List of Album objects
	 */
	public function getAlbumsJoinArtist($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AlbumQuery::create(null, $criteria);
		$query->joinWith('Artist', $join_behavior);

		return $this->getAlbums($query, $con);
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related Albumratings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Albumrating[] List of Albumrating objects
	 */
	public function getAlbumratingsJoinAlbum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AlbumratingQuery::create(null, $criteria);
		$query->joinWith('Album', $join_behavior);

		return $this->getAlbumratings($query, $con);
	}

	/**
	 * Clears out the collArtists collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addArtists()
	 */
	public function clearArtists()
	{
		$this->collArtists = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collArtists collection.
	 *
	 * By default this just sets the collArtists collection to an empty array (like clearcollArtists());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initArtists()
	{
		$this->collArtists = new PropelObjectCollection();
		$this->collArtists->setModel('Artist');
	}

	/**
	 * Gets an array of Artist objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Artist[] List of Artist objects
	 * @throws     PropelException
	 */
	public function getArtists($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collArtists || null !== $criteria) {
			if ($this->isNew() && null === $this->collArtists) {
				// return empty collection
				$this->initArtists();
			} else {
				$collArtists = ArtistQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collArtists;
				}
				$this->collArtists = $collArtists;
			}
		}
		return $this->collArtists;
	}

	/**
	 * Returns the number of related Artist objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Artist objects.
	 * @throws     PropelException
	 */
	public function countArtists(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collArtists || null !== $criteria) {
			if ($this->isNew() && null === $this->collArtists) {
				return 0;
			} else {
				$query = ArtistQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collArtists);
		}
	}

	/**
	 * Method called to associate a Artist object to this object
	 * through the Artist foreign key attribute.
	 *
	 * @param      Artist $l Artist
	 * @return     void
	 * @throws     PropelException
	 */
	public function addArtist(Artist $l)
	{
		if ($this->collArtists === null) {
			$this->initArtists();
		}
		if (!$this->collArtists->contains($l)) { // only add it if the **same** object is not already associated
			$this->collArtists[]= $l;
			$l->setUser($this);
		}
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related Artistratings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Artistrating[] List of Artistrating objects
	 */
	public function getArtistratingsJoinArtist($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ArtistratingQuery::create(null, $criteria);
		$query->joinWith('Artist', $join_behavior);

		return $this->getArtistratings($query, $con);
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
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
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related Events from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Event[] List of Event objects
	 */
	public function getEventsJoinVenue($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = EventQuery::create(null, $criteria);
		$query->joinWith('Venue', $join_behavior);

		return $this->getEvents($query, $con);
	}

	/**
	 * Clears out the collUserLinkWps collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserLinkWps()
	 */
	public function clearUserLinkWps()
	{
		$this->collUserLinkWps = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserLinkWps collection.
	 *
	 * By default this just sets the collUserLinkWps collection to an empty array (like clearcollUserLinkWps());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUserLinkWps()
	{
		$this->collUserLinkWps = new PropelObjectCollection();
		$this->collUserLinkWps->setModel('UserLinkWp');
	}

	/**
	 * Gets an array of UserLinkWp objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UserLinkWp[] List of UserLinkWp objects
	 * @throws     PropelException
	 */
	public function getUserLinkWps($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUserLinkWps || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserLinkWps) {
				// return empty collection
				$this->initUserLinkWps();
			} else {
				$collUserLinkWps = UserLinkWpQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collUserLinkWps;
				}
				$this->collUserLinkWps = $collUserLinkWps;
			}
		}
		return $this->collUserLinkWps;
	}

	/**
	 * Returns the number of related UserLinkWp objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserLinkWp objects.
	 * @throws     PropelException
	 */
	public function countUserLinkWps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUserLinkWps || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserLinkWps) {
				return 0;
			} else {
				$query = UserLinkWpQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collUserLinkWps);
		}
	}

	/**
	 * Method called to associate a UserLinkWp object to this object
	 * through the UserLinkWp foreign key attribute.
	 *
	 * @param      UserLinkWp $l UserLinkWp
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserLinkWp(UserLinkWp $l)
	{
		if ($this->collUserLinkWps === null) {
			$this->initUserLinkWps();
		}
		if (!$this->collUserLinkWps->contains($l)) { // only add it if the **same** object is not already associated
			$this->collUserLinkWps[]= $l;
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related UserLinkWps from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserLinkWp[] List of UserLinkWp objects
	 */
	public function getUserLinkWpsJoinFindieWpUsers($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserLinkWpQuery::create(null, $criteria);
		$query->joinWith('FindieWpUsers', $join_behavior);

		return $this->getUserLinkWps($query, $con);
	}

	/**
	 * Clears out the collVenues collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addVenues()
	 */
	public function clearVenues()
	{
		$this->collVenues = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collVenues collection.
	 *
	 * By default this just sets the collVenues collection to an empty array (like clearcollVenues());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initVenues()
	{
		$this->collVenues = new PropelObjectCollection();
		$this->collVenues->setModel('Venue');
	}

	/**
	 * Gets an array of Venue objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Venue[] List of Venue objects
	 * @throws     PropelException
	 */
	public function getVenues($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collVenues || null !== $criteria) {
			if ($this->isNew() && null === $this->collVenues) {
				// return empty collection
				$this->initVenues();
			} else {
				$collVenues = VenueQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collVenues;
				}
				$this->collVenues = $collVenues;
			}
		}
		return $this->collVenues;
	}

	/**
	 * Returns the number of related Venue objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Venue objects.
	 * @throws     PropelException
	 */
	public function countVenues(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collVenues || null !== $criteria) {
			if ($this->isNew() && null === $this->collVenues) {
				return 0;
			} else {
				$query = VenueQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collVenues);
		}
	}

	/**
	 * Method called to associate a Venue object to this object
	 * through the Venue foreign key attribute.
	 *
	 * @param      Venue $l Venue
	 * @return     void
	 * @throws     PropelException
	 */
	public function addVenue(Venue $l)
	{
		if ($this->collVenues === null) {
			$this->initVenues();
		}
		if (!$this->collVenues->contains($l)) { // only add it if the **same** object is not already associated
			$this->collVenues[]= $l;
			$l->setUser($this);
		}
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related Venueratings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Venuerating[] List of Venuerating objects
	 */
	public function getVenueratingsJoinVenue($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = VenueratingQuery::create(null, $criteria);
		$query->joinWith('Venue', $join_behavior);

		return $this->getVenueratings($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->userid = null;
		$this->username = null;
		$this->password = null;
		$this->email = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collAlbumratings) {
				foreach ((array) $this->collAlbumratings as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collArtists) {
				foreach ((array) $this->collArtists as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collArtistratings) {
				foreach ((array) $this->collArtistratings as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collEvents) {
				foreach ((array) $this->collEvents as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUserLinkWps) {
				foreach ((array) $this->collUserLinkWps as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collVenues) {
				foreach ((array) $this->collVenues as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collVenueratings) {
				foreach ((array) $this->collVenueratings as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collAlbums = null;
		$this->collAlbumratings = null;
		$this->collArtists = null;
		$this->collArtistratings = null;
		$this->collEvents = null;
		$this->collUserLinkWps = null;
		$this->collVenues = null;
		$this->collVenueratings = null;
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

} // BaseUser
