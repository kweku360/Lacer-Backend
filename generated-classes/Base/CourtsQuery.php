<?php

namespace Base;

use \Courts as ChildCourts;
use \CourtsQuery as ChildCourtsQuery;
use \Exception;
use \PDO;
use Map\CourtsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'courts' table.
 *
 *
 *
 * @method     ChildCourtsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCourtsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCourtsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildCourtsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildCourtsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildCourtsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildCourtsQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildCourtsQuery groupById() Group by the id column
 * @method     ChildCourtsQuery groupByName() Group by the name column
 * @method     ChildCourtsQuery groupByType() Group by the type column
 * @method     ChildCourtsQuery groupByDescription() Group by the description column
 * @method     ChildCourtsQuery groupByStatus() Group by the status column
 * @method     ChildCourtsQuery groupByCreated() Group by the created column
 * @method     ChildCourtsQuery groupByModified() Group by the modified column
 *
 * @method     ChildCourtsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCourtsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCourtsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCourtsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCourtsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCourtsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCourts findOne(ConnectionInterface $con = null) Return the first ChildCourts matching the query
 * @method     ChildCourts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCourts matching the query, or a new ChildCourts object populated from the query conditions when no match is found
 *
 * @method     ChildCourts findOneById(int $id) Return the first ChildCourts filtered by the id column
 * @method     ChildCourts findOneByName(string $name) Return the first ChildCourts filtered by the name column
 * @method     ChildCourts findOneByType(string $type) Return the first ChildCourts filtered by the type column
 * @method     ChildCourts findOneByDescription(string $description) Return the first ChildCourts filtered by the description column
 * @method     ChildCourts findOneByStatus(string $status) Return the first ChildCourts filtered by the status column
 * @method     ChildCourts findOneByCreated(int $created) Return the first ChildCourts filtered by the created column
 * @method     ChildCourts findOneByModified(int $modified) Return the first ChildCourts filtered by the modified column *

 * @method     ChildCourts requirePk($key, ConnectionInterface $con = null) Return the ChildCourts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourts requireOne(ConnectionInterface $con = null) Return the first ChildCourts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCourts requireOneById(int $id) Return the first ChildCourts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourts requireOneByName(string $name) Return the first ChildCourts filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourts requireOneByType(string $type) Return the first ChildCourts filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourts requireOneByDescription(string $description) Return the first ChildCourts filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourts requireOneByStatus(string $status) Return the first ChildCourts filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourts requireOneByCreated(int $created) Return the first ChildCourts filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCourts requireOneByModified(int $modified) Return the first ChildCourts filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCourts[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCourts objects based on current ModelCriteria
 * @method     ChildCourts[]|ObjectCollection findById(int $id) Return ChildCourts objects filtered by the id column
 * @method     ChildCourts[]|ObjectCollection findByName(string $name) Return ChildCourts objects filtered by the name column
 * @method     ChildCourts[]|ObjectCollection findByType(string $type) Return ChildCourts objects filtered by the type column
 * @method     ChildCourts[]|ObjectCollection findByDescription(string $description) Return ChildCourts objects filtered by the description column
 * @method     ChildCourts[]|ObjectCollection findByStatus(string $status) Return ChildCourts objects filtered by the status column
 * @method     ChildCourts[]|ObjectCollection findByCreated(int $created) Return ChildCourts objects filtered by the created column
 * @method     ChildCourts[]|ObjectCollection findByModified(int $modified) Return ChildCourts objects filtered by the modified column
 * @method     ChildCourts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CourtsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CourtsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Courts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCourtsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCourtsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCourtsQuery) {
            return $criteria;
        }
        $query = new ChildCourtsQuery();
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
     * @return ChildCourts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CourtsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CourtsTableMap::DATABASE_NAME);
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
     * @return ChildCourts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, type, description, status, created, modified FROM courts WHERE id = :p0';
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
            /** @var ChildCourts $obj */
            $obj = new ChildCourts();
            $obj->hydrate($row);
            CourtsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCourts|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CourtsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CourtsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CourtsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CourtsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourtsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CourtsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CourtsTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CourtsTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildCourtsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CourtsTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(CourtsTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(CourtsTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourtsTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(CourtsTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(CourtsTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CourtsTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCourts $courts Object to remove from the list of results
     *
     * @return $this|ChildCourtsQuery The current query, for fluid interface
     */
    public function prune($courts = null)
    {
        if ($courts) {
            $this->addUsingAlias(CourtsTableMap::COL_ID, $courts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the courts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CourtsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CourtsTableMap::clearInstancePool();
            CourtsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CourtsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CourtsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CourtsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CourtsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CourtsQuery
