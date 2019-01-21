<?php



/**
 * This class defines the structure of the 'albumrating' table.
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
class AlbumratingTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.AlbumratingTableMap';

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
		$this->setName('albumrating');
		$this->setPhpName('Albumrating');
		$this->setClassname('Albumrating');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ALBUMID', 'Albumid', 'INTEGER' , 'album', 'ALBUMID', true, 11, null);
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
    $this->addRelation('Album', 'Album', RelationMap::MANY_TO_ONE, array('AlbumId' => 'AlbumId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('UserId' => 'userid', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // AlbumratingTableMap
