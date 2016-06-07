<?php

namespace Base;

use \KluAlerttbl as ChildKluAlerttbl;
use \KluAlerttblQuery as ChildKluAlerttblQuery;
use \Exception;
use \PDO;
use Map\KluAlerttblTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'klu_alerttbl' table.
 *
 *
 *
 * @method     ChildKluAlerttblQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKluAlerttblQuery orderByPk($order = Criteria::ASC) Order by the pk column
 * @method     ChildKluAlerttblQuery orderByTbl($order = Criteria::ASC) Order by the tbl column
 * @method     ChildKluAlerttblQuery orderByUpdateTime($order = Criteria::ASC) Order by the update_time column
 * @method     ChildKluAlerttblQuery orderByNotificationmgs($order = Criteria::ASC) Order by the notificationmgs column
 * @method     ChildKluAlerttblQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildKluAlerttblQuery groupById() Group by the id column
 * @method     ChildKluAlerttblQuery groupByPk() Group by the pk column
 * @method     ChildKluAlerttblQuery groupByTbl() Group by the tbl column
 * @method     ChildKluAlerttblQuery groupByUpdateTime() Group by the update_time column
 * @method     ChildKluAlerttblQuery groupByNotificationmgs() Group by the notificationmgs column
 * @method     ChildKluAlerttblQuery groupByStatus() Group by the status column
 *
 * @method     ChildKluAlerttblQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKluAlerttblQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKluAlerttblQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKluAlerttblQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKluAlerttblQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKluAlerttblQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKluAlerttbl findOne(ConnectionInterface $con = null) Return the first ChildKluAlerttbl matching the query
 * @method     ChildKluAlerttbl findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKluAlerttbl matching the query, or a new ChildKluAlerttbl object populated from the query conditions when no match is found
 *
 * @method     ChildKluAlerttbl findOneById(int $id) Return the first ChildKluAlerttbl filtered by the id column
 * @method     ChildKluAlerttbl findOneByPk(int $pk) Return the first ChildKluAlerttbl filtered by the pk column
 * @method     ChildKluAlerttbl findOneByTbl(string $tbl) Return the first ChildKluAlerttbl filtered by the tbl column
 * @method     ChildKluAlerttbl findOneByUpdateTime(string $update_time) Return the first ChildKluAlerttbl filtered by the update_time column
 * @method     ChildKluAlerttbl findOneByNotificationmgs(string $notificationmgs) Return the first ChildKluAlerttbl filtered by the notificationmgs column
 * @method     ChildKluAlerttbl findOneByStatus(string $status) Return the first ChildKluAlerttbl filtered by the status column *

 * @method     ChildKluAlerttbl requirePk($key, ConnectionInterface $con = null) Return the ChildKluAlerttbl by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAlerttbl requireOne(ConnectionInterface $con = null) Return the first ChildKluAlerttbl matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluAlerttbl requireOneById(int $id) Return the first ChildKluAlerttbl filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAlerttbl requireOneByPk(int $pk) Return the first ChildKluAlerttbl filtered by the pk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAlerttbl requireOneByTbl(string $tbl) Return the first ChildKluAlerttbl filtered by the tbl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAlerttbl requireOneByUpdateTime(string $update_time) Return the first ChildKluAlerttbl filtered by the update_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAlerttbl requireOneByNotificationmgs(string $notificationmgs) Return the first ChildKluAlerttbl filtered by the notificationmgs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAlerttbl requireOneByStatus(string $status) Return the first ChildKluAlerttbl filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluAlerttbl[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKluAlerttbl objects based on current ModelCriteria
 * @method     ChildKluAlerttbl[]|ObjectCollection findById(int $id) Return ChildKluAlerttbl objects filtered by the id column
 * @method     ChildKluAlerttbl[]|ObjectCollection findByPk(int $pk) Return ChildKluAlerttbl objects filtered by the pk column
 * @method     ChildKluAlerttbl[]|ObjectCollection findByTbl(string $tbl) Return ChildKluAlerttbl objects filtered by the tbl column
 * @method     ChildKluAlerttbl[]|ObjectCollection findByUpdateTime(string $update_time) Return ChildKluAlerttbl objects filtered by the update_time column
 * @method     ChildKluAlerttbl[]|ObjectCollection findByNotificationmgs(string $notificationmgs) Return ChildKluAlerttbl objects filtered by the notificationmgs column
 * @method     ChildKluAlerttbl[]|ObjectCollection findByStatus(string $status) Return ChildKluAlerttbl objects filtered by the status column
 * @method     ChildKluAlerttbl[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KluAlerttblQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KluAlerttblQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KluAlerttbl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKluAlerttblQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKluAlerttblQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKluAlerttblQuery) {
            return $criteria;
        }
        $query = new ChildKluAlerttblQuery();
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
     * @return ChildKluAlerttbl|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluAlerttblTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KluAlerttblTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildKluAlerttbl A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, pk, tbl, update_time, notificationmgs, status FROM klu_alerttbl WHERE id = :p0';
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
            /** @var ChildKluAlerttbl $obj */
            $obj = new ChildKluAlerttbl();
            $obj->hydrate($row);
            KluAlerttblTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildKluAlerttbl|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KluAlerttblTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KluAlerttblTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KluAlerttblTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KluAlerttblTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluAlerttblTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the pk column
     *
     * Example usage:
     * <code>
     * $query->filterByPk(1234); // WHERE pk = 1234
     * $query->filterByPk(array(12, 34)); // WHERE pk IN (12, 34)
     * $query->filterByPk(array('min' => 12)); // WHERE pk > 12
     * </code>
     *
     * @param     mixed $pk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
     */
    public function filterByPk($pk = null, $comparison = null)
    {
        if (is_array($pk)) {
            $useMinMax = false;
            if (isset($pk['min'])) {
                $this->addUsingAlias(KluAlerttblTableMap::COL_PK, $pk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pk['max'])) {
                $this->addUsingAlias(KluAlerttblTableMap::COL_PK, $pk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluAlerttblTableMap::COL_PK, $pk, $comparison);
    }

    /**
     * Filter the query on the tbl column
     *
     * Example usage:
     * <code>
     * $query->filterByTbl('fooValue');   // WHERE tbl = 'fooValue'
     * $query->filterByTbl('%fooValue%'); // WHERE tbl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tbl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
     */
    public function filterByTbl($tbl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tbl)) {
                $tbl = str_replace('*', '%', $tbl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluAlerttblTableMap::COL_TBL, $tbl, $comparison);
    }

    /**
     * Filter the query on the update_time column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdateTime('2011-03-14'); // WHERE update_time = '2011-03-14'
     * $query->filterByUpdateTime('now'); // WHERE update_time = '2011-03-14'
     * $query->filterByUpdateTime(array('max' => 'yesterday')); // WHERE update_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $updateTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
     */
    public function filterByUpdateTime($updateTime = null, $comparison = null)
    {
        if (is_array($updateTime)) {
            $useMinMax = false;
            if (isset($updateTime['min'])) {
                $this->addUsingAlias(KluAlerttblTableMap::COL_UPDATE_TIME, $updateTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updateTime['max'])) {
                $this->addUsingAlias(KluAlerttblTableMap::COL_UPDATE_TIME, $updateTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluAlerttblTableMap::COL_UPDATE_TIME, $updateTime, $comparison);
    }

    /**
     * Filter the query on the notificationmgs column
     *
     * Example usage:
     * <code>
     * $query->filterByNotificationmgs('fooValue');   // WHERE notificationmgs = 'fooValue'
     * $query->filterByNotificationmgs('%fooValue%'); // WHERE notificationmgs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notificationmgs The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
     */
    public function filterByNotificationmgs($notificationmgs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notificationmgs)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notificationmgs)) {
                $notificationmgs = str_replace('*', '%', $notificationmgs);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluAlerttblTableMap::COL_NOTIFICATIONMGS, $notificationmgs, $comparison);
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
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluAlerttblTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKluAlerttbl $kluAlerttbl Object to remove from the list of results
     *
     * @return $this|ChildKluAlerttblQuery The current query, for fluid interface
     */
    public function prune($kluAlerttbl = null)
    {
        if ($kluAlerttbl) {
            $this->addUsingAlias(KluAlerttblTableMap::COL_ID, $kluAlerttbl->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the klu_alerttbl table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluAlerttblTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KluAlerttblTableMap::clearInstancePool();
            KluAlerttblTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(KluAlerttblTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KluAlerttblTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KluAlerttblTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KluAlerttblTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KluAlerttblQuery
