<?php

namespace Map;

use \Suits;
use \SuitsQuery;
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
 * This class defines the structure of the 'suits' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SuitsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SuitsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'suits';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Suits';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Suits';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the id field
     */
    const COL_ID = 'suits.id';

    /**
     * the column name for the suitnumber field
     */
    const COL_SUITNUMBER = 'suits.suitnumber';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'suits.title';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'suits.type';

    /**
     * the column name for the datefiled field
     */
    const COL_DATEFILED = 'suits.datefiled';

    /**
     * the column name for the suitstatus field
     */
    const COL_SUITSTATUS = 'suits.suitstatus';

    /**
     * the column name for the suitaccess field
     */
    const COL_SUITACCESS = 'suits.suitaccess';

    /**
     * the column name for the suitdateid field
     */
    const COL_SUITDATEID = 'suits.suitdateid';

    /**
     * the column name for the suitcourt field
     */
    const COL_SUITCOURT = 'suits.suitcourt';

    /**
     * the column name for the userid field
     */
    const COL_USERID = 'suits.userid';

    /**
     * the column name for the dataentryname field
     */
    const COL_DATAENTRYNAME = 'suits.dataentryname';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'suits.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'suits.modified';

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
        self::TYPE_PHPNAME       => array('Id', 'Suitnumber', 'Title', 'Type', 'Datefiled', 'Suitstatus', 'Suitaccess', 'Suitdateid', 'Suitcourt', 'Userid', 'Dataentryname', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'suitnumber', 'title', 'type', 'datefiled', 'suitstatus', 'suitaccess', 'suitdateid', 'suitcourt', 'userid', 'dataentryname', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(SuitsTableMap::COL_ID, SuitsTableMap::COL_SUITNUMBER, SuitsTableMap::COL_TITLE, SuitsTableMap::COL_TYPE, SuitsTableMap::COL_DATEFILED, SuitsTableMap::COL_SUITSTATUS, SuitsTableMap::COL_SUITACCESS, SuitsTableMap::COL_SUITDATEID, SuitsTableMap::COL_SUITCOURT, SuitsTableMap::COL_USERID, SuitsTableMap::COL_DATAENTRYNAME, SuitsTableMap::COL_CREATED, SuitsTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'suitnumber', 'title', 'type', 'datefiled', 'suitstatus', 'suitaccess', 'suitdateid', 'suitcourt', 'userid', 'dataentryname', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Suitnumber' => 1, 'Title' => 2, 'Type' => 3, 'Datefiled' => 4, 'Suitstatus' => 5, 'Suitaccess' => 6, 'Suitdateid' => 7, 'Suitcourt' => 8, 'Userid' => 9, 'Dataentryname' => 10, 'Created' => 11, 'Modified' => 12, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'suitnumber' => 1, 'title' => 2, 'type' => 3, 'datefiled' => 4, 'suitstatus' => 5, 'suitaccess' => 6, 'suitdateid' => 7, 'suitcourt' => 8, 'userid' => 9, 'dataentryname' => 10, 'created' => 11, 'modified' => 12, ),
        self::TYPE_COLNAME       => array(SuitsTableMap::COL_ID => 0, SuitsTableMap::COL_SUITNUMBER => 1, SuitsTableMap::COL_TITLE => 2, SuitsTableMap::COL_TYPE => 3, SuitsTableMap::COL_DATEFILED => 4, SuitsTableMap::COL_SUITSTATUS => 5, SuitsTableMap::COL_SUITACCESS => 6, SuitsTableMap::COL_SUITDATEID => 7, SuitsTableMap::COL_SUITCOURT => 8, SuitsTableMap::COL_USERID => 9, SuitsTableMap::COL_DATAENTRYNAME => 10, SuitsTableMap::COL_CREATED => 11, SuitsTableMap::COL_MODIFIED => 12, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'suitnumber' => 1, 'title' => 2, 'type' => 3, 'datefiled' => 4, 'suitstatus' => 5, 'suitaccess' => 6, 'suitdateid' => 7, 'suitcourt' => 8, 'userid' => 9, 'dataentryname' => 10, 'created' => 11, 'modified' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('suits');
        $this->setPhpName('Suits');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Suits');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 12, null);
        $this->addColumn('suitnumber', 'Suitnumber', 'VARCHAR', true, 255, null);
        $this->addColumn('title', 'Title', 'LONGVARCHAR', true, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 255, null);
        $this->addColumn('datefiled', 'Datefiled', 'INTEGER', true, null, null);
        $this->addColumn('suitstatus', 'Suitstatus', 'VARCHAR', true, 255, null);
        $this->addColumn('suitaccess', 'Suitaccess', 'VARCHAR', true, 255, null);
        $this->addColumn('suitdateid', 'Suitdateid', 'INTEGER', false, 20, null);
        $this->addColumn('suitcourt', 'Suitcourt', 'VARCHAR', true, 255, null);
        $this->addColumn('userid', 'Userid', 'INTEGER', true, null, null);
        $this->addColumn('dataentryname', 'Dataentryname', 'INTEGER', true, null, null);
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
        return $withPrefix ? SuitsTableMap::CLASS_DEFAULT : SuitsTableMap::OM_CLASS;
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
     * @return array           (Suits object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SuitsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SuitsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SuitsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SuitsTableMap::OM_CLASS;
            /** @var Suits $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SuitsTableMap::addInstanceToPool($obj, $key);
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
            $key = SuitsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SuitsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Suits $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SuitsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SuitsTableMap::COL_ID);
            $criteria->addSelectColumn(SuitsTableMap::COL_SUITNUMBER);
            $criteria->addSelectColumn(SuitsTableMap::COL_TITLE);
            $criteria->addSelectColumn(SuitsTableMap::COL_TYPE);
            $criteria->addSelectColumn(SuitsTableMap::COL_DATEFILED);
            $criteria->addSelectColumn(SuitsTableMap::COL_SUITSTATUS);
            $criteria->addSelectColumn(SuitsTableMap::COL_SUITACCESS);
            $criteria->addSelectColumn(SuitsTableMap::COL_SUITDATEID);
            $criteria->addSelectColumn(SuitsTableMap::COL_SUITCOURT);
            $criteria->addSelectColumn(SuitsTableMap::COL_USERID);
            $criteria->addSelectColumn(SuitsTableMap::COL_DATAENTRYNAME);
            $criteria->addSelectColumn(SuitsTableMap::COL_CREATED);
            $criteria->addSelectColumn(SuitsTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.suitnumber');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.datefiled');
            $criteria->addSelectColumn($alias . '.suitstatus');
            $criteria->addSelectColumn($alias . '.suitaccess');
            $criteria->addSelectColumn($alias . '.suitdateid');
            $criteria->addSelectColumn($alias . '.suitcourt');
            $criteria->addSelectColumn($alias . '.userid');
            $criteria->addSelectColumn($alias . '.dataentryname');
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
        return Propel::getServiceContainer()->getDatabaseMap(SuitsTableMap::DATABASE_NAME)->getTable(SuitsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SuitsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SuitsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SuitsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Suits or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Suits object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SuitsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Suits) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SuitsTableMap::DATABASE_NAME);
            $criteria->add(SuitsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SuitsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SuitsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SuitsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the suits table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SuitsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Suits or Criteria object.
     *
     * @param mixed               $criteria Criteria or Suits object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Suits object
        }

        if ($criteria->containsKey(SuitsTableMap::COL_ID) && $criteria->keyContainsValue(SuitsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SuitsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SuitsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SuitsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SuitsTableMap::buildTableMap();
