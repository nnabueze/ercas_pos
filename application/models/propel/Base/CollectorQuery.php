<?php

namespace Base;

use \Collector as ChildCollector;
use \CollectorQuery as ChildCollectorQuery;
use \Exception;
use \PDO;
use Map\CollectorTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'collector' table.
 *
 *
 *
 * @method     ChildCollectorQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCollectorQuery orderByCollectorName($order = Criteria::ASC) Order by the collector_name column
 * @method     ChildCollectorQuery orderByCollectorId($order = Criteria::ASC) Order by the collector_id column
 * @method     ChildCollectorQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildCollectorQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildCollectorQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildCollectorQuery groupById() Group by the id column
 * @method     ChildCollectorQuery groupByCollectorName() Group by the collector_name column
 * @method     ChildCollectorQuery groupByCollectorId() Group by the collector_id column
 * @method     ChildCollectorQuery groupByUsername() Group by the username column
 * @method     ChildCollectorQuery groupByPassword() Group by the password column
 * @method     ChildCollectorQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildCollectorQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCollectorQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCollectorQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCollectorQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCollectorQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCollectorQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCollector findOne(ConnectionInterface $con = null) Return the first ChildCollector matching the query
 * @method     ChildCollector findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCollector matching the query, or a new ChildCollector object populated from the query conditions when no match is found
 *
 * @method     ChildCollector findOneById(int $id) Return the first ChildCollector filtered by the id column
 * @method     ChildCollector findOneByCollectorName(string $collector_name) Return the first ChildCollector filtered by the collector_name column
 * @method     ChildCollector findOneByCollectorId(string $collector_id) Return the first ChildCollector filtered by the collector_id column
 * @method     ChildCollector findOneByUsername(string $username) Return the first ChildCollector filtered by the username column
 * @method     ChildCollector findOneByPassword(string $password) Return the first ChildCollector filtered by the password column
 * @method     ChildCollector findOneByCreatedAt(string $created_at) Return the first ChildCollector filtered by the created_at column *

 * @method     ChildCollector requirePk($key, ConnectionInterface $con = null) Return the ChildCollector by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCollector requireOne(ConnectionInterface $con = null) Return the first ChildCollector matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCollector requireOneById(int $id) Return the first ChildCollector filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCollector requireOneByCollectorName(string $collector_name) Return the first ChildCollector filtered by the collector_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCollector requireOneByCollectorId(string $collector_id) Return the first ChildCollector filtered by the collector_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCollector requireOneByUsername(string $username) Return the first ChildCollector filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCollector requireOneByPassword(string $password) Return the first ChildCollector filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCollector requireOneByCreatedAt(string $created_at) Return the first ChildCollector filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCollector[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCollector objects based on current ModelCriteria
 * @method     ChildCollector[]|ObjectCollection findById(int $id) Return ChildCollector objects filtered by the id column
 * @method     ChildCollector[]|ObjectCollection findByCollectorName(string $collector_name) Return ChildCollector objects filtered by the collector_name column
 * @method     ChildCollector[]|ObjectCollection findByCollectorId(string $collector_id) Return ChildCollector objects filtered by the collector_id column
 * @method     ChildCollector[]|ObjectCollection findByUsername(string $username) Return ChildCollector objects filtered by the username column
 * @method     ChildCollector[]|ObjectCollection findByPassword(string $password) Return ChildCollector objects filtered by the password column
 * @method     ChildCollector[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildCollector objects filtered by the created_at column
 * @method     ChildCollector[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CollectorQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CollectorQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Collector', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCollectorQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCollectorQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCollectorQuery) {
            return $criteria;
        }
        $query = new ChildCollectorQuery();
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
     * @return ChildCollector|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CollectorTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CollectorTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
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
     * @return ChildCollector A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, collector_name, collector_id, username, password, created_at FROM collector WHERE id = :p0';
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
            /** @var ChildCollector $obj */
            $obj = new ChildCollector();
            $obj->hydrate($row);
            CollectorTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCollector|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CollectorTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CollectorTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CollectorTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CollectorTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CollectorTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the collector_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCollectorName('fooValue');   // WHERE collector_name = 'fooValue'
     * $query->filterByCollectorName('%fooValue%'); // WHERE collector_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $collectorName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function filterByCollectorName($collectorName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($collectorName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $collectorName)) {
                $collectorName = str_replace('*', '%', $collectorName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollectorTableMap::COL_COLLECTOR_NAME, $collectorName, $comparison);
    }

    /**
     * Filter the query on the collector_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCollectorId('fooValue');   // WHERE collector_id = 'fooValue'
     * $query->filterByCollectorId('%fooValue%'); // WHERE collector_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $collectorId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function filterByCollectorId($collectorId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($collectorId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $collectorId)) {
                $collectorId = str_replace('*', '%', $collectorId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollectorTableMap::COL_COLLECTOR_ID, $collectorId, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollectorTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CollectorTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CollectorTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CollectorTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CollectorTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCollector $collector Object to remove from the list of results
     *
     * @return $this|ChildCollectorQuery The current query, for fluid interface
     */
    public function prune($collector = null)
    {
        if ($collector) {
            $this->addUsingAlias(CollectorTableMap::COL_ID, $collector->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the collector table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CollectorTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CollectorTableMap::clearInstancePool();
            CollectorTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CollectorTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CollectorTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CollectorTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CollectorTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CollectorQuery
