<?php

namespace Base;

use \RequestHeader as ChildRequestHeader;
use \RequestHeaderQuery as ChildRequestHeaderQuery;
use \Exception;
use Map\RequestHeaderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'request_header' table.
 *
 *
 *
 * @method     ChildRequestHeaderQuery orderBySignature($order = Criteria::ASC) Order by the signature column
 * @method     ChildRequestHeaderQuery orderByPData($order = Criteria::ASC) Order by the p_data column
 * @method     ChildRequestHeaderQuery orderByApiKey($order = Criteria::ASC) Order by the api_key column
 *
 * @method     ChildRequestHeaderQuery groupBySignature() Group by the signature column
 * @method     ChildRequestHeaderQuery groupByPData() Group by the p_data column
 * @method     ChildRequestHeaderQuery groupByApiKey() Group by the api_key column
 *
 * @method     ChildRequestHeaderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRequestHeaderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRequestHeaderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRequestHeaderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRequestHeaderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRequestHeaderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRequestHeader findOne(ConnectionInterface $con = null) Return the first ChildRequestHeader matching the query
 * @method     ChildRequestHeader findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRequestHeader matching the query, or a new ChildRequestHeader object populated from the query conditions when no match is found
 *
 * @method     ChildRequestHeader findOneBySignature(string $signature) Return the first ChildRequestHeader filtered by the signature column
 * @method     ChildRequestHeader findOneByPData(string $p_data) Return the first ChildRequestHeader filtered by the p_data column
 * @method     ChildRequestHeader findOneByApiKey(string $api_key) Return the first ChildRequestHeader filtered by the api_key column *

 * @method     ChildRequestHeader requirePk($key, ConnectionInterface $con = null) Return the ChildRequestHeader by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestHeader requireOne(ConnectionInterface $con = null) Return the first ChildRequestHeader matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRequestHeader requireOneBySignature(string $signature) Return the first ChildRequestHeader filtered by the signature column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestHeader requireOneByPData(string $p_data) Return the first ChildRequestHeader filtered by the p_data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestHeader requireOneByApiKey(string $api_key) Return the first ChildRequestHeader filtered by the api_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRequestHeader[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRequestHeader objects based on current ModelCriteria
 * @method     ChildRequestHeader[]|ObjectCollection findBySignature(string $signature) Return ChildRequestHeader objects filtered by the signature column
 * @method     ChildRequestHeader[]|ObjectCollection findByPData(string $p_data) Return ChildRequestHeader objects filtered by the p_data column
 * @method     ChildRequestHeader[]|ObjectCollection findByApiKey(string $api_key) Return ChildRequestHeader objects filtered by the api_key column
 * @method     ChildRequestHeader[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RequestHeaderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RequestHeaderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\RequestHeader', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRequestHeaderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRequestHeaderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRequestHeaderQuery) {
            return $criteria;
        }
        $query = new ChildRequestHeaderQuery();
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
     * @return ChildRequestHeader|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The RequestHeader object has no primary key');
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
        throw new LogicException('The RequestHeader object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildRequestHeaderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The RequestHeader object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRequestHeaderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The RequestHeader object has no primary key');
    }

    /**
     * Filter the query on the signature column
     *
     * Example usage:
     * <code>
     * $query->filterBySignature('fooValue');   // WHERE signature = 'fooValue'
     * $query->filterBySignature('%fooValue%'); // WHERE signature LIKE '%fooValue%'
     * </code>
     *
     * @param     string $signature The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestHeaderQuery The current query, for fluid interface
     */
    public function filterBySignature($signature = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($signature)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $signature)) {
                $signature = str_replace('*', '%', $signature);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RequestHeaderTableMap::COL_SIGNATURE, $signature, $comparison);
    }

    /**
     * Filter the query on the p_data column
     *
     * Example usage:
     * <code>
     * $query->filterByPData('fooValue');   // WHERE p_data = 'fooValue'
     * $query->filterByPData('%fooValue%'); // WHERE p_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestHeaderQuery The current query, for fluid interface
     */
    public function filterByPData($pData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pData)) {
                $pData = str_replace('*', '%', $pData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RequestHeaderTableMap::COL_P_DATA, $pData, $comparison);
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
     * @return $this|ChildRequestHeaderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RequestHeaderTableMap::COL_API_KEY, $apiKey, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRequestHeader $requestHeader Object to remove from the list of results
     *
     * @return $this|ChildRequestHeaderQuery The current query, for fluid interface
     */
    public function prune($requestHeader = null)
    {
        if ($requestHeader) {
            throw new LogicException('RequestHeader object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the request_header table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RequestHeaderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RequestHeaderTableMap::clearInstancePool();
            RequestHeaderTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RequestHeaderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RequestHeaderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RequestHeaderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RequestHeaderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RequestHeaderQuery
