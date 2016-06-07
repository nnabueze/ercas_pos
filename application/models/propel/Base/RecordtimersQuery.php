<?php

namespace Base;

use \Recordtimers as ChildRecordtimers;
use \RecordtimersQuery as ChildRecordtimersQuery;
use \Exception;
use Map\RecordtimersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'recordtimers' table.
 *
 *
 *
 * @method     ChildRecordtimersQuery orderByTransId($order = Criteria::ASC) Order by the trans_id column
 * @method     ChildRecordtimersQuery orderByTransDate($order = Criteria::ASC) Order by the trans_date column
 * @method     ChildRecordtimersQuery orderByReceivedDate($order = Criteria::ASC) Order by the received_date column
 *
 * @method     ChildRecordtimersQuery groupByTransId() Group by the trans_id column
 * @method     ChildRecordtimersQuery groupByTransDate() Group by the trans_date column
 * @method     ChildRecordtimersQuery groupByReceivedDate() Group by the received_date column
 *
 * @method     ChildRecordtimersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRecordtimersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRecordtimersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRecordtimersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRecordtimersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRecordtimersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRecordtimers findOne(ConnectionInterface $con = null) Return the first ChildRecordtimers matching the query
 * @method     ChildRecordtimers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRecordtimers matching the query, or a new ChildRecordtimers object populated from the query conditions when no match is found
 *
 * @method     ChildRecordtimers findOneByTransId(string $trans_id) Return the first ChildRecordtimers filtered by the trans_id column
 * @method     ChildRecordtimers findOneByTransDate(string $trans_date) Return the first ChildRecordtimers filtered by the trans_date column
 * @method     ChildRecordtimers findOneByReceivedDate(string $received_date) Return the first ChildRecordtimers filtered by the received_date column *

 * @method     ChildRecordtimers requirePk($key, ConnectionInterface $con = null) Return the ChildRecordtimers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRecordtimers requireOne(ConnectionInterface $con = null) Return the first ChildRecordtimers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRecordtimers requireOneByTransId(string $trans_id) Return the first ChildRecordtimers filtered by the trans_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRecordtimers requireOneByTransDate(string $trans_date) Return the first ChildRecordtimers filtered by the trans_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRecordtimers requireOneByReceivedDate(string $received_date) Return the first ChildRecordtimers filtered by the received_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRecordtimers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRecordtimers objects based on current ModelCriteria
 * @method     ChildRecordtimers[]|ObjectCollection findByTransId(string $trans_id) Return ChildRecordtimers objects filtered by the trans_id column
 * @method     ChildRecordtimers[]|ObjectCollection findByTransDate(string $trans_date) Return ChildRecordtimers objects filtered by the trans_date column
 * @method     ChildRecordtimers[]|ObjectCollection findByReceivedDate(string $received_date) Return ChildRecordtimers objects filtered by the received_date column
 * @method     ChildRecordtimers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RecordtimersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RecordtimersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Recordtimers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRecordtimersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRecordtimersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRecordtimersQuery) {
            return $criteria;
        }
        $query = new ChildRecordtimersQuery();
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
     * @return ChildRecordtimers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Recordtimers object has no primary key');
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
        throw new LogicException('The Recordtimers object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildRecordtimersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Recordtimers object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRecordtimersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Recordtimers object has no primary key');
    }

    /**
     * Filter the query on the trans_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTransId('fooValue');   // WHERE trans_id = 'fooValue'
     * $query->filterByTransId('%fooValue%'); // WHERE trans_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRecordtimersQuery The current query, for fluid interface
     */
    public function filterByTransId($transId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $transId)) {
                $transId = str_replace('*', '%', $transId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RecordtimersTableMap::COL_TRANS_ID, $transId, $comparison);
    }

    /**
     * Filter the query on the trans_date column
     *
     * Example usage:
     * <code>
     * $query->filterByTransDate('2011-03-14'); // WHERE trans_date = '2011-03-14'
     * $query->filterByTransDate('now'); // WHERE trans_date = '2011-03-14'
     * $query->filterByTransDate(array('max' => 'yesterday')); // WHERE trans_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $transDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRecordtimersQuery The current query, for fluid interface
     */
    public function filterByTransDate($transDate = null, $comparison = null)
    {
        if (is_array($transDate)) {
            $useMinMax = false;
            if (isset($transDate['min'])) {
                $this->addUsingAlias(RecordtimersTableMap::COL_TRANS_DATE, $transDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transDate['max'])) {
                $this->addUsingAlias(RecordtimersTableMap::COL_TRANS_DATE, $transDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecordtimersTableMap::COL_TRANS_DATE, $transDate, $comparison);
    }

    /**
     * Filter the query on the received_date column
     *
     * Example usage:
     * <code>
     * $query->filterByReceivedDate('2011-03-14'); // WHERE received_date = '2011-03-14'
     * $query->filterByReceivedDate('now'); // WHERE received_date = '2011-03-14'
     * $query->filterByReceivedDate(array('max' => 'yesterday')); // WHERE received_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $receivedDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRecordtimersQuery The current query, for fluid interface
     */
    public function filterByReceivedDate($receivedDate = null, $comparison = null)
    {
        if (is_array($receivedDate)) {
            $useMinMax = false;
            if (isset($receivedDate['min'])) {
                $this->addUsingAlias(RecordtimersTableMap::COL_RECEIVED_DATE, $receivedDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receivedDate['max'])) {
                $this->addUsingAlias(RecordtimersTableMap::COL_RECEIVED_DATE, $receivedDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RecordtimersTableMap::COL_RECEIVED_DATE, $receivedDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRecordtimers $recordtimers Object to remove from the list of results
     *
     * @return $this|ChildRecordtimersQuery The current query, for fluid interface
     */
    public function prune($recordtimers = null)
    {
        if ($recordtimers) {
            throw new LogicException('Recordtimers object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the recordtimers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RecordtimersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RecordtimersTableMap::clearInstancePool();
            RecordtimersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RecordtimersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RecordtimersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RecordtimersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RecordtimersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RecordtimersQuery
