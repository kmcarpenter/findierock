<?php



/**
 * This class defines the structure of the 'member' table.
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
class MemberTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.MemberTableMap';

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
		$this->setName('member');
		$this->setPhpName('Member');
		$this->setClassname('Member');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('MEMBERID', 'Memberid', 'INTEGER', true, 11, null);
		$this->addColumn('SCREENNAME', 'Screenname', 'VARCHAR', true, 45, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // MemberTableMap
