<?php



/**
 * This class defines the structure of the 'eventartist' table.
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
class EventartistTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.EventartistTableMap';

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
		$this->setName('eventartist');
		$this->setPhpName('Eventartist');
		$this->setClassname('Eventartist');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('EVENTID', 'Eventid', 'INTEGER' , 'event', 'EVENTID', true, 11, null);
		$this->addForeignPrimaryKey('ARTISTID', 'Artistid', 'INTEGER' , 'artist', 'ARTISTID', true, 11, null);
		$this->addColumn('COMMENTS', 'Comments', 'LONGVARCHAR', false, null, null);
		$this->addColumn('HEADLINER', 'Headliner', 'TINYINT', false, 4, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Artist', 'Artist', RelationMap::MANY_TO_ONE, array('ArtistId' => 'ArtistId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Event', 'Event', RelationMap::MANY_TO_ONE, array('EventId' => 'EventId', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // EventartistTableMap
