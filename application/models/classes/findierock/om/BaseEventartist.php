<?php


/**
 * Base class that represents a row from the 'eventartist' table.
 *
 * 
 *
 * @package    propel.generator.findierock.om
 */
abstract class BaseEventartist extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'EventartistPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        EventartistPeer
	 */
	protected static $peer;

	/**
	 * The value for the eventid field.
	 * @var        int
	 */
	protected $eventid;

	/**
	 * The value for the artistid field.
	 * @var        int
	 */
	protected $artistid;

	/**
	 * The value for the comments field.
	 * @var        string
	 */
	protected $comments;

	/**
	 * The value for the headliner field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $headliner;

	/**
	 * @var        Artist
	 */
	protected $aArtist;

	/**
	 * @var        Event
	 */
	protected $aEvent;

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
		$this->headliner = 0;
	}

	/**
	 * Initializes internal state of BaseEventartist object.
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
	 * Get the [artistid] column value.
	 * 
	 * @return     int
	 */
	public function getArtistid()
	{
		return $this->artistid;
	}

	/**
	 * Get the [comments] column value.
	 * 
	 * @return     string
	 */
	public function getComments()
	{
		return $this->comments;
	}

	/**
	 * Get the [headliner] column value.
	 * 
	 * @return     int
	 */
	public function getHeadliner()
	{
		return $this->headliner;
	}

	/**
	 * Set the value of [eventid] column.
	 * 
	 * @param      int $v new value
	 * @return     Eventartist The current object (for fluent API support)
	 */
	public function setEventid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->eventid !== $v) {
			$this->eventid = $v;
			$this->modifiedColumns[] = EventartistPeer::EVENTID;
		}

		if ($this->aEvent !== null && $this->aEvent->getEventid() !== $v) {
			$this->aEvent = null;
		}

		return $this;
	} // setEventid()

	/**
	 * Set the value of [artistid] column.
	 * 
	 * @param      int $v new value
	 * @return     Eventartist The current object (for fluent API support)
	 */
	public function setArtistid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->artistid !== $v) {
			$this->artistid = $v;
			$this->modifiedColumns[] = EventartistPeer::ARTISTID;
		}

		if ($this->aArtist !== null && $this->aArtist->getArtistid() !== $v) {
			$this->aArtist = null;
		}

		return $this;
	} // setArtistid()

	/**
	 * Set the value of [comments] column.
	 * 
	 * @param      string $v new value
	 * @return     Eventartist The current object (for fluent API support)
	 */
	public function setComments($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comments !== $v) {
			$this->comments = $v;
			$this->modifiedColumns[] = EventartistPeer::COMMENTS;
		}

		return $this;
	} // setComments()

	/**
	 * Set the value of [headliner] column.
	 * 
	 * @param      int $v new value
	 * @return     Eventartist The current object (for fluent API support)
	 */
	public function setHeadliner($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->headliner !== $v || $this->isNew()) {
			$this->headliner = $v;
			$this->modifiedColumns[] = EventartistPeer::HEADLINER;
		}

		return $this;
	} // setHeadliner()

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
			if ($this->headliner !== 0) {
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
			$this->artistid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->comments = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->headliner = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = EventartistPeer::NUM_COLUMNS - EventartistPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Eventartist object", $e);
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

		if ($this->aEvent !== null && $this->eventid !== $this->aEvent->getEventid()) {
			$this->aEvent = null;
		}
		if ($this->aArtist !== null && $this->artistid !== $this->aArtist->getArtistid()) {
			$this->aArtist = null;
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
			$con = Propel::getConnection(EventartistPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = EventartistPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aArtist = null;
			$this->aEvent = null;
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
			$con = Propel::getConnection(EventartistPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				EventartistQuery::create()
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
			$con = Propel::getConnection(EventartistPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				EventartistPeer::addInstanceToPool($this);
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

			if ($this->aArtist !== null) {
				if ($this->aArtist->isModified() || $this->aArtist->isNew()) {
					$affectedRows += $this->aArtist->save($con);
				}
				$this->setArtist($this->aArtist);
			}

			if ($this->aEvent !== null) {
				if ($this->aEvent->isModified() || $this->aEvent->isNew()) {
					$affectedRows += $this->aEvent->save($con);
				}
				$this->setEvent($this->aEvent);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setNew(false);
				} else {
					$affectedRows += EventartistPeer::doUpdate($this, $con);
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

			if ($this->aArtist !== null) {
				if (!$this->aArtist->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArtist->getValidationFailures());
				}
			}

			if ($this->aEvent !== null) {
				if (!$this->aEvent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEvent->getValidationFailures());
				}
			}


			if (($retval = EventartistPeer::doValidate($this, $columns)) !== true) {
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
		$pos = EventartistPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getArtistid();
				break;
			case 2:
				return $this->getComments();
				break;
			case 3:
				return $this->getHeadliner();
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
		$keys = EventartistPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getEventid(),
			$keys[1] => $this->getArtistid(),
			$keys[2] => $this->getComments(),
			$keys[3] => $this->getHeadliner(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aArtist) {
				$result['Artist'] = $this->aArtist->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aEvent) {
				$result['Event'] = $this->aEvent->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = EventartistPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setArtistid($value);
				break;
			case 2:
				$this->setComments($value);
				break;
			case 3:
				$this->setHeadliner($value);
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
		$keys = EventartistPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setEventid($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setArtistid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setComments($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHeadliner($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EventartistPeer::DATABASE_NAME);

		if ($this->isColumnModified(EventartistPeer::EVENTID)) $criteria->add(EventartistPeer::EVENTID, $this->eventid);
		if ($this->isColumnModified(EventartistPeer::ARTISTID)) $criteria->add(EventartistPeer::ARTISTID, $this->artistid);
		if ($this->isColumnModified(EventartistPeer::COMMENTS)) $criteria->add(EventartistPeer::COMMENTS, $this->comments);
		if ($this->isColumnModified(EventartistPeer::HEADLINER)) $criteria->add(EventartistPeer::HEADLINER, $this->headliner);

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
		$criteria = new Criteria(EventartistPeer::DATABASE_NAME);
		$criteria->add(EventartistPeer::EVENTID, $this->eventid);
		$criteria->add(EventartistPeer::ARTISTID, $this->artistid);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();
		$pks[0] = $this->getEventid();
		$pks[1] = $this->getArtistid();
		
		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{
		$this->setEventid($keys[0]);
		$this->setArtistid($keys[1]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getEventid()) && (null === $this->getArtistid());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Eventartist (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setEventid($this->eventid);
		$copyObj->setArtistid($this->artistid);
		$copyObj->setComments($this->comments);
		$copyObj->setHeadliner($this->headliner);

		$copyObj->setNew(true);
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
	 * @return     Eventartist Clone of current object.
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
	 * @return     EventartistPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EventartistPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Artist object.
	 *
	 * @param      Artist $v
	 * @return     Eventartist The current object (for fluent API support)
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
			$v->addEventartist($this);
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
			   $this->aArtist->addEventartists($this);
			 */
		}
		return $this->aArtist;
	}

	/**
	 * Declares an association between this object and a Event object.
	 *
	 * @param      Event $v
	 * @return     Eventartist The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setEvent(Event $v = null)
	{
		if ($v === null) {
			$this->setEventid(NULL);
		} else {
			$this->setEventid($v->getEventid());
		}

		$this->aEvent = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Event object, it will not be re-added.
		if ($v !== null) {
			$v->addEventartist($this);
		}

		return $this;
	}


	/**
	 * Get the associated Event object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Event The associated Event object.
	 * @throws     PropelException
	 */
	public function getEvent(PropelPDO $con = null)
	{
		if ($this->aEvent === null && ($this->eventid !== null)) {
			$this->aEvent = EventQuery::create()->findPk($this->eventid, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aEvent->addEventartists($this);
			 */
		}
		return $this->aEvent;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->eventid = null;
		$this->artistid = null;
		$this->comments = null;
		$this->headliner = null;
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
		} // if ($deep)

		$this->aArtist = null;
		$this->aEvent = null;
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

} // BaseEventartist
