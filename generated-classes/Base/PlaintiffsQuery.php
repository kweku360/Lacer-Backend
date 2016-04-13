<?php

namespace Base;

use \Plaintiffs as ChildPlaintiffs;
use \PlaintiffsQuery as ChildPlaintiffsQuery;
use \Exception;
use \PDO;
use Map\PlaintiffsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'plaintiffs' table.
 *
 *
 *
 * @method     ChildPlaintiffsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPlaintiffsQuery orderBySuitnumber($order = Criteria::ASC) Order by the suitnumber column
 * @method     ChildPlaintiffsQuery orderByFullname($order = Criteria::ASC) Order by the fullname column
 * @method     ChildPlaintiffsQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildPlaintiffsQuery orderByPhone1($order = Criteria::ASC) Order by the phone1 column
 * @method     ChildPlaintiffsQuery orderByPhone2($order = Criteria::ASC) Order by the phone2 column
 * @method     ChildPlaintiffsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildPlaintiffsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildPlaintiffsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildPlaintiffsQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildPlaintiffsQuery groupById() Group by the id column
 * @method     ChildPlaintiffsQuery groupBySuitnumber() Group by the suitnumber column
 * @method     ChildPlaintiffsQuery groupByFullname() Group by the fullname column
 * @method     ChildPlaintiffsQuery groupByAddress() Group by the address column
 * @method     ChildPlaintiffsQuery groupByPhone1() Group by the phone1 column
 * @method     ChildPlaintiffsQuery groupByPhone2() Group by the phone2 column
 * @method     ChildPlaintiffsQuery groupByEmail() Group by the email column
 * @method     ChildPlaintiffsQuery groupByStatus() Group by the status column
 * @method     ChildPlaintiffsQuery groupByCreated() Group by the created column
 * @method     ChildPlaintiffsQuery groupByModified() Group by the modified column
 *
 * @method     ChildPlaintiffsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPlaintiffsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPlaintiffsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPlaintiffsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPlaintiffsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPlaintiffsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPlaintiffs findOne(ConnectionInterface $con = null) Return the first ChildPlaintiffs matching the query
 * @method     ChildPlaintiffs findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPlaintiffs matching the query, or a new ChildPlaintiffs object populated from the query conditions when no match is found
 *
 * @method     ChildPlaintiffs findOneById(int $id) Return the first ChildPlaintiffs filtered by the id column
 * @method     ChildPlaintiffs findOneBySuitnumber(string $suitnumber) Return the first ChildPlaintiffs filtered by the suitnumber column
 * @method     ChildPlaintiffs findOneByFullname(string $fullname) Return the first ChildPlaintiffs filtered by the fullname column
 * @method     ChildPlaintiffs findOneByAddress(string $address) Return the first ChildPlaintiffs filtered by the address column
 * @method     ChildPlaintiffs findOneByPhone1(string $phone1) Return the first ChildPlaintiffs filtered by the phone1 column
 * @method     ChildPlaintiffs findOneByPhone2(string $phone2) Return the first ChildPlaintiffs filtered by the phone2 column
 * @method     ChildPlaintiffs findOneByEmail(string $email) Return the first ChildPlaintiffs filtered by the email column
 * @method     ChildPlaintiffs findOneByStatus(string $status) Return the first ChildPlaintiffs filtered by the status column
 * @method     ChildPlaintiffs findOneByCreated(int $created) Return the first ChildPlaintiffs filtered by the created column
 * @method     ChildPlaintiffs findOneByModified(int $modified) Return the first ChildPlaintiffs filtered by the modified column *

 * @method     ChildPlaintiffs requirePk($key, ConnectionInterface $con = null) Return the ChildPlaintiffs by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOne(ConnectionInterface $con = null) Return the first ChildPlaintiffs matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPlaintiffs requireOneById(int $id) Return the first ChildPlaintiffs filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneBySuitnumber(string $suitnumber) Return the first ChildPlaintiffs filtered by the suitnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneByFullname(string $fullname) Return the first ChildPlaintiffs filtered by the fullname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneByAddress(string $address) Return the first ChildPlaintiffs filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneByPhone1(string $phone1) Return the first ChildPlaintiffs filtered by the phone1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneByPhone2(string $phone2) Return the first ChildPlaintiffs filtered by the phone2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneByEmail(string $email) Return the first ChildPlaintiffs filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneByStatus(string $status) Return the first ChildPlaintiffs filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneByCreated(int $created) Return the first ChildPlaintiffs filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPlaintiffs requireOneByModified(int $modified) Return the first ChildPlaintiffs filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPlaintiffs[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPlaintiffs objects based on current ModelCriteria
 * @method     ChildPlaintiffs[]|ObjectCollection findById(int $id) Return ChildPlaintiffs objects filtered by the id column
 * @method     ChildPlaintiffs[]|ObjectCollection findBySuitnumber(string $suitnumber) Return ChildPlaintiffs objects filtered by the suitnumber column
 * @method     ChildPlaintiffs[]|ObjectCollection findByFullname(string $fullname) Return ChildPlaintiffs objects filtered by the fullname column
 * @method     ChildPlaintiffs[]|ObjectCollection findByAddress(string $address) Return ChildPlaintiffs objects filtered by the address column
 * @method     ChildPlaintiffs[]|ObjectCollection findByPhone1(string $phone1) Return ChildPlaintiffs objects filtered by the phone1 column
 * @method     ChildPlaintiffs[]|ObjectCollection findByPhone2(string $phone2) Return ChildPlaintiffs objects filtered by the phone2 column
 * @method     ChildPlaintiffs[]|ObjectCollection findByEmail(string $email) Return ChildPlaintiffs objects filtered by the email column
 * @method     ChildPlaintiffs[]|ObjectCollection findByStatus(string $status) Return ChildPlaintiffs objects filtered by the status column
 * @method     ChildPlaintiffs[]|ObjectCollection findByCreated(int $created) Return ChildPlaintiffs objects filtered by the created column
 * @method     ChildPlaintiffs[]|ObjectCollection findByModified(int $modified) Return ChildPlaintiffs objects filtered by the modified column
 * @method     ChildPlaintiffs[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PlaintiffsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PlaintiffsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Plaintiffs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPlaintiffsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPlaintiffsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPlaintiffsQuery) {
            return $criteria;
        }
        $query = new ChildPlaintiffsQuery();
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
     * @return ChildPlaintiffs|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PlaintiffsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PlaintiffsTableMap::DATABASE_NAME);
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
     * @return ChildPlaintiffs A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, suitnumber, fullname, address, phone1, phone2, email, status, created, modified FROM plaintiffs WHERE id = :p0';
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
            /** @var ChildPlaintiffs $obj */
            $obj = new ChildPlaintiffs();
            $obj->hydrate($row);
            PlaintiffsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildPlaintiffs|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PlaintiffsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PlaintiffsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PlaintiffsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PlaintiffsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlaintiffsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlaintiffsTableMap::COL_SUITNUMBER, $suitnumber, $comparison);
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlaintiffsTableMap::COL_FULLNAME, $fullname, $comparison);
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlaintiffsTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the phone1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone1('fooValue');   // WHERE phone1 = 'fooValue'
     * $query->filterByPhone1('%fooValue%'); // WHERE phone1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
     */
    public function filterByPhone1($phone1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone1)) {
                $phone1 = str_replace('*', '%', $phone1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlaintiffsTableMap::COL_PHONE1, $phone1, $comparison);
    }

    /**
     * Filter the query on the phone2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone2('fooValue');   // WHERE phone2 = 'fooValue'
     * $query->filterByPhone2('%fooValue%'); // WHERE phone2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
     */
    public function filterByPhone2($phone2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone2)) {
                $phone2 = str_replace('*', '%', $phone2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlaintiffsTableMap::COL_PHONE2, $phone2, $comparison);
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlaintiffsTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PlaintiffsTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(PlaintiffsTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(PlaintiffsTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlaintiffsTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(PlaintiffsTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(PlaintiffsTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlaintiffsTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPlaintiffs $plaintiffs Object to remove from the list of results
     *
     * @return $this|ChildPlaintiffsQuery The current query, for fluid interface
     */
    public function prune($plaintiffs = null)
    {
        if ($plaintiffs) {
            $this->addUsingAlias(PlaintiffsTableMap::COL_ID, $plaintiffs->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the plaintiffs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PlaintiffsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PlaintiffsTableMap::clearInstancePool();
            PlaintiffsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PlaintiffsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PlaintiffsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PlaintiffsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PlaintiffsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PlaintiffsQuery
