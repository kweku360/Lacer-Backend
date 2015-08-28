<?php

namespace Base;

use \Documents as ChildDocuments;
use \DocumentsQuery as ChildDocumentsQuery;
use \Exception;
use Map\DocumentsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'documents' table.
 *
 *
 *
 * @method     ChildDocumentsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDocumentsQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildDocumentsQuery orderByTypeid($order = Criteria::ASC) Order by the typeid column
 * @method     ChildDocumentsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildDocumentsQuery orderBySuitid($order = Criteria::ASC) Order by the suitid column
 * @method     ChildDocumentsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildDocumentsQuery orderByDatefiled($order = Criteria::ASC) Order by the datefiled column
 * @method     ChildDocumentsQuery orderByFormat($order = Criteria::ASC) Order by the format column
 * @method     ChildDocumentsQuery orderByPagecount($order = Criteria::ASC) Order by the pagecount column
 * @method     ChildDocumentsQuery orderByDataentrypersonid($order = Criteria::ASC) Order by the dataentrypersonid column
 * @method     ChildDocumentsQuery orderByAccessstatus($order = Criteria::ASC) Order by the accessstatus column
 * @method     ChildDocumentsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildDocumentsQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildDocumentsQuery groupById() Group by the id column
 * @method     ChildDocumentsQuery groupByCode() Group by the code column
 * @method     ChildDocumentsQuery groupByTypeid() Group by the typeid column
 * @method     ChildDocumentsQuery groupByType() Group by the type column
 * @method     ChildDocumentsQuery groupBySuitid() Group by the suitid column
 * @method     ChildDocumentsQuery groupByName() Group by the name column
 * @method     ChildDocumentsQuery groupByDatefiled() Group by the datefiled column
 * @method     ChildDocumentsQuery groupByFormat() Group by the format column
 * @method     ChildDocumentsQuery groupByPagecount() Group by the pagecount column
 * @method     ChildDocumentsQuery groupByDataentrypersonid() Group by the dataentrypersonid column
 * @method     ChildDocumentsQuery groupByAccessstatus() Group by the accessstatus column
 * @method     ChildDocumentsQuery groupByCreated() Group by the created column
 * @method     ChildDocumentsQuery groupByModified() Group by the modified column
 *
 * @method     ChildDocumentsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDocumentsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDocumentsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDocumentsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDocumentsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDocumentsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDocuments findOne(ConnectionInterface $con = null) Return the first ChildDocuments matching the query
 * @method     ChildDocuments findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDocuments matching the query, or a new ChildDocuments object populated from the query conditions when no match is found
 *
 * @method     ChildDocuments findOneById(int $id) Return the first ChildDocuments filtered by the id column
 * @method     ChildDocuments findOneByCode(string $code) Return the first ChildDocuments filtered by the code column
 * @method     ChildDocuments findOneByTypeid(int $typeid) Return the first ChildDocuments filtered by the typeid column
 * @method     ChildDocuments findOneByType(string $type) Return the first ChildDocuments filtered by the type column
 * @method     ChildDocuments findOneBySuitid(string $suitid) Return the first ChildDocuments filtered by the suitid column
 * @method     ChildDocuments findOneByName(string $name) Return the first ChildDocuments filtered by the name column
 * @method     ChildDocuments findOneByDatefiled(int $datefiled) Return the first ChildDocuments filtered by the datefiled column
 * @method     ChildDocuments findOneByFormat(string $format) Return the first ChildDocuments filtered by the format column
 * @method     ChildDocuments findOneByPagecount(int $pagecount) Return the first ChildDocuments filtered by the pagecount column
 * @method     ChildDocuments findOneByDataentrypersonid(int $dataentrypersonid) Return the first ChildDocuments filtered by the dataentrypersonid column
 * @method     ChildDocuments findOneByAccessstatus(string $accessstatus) Return the first ChildDocuments filtered by the accessstatus column
 * @method     ChildDocuments findOneByCreated(int $created) Return the first ChildDocuments filtered by the created column
 * @method     ChildDocuments findOneByModified(int $modified) Return the first ChildDocuments filtered by the modified column *

 * @method     ChildDocuments requirePk($key, ConnectionInterface $con = null) Return the ChildDocuments by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOne(ConnectionInterface $con = null) Return the first ChildDocuments matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDocuments requireOneById(int $id) Return the first ChildDocuments filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByCode(string $code) Return the first ChildDocuments filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByTypeid(int $typeid) Return the first ChildDocuments filtered by the typeid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByType(string $type) Return the first ChildDocuments filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneBySuitid(string $suitid) Return the first ChildDocuments filtered by the suitid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByName(string $name) Return the first ChildDocuments filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByDatefiled(int $datefiled) Return the first ChildDocuments filtered by the datefiled column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByFormat(string $format) Return the first ChildDocuments filtered by the format column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByPagecount(int $pagecount) Return the first ChildDocuments filtered by the pagecount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByDataentrypersonid(int $dataentrypersonid) Return the first ChildDocuments filtered by the dataentrypersonid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByAccessstatus(string $accessstatus) Return the first ChildDocuments filtered by the accessstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByCreated(int $created) Return the first ChildDocuments filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocuments requireOneByModified(int $modified) Return the first ChildDocuments filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDocuments[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDocuments objects based on current ModelCriteria
 * @method     ChildDocuments[]|ObjectCollection findById(int $id) Return ChildDocuments objects filtered by the id column
 * @method     ChildDocuments[]|ObjectCollection findByCode(string $code) Return ChildDocuments objects filtered by the code column
 * @method     ChildDocuments[]|ObjectCollection findByTypeid(int $typeid) Return ChildDocuments objects filtered by the typeid column
 * @method     ChildDocuments[]|ObjectCollection findByType(string $type) Return ChildDocuments objects filtered by the type column
 * @method     ChildDocuments[]|ObjectCollection findBySuitid(string $suitid) Return ChildDocuments objects filtered by the suitid column
 * @method     ChildDocuments[]|ObjectCollection findByName(string $name) Return ChildDocuments objects filtered by the name column
 * @method     ChildDocuments[]|ObjectCollection findByDatefiled(int $datefiled) Return ChildDocuments objects filtered by the datefiled column
 * @method     ChildDocuments[]|ObjectCollection findByFormat(string $format) Return ChildDocuments objects filtered by the format column
 * @method     ChildDocuments[]|ObjectCollection findByPagecount(int $pagecount) Return ChildDocuments objects filtered by the pagecount column
 * @method     ChildDocuments[]|ObjectCollection findByDataentrypersonid(int $dataentrypersonid) Return ChildDocuments objects filtered by the dataentrypersonid column
 * @method     ChildDocuments[]|ObjectCollection findByAccessstatus(string $accessstatus) Return ChildDocuments objects filtered by the accessstatus column
 * @method     ChildDocuments[]|ObjectCollection findByCreated(int $created) Return ChildDocuments objects filtered by the created column
 * @method     ChildDocuments[]|ObjectCollection findByModified(int $modified) Return ChildDocuments objects filtered by the modified column
 * @method     ChildDocuments[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DocumentsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DocumentsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Documents', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDocumentsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDocumentsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDocumentsQuery) {
            return $criteria;
        }
        $query = new ChildDocumentsQuery();
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
     * @return ChildDocuments|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Documents object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Documents object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Documents object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Documents object has no primary key');
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
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the typeid column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeid(1234); // WHERE typeid = 1234
     * $query->filterByTypeid(array(12, 34)); // WHERE typeid IN (12, 34)
     * $query->filterByTypeid(array('min' => 12)); // WHERE typeid > 12
     * </code>
     *
     * @param     mixed $typeid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByTypeid($typeid = null, $comparison = null)
    {
        if (is_array($typeid)) {
            $useMinMax = false;
            if (isset($typeid['min'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_TYPEID, $typeid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeid['max'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_TYPEID, $typeid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_TYPEID, $typeid, $comparison);
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
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DocumentsTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the suitid column
     *
     * Example usage:
     * <code>
     * $query->filterBySuitid('fooValue');   // WHERE suitid = 'fooValue'
     * $query->filterBySuitid('%fooValue%'); // WHERE suitid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $suitid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterBySuitid($suitid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($suitid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $suitid)) {
                $suitid = str_replace('*', '%', $suitid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_SUITID, $suitid, $comparison);
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
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DocumentsTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByDatefiled($datefiled = null, $comparison = null)
    {
        if (is_array($datefiled)) {
            $useMinMax = false;
            if (isset($datefiled['min'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_DATEFILED, $datefiled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datefiled['max'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_DATEFILED, $datefiled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_DATEFILED, $datefiled, $comparison);
    }

    /**
     * Filter the query on the format column
     *
     * Example usage:
     * <code>
     * $query->filterByFormat('fooValue');   // WHERE format = 'fooValue'
     * $query->filterByFormat('%fooValue%'); // WHERE format LIKE '%fooValue%'
     * </code>
     *
     * @param     string $format The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByFormat($format = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($format)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $format)) {
                $format = str_replace('*', '%', $format);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_FORMAT, $format, $comparison);
    }

    /**
     * Filter the query on the pagecount column
     *
     * Example usage:
     * <code>
     * $query->filterByPagecount(1234); // WHERE pagecount = 1234
     * $query->filterByPagecount(array(12, 34)); // WHERE pagecount IN (12, 34)
     * $query->filterByPagecount(array('min' => 12)); // WHERE pagecount > 12
     * </code>
     *
     * @param     mixed $pagecount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByPagecount($pagecount = null, $comparison = null)
    {
        if (is_array($pagecount)) {
            $useMinMax = false;
            if (isset($pagecount['min'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_PAGECOUNT, $pagecount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pagecount['max'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_PAGECOUNT, $pagecount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_PAGECOUNT, $pagecount, $comparison);
    }

    /**
     * Filter the query on the dataentrypersonid column
     *
     * Example usage:
     * <code>
     * $query->filterByDataentrypersonid(1234); // WHERE dataentrypersonid = 1234
     * $query->filterByDataentrypersonid(array(12, 34)); // WHERE dataentrypersonid IN (12, 34)
     * $query->filterByDataentrypersonid(array('min' => 12)); // WHERE dataentrypersonid > 12
     * </code>
     *
     * @param     mixed $dataentrypersonid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByDataentrypersonid($dataentrypersonid = null, $comparison = null)
    {
        if (is_array($dataentrypersonid)) {
            $useMinMax = false;
            if (isset($dataentrypersonid['min'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_DATAENTRYPERSONID, $dataentrypersonid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dataentrypersonid['max'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_DATAENTRYPERSONID, $dataentrypersonid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_DATAENTRYPERSONID, $dataentrypersonid, $comparison);
    }

    /**
     * Filter the query on the accessstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByAccessstatus('fooValue');   // WHERE accessstatus = 'fooValue'
     * $query->filterByAccessstatus('%fooValue%'); // WHERE accessstatus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accessstatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByAccessstatus($accessstatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accessstatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $accessstatus)) {
                $accessstatus = str_replace('*', '%', $accessstatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_ACCESSSTATUS, $accessstatus, $comparison);
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
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(DocumentsTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentsTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDocuments $documents Object to remove from the list of results
     *
     * @return $this|ChildDocumentsQuery The current query, for fluid interface
     */
    public function prune($documents = null)
    {
        if ($documents) {
            throw new LogicException('Documents object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the documents table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DocumentsTableMap::clearInstancePool();
            DocumentsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DocumentsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DocumentsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DocumentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DocumentsQuery
