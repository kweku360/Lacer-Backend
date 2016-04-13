<?php

namespace Map;

use \Judges;
use \JudgesQuery;
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
 * This class defines the structure of the 'judges' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class JudgesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.JudgesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'judges';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Judges';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Judges';

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
    const COL_ID = 'judges.id';

    /**
     * the column name for the judgeid field
     */
    const COL_JUDGEID = 'judges.judgeid';

    /**
     * the column name for the fullname field
     */
    const COL_FULLNAME = 'judges.fullname';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'judges.address';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'judges.email';

    /**
     * the column name for the court field
     */
    const COL_COURT = 'judges.court';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'judges.phone';

    /**
     * the column name for the courtnumber field
     */
    const COL_COURTNUMBER = 'judges.courtnumber';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'judges.status';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'judges.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'judges.modified';

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
        self::TYPE_PHPNAME       => array('Id', 'Judgeid', 'Fullname', 'Address', 'Email', 'Court', 'Phone', 'Courtnumber', 'Status', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'judgeid', 'fullname', 'address', 'email', 'court', 'phone', 'courtnumber', 'status', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(JudgesTableMap::COL_ID, JudgesTableMap::COL_JUDGEID, JudgesTableMap::COL_FULLNAME, JudgesTableMap::COL_ADDRESS, JudgesTableMap::COL_EMAIL, JudgesTableMap::COL_COURT, JudgesTableMap::COL_PHONE, JudgesTableMap::COL_COURTNUMBER, JudgesTableMap::COL_STATUS, JudgesTableMap::COL_CREATED, JudgesTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'judgeid', 'fullname', 'address', 'email', 'court', 'phone', 'courtnumber', 'status', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Judgeid' => 1, 'Fullname' => 2, 'Address' => 3, 'Email' => 4, 'Court' => 5, 'Phone' => 6, 'Courtnumber' => 7, 'Status' => 8, 'Created' => 9, 'Modified' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'judgeid' => 1, 'fullname' => 2, 'address' => 3, 'email' => 4, 'court' => 5, 'phone' => 6, 'courtnumber' => 7, 'status' => 8, 'created' => 9, 'modified' => 10, ),
        self::TYPE_COLNAME       => array(JudgesTableMap::COL_ID => 0, JudgesTableMap::COL_JUDGEID => 1, JudgesTableMap::COL_FULLNAME => 2, JudgesTableMap::COL_ADDRESS => 3, JudgesTableMap::COL_EMAIL => 4, JudgesTableMap::COL_COURT => 5, JudgesTableMap::COL_PHONE => 6, JudgesTableMap::COL_COURTNUMBER => 7, JudgesTableMap::COL_STATUS => 8, JudgesTableMap::COL_CREATED => 9, JudgesTableMap::COL_MODIFIED => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'judgeid' => 1, 'fullname' => 2, 'address' => 3, 'email' => 4, 'court' => 5, 'phone' => 6, 'courtnumber' => 7, 'status' => 8, 'created' => 9, 'modified' => 10, ),
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
        $this->setName('judges');
        $this->setPhpName('Judges');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Judges');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('judgeid', 'Judgeid', 'VARCHAR', true, 255, null);
        $this->addColumn('fullname', 'Fullname', 'VARCHAR', true, 255, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', false, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('court', 'Court', 'VARCHAR', true, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 20, null);
        $this->addColumn('courtnumber', 'Courtnumber', 'VARCHAR', true, 50, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 20, null);
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
        return $withPrefix ? JudgesTableMap::CLASS_DEFAULT : JudgesTableMap::OM_CLASS;
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
     * @return array           (Judges object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = JudgesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = JudgesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + JudgesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JudgesTableMap::OM_CLASS;
            /** @var Judges $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            JudgesTableMap::addInstanceToPool($obj, $key);
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
            $key = JudgesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = JudgesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Judges $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JudgesTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(JudgesTableMap::COL_ID);
            $criteria->addSelectColumn(JudgesTableMap::COL_JUDGEID);
            $criteria->addSelectColumn(JudgesTableMap::COL_FULLNAME);
            $criteria->addSelectColumn(JudgesTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(JudgesTableMap::COL_EMAIL);
            $criteria->addSelectColumn(JudgesTableMap::COL_COURT);
            $criteria->addSelectColumn(JudgesTableMap::COL_PHONE);
            $criteria->addSelectColumn(JudgesTableMap::COL_COURTNUMBER);
            $criteria->addSelectColumn(JudgesTableMap::COL_STATUS);
            $criteria->addSelectColumn(JudgesTableMap::COL_CREATED);
            $criteria->addSelectColumn(JudgesTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.judgeid');
            $criteria->addSelectColumn($alias . '.fullname');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.court');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.courtnumber');
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
        return Propel::getServiceContainer()->getDatabaseMap(JudgesTableMap::DATABASE_NAME)->getTable(JudgesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(JudgesTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(JudgesTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new JudgesTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Judges or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Judges object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(JudgesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Judges) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JudgesTableMap::DATABASE_NAME);
            $criteria->add(JudgesTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = JudgesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            JudgesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                JudgesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the judges table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return JudgesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Judges or Criteria object.
     *
     * @param mixed               $criteria Criteria or Judges object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JudgesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Judges object
        }

        if ($criteria->containsKey(JudgesTableMap::COL_ID) && $criteria->keyContainsValue(JudgesTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.JudgesTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = JudgesQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // JudgesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
JudgesTableMap::buildTableMap();
