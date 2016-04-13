<?php

namespace Base;

use \Regcode as ChildRegcode;
use \RegcodeQuery as ChildRegcodeQuery;
use \Exception;
use \PDO;
use Map\RegcodeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'regcode' table.
 *
 *
 *
 * @method     ChildRegcodeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildRegcodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildRegcodeQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildRegcodeQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildRegcodeQuery orderByMsgstatus($order = Criteria::ASC) Order by the msgstatus column
 * @method     ChildRegcodeQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildRegcodeQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildRegcodeQuery groupById() Group by the id column
 * @method     ChildRegcodeQuery groupByCode() Group by the code column
 * @method     ChildRegcodeQuery groupByPhone() Group by the phone column
 * @method     ChildRegcodeQuery groupByStatus() Group by the status column
 * @method     ChildRegcodeQuery groupByMsgstatus() Group by the msgstatus column
 * @method     ChildRegcodeQuery groupByCreated() Group by the created column
 * @method     ChildRegcodeQuery groupByModified() Group by the modified column
 *
 * @method     ChildRegcodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRegcodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRegcodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRegcodeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRegcodeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRegcodeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRegcode findOne(ConnectionInterface $con = null) Return the first ChildRegcode matching the query
 * @method     ChildRegcode findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRegcode matching the query, or a new ChildRegcode object populated from the query conditions when no match is found
 *
 * @method     ChildRegcode findOneById(int $id) Return the first ChildRegcode filtered by the id column
 * @method     ChildRegcode findOneByCode(int $code) Return the first ChildRegcode filtered by the code column
 * @method     ChildRegcode findOneByPhone(int $phone) Return the first ChildRegcode filtered by the phone column
 * @method     ChildRegcode findOneByStatus(string $status) Return the first ChildRegcode filtered by the status column
 * @method     ChildRegcode findOneByMsgstatus(string $msgstatus) Return the first ChildRegcode filtered by the msgstatus column
 * @method     ChildRegcode findOneByCreated(int $created) Return the first ChildRegcode filtered by the created column
 * @method     ChildRegcode findOneByModified(int $modified) Return the first ChildRegcode filtered by the modified column *

 * @method     ChildRegcode requirePk($key, ConnectionInterface $con = null) Return the ChildRegcode by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegcode requireOne(ConnectionInterface $con = null) Return the first ChildRegcode matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRegcode requireOneById(int $id) Return the first ChildRegcode filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegcode requireOneByCode(int $code) Return the first ChildRegcode filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegcode requireOneByPhone(int $phone) Return the first ChildRegcode filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegcode requireOneByStatus(string $status) Return the first ChildRegcode filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegcode requireOneByMsgstatus(string $msgstatus) Return the first ChildRegcode filtered by the msgstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegcode requireOneByCreated(int $created) Return the first ChildRegcode filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegcode requireOneByModified(int $modified) Return the first ChildRegcode filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRegcode[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRegcode objects based on current ModelCriteria
 * @method     ChildRegcode[]|ObjectCollection findById(int $id) Return ChildRegcode objects filtered by the id column
 * @method     ChildRegcode[]|ObjectCollection findByCode(int $code) Return ChildRegcode objects filtered by the code column
 * @method     ChildRegcode[]|ObjectCollection findByPhone(int $phone) Return ChildRegcode objects filtered by the phone column
 * @method     ChildRegcode[]|ObjectCollection findByStatus(string $status) Return ChildRegcode objects filtered by the status column
 * @method     ChildRegcode[]|ObjectCollection findByMsgstatus(string $msgstatus) Return ChildRegcode objects filtered by the msgstatus column
 * @method     ChildRegcode[]|ObjectCollection findByCreated(int $created) Return ChildRegcode objects filtered by the created column
 * @method     ChildRegcode[]|ObjectCollection findByModified(int $modified) Return ChildRegcode objects filtered by the modified column
 * @method     ChildRegcode[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RegcodeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RegcodeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Regcode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRegcodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRegcodeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRegcodeQuery) {
            return $criteria;
        }
        $query = new ChildRegcodeQuery();
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
     * @return ChildRegcode|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RegcodeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RegcodeTableMap::DATABASE_NAME);
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
     * @return ChildRegcode A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, code, phone, status, msgstatus, created, modified FROM regcode WHERE id = :p0';
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
            /** @var ChildRegcode $obj */
            $obj = new ChildRegcode();
            $obj->hydrate($row);
            RegcodeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildRegcode|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RegcodeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RegcodeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegcodeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode(1234); // WHERE code = 1234
     * $query->filterByCode(array(12, 34)); // WHERE code IN (12, 34)
     * $query->filterByCode(array('min' => 12)); // WHERE code > 12
     * </code>
     *
     * @param     mixed $code The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (is_array($code)) {
            $useMinMax = false;
            if (isset($code['min'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_CODE, $code['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($code['max'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_CODE, $code['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegcodeTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone(1234); // WHERE phone = 1234
     * $query->filterByPhone(array(12, 34)); // WHERE phone IN (12, 34)
     * $query->filterByPhone(array('min' => 12)); // WHERE phone > 12
     * </code>
     *
     * @param     mixed $phone The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (is_array($phone)) {
            $useMinMax = false;
            if (isset($phone['min'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_PHONE, $phone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phone['max'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_PHONE, $phone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegcodeTableMap::COL_PHONE, $phone, $comparison);
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
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RegcodeTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the msgstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByMsgstatus('fooValue');   // WHERE msgstatus = 'fooValue'
     * $query->filterByMsgstatus('%fooValue%'); // WHERE msgstatus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $msgstatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function filterByMsgstatus($msgstatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($msgstatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $msgstatus)) {
                $msgstatus = str_replace('*', '%', $msgstatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RegcodeTableMap::COL_MSGSTATUS, $msgstatus, $comparison);
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
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegcodeTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(RegcodeTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegcodeTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRegcode $regcode Object to remove from the list of results
     *
     * @return $this|ChildRegcodeQuery The current query, for fluid interface
     */
    public function prune($regcode = null)
    {
        if ($regcode) {
            $this->addUsingAlias(RegcodeTableMap::COL_ID, $regcode->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the regcode table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RegcodeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RegcodeTableMap::clearInstancePool();
            RegcodeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RegcodeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RegcodeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RegcodeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RegcodeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RegcodeQuery
