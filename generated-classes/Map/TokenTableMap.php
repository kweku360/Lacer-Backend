<?php

namespace Map;

use \Token;
use \TokenQuery;
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
 * This class defines the structure of the 'token' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TokenTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TokenTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'token';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Token';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Token';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'token.id';

    /**
     * the column name for the selector field
     */
    const COL_SELECTOR = 'token.selector';

    /**
     * the column name for the token field
     */
    const COL_TOKEN = 'token.token';

    /**
     * the column name for the userid field
     */
    const COL_USERID = 'token.userid';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'token.type';

    /**
     * the column name for the expires field
     */
    const COL_EXPIRES = 'token.expires';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'token.status';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'token.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'token.modified';

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
        self::TYPE_PHPNAME       => array('Id', 'Selector', 'Token', 'Userid', 'Type', 'Expires', 'Status', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'selector', 'token', 'userid', 'type', 'expires', 'status', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(TokenTableMap::COL_ID, TokenTableMap::COL_SELECTOR, TokenTableMap::COL_TOKEN, TokenTableMap::COL_USERID, TokenTableMap::COL_TYPE, TokenTableMap::COL_EXPIRES, TokenTableMap::COL_STATUS, TokenTableMap::COL_CREATED, TokenTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'selector', 'token', 'userid', 'type', 'expires', 'status', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Selector' => 1, 'Token' => 2, 'Userid' => 3, 'Type' => 4, 'Expires' => 5, 'Status' => 6, 'Created' => 7, 'Modified' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'selector' => 1, 'token' => 2, 'userid' => 3, 'type' => 4, 'expires' => 5, 'status' => 6, 'created' => 7, 'modified' => 8, ),
        self::TYPE_COLNAME       => array(TokenTableMap::COL_ID => 0, TokenTableMap::COL_SELECTOR => 1, TokenTableMap::COL_TOKEN => 2, TokenTableMap::COL_USERID => 3, TokenTableMap::COL_TYPE => 4, TokenTableMap::COL_EXPIRES => 5, TokenTableMap::COL_STATUS => 6, TokenTableMap::COL_CREATED => 7, TokenTableMap::COL_MODIFIED => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'selector' => 1, 'token' => 2, 'userid' => 3, 'type' => 4, 'expires' => 5, 'status' => 6, 'created' => 7, 'modified' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('token');
        $this->setPhpName('Token');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Token');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('selector', 'Selector', 'CHAR', true, 12, null);
        $this->addColumn('token', 'Token', 'CHAR', true, 64, null);
        $this->addColumn('userid', 'Userid', 'INTEGER', true, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 255, null);
        $this->addColumn('expires', 'Expires', 'INTEGER', true, null, null);
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
        return $withPrefix ? TokenTableMap::CLASS_DEFAULT : TokenTableMap::OM_CLASS;
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
     * @return array           (Token object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TokenTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TokenTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TokenTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TokenTableMap::OM_CLASS;
            /** @var Token $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TokenTableMap::addInstanceToPool($obj, $key);
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
            $key = TokenTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TokenTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Token $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TokenTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TokenTableMap::COL_ID);
            $criteria->addSelectColumn(TokenTableMap::COL_SELECTOR);
            $criteria->addSelectColumn(TokenTableMap::COL_TOKEN);
            $criteria->addSelectColumn(TokenTableMap::COL_USERID);
            $criteria->addSelectColumn(TokenTableMap::COL_TYPE);
            $criteria->addSelectColumn(TokenTableMap::COL_EXPIRES);
            $criteria->addSelectColumn(TokenTableMap::COL_STATUS);
            $criteria->addSelectColumn(TokenTableMap::COL_CREATED);
            $criteria->addSelectColumn(TokenTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.selector');
            $criteria->addSelectColumn($alias . '.token');
            $criteria->addSelectColumn($alias . '.userid');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.expires');
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
        return Propel::getServiceContainer()->getDatabaseMap(TokenTableMap::DATABASE_NAME)->getTable(TokenTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TokenTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TokenTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TokenTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Token or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Token object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TokenTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Token) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TokenTableMap::DATABASE_NAME);
            $criteria->add(TokenTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TokenQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TokenTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TokenTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the token table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TokenQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Token or Criteria object.
     *
     * @param mixed               $criteria Criteria or Token object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TokenTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Token object
        }

        if ($criteria->containsKey(TokenTableMap::COL_ID) && $criteria->keyContainsValue(TokenTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TokenTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TokenQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TokenTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TokenTableMap::buildTableMap();
