<?php

namespace Base;

use \PaymentPosOl as ChildPaymentPosOl;
use \PaymentPosOlQuery as ChildPaymentPosOlQuery;
use \Exception;
use \PDO;
use Map\PaymentPosOlTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'payment_pos_ol' table.
 *
 *
 *
 * @method     ChildPaymentPosOlQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPaymentPosOlQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildPaymentPosOlQuery orderByStationId($order = Criteria::ASC) Order by the station_id column
 * @method     ChildPaymentPosOlQuery orderByCustomerName($order = Criteria::ASC) Order by the customer_name column
 * @method     ChildPaymentPosOlQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildPaymentPosOlQuery orderByBillCode($order = Criteria::ASC) Order by the bill_code column
 * @method     ChildPaymentPosOlQuery orderByBillName($order = Criteria::ASC) Order by the bill_name column
 * @method     ChildPaymentPosOlQuery orderByBillCategoryCode($order = Criteria::ASC) Order by the bill_category_code column
 * @method     ChildPaymentPosOlQuery orderByBillCategory($order = Criteria::ASC) Order by the bill_category column
 * @method     ChildPaymentPosOlQuery orderByMonth($order = Criteria::ASC) Order by the month column
 * @method     ChildPaymentPosOlQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     ChildPaymentPosOlQuery orderByTxcode($order = Criteria::ASC) Order by the txcode column
 * @method     ChildPaymentPosOlQuery orderByStation($order = Criteria::ASC) Order by the station column
 * @method     ChildPaymentPosOlQuery orderByOperatorCode($order = Criteria::ASC) Order by the operator_code column
 * @method     ChildPaymentPosOlQuery orderByOperator($order = Criteria::ASC) Order by the operator column
 * @method     ChildPaymentPosOlQuery orderByTerminal($order = Criteria::ASC) Order by the terminal column
 * @method     ChildPaymentPosOlQuery orderByTxdate($order = Criteria::ASC) Order by the txdate column
 * @method     ChildPaymentPosOlQuery orderByTxtime($order = Criteria::ASC) Order by the txtime column
 * @method     ChildPaymentPosOlQuery orderByCurrentUtc($order = Criteria::ASC) Order by the current_utc column
 *
 * @method     ChildPaymentPosOlQuery groupById() Group by the id column
 * @method     ChildPaymentPosOlQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildPaymentPosOlQuery groupByStationId() Group by the station_id column
 * @method     ChildPaymentPosOlQuery groupByCustomerName() Group by the customer_name column
 * @method     ChildPaymentPosOlQuery groupByAmount() Group by the amount column
 * @method     ChildPaymentPosOlQuery groupByBillCode() Group by the bill_code column
 * @method     ChildPaymentPosOlQuery groupByBillName() Group by the bill_name column
 * @method     ChildPaymentPosOlQuery groupByBillCategoryCode() Group by the bill_category_code column
 * @method     ChildPaymentPosOlQuery groupByBillCategory() Group by the bill_category column
 * @method     ChildPaymentPosOlQuery groupByMonth() Group by the month column
 * @method     ChildPaymentPosOlQuery groupByYear() Group by the year column
 * @method     ChildPaymentPosOlQuery groupByTxcode() Group by the txcode column
 * @method     ChildPaymentPosOlQuery groupByStation() Group by the station column
 * @method     ChildPaymentPosOlQuery groupByOperatorCode() Group by the operator_code column
 * @method     ChildPaymentPosOlQuery groupByOperator() Group by the operator column
 * @method     ChildPaymentPosOlQuery groupByTerminal() Group by the terminal column
 * @method     ChildPaymentPosOlQuery groupByTxdate() Group by the txdate column
 * @method     ChildPaymentPosOlQuery groupByTxtime() Group by the txtime column
 * @method     ChildPaymentPosOlQuery groupByCurrentUtc() Group by the current_utc column
 *
 * @method     ChildPaymentPosOlQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPaymentPosOlQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPaymentPosOlQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPaymentPosOlQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPaymentPosOlQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPaymentPosOlQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPaymentPosOl findOne(ConnectionInterface $con = null) Return the first ChildPaymentPosOl matching the query
 * @method     ChildPaymentPosOl findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPaymentPosOl matching the query, or a new ChildPaymentPosOl object populated from the query conditions when no match is found
 *
 * @method     ChildPaymentPosOl findOneById(int $id) Return the first ChildPaymentPosOl filtered by the id column
 * @method     ChildPaymentPosOl findOneByCustomerId(int $customer_id) Return the first ChildPaymentPosOl filtered by the customer_id column
 * @method     ChildPaymentPosOl findOneByStationId(int $station_id) Return the first ChildPaymentPosOl filtered by the station_id column
 * @method     ChildPaymentPosOl findOneByCustomerName(string $customer_name) Return the first ChildPaymentPosOl filtered by the customer_name column
 * @method     ChildPaymentPosOl findOneByAmount(string $amount) Return the first ChildPaymentPosOl filtered by the amount column
 * @method     ChildPaymentPosOl findOneByBillCode(string $bill_code) Return the first ChildPaymentPosOl filtered by the bill_code column
 * @method     ChildPaymentPosOl findOneByBillName(string $bill_name) Return the first ChildPaymentPosOl filtered by the bill_name column
 * @method     ChildPaymentPosOl findOneByBillCategoryCode(string $bill_category_code) Return the first ChildPaymentPosOl filtered by the bill_category_code column
 * @method     ChildPaymentPosOl findOneByBillCategory(string $bill_category) Return the first ChildPaymentPosOl filtered by the bill_category column
 * @method     ChildPaymentPosOl findOneByMonth(string $month) Return the first ChildPaymentPosOl filtered by the month column
 * @method     ChildPaymentPosOl findOneByYear(string $year) Return the first ChildPaymentPosOl filtered by the year column
 * @method     ChildPaymentPosOl findOneByTxcode(string $txcode) Return the first ChildPaymentPosOl filtered by the txcode column
 * @method     ChildPaymentPosOl findOneByStation(string $station) Return the first ChildPaymentPosOl filtered by the station column
 * @method     ChildPaymentPosOl findOneByOperatorCode(string $operator_code) Return the first ChildPaymentPosOl filtered by the operator_code column
 * @method     ChildPaymentPosOl findOneByOperator(string $operator) Return the first ChildPaymentPosOl filtered by the operator column
 * @method     ChildPaymentPosOl findOneByTerminal(string $terminal) Return the first ChildPaymentPosOl filtered by the terminal column
 * @method     ChildPaymentPosOl findOneByTxdate(string $txdate) Return the first ChildPaymentPosOl filtered by the txdate column
 * @method     ChildPaymentPosOl findOneByTxtime(string $txtime) Return the first ChildPaymentPosOl filtered by the txtime column
 * @method     ChildPaymentPosOl findOneByCurrentUtc(string $current_utc) Return the first ChildPaymentPosOl filtered by the current_utc column *

 * @method     ChildPaymentPosOl requirePk($key, ConnectionInterface $con = null) Return the ChildPaymentPosOl by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOne(ConnectionInterface $con = null) Return the first ChildPaymentPosOl matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPaymentPosOl requireOneById(int $id) Return the first ChildPaymentPosOl filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByCustomerId(int $customer_id) Return the first ChildPaymentPosOl filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByStationId(int $station_id) Return the first ChildPaymentPosOl filtered by the station_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByCustomerName(string $customer_name) Return the first ChildPaymentPosOl filtered by the customer_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByAmount(string $amount) Return the first ChildPaymentPosOl filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByBillCode(string $bill_code) Return the first ChildPaymentPosOl filtered by the bill_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByBillName(string $bill_name) Return the first ChildPaymentPosOl filtered by the bill_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByBillCategoryCode(string $bill_category_code) Return the first ChildPaymentPosOl filtered by the bill_category_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByBillCategory(string $bill_category) Return the first ChildPaymentPosOl filtered by the bill_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByMonth(string $month) Return the first ChildPaymentPosOl filtered by the month column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByYear(string $year) Return the first ChildPaymentPosOl filtered by the year column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByTxcode(string $txcode) Return the first ChildPaymentPosOl filtered by the txcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByStation(string $station) Return the first ChildPaymentPosOl filtered by the station column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByOperatorCode(string $operator_code) Return the first ChildPaymentPosOl filtered by the operator_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByOperator(string $operator) Return the first ChildPaymentPosOl filtered by the operator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByTerminal(string $terminal) Return the first ChildPaymentPosOl filtered by the terminal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByTxdate(string $txdate) Return the first ChildPaymentPosOl filtered by the txdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByTxtime(string $txtime) Return the first ChildPaymentPosOl filtered by the txtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPaymentPosOl requireOneByCurrentUtc(string $current_utc) Return the first ChildPaymentPosOl filtered by the current_utc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPaymentPosOl[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPaymentPosOl objects based on current ModelCriteria
 * @method     ChildPaymentPosOl[]|ObjectCollection findById(int $id) Return ChildPaymentPosOl objects filtered by the id column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildPaymentPosOl objects filtered by the customer_id column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByStationId(int $station_id) Return ChildPaymentPosOl objects filtered by the station_id column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByCustomerName(string $customer_name) Return ChildPaymentPosOl objects filtered by the customer_name column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByAmount(string $amount) Return ChildPaymentPosOl objects filtered by the amount column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByBillCode(string $bill_code) Return ChildPaymentPosOl objects filtered by the bill_code column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByBillName(string $bill_name) Return ChildPaymentPosOl objects filtered by the bill_name column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByBillCategoryCode(string $bill_category_code) Return ChildPaymentPosOl objects filtered by the bill_category_code column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByBillCategory(string $bill_category) Return ChildPaymentPosOl objects filtered by the bill_category column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByMonth(string $month) Return ChildPaymentPosOl objects filtered by the month column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByYear(string $year) Return ChildPaymentPosOl objects filtered by the year column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByTxcode(string $txcode) Return ChildPaymentPosOl objects filtered by the txcode column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByStation(string $station) Return ChildPaymentPosOl objects filtered by the station column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByOperatorCode(string $operator_code) Return ChildPaymentPosOl objects filtered by the operator_code column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByOperator(string $operator) Return ChildPaymentPosOl objects filtered by the operator column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByTerminal(string $terminal) Return ChildPaymentPosOl objects filtered by the terminal column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByTxdate(string $txdate) Return ChildPaymentPosOl objects filtered by the txdate column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByTxtime(string $txtime) Return ChildPaymentPosOl objects filtered by the txtime column
 * @method     ChildPaymentPosOl[]|ObjectCollection findByCurrentUtc(string $current_utc) Return ChildPaymentPosOl objects filtered by the current_utc column
 * @method     ChildPaymentPosOl[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PaymentPosOlQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PaymentPosOlQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PaymentPosOl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPaymentPosOlQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPaymentPosOlQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPaymentPosOlQuery) {
            return $criteria;
        }
        $query = new ChildPaymentPosOlQuery();
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
     * @return ChildPaymentPosOl|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PaymentPosOlTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PaymentPosOlTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPaymentPosOl A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, customer_id, station_id, customer_name, amount, bill_code, bill_name, bill_category_code, bill_category, month, year, txcode, station, operator_code, operator, terminal, txdate, txtime, current_utc FROM payment_pos_ol WHERE id = :p0';
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
            /** @var ChildPaymentPosOl $obj */
            $obj = new ChildPaymentPosOl();
            $obj->hydrate($row);
            PaymentPosOlTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPaymentPosOl|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PaymentPosOlTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PaymentPosOlTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(PaymentPosOlTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(PaymentPosOlTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
     */
    public function filterByStationId($stationId = null, $comparison = null)
    {
        if (is_array($stationId)) {
            $useMinMax = false;
            if (isset($stationId['min'])) {
                $this->addUsingAlias(PaymentPosOlTableMap::COL_STATION_ID, $stationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stationId['max'])) {
                $this->addUsingAlias(PaymentPosOlTableMap::COL_STATION_ID, $stationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_STATION_ID, $stationId, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_CUSTOMER_NAME, $customerName, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_BILL_CODE, $billCode, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_BILL_NAME, $billName, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_BILL_CATEGORY_CODE, $billCategoryCode, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_BILL_CATEGORY, $billCategory, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_MONTH, $month, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_YEAR, $year, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_TXCODE, $txcode, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_STATION, $station, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_OPERATOR_CODE, $operatorCode, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_OPERATOR, $operator, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_TERMINAL, $terminal, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_TXDATE, $txdate, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_TXTIME, $txtime, $comparison);
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
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PaymentPosOlTableMap::COL_CURRENT_UTC, $currentUtc, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPaymentPosOl $paymentPosOl Object to remove from the list of results
     *
     * @return $this|ChildPaymentPosOlQuery The current query, for fluid interface
     */
    public function prune($paymentPosOl = null)
    {
        if ($paymentPosOl) {
            $this->addUsingAlias(PaymentPosOlTableMap::COL_ID, $paymentPosOl->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the payment_pos_ol table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentPosOlTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PaymentPosOlTableMap::clearInstancePool();
            PaymentPosOlTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentPosOlTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PaymentPosOlTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PaymentPosOlTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PaymentPosOlTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PaymentPosOlQuery
