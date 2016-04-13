<?php

namespace Base;

use \Suitjudges as ChildSuitjudges;
use \SuitjudgesQuery as ChildSuitjudgesQuery;
use \Exception;
use \PDO;
use Map\SuitjudgesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'suitjudges' table.
 *
 *
 *
 * @method     ChildSuitjudgesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSuitjudgesQuery orderBySuitid($order = Criteria::ASC) Order by the suitid column
 * @method     ChildSuitjudgesQuery orderBySuitnumber($order = Criteria::ASC) Order by the suitnumber column
 * @method     ChildSuitjudgesQuery orderByJudgeid($order = Criteria::ASC) Order by the judgeid column
 * @method     ChildSuitjudgesQuery orderByJudgename($order = Criteria::ASC) Order by the judgename column
 * @method     ChildSuitjudgesQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildSuitjudgesQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildSuitjudgesQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildSuitjudgesQuery groupById() Group by the id column
 * @method     ChildSuitjudgesQuery groupBySuitid() Group by the suitid column
 * @method     ChildSuitjudgesQuery groupBySuitnumber() Group by the suitnumber column
 * @method     ChildSuitjudgesQuery groupByJudgeid() Group by the judgeid column
 * @method     ChildSuitjudgesQuery groupByJudgename() Group by the judgename column
 * @method     ChildSuitjudgesQuery groupByStatus() Group by the status column
 * @method     ChildSuitjudgesQuery groupByCreated() Group by the created column
 * @method     ChildSuitjudgesQuery groupByModified() Group by the modified column
 *
 * @method     ChildSuitjudgesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSuitjudgesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSuitjudgesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSuitjudgesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSuitjudgesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSuitjudgesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSuitjudges findOne(ConnectionInterface $con = null) Return the first ChildSuitjudges matching the query
 * @method     ChildSuitjudges findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSuitjudges matching the query, or a new ChildSuitjudges object populated from the query conditions when no match is found
 *
 * @method     ChildSuitjudges findOneById(int $id) Return the first ChildSuitjudges filtered by the id column
 * @method     ChildSuitjudges findOneBySuitid(int $suitid) Return the first ChildSuitjudges filtered by the suitid column
 * @method     ChildSuitjudges findOneBySuitnumber(string $suitnumber) Return the first ChildSuitjudges filtered by the suitnumber column
 * @method     ChildSuitjudges findOneByJudgeid(int $judgeid) Return the first ChildSuitjudges filtered by the judgeid column
 * @method     ChildSuitjudges findOneByJudgename(string $judgename) Return the first ChildSuitjudges filtered by the judgename column
 * @method     ChildSuitjudges findOneByStatus(string $status) Return the first ChildSuitjudges filtered by the status column
 * @method     ChildSuitjudges findOneByCreated(int $created) Return the first ChildSuitjudges filtered by the created column
 * @method     ChildSuitjudges findOneByModified(int $modified) Return the first ChildSuitjudges filtered by the modified column *

 * @method     ChildSuitjudges requirePk($key, ConnectionInterface $con = null) Return the ChildSuitjudges by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitjudges requireOne(ConnectionInterface $con = null) Return the first ChildSuitjudges matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuitjudges requireOneById(int $id) Return the first ChildSuitjudges filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitjudges requireOneBySuitid(int $suitid) Return the first ChildSuitjudges filtered by the suitid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitjudges requireOneBySuitnumber(string $suitnumber) Return the first ChildSuitjudges filtered by the suitnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitjudges requireOneByJudgeid(int $judgeid) Return the first ChildSuitjudges filtered by the judgeid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitjudges requireOneByJudgename(string $judgename) Return the first ChildSuitjudges filtered by the judgename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitjudges requireOneByStatus(string $status) Return the first ChildSuitjudges filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitjudges requireOneByCreated(int $created) Return the first ChildSuitjudges filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitjudges requireOneByModified(int $modified) Return the first ChildSuitjudges filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuitjudges[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSuitjudges objects based on current ModelCriteria
 * @method     ChildSuitjudges[]|ObjectCollection findById(int $id) Return ChildSuitjudges objects filtered by the id column
 * @method     ChildSuitjudges[]|ObjectCollection findBySuitid(int $suitid) Return ChildSuitjudges objects filtered by the suitid column
 * @method     ChildSuitjudges[]|ObjectCollection findBySuitnumber(string $suitnumber) Return ChildSuitjudges objects filtered by the suitnumber column
 * @method     ChildSuitjudges[]|ObjectCollection findByJudgeid(int $judgeid) Return ChildSuitjudges objects filtered by the judgeid column
 * @method     ChildSuitjudges[]|ObjectCollection findByJudgename(string $judgename) Return ChildSuitjudges objects filtered by the judgename column
 * @method     ChildSuitjudges[]|ObjectCollection findByStatus(string $status) Return ChildSuitjudges objects filtered by the status column
 * @method     ChildSuitjudges[]|ObjectCollection findByCreated(int $created) Return ChildSuitjudges objects filtered by the created column
 * @method     ChildSuitjudges[]|ObjectCollection findByModified(int $modified) Return ChildSuitjudges objects filtered by the modified column
 * @method     ChildSuitjudges[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SuitjudgesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SuitjudgesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Suitjudges', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSuitjudgesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSuitjudgesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSuitjudgesQuery) {
            return $criteria;
        }
        $query = new ChildSuitjudgesQuery();
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
     * @return ChildSuitjudges|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SuitjudgesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SuitjudgesTableMap::DATABASE_NAME);
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
     * @return ChildSuitjudges A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, suitid, suitnumber, judgeid, judgename, status, created, modified FROM suitjudges WHERE id = :p0';
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
            /** @var ChildSuitjudges $obj */
            $obj = new ChildSuitjudges();
            $obj->hydrate($row);
            SuitjudgesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSuitjudges|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SuitjudgesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SuitjudgesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitjudgesTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterBySuitid($suitid = null, $comparison = null)
    {
        if (is_array($suitid)) {
            $useMinMax = false;
            if (isset($suitid['min'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_SUITID, $suitid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($suitid['max'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_SUITID, $suitid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitjudgesTableMap::COL_SUITID, $suitid, $comparison);
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
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SuitjudgesTableMap::COL_SUITNUMBER, $suitnumber, $comparison);
    }

    /**
     * Filter the query on the judgeid column
     *
     * Example usage:
     * <code>
     * $query->filterByJudgeid(1234); // WHERE judgeid = 1234
     * $query->filterByJudgeid(array(12, 34)); // WHERE judgeid IN (12, 34)
     * $query->filterByJudgeid(array('min' => 12)); // WHERE judgeid > 12
     * </code>
     *
     * @param     mixed $judgeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterByJudgeid($judgeid = null, $comparison = null)
    {
        if (is_array($judgeid)) {
            $useMinMax = false;
            if (isset($judgeid['min'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_JUDGEID, $judgeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($judgeid['max'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_JUDGEID, $judgeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitjudgesTableMap::COL_JUDGEID, $judgeid, $comparison);
    }

    /**
     * Filter the query on the judgename column
     *
     * Example usage:
     * <code>
     * $query->filterByJudgename('fooValue');   // WHERE judgename = 'fooValue'
     * $query->filterByJudgename('%fooValue%'); // WHERE judgename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judgename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterByJudgename($judgename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judgename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $judgename)) {
                $judgename = str_replace('*', '%', $judgename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitjudgesTableMap::COL_JUDGENAME, $judgename, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitjudgesTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitjudgesTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(SuitjudgesTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitjudgesTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSuitjudges $suitjudges Object to remove from the list of results
     *
     * @return $this|ChildSuitjudgesQuery The current query, for fluid interface
     */
    public function prune($suitjudges = null)
    {
        if ($suitjudges) {
            $this->addUsingAlias(SuitjudgesTableMap::COL_ID, $suitjudges->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the suitjudges table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitjudgesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SuitjudgesTableMap::clearInstancePool();
            SuitjudgesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SuitjudgesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SuitjudgesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SuitjudgesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SuitjudgesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SuitjudgesQuery
