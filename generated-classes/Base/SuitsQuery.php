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
 * @method     ChildSuitsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildSuitsQuery orderByPlaintifflawyerid($order = Criteria::ASC) Order by the plaintifflawyerid column
 * @method     ChildSuitsQuery orderByPlaintifflawyername($order = Criteria::ASC) Order by the plaintifflawyername column
 * @method     ChildSuitsQuery orderByDefendantlawyerid($order = Criteria::ASC) Order by the defendantlawyerid column
 * @method     ChildSuitsQuery orderByDefendantlawyername($order = Criteria::ASC) Order by the defendantlawyername column
 * @method     ChildSuitsQuery orderByDatefiled($order = Criteria::ASC) Order by the datefiled column
 * @method     ChildSuitsQuery orderByJudgeid($order = Criteria::ASC) Order by the judgeid column
 * @method     ChildSuitsQuery orderByJudgename($order = Criteria::ASC) Order by the judgename column
 * @method     ChildSuitsQuery orderBySuitstatus($order = Criteria::ASC) Order by the suitstatus column
 * @method     ChildSuitsQuery orderByDateofadjournment($order = Criteria::ASC) Order by the dateofadjournment column
 * @method     ChildSuitsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildSuitsQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildSuitsQuery groupById() Group by the id column
 * @method     ChildSuitsQuery groupBySuitnumber() Group by the suitnumber column
 * @method     ChildSuitsQuery groupByType() Group by the type column
 * @method     ChildSuitsQuery groupByPlaintifflawyerid() Group by the plaintifflawyerid column
 * @method     ChildSuitsQuery groupByPlaintifflawyername() Group by the plaintifflawyername column
 * @method     ChildSuitsQuery groupByDefendantlawyerid() Group by the defendantlawyerid column
 * @method     ChildSuitsQuery groupByDefendantlawyername() Group by the defendantlawyername column
 * @method     ChildSuitsQuery groupByDatefiled() Group by the datefiled column
 * @method     ChildSuitsQuery groupByJudgeid() Group by the judgeid column
 * @method     ChildSuitsQuery groupByJudgename() Group by the judgename column
 * @method     ChildSuitsQuery groupBySuitstatus() Group by the suitstatus column
 * @method     ChildSuitsQuery groupByDateofadjournment() Group by the dateofadjournment column
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
 * @method     ChildSuits findOneByType(string $type) Return the first ChildSuits filtered by the type column
 * @method     ChildSuits findOneByPlaintifflawyerid(int $plaintifflawyerid) Return the first ChildSuits filtered by the plaintifflawyerid column
 * @method     ChildSuits findOneByPlaintifflawyername(string $plaintifflawyername) Return the first ChildSuits filtered by the plaintifflawyername column
 * @method     ChildSuits findOneByDefendantlawyerid(int $defendantlawyerid) Return the first ChildSuits filtered by the defendantlawyerid column
 * @method     ChildSuits findOneByDefendantlawyername(string $defendantlawyername) Return the first ChildSuits filtered by the defendantlawyername column
 * @method     ChildSuits findOneByDatefiled(int $datefiled) Return the first ChildSuits filtered by the datefiled column
 * @method     ChildSuits findOneByJudgeid(int $judgeid) Return the first ChildSuits filtered by the judgeid column
 * @method     ChildSuits findOneByJudgename(string $judgename) Return the first ChildSuits filtered by the judgename column
 * @method     ChildSuits findOneBySuitstatus(string $suitstatus) Return the first ChildSuits filtered by the suitstatus column
 * @method     ChildSuits findOneByDateofadjournment(int $dateofadjournment) Return the first ChildSuits filtered by the dateofadjournment column
 * @method     ChildSuits findOneByCreated(int $created) Return the first ChildSuits filtered by the created column
 * @method     ChildSuits findOneByModified(int $modified) Return the first ChildSuits filtered by the modified column *

 * @method     ChildSuits requirePk($key, ConnectionInterface $con = null) Return the ChildSuits by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOne(ConnectionInterface $con = null) Return the first ChildSuits matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuits requireOneById(int $id) Return the first ChildSuits filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneBySuitnumber(string $suitnumber) Return the first ChildSuits filtered by the suitnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByType(string $type) Return the first ChildSuits filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByPlaintifflawyerid(int $plaintifflawyerid) Return the first ChildSuits filtered by the plaintifflawyerid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByPlaintifflawyername(string $plaintifflawyername) Return the first ChildSuits filtered by the plaintifflawyername column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByDefendantlawyerid(int $defendantlawyerid) Return the first ChildSuits filtered by the defendantlawyerid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByDefendantlawyername(string $defendantlawyername) Return the first ChildSuits filtered by the defendantlawyername column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByDatefiled(int $datefiled) Return the first ChildSuits filtered by the datefiled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByJudgeid(int $judgeid) Return the first ChildSuits filtered by the judgeid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByJudgename(string $judgename) Return the first ChildSuits filtered by the judgename column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneBySuitstatus(string $suitstatus) Return the first ChildSuits filtered by the suitstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByDateofadjournment(int $dateofadjournment) Return the first ChildSuits filtered by the dateofadjournment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByCreated(int $created) Return the first ChildSuits filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSuits requireOneByModified(int $modified) Return the first ChildSuits filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSuits[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSuits objects based on current ModelCriteria
 * @method     ChildSuits[]|ObjectCollection findById(int $id) Return ChildSuits objects filtered by the id column
 * @method     ChildSuits[]|ObjectCollection findBySuitnumber(string $suitnumber) Return ChildSuits objects filtered by the suitnumber column
 * @method     ChildSuits[]|ObjectCollection findByType(string $type) Return ChildSuits objects filtered by the type column
 * @method     ChildSuits[]|ObjectCollection findByPlaintifflawyerid(int $plaintifflawyerid) Return ChildSuits objects filtered by the plaintifflawyerid column
 * @method     ChildSuits[]|ObjectCollection findByPlaintifflawyername(string $plaintifflawyername) Return ChildSuits objects filtered by the plaintifflawyername column
 * @method     ChildSuits[]|ObjectCollection findByDefendantlawyerid(int $defendantlawyerid) Return ChildSuits objects filtered by the defendantlawyerid column
 * @method     ChildSuits[]|ObjectCollection findByDefendantlawyername(string $defendantlawyername) Return ChildSuits objects filtered by the defendantlawyername column
 * @method     ChildSuits[]|ObjectCollection findByDatefiled(int $datefiled) Return ChildSuits objects filtered by the datefiled column
 * @method     ChildSuits[]|ObjectCollection findByJudgeid(int $judgeid) Return ChildSuits objects filtered by the judgeid column
 * @method     ChildSuits[]|ObjectCollection findByJudgename(string $judgename) Return ChildSuits objects filtered by the judgename column
 * @method     ChildSuits[]|ObjectCollection findBySuitstatus(string $suitstatus) Return ChildSuits objects filtered by the suitstatus column
 * @method     ChildSuits[]|ObjectCollection findByDateofadjournment(int $dateofadjournment) Return ChildSuits objects filtered by the dateofadjournment column
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
        $sql = 'SELECT id, suitnumber, type, plaintifflawyerid, plaintifflawyername, defendantlawyerid, defendantlawyername, datefiled, judgeid, judgename, suitstatus, dateofadjournment, created, modified FROM suits WHERE id = :p0';
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
     * Filter the query on the plaintifflawyerid column
     *
     * Example usage:
     * <code>
     * $query->filterByPlaintifflawyerid(1234); // WHERE plaintifflawyerid = 1234
     * $query->filterByPlaintifflawyerid(array(12, 34)); // WHERE plaintifflawyerid IN (12, 34)
     * $query->filterByPlaintifflawyerid(array('min' => 12)); // WHERE plaintifflawyerid > 12
     * </code>
     *
     * @param     mixed $plaintifflawyerid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByPlaintifflawyerid($plaintifflawyerid = null, $comparison = null)
    {
        if (is_array($plaintifflawyerid)) {
            $useMinMax = false;
            if (isset($plaintifflawyerid['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_PLAINTIFFLAWYERID, $plaintifflawyerid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($plaintifflawyerid['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_PLAINTIFFLAWYERID, $plaintifflawyerid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_PLAINTIFFLAWYERID, $plaintifflawyerid, $comparison);
    }

    /**
     * Filter the query on the plaintifflawyername column
     *
     * Example usage:
     * <code>
     * $query->filterByPlaintifflawyername('fooValue');   // WHERE plaintifflawyername = 'fooValue'
     * $query->filterByPlaintifflawyername('%fooValue%'); // WHERE plaintifflawyername LIKE '%fooValue%'
     * </code>
     *
     * @param     string $plaintifflawyername The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByPlaintifflawyername($plaintifflawyername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($plaintifflawyername)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $plaintifflawyername)) {
                $plaintifflawyername = str_replace('*', '%', $plaintifflawyername);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_PLAINTIFFLAWYERNAME, $plaintifflawyername, $comparison);
    }

    /**
     * Filter the query on the defendantlawyerid column
     *
     * Example usage:
     * <code>
     * $query->filterByDefendantlawyerid(1234); // WHERE defendantlawyerid = 1234
     * $query->filterByDefendantlawyerid(array(12, 34)); // WHERE defendantlawyerid IN (12, 34)
     * $query->filterByDefendantlawyerid(array('min' => 12)); // WHERE defendantlawyerid > 12
     * </code>
     *
     * @param     mixed $defendantlawyerid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByDefendantlawyerid($defendantlawyerid = null, $comparison = null)
    {
        if (is_array($defendantlawyerid)) {
            $useMinMax = false;
            if (isset($defendantlawyerid['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_DEFENDANTLAWYERID, $defendantlawyerid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defendantlawyerid['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_DEFENDANTLAWYERID, $defendantlawyerid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_DEFENDANTLAWYERID, $defendantlawyerid, $comparison);
    }

    /**
     * Filter the query on the defendantlawyername column
     *
     * Example usage:
     * <code>
     * $query->filterByDefendantlawyername('fooValue');   // WHERE defendantlawyername = 'fooValue'
     * $query->filterByDefendantlawyername('%fooValue%'); // WHERE defendantlawyername LIKE '%fooValue%'
     * </code>
     *
     * @param     string $defendantlawyername The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByDefendantlawyername($defendantlawyername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($defendantlawyername)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $defendantlawyername)) {
                $defendantlawyername = str_replace('*', '%', $defendantlawyername);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_DEFENDANTLAWYERNAME, $defendantlawyername, $comparison);
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
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByJudgeid($judgeid = null, $comparison = null)
    {
        if (is_array($judgeid)) {
            $useMinMax = false;
            if (isset($judgeid['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_JUDGEID, $judgeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($judgeid['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_JUDGEID, $judgeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_JUDGEID, $judgeid, $comparison);
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
     * @return $this|ChildSuitsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SuitsTableMap::COL_JUDGENAME, $judgename, $comparison);
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
     * Filter the query on the dateofadjournment column
     *
     * Example usage:
     * <code>
     * $query->filterByDateofadjournment(1234); // WHERE dateofadjournment = 1234
     * $query->filterByDateofadjournment(array(12, 34)); // WHERE dateofadjournment IN (12, 34)
     * $query->filterByDateofadjournment(array('min' => 12)); // WHERE dateofadjournment > 12
     * </code>
     *
     * @param     mixed $dateofadjournment The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSuitsQuery The current query, for fluid interface
     */
    public function filterByDateofadjournment($dateofadjournment = null, $comparison = null)
    {
        if (is_array($dateofadjournment)) {
            $useMinMax = false;
            if (isset($dateofadjournment['min'])) {
                $this->addUsingAlias(SuitsTableMap::COL_DATEOFADJOURNMENT, $dateofadjournment['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateofadjournment['max'])) {
                $this->addUsingAlias(SuitsTableMap::COL_DATEOFADJOURNMENT, $dateofadjournment['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SuitsTableMap::COL_DATEOFADJOURNMENT, $dateofadjournment, $comparison);
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
