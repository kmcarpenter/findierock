<?php



/**
 * This class defines the structure of the 'venue' table.
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
class VenueTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.VenueTableMap';

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
		$this->setName('venue');
		$this->setPhpName('Venue');
		$this->setClassname('Venue');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('VENUEID', 'Venueid', 'INTEGER', true, 11, null);
		$this->addColumn('ADDRESS', 'Address', 'VARCHAR', true, 100, null);
		$this->addColumn('ADDRESS2', 'Address2', 'VARCHAR', false, 100, null);
		$this->addColumn('CITY', 'City', 'VARCHAR', true, 45, null);
		$this->addColumn('PROVINCE', 'Province', 'VARCHAR', true, 45, null);
		$this->addColumn('COUNTRY', 'Country', 'VARCHAR', true, 45, null);
		$this->addColumn('LATITUDE', 'Latitude', 'DOUBLE', true, null, null);
		$this->addColumn('LONGITUDE', 'Longitude', 'DOUBLE', true, null, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 15, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 250, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('WEBSITE', 'Website', 'VARCHAR', false, 1000, null);
		$this->addColumn('TWITTER', 'Twitter', 'VARCHAR', false, 200, null);
		$this->addColumn('FACEBOOK', 'Facebook', 'VARCHAR', false, 200, null);
		$this->addColumn('RSSFEED', 'Rssfeed', 'VARCHAR', false, 200, null);
		$this->addColumn('CLOSED', 'Closed', 'TINYINT', true, 4, 0);
		$this->addColumn('LASTFMID', 'Lastfmid', 'INTEGER', false, 11, 0);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', false, 250, null);
		$this->addColumn('HASPHOTOS', 'Hasphotos', 'TINYINT', true, 1, 0);
		$this->addForeignKey('SUBMITTEDBYUSER', 'Submittedbyuser', 'INTEGER', 'user', 'USERID', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('SubmittedByUser' => 'userid', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('VenueId' => 'VenueId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Venuerating', 'Venuerating', RelationMap::ONE_TO_MANY, array('VenueId' => 'VenueId', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // VenueTableMap
