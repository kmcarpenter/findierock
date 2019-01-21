<?php



/**
 * This class defines the structure of the 'user_link_wp' table.
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
class UserLinkWpTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.UserLinkWpTableMap';

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
		$this->setName('user_link_wp');
		$this->setPhpName('UserLinkWp');
		$this->setClassname('UserLinkWp');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ID_ZEND', 'IdZend', 'INTEGER' , 'user', 'USERID', true, 11, null);
		$this->addForeignPrimaryKey('ID_WORDPRESS', 'IdWordpress', 'INTEGER' , 'findie_wp_users', 'ID', true, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('FindieWpUsers', 'FindieWpUsers', RelationMap::MANY_TO_ONE, array('id_wordpress' => 'ID', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('User', 'User', RelationMap::MANY_TO_ONE, array('id_zend' => 'userid', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // UserLinkWpTableMap
