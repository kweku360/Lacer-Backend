<?php

namespace Base;

use \Notifications as ChildNotifications;
use \NotificationsQuery as ChildNotificationsQuery;
use \Exception;
use \PDO;
use Map\NotificationsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'notifications' table.
 *
 *
 *
 * @method     ChildNotificationsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildNotificationsQuery orderByDocumentid($order = Criteria::ASC) Order by the documentid column
 * @method     ChildNotificationsQuery orderByDocumentlink($order = Criteria::ASC) Order by the documentlink column
 * @method     ChildNotificationsQuery orderByFiler($order = Criteria::ASC) Order by the filer column
 * @method     ChildNotificationsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildNotificationsQuery orderBySuitnumber($order = Criteria::ASC) Order by the suitnumber column
 * @method     ChildNotificationsQuery orderByDatetimesent($order = Criteria::ASC) Order by the datetimesent column
 * @method     ChildNotificationsQuery orderByRecipients($order = Criteria::ASC) Order by the recipients column
 * @method     ChildNotificationsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildNotificationsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildNotificationsQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method     ChildNotificationsQuery groupById() Group by the id column
 * @method     ChildNotificationsQuery groupByDocumentid() Group by the documentid column
 * @method     ChildNotificationsQuery groupByDocumentlink() Group by the documentlink column
 * @method     ChildNotificationsQuery groupByFiler() Group by the filer column
 * @method     ChildNotificationsQuery groupByType() Group by the type column
 * @method     ChildNotificationsQuery groupBySuitnumber() Group by the suitnumber column
 * @method     ChildNotificationsQuery groupByDatetimesent() Group by the datetimesent column
 * @method     ChildNotificationsQuery groupByRecipients() Group by the recipients column
 * @method     ChildNotificationsQuery groupByStatus() Group by the status column
 * @method     ChildNotificationsQuery groupByCreated() Group by the created column
 * @method     ChildNotificationsQuery groupByModified() Group by the modified column
 *
 * @method     ChildNotificationsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNotificationsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNotificationsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNotificationsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNotificationsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNotificationsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNotifications findOne(ConnectionInterface $con = null) Return the first ChildNotifications matching the query
 * @method     ChildNotifications findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNotifications matching the query, or a new ChildNotifications object populated from the query conditions when no match is found
 *
 * @method     ChildNotifications findOneById(int $id) Return the first ChildNotifications filtered by the id column
 * @method     ChildNotifications findOneByDocumentid(int $documentid) Return the first ChildNotifications filtered by the documentid column
 * @method     ChildNotifications findOneByDocumentlink(string $documentlink) Return the first ChildNotifications filtered by the documentlink column
 * @method     ChildNotifications findOneByFiler(string $filer) Return the first ChildNotifications filtered by the filer column
 * @method     ChildNotifications findOneByType(string $type) Return the first ChildNotifications filtered by the type column
 * @method     ChildNotifications findOneBySuitnumber(string $suitnumber) Return the first ChildNotifications filtered by the suitnumber column
 * @method     ChildNotifications findOneByDatetimesent(int $datetimesent) Return the first ChildNotifications filtered by the datetimesent column
 * @method     ChildNotifications findOneByRecipients(string $recipients) Return the first ChildNotifications filtered by the recipients column
 * @method     ChildNotifications findOneByStatus(string $status) Return the first ChildNotifications filtered by the status column
 * @method     ChildNotifications findOneByCreated(int $created) Return the first ChildNotifications filtered by the created column
 * @method     ChildNotifications findOneByModified(int $modified) Return the first ChildNotifications filtered by the modified column *

 * @method     ChildNotifications requirePk($key, ConnectionInterface $con = null) Return the ChildNotifications by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOne(ConnectionInterface $con = null) Return the first ChildNotifications matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNotifications requireOneById(int $id) Return the first ChildNotifications filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByDocumentid(int $documentid) Return the first ChildNotifications filtered by the documentid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByDocumentlink(string $documentlink) Return the first ChildNotifications filtered by the documentlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByFiler(string $filer) Return the first ChildNotifications filtered by the filer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByType(string $type) Return the first ChildNotifications filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneBySuitnumber(string $suitnumber) Return the first ChildNotifications filtered by the suitnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByDatetimesent(int $datetimesent) Return the first ChildNotifications filtered by the datetimesent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByRecipients(string $recipients) Return the first ChildNotifications filtered by the recipients column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByStatus(string $status) Return the first ChildNotifications filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByCreated(int $created) Return the first ChildNotifications filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNotifications requireOneByModified(int $modified) Return the first ChildNotifications filtered by the modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNotifications[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNotifications objects based on current ModelCriteria
 * @method     ChildNotifications[]|ObjectCollection findById(int $id) Return ChildNotifications objects filtered by the id column
 * @method     ChildNotifications[]|ObjectCollection findByDocumentid(int $documentid) Return ChildNotifications objects filtered by the documentid column
 * @method     ChildNotifications[]|ObjectCollection findByDocumentlink(string $documentlink) Return ChildNotifications objects filtered by the documentlink column
 * @method     ChildNotifications[]|ObjectCollection findByFiler(string $filer) Return ChildNotifications objects filtered by the filer column
 * @method     ChildNotifications[]|ObjectCollection findByType(string $type) Return ChildNotifications objects filtered by the type column
 * @method     ChildNotifications[]|ObjectCollection findBySuitnumber(string $suitnumber) Return ChildNotifications objects filtered by the suitnumber column
 * @method     ChildNotifications[]|ObjectCollection findByDatetimesent(int $datetimesent) Return ChildNotifications objects filtered by the datetimesent column
 * @method     ChildNotifications[]|ObjectCollection findByRecipients(string $recipients) Return ChildNotifications objects filtered by the recipients column
 * @method     ChildNotifications[]|ObjectCollection findByStatus(string $status) Return ChildNotifications objects filtered by the status column
 * @method     ChildNotifications[]|ObjectCollection findByCreated(int $created) Return ChildNotifications objects filtered by the created column
 * @method     ChildNotifications[]|ObjectCollection findByModified(int $modified) Return ChildNotifications objects filtered by the modified column
 * @method     ChildNotifications[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NotificationsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NotificationsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lacerdb', $modelName = '\\Notifications', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNotificationsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNotificationsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNotificationsQuery) {
            return $criteria;
        }
        $query = new ChildNotificationsQuery();
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
     * @return ChildNotifications|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NotificationsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NotificationsTableMap::DATABASE_NAME);
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
     * @return ChildNotifications A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, documentid, documentlink, filer, type, suitnumber, datetimesent, recipients, status, created, modified FROM notifications WHERE id = :p0';
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
            /** @var ChildNotifications $obj */
            $obj = new ChildNotifications();
            $obj->hydrate($row);
            NotificationsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildNotifications|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NotificationsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NotificationsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the documentid column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentid(1234); // WHERE documentid = 1234
     * $query->filterByDocumentid(array(12, 34)); // WHERE documentid IN (12, 34)
     * $query->filterByDocumentid(array('min' => 12)); // WHERE documentid > 12
     * </code>
     *
     * @param     mixed $documentid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByDocumentid($documentid = null, $comparison = null)
    {
        if (is_array($documentid)) {
            $useMinMax = false;
            if (isset($documentid['min'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_DOCUMENTID, $documentid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documentid['max'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_DOCUMENTID, $documentid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationsTableMap::COL_DOCUMENTID, $documentid, $comparison);
    }

    /**
     * Filter the query on the documentlink column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentlink('fooValue');   // WHERE documentlink = 'fooValue'
     * $query->filterByDocumentlink('%fooValue%'); // WHERE documentlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $documentlink The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByDocumentlink($documentlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($documentlink)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $documentlink)) {
                $documentlink = str_replace('*', '%', $documentlink);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NotificationsTableMap::COL_DOCUMENTLINK, $documentlink, $comparison);
    }

    /**
     * Filter the query on the filer column
     *
     * Example usage:
     * <code>
     * $query->filterByFiler('fooValue');   // WHERE filer = 'fooValue'
     * $query->filterByFiler('%fooValue%'); // WHERE filer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByFiler($filer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filer)) {
                $filer = str_replace('*', '%', $filer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NotificationsTableMap::COL_FILER, $filer, $comparison);
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
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NotificationsTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NotificationsTableMap::COL_SUITNUMBER, $suitnumber, $comparison);
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
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByDatetimesent($datetimesent = null, $comparison = null)
    {
        if (is_array($datetimesent)) {
            $useMinMax = false;
            if (isset($datetimesent['min'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_DATETIMESENT, $datetimesent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datetimesent['max'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_DATETIMESENT, $datetimesent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationsTableMap::COL_DATETIMESENT, $datetimesent, $comparison);
    }

    /**
     * Filter the query on the recipients column
     *
     * Example usage:
     * <code>
     * $query->filterByRecipients('fooValue');   // WHERE recipients = 'fooValue'
     * $query->filterByRecipients('%fooValue%'); // WHERE recipients LIKE '%fooValue%'
     * </code>
     *
     * @param     string $recipients The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByRecipients($recipients = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($recipients)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $recipients)) {
                $recipients = str_replace('*', '%', $recipients);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NotificationsTableMap::COL_RECIPIENTS, $recipients, $comparison);
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
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NotificationsTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationsTableMap::COL_CREATED, $created, $comparison);
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
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(NotificationsTableMap::COL_MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationsTableMap::COL_MODIFIED, $modified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNotifications $notifications Object to remove from the list of results
     *
     * @return $this|ChildNotificationsQuery The current query, for fluid interface
     */
    public function prune($notifications = null)
    {
        if ($notifications) {
            $this->addUsingAlias(NotificationsTableMap::COL_ID, $notifications->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the notifications table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NotificationsTableMap::clearInstancePool();
            NotificationsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NotificationsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NotificationsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NotificationsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NotificationsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NotificationsQuery
