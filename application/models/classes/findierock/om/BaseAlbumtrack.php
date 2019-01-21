<?php


/**
 * Base class that represents a row from the 'albumtrack' table.
 *
 * 
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseAlbumtrack extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'AlbumtrackPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AlbumtrackPeer
	 */
	protected static $peer;

	/**
	 * The value for the trackid field.
	 * @var        int
	 */
	protected $trackid;

	/**
	 * The value for the albumid field.
	 * @var        int
	 */
	protected $albumid;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the file field.
	 * @var        string
	 */
	protected $file;

	/**
	 * The value for the length field.
	 * @var        int
	 */
	protected $length;

	/**
	 * The value for the lastfmid field.
	 * @var        string
	 */
	protected $lastfmid;

	/**
	 * @var        Album
	 */
	protected $aAlbum;

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
	 * Get the [trackid] column value.
	 * 
	 * @return     int
	 */
	public function getTrackid()
	{
		return $this->trackid;
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
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [file] column value.
	 * 
	 * @return     string
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * Get the [length] column value.
	 * 
	 * @return     int
	 */
	public function getLength()
	{
		return $this->length;
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
	 * Set the value of [trackid] column.
	 * 
	 * @param      int $v new value
	 * @return     Albumtrack The current object (for fluent API support)
	 */
	public function setTrackid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->trackid !== $v) {
			$this->trackid = $v;
			$this->modifiedColumns[] = AlbumtrackPeer::TRACKID;
		}

		return $this;
	} // setTrackid()

	/**
	 * Set the value of [albumid] column.
	 * 
	 * @param      int $v new value
	 * @return     Albumtrack The current object (for fluent API support)
	 */
	public function setAlbumid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->albumid !== $v) {
			$this->albumid = $v;
			$this->modifiedColumns[] = AlbumtrackPeer::ALBUMID;
		}

		if ($this->aAlbum !== null && $this->aAlbum->getAlbumid() !== $v) {
			$this->aAlbum = null;
		}

		return $this;
	} // setAlbumid()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Albumtrack The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AlbumtrackPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [file] column.
	 * 
	 * @param      string $v new value
	 * @return     Albumtrack The current object (for fluent API support)
	 */
	public function setFile($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->file !== $v) {
			$this->file = $v;
			$this->modifiedColumns[] = AlbumtrackPeer::FILE;
		}

		return $this;
	} // setFile()

	/**
	 * Set the value of [length] column.
	 * 
	 * @param      int $v new value
	 * @return     Albumtrack The current object (for fluent API support)
	 */
	public function setLength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->length !== $v) {
			$this->length = $v;
			$this->modifiedColumns[] = AlbumtrackPeer::LENGTH;
		}

		return $this;
	} // setLength()

	/**
	 * Set the value of [lastfmid] column.
	 * 
	 * @param      string $v new value
	 * @return     Albumtrack The current object (for fluent API support)
	 */
	public function setLastfmid($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lastfmid !== $v) {
			$this->lastfmid = $v;
			$this->modifiedColumns[] = AlbumtrackPeer::LASTFMID;
		}

		return $this;
	} // setLastfmid()

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

			$this->trackid = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->albumid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->file = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->length = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->lastfmid = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = AlbumtrackPeer::NUM_COLUMNS - AlbumtrackPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Albumtrack object", $e);
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

		if ($this->aAlbum !== null && $this->albumid !== $this->aAlbum->getAlbumid()) {
			$this->aAlbum = null;
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
			$con = Propel::getConnection(AlbumtrackPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AlbumtrackPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAlbum = null;
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
			$con = Propel::getConnection(AlbumtrackPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				AlbumtrackQuery::create()
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
			$con = Propel::getConnection(AlbumtrackPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AlbumtrackPeer::addInstanceToPool($this);
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

			if ($this->aAlbum !== null) {
				if ($this->aAlbum->isModified() || $this->aAlbum->isNew()) {
					$affectedRows += $this->aAlbum->save($con);
				}
				$this->setAlbum($this->aAlbum);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AlbumtrackPeer::TRACKID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AlbumtrackPeer::TRACKID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AlbumtrackPeer::TRACKID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setTrackid($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += AlbumtrackPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aAlbum !== null) {
				if (!$this->aAlbum->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlbum->getValidationFailures());
				}
			}


			if (($retval = AlbumtrackPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = AlbumtrackPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTrackid();
				break;
			case 1:
				return $this->getAlbumid();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getFile();
				break;
			case 4:
				return $this->getLength();
				break;
			case 5:
				return $this->getLastfmid();
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
		$keys = AlbumtrackPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTrackid(),
			$keys[1] => $this->getAlbumid(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getFile(),
			$keys[4] => $this->getLength(),
			$keys[5] => $this->getLastfmid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAlbum) {
				$result['Album'] = $this->aAlbum->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = AlbumtrackPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTrackid($value);
				break;
			case 1:
				$this->setAlbumid($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setFile($value);
				break;
			case 4:
				$this->setLength($value);
				break;
			case 5:
				$this->setLastfmid($value);
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
		$keys = AlbumtrackPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTrackid($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAlbumid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFile($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLength($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLastfmid($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AlbumtrackPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlbumtrackPeer::TRACKID)) $criteria->add(AlbumtrackPeer::TRACKID, $this->trackid);
		if ($this->isColumnModified(AlbumtrackPeer::ALBUMID)) $criteria->add(AlbumtrackPeer::ALBUMID, $this->albumid);
		if ($this->isColumnModified(AlbumtrackPeer::NAME)) $criteria->add(AlbumtrackPeer::NAME, $this->name);
		if ($this->isColumnModified(AlbumtrackPeer::FILE)) $criteria->add(AlbumtrackPeer::FILE, $this->file);
		if ($this->isColumnModified(AlbumtrackPeer::LENGTH)) $criteria->add(AlbumtrackPeer::LENGTH, $this->length);
		if ($this->isColumnModified(AlbumtrackPeer::LASTFMID)) $criteria->add(AlbumtrackPeer::LASTFMID, $this->lastfmid);

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
		$criteria = new Criteria(AlbumtrackPeer::DATABASE_NAME);
		$criteria->add(AlbumtrackPeer::TRACKID, $this->trackid);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getTrackid();
	}

	/**
	 * Generic method to set the primary key (trackid column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setTrackid($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getTrackid();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Albumtrack (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setAlbumid($this->albumid);
		$copyObj->setName($this->name);
		$copyObj->setFile($this->file);
		$copyObj->setLength($this->length);
		$copyObj->setLastfmid($this->lastfmid);

		$copyObj->setNew(true);
		$copyObj->setTrackid(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Albumtrack Clone of current object.
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
	 * @return     AlbumtrackPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlbumtrackPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Album object.
	 *
	 * @param      Album $v
	 * @return     Albumtrack The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAlbum(Album $v = null)
	{
		if ($v === null) {
			$this->setAlbumid(NULL);
		} else {
			$this->setAlbumid($v->getAlbumid());
		}

		$this->aAlbum = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Album object, it will not be re-added.
		if ($v !== null) {
			$v->addAlbumtrack($this);
		}

		return $this;
	}


	/**
	 * Get the associated Album object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Album The associated Album object.
	 * @throws     PropelException
	 */
	public function getAlbum(PropelPDO $con = null)
	{
		if ($this->aAlbum === null && ($this->albumid !== null)) {
			$this->aAlbum = AlbumQuery::create()->findPk($this->albumid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAlbum->addAlbumtracks($this);
			 */
		}
		return $this->aAlbum;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->trackid = null;
		$this->albumid = null;
		$this->name = null;
		$this->file = null;
		$this->length = null;
		$this->lastfmid = null;
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
		} // if ($deep)

		$this->aAlbum = null;
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

} // BaseAlbumtrack
