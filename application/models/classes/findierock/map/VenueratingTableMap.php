<?php



/**
 * This class defines the structure of the 'venuerating' table.
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
class VenueratingTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.VenueratingTableMap';

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
		$this->setName('venuerating');
		$this->setPhpName('Venuerating');
		$this->setClassname('Venuerating');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('VENUEID', 'Venueid', 'INTEGER' , 'venue', 'VENUEID', true, 11, null);
		$this->addForeignPrimaryKey('USERID', 'Userid', 'INTEGER' , 'user', 'USERID', true, 11, null);
		$this->addColumn('RATING', 'Rating', 'SMALLINT', false, 6, null);
		$this->addColumn('COMMENTS', 'Comments', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Venue', 'Venue', RelationMap::MANY_TO_ONE, array('VenueId' => 'VenueId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('UserId' => 'userid', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // VenueratingTableMap
