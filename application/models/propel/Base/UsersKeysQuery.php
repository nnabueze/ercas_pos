<?php

namespace Base;

use \UsersKeys as ChildUsersKeys;
use \UsersKeysQuery as ChildUsersKeysQuery;
use \Exception;
use \PDO;
use Map\UsersKeysTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'users_keys' table.
 *
 *
 *
 * @method     ChildUsersKeysQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUsersKeysQuery orderByApiKey($order = Criteria::ASC) Order by the api_key column
 * @method     ChildUsersKeysQuery orderBySecretKey($order = Criteria::ASC) Order by the secret_key column
 * @method     ChildUsersKeysQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildUsersKeysQuery orderByIgnoreLimits($order = Criteria::ASC) Order by the ignore_limits column
 * @method     ChildUsersKeysQuery orderByIsPrivateKey($order = Criteria::ASC) Order by the is_private_key column
 * @method     ChildUsersKeysQuery orderByIpAddresses($order = Criteria::ASC) Order by the ip_addresses column
 * @method     ChildUsersKeysQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildUsersKeysQuery groupById() Group by the id column
 * @method     ChildUsersKeysQuery groupByApiKey() Group by the api_key column
 * @method     ChildUsersKeysQuery groupBySecretKey() Group by the secret_key column
 * @method     ChildUsersKeysQuery groupByLevel() Group by the level column
 * @method     ChildUsersKeysQuery groupByIgnoreLimits() Group by the ignore_limits column
 * @method     ChildUsersKeysQuery groupByIsPrivateKey() Group by the is_private_key column
 * @method     ChildUsersKeysQuery groupByIpAddresses() Group by the ip_addresses column
 * @method     ChildUsersKeysQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildUsersKeysQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsersKeysQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsersKeysQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsersKeysQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUsersKeysQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUsersKeysQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUsersKeys findOne(ConnectionInterface $con = null) Return the first ChildUsersKeys matching the query
 * @method     ChildUsersKeys findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUsersKeys matching the query, or a new ChildUsersKeys object populated from the query conditions when no match is found
 *
 * @method     ChildUsersKeys findOneById(int $id) Return the first ChildUsersKeys filtered by the id column
 * @method     ChildUsersKeys findOneByApiKey(string $api_key) Return the first ChildUsersKeys filtered by the api_key column
 * @method     ChildUsersKeys findOneBySecretKey(string $secret_key) Return the first ChildUsersKeys filtered by the secret_key column
 * @method     ChildUsersKeys findOneByLevel(int $level) Return the first ChildUsersKeys filtered by the level column
 * @method     ChildUsersKeys findOneByIgnoreLimits(boolean $ignore_limits) Return the first ChildUsersKeys filtered by the ignore_limits column
 * @method     ChildUsersKeys findOneByIsPrivateKey(boolean $is_private_key) Return the first ChildUsersKeys filtered by the is_private_key column
 * @method     ChildUsersKeys findOneByIpAddresses(string $ip_addresses) Return the first ChildUsersKeys filtered by the ip_addresses column
 * @method     ChildUsersKeys findOneByDateCreated(int $date_created) Return the first ChildUsersKeys filtered by the date_created column *

 * @method     ChildUsersKeys requirePk($key, ConnectionInterface $con = null) Return the ChildUsersKeys by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersKeys requireOne(ConnectionInterface $con = null) Return the first ChildUsersKeys matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsersKeys requireOneById(int $id) Return the first ChildUsersKeys filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersKeys requireOneByApiKey(string $api_key) Return the first ChildUsersKeys filtered by the api_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersKeys requireOneBySecretKey(string $secret_key) Return the first ChildUsersKeys filtered by the secret_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersKeys requireOneByLevel(int $level) Return the first ChildUsersKeys filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersKeys requireOneByIgnoreLimits(boolean $ignore_limits) Return the first ChildUsersKeys filtered by the ignore_limits column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersKeys requireOneByIsPrivateKey(boolean $is_private_key) Return the first ChildUsersKeys filtered by the is_private_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersKeys requireOneByIpAddresses(string $ip_addresses) Return the first ChildUsersKeys filtered by the ip_addresses column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersKeys requireOneByDateCreated(int $date_created) Return the first ChildUsersKeys filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsersKeys[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUsersKeys objects based on current ModelCriteria
 * @method     ChildUsersKeys[]|ObjectCollection findById(int $id) Return ChildUsersKeys objects filtered by the id column
 * @method     ChildUsersKeys[]|ObjectCollection findByApiKey(string $api_key) Return ChildUsersKeys objects filtered by the api_key column
 * @method     ChildUsersKeys[]|ObjectCollection findBySecretKey(string $secret_key) Return ChildUsersKeys objects filtered by the secret_key column
 * @method     ChildUsersKeys[]|ObjectCollection findByLevel(int $level) Return ChildUsersKeys objects filtered by the level column
 * @method     ChildUsersKeys[]|ObjectCollection findByIgnoreLimits(boolean $ignore_limits) Return ChildUsersKeys objects filtered by the ignore_limits column
 * @method     ChildUsersKeys[]|ObjectCollection findByIsPrivateKey(boolean $is_private_key) Return ChildUsersKeys objects filtered by the is_private_key column
 * @method     ChildUsersKeys[]|ObjectCollection findByIpAddresses(string $ip_addresses) Return ChildUsersKeys objects filtered by the ip_addresses column
 * @method     ChildUsersKeys[]|ObjectCollection findByDateCreated(int $date_created) Return ChildUsersKeys objects filtered by the date_created column
 * @method     ChildUsersKeys[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsersKeysQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UsersKeysQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\UsersKeys', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsersKeysQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsersKeysQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUsersKeysQuery) {
            return $criteria;
        }
        $query = new ChildUsersKeysQuery();
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
     * @return ChildUsersKeys|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsersKeysTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UsersKeysTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUsersKeys A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, api_key, secret_key, level, ignore_limits, is_private_key, ip_addresses, date_created FROM users_keys WHERE id = :p0';
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
            /** @var ChildUsersKeys $obj */
            $obj = new ChildUsersKeys();
            $obj->hydrate($row);
            UsersKeysTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUsersKeys|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsersKeysTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsersKeysTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UsersKeysTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsersKeysTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersKeysTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UsersKeysTableMap::COL_API_KEY, $apiKey, $comparison);
    }

    /**
     * Filter the query on the secret_key column
     *
     * Example usage:
     * <code>
     * $query->filterBySecretKey('fooValue');   // WHERE secret_key = 'fooValue'
     * $query->filterBySecretKey('%fooValue%'); // WHERE secret_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $secretKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterBySecretKey($secretKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($secretKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $secretKey)) {
                $secretKey = str_replace('*', '%', $secretKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersKeysTableMap::COL_SECRET_KEY, $secretKey, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(UsersKeysTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(UsersKeysTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersKeysTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the ignore_limits column
     *
     * Example usage:
     * <code>
     * $query->filterByIgnoreLimits(true); // WHERE ignore_limits = true
     * $query->filterByIgnoreLimits('yes'); // WHERE ignore_limits = true
     * </code>
     *
     * @param     boolean|string $ignoreLimits The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterByIgnoreLimits($ignoreLimits = null, $comparison = null)
    {
        if (is_string($ignoreLimits)) {
            $ignoreLimits = in_array(strtolower($ignoreLimits), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UsersKeysTableMap::COL_IGNORE_LIMITS, $ignoreLimits, $comparison);
    }

    /**
     * Filter the query on the is_private_key column
     *
     * Example usage:
     * <code>
     * $query->filterByIsPrivateKey(true); // WHERE is_private_key = true
     * $query->filterByIsPrivateKey('yes'); // WHERE is_private_key = true
     * </code>
     *
     * @param     boolean|string $isPrivateKey The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterByIsPrivateKey($isPrivateKey = null, $comparison = null)
    {
        if (is_string($isPrivateKey)) {
            $isPrivateKey = in_array(strtolower($isPrivateKey), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UsersKeysTableMap::COL_IS_PRIVATE_KEY, $isPrivateKey, $comparison);
    }

    /**
     * Filter the query on the ip_addresses column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddresses('fooValue');   // WHERE ip_addresses = 'fooValue'
     * $query->filterByIpAddresses('%fooValue%'); // WHERE ip_addresses LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddresses The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterByIpAddresses($ipAddresses = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddresses)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipAddresses)) {
                $ipAddresses = str_replace('*', '%', $ipAddresses);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersKeysTableMap::COL_IP_ADDRESSES, $ipAddresses, $comparison);
    }

    /**
     * Filter the query on the date_created column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCreated(1234); // WHERE date_created = 1234
     * $query->filterByDateCreated(array(12, 34)); // WHERE date_created IN (12, 34)
     * $query->filterByDateCreated(array('min' => 12)); // WHERE date_created > 12
     * </code>
     *
     * @param     mixed $dateCreated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(UsersKeysTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(UsersKeysTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersKeysTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUsersKeys $usersKeys Object to remove from the list of results
     *
     * @return $this|ChildUsersKeysQuery The current query, for fluid interface
     */
    public function prune($usersKeys = null)
    {
        if ($usersKeys) {
            $this->addUsingAlias(UsersKeysTableMap::COL_ID, $usersKeys->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the users_keys table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersKeysTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsersKeysTableMap::clearInstancePool();
            UsersKeysTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersKeysTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsersKeysTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UsersKeysTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UsersKeysTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UsersKeysQuery
