<?php

namespace Base;

use \Suitlawyers as ChildSuitlawyers;
use \SuitlawyersQuery as ChildSuitlawyersQuery;
use \Exception;
use \PDO;
use Map\SuitlawyersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'suitlawyers' table.
 *
 *
 *
 * @method     ChildSuitlawyersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSuitlawyersQuery orderBySuitid($order = Criteria::ASC) Order by the suitid column
 * @method     ChildSuitlawyersQuery orderBySuitnumber($order = Criteria::ASC) Order by the suitnumber column
 * @method     ChildSuitlawyersQuery orderByLawyerid($order = Criteria::ASC) Order by the lawyerid column
 * @method     ChildSuitlawyersQuery orderByLawyertype($order = Criteria::ASC) Order by the lawyertype column
 * @method     ChildSuitlawyersQuery orderByLawyernumber($order = Criteria::ASC) Order by the lawyernumber column
 * @method     ChildSuitlawyersQuery orderByLawyername($order = Criteria::ASC) Order by the lawyername column
 * @method     ChildSuitlawyersQuery orderByRegistertype($order = Criteria::ASC) Order by the registertype column
 * @method     ChildSuitlawyersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildSuitlawyersQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildSuitlawyersQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildSuitlawyersQuery groupById() Group by the id column
 * @method     ChildSuitlawyersQuery groupBySuitid() Group by the suitid column
 * @method     ChildSuitlawyersQuery groupBySuitnumber() Group by the suitnumber column
 * @method     ChildSuitlawyersQuery groupByLawyerid() Group by the lawyerid column
 * @method     ChildSuitlawyersQuery groupByLawyertype() Group by the lawyertype column
 * @method     ChildSuitlawyersQuery groupByLawyernumber() Group by the lawyernumber column
 * @method     ChildSuitlawyersQuery groupByLawyername() Group by the lawyername column
 * @method     ChildSuitlawyersQuery groupByRegistertype() Group by the registertype column
 * @method     ChildSuitlawyersQuery groupByStatus() Group by the status column
 * @method     ChildSuitlawyersQuery groupByCreated() Group by the created column
 * @method     ChildSuitlawyersQuery groupByModified() Group by the modified column
 *
 * @method     ChildSuitlawyersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSuitlawyersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSuitlawyersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSuitlawyersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSuitlawyersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSuitlawyersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSuitlawyers findOne(ConnectionInterface $con = null) Return the first ChildSuitlawyers matching the query
 * @method     ChildSuitlawyers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSuitlawyers matching the query, or a new ChildSuitlawyers object populated from the query conditions when no match is found
 *
 * @method     ChildSuitlawyers findOneById(int $id) Return the first ChildSuitlawyers filtered by the id column
 * @method     ChildSuitlawyers findOneBySuitid(int $suitid) Return the first ChildSuitlawyers filtered by the suitid column
 * @method     ChildSuitlawyers findOneBySuitnumber(string $suitnumber) Return the first ChildSuitlawyers filtered by the suitnumber column
 * @method     ChildSuitlawyers findOneByLawyerid(int $lawyerid) Return the first ChildSuitlawyers filtered by the lawyerid column
 * @method     ChildSuitlawyers findOneByLawyertype(string $lawyertype) Return the first ChildSuitlawyers filtered by the lawyertype column
 * @method     ChildSuitlawyers findOneByLawyernumber(string $lawyernumber) Return the first ChildSuitlawyers filtered by the lawyernumber column
 * @method     ChildSuitlawyers findOneByLawyername(string $lawyername) Return the first ChildSuitlawyers filtered by the lawyername column
 * @method     ChildSuitlawyers findOneByRegistertype(string $registertype) Return the first ChildSuitlawyers filtered by the registertype column
 * @method     ChildSuitlawyers findOneByStatus(string $status) Return the first ChildSuitlawyers filtered by the status column
 * @method     ChildSuitlawyers findOneByCreated(int $created) Return the first ChildSuitlawyers filtered by the created column
 * @method     ChildSuitlawyers findOneByModified(int $modified) Return the first ChildSuitlawyers filtered by the modified column *

 * @method     ChildSuitlawyers requirePk($key, ConnectionInterface $con = null) Return the ChildSuitlawyers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOne(ConnectionInterface $con = null) Return the first ChildSuitlawyers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuitlawyers requireOneById(int $id) Return the first ChildSuitlawyers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneBySuitid(int $suitid) Return the first ChildSuitlawyers filtered by the suitid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneBySuitnumber(string $suitnumber) Return the first ChildSuitlawyers filtered by the suitnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneByLawyerid(int $lawyerid) Return the first ChildSuitlawyers filtered by the lawyerid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneByLawyertype(string $lawyertype) Return the first ChildSuitlawyers filtered by the lawyertype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneByLawyernumber(string $lawyernumber) Return the first ChildSuitlawyers filtered by the lawyernumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneByLawyername(string $lawyername) Return the first ChildSuitlawyers filtered by the lawyername column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneByRegistertype(string $registertype) Return the first ChildSuitlawyers filtered by the registertype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneByStatus(string $status) Return the first ChildSuitlawyers filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneByCreated(int $created) Return the first ChildSuitlawyers filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuitlawyers requireOneByModified(int $modified) Return the first ChildSuitlawyers filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuitlawyers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSuitlawyers objects based on current ModelCriteria
 * @method     ChildSuitlawyers[]|ObjectCollection findById(int $id) Return ChildSuitlawyers objects filtered by the id column
 * @method     ChildSuitlawyers[]|ObjectCollection findBySuitid(int $suitid) Return ChildSuitlawyers objects filtered by the suitid column
 * @method     ChildSuitlawyers[]|ObjectCollection findBySuitnumber(string $suitnumber) Return ChildSuitlawyers objects filtered by the suitnumber column
 * @method     ChildSuitlawyers[]|ObjectCollection findByLawyerid(int $lawyerid) Return ChildSuitlawyers objects filtered by the lawyerid column
 * @method     ChildSuitlawyers[]|ObjectCollection findByLawyertype(string $lawyertype) Return ChildSuitlawyers objects filtered by the lawyertype column
 * @method     ChildSuitlawyers[]|ObjectCollection findByLawyernumber(string $lawyernumber) Return ChildSuitlawyers objects filtered by the lawyernumber column
 * @method     ChildSuitlawyers[]|ObjectCollection findByLawyername(string $lawyername) Return ChildSuitlawyers objects filtered by the lawyername column
 * @method     ChildSuitlawyers[]|ObjectCollection findByRegistertype(string $registertype) Return ChildSuitlawyers objects filtered by the registertype column
 * @method     ChildSuitlawyers[]|ObjectCollection findByStatus(string $status) Return ChildSuitlawyers objects filtered by the status column
 * @method     ChildSuitlawyers[]|ObjectCollection findByCreated(int $created) Return ChildSuitlawyers objects filtered by the created column
 * @method     ChildSuitlawyers[]|ObjectCollection findByModified(int $modified) Return ChildSuitlawyers objects filtered by the modified column
 * @method     ChildSuitlawyers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SuitlawyersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SuitlawyersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Suitlawyers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSuitlawyersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSuitlawyersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSuitlawyersQuery) {
            return $criteria;
        }
        $query = new ChildSuitlawyersQuery();
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
     * @return ChildSuitlawyers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SuitlawyersTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SuitlawyersTableMap::DATABASE_NAME);
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
     * @return ChildSuitlawyers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, suitid, suitnumber, lawyerid, lawyertype, lawyernumber, lawyername, registertype, status, created, modified FROM suitlawyers WHERE id = :p0';
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
            /** @var ChildSuitlawyers $obj */
            $obj = new ChildSuitlawyers();
            $obj->hydrate($row);
            SuitlawyersTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSuitlawyers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SuitlawyersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SuitlawyersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterBySuitid($suitid = null, $comparison = null)
    {
        if (is_array($suitid)) {
            $useMinMax = false;
            if (isset($suitid['min'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_SUITID, $suitid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($suitid['max'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_SUITID, $suitid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_SUITID, $suitid, $comparison);
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
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SuitlawyersTableMap::COL_SUITNUMBER, $suitnumber, $comparison);
    }

    /**
     * Filter the query on the lawyerid column
     *
     * Example usage:
     * <code>
     * $query->filterByLawyerid(1234); // WHERE lawyerid = 1234
     * $query->filterByLawyerid(array(12, 34)); // WHERE lawyerid IN (12, 34)
     * $query->filterByLawyerid(array('min' => 12)); // WHERE lawyerid > 12
     * </code>
     *
     * @param     mixed $lawyerid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByLawyerid($lawyerid = null, $comparison = null)
    {
        if (is_array($lawyerid)) {
            $useMinMax = false;
            if (isset($lawyerid['min'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_LAWYERID, $lawyerid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lawyerid['max'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_LAWYERID, $lawyerid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_LAWYERID, $lawyerid, $comparison);
    }

    /**
     * Filter the query on the lawyertype column
     *
     * Example usage:
     * <code>
     * $query->filterByLawyertype('fooValue');   // WHERE lawyertype = 'fooValue'
     * $query->filterByLawyertype('%fooValue%'); // WHERE lawyertype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lawyertype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByLawyertype($lawyertype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lawyertype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lawyertype)) {
                $lawyertype = str_replace('*', '%', $lawyertype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_LAWYERTYPE, $lawyertype, $comparison);
    }

    /**
     * Filter the query on the lawyernumber column
     *
     * Example usage:
     * <code>
     * $query->filterByLawyernumber('fooValue');   // WHERE lawyernumber = 'fooValue'
     * $query->filterByLawyernumber('%fooValue%'); // WHERE lawyernumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lawyernumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByLawyernumber($lawyernumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lawyernumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lawyernumber)) {
                $lawyernumber = str_replace('*', '%', $lawyernumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_LAWYERNUMBER, $lawyernumber, $comparison);
    }

    /**
     * Filter the query on the lawyername column
     *
     * Example usage:
     * <code>
     * $query->filterByLawyername('fooValue');   // WHERE lawyername = 'fooValue'
     * $query->filterByLawyername('%fooValue%'); // WHERE lawyername LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lawyername The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByLawyername($lawyername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lawyername)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lawyername)) {
                $lawyername = str_replace('*', '%', $lawyername);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_LAWYERNAME, $lawyername, $comparison);
    }

    /**
     * Filter the query on the registertype column
     *
     * Example usage:
     * <code>
     * $query->filterByRegistertype('fooValue');   // WHERE registertype = 'fooValue'
     * $query->filterByRegistertype('%fooValue%'); // WHERE registertype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $registertype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByRegistertype($registertype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($registertype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $registertype)) {
                $registertype = str_replace('*', '%', $registertype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_REGISTERTYPE, $registertype, $comparison);
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
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SuitlawyersTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(SuitlawyersTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitlawyersTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSuitlawyers $suitlawyers Object to remove from the list of results
     *
     * @return $this|ChildSuitlawyersQuery The current query, for fluid interface
     */
    public function prune($suitlawyers = null)
    {
        if ($suitlawyers) {
            $this->addUsingAlias(SuitlawyersTableMap::COL_ID, $suitlawyers->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the suitlawyers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitlawyersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SuitlawyersTableMap::clearInstancePool();
            SuitlawyersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SuitlawyersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SuitlawyersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SuitlawyersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SuitlawyersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SuitlawyersQuery
