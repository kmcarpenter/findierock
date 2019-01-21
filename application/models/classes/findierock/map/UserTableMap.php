<?php



/**
 * This class defines the structure of the 'user' table.
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
class UserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.UserTableMap';

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
		$this->setName('user');
		$this->setPhpName('User');
		$this->setClassname('User');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('USERID', 'Userid', 'INTEGER', true, 11, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 100, null);
		$this->addColumn('PASSWORD', 'Password', 'CHAR', true, 40, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Album', 'Album', RelationMap::ONE_TO_MANY, array('userid' => 'SubmittedByUser', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Albumrating', 'Albumrating', RelationMap::ONE_TO_MANY, array('userid' => 'UserId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Artist', 'Artist', RelationMap::ONE_TO_MANY, array('userid' => 'SubmittedByUser', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Artistrating', 'Artistrating', RelationMap::ONE_TO_MANY, array('userid' => 'UserId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('userid' => 'SubmittedByUser', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('UserLinkWp', 'UserLinkWp', RelationMap::ONE_TO_MANY, array('userid' => 'id_zend', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Venue', 'Venue', RelationMap::ONE_TO_MANY, array('userid' => 'SubmittedByUser', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Venuerating', 'Venuerating', RelationMap::ONE_TO_MANY, array('userid' => 'UserId', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // UserTableMap
