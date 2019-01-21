<?php



/**
 * This class defines the structure of the 'artist' table.
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
class ArtistTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.ArtistTableMap';

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
		$this->setName('artist');
		$this->setPhpName('Artist');
		$this->setClassname('Artist');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ARTISTID', 'Artistid', 'INTEGER', true, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 250, null);
		$this->addColumn('CITY', 'City', 'VARCHAR', false, 45, null);
		$this->addColumn('PROVINCE', 'Province', 'VARCHAR', false, 45, null);
		$this->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 45, null);
		$this->addColumn('INTRO', 'Intro', 'LONGVARCHAR', false, null, null);
		$this->addColumn('BIOGRAPHY', 'Biography', 'CLOB', false, null, null);
		$this->addColumn('WEBSITE', 'Website', 'VARCHAR', false, 100, null);
		$this->addColumn('TWITTER', 'Twitter', 'VARCHAR', false, 45, null);
		$this->addColumn('FACEBOOK', 'Facebook', 'VARCHAR', false, 45, null);
		$this->addColumn('RSS', 'Rss', 'VARCHAR', false, 45, null);
		$this->addColumn('BROKENUP', 'Brokenup', 'TINYINT', true, 4, 0);
		$this->addColumn('LASTFMID', 'Lastfmid', 'CHAR', false, 36, null);
		$this->addColumn('ARTISTCOL', 'Artistcol', 'VARCHAR', false, 45, null);
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
    $this->addRelation('Album', 'Album', RelationMap::ONE_TO_MANY, array('ArtistId' => 'ArtistId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Artistrating', 'Artistrating', RelationMap::ONE_TO_MANY, array('ArtistId' => 'ArtistId', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Eventartist', 'Eventartist', RelationMap::ONE_TO_MANY, array('ArtistId' => 'ArtistId', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // ArtistTableMap
