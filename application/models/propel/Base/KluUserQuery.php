<?php

namespace Base;

use \KluUser as ChildKluUser;
use \KluUserQuery as ChildKluUserQuery;
use \Exception;
use \PDO;
use Map\KluUserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'klu_user' table.
 *
 *
 *
 * @method     ChildKluUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKluUserQuery orderByPassw($order = Criteria::ASC) Order by the passw column
 * @method     ChildKluUserQuery orderByAccountNo($order = Criteria::ASC) Order by the account_no column
 * @method     ChildKluUserQuery orderByCustomerName($order = Criteria::ASC) Order by the customer_name column
 * @method     ChildKluUserQuery orderByCustomerAddress($order = Criteria::ASC) Order by the customer_address column
 * @method     ChildKluUserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildKluUserQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildKluUserQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ChildKluUserQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildKluUserQuery orderByDistrict($order = Criteria::ASC) Order by the district column
 * @method     ChildKluUserQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method     ChildKluUserQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildKluUserQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 *
 * @method     ChildKluUserQuery groupById() Group by the id column
 * @method     ChildKluUserQuery groupByPassw() Group by the passw column
 * @method     ChildKluUserQuery groupByAccountNo() Group by the account_no column
 * @method     ChildKluUserQuery groupByCustomerName() Group by the customer_name column
 * @method     ChildKluUserQuery groupByCustomerAddress() Group by the customer_address column
 * @method     ChildKluUserQuery groupByEmail() Group by the email column
 * @method     ChildKluUserQuery groupByPhone() Group by the phone column
 * @method     ChildKluUserQuery groupByStreet() Group by the street column
 * @method     ChildKluUserQuery groupByCity() Group by the city column
 * @method     ChildKluUserQuery groupByDistrict() Group by the district column
 * @method     ChildKluUserQuery groupByIsActive() Group by the is_active column
 * @method     ChildKluUserQuery groupByDateAdded() Group by the date_added column
 * @method     ChildKluUserQuery groupByLastLogin() Group by the last_login column
 *
 * @method     ChildKluUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKluUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKluUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKluUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKluUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKluUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKluUser findOne(ConnectionInterface $con = null) Return the first ChildKluUser matching the query
 * @method     ChildKluUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKluUser matching the query, or a new ChildKluUser object populated from the query conditions when no match is found
 *
 * @method     ChildKluUser findOneById(int $id) Return the first ChildKluUser filtered by the id column
 * @method     ChildKluUser findOneByPassw(string $passw) Return the first ChildKluUser filtered by the passw column
 * @method     ChildKluUser findOneByAccountNo(string $account_no) Return the first ChildKluUser filtered by the account_no column
 * @method     ChildKluUser findOneByCustomerName(string $customer_name) Return the first ChildKluUser filtered by the customer_name column
 * @method     ChildKluUser findOneByCustomerAddress(string $customer_address) Return the first ChildKluUser filtered by the customer_address column
 * @method     ChildKluUser findOneByEmail(string $email) Return the first ChildKluUser filtered by the email column
 * @method     ChildKluUser findOneByPhone(string $phone) Return the first ChildKluUser filtered by the phone column
 * @method     ChildKluUser findOneByStreet(string $street) Return the first ChildKluUser filtered by the street column
 * @method     ChildKluUser findOneByCity(string $city) Return the first ChildKluUser filtered by the city column
 * @method     ChildKluUser findOneByDistrict(string $district) Return the first ChildKluUser filtered by the district column
 * @method     ChildKluUser findOneByIsActive(string $is_active) Return the first ChildKluUser filtered by the is_active column
 * @method     ChildKluUser findOneByDateAdded(string $date_added) Return the first ChildKluUser filtered by the date_added column
 * @method     ChildKluUser findOneByLastLogin(string $last_login) Return the first ChildKluUser filtered by the last_login column *

 * @method     ChildKluUser requirePk($key, ConnectionInterface $con = null) Return the ChildKluUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOne(ConnectionInterface $con = null) Return the first ChildKluUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluUser requireOneById(int $id) Return the first ChildKluUser filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByPassw(string $passw) Return the first ChildKluUser filtered by the passw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByAccountNo(string $account_no) Return the first ChildKluUser filtered by the account_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByCustomerName(string $customer_name) Return the first ChildKluUser filtered by the customer_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByCustomerAddress(string $customer_address) Return the first ChildKluUser filtered by the customer_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByEmail(string $email) Return the first ChildKluUser filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByPhone(string $phone) Return the first ChildKluUser filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByStreet(string $street) Return the first ChildKluUser filtered by the street column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByCity(string $city) Return the first ChildKluUser filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByDistrict(string $district) Return the first ChildKluUser filtered by the district column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByIsActive(string $is_active) Return the first ChildKluUser filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByDateAdded(string $date_added) Return the first ChildKluUser filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluUser requireOneByLastLogin(string $last_login) Return the first ChildKluUser filtered by the last_login column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKluUser objects based on current ModelCriteria
 * @method     ChildKluUser[]|ObjectCollection findById(int $id) Return ChildKluUser objects filtered by the id column
 * @method     ChildKluUser[]|ObjectCollection findByPassw(string $passw) Return ChildKluUser objects filtered by the passw column
 * @method     ChildKluUser[]|ObjectCollection findByAccountNo(string $account_no) Return ChildKluUser objects filtered by the account_no column
 * @method     ChildKluUser[]|ObjectCollection findByCustomerName(string $customer_name) Return ChildKluUser objects filtered by the customer_name column
 * @method     ChildKluUser[]|ObjectCollection findByCustomerAddress(string $customer_address) Return ChildKluUser objects filtered by the customer_address column
 * @method     ChildKluUser[]|ObjectCollection findByEmail(string $email) Return ChildKluUser objects filtered by the email column
 * @method     ChildKluUser[]|ObjectCollection findByPhone(string $phone) Return ChildKluUser objects filtered by the phone column
 * @method     ChildKluUser[]|ObjectCollection findByStreet(string $street) Return ChildKluUser objects filtered by the street column
 * @method     ChildKluUser[]|ObjectCollection findByCity(string $city) Return ChildKluUser objects filtered by the city column
 * @method     ChildKluUser[]|ObjectCollection findByDistrict(string $district) Return ChildKluUser objects filtered by the district column
 * @method     ChildKluUser[]|ObjectCollection findByIsActive(string $is_active) Return ChildKluUser objects filtered by the is_active column
 * @method     ChildKluUser[]|ObjectCollection findByDateAdded(string $date_added) Return ChildKluUser objects filtered by the date_added column
 * @method     ChildKluUser[]|ObjectCollection findByLastLogin(string $last_login) Return ChildKluUser objects filtered by the last_login column
 * @method     ChildKluUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KluUserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KluUserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KluUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKluUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKluUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKluUserQuery) {
            return $criteria;
        }
        $query = new ChildKluUserQuery();
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
     * @return ChildKluUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluUserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KluUserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildKluUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, passw, account_no, customer_name, customer_address, email, phone, street, city, district, is_active, date_added, last_login FROM klu_user WHERE id = :p0';
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
            /** @var ChildKluUser $obj */
            $obj = new ChildKluUser();
            $obj->hydrate($row);
            KluUserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildKluUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KluUserTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KluUserTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KluUserTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KluUserTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the passw column
     *
     * Example usage:
     * <code>
     * $query->filterByPassw('fooValue');   // WHERE passw = 'fooValue'
     * $query->filterByPassw('%fooValue%'); // WHERE passw LIKE '%fooValue%'
     * </code>
     *
     * @param     string $passw The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByPassw($passw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($passw)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $passw)) {
                $passw = str_replace('*', '%', $passw);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_PASSW, $passw, $comparison);
    }

    /**
     * Filter the query on the account_no column
     *
     * Example usage:
     * <code>
     * $query->filterByAccountNo('fooValue');   // WHERE account_no = 'fooValue'
     * $query->filterByAccountNo('%fooValue%'); // WHERE account_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accountNo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByAccountNo($accountNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accountNo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $accountNo)) {
                $accountNo = str_replace('*', '%', $accountNo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_ACCOUNT_NO, $accountNo, $comparison);
    }

    /**
     * Filter the query on the customer_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerName('fooValue');   // WHERE customer_name = 'fooValue'
     * $query->filterByCustomerName('%fooValue%'); // WHERE customer_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customerName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByCustomerName($customerName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $customerName)) {
                $customerName = str_replace('*', '%', $customerName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_CUSTOMER_NAME, $customerName, $comparison);
    }

    /**
     * Filter the query on the customer_address column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerAddress('fooValue');   // WHERE customer_address = 'fooValue'
     * $query->filterByCustomerAddress('%fooValue%'); // WHERE customer_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customerAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByCustomerAddress($customerAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $customerAddress)) {
                $customerAddress = str_replace('*', '%', $customerAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_CUSTOMER_ADDRESS, $customerAddress, $comparison);
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
     * @return $this|ChildKluUserQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluUserTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the street column
     *
     * Example usage:
     * <code>
     * $query->filterByStreet('fooValue');   // WHERE street = 'fooValue'
     * $query->filterByStreet('%fooValue%'); // WHERE street LIKE '%fooValue%'
     * </code>
     *
     * @param     string $street The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByStreet($street = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($street)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $street)) {
                $street = str_replace('*', '%', $street);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_STREET, $street, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the district column
     *
     * Example usage:
     * <code>
     * $query->filterByDistrict('fooValue');   // WHERE district = 'fooValue'
     * $query->filterByDistrict('%fooValue%'); // WHERE district LIKE '%fooValue%'
     * </code>
     *
     * @param     string $district The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByDistrict($district = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($district)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $district)) {
                $district = str_replace('*', '%', $district);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_DISTRICT, $district, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive('fooValue');   // WHERE is_active = 'fooValue'
     * $query->filterByIsActive('%fooValue%'); // WHERE is_active LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isActive The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isActive)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $isActive)) {
                $isActive = str_replace('*', '%', $isActive);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the date_added column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAdded('2011-03-14'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded('now'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded(array('max' => 'yesterday')); // WHERE date_added > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAdded The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(KluUserTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(KluUserTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the last_login column
     *
     * Example usage:
     * <code>
     * $query->filterByLastLogin('2011-03-14'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin('now'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin(array('max' => 'yesterday')); // WHERE last_login > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function filterByLastLogin($lastLogin = null, $comparison = null)
    {
        if (is_array($lastLogin)) {
            $useMinMax = false;
            if (isset($lastLogin['min'])) {
                $this->addUsingAlias(KluUserTableMap::COL_LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastLogin['max'])) {
                $this->addUsingAlias(KluUserTableMap::COL_LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluUserTableMap::COL_LAST_LOGIN, $lastLogin, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKluUser $kluUser Object to remove from the list of results
     *
     * @return $this|ChildKluUserQuery The current query, for fluid interface
     */
    public function prune($kluUser = null)
    {
        if ($kluUser) {
            $this->addUsingAlias(KluUserTableMap::COL_ID, $kluUser->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the klu_user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluUserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KluUserTableMap::clearInstancePool();
            KluUserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(KluUserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KluUserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KluUserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KluUserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KluUserQuery
