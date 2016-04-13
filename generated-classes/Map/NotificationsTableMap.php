<?php

namespace Map;

use \Notifications;
use \NotificationsQuery;
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
 * This class defines the structure of the 'notifications' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class NotificationsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.NotificationsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'notifications';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Notifications';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Notifications';

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
    const COL_ID = 'notifications.id';

    /**
     * the column name for the documentid field
     */
    const COL_DOCUMENTID = 'notifications.documentid';

    /**
     * the column name for the documentlink field
     */
    const COL_DOCUMENTLINK = 'notifications.documentlink';

    /**
     * the column name for the filer field
     */
    const COL_FILER = 'notifications.filer';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'notifications.type';

    /**
     * the column name for the suitnumber field
     */
    const COL_SUITNUMBER = 'notifications.suitnumber';

    /**
     * the column name for the datetimesent field
     */
    const COL_DATETIMESENT = 'notifications.datetimesent';

    /**
     * the column name for the recipients field
     */
    const COL_RECIPIENTS = 'notifications.recipients';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'notifications.status';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'notifications.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'notifications.modified';

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
        self::TYPE_PHPNAME       => array('Id', 'Documentid', 'Documentlink', 'Filer', 'Type', 'Suitnumber', 'Datetimesent', 'Recipients', 'Status', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'documentid', 'documentlink', 'filer', 'type', 'suitnumber', 'datetimesent', 'recipients', 'status', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(NotificationsTableMap::COL_ID, NotificationsTableMap::COL_DOCUMENTID, NotificationsTableMap::COL_DOCUMENTLINK, NotificationsTableMap::COL_FILER, NotificationsTableMap::COL_TYPE, NotificationsTableMap::COL_SUITNUMBER, NotificationsTableMap::COL_DATETIMESENT, NotificationsTableMap::COL_RECIPIENTS, NotificationsTableMap::COL_STATUS, NotificationsTableMap::COL_CREATED, NotificationsTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'documentid', 'documentlink', 'filer', 'type', 'suitnumber', 'datetimesent', 'recipients', 'status', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Documentid' => 1, 'Documentlink' => 2, 'Filer' => 3, 'Type' => 4, 'Suitnumber' => 5, 'Datetimesent' => 6, 'Recipients' => 7, 'Status' => 8, 'Created' => 9, 'Modified' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'documentid' => 1, 'documentlink' => 2, 'filer' => 3, 'type' => 4, 'suitnumber' => 5, 'datetimesent' => 6, 'recipients' => 7, 'status' => 8, 'created' => 9, 'modified' => 10, ),
        self::TYPE_COLNAME       => array(NotificationsTableMap::COL_ID => 0, NotificationsTableMap::COL_DOCUMENTID => 1, NotificationsTableMap::COL_DOCUMENTLINK => 2, NotificationsTableMap::COL_FILER => 3, NotificationsTableMap::COL_TYPE => 4, NotificationsTableMap::COL_SUITNUMBER => 5, NotificationsTableMap::COL_DATETIMESENT => 6, NotificationsTableMap::COL_RECIPIENTS => 7, NotificationsTableMap::COL_STATUS => 8, NotificationsTableMap::COL_CREATED => 9, NotificationsTableMap::COL_MODIFIED => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'documentid' => 1, 'documentlink' => 2, 'filer' => 3, 'type' => 4, 'suitnumber' => 5, 'datetimesent' => 6, 'recipients' => 7, 'status' => 8, 'created' => 9, 'modified' => 10, ),
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
        $this->setName('notifications');
        $this->setPhpName('Notifications');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Notifications');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('documentid', 'Documentid', 'INTEGER', true, 13, null);
        $this->addColumn('documentlink', 'Documentlink', 'VARCHAR', true, 255, null);
        $this->addColumn('filer', 'Filer', 'VARCHAR', true, 255, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 255, null);
        $this->addColumn('suitnumber', 'Suitnumber', 'VARCHAR', true, 255, null);
        $this->addColumn('datetimesent', 'Datetimesent', 'INTEGER', true, null, null);
        $this->addColumn('recipients', 'Recipients', 'LONGVARCHAR', true, null, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? NotificationsTableMap::CLASS_DEFAULT : NotificationsTableMap::OM_CLASS;
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
     * @return array           (Notifications object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = NotificationsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = NotificationsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + NotificationsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NotificationsTableMap::OM_CLASS;
            /** @var Notifications $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            NotificationsTableMap::addInstanceToPool($obj, $key);
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
            $key = NotificationsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = NotificationsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Notifications $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NotificationsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(NotificationsTableMap::COL_ID);
            $criteria->addSelectColumn(NotificationsTableMap::COL_DOCUMENTID);
            $criteria->addSelectColumn(NotificationsTableMap::COL_DOCUMENTLINK);
            $criteria->addSelectColumn(NotificationsTableMap::COL_FILER);
            $criteria->addSelectColumn(NotificationsTableMap::COL_TYPE);
            $criteria->addSelectColumn(NotificationsTableMap::COL_SUITNUMBER);
            $criteria->addSelectColumn(NotificationsTableMap::COL_DATETIMESENT);
            $criteria->addSelectColumn(NotificationsTableMap::COL_RECIPIENTS);
            $criteria->addSelectColumn(NotificationsTableMap::COL_STATUS);
            $criteria->addSelectColumn(NotificationsTableMap::COL_CREATED);
            $criteria->addSelectColumn(NotificationsTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.documentid');
            $criteria->addSelectColumn($alias . '.documentlink');
            $criteria->addSelectColumn($alias . '.filer');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.suitnumber');
            $criteria->addSelectColumn($alias . '.datetimesent');
            $criteria->addSelectColumn($alias . '.recipients');
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
        return Propel::getServiceContainer()->getDatabaseMap(NotificationsTableMap::DATABASE_NAME)->getTable(NotificationsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(NotificationsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(NotificationsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new NotificationsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Notifications or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Notifications object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Notifications) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NotificationsTableMap::DATABASE_NAME);
            $criteria->add(NotificationsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = NotificationsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            NotificationsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                NotificationsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the notifications table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return NotificationsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Notifications or Criteria object.
     *
     * @param mixed               $criteria Criteria or Notifications object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Notifications object
        }

        if ($criteria->containsKey(NotificationsTableMap::COL_ID) && $criteria->keyContainsValue(NotificationsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.NotificationsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = NotificationsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // NotificationsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
NotificationsTableMap::buildTableMap();
