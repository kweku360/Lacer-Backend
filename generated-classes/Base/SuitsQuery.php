<?php

namespace Base;

use \Suits as ChildSuits;
use \SuitsQuery as ChildSuitsQuery;
use \Exception;
use \PDO;
use Map\SuitsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'suits' table.
 *
 *
 *
 * @method     ChildSuitsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSuitsQuery orderBySuitnumber($order = Criteria::ASC) Order by the suitnumber column
 * @method     ChildSuitsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildSuitsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildSuitsQuery orderByDatefiled($order = Criteria::ASC) Order by the datefiled column
 * @method     ChildSuitsQuery orderBySuitstatus($order = Criteria::ASC) Order by the suitstatus column
 * @method     ChildSuitsQuery orderBySuitaccess($order = Criteria::ASC) Order by the suitaccess column
 * @method     ChildSuitsQuery orderBySuitdateid($order = Criteria::ASC) Order by the suitdateid column
 * @method     ChildSuitsQuery orderBySuitcourt($order = Criteria::ASC) Order by the suitcourt column
 * @method     ChildSuitsQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 * @method     ChildSuitsQuery orderByDataentryname($order = Criteria::ASC) Order by the dataentryname column
 * @method     ChildSuitsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildSuitsQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildSuitsQuery groupById() Group by the id column
 * @method     ChildSuitsQuery groupBySuitnumber() Group by the suitnumber column
 * @method     ChildSuitsQuery groupByTitle() Group by the title column
 * @method     ChildSuitsQuery groupByType() Group by the type column
 * @method     ChildSuitsQuery groupByDatefiled() Group by the datefiled column
 * @method     ChildSuitsQuery groupBySuitstatus() Group by the suitstatus column
 * @method     ChildSuitsQuery groupBySuitaccess() Group by the suitaccess column
 * @method     ChildSuitsQuery groupBySuitdateid() Group by the suitdateid column
 * @method     ChildSuitsQuery groupBySuitcourt() Group by the suitcourt column
 * @method     ChildSuitsQuery groupByUserid() Group by the userid column
 * @method     ChildSuitsQuery groupByDataentryname() Group by the dataentryname column
 * @method     ChildSuitsQuery groupByCreated() Group by the created column
 * @method     ChildSuitsQuery groupByModified() Group by the modified column
 *
 * @method     ChildSuitsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSuitsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSuitsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSuitsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSuitsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSuitsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSuits findOne(ConnectionInterface $con = null) Return the first ChildSuits matching the query
 * @method     ChildSuits findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSuits matching the query, or a new ChildSuits object populated from the query conditions when no match is found
 *
 * @method     ChildSuits findOneById(int $id) Return the first ChildSuits filtered by the id column
 * @method     ChildSuits findOneBySuitnumber(string $suitnumber) Return the first ChildSuits filtered by the suitnumber column
 * @method     ChildSuits findOneByTitle(string $title) Return the first ChildSuits filtered by the title column
 * @method     ChildSuits findOneByType(string $type) Return the first ChildSuits filtered by the type column
 * @method     ChildSuits findOneByDatefiled(int $datefiled) Return the first ChildSuits filtered by the datefiled column
 * @method     ChildSuits findOneBySuitstatus(string $suitstatus) Return the first ChildSuits filtered by the suitstatus column
 * @method     ChildSuits findOneBySuitaccess(string $suitaccess) Return the first ChildSuits filtered by the suitaccess column
 * @method     ChildSuits findOneBySuitdateid(int $suitdateid) Return the first ChildSuits filtered by the suitdateid column
 * @method     ChildSuits findOneBySuitcourt(string $suitcourt) Return the first ChildSuits filtered by the suitcourt column
 * @method     ChildSuits findOneByUserid(int $userid) Return the first ChildSuits filtered by the userid column
 * @method     ChildSuits findOneByDataentryname(int $dataentryname) Return the first ChildSuits filtered by the dataentryname column
 * @method     ChildSuits findOneByCreated(int $created) Return the first ChildSuits filtered by the created column
 * @method     ChildSuits findOneByModified(int $modified) Return the first ChildSuits filtered by the modified column *

 * @method     ChildSuits requirePk($key, ConnectionInterface $con = null) Return the ChildSuits by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOne(ConnectionInterface $con = null) Return the first ChildSuits matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuits requireOneById(int $id) Return the first ChildSuits filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneBySuitnumber(string $suitnumber) Return the first ChildSuits filtered by the suitnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByTitle(string $title) Return the first ChildSuits filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByType(string $type) Return the first ChildSuits filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByDatefiled(int $datefiled) Return the first ChildSuits filtered by the datefiled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneBySuitstatus(string $suitstatus) Return the first ChildSuits filtered by the suitstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneBySuitaccess(string $suitaccess) Return the first ChildSuits filtered by the suitaccess column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneBySuitdateid(int $suitdateid) Return the first ChildSuits filtered by the suitdateid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneBySuitcourt(string $suitcourt) Return the first ChildSuits filtered by the suitcourt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByUserid(int $userid) Return the first ChildSuits filtered by the userid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByDataentryname(int $dataentryname) Return the first ChildSuits filtered by the dataentryname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByCreated(int $created) Return the first ChildSuits filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByModified(int $modified) Return the first ChildSuits filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuits[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSuits objects based on current ModelCriteria
 * @method     ChildSuits[]|ObjectCollection findById(int $id) Return ChildSuits objects filtered by the id column
 * @method     ChildSuits[]|ObjectCollection findBySuitnumber(string $suitnumber) Return ChildSuits objects filtered by the suitnumber column
 * @method     ChildSuits[]|ObjectCollection findByTitle(string $title) Return ChildSuits objects filtered by the title column
 * @method     ChildSuits[]|ObjectCollection findByType(string $type) Return ChildSuits objects filtered by the type column
 * @method     ChildSuits[]|ObjectCollection findByDatefiled(int $datefiled) Return ChildSuits objects filtered by the datefiled column
 * @method     ChildSuits[]|ObjectCollection findBySuitstatus(string $suitstatus) Return ChildSuits objects filtered by the suitstatus column
 * @method     ChildSuits[]|ObjectCollection findBySuitaccess(string $suitaccess) Return ChildSuits objects filtered by the suitaccess column
 * @method     ChildSuits[]|ObjectCollection findBySuitdateid(int $suitdateid) Return ChildSuits objects filtered by the suitdateid column
 * @method     ChildSuits[]|ObjectCollection findBySuitcourt(string $suitcourt) Return ChildSuits objects filtered by the suitcourt column
 * @method     ChildSuits[]|ObjectCollection findByUserid(int $userid) Return ChildSuits objects filtered by the userid column
 * @method     ChildSuits[]|ObjectCollection findByDataentryname(int $dataentryname) Return ChildSuits objects filtered by the dataentryname column
 * @method     ChildSuits[]|ObjectCollection findByCreated(int $created) Return ChildSuits objects filtered by the created column
 * @method     ChildSuits[]|ObjectCollection findByModified(int $modified) Return ChildSuits objects filtered by the modified column
 * @method     ChildSuits[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SuitsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SuitsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Suits', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSuitsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSuitsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSuitsQuery) {
            return $criteria;
        }
        $query = new ChildSuitsQuery();
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
     * @return ChildSuits|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SuitsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SuitsTableMap::DATABASE_NAME);
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
     * @return ChildSuits A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, suitnumber, title, type, datefiled, suitstatus, suitaccess, suitdateid, suitcourt, userid, dataentryname, created, modified FROM suits WHERE id = :p0';
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
            /** @var ChildSuits $obj */
            $obj = new ChildSuits();
            $obj->hydrate($row);
            SuitsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSuits|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SuitsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SuitsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildSuitsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SuitsTableMap::COL_SUITNUMBER, $suitnumber, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildSuitsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SuitsTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the datefiled column
     *
     * Example usage:
     * <code>
     * $query->filterByDatefiled(1234); // WHERE datefiled = 1234
     * $query->filterByDatefiled(array(12, 34)); // WHERE datefiled IN (12, 34)
     * $query->filterByDatefiled(array('min' => 12)); // WHERE datefiled > 12
     * </code>
     *
     * @param     mixed $datefiled The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByDatefiled($datefiled = null, $comparison = null)
    {
        if (is_array($datefiled)) {
            $useMinMax = false;
            if (isset($datefiled['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_DATEFILED, $datefiled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datefiled['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_DATEFILED, $datefiled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_DATEFILED, $datefiled, $comparison);
    }

    /**
     * Filter the query on the suitstatus column
     *
     * Example usage:
     * <code>
     * $query->filterBySuitstatus('fooValue');   // WHERE suitstatus = 'fooValue'
     * $query->filterBySuitstatus('%fooValue%'); // WHERE suitstatus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $suitstatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterBySuitstatus($suitstatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($suitstatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $suitstatus)) {
                $suitstatus = str_replace('*', '%', $suitstatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_SUITSTATUS, $suitstatus, $comparison);
    }

    /**
     * Filter the query on the suitaccess column
     *
     * Example usage:
     * <code>
     * $query->filterBySuitaccess('fooValue');   // WHERE suitaccess = 'fooValue'
     * $query->filterBySuitaccess('%fooValue%'); // WHERE suitaccess LIKE '%fooValue%'
     * </code>
     *
     * @param     string $suitaccess The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterBySuitaccess($suitaccess = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($suitaccess)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $suitaccess)) {
                $suitaccess = str_replace('*', '%', $suitaccess);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_SUITACCESS, $suitaccess, $comparison);
    }

    /**
     * Filter the query on the suitdateid column
     *
     * Example usage:
     * <code>
     * $query->filterBySuitdateid(1234); // WHERE suitdateid = 1234
     * $query->filterBySuitdateid(array(12, 34)); // WHERE suitdateid IN (12, 34)
     * $query->filterBySuitdateid(array('min' => 12)); // WHERE suitdateid > 12
     * </code>
     *
     * @param     mixed $suitdateid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterBySuitdateid($suitdateid = null, $comparison = null)
    {
        if (is_array($suitdateid)) {
            $useMinMax = false;
            if (isset($suitdateid['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_SUITDATEID, $suitdateid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($suitdateid['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_SUITDATEID, $suitdateid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_SUITDATEID, $suitdateid, $comparison);
    }

    /**
     * Filter the query on the suitcourt column
     *
     * Example usage:
     * <code>
     * $query->filterBySuitcourt('fooValue');   // WHERE suitcourt = 'fooValue'
     * $query->filterBySuitcourt('%fooValue%'); // WHERE suitcourt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $suitcourt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterBySuitcourt($suitcourt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($suitcourt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $suitcourt)) {
                $suitcourt = str_replace('*', '%', $suitcourt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_SUITCOURT, $suitcourt, $comparison);
    }

    /**
     * Filter the query on the userid column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE userid = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE userid IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE userid > 12
     * </code>
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_USERID, $userid, $comparison);
    }

    /**
     * Filter the query on the dataentryname column
     *
     * Example usage:
     * <code>
     * $query->filterByDataentryname(1234); // WHERE dataentryname = 1234
     * $query->filterByDataentryname(array(12, 34)); // WHERE dataentryname IN (12, 34)
     * $query->filterByDataentryname(array('min' => 12)); // WHERE dataentryname > 12
     * </code>
     *
     * @param     mixed $dataentryname The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByDataentryname($dataentryname = null, $comparison = null)
    {
        if (is_array($dataentryname)) {
            $useMinMax = false;
            if (isset($dataentryname['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_DATAENTRYNAME, $dataentryname['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dataentryname['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_DATAENTRYNAME, $dataentryname['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_DATAENTRYNAME, $dataentryname, $comparison);
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
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSuits $suits Object to remove from the list of results
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function prune($suits = null)
    {
        if ($suits) {
            $this->addUsingAlias(SuitsTableMap::COL_ID, $suits->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the suits table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SuitsTableMap::clearInstancePool();
            SuitsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SuitsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SuitsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SuitsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SuitsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SuitsQuery
