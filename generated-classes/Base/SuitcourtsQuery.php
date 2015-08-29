<?php

namespace Base;

use \Suitcourts as ChildSuitcourts;
use \SuitcourtsQuery as ChildSuitcourtsQuery;
use \Exception;
use \PDO;
use Map\SuitcourtsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'suitcourts' table.
 *
 *
 *
 * @method     ChildSuitcourtsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSuitcourtsQuery orderBySuitid($order = Criteria::ASC) Order by the suitid column
 * @method     ChildSuitcourtsQuery orderBySuitnumber($order = Criteria::ASC) Order by the suitnumber column
 * @method     ChildSuitcourtsQuery orderByCourtid($order = Criteria::ASC) Order by the courtid column
 * @method     ChildSuitcourtsQuery orderByCourtname($order = Criteria::ASC) Order by the courtname column
 * @method     ChildSuitcourtsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildSuitcourtsQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildSuitcourtsQuery groupById() Group by the id column
 * @method     ChildSuitcourtsQuery groupBySuitid() Group by the suitid column
 * @method     ChildSuitcourtsQuery groupBySuitnumber() Group by the suitnumber column
 * @method     ChildSuitcourtsQuery groupByCourtid() Group by the courtid column
 * @method     ChildSuitcourtsQuery groupByCourtname() Group by the courtname column
 * @method     ChildSuitcourtsQuery groupByCreated() Group by the created column
 * @method     ChildSuitcourtsQuery groupByModified() Group by the modified column
 *
 * @method     ChildSuitcourtsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSuitcourtsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSuitcourtsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSuitcourtsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSuitcourtsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSuitcourtsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSuitcourts findOne(ConnectionInterface $con = null) Return the first ChildSuitcourts matching the query
 * @method     ChildSuitcourts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSuitcourts matching the query, or a new ChildSuitcourts object populated from the query conditions when no match is found
 *
 * @method     ChildSuitcourts findOneById(int $id) Return the first ChildSuitcourts filtered by the id column
 * @method     ChildSuitcourts findOneBySuitid(int $suitid) Return the first ChildSuitcourts filtered by the suitid column
 * @method     ChildSuitcourts findOneBySuitnumber(string $suitnumber) Return the first ChildSuitcourts filtered by the suitnumber column
 * @method     ChildSuitcourts findOneByCourtid(int $courtid) Return the first ChildSuitcourts filtered by the courtid column
 * @method     ChildSuitcourts findOneByCourtname(string $courtname) Return the first ChildSuitcourts filtered by the courtname column
 * @method     ChildSuitcourts findOneByCreated(int $created) Return the first ChildSuitcourts filtered by the created column
 * @method     ChildSuitcourts findOneByModified(int $modified) Return the first ChildSuitcourts filtered by the modified column *

 * @method     ChildSuitcourts requirePk($key, ConnectionInterface $con = null) Return the ChildSuitcourts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitcourts requireOne(ConnectionInterface $con = null) Return the first ChildSuitcourts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuitcourts requireOneById(int $id) Return the first ChildSuitcourts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitcourts requireOneBySuitid(int $suitid) Return the first ChildSuitcourts filtered by the suitid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitcourts requireOneBySuitnumber(string $suitnumber) Return the first ChildSuitcourts filtered by the suitnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitcourts requireOneByCourtid(int $courtid) Return the first ChildSuitcourts filtered by the courtid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitcourts requireOneByCourtname(string $courtname) Return the first ChildSuitcourts filtered by the courtname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitcourts requireOneByCreated(int $created) Return the first ChildSuitcourts filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitcourts requireOneByModified(int $modified) Return the first ChildSuitcourts filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuitcourts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSuitcourts objects based on current ModelCriteria
 * @method     ChildSuitcourts[]|ObjectCollection findById(int $id) Return ChildSuitcourts objects filtered by the id column
 * @method     ChildSuitcourts[]|ObjectCollection findBySuitid(int $suitid) Return ChildSuitcourts objects filtered by the suitid column
 * @method     ChildSuitcourts[]|ObjectCollection findBySuitnumber(string $suitnumber) Return ChildSuitcourts objects filtered by the suitnumber column
 * @method     ChildSuitcourts[]|ObjectCollection findByCourtid(int $courtid) Return ChildSuitcourts objects filtered by the courtid column
 * @method     ChildSuitcourts[]|ObjectCollection findByCourtname(string $courtname) Return ChildSuitcourts objects filtered by the courtname column
 * @method     ChildSuitcourts[]|ObjectCollection findByCreated(int $created) Return ChildSuitcourts objects filtered by the created column
 * @method     ChildSuitcourts[]|ObjectCollection findByModified(int $modified) Return ChildSuitcourts objects filtered by the modified column
 * @method     ChildSuitcourts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SuitcourtsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SuitcourtsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Suitcourts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSuitcourtsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSuitcourtsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSuitcourtsQuery) {
            return $criteria;
        }
        $query = new ChildSuitcourtsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSuitcourts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SuitcourtsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SuitcourtsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSuitcourts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, suitid, suitnumber, courtid, courtname, created, modified FROM suitcourts WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSuitcourts $obj */
            $obj = new ChildSuitcourts();
            $obj->hydrate($row);
            SuitcourtsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSuitcourts|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SuitcourtsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SuitcourtsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitcourtsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the suitid column
     *
     * Example usage:
     * <code>
     * $query->filterBySuitid(1234); // WHERE suitid = 1234
     * $query->filterBySuitid(array(12, 34)); // WHERE suitid IN (12, 34)
     * $query->filterBySuitid(array('min' => 12)); // WHERE suitid > 12
     * </code>
     *
     * @param     mixed $suitid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterBySuitid($suitid = null, $comparison = null)
    {
        if (is_array($suitid)) {
            $useMinMax = false;
            if (isset($suitid['min'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_SUITID, $suitid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($suitid['max'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_SUITID, $suitid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitcourtsTableMap::COL_SUITID, $suitid, $comparison);
    }

    /**
     * Filter the query on the suitnumber column
     *
     * Example usage:
     * <code>
     * $query->filterBySuitnumber('fooValue');   // WHERE suitnumber = 'fooValue'
     * $query->filterBySuitnumber('%fooValue%'); // WHERE suitnumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $suitnumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterBySuitnumber($suitnumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($suitnumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $suitnumber)) {
                $suitnumber = str_replace('*', '%', $suitnumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitcourtsTableMap::COL_SUITNUMBER, $suitnumber, $comparison);
    }

    /**
     * Filter the query on the courtid column
     *
     * Example usage:
     * <code>
     * $query->filterByCourtid(1234); // WHERE courtid = 1234
     * $query->filterByCourtid(array(12, 34)); // WHERE courtid IN (12, 34)
     * $query->filterByCourtid(array('min' => 12)); // WHERE courtid > 12
     * </code>
     *
     * @param     mixed $courtid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterByCourtid($courtid = null, $comparison = null)
    {
        if (is_array($courtid)) {
            $useMinMax = false;
            if (isset($courtid['min'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_COURTID, $courtid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($courtid['max'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_COURTID, $courtid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitcourtsTableMap::COL_COURTID, $courtid, $comparison);
    }

    /**
     * Filter the query on the courtname column
     *
     * Example usage:
     * <code>
     * $query->filterByCourtname('fooValue');   // WHERE courtname = 'fooValue'
     * $query->filterByCourtname('%fooValue%'); // WHERE courtname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $courtname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterByCourtname($courtname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($courtname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $courtname)) {
                $courtname = str_replace('*', '%', $courtname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitcourtsTableMap::COL_COURTNAME, $courtname, $comparison);
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated(1234); // WHERE created = 1234
     * $query->filterByCreated(array(12, 34)); // WHERE created IN (12, 34)
     * $query->filterByCreated(array('min' => 12)); // WHERE created > 12
     * </code>
     *
     * @param     mixed $created The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitcourtsTableMap::COL_CREATED, $created, $comparison);
    }

    /**
     * Filter the query on the modified column
     *
     * Example usage:
     * <code>
     * $query->filterByModified(1234); // WHERE modified = 1234
     * $query->filterByModified(array(12, 34)); // WHERE modified IN (12, 34)
     * $query->filterByModified(array('min' => 12)); // WHERE modified > 12
     * </code>
     *
     * @param     mixed $modified The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(SuitcourtsTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitcourtsTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSuitcourts $suitcourts Object to remove from the list of results
     *
     * @return $this|ChildSuitcourtsQuery The current query, for fluid interface
     */
    public function prune($suitcourts = null)
    {
        if ($suitcourts) {
            $this->addUsingAlias(SuitcourtsTableMap::COL_ID, $suitcourts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the suitcourts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitcourtsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SuitcourtsTableMap::clearInstancePool();
            SuitcourtsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitcourtsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SuitcourtsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SuitcourtsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SuitcourtsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SuitcourtsQuery
