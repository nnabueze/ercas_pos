<?php

namespace Base;

use \Logs as ChildLogs;
use \LogsQuery as ChildLogsQuery;
use \Exception;
use \PDO;
use Map\LogsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'logs' table.
 *
 *
 *
 * @method     ChildLogsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLogsQuery orderByUri($order = Criteria::ASC) Order by the uri column
 * @method     ChildLogsQuery orderByMethod($order = Criteria::ASC) Order by the method column
 * @method     ChildLogsQuery orderByParams($order = Criteria::ASC) Order by the params column
 * @method     ChildLogsQuery orderByApiKey($order = Criteria::ASC) Order by the api_key column
 * @method     ChildLogsQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method     ChildLogsQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildLogsQuery orderByRtime($order = Criteria::ASC) Order by the rtime column
 * @method     ChildLogsQuery orderByAuthorized($order = Criteria::ASC) Order by the authorized column
 * @method     ChildLogsQuery orderByResponseCode($order = Criteria::ASC) Order by the response_code column
 *
 * @method     ChildLogsQuery groupById() Group by the id column
 * @method     ChildLogsQuery groupByUri() Group by the uri column
 * @method     ChildLogsQuery groupByMethod() Group by the method column
 * @method     ChildLogsQuery groupByParams() Group by the params column
 * @method     ChildLogsQuery groupByApiKey() Group by the api_key column
 * @method     ChildLogsQuery groupByIpAddress() Group by the ip_address column
 * @method     ChildLogsQuery groupByTime() Group by the time column
 * @method     ChildLogsQuery groupByRtime() Group by the rtime column
 * @method     ChildLogsQuery groupByAuthorized() Group by the authorized column
 * @method     ChildLogsQuery groupByResponseCode() Group by the response_code column
 *
 * @method     ChildLogsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLogsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLogsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLogsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLogsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLogsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLogs findOne(ConnectionInterface $con = null) Return the first ChildLogs matching the query
 * @method     ChildLogs findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLogs matching the query, or a new ChildLogs object populated from the query conditions when no match is found
 *
 * @method     ChildLogs findOneById(int $id) Return the first ChildLogs filtered by the id column
 * @method     ChildLogs findOneByUri(string $uri) Return the first ChildLogs filtered by the uri column
 * @method     ChildLogs findOneByMethod(string $method) Return the first ChildLogs filtered by the method column
 * @method     ChildLogs findOneByParams(string $params) Return the first ChildLogs filtered by the params column
 * @method     ChildLogs findOneByApiKey(string $api_key) Return the first ChildLogs filtered by the api_key column
 * @method     ChildLogs findOneByIpAddress(string $ip_address) Return the first ChildLogs filtered by the ip_address column
 * @method     ChildLogs findOneByTime(int $time) Return the first ChildLogs filtered by the time column
 * @method     ChildLogs findOneByRtime(double $rtime) Return the first ChildLogs filtered by the rtime column
 * @method     ChildLogs findOneByAuthorized(boolean $authorized) Return the first ChildLogs filtered by the authorized column
 * @method     ChildLogs findOneByResponseCode(int $response_code) Return the first ChildLogs filtered by the response_code column *

 * @method     ChildLogs requirePk($key, ConnectionInterface $con = null) Return the ChildLogs by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOne(ConnectionInterface $con = null) Return the first ChildLogs matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogs requireOneById(int $id) Return the first ChildLogs filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByUri(string $uri) Return the first ChildLogs filtered by the uri column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByMethod(string $method) Return the first ChildLogs filtered by the method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByParams(string $params) Return the first ChildLogs filtered by the params column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByApiKey(string $api_key) Return the first ChildLogs filtered by the api_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByIpAddress(string $ip_address) Return the first ChildLogs filtered by the ip_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByTime(int $time) Return the first ChildLogs filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByRtime(double $rtime) Return the first ChildLogs filtered by the rtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByAuthorized(boolean $authorized) Return the first ChildLogs filtered by the authorized column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogs requireOneByResponseCode(int $response_code) Return the first ChildLogs filtered by the response_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogs[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLogs objects based on current ModelCriteria
 * @method     ChildLogs[]|ObjectCollection findById(int $id) Return ChildLogs objects filtered by the id column
 * @method     ChildLogs[]|ObjectCollection findByUri(string $uri) Return ChildLogs objects filtered by the uri column
 * @method     ChildLogs[]|ObjectCollection findByMethod(string $method) Return ChildLogs objects filtered by the method column
 * @method     ChildLogs[]|ObjectCollection findByParams(string $params) Return ChildLogs objects filtered by the params column
 * @method     ChildLogs[]|ObjectCollection findByApiKey(string $api_key) Return ChildLogs objects filtered by the api_key column
 * @method     ChildLogs[]|ObjectCollection findByIpAddress(string $ip_address) Return ChildLogs objects filtered by the ip_address column
 * @method     ChildLogs[]|ObjectCollection findByTime(int $time) Return ChildLogs objects filtered by the time column
 * @method     ChildLogs[]|ObjectCollection findByRtime(double $rtime) Return ChildLogs objects filtered by the rtime column
 * @method     ChildLogs[]|ObjectCollection findByAuthorized(boolean $authorized) Return ChildLogs objects filtered by the authorized column
 * @method     ChildLogs[]|ObjectCollection findByResponseCode(int $response_code) Return ChildLogs objects filtered by the response_code column
 * @method     ChildLogs[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LogsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LogsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Logs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLogsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLogsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLogsQuery) {
            return $criteria;
        }
        $query = new ChildLogsQuery();
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
     * @return ChildLogs|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LogsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LogsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLogs A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, uri, method, params, api_key, ip_address, time, rtime, authorized, response_code FROM logs WHERE id = :p0';
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
            /** @var ChildLogs $obj */
            $obj = new ChildLogs();
            $obj->hydrate($row);
            LogsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLogs|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LogsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LogsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LogsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LogsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogsTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildLogsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LogsTableMap::COL_URI, $uri, $comparison);
    }

    /**
     * Filter the query on the method column
     *
     * Example usage:
     * <code>
     * $query->filterByMethod('fooValue');   // WHERE method = 'fooValue'
     * $query->filterByMethod('%fooValue%'); // WHERE method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $method The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByMethod($method = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($method)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $method)) {
                $method = str_replace('*', '%', $method);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LogsTableMap::COL_METHOD, $method, $comparison);
    }

    /**
     * Filter the query on the params column
     *
     * Example usage:
     * <code>
     * $query->filterByParams('fooValue');   // WHERE params = 'fooValue'
     * $query->filterByParams('%fooValue%'); // WHERE params LIKE '%fooValue%'
     * </code>
     *
     * @param     string $params The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByParams($params = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($params)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $params)) {
                $params = str_replace('*', '%', $params);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LogsTableMap::COL_PARAMS, $params, $comparison);
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
     * @return $this|ChildLogsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LogsTableMap::COL_API_KEY, $apiKey, $comparison);
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%'); // WHERE ip_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipAddress)) {
                $ipAddress = str_replace('*', '%', $ipAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LogsTableMap::COL_IP_ADDRESS, $ipAddress, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time > 12
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(LogsTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(LogsTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogsTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the rtime column
     *
     * Example usage:
     * <code>
     * $query->filterByRtime(1234); // WHERE rtime = 1234
     * $query->filterByRtime(array(12, 34)); // WHERE rtime IN (12, 34)
     * $query->filterByRtime(array('min' => 12)); // WHERE rtime > 12
     * </code>
     *
     * @param     mixed $rtime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByRtime($rtime = null, $comparison = null)
    {
        if (is_array($rtime)) {
            $useMinMax = false;
            if (isset($rtime['min'])) {
                $this->addUsingAlias(LogsTableMap::COL_RTIME, $rtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rtime['max'])) {
                $this->addUsingAlias(LogsTableMap::COL_RTIME, $rtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogsTableMap::COL_RTIME, $rtime, $comparison);
    }

    /**
     * Filter the query on the authorized column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthorized(true); // WHERE authorized = true
     * $query->filterByAuthorized('yes'); // WHERE authorized = true
     * </code>
     *
     * @param     boolean|string $authorized The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByAuthorized($authorized = null, $comparison = null)
    {
        if (is_string($authorized)) {
            $authorized = in_array(strtolower($authorized), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(LogsTableMap::COL_AUTHORIZED, $authorized, $comparison);
    }

    /**
     * Filter the query on the response_code column
     *
     * Example usage:
     * <code>
     * $query->filterByResponseCode(1234); // WHERE response_code = 1234
     * $query->filterByResponseCode(array(12, 34)); // WHERE response_code IN (12, 34)
     * $query->filterByResponseCode(array('min' => 12)); // WHERE response_code > 12
     * </code>
     *
     * @param     mixed $responseCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function filterByResponseCode($responseCode = null, $comparison = null)
    {
        if (is_array($responseCode)) {
            $useMinMax = false;
            if (isset($responseCode['min'])) {
                $this->addUsingAlias(LogsTableMap::COL_RESPONSE_CODE, $responseCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($responseCode['max'])) {
                $this->addUsingAlias(LogsTableMap::COL_RESPONSE_CODE, $responseCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogsTableMap::COL_RESPONSE_CODE, $responseCode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLogs $logs Object to remove from the list of results
     *
     * @return $this|ChildLogsQuery The current query, for fluid interface
     */
    public function prune($logs = null)
    {
        if ($logs) {
            $this->addUsingAlias(LogsTableMap::COL_ID, $logs->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the logs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LogsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LogsTableMap::clearInstancePool();
            LogsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LogsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LogsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LogsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LogsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LogsQuery
