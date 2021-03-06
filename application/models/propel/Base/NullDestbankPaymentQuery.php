<?php

namespace Base;

use \NullDestbankPayment as ChildNullDestbankPayment;
use \NullDestbankPaymentQuery as ChildNullDestbankPaymentQuery;
use \Exception;
use \PDO;
use Map\NullDestbankPaymentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'null_destbank_payment' table.
 *
 *
 *
 * @method     ChildNullDestbankPaymentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildNullDestbankPaymentQuery orderByAccountNo($order = Criteria::ASC) Order by the account_no column
 * @method     ChildNullDestbankPaymentQuery orderByBillreferencenumber($order = Criteria::ASC) Order by the BillReferenceNumber column
 * @method     ChildNullDestbankPaymentQuery orderByTransactionid($order = Criteria::ASC) Order by the TransactionID column
 * @method     ChildNullDestbankPaymentQuery orderBySourcebank($order = Criteria::ASC) Order by the SourceBank column
 * @method     ChildNullDestbankPaymentQuery orderByDestinationbank($order = Criteria::ASC) Order by the DestinationBank column
 * @method     ChildNullDestbankPaymentQuery orderByBuildingtype($order = Criteria::ASC) Order by the BuildingType column
 * @method     ChildNullDestbankPaymentQuery orderByCustomername($order = Criteria::ASC) Order by the CustomerName column
 * @method     ChildNullDestbankPaymentQuery orderByDistrict($order = Criteria::ASC) Order by the District column
 * @method     ChildNullDestbankPaymentQuery orderByEmail($order = Criteria::ASC) Order by the Email column
 * @method     ChildNullDestbankPaymentQuery orderByPhone($order = Criteria::ASC) Order by the Phone column
 * @method     ChildNullDestbankPaymentQuery orderByOutstandingbalance($order = Criteria::ASC) Order by the OutstandingBalance column
 * @method     ChildNullDestbankPaymentQuery orderByTransactiondate($order = Criteria::ASC) Order by the TransactionDate column
 * @method     ChildNullDestbankPaymentQuery orderByDateInitiated($order = Criteria::ASC) Order by the date_initiated column
 * @method     ChildNullDestbankPaymentQuery orderByDateCompleted($order = Criteria::ASC) Order by the date_completed column
 * @method     ChildNullDestbankPaymentQuery orderByAmountPaid($order = Criteria::ASC) Order by the amount_paid column
 * @method     ChildNullDestbankPaymentQuery orderByAmountdue($order = Criteria::ASC) Order by the AmountDue column
 * @method     ChildNullDestbankPaymentQuery orderByPlatform($order = Criteria::ASC) Order by the platform column
 * @method     ChildNullDestbankPaymentQuery orderByReceiptNo($order = Criteria::ASC) Order by the receipt_no column
 * @method     ChildNullDestbankPaymentQuery orderByServiceaddress($order = Criteria::ASC) Order by the ServiceAddress column
 * @method     ChildNullDestbankPaymentQuery orderByUsagetype($order = Criteria::ASC) Order by the UsageType column
 * @method     ChildNullDestbankPaymentQuery orderByNullDestbankPaymentStatus($order = Criteria::ASC) Order by the null_destBank_payment_status column
 * @method     ChildNullDestbankPaymentQuery orderByReconcileStatus($order = Criteria::ASC) Order by the reconcile_status column
 * @method     ChildNullDestbankPaymentQuery orderByCreatedDate($order = Criteria::ASC) Order by the created_date column
 * @method     ChildNullDestbankPaymentQuery orderByUploadstatus($order = Criteria::ASC) Order by the uploadstatus column
 *
 * @method     ChildNullDestbankPaymentQuery groupById() Group by the id column
 * @method     ChildNullDestbankPaymentQuery groupByAccountNo() Group by the account_no column
 * @method     ChildNullDestbankPaymentQuery groupByBillreferencenumber() Group by the BillReferenceNumber column
 * @method     ChildNullDestbankPaymentQuery groupByTransactionid() Group by the TransactionID column
 * @method     ChildNullDestbankPaymentQuery groupBySourcebank() Group by the SourceBank column
 * @method     ChildNullDestbankPaymentQuery groupByDestinationbank() Group by the DestinationBank column
 * @method     ChildNullDestbankPaymentQuery groupByBuildingtype() Group by the BuildingType column
 * @method     ChildNullDestbankPaymentQuery groupByCustomername() Group by the CustomerName column
 * @method     ChildNullDestbankPaymentQuery groupByDistrict() Group by the District column
 * @method     ChildNullDestbankPaymentQuery groupByEmail() Group by the Email column
 * @method     ChildNullDestbankPaymentQuery groupByPhone() Group by the Phone column
 * @method     ChildNullDestbankPaymentQuery groupByOutstandingbalance() Group by the OutstandingBalance column
 * @method     ChildNullDestbankPaymentQuery groupByTransactiondate() Group by the TransactionDate column
 * @method     ChildNullDestbankPaymentQuery groupByDateInitiated() Group by the date_initiated column
 * @method     ChildNullDestbankPaymentQuery groupByDateCompleted() Group by the date_completed column
 * @method     ChildNullDestbankPaymentQuery groupByAmountPaid() Group by the amount_paid column
 * @method     ChildNullDestbankPaymentQuery groupByAmountdue() Group by the AmountDue column
 * @method     ChildNullDestbankPaymentQuery groupByPlatform() Group by the platform column
 * @method     ChildNullDestbankPaymentQuery groupByReceiptNo() Group by the receipt_no column
 * @method     ChildNullDestbankPaymentQuery groupByServiceaddress() Group by the ServiceAddress column
 * @method     ChildNullDestbankPaymentQuery groupByUsagetype() Group by the UsageType column
 * @method     ChildNullDestbankPaymentQuery groupByNullDestbankPaymentStatus() Group by the null_destBank_payment_status column
 * @method     ChildNullDestbankPaymentQuery groupByReconcileStatus() Group by the reconcile_status column
 * @method     ChildNullDestbankPaymentQuery groupByCreatedDate() Group by the created_date column
 * @method     ChildNullDestbankPaymentQuery groupByUploadstatus() Group by the uploadstatus column
 *
 * @method     ChildNullDestbankPaymentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNullDestbankPaymentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNullDestbankPaymentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNullDestbankPaymentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNullDestbankPaymentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNullDestbankPaymentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNullDestbankPayment findOne(ConnectionInterface $con = null) Return the first ChildNullDestbankPayment matching the query
 * @method     ChildNullDestbankPayment findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNullDestbankPayment matching the query, or a new ChildNullDestbankPayment object populated from the query conditions when no match is found
 *
 * @method     ChildNullDestbankPayment findOneById(int $id) Return the first ChildNullDestbankPayment filtered by the id column
 * @method     ChildNullDestbankPayment findOneByAccountNo(string $account_no) Return the first ChildNullDestbankPayment filtered by the account_no column
 * @method     ChildNullDestbankPayment findOneByBillreferencenumber(string $BillReferenceNumber) Return the first ChildNullDestbankPayment filtered by the BillReferenceNumber column
 * @method     ChildNullDestbankPayment findOneByTransactionid(string $TransactionID) Return the first ChildNullDestbankPayment filtered by the TransactionID column
 * @method     ChildNullDestbankPayment findOneBySourcebank(string $SourceBank) Return the first ChildNullDestbankPayment filtered by the SourceBank column
 * @method     ChildNullDestbankPayment findOneByDestinationbank(string $DestinationBank) Return the first ChildNullDestbankPayment filtered by the DestinationBank column
 * @method     ChildNullDestbankPayment findOneByBuildingtype(string $BuildingType) Return the first ChildNullDestbankPayment filtered by the BuildingType column
 * @method     ChildNullDestbankPayment findOneByCustomername(string $CustomerName) Return the first ChildNullDestbankPayment filtered by the CustomerName column
 * @method     ChildNullDestbankPayment findOneByDistrict(string $District) Return the first ChildNullDestbankPayment filtered by the District column
 * @method     ChildNullDestbankPayment findOneByEmail(string $Email) Return the first ChildNullDestbankPayment filtered by the Email column
 * @method     ChildNullDestbankPayment findOneByPhone(string $Phone) Return the first ChildNullDestbankPayment filtered by the Phone column
 * @method     ChildNullDestbankPayment findOneByOutstandingbalance(string $OutstandingBalance) Return the first ChildNullDestbankPayment filtered by the OutstandingBalance column
 * @method     ChildNullDestbankPayment findOneByTransactiondate(string $TransactionDate) Return the first ChildNullDestbankPayment filtered by the TransactionDate column
 * @method     ChildNullDestbankPayment findOneByDateInitiated(string $date_initiated) Return the first ChildNullDestbankPayment filtered by the date_initiated column
 * @method     ChildNullDestbankPayment findOneByDateCompleted(string $date_completed) Return the first ChildNullDestbankPayment filtered by the date_completed column
 * @method     ChildNullDestbankPayment findOneByAmountPaid(string $amount_paid) Return the first ChildNullDestbankPayment filtered by the amount_paid column
 * @method     ChildNullDestbankPayment findOneByAmountdue(string $AmountDue) Return the first ChildNullDestbankPayment filtered by the AmountDue column
 * @method     ChildNullDestbankPayment findOneByPlatform(string $platform) Return the first ChildNullDestbankPayment filtered by the platform column
 * @method     ChildNullDestbankPayment findOneByReceiptNo(string $receipt_no) Return the first ChildNullDestbankPayment filtered by the receipt_no column
 * @method     ChildNullDestbankPayment findOneByServiceaddress(string $ServiceAddress) Return the first ChildNullDestbankPayment filtered by the ServiceAddress column
 * @method     ChildNullDestbankPayment findOneByUsagetype(string $UsageType) Return the first ChildNullDestbankPayment filtered by the UsageType column
 * @method     ChildNullDestbankPayment findOneByNullDestbankPaymentStatus(string $null_destBank_payment_status) Return the first ChildNullDestbankPayment filtered by the null_destBank_payment_status column
 * @method     ChildNullDestbankPayment findOneByReconcileStatus(boolean $reconcile_status) Return the first ChildNullDestbankPayment filtered by the reconcile_status column
 * @method     ChildNullDestbankPayment findOneByCreatedDate(string $created_date) Return the first ChildNullDestbankPayment filtered by the created_date column
 * @method     ChildNullDestbankPayment findOneByUploadstatus(int $uploadstatus) Return the first ChildNullDestbankPayment filtered by the uploadstatus column *

 * @method     ChildNullDestbankPayment requirePk($key, ConnectionInterface $con = null) Return the ChildNullDestbankPayment by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOne(ConnectionInterface $con = null) Return the first ChildNullDestbankPayment matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNullDestbankPayment requireOneById(int $id) Return the first ChildNullDestbankPayment filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByAccountNo(string $account_no) Return the first ChildNullDestbankPayment filtered by the account_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByBillreferencenumber(string $BillReferenceNumber) Return the first ChildNullDestbankPayment filtered by the BillReferenceNumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByTransactionid(string $TransactionID) Return the first ChildNullDestbankPayment filtered by the TransactionID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneBySourcebank(string $SourceBank) Return the first ChildNullDestbankPayment filtered by the SourceBank column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByDestinationbank(string $DestinationBank) Return the first ChildNullDestbankPayment filtered by the DestinationBank column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByBuildingtype(string $BuildingType) Return the first ChildNullDestbankPayment filtered by the BuildingType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByCustomername(string $CustomerName) Return the first ChildNullDestbankPayment filtered by the CustomerName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByDistrict(string $District) Return the first ChildNullDestbankPayment filtered by the District column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByEmail(string $Email) Return the first ChildNullDestbankPayment filtered by the Email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByPhone(string $Phone) Return the first ChildNullDestbankPayment filtered by the Phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByOutstandingbalance(string $OutstandingBalance) Return the first ChildNullDestbankPayment filtered by the OutstandingBalance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByTransactiondate(string $TransactionDate) Return the first ChildNullDestbankPayment filtered by the TransactionDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByDateInitiated(string $date_initiated) Return the first ChildNullDestbankPayment filtered by the date_initiated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByDateCompleted(string $date_completed) Return the first ChildNullDestbankPayment filtered by the date_completed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByAmountPaid(string $amount_paid) Return the first ChildNullDestbankPayment filtered by the amount_paid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByAmountdue(string $AmountDue) Return the first ChildNullDestbankPayment filtered by the AmountDue column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByPlatform(string $platform) Return the first ChildNullDestbankPayment filtered by the platform column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByReceiptNo(string $receipt_no) Return the first ChildNullDestbankPayment filtered by the receipt_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByServiceaddress(string $ServiceAddress) Return the first ChildNullDestbankPayment filtered by the ServiceAddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByUsagetype(string $UsageType) Return the first ChildNullDestbankPayment filtered by the UsageType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByNullDestbankPaymentStatus(string $null_destBank_payment_status) Return the first ChildNullDestbankPayment filtered by the null_destBank_payment_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByReconcileStatus(boolean $reconcile_status) Return the first ChildNullDestbankPayment filtered by the reconcile_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByCreatedDate(string $created_date) Return the first ChildNullDestbankPayment filtered by the created_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNullDestbankPayment requireOneByUploadstatus(int $uploadstatus) Return the first ChildNullDestbankPayment filtered by the uploadstatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNullDestbankPayment[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNullDestbankPayment objects based on current ModelCriteria
 * @method     ChildNullDestbankPayment[]|ObjectCollection findById(int $id) Return ChildNullDestbankPayment objects filtered by the id column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByAccountNo(string $account_no) Return ChildNullDestbankPayment objects filtered by the account_no column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByBillreferencenumber(string $BillReferenceNumber) Return ChildNullDestbankPayment objects filtered by the BillReferenceNumber column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByTransactionid(string $TransactionID) Return ChildNullDestbankPayment objects filtered by the TransactionID column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findBySourcebank(string $SourceBank) Return ChildNullDestbankPayment objects filtered by the SourceBank column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByDestinationbank(string $DestinationBank) Return ChildNullDestbankPayment objects filtered by the DestinationBank column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByBuildingtype(string $BuildingType) Return ChildNullDestbankPayment objects filtered by the BuildingType column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByCustomername(string $CustomerName) Return ChildNullDestbankPayment objects filtered by the CustomerName column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByDistrict(string $District) Return ChildNullDestbankPayment objects filtered by the District column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByEmail(string $Email) Return ChildNullDestbankPayment objects filtered by the Email column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByPhone(string $Phone) Return ChildNullDestbankPayment objects filtered by the Phone column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByOutstandingbalance(string $OutstandingBalance) Return ChildNullDestbankPayment objects filtered by the OutstandingBalance column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByTransactiondate(string $TransactionDate) Return ChildNullDestbankPayment objects filtered by the TransactionDate column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByDateInitiated(string $date_initiated) Return ChildNullDestbankPayment objects filtered by the date_initiated column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByDateCompleted(string $date_completed) Return ChildNullDestbankPayment objects filtered by the date_completed column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByAmountPaid(string $amount_paid) Return ChildNullDestbankPayment objects filtered by the amount_paid column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByAmountdue(string $AmountDue) Return ChildNullDestbankPayment objects filtered by the AmountDue column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByPlatform(string $platform) Return ChildNullDestbankPayment objects filtered by the platform column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByReceiptNo(string $receipt_no) Return ChildNullDestbankPayment objects filtered by the receipt_no column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByServiceaddress(string $ServiceAddress) Return ChildNullDestbankPayment objects filtered by the ServiceAddress column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByUsagetype(string $UsageType) Return ChildNullDestbankPayment objects filtered by the UsageType column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByNullDestbankPaymentStatus(string $null_destBank_payment_status) Return ChildNullDestbankPayment objects filtered by the null_destBank_payment_status column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByReconcileStatus(boolean $reconcile_status) Return ChildNullDestbankPayment objects filtered by the reconcile_status column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByCreatedDate(string $created_date) Return ChildNullDestbankPayment objects filtered by the created_date column
 * @method     ChildNullDestbankPayment[]|ObjectCollection findByUploadstatus(int $uploadstatus) Return ChildNullDestbankPayment objects filtered by the uploadstatus column
 * @method     ChildNullDestbankPayment[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NullDestbankPaymentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\NullDestbankPaymentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\NullDestbankPayment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNullDestbankPaymentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNullDestbankPaymentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNullDestbankPaymentQuery) {
            return $criteria;
        }
        $query = new ChildNullDestbankPaymentQuery();
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
     * @return ChildNullDestbankPayment|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NullDestbankPaymentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NullDestbankPaymentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildNullDestbankPayment A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, account_no, BillReferenceNumber, TransactionID, SourceBank, DestinationBank, BuildingType, CustomerName, District, Email, Phone, OutstandingBalance, TransactionDate, date_initiated, date_completed, amount_paid, AmountDue, platform, receipt_no, ServiceAddress, UsageType, null_destBank_payment_status, reconcile_status, created_date, uploadstatus FROM null_destbank_payment WHERE id = :p0';
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
            /** @var ChildNullDestbankPayment $obj */
            $obj = new ChildNullDestbankPayment();
            $obj->hydrate($row);
            NullDestbankPaymentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildNullDestbankPayment|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_ACCOUNT_NO, $accountNo, $comparison);
    }

    /**
     * Filter the query on the BillReferenceNumber column
     *
     * Example usage:
     * <code>
     * $query->filterByBillreferencenumber('fooValue');   // WHERE BillReferenceNumber = 'fooValue'
     * $query->filterByBillreferencenumber('%fooValue%'); // WHERE BillReferenceNumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billreferencenumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByBillreferencenumber($billreferencenumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billreferencenumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billreferencenumber)) {
                $billreferencenumber = str_replace('*', '%', $billreferencenumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_BILLREFERENCENUMBER, $billreferencenumber, $comparison);
    }

    /**
     * Filter the query on the TransactionID column
     *
     * Example usage:
     * <code>
     * $query->filterByTransactionid('fooValue');   // WHERE TransactionID = 'fooValue'
     * $query->filterByTransactionid('%fooValue%'); // WHERE TransactionID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transactionid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByTransactionid($transactionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transactionid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $transactionid)) {
                $transactionid = str_replace('*', '%', $transactionid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_TRANSACTIONID, $transactionid, $comparison);
    }

    /**
     * Filter the query on the SourceBank column
     *
     * Example usage:
     * <code>
     * $query->filterBySourcebank('fooValue');   // WHERE SourceBank = 'fooValue'
     * $query->filterBySourcebank('%fooValue%'); // WHERE SourceBank LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sourcebank The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterBySourcebank($sourcebank = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sourcebank)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sourcebank)) {
                $sourcebank = str_replace('*', '%', $sourcebank);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_SOURCEBANK, $sourcebank, $comparison);
    }

    /**
     * Filter the query on the DestinationBank column
     *
     * Example usage:
     * <code>
     * $query->filterByDestinationbank('fooValue');   // WHERE DestinationBank = 'fooValue'
     * $query->filterByDestinationbank('%fooValue%'); // WHERE DestinationBank LIKE '%fooValue%'
     * </code>
     *
     * @param     string $destinationbank The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByDestinationbank($destinationbank = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($destinationbank)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $destinationbank)) {
                $destinationbank = str_replace('*', '%', $destinationbank);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_DESTINATIONBANK, $destinationbank, $comparison);
    }

    /**
     * Filter the query on the BuildingType column
     *
     * Example usage:
     * <code>
     * $query->filterByBuildingtype('fooValue');   // WHERE BuildingType = 'fooValue'
     * $query->filterByBuildingtype('%fooValue%'); // WHERE BuildingType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $buildingtype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByBuildingtype($buildingtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($buildingtype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $buildingtype)) {
                $buildingtype = str_replace('*', '%', $buildingtype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_BUILDINGTYPE, $buildingtype, $comparison);
    }

    /**
     * Filter the query on the CustomerName column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomername('fooValue');   // WHERE CustomerName = 'fooValue'
     * $query->filterByCustomername('%fooValue%'); // WHERE CustomerName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customername The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByCustomername($customername = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customername)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $customername)) {
                $customername = str_replace('*', '%', $customername);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_CUSTOMERNAME, $customername, $comparison);
    }

    /**
     * Filter the query on the District column
     *
     * Example usage:
     * <code>
     * $query->filterByDistrict('fooValue');   // WHERE District = 'fooValue'
     * $query->filterByDistrict('%fooValue%'); // WHERE District LIKE '%fooValue%'
     * </code>
     *
     * @param     string $district The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_DISTRICT, $district, $comparison);
    }

    /**
     * Filter the query on the Email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE Email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE Email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the Phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE Phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE Phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the OutstandingBalance column
     *
     * Example usage:
     * <code>
     * $query->filterByOutstandingbalance(1234); // WHERE OutstandingBalance = 1234
     * $query->filterByOutstandingbalance(array(12, 34)); // WHERE OutstandingBalance IN (12, 34)
     * $query->filterByOutstandingbalance(array('min' => 12)); // WHERE OutstandingBalance > 12
     * </code>
     *
     * @param     mixed $outstandingbalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByOutstandingbalance($outstandingbalance = null, $comparison = null)
    {
        if (is_array($outstandingbalance)) {
            $useMinMax = false;
            if (isset($outstandingbalance['min'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_OUTSTANDINGBALANCE, $outstandingbalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outstandingbalance['max'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_OUTSTANDINGBALANCE, $outstandingbalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_OUTSTANDINGBALANCE, $outstandingbalance, $comparison);
    }

    /**
     * Filter the query on the TransactionDate column
     *
     * Example usage:
     * <code>
     * $query->filterByTransactiondate('2011-03-14'); // WHERE TransactionDate = '2011-03-14'
     * $query->filterByTransactiondate('now'); // WHERE TransactionDate = '2011-03-14'
     * $query->filterByTransactiondate(array('max' => 'yesterday')); // WHERE TransactionDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $transactiondate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByTransactiondate($transactiondate = null, $comparison = null)
    {
        if (is_array($transactiondate)) {
            $useMinMax = false;
            if (isset($transactiondate['min'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_TRANSACTIONDATE, $transactiondate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transactiondate['max'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_TRANSACTIONDATE, $transactiondate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_TRANSACTIONDATE, $transactiondate, $comparison);
    }

    /**
     * Filter the query on the date_initiated column
     *
     * Example usage:
     * <code>
     * $query->filterByDateInitiated('fooValue');   // WHERE date_initiated = 'fooValue'
     * $query->filterByDateInitiated('%fooValue%'); // WHERE date_initiated LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateInitiated The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByDateInitiated($dateInitiated = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateInitiated)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dateInitiated)) {
                $dateInitiated = str_replace('*', '%', $dateInitiated);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_DATE_INITIATED, $dateInitiated, $comparison);
    }

    /**
     * Filter the query on the date_completed column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCompleted('fooValue');   // WHERE date_completed = 'fooValue'
     * $query->filterByDateCompleted('%fooValue%'); // WHERE date_completed LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateCompleted The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByDateCompleted($dateCompleted = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateCompleted)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dateCompleted)) {
                $dateCompleted = str_replace('*', '%', $dateCompleted);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_DATE_COMPLETED, $dateCompleted, $comparison);
    }

    /**
     * Filter the query on the amount_paid column
     *
     * Example usage:
     * <code>
     * $query->filterByAmountPaid(1234); // WHERE amount_paid = 1234
     * $query->filterByAmountPaid(array(12, 34)); // WHERE amount_paid IN (12, 34)
     * $query->filterByAmountPaid(array('min' => 12)); // WHERE amount_paid > 12
     * </code>
     *
     * @param     mixed $amountPaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByAmountPaid($amountPaid = null, $comparison = null)
    {
        if (is_array($amountPaid)) {
            $useMinMax = false;
            if (isset($amountPaid['min'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_AMOUNT_PAID, $amountPaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amountPaid['max'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_AMOUNT_PAID, $amountPaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_AMOUNT_PAID, $amountPaid, $comparison);
    }

    /**
     * Filter the query on the AmountDue column
     *
     * Example usage:
     * <code>
     * $query->filterByAmountdue(1234); // WHERE AmountDue = 1234
     * $query->filterByAmountdue(array(12, 34)); // WHERE AmountDue IN (12, 34)
     * $query->filterByAmountdue(array('min' => 12)); // WHERE AmountDue > 12
     * </code>
     *
     * @param     mixed $amountdue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByAmountdue($amountdue = null, $comparison = null)
    {
        if (is_array($amountdue)) {
            $useMinMax = false;
            if (isset($amountdue['min'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_AMOUNTDUE, $amountdue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amountdue['max'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_AMOUNTDUE, $amountdue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_AMOUNTDUE, $amountdue, $comparison);
    }

    /**
     * Filter the query on the platform column
     *
     * Example usage:
     * <code>
     * $query->filterByPlatform('fooValue');   // WHERE platform = 'fooValue'
     * $query->filterByPlatform('%fooValue%'); // WHERE platform LIKE '%fooValue%'
     * </code>
     *
     * @param     string $platform The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByPlatform($platform = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($platform)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $platform)) {
                $platform = str_replace('*', '%', $platform);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_PLATFORM, $platform, $comparison);
    }

    /**
     * Filter the query on the receipt_no column
     *
     * Example usage:
     * <code>
     * $query->filterByReceiptNo('fooValue');   // WHERE receipt_no = 'fooValue'
     * $query->filterByReceiptNo('%fooValue%'); // WHERE receipt_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $receiptNo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByReceiptNo($receiptNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($receiptNo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $receiptNo)) {
                $receiptNo = str_replace('*', '%', $receiptNo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_RECEIPT_NO, $receiptNo, $comparison);
    }

    /**
     * Filter the query on the ServiceAddress column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceaddress('fooValue');   // WHERE ServiceAddress = 'fooValue'
     * $query->filterByServiceaddress('%fooValue%'); // WHERE ServiceAddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serviceaddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByServiceaddress($serviceaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serviceaddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serviceaddress)) {
                $serviceaddress = str_replace('*', '%', $serviceaddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_SERVICEADDRESS, $serviceaddress, $comparison);
    }

    /**
     * Filter the query on the UsageType column
     *
     * Example usage:
     * <code>
     * $query->filterByUsagetype('fooValue');   // WHERE UsageType = 'fooValue'
     * $query->filterByUsagetype('%fooValue%'); // WHERE UsageType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usagetype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByUsagetype($usagetype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usagetype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $usagetype)) {
                $usagetype = str_replace('*', '%', $usagetype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_USAGETYPE, $usagetype, $comparison);
    }

    /**
     * Filter the query on the null_destBank_payment_status column
     *
     * Example usage:
     * <code>
     * $query->filterByNullDestbankPaymentStatus('fooValue');   // WHERE null_destBank_payment_status = 'fooValue'
     * $query->filterByNullDestbankPaymentStatus('%fooValue%'); // WHERE null_destBank_payment_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nullDestbankPaymentStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByNullDestbankPaymentStatus($nullDestbankPaymentStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nullDestbankPaymentStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nullDestbankPaymentStatus)) {
                $nullDestbankPaymentStatus = str_replace('*', '%', $nullDestbankPaymentStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_NULL_DESTBANK_PAYMENT_STATUS, $nullDestbankPaymentStatus, $comparison);
    }

    /**
     * Filter the query on the reconcile_status column
     *
     * Example usage:
     * <code>
     * $query->filterByReconcileStatus(true); // WHERE reconcile_status = true
     * $query->filterByReconcileStatus('yes'); // WHERE reconcile_status = true
     * </code>
     *
     * @param     boolean|string $reconcileStatus The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByReconcileStatus($reconcileStatus = null, $comparison = null)
    {
        if (is_string($reconcileStatus)) {
            $reconcileStatus = in_array(strtolower($reconcileStatus), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_RECONCILE_STATUS, $reconcileStatus, $comparison);
    }

    /**
     * Filter the query on the created_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedDate('2011-03-14'); // WHERE created_date = '2011-03-14'
     * $query->filterByCreatedDate('now'); // WHERE created_date = '2011-03-14'
     * $query->filterByCreatedDate(array('max' => 'yesterday')); // WHERE created_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByCreatedDate($createdDate = null, $comparison = null)
    {
        if (is_array($createdDate)) {
            $useMinMax = false;
            if (isset($createdDate['min'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_CREATED_DATE, $createdDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdDate['max'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_CREATED_DATE, $createdDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_CREATED_DATE, $createdDate, $comparison);
    }

    /**
     * Filter the query on the uploadstatus column
     *
     * Example usage:
     * <code>
     * $query->filterByUploadstatus(1234); // WHERE uploadstatus = 1234
     * $query->filterByUploadstatus(array(12, 34)); // WHERE uploadstatus IN (12, 34)
     * $query->filterByUploadstatus(array('min' => 12)); // WHERE uploadstatus > 12
     * </code>
     *
     * @param     mixed $uploadstatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function filterByUploadstatus($uploadstatus = null, $comparison = null)
    {
        if (is_array($uploadstatus)) {
            $useMinMax = false;
            if (isset($uploadstatus['min'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_UPLOADSTATUS, $uploadstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uploadstatus['max'])) {
                $this->addUsingAlias(NullDestbankPaymentTableMap::COL_UPLOADSTATUS, $uploadstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NullDestbankPaymentTableMap::COL_UPLOADSTATUS, $uploadstatus, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNullDestbankPayment $nullDestbankPayment Object to remove from the list of results
     *
     * @return $this|ChildNullDestbankPaymentQuery The current query, for fluid interface
     */
    public function prune($nullDestbankPayment = null)
    {
        if ($nullDestbankPayment) {
            $this->addUsingAlias(NullDestbankPaymentTableMap::COL_ID, $nullDestbankPayment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the null_destbank_payment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NullDestbankPaymentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NullDestbankPaymentTableMap::clearInstancePool();
            NullDestbankPaymentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NullDestbankPaymentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NullDestbankPaymentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NullDestbankPaymentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NullDestbankPaymentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // NullDestbankPaymentQuery
