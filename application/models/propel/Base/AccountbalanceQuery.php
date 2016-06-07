<?php

namespace Base;

use \Accountbalance as ChildAccountbalance;
use \AccountbalanceQuery as ChildAccountbalanceQuery;
use \Exception;
use \PDO;
use Map\AccountbalanceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'accountbalance' table.
 *
 *
 *
 * @method     ChildAccountbalanceQuery orderByAccountId($order = Criteria::ASC) Order by the Account_id column
 * @method     ChildAccountbalanceQuery orderByStartingBalance($order = Criteria::ASC) Order by the Starting_balance column
 * @method     ChildAccountbalanceQuery orderByStartingDate($order = Criteria::ASC) Order by the Starting_date column
 * @method     ChildAccountbalanceQuery orderByLastaccountBalance($order = Criteria::ASC) Order by the Lastaccount_balance column
 * @method     ChildAccountbalanceQuery orderByPaymenttransactionId($order = Criteria::ASC) Order by the paymenttransaction_id column
 * @method     ChildAccountbalanceQuery orderByPaymentAmount($order = Criteria::ASC) Order by the payment_amount column
 * @method     ChildAccountbalanceQuery orderByPaymentDate($order = Criteria::ASC) Order by the payment_date column
 * @method     ChildAccountbalanceQuery orderByCurrentBalance($order = Criteria::ASC) Order by the Current_balance column
 *
 * @method     ChildAccountbalanceQuery groupByAccountId() Group by the Account_id column
 * @method     ChildAccountbalanceQuery groupByStartingBalance() Group by the Starting_balance column
 * @method     ChildAccountbalanceQuery groupByStartingDate() Group by the Starting_date column
 * @method     ChildAccountbalanceQuery groupByLastaccountBalance() Group by the Lastaccount_balance column
 * @method     ChildAccountbalanceQuery groupByPaymenttransactionId() Group by the paymenttransaction_id column
 * @method     ChildAccountbalanceQuery groupByPaymentAmount() Group by the payment_amount column
 * @method     ChildAccountbalanceQuery groupByPaymentDate() Group by the payment_date column
 * @method     ChildAccountbalanceQuery groupByCurrentBalance() Group by the Current_balance column
 *
 * @method     ChildAccountbalanceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAccountbalanceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAccountbalanceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAccountbalanceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAccountbalanceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAccountbalanceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAccountbalance findOne(ConnectionInterface $con = null) Return the first ChildAccountbalance matching the query
 * @method     ChildAccountbalance findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAccountbalance matching the query, or a new ChildAccountbalance object populated from the query conditions when no match is found
 *
 * @method     ChildAccountbalance findOneByAccountId(string $Account_id) Return the first ChildAccountbalance filtered by the Account_id column
 * @method     ChildAccountbalance findOneByStartingBalance(string $Starting_balance) Return the first ChildAccountbalance filtered by the Starting_balance column
 * @method     ChildAccountbalance findOneByStartingDate(string $Starting_date) Return the first ChildAccountbalance filtered by the Starting_date column
 * @method     ChildAccountbalance findOneByLastaccountBalance(string $Lastaccount_balance) Return the first ChildAccountbalance filtered by the Lastaccount_balance column
 * @method     ChildAccountbalance findOneByPaymenttransactionId(string $paymenttransaction_id) Return the first ChildAccountbalance filtered by the paymenttransaction_id column
 * @method     ChildAccountbalance findOneByPaymentAmount(int $payment_amount) Return the first ChildAccountbalance filtered by the payment_amount column
 * @method     ChildAccountbalance findOneByPaymentDate(string $payment_date) Return the first ChildAccountbalance filtered by the payment_date column
 * @method     ChildAccountbalance findOneByCurrentBalance(string $Current_balance) Return the first ChildAccountbalance filtered by the Current_balance column *

 * @method     ChildAccountbalance requirePk($key, ConnectionInterface $con = null) Return the ChildAccountbalance by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccountbalance requireOne(ConnectionInterface $con = null) Return the first ChildAccountbalance matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAccountbalance requireOneByAccountId(string $Account_id) Return the first ChildAccountbalance filtered by the Account_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccountbalance requireOneByStartingBalance(string $Starting_balance) Return the first ChildAccountbalance filtered by the Starting_balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccountbalance requireOneByStartingDate(string $Starting_date) Return the first ChildAccountbalance filtered by the Starting_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccountbalance requireOneByLastaccountBalance(string $Lastaccount_balance) Return the first ChildAccountbalance filtered by the Lastaccount_balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccountbalance requireOneByPaymenttransactionId(string $paymenttransaction_id) Return the first ChildAccountbalance filtered by the paymenttransaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccountbalance requireOneByPaymentAmount(int $payment_amount) Return the first ChildAccountbalance filtered by the payment_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccountbalance requireOneByPaymentDate(string $payment_date) Return the first ChildAccountbalance filtered by the payment_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccountbalance requireOneByCurrentBalance(string $Current_balance) Return the first ChildAccountbalance filtered by the Current_balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAccountbalance[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAccountbalance objects based on current ModelCriteria
 * @method     ChildAccountbalance[]|ObjectCollection findByAccountId(string $Account_id) Return ChildAccountbalance objects filtered by the Account_id column
 * @method     ChildAccountbalance[]|ObjectCollection findByStartingBalance(string $Starting_balance) Return ChildAccountbalance objects filtered by the Starting_balance column
 * @method     ChildAccountbalance[]|ObjectCollection findByStartingDate(string $Starting_date) Return ChildAccountbalance objects filtered by the Starting_date column
 * @method     ChildAccountbalance[]|ObjectCollection findByLastaccountBalance(string $Lastaccount_balance) Return ChildAccountbalance objects filtered by the Lastaccount_balance column
 * @method     ChildAccountbalance[]|ObjectCollection findByPaymenttransactionId(string $paymenttransaction_id) Return ChildAccountbalance objects filtered by the paymenttransaction_id column
 * @method     ChildAccountbalance[]|ObjectCollection findByPaymentAmount(int $payment_amount) Return ChildAccountbalance objects filtered by the payment_amount column
 * @method     ChildAccountbalance[]|ObjectCollection findByPaymentDate(string $payment_date) Return ChildAccountbalance objects filtered by the payment_date column
 * @method     ChildAccountbalance[]|ObjectCollection findByCurrentBalance(string $Current_balance) Return ChildAccountbalance objects filtered by the Current_balance column
 * @method     ChildAccountbalance[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AccountbalanceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AccountbalanceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Accountbalance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAccountbalanceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAccountbalanceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAccountbalanceQuery) {
            return $criteria;
        }
        $query = new ChildAccountbalanceQuery();
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
     * @return ChildAccountbalance|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AccountbalanceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AccountbalanceTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAccountbalance A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Account_id, Starting_balance, Starting_date, Lastaccount_balance, paymenttransaction_id, payment_amount, payment_date, Current_balance FROM accountbalance WHERE Account_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildAccountbalance $obj */
            $obj = new ChildAccountbalance();
            $obj->hydrate($row);
            AccountbalanceTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAccountbalance|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AccountbalanceTableMap::COL_ACCOUNT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AccountbalanceTableMap::COL_ACCOUNT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Account_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAccountId('fooValue');   // WHERE Account_id = 'fooValue'
     * $query->filterByAccountId('%fooValue%'); // WHERE Account_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accountId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByAccountId($accountId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accountId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $accountId)) {
                $accountId = str_replace('*', '%', $accountId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AccountbalanceTableMap::COL_ACCOUNT_ID, $accountId, $comparison);
    }

    /**
     * Filter the query on the Starting_balance column
     *
     * Example usage:
     * <code>
     * $query->filterByStartingBalance(1234); // WHERE Starting_balance = 1234
     * $query->filterByStartingBalance(array(12, 34)); // WHERE Starting_balance IN (12, 34)
     * $query->filterByStartingBalance(array('min' => 12)); // WHERE Starting_balance > 12
     * </code>
     *
     * @param     mixed $startingBalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByStartingBalance($startingBalance = null, $comparison = null)
    {
        if (is_array($startingBalance)) {
            $useMinMax = false;
            if (isset($startingBalance['min'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_STARTING_BALANCE, $startingBalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startingBalance['max'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_STARTING_BALANCE, $startingBalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountbalanceTableMap::COL_STARTING_BALANCE, $startingBalance, $comparison);
    }

    /**
     * Filter the query on the Starting_date column
     *
     * Example usage:
     * <code>
     * $query->filterByStartingDate('2011-03-14'); // WHERE Starting_date = '2011-03-14'
     * $query->filterByStartingDate('now'); // WHERE Starting_date = '2011-03-14'
     * $query->filterByStartingDate(array('max' => 'yesterday')); // WHERE Starting_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $startingDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByStartingDate($startingDate = null, $comparison = null)
    {
        if (is_array($startingDate)) {
            $useMinMax = false;
            if (isset($startingDate['min'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_STARTING_DATE, $startingDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startingDate['max'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_STARTING_DATE, $startingDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountbalanceTableMap::COL_STARTING_DATE, $startingDate, $comparison);
    }

    /**
     * Filter the query on the Lastaccount_balance column
     *
     * Example usage:
     * <code>
     * $query->filterByLastaccountBalance(1234); // WHERE Lastaccount_balance = 1234
     * $query->filterByLastaccountBalance(array(12, 34)); // WHERE Lastaccount_balance IN (12, 34)
     * $query->filterByLastaccountBalance(array('min' => 12)); // WHERE Lastaccount_balance > 12
     * </code>
     *
     * @param     mixed $lastaccountBalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByLastaccountBalance($lastaccountBalance = null, $comparison = null)
    {
        if (is_array($lastaccountBalance)) {
            $useMinMax = false;
            if (isset($lastaccountBalance['min'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_LASTACCOUNT_BALANCE, $lastaccountBalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastaccountBalance['max'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_LASTACCOUNT_BALANCE, $lastaccountBalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountbalanceTableMap::COL_LASTACCOUNT_BALANCE, $lastaccountBalance, $comparison);
    }

    /**
     * Filter the query on the paymenttransaction_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymenttransactionId('fooValue');   // WHERE paymenttransaction_id = 'fooValue'
     * $query->filterByPaymenttransactionId('%fooValue%'); // WHERE paymenttransaction_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymenttransactionId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByPaymenttransactionId($paymenttransactionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymenttransactionId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymenttransactionId)) {
                $paymenttransactionId = str_replace('*', '%', $paymenttransactionId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AccountbalanceTableMap::COL_PAYMENTTRANSACTION_ID, $paymenttransactionId, $comparison);
    }

    /**
     * Filter the query on the payment_amount column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentAmount(1234); // WHERE payment_amount = 1234
     * $query->filterByPaymentAmount(array(12, 34)); // WHERE payment_amount IN (12, 34)
     * $query->filterByPaymentAmount(array('min' => 12)); // WHERE payment_amount > 12
     * </code>
     *
     * @param     mixed $paymentAmount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByPaymentAmount($paymentAmount = null, $comparison = null)
    {
        if (is_array($paymentAmount)) {
            $useMinMax = false;
            if (isset($paymentAmount['min'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_PAYMENT_AMOUNT, $paymentAmount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentAmount['max'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_PAYMENT_AMOUNT, $paymentAmount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountbalanceTableMap::COL_PAYMENT_AMOUNT, $paymentAmount, $comparison);
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
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByPaymentDate($paymentDate = null, $comparison = null)
    {
        if (is_array($paymentDate)) {
            $useMinMax = false;
            if (isset($paymentDate['min'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_PAYMENT_DATE, $paymentDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentDate['max'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_PAYMENT_DATE, $paymentDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountbalanceTableMap::COL_PAYMENT_DATE, $paymentDate, $comparison);
    }

    /**
     * Filter the query on the Current_balance column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentBalance(1234); // WHERE Current_balance = 1234
     * $query->filterByCurrentBalance(array(12, 34)); // WHERE Current_balance IN (12, 34)
     * $query->filterByCurrentBalance(array('min' => 12)); // WHERE Current_balance > 12
     * </code>
     *
     * @param     mixed $currentBalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function filterByCurrentBalance($currentBalance = null, $comparison = null)
    {
        if (is_array($currentBalance)) {
            $useMinMax = false;
            if (isset($currentBalance['min'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_CURRENT_BALANCE, $currentBalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentBalance['max'])) {
                $this->addUsingAlias(AccountbalanceTableMap::COL_CURRENT_BALANCE, $currentBalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountbalanceTableMap::COL_CURRENT_BALANCE, $currentBalance, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAccountbalance $accountbalance Object to remove from the list of results
     *
     * @return $this|ChildAccountbalanceQuery The current query, for fluid interface
     */
    public function prune($accountbalance = null)
    {
        if ($accountbalance) {
            $this->addUsingAlias(AccountbalanceTableMap::COL_ACCOUNT_ID, $accountbalance->getAccountId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the accountbalance table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AccountbalanceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AccountbalanceTableMap::clearInstancePool();
            AccountbalanceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AccountbalanceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AccountbalanceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AccountbalanceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AccountbalanceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AccountbalanceQuery
