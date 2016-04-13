<?php

namespace Base;

use \Judges as ChildJudges;
use \JudgesQuery as ChildJudgesQuery;
use \Exception;
use \PDO;
use Map\JudgesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'judges' table.
 *
 *
 *
 * @method     ChildJudgesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildJudgesQuery orderByJudgeid($order = Criteria::ASC) Order by the judgeid column
 * @method     ChildJudgesQuery orderByFullname($order = Criteria::ASC) Order by the fullname column
 * @method     ChildJudgesQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildJudgesQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildJudgesQuery orderByCourt($order = Criteria::ASC) Order by the court column
 * @method     ChildJudgesQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildJudgesQuery orderByCourtnumber($order = Criteria::ASC) Order by the courtnumber column
 * @method     ChildJudgesQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildJudgesQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildJudgesQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildJudgesQuery groupById() Group by the id column
 * @method     ChildJudgesQuery groupByJudgeid() Group by the judgeid column
 * @method     ChildJudgesQuery groupByFullname() Group by the fullname column
 * @method     ChildJudgesQuery groupByAddress() Group by the address column
 * @method     ChildJudgesQuery groupByEmail() Group by the email column
 * @method     ChildJudgesQuery groupByCourt() Group by the court column
 * @method     ChildJudgesQuery groupByPhone() Group by the phone column
 * @method     ChildJudgesQuery groupByCourtnumber() Group by the courtnumber column
 * @method     ChildJudgesQuery groupByStatus() Group by the status column
 * @method     ChildJudgesQuery groupByCreated() Group by the created column
 * @method     ChildJudgesQuery groupByModified() Group by the modified column
 *
 * @method     ChildJudgesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildJudgesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildJudgesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildJudgesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildJudgesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildJudgesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildJudges findOne(ConnectionInterface $con = null) Return the first ChildJudges matching the query
 * @method     ChildJudges findOneOrCreate(ConnectionInterface $con = null) Return the first ChildJudges matching the query, or a new ChildJudges object populated from the query conditions when no match is found
 *
 * @method     ChildJudges findOneById(int $id) Return the first ChildJudges filtered by the id column
 * @method     ChildJudges findOneByJudgeid(string $judgeid) Return the first ChildJudges filtered by the judgeid column
 * @method     ChildJudges findOneByFullname(string $fullname) Return the first ChildJudges filtered by the fullname column
 * @method     ChildJudges findOneByAddress(string $address) Return the first ChildJudges filtered by the address column
 * @method     ChildJudges findOneByEmail(string $email) Return the first ChildJudges filtered by the email column
 * @method     ChildJudges findOneByCourt(string $court) Return the first ChildJudges filtered by the court column
 * @method     ChildJudges findOneByPhone(string $phone) Return the first ChildJudges filtered by the phone column
 * @method     ChildJudges findOneByCourtnumber(string $courtnumber) Return the first ChildJudges filtered by the courtnumber column
 * @method     ChildJudges findOneByStatus(string $status) Return the first ChildJudges filtered by the status column
 * @method     ChildJudges findOneByCreated(int $created) Return the first ChildJudges filtered by the created column
 * @method     ChildJudges findOneByModified(int $modified) Return the first ChildJudges filtered by the modified column *

 * @method     ChildJudges requirePk($key, ConnectionInterface $con = null) Return the ChildJudges by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOne(ConnectionInterface $con = null) Return the first ChildJudges matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJudges requireOneById(int $id) Return the first ChildJudges filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByJudgeid(string $judgeid) Return the first ChildJudges filtered by the judgeid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByFullname(string $fullname) Return the first ChildJudges filtered by the fullname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByAddress(string $address) Return the first ChildJudges filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByEmail(string $email) Return the first ChildJudges filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByCourt(string $court) Return the first ChildJudges filtered by the court column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByPhone(string $phone) Return the first ChildJudges filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByCourtnumber(string $courtnumber) Return the first ChildJudges filtered by the courtnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByStatus(string $status) Return the first ChildJudges filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByCreated(int $created) Return the first ChildJudges filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildJudges requireOneByModified(int $modified) Return the first ChildJudges filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildJudges[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildJudges objects based on current ModelCriteria
 * @method     ChildJudges[]|ObjectCollection findById(int $id) Return ChildJudges objects filtered by the id column
 * @method     ChildJudges[]|ObjectCollection findByJudgeid(string $judgeid) Return ChildJudges objects filtered by the judgeid column
 * @method     ChildJudges[]|ObjectCollection findByFullname(string $fullname) Return ChildJudges objects filtered by the fullname column
 * @method     ChildJudges[]|ObjectCollection findByAddress(string $address) Return ChildJudges objects filtered by the address column
 * @method     ChildJudges[]|ObjectCollection findByEmail(string $email) Return ChildJudges objects filtered by the email column
 * @method     ChildJudges[]|ObjectCollection findByCourt(string $court) Return ChildJudges objects filtered by the court column
 * @method     ChildJudges[]|ObjectCollection findByPhone(string $phone) Return ChildJudges objects filtered by the phone column
 * @method     ChildJudges[]|ObjectCollection findByCourtnumber(string $courtnumber) Return ChildJudges objects filtered by the courtnumber column
 * @method     ChildJudges[]|ObjectCollection findByStatus(string $status) Return ChildJudges objects filtered by the status column
 * @method     ChildJudges[]|ObjectCollection findByCreated(int $created) Return ChildJudges objects filtered by the created column
 * @method     ChildJudges[]|ObjectCollection findByModified(int $modified) Return ChildJudges objects filtered by the modified column
 * @method     ChildJudges[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class JudgesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\JudgesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Judges', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildJudgesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildJudgesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildJudgesQuery) {
            return $criteria;
        }
        $query = new ChildJudgesQuery();
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
     * @return ChildJudges|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JudgesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(JudgesTableMap::DATABASE_NAME);
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
     * @return ChildJudges A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, judgeid, fullname, address, email, court, phone, courtnumber, status, created, modified FROM judges WHERE id = :p0';
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
            /** @var ChildJudges $obj */
            $obj = new ChildJudges();
            $obj->hydrate($row);
            JudgesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildJudges|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JudgesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JudgesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(JudgesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(JudgesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the judgeid column
     *
     * Example usage:
     * <code>
     * $query->filterByJudgeid('fooValue');   // WHERE judgeid = 'fooValue'
     * $query->filterByJudgeid('%fooValue%'); // WHERE judgeid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judgeid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByJudgeid($judgeid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judgeid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $judgeid)) {
                $judgeid = str_replace('*', '%', $judgeid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_JUDGEID, $judgeid, $comparison);
    }

    /**
     * Filter the query on the fullname column
     *
     * Example usage:
     * <code>
     * $query->filterByFullname('fooValue');   // WHERE fullname = 'fooValue'
     * $query->filterByFullname('%fooValue%'); // WHERE fullname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fullname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByFullname($fullname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fullname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fullname)) {
                $fullname = str_replace('*', '%', $fullname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_FULLNAME, $fullname, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the court column
     *
     * Example usage:
     * <code>
     * $query->filterByCourt('fooValue');   // WHERE court = 'fooValue'
     * $query->filterByCourt('%fooValue%'); // WHERE court LIKE '%fooValue%'
     * </code>
     *
     * @param     string $court The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByCourt($court = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($court)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $court)) {
                $court = str_replace('*', '%', $court);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_COURT, $court, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the courtnumber column
     *
     * Example usage:
     * <code>
     * $query->filterByCourtnumber('fooValue');   // WHERE courtnumber = 'fooValue'
     * $query->filterByCourtnumber('%fooValue%'); // WHERE courtnumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $courtnumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByCourtnumber($courtnumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($courtnumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $courtnumber)) {
                $courtnumber = str_replace('*', '%', $courtnumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_COURTNUMBER, $courtnumber, $comparison);
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
     * @return $this|ChildJudgesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JudgesTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(JudgesTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(JudgesTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(JudgesTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(JudgesTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JudgesTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildJudges $judges Object to remove from the list of results
     *
     * @return $this|ChildJudgesQuery The current query, for fluid interface
     */
    public function prune($judges = null)
    {
        if ($judges) {
            $this->addUsingAlias(JudgesTableMap::COL_ID, $judges->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the judges table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JudgesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JudgesTableMap::clearInstancePool();
            JudgesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(JudgesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(JudgesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            JudgesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            JudgesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // JudgesQuery
