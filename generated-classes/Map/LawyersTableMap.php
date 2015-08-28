<?php

namespace Map;

use \Lawyers;
use \LawyersQuery;
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
 * This class defines the structure of the 'lawyers' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class LawyersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.LawyersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'lawyers';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Lawyers';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Lawyers';

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
    const COL_ID = 'lawyers.id';

    /**
     * the column name for the fullname field
     */
    const COL_FULLNAME = 'lawyers.fullname';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'lawyers.phone';

    /**
     * the column name for the phonealt field
     */
    const COL_PHONEALT = 'lawyers.phonealt';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'lawyers.email';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'lawyers.address';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'lawyers.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'lawyers.modified';

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
        self::TYPE_PHPNAME       => array('Id', 'Fullname', 'Phone', 'Phonealt', 'Email', 'Address', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'fullname', 'phone', 'phonealt', 'email', 'address', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(LawyersTableMap::COL_ID, LawyersTableMap::COL_FULLNAME, LawyersTableMap::COL_PHONE, LawyersTableMap::COL_PHONEALT, LawyersTableMap::COL_EMAIL, LawyersTableMap::COL_ADDRESS, LawyersTableMap::COL_CREATED, LawyersTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'fullname', 'phone', 'phonealt', 'email', 'address', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Fullname' => 1, 'Phone' => 2, 'Phonealt' => 3, 'Email' => 4, 'Address' => 5, 'Created' => 6, 'Modified' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'fullname' => 1, 'phone' => 2, 'phonealt' => 3, 'email' => 4, 'address' => 5, 'created' => 6, 'modified' => 7, ),
        self::TYPE_COLNAME       => array(LawyersTableMap::COL_ID => 0, LawyersTableMap::COL_FULLNAME => 1, LawyersTableMap::COL_PHONE => 2, LawyersTableMap::COL_PHONEALT => 3, LawyersTableMap::COL_EMAIL => 4, LawyersTableMap::COL_ADDRESS => 5, LawyersTableMap::COL_CREATED => 6, LawyersTableMap::COL_MODIFIED => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'fullname' => 1, 'phone' => 2, 'phonealt' => 3, 'email' => 4, 'address' => 5, 'created' => 6, 'modified' => 7, ),
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
        $this->setName('lawyers');
        $this->setPhpName('Lawyers');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Lawyers');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('fullname', 'Fullname', 'VARCHAR', true, 255, null);
        $this->addColumn('phone', 'Phone', 'INTEGER', true, 12, null);
        $this->addColumn('phonealt', 'Phonealt', 'INTEGER', false, 12, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', false, null, null);
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
        return $withPrefix ? LawyersTableMap::CLASS_DEFAULT : LawyersTableMap::OM_CLASS;
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
     * @return array           (Lawyers object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = LawyersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = LawyersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + LawyersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LawyersTableMap::OM_CLASS;
            /** @var Lawyers $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            LawyersTableMap::addInstanceToPool($obj, $key);
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
            $key = LawyersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = LawyersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Lawyers $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LawyersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(LawyersTableMap::COL_ID);
            $criteria->addSelectColumn(LawyersTableMap::COL_FULLNAME);
            $criteria->addSelectColumn(LawyersTableMap::COL_PHONE);
            $criteria->addSelectColumn(LawyersTableMap::COL_PHONEALT);
            $criteria->addSelectColumn(LawyersTableMap::COL_EMAIL);
            $criteria->addSelectColumn(LawyersTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(LawyersTableMap::COL_CREATED);
            $criteria->addSelectColumn(LawyersTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.fullname');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.phonealt');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.address');
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
        return Propel::getServiceContainer()->getDatabaseMap(LawyersTableMap::DATABASE_NAME)->getTable(LawyersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(LawyersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(LawyersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new LawyersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Lawyers or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Lawyers object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(LawyersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Lawyers) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LawyersTableMap::DATABASE_NAME);
            $criteria->add(LawyersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = LawyersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            LawyersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                LawyersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the lawyers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return LawyersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Lawyers or Criteria object.
     *
     * @param mixed               $criteria Criteria or Lawyers object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LawyersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Lawyers object
        }

        if ($criteria->containsKey(LawyersTableMap::COL_ID) && $criteria->keyContainsValue(LawyersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.LawyersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = LawyersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // LawyersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
LawyersTableMap::buildTableMap();
