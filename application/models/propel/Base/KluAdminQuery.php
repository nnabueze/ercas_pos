<?php

namespace Base;

use \KluAdmin as ChildKluAdmin;
use \KluAdminQuery as ChildKluAdminQuery;
use \Exception;
use \PDO;
use Map\KluAdminTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'klu_admin' table.
 *
 *
 *
 * @method     ChildKluAdminQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKluAdminQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildKluAdminQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildKluAdminQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildKluAdminQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildKluAdminQuery orderByUsertype($order = Criteria::ASC) Order by the usertype column
 * @method     ChildKluAdminQuery orderByRegisterdate($order = Criteria::ASC) Order by the registerDate column
 * @method     ChildKluAdminQuery orderByLastvisitdate($order = Criteria::ASC) Order by the lastvisitDate column
 *
 * @method     ChildKluAdminQuery groupById() Group by the id column
 * @method     ChildKluAdminQuery groupByName() Group by the name column
 * @method     ChildKluAdminQuery groupByUsername() Group by the username column
 * @method     ChildKluAdminQuery groupByEmail() Group by the email column
 * @method     ChildKluAdminQuery groupByPassword() Group by the password column
 * @method     ChildKluAdminQuery groupByUsertype() Group by the usertype column
 * @method     ChildKluAdminQuery groupByRegisterdate() Group by the registerDate column
 * @method     ChildKluAdminQuery groupByLastvisitdate() Group by the lastvisitDate column
 *
 * @method     ChildKluAdminQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKluAdminQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKluAdminQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKluAdminQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKluAdminQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKluAdminQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKluAdmin findOne(ConnectionInterface $con = null) Return the first ChildKluAdmin matching the query
 * @method     ChildKluAdmin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKluAdmin matching the query, or a new ChildKluAdmin object populated from the query conditions when no match is found
 *
 * @method     ChildKluAdmin findOneById(int $id) Return the first ChildKluAdmin filtered by the id column
 * @method     ChildKluAdmin findOneByName(string $name) Return the first ChildKluAdmin filtered by the name column
 * @method     ChildKluAdmin findOneByUsername(string $username) Return the first ChildKluAdmin filtered by the username column
 * @method     ChildKluAdmin findOneByEmail(string $email) Return the first ChildKluAdmin filtered by the email column
 * @method     ChildKluAdmin findOneByPassword(string $password) Return the first ChildKluAdmin filtered by the password column
 * @method     ChildKluAdmin findOneByUsertype(string $usertype) Return the first ChildKluAdmin filtered by the usertype column
 * @method     ChildKluAdmin findOneByRegisterdate(string $registerDate) Return the first ChildKluAdmin filtered by the registerDate column
 * @method     ChildKluAdmin findOneByLastvisitdate(string $lastvisitDate) Return the first ChildKluAdmin filtered by the lastvisitDate column *

 * @method     ChildKluAdmin requirePk($key, ConnectionInterface $con = null) Return the ChildKluAdmin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAdmin requireOne(ConnectionInterface $con = null) Return the first ChildKluAdmin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluAdmin requireOneById(int $id) Return the first ChildKluAdmin filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAdmin requireOneByName(string $name) Return the first ChildKluAdmin filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAdmin requireOneByUsername(string $username) Return the first ChildKluAdmin filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAdmin requireOneByEmail(string $email) Return the first ChildKluAdmin filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAdmin requireOneByPassword(string $password) Return the first ChildKluAdmin filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAdmin requireOneByUsertype(string $usertype) Return the first ChildKluAdmin filtered by the usertype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAdmin requireOneByRegisterdate(string $registerDate) Return the first ChildKluAdmin filtered by the registerDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluAdmin requireOneByLastvisitdate(string $lastvisitDate) Return the first ChildKluAdmin filtered by the lastvisitDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluAdmin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKluAdmin objects based on current ModelCriteria
 * @method     ChildKluAdmin[]|ObjectCollection findById(int $id) Return ChildKluAdmin objects filtered by the id column
 * @method     ChildKluAdmin[]|ObjectCollection findByName(string $name) Return ChildKluAdmin objects filtered by the name column
 * @method     ChildKluAdmin[]|ObjectCollection findByUsername(string $username) Return ChildKluAdmin objects filtered by the username column
 * @method     ChildKluAdmin[]|ObjectCollection findByEmail(string $email) Return ChildKluAdmin objects filtered by the email column
 * @method     ChildKluAdmin[]|ObjectCollection findByPassword(string $password) Return ChildKluAdmin objects filtered by the password column
 * @method     ChildKluAdmin[]|ObjectCollection findByUsertype(string $usertype) Return ChildKluAdmin objects filtered by the usertype column
 * @method     ChildKluAdmin[]|ObjectCollection findByRegisterdate(string $registerDate) Return ChildKluAdmin objects filtered by the registerDate column
 * @method     ChildKluAdmin[]|ObjectCollection findByLastvisitdate(string $lastvisitDate) Return ChildKluAdmin objects filtered by the lastvisitDate column
 * @method     ChildKluAdmin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KluAdminQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KluAdminQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KluAdmin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKluAdminQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKluAdminQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKluAdminQuery) {
            return $criteria;
        }
        $query = new ChildKluAdminQuery();
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
     * @return ChildKluAdmin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluAdminTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KluAdminTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildKluAdmin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, username, email, password, usertype, registerDate, lastvisitDate FROM klu_admin WHERE id = :p0';
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
            /** @var ChildKluAdmin $obj */
            $obj = new ChildKluAdmin();
            $obj->hydrate($row);
            KluAdminTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildKluAdmin|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KluAdminTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KluAdminTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KluAdminTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KluAdminTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluAdminTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluAdminTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluAdminTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluAdminTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluAdminTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the usertype column
     *
     * Example usage:
     * <code>
     * $query->filterByUsertype('fooValue');   // WHERE usertype = 'fooValue'
     * $query->filterByUsertype('%fooValue%'); // WHERE usertype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usertype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
     */
    public function filterByUsertype($usertype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usertype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $usertype)) {
                $usertype = str_replace('*', '%', $usertype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluAdminTableMap::COL_USERTYPE, $usertype, $comparison);
    }

    /**
     * Filter the query on the registerDate column
     *
     * Example usage:
     * <code>
     * $query->filterByRegisterdate('2011-03-14'); // WHERE registerDate = '2011-03-14'
     * $query->filterByRegisterdate('now'); // WHERE registerDate = '2011-03-14'
     * $query->filterByRegisterdate(array('max' => 'yesterday')); // WHERE registerDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $registerdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
     */
    public function filterByRegisterdate($registerdate = null, $comparison = null)
    {
        if (is_array($registerdate)) {
            $useMinMax = false;
            if (isset($registerdate['min'])) {
                $this->addUsingAlias(KluAdminTableMap::COL_REGISTERDATE, $registerdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($registerdate['max'])) {
                $this->addUsingAlias(KluAdminTableMap::COL_REGISTERDATE, $registerdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluAdminTableMap::COL_REGISTERDATE, $registerdate, $comparison);
    }

    /**
     * Filter the query on the lastvisitDate column
     *
     * Example usage:
     * <code>
     * $query->filterByLastvisitdate('2011-03-14'); // WHERE lastvisitDate = '2011-03-14'
     * $query->filterByLastvisitdate('now'); // WHERE lastvisitDate = '2011-03-14'
     * $query->filterByLastvisitdate(array('max' => 'yesterday')); // WHERE lastvisitDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastvisitdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
     */
    public function filterByLastvisitdate($lastvisitdate = null, $comparison = null)
    {
        if (is_array($lastvisitdate)) {
            $useMinMax = false;
            if (isset($lastvisitdate['min'])) {
                $this->addUsingAlias(KluAdminTableMap::COL_LASTVISITDATE, $lastvisitdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastvisitdate['max'])) {
                $this->addUsingAlias(KluAdminTableMap::COL_LASTVISITDATE, $lastvisitdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluAdminTableMap::COL_LASTVISITDATE, $lastvisitdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKluAdmin $kluAdmin Object to remove from the list of results
     *
     * @return $this|ChildKluAdminQuery The current query, for fluid interface
     */
    public function prune($kluAdmin = null)
    {
        if ($kluAdmin) {
            $this->addUsingAlias(KluAdminTableMap::COL_ID, $kluAdmin->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the klu_admin table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluAdminTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KluAdminTableMap::clearInstancePool();
            KluAdminTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(KluAdminTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KluAdminTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KluAdminTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KluAdminTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KluAdminQuery
