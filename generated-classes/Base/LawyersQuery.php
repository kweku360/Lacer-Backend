<?php

namespace Base;

use \Lawyers as ChildLawyers;
use \LawyersQuery as ChildLawyersQuery;
use \Exception;
use \PDO;
use Map\LawyersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'lawyers' table.
 *
 *
 *
 * @method     ChildLawyersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLawyersQuery orderByLawyerid($order = Criteria::ASC) Order by the lawyerid column
 * @method     ChildLawyersQuery orderByFullname($order = Criteria::ASC) Order by the fullname column
 * @method     ChildLawyersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildLawyersQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildLawyersQuery orderByPhone1($order = Criteria::ASC) Order by the phone1 column
 * @method     ChildLawyersQuery orderByPhone2($order = Criteria::ASC) Order by the phone2 column
 * @method     ChildLawyersQuery orderByLawfirmid($order = Criteria::ASC) Order by the lawfirmid column
 * @method     ChildLawyersQuery orderByLawfirmname($order = Criteria::ASC) Order by the lawfirmname column
 * @method     ChildLawyersQuery orderBySpeciality($order = Criteria::ASC) Order by the speciality column
 * @method     ChildLawyersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildLawyersQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildLawyersQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildLawyersQuery groupById() Group by the id column
 * @method     ChildLawyersQuery groupByLawyerid() Group by the lawyerid column
 * @method     ChildLawyersQuery groupByFullname() Group by the fullname column
 * @method     ChildLawyersQuery groupByEmail() Group by the email column
 * @method     ChildLawyersQuery groupByAddress() Group by the address column
 * @method     ChildLawyersQuery groupByPhone1() Group by the phone1 column
 * @method     ChildLawyersQuery groupByPhone2() Group by the phone2 column
 * @method     ChildLawyersQuery groupByLawfirmid() Group by the lawfirmid column
 * @method     ChildLawyersQuery groupByLawfirmname() Group by the lawfirmname column
 * @method     ChildLawyersQuery groupBySpeciality() Group by the speciality column
 * @method     ChildLawyersQuery groupByStatus() Group by the status column
 * @method     ChildLawyersQuery groupByCreated() Group by the created column
 * @method     ChildLawyersQuery groupByModified() Group by the modified column
 *
 * @method     ChildLawyersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLawyersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLawyersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLawyersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLawyersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLawyersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLawyers findOne(ConnectionInterface $con = null) Return the first ChildLawyers matching the query
 * @method     ChildLawyers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLawyers matching the query, or a new ChildLawyers object populated from the query conditions when no match is found
 *
 * @method     ChildLawyers findOneById(int $id) Return the first ChildLawyers filtered by the id column
 * @method     ChildLawyers findOneByLawyerid(string $lawyerid) Return the first ChildLawyers filtered by the lawyerid column
 * @method     ChildLawyers findOneByFullname(string $fullname) Return the first ChildLawyers filtered by the fullname column
 * @method     ChildLawyers findOneByEmail(string $email) Return the first ChildLawyers filtered by the email column
 * @method     ChildLawyers findOneByAddress(string $address) Return the first ChildLawyers filtered by the address column
 * @method     ChildLawyers findOneByPhone1(string $phone1) Return the first ChildLawyers filtered by the phone1 column
 * @method     ChildLawyers findOneByPhone2(string $phone2) Return the first ChildLawyers filtered by the phone2 column
 * @method     ChildLawyers findOneByLawfirmid(int $lawfirmid) Return the first ChildLawyers filtered by the lawfirmid column
 * @method     ChildLawyers findOneByLawfirmname(string $lawfirmname) Return the first ChildLawyers filtered by the lawfirmname column
 * @method     ChildLawyers findOneBySpeciality(string $speciality) Return the first ChildLawyers filtered by the speciality column
 * @method     ChildLawyers findOneByStatus(string $status) Return the first ChildLawyers filtered by the status column
 * @method     ChildLawyers findOneByCreated(int $created) Return the first ChildLawyers filtered by the created column
 * @method     ChildLawyers findOneByModified(int $modified) Return the first ChildLawyers filtered by the modified column *

 * @method     ChildLawyers requirePk($key, ConnectionInterface $con = null) Return the ChildLawyers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOne(ConnectionInterface $con = null) Return the first ChildLawyers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLawyers requireOneById(int $id) Return the first ChildLawyers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByLawyerid(string $lawyerid) Return the first ChildLawyers filtered by the lawyerid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByFullname(string $fullname) Return the first ChildLawyers filtered by the fullname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByEmail(string $email) Return the first ChildLawyers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByAddress(string $address) Return the first ChildLawyers filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByPhone1(string $phone1) Return the first ChildLawyers filtered by the phone1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByPhone2(string $phone2) Return the first ChildLawyers filtered by the phone2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByLawfirmid(int $lawfirmid) Return the first ChildLawyers filtered by the lawfirmid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByLawfirmname(string $lawfirmname) Return the first ChildLawyers filtered by the lawfirmname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneBySpeciality(string $speciality) Return the first ChildLawyers filtered by the speciality column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByStatus(string $status) Return the first ChildLawyers filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByCreated(int $created) Return the first ChildLawyers filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLawyers requireOneByModified(int $modified) Return the first ChildLawyers filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLawyers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLawyers objects based on current ModelCriteria
 * @method     ChildLawyers[]|ObjectCollection findById(int $id) Return ChildLawyers objects filtered by the id column
 * @method     ChildLawyers[]|ObjectCollection findByLawyerid(string $lawyerid) Return ChildLawyers objects filtered by the lawyerid column
 * @method     ChildLawyers[]|ObjectCollection findByFullname(string $fullname) Return ChildLawyers objects filtered by the fullname column
 * @method     ChildLawyers[]|ObjectCollection findByEmail(string $email) Return ChildLawyers objects filtered by the email column
 * @method     ChildLawyers[]|ObjectCollection findByAddress(string $address) Return ChildLawyers objects filtered by the address column
 * @method     ChildLawyers[]|ObjectCollection findByPhone1(string $phone1) Return ChildLawyers objects filtered by the phone1 column
 * @method     ChildLawyers[]|ObjectCollection findByPhone2(string $phone2) Return ChildLawyers objects filtered by the phone2 column
 * @method     ChildLawyers[]|ObjectCollection findByLawfirmid(int $lawfirmid) Return ChildLawyers objects filtered by the lawfirmid column
 * @method     ChildLawyers[]|ObjectCollection findByLawfirmname(string $lawfirmname) Return ChildLawyers objects filtered by the lawfirmname column
 * @method     ChildLawyers[]|ObjectCollection findBySpeciality(string $speciality) Return ChildLawyers objects filtered by the speciality column
 * @method     ChildLawyers[]|ObjectCollection findByStatus(string $status) Return ChildLawyers objects filtered by the status column
 * @method     ChildLawyers[]|ObjectCollection findByCreated(int $created) Return ChildLawyers objects filtered by the created column
 * @method     ChildLawyers[]|ObjectCollection findByModified(int $modified) Return ChildLawyers objects filtered by the modified column
 * @method     ChildLawyers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LawyersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LawyersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Lawyers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLawyersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLawyersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLawyersQuery) {
            return $criteria;
        }
        $query = new ChildLawyersQuery();
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
     * @return ChildLawyers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LawyersTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LawyersTableMap::DATABASE_NAME);
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
     * @return ChildLawyers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, lawyerid, fullname, email, address, phone1, phone2, lawfirmid, lawfirmname, speciality, status, created, modified FROM lawyers WHERE id = :p0';
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
            /** @var ChildLawyers $obj */
            $obj = new ChildLawyers();
            $obj->hydrate($row);
            LawyersTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildLawyers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LawyersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LawyersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LawyersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LawyersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LawyersTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the lawyerid column
     *
     * Example usage:
     * <code>
     * $query->filterByLawyerid('fooValue');   // WHERE lawyerid = 'fooValue'
     * $query->filterByLawyerid('%fooValue%'); // WHERE lawyerid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lawyerid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterByLawyerid($lawyerid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lawyerid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lawyerid)) {
                $lawyerid = str_replace('*', '%', $lawyerid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LawyersTableMap::COL_LAWYERID, $lawyerid, $comparison);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LawyersTableMap::COL_FULLNAME, $fullname, $comparison);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LawyersTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LawyersTableMap::COL_ADDRESS, $address, $comparison);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LawyersTableMap::COL_PHONE1, $phone1, $comparison);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LawyersTableMap::COL_PHONE2, $phone2, $comparison);
    }

    /**
     * Filter the query on the lawfirmid column
     *
     * Example usage:
     * <code>
     * $query->filterByLawfirmid(1234); // WHERE lawfirmid = 1234
     * $query->filterByLawfirmid(array(12, 34)); // WHERE lawfirmid IN (12, 34)
     * $query->filterByLawfirmid(array('min' => 12)); // WHERE lawfirmid > 12
     * </code>
     *
     * @param     mixed $lawfirmid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterByLawfirmid($lawfirmid = null, $comparison = null)
    {
        if (is_array($lawfirmid)) {
            $useMinMax = false;
            if (isset($lawfirmid['min'])) {
                $this->addUsingAlias(LawyersTableMap::COL_LAWFIRMID, $lawfirmid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lawfirmid['max'])) {
                $this->addUsingAlias(LawyersTableMap::COL_LAWFIRMID, $lawfirmid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LawyersTableMap::COL_LAWFIRMID, $lawfirmid, $comparison);
    }

    /**
     * Filter the query on the lawfirmname column
     *
     * Example usage:
     * <code>
     * $query->filterByLawfirmname('fooValue');   // WHERE lawfirmname = 'fooValue'
     * $query->filterByLawfirmname('%fooValue%'); // WHERE lawfirmname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lawfirmname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterByLawfirmname($lawfirmname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lawfirmname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lawfirmname)) {
                $lawfirmname = str_replace('*', '%', $lawfirmname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LawyersTableMap::COL_LAWFIRMNAME, $lawfirmname, $comparison);
    }

    /**
     * Filter the query on the speciality column
     *
     * Example usage:
     * <code>
     * $query->filterBySpeciality('fooValue');   // WHERE speciality = 'fooValue'
     * $query->filterBySpeciality('%fooValue%'); // WHERE speciality LIKE '%fooValue%'
     * </code>
     *
     * @param     string $speciality The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterBySpeciality($speciality = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($speciality)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $speciality)) {
                $speciality = str_replace('*', '%', $speciality);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LawyersTableMap::COL_SPECIALITY, $speciality, $comparison);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LawyersTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(LawyersTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(LawyersTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LawyersTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(LawyersTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(LawyersTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LawyersTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLawyers $lawyers Object to remove from the list of results
     *
     * @return $this|ChildLawyersQuery The current query, for fluid interface
     */
    public function prune($lawyers = null)
    {
        if ($lawyers) {
            $this->addUsingAlias(LawyersTableMap::COL_ID, $lawyers->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the lawyers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LawyersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LawyersTableMap::clearInstancePool();
            LawyersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LawyersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LawyersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LawyersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LawyersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LawyersQuery
