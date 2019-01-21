<?php



/**
 * This class defines the structure of the 'event' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.findierock.map
 */
class EventTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.EventTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('event');
		$this->setPhpName('Event');
		$this->setClassname('Event');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('EVENTID', 'Eventid', 'INTEGER', true, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 250, null);
		$this->addColumn('START', 'Start', 'TIMESTAMP', true, null, null);
		$this->addColumn('FINISH', 'Finish', 'VARCHAR', false, 45, null);
		$this->addColumn('COVER', 'Cover', 'DECIMAL', false, 5, null);
		$this->addColumn('AGEOFMAJORITY', 'Ageofmajority', 'TINYINT', true, 4, 1);
		$this->addForeignKey('EVENTTYPEID', 'Eventtypeid', 'INTEGER', 'eventtype', 'EVENTTYPEID', true, 11, null);
		$this->addColumn('LASTFMID', 'Lastfmid', 'INTEGER', false, 11, null);
		$this->addForeignKey('VENUEID', 'Venueid', 'INTEGER', 'venue', 'VENUEID', true, 11, null);
		$this->addColumn('CANCELLED', 'Cancelled', 'TINYINT', true, 4, 0);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', false, 250, null);
		$this->addForeignKey('SUBMITTEDBYUSER', 'Submittedbyuser', 'INTEGER', 'user', 'USERID', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('SubmittedByUser' => 'userid', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Eventtype', 'Eventtype', RelationMap::MANY_TO_ONE, array('EventTypeId' => 'EventTypeId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Venue', 'Venue', RelationMap::MANY_TO_ONE, array('VenueId' => 'VenueId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Eventartist', 'Eventartist', RelationMap::ONE_TO_MANY, array('EventId' => 'EventId', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // EventTableMap
