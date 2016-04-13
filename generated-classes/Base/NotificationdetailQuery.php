<?php

namespace Base;

use \Notificationdetail as ChildNotificationdetail;
use \NotificationdetailQuery as ChildNotificationdetailQuery;
use \Exception;
use \PDO;
use Map\NotificationdetailTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'notificationdetail' table.
 *
 *
 *
 * @method     ChildNotificationdetailQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildNotificationdetailQuery orderBySuitnumber($order = Criteria::ASC) Order by the suitnumber column
 * @method     ChildNotificationdetailQuery orderByNotificationid($order = Criteria::ASC) Order by the notificationId column
 * @method     ChildNotificationdetailQuery orderByMsgstatus($order = Criteria::ASC) Order by the msgstatus column
 * @method     ChildNotificationdetailQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildNotificationdetailQuery orderByMsgtxt($order = Criteria::ASC) Order by the msgtxt column
 * @method     ChildNotificationdetailQuery orderByDatetimesent($order = Criteria::ASC) Order by the datetimesent column
 * @method     ChildNotificationdetailQuery orderByMsgid($order = Criteria::ASC) Order by the msgid column
 * @method     ChildNotificationdetailQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildNotificationdetailQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildNotificationdetailQuery groupById() Group by the id column
 * @method     ChildNotificationdetailQuery groupBySuitnumber() Group by the suitnumber column
 * @method     ChildNotificationdetailQuery groupByNotificationid() Group by the notificationId column
 * @method     ChildNotificationdetailQuery groupByMsgstatus() Group by the msgstatus column
 * @method     ChildNotificationdetailQuery groupByPhone() Group by the phone column
 * @method     ChildNotificationdetailQuery groupByMsgtxt() Group by the msgtxt column
 * @method     ChildNotificationdetailQuery groupByDatetimesent() Group by the datetimesent column
 * @method     ChildNotificationdetailQuery groupByMsgid() Group by the msgid column
 * @method     ChildNotificationdetailQuery groupByCreated() Group by the created column
 * @method     ChildNotificationdetailQuery groupByModified() Group by the modified column
 *
 * @method     ChildNotificationdetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNotificationdetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNotificationdetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNotificationdetailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNotificationdetailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNotificationdetailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNotificationdetail findOne(ConnectionInterface $con = null) Return the first ChildNotificationdetail matching the query
 * @method     ChildNotificationdetail findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNotificationdetail matching the query, or a new ChildNotificationdetail object populated from the query conditions when no match is found
 *
 * @method     ChildNotificationdetail findOneById(int $id) Return the first ChildNotificationdetail filtered by the id column
 * @method     ChildNotificationdetail findOneBySuitnumber(int $suitnumber) Return the first ChildNotificationdetail filtered by the suitnumber column
 * @method     ChildNotificationdetail findOneByNotificationid(int $notificationId) Return the first ChildNotificationdetail filtered by the notificationId column
 * @method     ChildNotificationdetail findOneByMsgstatus(string $msgstatus) Return the first ChildNotificationdetail filtered by the msgstatus column
 * @method     ChildNotificationdetail findOneByPhone(int $phone) Return the first ChildNotificationdetail filtered by the phone column
 * @method     ChildNotificationdetail findOneByMsgtxt(string $msgtxt) Return the first ChildNotificationdetail filtered by the msgtxt column
 * @method     ChildNotificationdetail findOneByDatetimesent(int $datetimesent) Return the first ChildNotificationdetail filtered by the datetimesent column
 * @method     ChildNotificationdetail findOneByMsgid(int $msgid) Return the first ChildNotificationdetail filtered by the msgid column
 * @method     ChildNotificationdetail findOneByCreated(int $created) Return the first ChildNotificationdetail filtered by the created column
 * @method     ChildNotificationdetail findOneByModified(int $modified) Return the first ChildNotificationdetail filtered by the modified column *

 * @method     ChildNotificationdetail requirePk($key, ConnectionInterface $con = null) Return the ChildNotificationdetail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOne(ConnectionInterface $con = null) Return the first ChildNotificationdetail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNotificationdetail requireOneById(int $id) Return the first ChildNotificationdetail filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneBySuitnumber(int $suitnumber) Return the first ChildNotificationdetail filtered by the suitnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneByNotificationid(int $notificationId) Return the first ChildNotificationdetail filtered by the notificationId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneByMsgstatus(string $msgstatus) Return the first ChildNotificationdetail filtered by the msgstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneByPhone(int $phone) Return the first ChildNotificationdetail filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneByMsgtxt(string $msgtxt) Return the first ChildNotificationdetail filtered by the msgtxt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneByDatetimesent(int $datetimesent) Return the first ChildNotificationdetail filtered by the datetimesent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneByMsgid(int $msgid) Return the first ChildNotificationdetail filtered by the msgid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneByCreated(int $created) Return the first ChildNotificationdetail filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotificationdetail requireOneByModified(int $modified) Return the first ChildNotificationdetail filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNotificationdetail[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNotificationdetail objects based on current ModelCriteria
 * @method     ChildNotificationdetail[]|ObjectCollection findById(int $id) Return ChildNotificationdetail objects filtered by the id column
 * @method     ChildNotificationdetail[]|ObjectCollection findBySuitnumber(int $suitnumber) Return ChildNotificationdetail objects filtered by the suitnumber column
 * @method     ChildNotificationdetail[]|ObjectCollection findByNotificationid(int $notificationId) Return ChildNotificationdetail objects filtered by the notificationId column
 * @method     ChildNotificationdetail[]|ObjectCollection findByMsgstatus(string $msgstatus) Return ChildNotificationdetail objects filtered by the msgstatus column
 * @method     ChildNotificationdetail[]|ObjectCollection findByPhone(int $phone) Return ChildNotificationdetail objects filtered by the phone column
 * @method     ChildNotificationdetail[]|ObjectCollection findByMsgtxt(string $msgtxt) Return ChildNotificationdetail objects filtered by the msgtxt column
 * @method     ChildNotificationdetail[]|ObjectCollection findByDatetimesent(int $datetimesent) Return ChildNotificationdetail objects filtered by the datetimesent column
 * @method     ChildNotificationdetail[]|ObjectCollection findByMsgid(int $msgid) Return ChildNotificationdetail objects filtered by the msgid column
 * @method     ChildNotificationdetail[]|ObjectCollection findByCreated(int $created) Return ChildNotificationdetail objects filtered by the created column
 * @method     ChildNotificationdetail[]|ObjectCollection findByModified(int $modified) Return ChildNotificationdetail objects filtered by the modified column
 * @method     ChildNotificationdetail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NotificationdetailQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NotificationdetailQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Notificationdetail', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNotificationdetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNotificationdetailQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNotificationdetailQuery) {
            return $criteria;
        }
        $query = new ChildNotificationdetailQuery();
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
     * @return ChildNotificationdetail|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NotificationdetailTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NotificationdetailTableMap::DATABASE_NAME);
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
     * @return ChildNotificationdetail A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, suitnumber, notificationId, msgstatus, phone, msgtxt, datetimesent, msgid, created, modified FROM notificationdetail WHERE id = :p0';
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
            /** @var ChildNotificationdetail $obj */
            $obj = new ChildNotificationdetail();
            $obj->hydrate($row);
            NotificationdetailTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildNotificationdetail|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NotificationdetailTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NotificationdetailTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the suitnumber column
     *
     * Example usage:
     * <code>
     * $query->filterBySuitnumber(1234); // WHERE suitnumber = 1234
     * $query->filterBySuitnumber(array(12, 34)); // WHERE suitnumber IN (12, 34)
     * $query->filterBySuitnumber(array('min' => 12)); // WHERE suitnumber > 12
     * </code>
     *
     * @param     mixed $suitnumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterBySuitnumber($suitnumber = null, $comparison = null)
    {
        if (is_array($suitnumber)) {
            $useMinMax = false;
            if (isset($suitnumber['min'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_SUITNUMBER, $suitnumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($suitnumber['max'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_SUITNUMBER, $suitnumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_SUITNUMBER, $suitnumber, $comparison);
    }

    /**
     * Filter the query on the notificationId column
     *
     * Example usage:
     * <code>
     * $query->filterByNotificationid(1234); // WHERE notificationId = 1234
     * $query->filterByNotificationid(array(12, 34)); // WHERE notificationId IN (12, 34)
     * $query->filterByNotificationid(array('min' => 12)); // WHERE notificationId > 12
     * </code>
     *
     * @param     mixed $notificationid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByNotificationid($notificationid = null, $comparison = null)
    {
        if (is_array($notificationid)) {
            $useMinMax = false;
            if (isset($notificationid['min'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_NOTIFICATIONID, $notificationid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($notificationid['max'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_NOTIFICATIONID, $notificationid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_NOTIFICATIONID, $notificationid, $comparison);
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
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NotificationdetailTableMap::COL_MSGSTATUS, $msgstatus, $comparison);
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
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (is_array($phone)) {
            $useMinMax = false;
            if (isset($phone['min'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_PHONE, $phone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phone['max'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_PHONE, $phone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the msgtxt column
     *
     * Example usage:
     * <code>
     * $query->filterByMsgtxt('fooValue');   // WHERE msgtxt = 'fooValue'
     * $query->filterByMsgtxt('%fooValue%'); // WHERE msgtxt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $msgtxt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByMsgtxt($msgtxt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($msgtxt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $msgtxt)) {
                $msgtxt = str_replace('*', '%', $msgtxt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_MSGTXT, $msgtxt, $comparison);
    }

    /**
     * Filter the query on the datetimesent column
     *
     * Example usage:
     * <code>
     * $query->filterByDatetimesent(1234); // WHERE datetimesent = 1234
     * $query->filterByDatetimesent(array(12, 34)); // WHERE datetimesent IN (12, 34)
     * $query->filterByDatetimesent(array('min' => 12)); // WHERE datetimesent > 12
     * </code>
     *
     * @param     mixed $datetimesent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByDatetimesent($datetimesent = null, $comparison = null)
    {
        if (is_array($datetimesent)) {
            $useMinMax = false;
            if (isset($datetimesent['min'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_DATETIMESENT, $datetimesent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datetimesent['max'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_DATETIMESENT, $datetimesent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_DATETIMESENT, $datetimesent, $comparison);
    }

    /**
     * Filter the query on the msgid column
     *
     * Example usage:
     * <code>
     * $query->filterByMsgid(1234); // WHERE msgid = 1234
     * $query->filterByMsgid(array(12, 34)); // WHERE msgid IN (12, 34)
     * $query->filterByMsgid(array('min' => 12)); // WHERE msgid > 12
     * </code>
     *
     * @param     mixed $msgid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByMsgid($msgid = null, $comparison = null)
    {
        if (is_array($msgid)) {
            $useMinMax = false;
            if (isset($msgid['min'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_MSGID, $msgid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($msgid['max'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_MSGID, $msgid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_MSGID, $msgid, $comparison);
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
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(NotificationdetailTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationdetailTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNotificationdetail $notificationdetail Object to remove from the list of results
     *
     * @return $this|ChildNotificationdetailQuery The current query, for fluid interface
     */
    public function prune($notificationdetail = null)
    {
        if ($notificationdetail) {
            $this->addUsingAlias(NotificationdetailTableMap::COL_ID, $notificationdetail->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the notificationdetail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationdetailTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NotificationdetailTableMap::clearInstancePool();
            NotificationdetailTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationdetailTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NotificationdetailTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NotificationdetailTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NotificationdetailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NotificationdetailQuery
