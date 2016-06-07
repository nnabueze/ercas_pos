<?php

namespace Base;

use \KluOrder as ChildKluOrder;
use \KluOrderQuery as ChildKluOrderQuery;
use \Exception;
use \PDO;
use Map\KluOrderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'klu_order' table.
 *
 *
 *
 * @method     ChildKluOrderQuery orderByOrderid($order = Criteria::ASC) Order by the OrderID column
 * @method     ChildKluOrderQuery orderByRefNo($order = Criteria::ASC) Order by the ref_no column
 * @method     ChildKluOrderQuery orderByBillId($order = Criteria::ASC) Order by the bill_id column
 * @method     ChildKluOrderQuery orderByAccountNo($order = Criteria::ASC) Order by the account_no column
 * @method     ChildKluOrderQuery orderByServiceType($order = Criteria::ASC) Order by the service_type column
 * @method     ChildKluOrderQuery orderByPaymentDate($order = Criteria::ASC) Order by the payment_date column
 * @method     ChildKluOrderQuery orderByPaymentDueDate($order = Criteria::ASC) Order by the payment_due_date column
 * @method     ChildKluOrderQuery orderByPaymentTime($order = Criteria::ASC) Order by the payment_time column
 * @method     ChildKluOrderQuery orderByPaymentPlatform($order = Criteria::ASC) Order by the payment_platform column
 * @method     ChildKluOrderQuery orderByCustEmail($order = Criteria::ASC) Order by the cust_email column
 * @method     ChildKluOrderQuery orderByCustPhone($order = Criteria::ASC) Order by the cust_phone column
 * @method     ChildKluOrderQuery orderByBillingPeriod($order = Criteria::ASC) Order by the billing_period column
 * @method     ChildKluOrderQuery orderBySolidWasteRate($order = Criteria::ASC) Order by the solid_waste_rate column
 * @method     ChildKluOrderQuery orderBySolidWasteVat($order = Criteria::ASC) Order by the solid_waste_vat column
 * @method     ChildKluOrderQuery orderBySolidWasteTax($order = Criteria::ASC) Order by the solid_waste_tax column
 * @method     ChildKluOrderQuery orderByLiquidWasteRate($order = Criteria::ASC) Order by the liquid_waste_rate column
 * @method     ChildKluOrderQuery orderByLiquidWasteVat($order = Criteria::ASC) Order by the liquid_waste_vat column
 * @method     ChildKluOrderQuery orderByLiquidWasteTax($order = Criteria::ASC) Order by the liquid_waste_tax column
 * @method     ChildKluOrderQuery orderByPreviousBalance($order = Criteria::ASC) Order by the previous_balance column
 * @method     ChildKluOrderQuery orderByPaymentReceived($order = Criteria::ASC) Order by the payment_received column
 * @method     ChildKluOrderQuery orderByTotalAmount($order = Criteria::ASC) Order by the total_amount column
 *
 * @method     ChildKluOrderQuery groupByOrderid() Group by the OrderID column
 * @method     ChildKluOrderQuery groupByRefNo() Group by the ref_no column
 * @method     ChildKluOrderQuery groupByBillId() Group by the bill_id column
 * @method     ChildKluOrderQuery groupByAccountNo() Group by the account_no column
 * @method     ChildKluOrderQuery groupByServiceType() Group by the service_type column
 * @method     ChildKluOrderQuery groupByPaymentDate() Group by the payment_date column
 * @method     ChildKluOrderQuery groupByPaymentDueDate() Group by the payment_due_date column
 * @method     ChildKluOrderQuery groupByPaymentTime() Group by the payment_time column
 * @method     ChildKluOrderQuery groupByPaymentPlatform() Group by the payment_platform column
 * @method     ChildKluOrderQuery groupByCustEmail() Group by the cust_email column
 * @method     ChildKluOrderQuery groupByCustPhone() Group by the cust_phone column
 * @method     ChildKluOrderQuery groupByBillingPeriod() Group by the billing_period column
 * @method     ChildKluOrderQuery groupBySolidWasteRate() Group by the solid_waste_rate column
 * @method     ChildKluOrderQuery groupBySolidWasteVat() Group by the solid_waste_vat column
 * @method     ChildKluOrderQuery groupBySolidWasteTax() Group by the solid_waste_tax column
 * @method     ChildKluOrderQuery groupByLiquidWasteRate() Group by the liquid_waste_rate column
 * @method     ChildKluOrderQuery groupByLiquidWasteVat() Group by the liquid_waste_vat column
 * @method     ChildKluOrderQuery groupByLiquidWasteTax() Group by the liquid_waste_tax column
 * @method     ChildKluOrderQuery groupByPreviousBalance() Group by the previous_balance column
 * @method     ChildKluOrderQuery groupByPaymentReceived() Group by the payment_received column
 * @method     ChildKluOrderQuery groupByTotalAmount() Group by the total_amount column
 *
 * @method     ChildKluOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKluOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKluOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKluOrderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKluOrderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKluOrderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKluOrder findOne(ConnectionInterface $con = null) Return the first ChildKluOrder matching the query
 * @method     ChildKluOrder findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKluOrder matching the query, or a new ChildKluOrder object populated from the query conditions when no match is found
 *
 * @method     ChildKluOrder findOneByOrderid(int $OrderID) Return the first ChildKluOrder filtered by the OrderID column
 * @method     ChildKluOrder findOneByRefNo(string $ref_no) Return the first ChildKluOrder filtered by the ref_no column
 * @method     ChildKluOrder findOneByBillId(int $bill_id) Return the first ChildKluOrder filtered by the bill_id column
 * @method     ChildKluOrder findOneByAccountNo(string $account_no) Return the first ChildKluOrder filtered by the account_no column
 * @method     ChildKluOrder findOneByServiceType(string $service_type) Return the first ChildKluOrder filtered by the service_type column
 * @method     ChildKluOrder findOneByPaymentDate(string $payment_date) Return the first ChildKluOrder filtered by the payment_date column
 * @method     ChildKluOrder findOneByPaymentDueDate(string $payment_due_date) Return the first ChildKluOrder filtered by the payment_due_date column
 * @method     ChildKluOrder findOneByPaymentTime(string $payment_time) Return the first ChildKluOrder filtered by the payment_time column
 * @method     ChildKluOrder findOneByPaymentPlatform(string $payment_platform) Return the first ChildKluOrder filtered by the payment_platform column
 * @method     ChildKluOrder findOneByCustEmail(string $cust_email) Return the first ChildKluOrder filtered by the cust_email column
 * @method     ChildKluOrder findOneByCustPhone(string $cust_phone) Return the first ChildKluOrder filtered by the cust_phone column
 * @method     ChildKluOrder findOneByBillingPeriod(string $billing_period) Return the first ChildKluOrder filtered by the billing_period column
 * @method     ChildKluOrder findOneBySolidWasteRate(string $solid_waste_rate) Return the first ChildKluOrder filtered by the solid_waste_rate column
 * @method     ChildKluOrder findOneBySolidWasteVat(string $solid_waste_vat) Return the first ChildKluOrder filtered by the solid_waste_vat column
 * @method     ChildKluOrder findOneBySolidWasteTax(string $solid_waste_tax) Return the first ChildKluOrder filtered by the solid_waste_tax column
 * @method     ChildKluOrder findOneByLiquidWasteRate(string $liquid_waste_rate) Return the first ChildKluOrder filtered by the liquid_waste_rate column
 * @method     ChildKluOrder findOneByLiquidWasteVat(string $liquid_waste_vat) Return the first ChildKluOrder filtered by the liquid_waste_vat column
 * @method     ChildKluOrder findOneByLiquidWasteTax(string $liquid_waste_tax) Return the first ChildKluOrder filtered by the liquid_waste_tax column
 * @method     ChildKluOrder findOneByPreviousBalance(string $previous_balance) Return the first ChildKluOrder filtered by the previous_balance column
 * @method     ChildKluOrder findOneByPaymentReceived(string $payment_received) Return the first ChildKluOrder filtered by the payment_received column
 * @method     ChildKluOrder findOneByTotalAmount(string $total_amount) Return the first ChildKluOrder filtered by the total_amount column *

 * @method     ChildKluOrder requirePk($key, ConnectionInterface $con = null) Return the ChildKluOrder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOne(ConnectionInterface $con = null) Return the first ChildKluOrder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluOrder requireOneByOrderid(int $OrderID) Return the first ChildKluOrder filtered by the OrderID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByRefNo(string $ref_no) Return the first ChildKluOrder filtered by the ref_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByBillId(int $bill_id) Return the first ChildKluOrder filtered by the bill_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByAccountNo(string $account_no) Return the first ChildKluOrder filtered by the account_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByServiceType(string $service_type) Return the first ChildKluOrder filtered by the service_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByPaymentDate(string $payment_date) Return the first ChildKluOrder filtered by the payment_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByPaymentDueDate(string $payment_due_date) Return the first ChildKluOrder filtered by the payment_due_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByPaymentTime(string $payment_time) Return the first ChildKluOrder filtered by the payment_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByPaymentPlatform(string $payment_platform) Return the first ChildKluOrder filtered by the payment_platform column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByCustEmail(string $cust_email) Return the first ChildKluOrder filtered by the cust_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByCustPhone(string $cust_phone) Return the first ChildKluOrder filtered by the cust_phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByBillingPeriod(string $billing_period) Return the first ChildKluOrder filtered by the billing_period column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneBySolidWasteRate(string $solid_waste_rate) Return the first ChildKluOrder filtered by the solid_waste_rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneBySolidWasteVat(string $solid_waste_vat) Return the first ChildKluOrder filtered by the solid_waste_vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneBySolidWasteTax(string $solid_waste_tax) Return the first ChildKluOrder filtered by the solid_waste_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByLiquidWasteRate(string $liquid_waste_rate) Return the first ChildKluOrder filtered by the liquid_waste_rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByLiquidWasteVat(string $liquid_waste_vat) Return the first ChildKluOrder filtered by the liquid_waste_vat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByLiquidWasteTax(string $liquid_waste_tax) Return the first ChildKluOrder filtered by the liquid_waste_tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByPreviousBalance(string $previous_balance) Return the first ChildKluOrder filtered by the previous_balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByPaymentReceived(string $payment_received) Return the first ChildKluOrder filtered by the payment_received column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluOrder requireOneByTotalAmount(string $total_amount) Return the first ChildKluOrder filtered by the total_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluOrder[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKluOrder objects based on current ModelCriteria
 * @method     ChildKluOrder[]|ObjectCollection findByOrderid(int $OrderID) Return ChildKluOrder objects filtered by the OrderID column
 * @method     ChildKluOrder[]|ObjectCollection findByRefNo(string $ref_no) Return ChildKluOrder objects filtered by the ref_no column
 * @method     ChildKluOrder[]|ObjectCollection findByBillId(int $bill_id) Return ChildKluOrder objects filtered by the bill_id column
 * @method     ChildKluOrder[]|ObjectCollection findByAccountNo(string $account_no) Return ChildKluOrder objects filtered by the account_no column
 * @method     ChildKluOrder[]|ObjectCollection findByServiceType(string $service_type) Return ChildKluOrder objects filtered by the service_type column
 * @method     ChildKluOrder[]|ObjectCollection findByPaymentDate(string $payment_date) Return ChildKluOrder objects filtered by the payment_date column
 * @method     ChildKluOrder[]|ObjectCollection findByPaymentDueDate(string $payment_due_date) Return ChildKluOrder objects filtered by the payment_due_date column
 * @method     ChildKluOrder[]|ObjectCollection findByPaymentTime(string $payment_time) Return ChildKluOrder objects filtered by the payment_time column
 * @method     ChildKluOrder[]|ObjectCollection findByPaymentPlatform(string $payment_platform) Return ChildKluOrder objects filtered by the payment_platform column
 * @method     ChildKluOrder[]|ObjectCollection findByCustEmail(string $cust_email) Return ChildKluOrder objects filtered by the cust_email column
 * @method     ChildKluOrder[]|ObjectCollection findByCustPhone(string $cust_phone) Return ChildKluOrder objects filtered by the cust_phone column
 * @method     ChildKluOrder[]|ObjectCollection findByBillingPeriod(string $billing_period) Return ChildKluOrder objects filtered by the billing_period column
 * @method     ChildKluOrder[]|ObjectCollection findBySolidWasteRate(string $solid_waste_rate) Return ChildKluOrder objects filtered by the solid_waste_rate column
 * @method     ChildKluOrder[]|ObjectCollection findBySolidWasteVat(string $solid_waste_vat) Return ChildKluOrder objects filtered by the solid_waste_vat column
 * @method     ChildKluOrder[]|ObjectCollection findBySolidWasteTax(string $solid_waste_tax) Return ChildKluOrder objects filtered by the solid_waste_tax column
 * @method     ChildKluOrder[]|ObjectCollection findByLiquidWasteRate(string $liquid_waste_rate) Return ChildKluOrder objects filtered by the liquid_waste_rate column
 * @method     ChildKluOrder[]|ObjectCollection findByLiquidWasteVat(string $liquid_waste_vat) Return ChildKluOrder objects filtered by the liquid_waste_vat column
 * @method     ChildKluOrder[]|ObjectCollection findByLiquidWasteTax(string $liquid_waste_tax) Return ChildKluOrder objects filtered by the liquid_waste_tax column
 * @method     ChildKluOrder[]|ObjectCollection findByPreviousBalance(string $previous_balance) Return ChildKluOrder objects filtered by the previous_balance column
 * @method     ChildKluOrder[]|ObjectCollection findByPaymentReceived(string $payment_received) Return ChildKluOrder objects filtered by the payment_received column
 * @method     ChildKluOrder[]|ObjectCollection findByTotalAmount(string $total_amount) Return ChildKluOrder objects filtered by the total_amount column
 * @method     ChildKluOrder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KluOrderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KluOrderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KluOrder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKluOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKluOrderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKluOrderQuery) {
            return $criteria;
        }
        $query = new ChildKluOrderQuery();
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
     * @return ChildKluOrder|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluOrderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KluOrderTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildKluOrder A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT OrderID, ref_no, bill_id, account_no, service_type, payment_date, payment_due_date, payment_time, payment_platform, cust_email, cust_phone, billing_period, solid_waste_rate, solid_waste_vat, solid_waste_tax, liquid_waste_rate, liquid_waste_vat, liquid_waste_tax, previous_balance, payment_received, total_amount FROM klu_order WHERE OrderID = :p0';
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
            /** @var ChildKluOrder $obj */
            $obj = new ChildKluOrder();
            $obj->hydrate($row);
            KluOrderTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildKluOrder|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KluOrderTableMap::COL_ORDERID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KluOrderTableMap::COL_ORDERID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the OrderID column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderid(1234); // WHERE OrderID = 1234
     * $query->filterByOrderid(array(12, 34)); // WHERE OrderID IN (12, 34)
     * $query->filterByOrderid(array('min' => 12)); // WHERE OrderID > 12
     * </code>
     *
     * @param     mixed $orderid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByOrderid($orderid = null, $comparison = null)
    {
        if (is_array($orderid)) {
            $useMinMax = false;
            if (isset($orderid['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_ORDERID, $orderid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderid['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_ORDERID, $orderid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_ORDERID, $orderid, $comparison);
    }

    /**
     * Filter the query on the ref_no column
     *
     * Example usage:
     * <code>
     * $query->filterByRefNo('fooValue');   // WHERE ref_no = 'fooValue'
     * $query->filterByRefNo('%fooValue%'); // WHERE ref_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $refNo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByRefNo($refNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($refNo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $refNo)) {
                $refNo = str_replace('*', '%', $refNo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_REF_NO, $refNo, $comparison);
    }

    /**
     * Filter the query on the bill_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBillId(1234); // WHERE bill_id = 1234
     * $query->filterByBillId(array(12, 34)); // WHERE bill_id IN (12, 34)
     * $query->filterByBillId(array('min' => 12)); // WHERE bill_id > 12
     * </code>
     *
     * @param     mixed $billId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByBillId($billId = null, $comparison = null)
    {
        if (is_array($billId)) {
            $useMinMax = false;
            if (isset($billId['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_BILL_ID, $billId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($billId['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_BILL_ID, $billId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_BILL_ID, $billId, $comparison);
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
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluOrderTableMap::COL_ACCOUNT_NO, $accountNo, $comparison);
    }

    /**
     * Filter the query on the service_type column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceType('fooValue');   // WHERE service_type = 'fooValue'
     * $query->filterByServiceType('%fooValue%'); // WHERE service_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serviceType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByServiceType($serviceType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serviceType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serviceType)) {
                $serviceType = str_replace('*', '%', $serviceType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_SERVICE_TYPE, $serviceType, $comparison);
    }

    /**
     * Filter the query on the payment_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentDate('2011-03-14'); // WHERE payment_date = '2011-03-14'
     * $query->filterByPaymentDate('now'); // WHERE payment_date = '2011-03-14'
     * $query->filterByPaymentDate(array('max' => 'yesterday')); // WHERE payment_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $paymentDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentDate($paymentDate = null, $comparison = null)
    {
        if (is_array($paymentDate)) {
            $useMinMax = false;
            if (isset($paymentDate['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_DATE, $paymentDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentDate['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_DATE, $paymentDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_DATE, $paymentDate, $comparison);
    }

    /**
     * Filter the query on the payment_due_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentDueDate('fooValue');   // WHERE payment_due_date = 'fooValue'
     * $query->filterByPaymentDueDate('%fooValue%'); // WHERE payment_due_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentDueDate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentDueDate($paymentDueDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentDueDate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymentDueDate)) {
                $paymentDueDate = str_replace('*', '%', $paymentDueDate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_DUE_DATE, $paymentDueDate, $comparison);
    }

    /**
     * Filter the query on the payment_time column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentTime('fooValue');   // WHERE payment_time = 'fooValue'
     * $query->filterByPaymentTime('%fooValue%'); // WHERE payment_time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentTime The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentTime($paymentTime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentTime)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymentTime)) {
                $paymentTime = str_replace('*', '%', $paymentTime);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_TIME, $paymentTime, $comparison);
    }

    /**
     * Filter the query on the payment_platform column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentPlatform('fooValue');   // WHERE payment_platform = 'fooValue'
     * $query->filterByPaymentPlatform('%fooValue%'); // WHERE payment_platform LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentPlatform The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentPlatform($paymentPlatform = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentPlatform)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymentPlatform)) {
                $paymentPlatform = str_replace('*', '%', $paymentPlatform);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_PLATFORM, $paymentPlatform, $comparison);
    }

    /**
     * Filter the query on the cust_email column
     *
     * Example usage:
     * <code>
     * $query->filterByCustEmail('fooValue');   // WHERE cust_email = 'fooValue'
     * $query->filterByCustEmail('%fooValue%'); // WHERE cust_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByCustEmail($custEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $custEmail)) {
                $custEmail = str_replace('*', '%', $custEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_CUST_EMAIL, $custEmail, $comparison);
    }

    /**
     * Filter the query on the cust_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByCustPhone('fooValue');   // WHERE cust_phone = 'fooValue'
     * $query->filterByCustPhone('%fooValue%'); // WHERE cust_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByCustPhone($custPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $custPhone)) {
                $custPhone = str_replace('*', '%', $custPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_CUST_PHONE, $custPhone, $comparison);
    }

    /**
     * Filter the query on the billing_period column
     *
     * Example usage:
     * <code>
     * $query->filterByBillingPeriod('fooValue');   // WHERE billing_period = 'fooValue'
     * $query->filterByBillingPeriod('%fooValue%'); // WHERE billing_period LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billingPeriod The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByBillingPeriod($billingPeriod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billingPeriod)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billingPeriod)) {
                $billingPeriod = str_replace('*', '%', $billingPeriod);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_BILLING_PERIOD, $billingPeriod, $comparison);
    }

    /**
     * Filter the query on the solid_waste_rate column
     *
     * Example usage:
     * <code>
     * $query->filterBySolidWasteRate(1234); // WHERE solid_waste_rate = 1234
     * $query->filterBySolidWasteRate(array(12, 34)); // WHERE solid_waste_rate IN (12, 34)
     * $query->filterBySolidWasteRate(array('min' => 12)); // WHERE solid_waste_rate > 12
     * </code>
     *
     * @param     mixed $solidWasteRate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterBySolidWasteRate($solidWasteRate = null, $comparison = null)
    {
        if (is_array($solidWasteRate)) {
            $useMinMax = false;
            if (isset($solidWasteRate['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_RATE, $solidWasteRate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($solidWasteRate['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_RATE, $solidWasteRate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_RATE, $solidWasteRate, $comparison);
    }

    /**
     * Filter the query on the solid_waste_vat column
     *
     * Example usage:
     * <code>
     * $query->filterBySolidWasteVat(1234); // WHERE solid_waste_vat = 1234
     * $query->filterBySolidWasteVat(array(12, 34)); // WHERE solid_waste_vat IN (12, 34)
     * $query->filterBySolidWasteVat(array('min' => 12)); // WHERE solid_waste_vat > 12
     * </code>
     *
     * @param     mixed $solidWasteVat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterBySolidWasteVat($solidWasteVat = null, $comparison = null)
    {
        if (is_array($solidWasteVat)) {
            $useMinMax = false;
            if (isset($solidWasteVat['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_VAT, $solidWasteVat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($solidWasteVat['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_VAT, $solidWasteVat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_VAT, $solidWasteVat, $comparison);
    }

    /**
     * Filter the query on the solid_waste_tax column
     *
     * Example usage:
     * <code>
     * $query->filterBySolidWasteTax(1234); // WHERE solid_waste_tax = 1234
     * $query->filterBySolidWasteTax(array(12, 34)); // WHERE solid_waste_tax IN (12, 34)
     * $query->filterBySolidWasteTax(array('min' => 12)); // WHERE solid_waste_tax > 12
     * </code>
     *
     * @param     mixed $solidWasteTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterBySolidWasteTax($solidWasteTax = null, $comparison = null)
    {
        if (is_array($solidWasteTax)) {
            $useMinMax = false;
            if (isset($solidWasteTax['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_TAX, $solidWasteTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($solidWasteTax['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_TAX, $solidWasteTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_SOLID_WASTE_TAX, $solidWasteTax, $comparison);
    }

    /**
     * Filter the query on the liquid_waste_rate column
     *
     * Example usage:
     * <code>
     * $query->filterByLiquidWasteRate(1234); // WHERE liquid_waste_rate = 1234
     * $query->filterByLiquidWasteRate(array(12, 34)); // WHERE liquid_waste_rate IN (12, 34)
     * $query->filterByLiquidWasteRate(array('min' => 12)); // WHERE liquid_waste_rate > 12
     * </code>
     *
     * @param     mixed $liquidWasteRate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByLiquidWasteRate($liquidWasteRate = null, $comparison = null)
    {
        if (is_array($liquidWasteRate)) {
            $useMinMax = false;
            if (isset($liquidWasteRate['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_RATE, $liquidWasteRate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($liquidWasteRate['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_RATE, $liquidWasteRate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_RATE, $liquidWasteRate, $comparison);
    }

    /**
     * Filter the query on the liquid_waste_vat column
     *
     * Example usage:
     * <code>
     * $query->filterByLiquidWasteVat(1234); // WHERE liquid_waste_vat = 1234
     * $query->filterByLiquidWasteVat(array(12, 34)); // WHERE liquid_waste_vat IN (12, 34)
     * $query->filterByLiquidWasteVat(array('min' => 12)); // WHERE liquid_waste_vat > 12
     * </code>
     *
     * @param     mixed $liquidWasteVat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByLiquidWasteVat($liquidWasteVat = null, $comparison = null)
    {
        if (is_array($liquidWasteVat)) {
            $useMinMax = false;
            if (isset($liquidWasteVat['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_VAT, $liquidWasteVat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($liquidWasteVat['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_VAT, $liquidWasteVat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_VAT, $liquidWasteVat, $comparison);
    }

    /**
     * Filter the query on the liquid_waste_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByLiquidWasteTax(1234); // WHERE liquid_waste_tax = 1234
     * $query->filterByLiquidWasteTax(array(12, 34)); // WHERE liquid_waste_tax IN (12, 34)
     * $query->filterByLiquidWasteTax(array('min' => 12)); // WHERE liquid_waste_tax > 12
     * </code>
     *
     * @param     mixed $liquidWasteTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByLiquidWasteTax($liquidWasteTax = null, $comparison = null)
    {
        if (is_array($liquidWasteTax)) {
            $useMinMax = false;
            if (isset($liquidWasteTax['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_TAX, $liquidWasteTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($liquidWasteTax['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_TAX, $liquidWasteTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_LIQUID_WASTE_TAX, $liquidWasteTax, $comparison);
    }

    /**
     * Filter the query on the previous_balance column
     *
     * Example usage:
     * <code>
     * $query->filterByPreviousBalance(1234); // WHERE previous_balance = 1234
     * $query->filterByPreviousBalance(array(12, 34)); // WHERE previous_balance IN (12, 34)
     * $query->filterByPreviousBalance(array('min' => 12)); // WHERE previous_balance > 12
     * </code>
     *
     * @param     mixed $previousBalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByPreviousBalance($previousBalance = null, $comparison = null)
    {
        if (is_array($previousBalance)) {
            $useMinMax = false;
            if (isset($previousBalance['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_PREVIOUS_BALANCE, $previousBalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($previousBalance['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_PREVIOUS_BALANCE, $previousBalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_PREVIOUS_BALANCE, $previousBalance, $comparison);
    }

    /**
     * Filter the query on the payment_received column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentReceived(1234); // WHERE payment_received = 1234
     * $query->filterByPaymentReceived(array(12, 34)); // WHERE payment_received IN (12, 34)
     * $query->filterByPaymentReceived(array('min' => 12)); // WHERE payment_received > 12
     * </code>
     *
     * @param     mixed $paymentReceived The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByPaymentReceived($paymentReceived = null, $comparison = null)
    {
        if (is_array($paymentReceived)) {
            $useMinMax = false;
            if (isset($paymentReceived['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_RECEIVED, $paymentReceived['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentReceived['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_RECEIVED, $paymentReceived['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_PAYMENT_RECEIVED, $paymentReceived, $comparison);
    }

    /**
     * Filter the query on the total_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalAmount(1234); // WHERE total_amount = 1234
     * $query->filterByTotalAmount(array(12, 34)); // WHERE total_amount IN (12, 34)
     * $query->filterByTotalAmount(array('min' => 12)); // WHERE total_amount > 12
     * </code>
     *
     * @param     mixed $totalAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function filterByTotalAmount($totalAmount = null, $comparison = null)
    {
        if (is_array($totalAmount)) {
            $useMinMax = false;
            if (isset($totalAmount['min'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_TOTAL_AMOUNT, $totalAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalAmount['max'])) {
                $this->addUsingAlias(KluOrderTableMap::COL_TOTAL_AMOUNT, $totalAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluOrderTableMap::COL_TOTAL_AMOUNT, $totalAmount, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKluOrder $kluOrder Object to remove from the list of results
     *
     * @return $this|ChildKluOrderQuery The current query, for fluid interface
     */
    public function prune($kluOrder = null)
    {
        if ($kluOrder) {
            $this->addUsingAlias(KluOrderTableMap::COL_ORDERID, $kluOrder->getOrderid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the klu_order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluOrderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KluOrderTableMap::clearInstancePool();
            KluOrderTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(KluOrderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KluOrderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KluOrderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KluOrderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KluOrderQuery
