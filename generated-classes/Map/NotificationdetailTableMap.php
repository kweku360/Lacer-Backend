<?php

namespace Map;

use \Notificationdetail;
use \NotificationdetailQuery;
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
 * This class defines the structure of the 'notificationdetail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class NotificationdetailTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.NotificationdetailTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'notificationdetail';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Notificationdetail';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Notificationdetail';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'notificationdetail.id';

    /**
     * the column name for the suitnumber field
     */
    const COL_SUITNUMBER = 'notificationdetail.suitnumber';

    /**
     * the column name for the notificationId field
     */
    const COL_NOTIFICATIONID = 'notificationdetail.notificationId';

    /**
     * the column name for the msgstatus field
     */
    const COL_MSGSTATUS = 'notificationdetail.msgstatus';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'notificationdetail.phone';

    /**
     * the column name for the msgtxt field
     */
    const COL_MSGTXT = 'notificationdetail.msgtxt';

    /**
     * the column name for the datetimesent field
     */
    const COL_DATETIMESENT = 'notificationdetail.datetimesent';

    /**
     * the column name for the msgid field
     */
    const COL_MSGID = 'notificationdetail.msgid';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'notificationdetail.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'notificationdetail.modified';

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
        self::TYPE_PHPNAME       => array('Id', 'Suitnumber', 'Notificationid', 'Msgstatus', 'Phone', 'Msgtxt', 'Datetimesent', 'Msgid', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'suitnumber', 'notificationid', 'msgstatus', 'phone', 'msgtxt', 'datetimesent', 'msgid', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(NotificationdetailTableMap::COL_ID, NotificationdetailTableMap::COL_SUITNUMBER, NotificationdetailTableMap::COL_NOTIFICATIONID, NotificationdetailTableMap::COL_MSGSTATUS, NotificationdetailTableMap::COL_PHONE, NotificationdetailTableMap::COL_MSGTXT, NotificationdetailTableMap::COL_DATETIMESENT, NotificationdetailTableMap::COL_MSGID, NotificationdetailTableMap::COL_CREATED, NotificationdetailTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'suitnumber', 'notificationId', 'msgstatus', 'phone', 'msgtxt', 'datetimesent', 'msgid', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Suitnumber' => 1, 'Notificationid' => 2, 'Msgstatus' => 3, 'Phone' => 4, 'Msgtxt' => 5, 'Datetimesent' => 6, 'Msgid' => 7, 'Created' => 8, 'Modified' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'suitnumber' => 1, 'notificationid' => 2, 'msgstatus' => 3, 'phone' => 4, 'msgtxt' => 5, 'datetimesent' => 6, 'msgid' => 7, 'created' => 8, 'modified' => 9, ),
        self::TYPE_COLNAME       => array(NotificationdetailTableMap::COL_ID => 0, NotificationdetailTableMap::COL_SUITNUMBER => 1, NotificationdetailTableMap::COL_NOTIFICATIONID => 2, NotificationdetailTableMap::COL_MSGSTATUS => 3, NotificationdetailTableMap::COL_PHONE => 4, NotificationdetailTableMap::COL_MSGTXT => 5, NotificationdetailTableMap::COL_DATETIMESENT => 6, NotificationdetailTableMap::COL_MSGID => 7, NotificationdetailTableMap::COL_CREATED => 8, NotificationdetailTableMap::COL_MODIFIED => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'suitnumber' => 1, 'notificationId' => 2, 'msgstatus' => 3, 'phone' => 4, 'msgtxt' => 5, 'datetimesent' => 6, 'msgid' => 7, 'created' => 8, 'modified' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('notificationdetail');
        $this->setPhpName('Notificationdetail');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Notificationdetail');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 13, null);
        $this->addColumn('suitnumber', 'Suitnumber', 'INTEGER', true, 13, null);
        $this->addColumn('notificationId', 'Notificationid', 'INTEGER', true, 13, null);
        $this->addColumn('msgstatus', 'Msgstatus', 'VARCHAR', true, 255, null);
        $this->addColumn('phone', 'Phone', 'INTEGER', true, 15, null);
        $this->addColumn('msgtxt', 'Msgtxt', 'LONGVARCHAR', true, null, null);
        $this->addColumn('datetimesent', 'Datetimesent', 'INTEGER', true, 15, null);
        $this->addColumn('msgid', 'Msgid', 'INTEGER', true, 13, null);
        $this->addColumn('created', 'Created', 'INTEGER', true, 13, null);
        $this->addColumn('modified', 'Modified', 'INTEGER', true, 13, null);
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
        return $withPrefix ? NotificationdetailTableMap::CLASS_DEFAULT : NotificationdetailTableMap::OM_CLASS;
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
     * @return array           (Notificationdetail object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = NotificationdetailTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = NotificationdetailTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + NotificationdetailTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NotificationdetailTableMap::OM_CLASS;
            /** @var Notificationdetail $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            NotificationdetailTableMap::addInstanceToPool($obj, $key);
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
            $key = NotificationdetailTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = NotificationdetailTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Notificationdetail $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NotificationdetailTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_ID);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_SUITNUMBER);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_NOTIFICATIONID);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_MSGSTATUS);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_PHONE);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_MSGTXT);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_DATETIMESENT);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_MSGID);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_CREATED);
            $criteria->addSelectColumn(NotificationdetailTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.suitnumber');
            $criteria->addSelectColumn($alias . '.notificationId');
            $criteria->addSelectColumn($alias . '.msgstatus');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.msgtxt');
            $criteria->addSelectColumn($alias . '.datetimesent');
            $criteria->addSelectColumn($alias . '.msgid');
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
        return Propel::getServiceContainer()->getDatabaseMap(NotificationdetailTableMap::DATABASE_NAME)->getTable(NotificationdetailTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(NotificationdetailTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(NotificationdetailTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new NotificationdetailTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Notificationdetail or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Notificationdetail object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationdetailTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Notificationdetail) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NotificationdetailTableMap::DATABASE_NAME);
            $criteria->add(NotificationdetailTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = NotificationdetailQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            NotificationdetailTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                NotificationdetailTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the notificationdetail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return NotificationdetailQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Notificationdetail or Criteria object.
     *
     * @param mixed               $criteria Criteria or Notificationdetail object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationdetailTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Notificationdetail object
        }

        if ($criteria->containsKey(NotificationdetailTableMap::COL_ID) && $criteria->keyContainsValue(NotificationdetailTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.NotificationdetailTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = NotificationdetailQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // NotificationdetailTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
NotificationdetailTableMap::buildTableMap();
