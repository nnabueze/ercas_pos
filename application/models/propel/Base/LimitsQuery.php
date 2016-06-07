<?php

namespace Base;

use \Limits as ChildLimits;
use \LimitsQuery as ChildLimitsQuery;
use \Exception;
use \PDO;
use Map\LimitsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'limits' table.
 *
 *
 *
 * @method     ChildLimitsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLimitsQuery orderByUri($order = Criteria::ASC) Order by the uri column
 * @method     ChildLimitsQuery orderByCount($order = Criteria::ASC) Order by the count column
 * @method     ChildLimitsQuery orderByHourStarted($order = Criteria::ASC) Order by the hour_started column
 * @method     ChildLimitsQuery orderByApiKey($order = Criteria::ASC) Order by the api_key column
 *
 * @method     ChildLimitsQuery groupById() Group by the id column
 * @method     ChildLimitsQuery groupByUri() Group by the uri column
 * @method     ChildLimitsQuery groupByCount() Group by the count column
 * @method     ChildLimitsQuery groupByHourStarted() Group by the hour_started column
 * @method     ChildLimitsQuery groupByApiKey() Group by the api_key column
 *
 * @method     ChildLimitsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLimitsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLimitsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLimitsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLimitsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLimitsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLimits findOne(ConnectionInterface $con = null) Return the first ChildLimits matching the query
 * @method     ChildLimits findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLimits matching the query, or a new ChildLimits object populated from the query conditions when no match is found
 *
 * @method     ChildLimits findOneById(int $id) Return the first ChildLimits filtered by the id column
 * @method     ChildLimits findOneByUri(string $uri) Return the first ChildLimits filtered by the uri column
 * @method     ChildLimits findOneByCount(int $count) Return the first ChildLimits filtered by the count column
 * @method     ChildLimits findOneByHourStarted(int $hour_started) Return the first ChildLimits filtered by the hour_started column
 * @method     ChildLimits findOneByApiKey(string $api_key) Return the first ChildLimits filtered by the api_key column *

 * @method     ChildLimits requirePk($key, ConnectionInterface $con = null) Return the ChildLimits by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLimits requireOne(ConnectionInterface $con = null) Return the first ChildLimits matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLimits requireOneById(int $id) Return the first ChildLimits filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLimits requireOneByUri(string $uri) Return the first ChildLimits filtered by the uri column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLimits requireOneByCount(int $count) Return the first ChildLimits filtered by the count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLimits requireOneByHourStarted(int $hour_started) Return the first ChildLimits filtered by the hour_started column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLimits requireOneByApiKey(string $api_key) Return the first ChildLimits filtered by the api_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLimits[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLimits objects based on current ModelCriteria
 * @method     ChildLimits[]|ObjectCollection findById(int $id) Return ChildLimits objects filtered by the id column
 * @method     ChildLimits[]|ObjectCollection findByUri(string $uri) Return ChildLimits objects filtered by the uri column
 * @method     ChildLimits[]|ObjectCollection findByCount(int $count) Return ChildLimits objects filtered by the count column
 * @method     ChildLimits[]|ObjectCollection findByHourStarted(int $hour_started) Return ChildLimits objects filtered by the hour_started column
 * @method     ChildLimits[]|ObjectCollection findByApiKey(string $api_key) Return ChildLimits objects filtered by the api_key column
 * @method     ChildLimits[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LimitsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LimitsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Limits', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLimitsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLimitsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLimitsQuery) {
            return $criteria;
        }
        $query = new ChildLimitsQuery();
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
     * @return ChildLimits|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LimitsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LimitsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLimits A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, uri, count, hour_started, api_key FROM limits WHERE id = :p0';
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
            /** @var ChildLimits $obj */
            $obj = new ChildLimits();
            $obj->hydrate($row);
            LimitsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLimits|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLimitsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LimitsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLimitsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LimitsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildLimitsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LimitsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LimitsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimitsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the uri column
     *
     * Example usage:
     * <code>
     * $query->filterByUri('fooValue');   // WHERE uri = 'fooValue'
     * $query->filterByUri('%fooValue%'); // WHERE uri LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uri The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLimitsQuery The current query, for fluid interface
     */
    public function filterByUri($uri = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uri)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $uri)) {
                $uri = str_replace('*', '%', $uri);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LimitsTableMap::COL_URI, $uri, $comparison);
    }

    /**
     * Filter the query on the count column
     *
     * Example usage:
     * <code>
     * $query->filterByCount(1234); // WHERE count = 1234
     * $query->filterByCount(array(12, 34)); // WHERE count IN (12, 34)
     * $query->filterByCount(array('min' => 12)); // WHERE count > 12
     * </code>
     *
     * @param     mixed $count The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLimitsQuery The current query, for fluid interface
     */
    public function filterByCount($count = null, $comparison = null)
    {
        if (is_array($count)) {
            $useMinMax = false;
            if (isset($count['min'])) {
                $this->addUsingAlias(LimitsTableMap::COL_COUNT, $count['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($count['max'])) {
                $this->addUsingAlias(LimitsTableMap::COL_COUNT, $count['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimitsTableMap::COL_COUNT, $count, $comparison);
    }

    /**
     * Filter the query on the hour_started column
     *
     * Example usage:
     * <code>
     * $query->filterByHourStarted(1234); // WHERE hour_started = 1234
     * $query->filterByHourStarted(array(12, 34)); // WHERE hour_started IN (12, 34)
     * $query->filterByHourStarted(array('min' => 12)); // WHERE hour_started > 12
     * </code>
     *
     * @param     mixed $hourStarted The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLimitsQuery The current query, for fluid interface
     */
    public function filterByHourStarted($hourStarted = null, $comparison = null)
    {
        if (is_array($hourStarted)) {
            $useMinMax = false;
            if (isset($hourStarted['min'])) {
                $this->addUsingAlias(LimitsTableMap::COL_HOUR_STARTED, $hourStarted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hourStarted['max'])) {
                $this->addUsingAlias(LimitsTableMap::COL_HOUR_STARTED, $hourStarted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LimitsTableMap::COL_HOUR_STARTED, $hourStarted, $comparison);
    }

    /**
     * Filter the query on the api_key column
     *
     * Example usage:
     * <code>
     * $query->filterByApiKey('fooValue');   // WHERE api_key = 'fooValue'
     * $query->filterByApiKey('%fooValue%'); // WHERE api_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $apiKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLimitsQuery The current query, for fluid interface
     */
    public function filterByApiKey($apiKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($apiKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $apiKey)) {
                $apiKey = str_replace('*', '%', $apiKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LimitsTableMap::COL_API_KEY, $apiKey, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLimits $limits Object to remove from the list of results
     *
     * @return $this|ChildLimitsQuery The current query, for fluid interface
     */
    public function prune($limits = null)
    {
        if ($limits) {
            $this->addUsingAlias(LimitsTableMap::COL_ID, $limits->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the limits table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LimitsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LimitsTableMap::clearInstancePool();
            LimitsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LimitsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LimitsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LimitsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LimitsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LimitsQuery
