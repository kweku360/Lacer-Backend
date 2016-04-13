<?php

namespace Map;

use \Suitlawyers;
use \SuitlawyersQuery;
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
 * This class defines the structure of the 'suitlawyers' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SuitlawyersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SuitlawyersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'suitlawyers';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Suitlawyers';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Suitlawyers';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'suitlawyers.id';

    /**
     * the column name for the suitid field
     */
    const COL_SUITID = 'suitlawyers.suitid';

    /**
     * the column name for the suitnumber field
     */
    const COL_SUITNUMBER = 'suitlawyers.suitnumber';

    /**
     * the column name for the lawyerid field
     */
    const COL_LAWYERID = 'suitlawyers.lawyerid';

    /**
     * the column name for the lawyertype field
     */
    const COL_LAWYERTYPE = 'suitlawyers.lawyertype';

    /**
     * the column name for the lawyernumber field
     */
    const COL_LAWYERNUMBER = 'suitlawyers.lawyernumber';

    /**
     * the column name for the lawyername field
     */
    const COL_LAWYERNAME = 'suitlawyers.lawyername';

    /**
     * the column name for the registertype field
     */
    const COL_REGISTERTYPE = 'suitlawyers.registertype';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'suitlawyers.status';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'suitlawyers.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'suitlawyers.modified';

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
        self::TYPE_PHPNAME       => array('Id', 'Suitid', 'Suitnumber', 'Lawyerid', 'Lawyertype', 'Lawyernumber', 'Lawyername', 'Registertype', 'Status', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'suitid', 'suitnumber', 'lawyerid', 'lawyertype', 'lawyernumber', 'lawyername', 'registertype', 'status', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(SuitlawyersTableMap::COL_ID, SuitlawyersTableMap::COL_SUITID, SuitlawyersTableMap::COL_SUITNUMBER, SuitlawyersTableMap::COL_LAWYERID, SuitlawyersTableMap::COL_LAWYERTYPE, SuitlawyersTableMap::COL_LAWYERNUMBER, SuitlawyersTableMap::COL_LAWYERNAME, SuitlawyersTableMap::COL_REGISTERTYPE, SuitlawyersTableMap::COL_STATUS, SuitlawyersTableMap::COL_CREATED, SuitlawyersTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'suitid', 'suitnumber', 'lawyerid', 'lawyertype', 'lawyernumber', 'lawyername', 'registertype', 'status', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Suitid' => 1, 'Suitnumber' => 2, 'Lawyerid' => 3, 'Lawyertype' => 4, 'Lawyernumber' => 5, 'Lawyername' => 6, 'Registertype' => 7, 'Status' => 8, 'Created' => 9, 'Modified' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'suitid' => 1, 'suitnumber' => 2, 'lawyerid' => 3, 'lawyertype' => 4, 'lawyernumber' => 5, 'lawyername' => 6, 'registertype' => 7, 'status' => 8, 'created' => 9, 'modified' => 10, ),
        self::TYPE_COLNAME       => array(SuitlawyersTableMap::COL_ID => 0, SuitlawyersTableMap::COL_SUITID => 1, SuitlawyersTableMap::COL_SUITNUMBER => 2, SuitlawyersTableMap::COL_LAWYERID => 3, SuitlawyersTableMap::COL_LAWYERTYPE => 4, SuitlawyersTableMap::COL_LAWYERNUMBER => 5, SuitlawyersTableMap::COL_LAWYERNAME => 6, SuitlawyersTableMap::COL_REGISTERTYPE => 7, SuitlawyersTableMap::COL_STATUS => 8, SuitlawyersTableMap::COL_CREATED => 9, SuitlawyersTableMap::COL_MODIFIED => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'suitid' => 1, 'suitnumber' => 2, 'lawyerid' => 3, 'lawyertype' => 4, 'lawyernumber' => 5, 'lawyername' => 6, 'registertype' => 7, 'status' => 8, 'created' => 9, 'modified' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('suitlawyers');
        $this->setPhpName('Suitlawyers');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Suitlawyers');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('suitid', 'Suitid', 'INTEGER', true, null, null);
        $this->addColumn('suitnumber', 'Suitnumber', 'VARCHAR', true, 255, null);
        $this->addColumn('lawyerid', 'Lawyerid', 'INTEGER', true, null, null);
        $this->addColumn('lawyertype', 'Lawyertype', 'VARCHAR', true, 255, null);
        $this->addColumn('lawyernumber', 'Lawyernumber', 'VARCHAR', true, 255, null);
        $this->addColumn('lawyername', 'Lawyername', 'VARCHAR', true, 255, null);
        $this->addColumn('registertype', 'Registertype', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 255, null);
        $this->addColumn('created', 'Created', 'INTEGER', true, null, null);
        $this->addColumn('modified', 'Modified', 'INTEGER', true, 12, null);
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
        return $withPrefix ? SuitlawyersTableMap::CLASS_DEFAULT : SuitlawyersTableMap::OM_CLASS;
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
     * @return array           (Suitlawyers object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SuitlawyersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SuitlawyersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SuitlawyersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SuitlawyersTableMap::OM_CLASS;
            /** @var Suitlawyers $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SuitlawyersTableMap::addInstanceToPool($obj, $key);
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
            $key = SuitlawyersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SuitlawyersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Suitlawyers $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SuitlawyersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_ID);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_SUITID);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_SUITNUMBER);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_LAWYERID);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_LAWYERTYPE);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_LAWYERNUMBER);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_LAWYERNAME);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_REGISTERTYPE);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_STATUS);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_CREATED);
            $criteria->addSelectColumn(SuitlawyersTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.suitid');
            $criteria->addSelectColumn($alias . '.suitnumber');
            $criteria->addSelectColumn($alias . '.lawyerid');
            $criteria->addSelectColumn($alias . '.lawyertype');
            $criteria->addSelectColumn($alias . '.lawyernumber');
            $criteria->addSelectColumn($alias . '.lawyername');
            $criteria->addSelectColumn($alias . '.registertype');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(SuitlawyersTableMap::DATABASE_NAME)->getTable(SuitlawyersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SuitlawyersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SuitlawyersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SuitlawyersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Suitlawyers or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Suitlawyers object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SuitlawyersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Suitlawyers) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SuitlawyersTableMap::DATABASE_NAME);
            $criteria->add(SuitlawyersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SuitlawyersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SuitlawyersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SuitlawyersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the suitlawyers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SuitlawyersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Suitlawyers or Criteria object.
     *
     * @param mixed               $criteria Criteria or Suitlawyers object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitlawyersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Suitlawyers object
        }

        if ($criteria->containsKey(SuitlawyersTableMap::COL_ID) && $criteria->keyContainsValue(SuitlawyersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SuitlawyersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SuitlawyersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SuitlawyersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SuitlawyersTableMap::buildTableMap();
