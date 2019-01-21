<?php



/**
 * This class defines the structure of the 'album' table.
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
class AlbumTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.AlbumTableMap';

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
		$this->setName('album');
		$this->setPhpName('Album');
		$this->setClassname('Album');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ALBUMID', 'Albumid', 'INTEGER', true, 11, null);
		$this->addForeignKey('ARTISTID', 'Artistid', 'INTEGER', 'artist', 'ARTISTID', true, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 250, null);
		$this->addColumn('LABEL', 'Label', 'VARCHAR', false, 45, null);
		$this->addColumn('COPYRIGHT', 'Copyright', 'DATE', false, null, null);
		$this->addColumn('PRODUCER', 'Producer', 'VARCHAR', false, 100, null);
		$this->addColumn('LASTFMID', 'Lastfmid', 'CHAR', false, 36, '');
		$this->addColumn('RELEASEDATE', 'Releasedate', 'DATE', false, null, null);
		$this->addColumn('ALBUMTYPE', 'Albumtype', 'VARCHAR', false, 255, null);
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
    $this->addRelation('Artist', 'Artist', RelationMap::MANY_TO_ONE, array('ArtistId' => 'ArtistId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Albumrating', 'Albumrating', RelationMap::ONE_TO_MANY, array('AlbumId' => 'AlbumId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Albumtrack', 'Albumtrack', RelationMap::ONE_TO_MANY, array('AlbumId' => 'AlbumId', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // AlbumTableMap
