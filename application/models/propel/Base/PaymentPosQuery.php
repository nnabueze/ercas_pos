<?php

namespace Base;

use \PaymentPos as ChildPaymentPos;
use \PaymentPosQuery as ChildPaymentPosQuery;
use \Exception;
use \PDO;
use Map\PaymentPosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'payment_pos' table.
 *
 *
 *
 * @method     ChildPaymentPosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPaymentPosQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildPaymentPosQuery orderByStationId($order = Criteria::ASC) Order by the station_id column
 * @method     ChildPaymentPosQuery orderByCustomerName($order = Criteria::ASC) Order by the customer_name column
 * @method     ChildPaymentPosQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildPaymentPosQuery orderByBillCode($order = Criteria::ASC) Order by the bill_code column
 * @method     ChildPaymentPosQuery orderByBillName($order = Criteria::ASC) Order by the bill_name column
 * @method     ChildPaymentPosQuery orderByBillCategoryCode($order = Criteria::ASC) Order by the bill_category_code column
 * @method     ChildPaymentPosQuery orderByBillCategory($order = Criteria::ASC) Order by the bill_category column
 * @method     ChildPaymentPosQuery orderByMonth($order = Criteria::ASC) Order by the month column
 * @method     ChildPaymentPosQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     ChildPaymentPosQuery orderByTxcode($order = Criteria::ASC) Order by the txcode column
 * @method     ChildPaymentPosQuery orderByStation($order = Criteria::ASC) Order by the station column
 * @method     ChildPaymentPosQuery orderByOperatorCode($order = Criteria::ASC) Order by the operator_code column
 * @method     ChildPaymentPosQuery orderByOperator($order = Criteria::ASC) Order by the operator column
 * @method     ChildPaymentPosQuery orderByTerminal($order = Criteria::ASC) Order by the terminal column
 * @method     ChildPaymentPosQuery orderByTxdate($order = Criteria::ASC) Order by the txdate column
 * @method     ChildPaymentPosQuery orderByTxtime($order = Criteria::ASC) Order by the txtime column
 * @method     ChildPaymentPosQuery orderByCurrentUtc($order = Criteria::ASC) Order by the current_utc column
 *
 * @method     ChildPaymentPosQuery groupById() Group by the id column
 * @method     ChildPaymentPosQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildPaymentPosQuery groupByStationId() Group by the station_id column
 * @method     ChildPaymentPosQuery groupByCustomerName() Group by the customer_name column
 * @method     ChildPaymentPosQuery groupByAmount() Group by the amount column
 * @method     ChildPaymentPosQuery groupByBillCode() Group by the bill_code column
 * @method     ChildPaymentPosQuery groupByBillName() Group by the bill_name column
 * @method     ChildPaymentPosQuery groupByBillCategoryCode() Group by the bill_category_code column
 * @method     ChildPaymentPosQuery groupByBillCategory() Group by the bill_category column
 * @method     ChildPaymentPosQuery groupByMonth() Group by the month column
 * @method     ChildPaymentPosQuery groupByYear() Group by the year column
 * @method     ChildPaymentPosQuery groupByTxcode() Group by the txcode column
 * @method     ChildPaymentPosQuery groupByStation() Group by the station column
 * @method     ChildPaymentPosQuery groupByOperatorCode() Group by the operator_code column
 * @method     ChildPaymentPosQuery groupByOperator() Group by the operator column
 * @method     ChildPaymentPosQuery groupByTerminal() Group by the terminal column
 * @method     ChildPaymentPosQuery groupByTxdate() Group by the txdate column
 * @method     ChildPaymentPosQuery groupByTxtime() Group by the txtime column
 * @method     ChildPaymentPosQuery groupByCurrentUtc() Group by the current_utc column
 *
 * @method     ChildPaymentPosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPaymentPosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPaymentPosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPaymentPosQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPaymentPosQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPaymentPosQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPaymentPos findOne(ConnectionInterface $con = null) Return the first ChildPaymentPos matching the query
 * @method     ChildPaymentPos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPaymentPos matching the query, or a new ChildPaymentPos object populated from the query conditions when no match is found
 *
 * @method     ChildPaymentPos findOneById(int $id) Return the first ChildPaymentPos filtered by the id column
 * @method     ChildPaymentPos findOneByCustomerId(int $customer_id) Return the first ChildPaymentPos filtered by the customer_id column
 * @method     ChildPaymentPos findOneByStationId(int $station_id) Return the first ChildPaymentPos filtered by the station_id column
 * @method     ChildPaymentPos findOneByCustomerName(string $customer_name) Return the first ChildPaymentPos filtered by the customer_name column
 * @method     ChildPaymentPos findOneByAmount(string $amount) Return the first ChildPaymentPos filtered by the amount column
 * @method     ChildPaymentPos findOneByBillCode(string $bill_code) Return the first ChildPaymentPos filtered by the bill_code column
 * @method     ChildPaymentPos findOneByBillName(string $bill_name) Return the first ChildPaymentPos filtered by the bill_name column
 * @method     ChildPaymentPos findOneByBillCategoryCode(string $bill_category_code) Return the first ChildPaymentPos filtered by the bill_category_code column
 * @method     ChildPaymentPos findOneByBillCategory(string $bill_category) Return the first ChildPaymentPos filtered by the bill_category column
 * @method     ChildPaymentPos findOneByMonth(string $month) Return the first ChildPaymentPos filtered by the month column
 * @method     ChildPaymentPos findOneByYear(string $year) Return the first ChildPaymentPos filtered by the year column
 * @method     ChildPaymentPos findOneByTxcode(string $txcode) Return the first ChildPaymentPos filtered by the txcode column
 * @method     ChildPaymentPos findOneByStation(string $station) Return the first ChildPaymentPos filtered by the station column
 * @method     ChildPaymentPos findOneByOperatorCode(string $operator_code) Return the first ChildPaymentPos filtered by the operator_code column
 * @method     ChildPaymentPos findOneByOperator(string $operator) Return the first ChildPaymentPos filtered by the operator column
 * @method     ChildPaymentPos findOneByTerminal(string $terminal) Return the first ChildPaymentPos filtered by the terminal column
 * @method     ChildPaymentPos findOneByTxdate(string $txdate) Return the first ChildPaymentPos filtered by the txdate column
 * @method     ChildPaymentPos findOneByTxtime(string $txtime) Return the first ChildPaymentPos filtered by the txtime column
 * @method     ChildPaymentPos findOneByCurrentUtc(string $current_utc) Return the first ChildPaymentPos filtered by the current_utc column *

 * @method     ChildPaymentPos requirePk($key, ConnectionInterface $con = null) Return the ChildPaymentPos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOne(ConnectionInterface $con = null) Return the first ChildPaymentPos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPaymentPos requireOneById(int $id) Return the first ChildPaymentPos filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByCustomerId(int $customer_id) Return the first ChildPaymentPos filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByStationId(int $station_id) Return the first ChildPaymentPos filtered by the station_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByCustomerName(string $customer_name) Return the first ChildPaymentPos filtered by the customer_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByAmount(string $amount) Return the first ChildPaymentPos filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByBillCode(string $bill_code) Return the first ChildPaymentPos filtered by the bill_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByBillName(string $bill_name) Return the first ChildPaymentPos filtered by the bill_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByBillCategoryCode(string $bill_category_code) Return the first ChildPaymentPos filtered by the bill_category_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByBillCategory(string $bill_category) Return the first ChildPaymentPos filtered by the bill_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByMonth(string $month) Return the first ChildPaymentPos filtered by the month column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByYear(string $year) Return the first ChildPaymentPos filtered by the year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByTxcode(string $txcode) Return the first ChildPaymentPos filtered by the txcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByStation(string $station) Return the first ChildPaymentPos filtered by the station column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByOperatorCode(string $operator_code) Return the first ChildPaymentPos filtered by the operator_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByOperator(string $operator) Return the first ChildPaymentPos filtered by the operator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByTerminal(string $terminal) Return the first ChildPaymentPos filtered by the terminal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByTxdate(string $txdate) Return the first ChildPaymentPos filtered by the txdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByTxtime(string $txtime) Return the first ChildPaymentPos filtered by the txtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPos requireOneByCurrentUtc(string $current_utc) Return the first ChildPaymentPos filtered by the current_utc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPaymentPos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPaymentPos objects based on current ModelCriteria
 * @method     ChildPaymentPos[]|ObjectCollection findById(int $id) Return ChildPaymentPos objects filtered by the id column
 * @method     ChildPaymentPos[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildPaymentPos objects filtered by the customer_id column
 * @method     ChildPaymentPos[]|ObjectCollection findByStationId(int $station_id) Return ChildPaymentPos objects filtered by the station_id column
 * @method     ChildPaymentPos[]|ObjectCollection findByCustomerName(string $customer_name) Return ChildPaymentPos objects filtered by the customer_name column
 * @method     ChildPaymentPos[]|ObjectCollection findByAmount(string $amount) Return ChildPaymentPos objects filtered by the amount column
 * @method     ChildPaymentPos[]|ObjectCollection findByBillCode(string $bill_code) Return ChildPaymentPos objects filtered by the bill_code column
 * @method     ChildPaymentPos[]|ObjectCollection findByBillName(string $bill_name) Return ChildPaymentPos objects filtered by the bill_name column
 * @method     ChildPaymentPos[]|ObjectCollection findByBillCategoryCode(string $bill_category_code) Return ChildPaymentPos objects filtered by the bill_category_code column
 * @method     ChildPaymentPos[]|ObjectCollection findByBillCategory(string $bill_category) Return ChildPaymentPos objects filtered by the bill_category column
 * @method     ChildPaymentPos[]|ObjectCollection findByMonth(string $month) Return ChildPaymentPos objects filtered by the month column
 * @method     ChildPaymentPos[]|ObjectCollection findByYear(string $year) Return ChildPaymentPos objects filtered by the year column
 * @method     ChildPaymentPos[]|ObjectCollection findByTxcode(string $txcode) Return ChildPaymentPos objects filtered by the txcode column
 * @method     ChildPaymentPos[]|ObjectCollection findByStation(string $station) Return ChildPaymentPos objects filtered by the station column
 * @method     ChildPaymentPos[]|ObjectCollection findByOperatorCode(string $operator_code) Return ChildPaymentPos objects filtered by the operator_code column
 * @method     ChildPaymentPos[]|ObjectCollection findByOperator(string $operator) Return ChildPaymentPos objects filtered by the operator column
 * @method     ChildPaymentPos[]|ObjectCollection findByTerminal(string $terminal) Return ChildPaymentPos objects filtered by the terminal column
 * @method     ChildPaymentPos[]|ObjectCollection findByTxdate(string $txdate) Return ChildPaymentPos objects filtered by the txdate column
 * @method     ChildPaymentPos[]|ObjectCollection findByTxtime(string $txtime) Return ChildPaymentPos objects filtered by the txtime column
 * @method     ChildPaymentPos[]|ObjectCollection findByCurrentUtc(string $current_utc) Return ChildPaymentPos objects filtered by the current_utc column
 * @method     ChildPaymentPos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PaymentPosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PaymentPosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PaymentPos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPaymentPosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPaymentPosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPaymentPosQuery) {
            return $criteria;
        }
        $query = new ChildPaymentPosQuery();
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
     * @return ChildPaymentPos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PaymentPosTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PaymentPosTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPaymentPos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, customer_id, station_id, customer_name, amount, bill_code, bill_name, bill_category_code, bill_category, month, year, txcode, station, operator_code, operator, terminal, txdate, txtime, current_utc FROM payment_pos WHERE id = :p0';
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
            /** @var ChildPaymentPos $obj */
            $obj = new ChildPaymentPos();
            $obj->hydrate($row);
            PaymentPosTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPaymentPos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PaymentPosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PaymentPosTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PaymentPosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PaymentPosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(PaymentPosTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(PaymentPosTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the station_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStationId(1234); // WHERE station_id = 1234
     * $query->filterByStationId(array(12, 34)); // WHERE station_id IN (12, 34)
     * $query->filterByStationId(array('min' => 12)); // WHERE station_id > 12
     * </code>
     *
     * @param     mixed $stationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByStationId($stationId = null, $comparison = null)
    {
        if (is_array($stationId)) {
            $useMinMax = false;
            if (isset($stationId['min'])) {
                $this->addUsingAlias(PaymentPosTableMap::COL_STATION_ID, $stationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stationId['max'])) {
                $this->addUsingAlias(PaymentPosTableMap::COL_STATION_ID, $stationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_STATION_ID, $stationId, $comparison);
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
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosTableMap::COL_CUSTOMER_NAME, $customerName, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount('fooValue');   // WHERE amount = 'fooValue'
     * $query->filterByAmount('%fooValue%'); // WHERE amount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $amount The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($amount)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $amount)) {
                $amount = str_replace('*', '%', $amount);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the bill_code column
     *
     * Example usage:
     * <code>
     * $query->filterByBillCode('fooValue');   // WHERE bill_code = 'fooValue'
     * $query->filterByBillCode('%fooValue%'); // WHERE bill_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByBillCode($billCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billCode)) {
                $billCode = str_replace('*', '%', $billCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_BILL_CODE, $billCode, $comparison);
    }

    /**
     * Filter the query on the bill_name column
     *
     * Example usage:
     * <code>
     * $query->filterByBillName('fooValue');   // WHERE bill_name = 'fooValue'
     * $query->filterByBillName('%fooValue%'); // WHERE bill_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByBillName($billName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billName)) {
                $billName = str_replace('*', '%', $billName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_BILL_NAME, $billName, $comparison);
    }

    /**
     * Filter the query on the bill_category_code column
     *
     * Example usage:
     * <code>
     * $query->filterByBillCategoryCode('fooValue');   // WHERE bill_category_code = 'fooValue'
     * $query->filterByBillCategoryCode('%fooValue%'); // WHERE bill_category_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billCategoryCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByBillCategoryCode($billCategoryCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billCategoryCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billCategoryCode)) {
                $billCategoryCode = str_replace('*', '%', $billCategoryCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_BILL_CATEGORY_CODE, $billCategoryCode, $comparison);
    }

    /**
     * Filter the query on the bill_category column
     *
     * Example usage:
     * <code>
     * $query->filterByBillCategory('fooValue');   // WHERE bill_category = 'fooValue'
     * $query->filterByBillCategory('%fooValue%'); // WHERE bill_category LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billCategory The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByBillCategory($billCategory = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billCategory)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billCategory)) {
                $billCategory = str_replace('*', '%', $billCategory);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_BILL_CATEGORY, $billCategory, $comparison);
    }

    /**
     * Filter the query on the month column
     *
     * Example usage:
     * <code>
     * $query->filterByMonth('fooValue');   // WHERE month = 'fooValue'
     * $query->filterByMonth('%fooValue%'); // WHERE month LIKE '%fooValue%'
     * </code>
     *
     * @param     string $month The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByMonth($month = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($month)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $month)) {
                $month = str_replace('*', '%', $month);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_MONTH, $month, $comparison);
    }

    /**
     * Filter the query on the year column
     *
     * Example usage:
     * <code>
     * $query->filterByYear('fooValue');   // WHERE year = 'fooValue'
     * $query->filterByYear('%fooValue%'); // WHERE year LIKE '%fooValue%'
     * </code>
     *
     * @param     string $year The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByYear($year = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($year)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $year)) {
                $year = str_replace('*', '%', $year);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_YEAR, $year, $comparison);
    }

    /**
     * Filter the query on the txcode column
     *
     * Example usage:
     * <code>
     * $query->filterByTxcode('fooValue');   // WHERE txcode = 'fooValue'
     * $query->filterByTxcode('%fooValue%'); // WHERE txcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByTxcode($txcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $txcode)) {
                $txcode = str_replace('*', '%', $txcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_TXCODE, $txcode, $comparison);
    }

    /**
     * Filter the query on the station column
     *
     * Example usage:
     * <code>
     * $query->filterByStation('fooValue');   // WHERE station = 'fooValue'
     * $query->filterByStation('%fooValue%'); // WHERE station LIKE '%fooValue%'
     * </code>
     *
     * @param     string $station The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByStation($station = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($station)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $station)) {
                $station = str_replace('*', '%', $station);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_STATION, $station, $comparison);
    }

    /**
     * Filter the query on the operator_code column
     *
     * Example usage:
     * <code>
     * $query->filterByOperatorCode('fooValue');   // WHERE operator_code = 'fooValue'
     * $query->filterByOperatorCode('%fooValue%'); // WHERE operator_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $operatorCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByOperatorCode($operatorCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($operatorCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $operatorCode)) {
                $operatorCode = str_replace('*', '%', $operatorCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_OPERATOR_CODE, $operatorCode, $comparison);
    }

    /**
     * Filter the query on the operator column
     *
     * Example usage:
     * <code>
     * $query->filterByOperator('fooValue');   // WHERE operator = 'fooValue'
     * $query->filterByOperator('%fooValue%'); // WHERE operator LIKE '%fooValue%'
     * </code>
     *
     * @param     string $operator The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByOperator($operator = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($operator)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $operator)) {
                $operator = str_replace('*', '%', $operator);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_OPERATOR, $operator, $comparison);
    }

    /**
     * Filter the query on the terminal column
     *
     * Example usage:
     * <code>
     * $query->filterByTerminal('fooValue');   // WHERE terminal = 'fooValue'
     * $query->filterByTerminal('%fooValue%'); // WHERE terminal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $terminal The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByTerminal($terminal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($terminal)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $terminal)) {
                $terminal = str_replace('*', '%', $terminal);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_TERMINAL, $terminal, $comparison);
    }

    /**
     * Filter the query on the txdate column
     *
     * Example usage:
     * <code>
     * $query->filterByTxdate('fooValue');   // WHERE txdate = 'fooValue'
     * $query->filterByTxdate('%fooValue%'); // WHERE txdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txdate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByTxdate($txdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txdate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $txdate)) {
                $txdate = str_replace('*', '%', $txdate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_TXDATE, $txdate, $comparison);
    }

    /**
     * Filter the query on the txtime column
     *
     * Example usage:
     * <code>
     * $query->filterByTxtime('fooValue');   // WHERE txtime = 'fooValue'
     * $query->filterByTxtime('%fooValue%'); // WHERE txtime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txtime The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByTxtime($txtime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txtime)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $txtime)) {
                $txtime = str_replace('*', '%', $txtime);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_TXTIME, $txtime, $comparison);
    }

    /**
     * Filter the query on the current_utc column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentUtc('fooValue');   // WHERE current_utc = 'fooValue'
     * $query->filterByCurrentUtc('%fooValue%'); // WHERE current_utc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $currentUtc The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function filterByCurrentUtc($currentUtc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($currentUtc)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $currentUtc)) {
                $currentUtc = str_replace('*', '%', $currentUtc);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PaymentPosTableMap::COL_CURRENT_UTC, $currentUtc, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPaymentPos $paymentPos Object to remove from the list of results
     *
     * @return $this|ChildPaymentPosQuery The current query, for fluid interface
     */
    public function prune($paymentPos = null)
    {
        if ($paymentPos) {
            $this->addUsingAlias(PaymentPosTableMap::COL_ID, $paymentPos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the payment_pos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentPosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PaymentPosTableMap::clearInstancePool();
            PaymentPosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentPosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PaymentPosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PaymentPosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PaymentPosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PaymentPosQuery
