<?php

namespace Map;

use \Documents;
use \DocumentsQuery;
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
 * This class defines the structure of the 'documents' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DocumentsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DocumentsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'lacerdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'documents';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Documents';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Documents';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'documents.id';

    /**
     * the column name for the suitnumber field
     */
    const COL_SUITNUMBER = 'documents.suitnumber';

    /**
     * the column name for the code field
     */
    const COL_CODE = 'documents.code';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'documents.type';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'documents.name';

    /**
     * the column name for the datefiled field
     */
    const COL_DATEFILED = 'documents.datefiled';

    /**
     * the column name for the link field
     */
    const COL_LINK = 'documents.link';

    /**
     * the column name for the filer field
     */
    const COL_FILER = 'documents.filer';

    /**
     * the column name for the dataentrypersonid field
     */
    const COL_DATAENTRYPERSONID = 'documents.dataentrypersonid';

    /**
     * the column name for the accessstatus field
     */
    const COL_ACCESSSTATUS = 'documents.accessstatus';

    /**
     * the column name for the created field
     */
    const COL_CREATED = 'documents.created';

    /**
     * the column name for the modified field
     */
    const COL_MODIFIED = 'documents.modified';

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
        self::TYPE_PHPNAME       => array('Id', 'Suitnumber', 'Code', 'Type', 'Name', 'Datefiled', 'Link', 'Filer', 'Dataentrypersonid', 'Accessstatus', 'Created', 'Modified', ),
        self::TYPE_CAMELNAME     => array('id', 'suitnumber', 'code', 'type', 'name', 'datefiled', 'link', 'filer', 'dataentrypersonid', 'accessstatus', 'created', 'modified', ),
        self::TYPE_COLNAME       => array(DocumentsTableMap::COL_ID, DocumentsTableMap::COL_SUITNUMBER, DocumentsTableMap::COL_CODE, DocumentsTableMap::COL_TYPE, DocumentsTableMap::COL_NAME, DocumentsTableMap::COL_DATEFILED, DocumentsTableMap::COL_LINK, DocumentsTableMap::COL_FILER, DocumentsTableMap::COL_DATAENTRYPERSONID, DocumentsTableMap::COL_ACCESSSTATUS, DocumentsTableMap::COL_CREATED, DocumentsTableMap::COL_MODIFIED, ),
        self::TYPE_FIELDNAME     => array('id', 'suitnumber', 'code', 'type', 'name', 'datefiled', 'link', 'filer', 'dataentrypersonid', 'accessstatus', 'created', 'modified', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Suitnumber' => 1, 'Code' => 2, 'Type' => 3, 'Name' => 4, 'Datefiled' => 5, 'Link' => 6, 'Filer' => 7, 'Dataentrypersonid' => 8, 'Accessstatus' => 9, 'Created' => 10, 'Modified' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'suitnumber' => 1, 'code' => 2, 'type' => 3, 'name' => 4, 'datefiled' => 5, 'link' => 6, 'filer' => 7, 'dataentrypersonid' => 8, 'accessstatus' => 9, 'created' => 10, 'modified' => 11, ),
        self::TYPE_COLNAME       => array(DocumentsTableMap::COL_ID => 0, DocumentsTableMap::COL_SUITNUMBER => 1, DocumentsTableMap::COL_CODE => 2, DocumentsTableMap::COL_TYPE => 3, DocumentsTableMap::COL_NAME => 4, DocumentsTableMap::COL_DATEFILED => 5, DocumentsTableMap::COL_LINK => 6, DocumentsTableMap::COL_FILER => 7, DocumentsTableMap::COL_DATAENTRYPERSONID => 8, DocumentsTableMap::COL_ACCESSSTATUS => 9, DocumentsTableMap::COL_CREATED => 10, DocumentsTableMap::COL_MODIFIED => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'suitnumber' => 1, 'code' => 2, 'type' => 3, 'name' => 4, 'datefiled' => 5, 'link' => 6, 'filer' => 7, 'dataentrypersonid' => 8, 'accessstatus' => 9, 'created' => 10, 'modified' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('documents');
        $this->setPhpName('Documents');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Documents');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 12, null);
        $this->addColumn('suitnumber', 'Suitnumber', 'VARCHAR', true, 255, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 64, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 255, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('datefiled', 'Datefiled', 'INTEGER', true, null, null);
        $this->addColumn('link', 'Link', 'VARCHAR', true, 255, null);
        $this->addColumn('filer', 'Filer', 'VARCHAR', true, 255, null);
        $this->addColumn('dataentrypersonid', 'Dataentrypersonid', 'INTEGER', true, null, null);
        $this->addColumn('accessstatus', 'Accessstatus', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? DocumentsTableMap::CLASS_DEFAULT : DocumentsTableMap::OM_CLASS;
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
     * @return array           (Documents object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DocumentsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DocumentsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DocumentsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DocumentsTableMap::OM_CLASS;
            /** @var Documents $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DocumentsTableMap::addInstanceToPool($obj, $key);
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
            $key = DocumentsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DocumentsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Documents $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DocumentsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DocumentsTableMap::COL_ID);
            $criteria->addSelectColumn(DocumentsTableMap::COL_SUITNUMBER);
            $criteria->addSelectColumn(DocumentsTableMap::COL_CODE);
            $criteria->addSelectColumn(DocumentsTableMap::COL_TYPE);
            $criteria->addSelectColumn(DocumentsTableMap::COL_NAME);
            $criteria->addSelectColumn(DocumentsTableMap::COL_DATEFILED);
            $criteria->addSelectColumn(DocumentsTableMap::COL_LINK);
            $criteria->addSelectColumn(DocumentsTableMap::COL_FILER);
            $criteria->addSelectColumn(DocumentsTableMap::COL_DATAENTRYPERSONID);
            $criteria->addSelectColumn(DocumentsTableMap::COL_ACCESSSTATUS);
            $criteria->addSelectColumn(DocumentsTableMap::COL_CREATED);
            $criteria->addSelectColumn(DocumentsTableMap::COL_MODIFIED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.suitnumber');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.datefiled');
            $criteria->addSelectColumn($alias . '.link');
            $criteria->addSelectColumn($alias . '.filer');
            $criteria->addSelectColumn($alias . '.dataentrypersonid');
            $criteria->addSelectColumn($alias . '.accessstatus');
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
        return Propel::getServiceContainer()->getDatabaseMap(DocumentsTableMap::DATABASE_NAME)->getTable(DocumentsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DocumentsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DocumentsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DocumentsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Documents or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Documents object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Documents) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DocumentsTableMap::DATABASE_NAME);
            $criteria->add(DocumentsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = DocumentsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DocumentsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DocumentsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the documents table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DocumentsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Documents or Criteria object.
     *
     * @param mixed               $criteria Criteria or Documents object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Documents object
        }

        if ($criteria->containsKey(DocumentsTableMap::COL_ID) && $criteria->keyContainsValue(DocumentsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DocumentsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = DocumentsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DocumentsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DocumentsTableMap::buildTableMap();
