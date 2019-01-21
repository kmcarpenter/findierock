<?php



/**
 * This class defines the structure of the 'trendtype' table.
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
class TrendtypeTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'findierock.map.TrendtypeTableMap';

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
		$this->setName('trendtype');
		$this->setPhpName('Trendtype');
		$this->setClassname('Trendtype');
		$this->setPackage('findierock');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TRENDTYPEID', 'Trendtypeid', 'INTEGER', true, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 45, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Trend', 'Trend', RelationMap::ONE_TO_MANY, array('TrendTypeId' => 'TrendTypeId', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // TrendtypeTableMap
