<?php

namespace Map;

use \Suitjudges;
use \SuitjudgesQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'suitjudges' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SuitjudgesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SuitjudgesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'suitjudges';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Suitjudges';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Suitjudges';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'suitjudges.id';

    /**
     * the column name for the suitid field
     */
    const COL_SUITID = 'suitjudges.suitid';

    /**
     * the column name for the suitnumber field
     */
    const COL_SUITNUMBER = 'suitjudges.suitnumber';

    /**
     * the column name for the judgeid field
     */
    const COL_JUDGEID = 'suitjudges.judgeid';

    /**
     * the column name for the judgenumber field
     */
    const COL_JUDGENUMBER = 'suitjudges.judgenumber';

    /**
     * the column name for the judgename field
     */
    const COL_JUDGENAME = 'suitjudges.judgename';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'suitjudges.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'suitjudges.modified';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Suitid', 'Suitnumber', 'Judgeid', 'Judgenumber', 'Judgename', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'suitid', 'suitnumber', 'judgeid', 'judgenumber', 'judgename', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(SuitjudgesTableMap::COL_ID, SuitjudgesTableMap::COL_SUITID, SuitjudgesTableMap::COL_SUITNUMBER, SuitjudgesTableMap::COL_JUDGEID, SuitjudgesTableMap::COL_JUDGENUMBER, SuitjudgesTableMap::COL_JUDGENAME, SuitjudgesTableMap::COL_CREATED, SuitjudgesTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'suitid', 'suitnumber', 'judgeid', 'judgenumber', 'judgename', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Suitid' => 1, 'Suitnumber' => 2, 'Judgeid' => 3, 'Judgenumber' => 4, 'Judgename' => 5, 'Created' => 6, 'Modified' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'suitid' => 1, 'suitnumber' => 2, 'judgeid' => 3, 'judgenumber' => 4, 'judgename' => 5, 'created' => 6, 'modified' => 7, ),
        self::TYPE_COLNAME       => array(SuitjudgesTableMap::COL_ID => 0, SuitjudgesTableMap::COL_SUITID => 1, SuitjudgesTableMap::COL_SUITNUMBER => 2, SuitjudgesTableMap::COL_JUDGEID => 3, SuitjudgesTableMap::COL_JUDGENUMBER => 4, SuitjudgesTableMap::COL_JUDGENAME => 5, SuitjudgesTableMap::COL_CREATED => 6, SuitjudgesTableMap::COL_MODIFIED => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'suitid' => 1, 'suitnumber' => 2, 'judgeid' => 3, 'judgenumber' => 4, 'judgename' => 5, 'created' => 6, 'modified' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('suitjudges');
        $this->setPhpName('Suitjudges');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Suitjudges');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('suitid', 'Suitid', 'INTEGER', true, null, null);
        $this->addColumn('suitnumber', 'Suitnumber', 'VARCHAR', true, 255, null);
        $this->addColumn('judgeid', 'Judgeid', 'INTEGER', true, null, null);
        $this->addColumn('judgenumber', 'Judgenumber', 'VARCHAR', true, 255, null);
        $this->addColumn('judgename', 'Judgename', 'VARCHAR', true, 255, null);
        $this->addColumn('created', 'Created', 'INTEGER', true, null, null);
        $this->addColumn('modified', 'Modified', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? SuitjudgesTableMap::CLASS_DEFAULT : SuitjudgesTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Suitjudges object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SuitjudgesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SuitjudgesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SuitjudgesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SuitjudgesTableMap::OM_CLASS;
            /** @var Suitjudges $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SuitjudgesTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = SuitjudgesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SuitjudgesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Suitjudges $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SuitjudgesTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SuitjudgesTableMap::COL_ID);
            $criteria->addSelectColumn(SuitjudgesTableMap::COL_SUITID);
            $criteria->addSelectColumn(SuitjudgesTableMap::COL_SUITNUMBER);
            $criteria->addSelectColumn(SuitjudgesTableMap::COL_JUDGEID);
            $criteria->addSelectColumn(SuitjudgesTableMap::COL_JUDGENUMBER);
            $criteria->addSelectColumn(SuitjudgesTableMap::COL_JUDGENAME);
            $criteria->addSelectColumn(SuitjudgesTableMap::COL_CREATED);
            $criteria->addSelectColumn(SuitjudgesTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.suitid');
            $criteria->addSelectColumn($alias . '.suitnumber');
            $criteria->addSelectColumn($alias . '.judgeid');
            $criteria->addSelectColumn($alias . '.judgenumber');
            $criteria->addSelectColumn($alias . '.judgename');
            $criteria->addSelectColumn($alias . '.created');
            $criteria->addSelectColumn($alias . '.modified');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(SuitjudgesTableMap::DATABASE_NAME)->getTable(SuitjudgesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SuitjudgesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SuitjudgesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SuitjudgesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Suitjudges or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Suitjudges object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitjudgesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Suitjudges) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SuitjudgesTableMap::DATABASE_NAME);
            $criteria->add(SuitjudgesTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SuitjudgesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SuitjudgesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SuitjudgesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the suitjudges table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SuitjudgesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Suitjudges or Criteria object.
     *
     * @param mixed               $criteria Criteria or Suitjudges object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitjudgesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Suitjudges object
        }

        if ($criteria->containsKey(SuitjudgesTableMap::COL_ID) && $criteria->keyContainsValue(SuitjudgesTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SuitjudgesTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SuitjudgesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SuitjudgesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SuitjudgesTableMap::buildTableMap();
