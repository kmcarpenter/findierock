<?php



/**
 * This class defines the structure of the 'albumtrack' table.
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
class AlbumtrackTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.AlbumtrackTableMap';

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
		$this->setName('albumtrack');
		$this->setPhpName('Albumtrack');
		$this->setClassname('Albumtrack');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TRACKID', 'Trackid', 'INTEGER', true, 11, null);
		$this->addForeignKey('ALBUMID', 'Albumid', 'INTEGER', 'album', 'ALBUMID', true, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('FILE', 'File', 'VARCHAR', false, 255, null);
		$this->addColumn('LENGTH', 'Length', 'INTEGER', false, 11, null);
		$this->addColumn('LASTFMID', 'Lastfmid', 'CHAR', false, 36, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Album', 'Album', RelationMap::MANY_TO_ONE, array('AlbumId' => 'AlbumId', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // AlbumtrackTableMap
