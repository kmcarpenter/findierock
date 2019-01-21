<?php



/**
 * This class defines the structure of the 'artistrating' table.
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
class ArtistratingTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.ArtistratingTableMap';

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
		$this->setName('artistrating');
		$this->setPhpName('Artistrating');
		$this->setClassname('Artistrating');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ARTISTID', 'Artistid', 'INTEGER' , 'artist', 'ARTISTID', true, 11, null);
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
    $this->addRelation('Artist', 'Artist', RelationMap::MANY_TO_ONE, array('ArtistId' => 'ArtistId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('UserId' => 'userid', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // ArtistratingTableMap
