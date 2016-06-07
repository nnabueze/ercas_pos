<?php

namespace Map;

use \CollectorPayment;
use \CollectorPaymentQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'collector_payment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CollectorPaymentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CollectorPaymentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'collector_payment';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CollectorPayment';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CollectorPayment';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 26;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 26;

    /**
     * the column name for the id field
     */
    const COL_ID = 'collector_payment.id';

    /**
     * the column name for the collector_id field
     */
    const COL_COLLECTOR_ID = 'collector_payment.collector_id';

    /**
     * the column name for the account_no field
     */
    const COL_ACCOUNT_NO = 'collector_payment.account_no';

    /**
     * the column name for the BillReferenceNumber field
     */
    const COL_BILLREFERENCENUMBER = 'collector_payment.BillReferenceNumber';

    /**
     * the column name for the TransactionID field
     */
    const COL_TRANSACTIONID = 'collector_payment.TransactionID';

    /**
     * the column name for the SourceBank field
     */
    const COL_SOURCEBANK = 'collector_payment.SourceBank';

    /**
     * the column name for the DestinationBank field
     */
    const COL_DESTINATIONBANK = 'collector_payment.DestinationBank';

    /**
     * the column name for the BuildingType field
     */
    const COL_BUILDINGTYPE = 'collector_payment.BuildingType';

    /**
     * the column name for the CustomerName field
     */
    const COL_CUSTOMERNAME = 'collector_payment.CustomerName';

    /**
     * the column name for the District field
     */
    const COL_DISTRICT = 'collector_payment.District';

    /**
     * the column name for the Email field
     */
    const COL_EMAIL = 'collector_payment.Email';

    /**
     * the column name for the Phone field
     */
    const COL_PHONE = 'collector_payment.Phone';

    /**
     * the column name for the OutstandingBalance field
     */
    const COL_OUTSTANDINGBALANCE = 'collector_payment.OutstandingBalance';

    /**
     * the column name for the TransactionDate field
     */
    const COL_TRANSACTIONDATE = 'collector_payment.TransactionDate';

    /**
     * the column name for the date_initiated field
     */
    const COL_DATE_INITIATED = 'collector_payment.date_initiated';

    /**
     * the column name for the date_completed field
     */
    const COL_DATE_COMPLETED = 'collector_payment.date_completed';

    /**
     * the column name for the amount_paid field
     */
    const COL_AMOUNT_PAID = 'collector_payment.amount_paid';

    /**
     * the column name for the AmountDue field
     */
    const COL_AMOUNTDUE = 'collector_payment.AmountDue';

    /**
     * the column name for the platform field
     */
    const COL_PLATFORM = 'collector_payment.platform';

    /**
     * the column name for the receipt_no field
     */
    const COL_RECEIPT_NO = 'collector_payment.receipt_no';

    /**
     * the column name for the ServiceAddress field
     */
    const COL_SERVICEADDRESS = 'collector_payment.ServiceAddress';

    /**
     * the column name for the UsageType field
     */
    const COL_USAGETYPE = 'collector_payment.UsageType';

    /**
     * the column name for the payment_status field
     */
    const COL_PAYMENT_STATUS = 'collector_payment.payment_status';

    /**
     * the column name for the reconcile_status field
     */
    const COL_RECONCILE_STATUS = 'collector_payment.reconcile_status';

    /**
     * the column name for the created_date field
     */
    const COL_CREATED_DATE = 'collector_payment.created_date';

    /**
     * the column name for the uploadstatus field
     */
    const COL_UPLOADSTATUS = 'collector_payment.uploadstatus';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'CollectorId', 'AccountNo', 'Billreferencenumber', 'Transactionid', 'Sourcebank', 'Destinationbank', 'Buildingtype', 'Customername', 'District', 'Email', 'Phone', 'Outstandingbalance', 'Transactiondate', 'DateInitiated', 'DateCompleted', 'AmountPaid', 'Amountdue', 'Platform', 'ReceiptNo', 'Serviceaddress', 'Usagetype', 'PaymentStatus', 'ReconcileStatus', 'CreatedDate', 'Uploadstatus', ),
        self::TYPE_CAMELNAME     => array('id', 'collectorId', 'accountNo', 'billreferencenumber', 'transactionid', 'sourcebank', 'destinationbank', 'buildingtype', 'customername', 'district', 'email', 'phone', 'outstandingbalance', 'transactiondate', 'dateInitiated', 'dateCompleted', 'amountPaid', 'amountdue', 'platform', 'receiptNo', 'serviceaddress', 'usagetype', 'paymentStatus', 'reconcileStatus', 'createdDate', 'uploadstatus', ),
        self::TYPE_COLNAME       => array(CollectorPaymentTableMap::COL_ID, CollectorPaymentTableMap::COL_COLLECTOR_ID, CollectorPaymentTableMap::COL_ACCOUNT_NO, CollectorPaymentTableMap::COL_BILLREFERENCENUMBER, CollectorPaymentTableMap::COL_TRANSACTIONID, CollectorPaymentTableMap::COL_SOURCEBANK, CollectorPaymentTableMap::COL_DESTINATIONBANK, CollectorPaymentTableMap::COL_BUILDINGTYPE, CollectorPaymentTableMap::COL_CUSTOMERNAME, CollectorPaymentTableMap::COL_DISTRICT, CollectorPaymentTableMap::COL_EMAIL, CollectorPaymentTableMap::COL_PHONE, CollectorPaymentTableMap::COL_OUTSTANDINGBALANCE, CollectorPaymentTableMap::COL_TRANSACTIONDATE, CollectorPaymentTableMap::COL_DATE_INITIATED, CollectorPaymentTableMap::COL_DATE_COMPLETED, CollectorPaymentTableMap::COL_AMOUNT_PAID, CollectorPaymentTableMap::COL_AMOUNTDUE, CollectorPaymentTableMap::COL_PLATFORM, CollectorPaymentTableMap::COL_RECEIPT_NO, CollectorPaymentTableMap::COL_SERVICEADDRESS, CollectorPaymentTableMap::COL_USAGETYPE, CollectorPaymentTableMap::COL_PAYMENT_STATUS, CollectorPaymentTableMap::COL_RECONCILE_STATUS, CollectorPaymentTableMap::COL_CREATED_DATE, CollectorPaymentTableMap::COL_UPLOADSTATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'collector_id', 'account_no', 'BillReferenceNumber', 'TransactionID', 'SourceBank', 'DestinationBank', 'BuildingType', 'CustomerName', 'District', 'Email', 'Phone', 'OutstandingBalance', 'TransactionDate', 'date_initiated', 'date_completed', 'amount_paid', 'AmountDue', 'platform', 'receipt_no', 'ServiceAddress', 'UsageType', 'payment_status', 'reconcile_status', 'created_date', 'uploadstatus', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'CollectorId' => 1, 'AccountNo' => 2, 'Billreferencenumber' => 3, 'Transactionid' => 4, 'Sourcebank' => 5, 'Destinationbank' => 6, 'Buildingtype' => 7, 'Customername' => 8, 'District' => 9, 'Email' => 10, 'Phone' => 11, 'Outstandingbalance' => 12, 'Transactiondate' => 13, 'DateInitiated' => 14, 'DateCompleted' => 15, 'AmountPaid' => 16, 'Amountdue' => 17, 'Platform' => 18, 'ReceiptNo' => 19, 'Serviceaddress' => 20, 'Usagetype' => 21, 'PaymentStatus' => 22, 'ReconcileStatus' => 23, 'CreatedDate' => 24, 'Uploadstatus' => 25, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'collectorId' => 1, 'accountNo' => 2, 'billreferencenumber' => 3, 'transactionid' => 4, 'sourcebank' => 5, 'destinationbank' => 6, 'buildingtype' => 7, 'customername' => 8, 'district' => 9, 'email' => 10, 'phone' => 11, 'outstandingbalance' => 12, 'transactiondate' => 13, 'dateInitiated' => 14, 'dateCompleted' => 15, 'amountPaid' => 16, 'amountdue' => 17, 'platform' => 18, 'receiptNo' => 19, 'serviceaddress' => 20, 'usagetype' => 21, 'paymentStatus' => 22, 'reconcileStatus' => 23, 'createdDate' => 24, 'uploadstatus' => 25, ),
        self::TYPE_COLNAME       => array(CollectorPaymentTableMap::COL_ID => 0, CollectorPaymentTableMap::COL_COLLECTOR_ID => 1, CollectorPaymentTableMap::COL_ACCOUNT_NO => 2, CollectorPaymentTableMap::COL_BILLREFERENCENUMBER => 3, CollectorPaymentTableMap::COL_TRANSACTIONID => 4, CollectorPaymentTableMap::COL_SOURCEBANK => 5, CollectorPaymentTableMap::COL_DESTINATIONBANK => 6, CollectorPaymentTableMap::COL_BUILDINGTYPE => 7, CollectorPaymentTableMap::COL_CUSTOMERNAME => 8, CollectorPaymentTableMap::COL_DISTRICT => 9, CollectorPaymentTableMap::COL_EMAIL => 10, CollectorPaymentTableMap::COL_PHONE => 11, CollectorPaymentTableMap::COL_OUTSTANDINGBALANCE => 12, CollectorPaymentTableMap::COL_TRANSACTIONDATE => 13, CollectorPaymentTableMap::COL_DATE_INITIATED => 14, CollectorPaymentTableMap::COL_DATE_COMPLETED => 15, CollectorPaymentTableMap::COL_AMOUNT_PAID => 16, CollectorPaymentTableMap::COL_AMOUNTDUE => 17, CollectorPaymentTableMap::COL_PLATFORM => 18, CollectorPaymentTableMap::COL_RECEIPT_NO => 19, CollectorPaymentTableMap::COL_SERVICEADDRESS => 20, CollectorPaymentTableMap::COL_USAGETYPE => 21, CollectorPaymentTableMap::COL_PAYMENT_STATUS => 22, CollectorPaymentTableMap::COL_RECONCILE_STATUS => 23, CollectorPaymentTableMap::COL_CREATED_DATE => 24, CollectorPaymentTableMap::COL_UPLOADSTATUS => 25, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'collector_id' => 1, 'account_no' => 2, 'BillReferenceNumber' => 3, 'TransactionID' => 4, 'SourceBank' => 5, 'DestinationBank' => 6, 'BuildingType' => 7, 'CustomerName' => 8, 'District' => 9, 'Email' => 10, 'Phone' => 11, 'OutstandingBalance' => 12, 'TransactionDate' => 13, 'date_initiated' => 14, 'date_completed' => 15, 'amount_paid' => 16, 'AmountDue' => 17, 'platform' => 18, 'receipt_no' => 19, 'ServiceAddress' => 20, 'UsageType' => 21, 'payment_status' => 22, 'reconcile_status' => 23, 'created_date' => 24, 'uploadstatus' => 25, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('collector_payment');
        $this->setPhpName('CollectorPayment');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\CollectorPayment');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('collector_id', 'CollectorId', 'VARCHAR', true, 50, null);
        $this->addColumn('account_no', 'AccountNo', 'VARCHAR', true, 50, null);
        $this->addColumn('BillReferenceNumber', 'Billreferencenumber', 'VARCHAR', true, 50, null);
        $this->addColumn('TransactionID', 'Transactionid', 'VARCHAR', true, 255, null);
        $this->addColumn('SourceBank', 'Sourcebank', 'VARCHAR', true, 255, null);
        $this->addColumn('DestinationBank', 'Destinationbank', 'VARCHAR', false, 255, null);
        $this->addColumn('BuildingType', 'Buildingtype', 'VARCHAR', true, 100, null);
        $this->addColumn('CustomerName', 'Customername', 'VARCHAR', true, 200, null);
        $this->addColumn('District', 'District', 'VARCHAR', true, 100, null);
        $this->addColumn('Email', 'Email', 'VARCHAR', true, 100, null);
        $this->addColumn('Phone', 'Phone', 'VARCHAR', true, 15, null);
        $this->addColumn('OutstandingBalance', 'Outstandingbalance', 'DECIMAL', true, 11, null);
        $this->addColumn('TransactionDate', 'Transactiondate', 'TIMESTAMP', true, null, null);
        $this->addColumn('date_initiated', 'DateInitiated', 'VARCHAR', true, 50, null);
        $this->addColumn('date_completed', 'DateCompleted', 'VARCHAR', true, 50, null);
        $this->addColumn('amount_paid', 'AmountPaid', 'DECIMAL', true, 20, null);
        $this->addColumn('AmountDue', 'Amountdue', 'DECIMAL', true, 11, null);
        $this->addColumn('platform', 'Platform', 'VARCHAR', true, 50, null);
        $this->addColumn('receipt_no', 'ReceiptNo', 'VARCHAR', true, 50, null);
        $this->addColumn('ServiceAddress', 'Serviceaddress', 'VARCHAR', true, 255, null);
        $this->addColumn('UsageType', 'Usagetype', 'VARCHAR', true, 255, null);
        $this->addColumn('payment_status', 'PaymentStatus', 'CHAR', true, null, 'P');
        $this->addColumn('reconcile_status', 'ReconcileStatus', 'BOOLEAN', true, 1, null);
        $this->addColumn('created_date', 'CreatedDate', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('uploadstatus', 'Uploadstatus', 'INTEGER', true, null, 0);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CollectorPaymentTableMap::CLASS_DEFAULT : CollectorPaymentTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (CollectorPayment object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CollectorPaymentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CollectorPaymentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CollectorPaymentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CollectorPaymentTableMap::OM_CLASS;
            /** @var CollectorPayment $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CollectorPaymentTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CollectorPaymentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CollectorPaymentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var CollectorPayment $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CollectorPaymentTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_ID);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_COLLECTOR_ID);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_ACCOUNT_NO);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_BILLREFERENCENUMBER);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_TRANSACTIONID);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_SOURCEBANK);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_DESTINATIONBANK);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_BUILDINGTYPE);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_CUSTOMERNAME);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_DISTRICT);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_EMAIL);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_PHONE);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_OUTSTANDINGBALANCE);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_TRANSACTIONDATE);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_DATE_INITIATED);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_DATE_COMPLETED);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_AMOUNT_PAID);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_AMOUNTDUE);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_PLATFORM);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_RECEIPT_NO);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_SERVICEADDRESS);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_USAGETYPE);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_PAYMENT_STATUS);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_RECONCILE_STATUS);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_CREATED_DATE);
            $criteria->addSelectColumn(CollectorPaymentTableMap::COL_UPLOADSTATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.collector_id');
            $criteria->addSelectColumn($alias . '.account_no');
            $criteria->addSelectColumn($alias . '.BillReferenceNumber');
            $criteria->addSelectColumn($alias . '.TransactionID');
            $criteria->addSelectColumn($alias . '.SourceBank');
            $criteria->addSelectColumn($alias . '.DestinationBank');
            $criteria->addSelectColumn($alias . '.BuildingType');
            $criteria->addSelectColumn($alias . '.CustomerName');
            $criteria->addSelectColumn($alias . '.District');
            $criteria->addSelectColumn($alias . '.Email');
            $criteria->addSelectColumn($alias . '.Phone');
            $criteria->addSelectColumn($alias . '.OutstandingBalance');
            $criteria->addSelectColumn($alias . '.TransactionDate');
            $criteria->addSelectColumn($alias . '.date_initiated');
            $criteria->addSelectColumn($alias . '.date_completed');
            $criteria->addSelectColumn($alias . '.amount_paid');
            $criteria->addSelectColumn($alias . '.AmountDue');
            $criteria->addSelectColumn($alias . '.platform');
            $criteria->addSelectColumn($alias . '.receipt_no');
            $criteria->addSelectColumn($alias . '.ServiceAddress');
            $criteria->addSelectColumn($alias . '.UsageType');
            $criteria->addSelectColumn($alias . '.payment_status');
            $criteria->addSelectColumn($alias . '.reconcile_status');
            $criteria->addSelectColumn($alias . '.created_date');
            $criteria->addSelectColumn($alias . '.uploadstatus');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CollectorPaymentTableMap::DATABASE_NAME)->getTable(CollectorPaymentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CollectorPaymentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CollectorPaymentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CollectorPaymentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a CollectorPayment or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CollectorPayment object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CollectorPaymentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CollectorPayment) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CollectorPaymentTableMap::DATABASE_NAME);
            $criteria->add(CollectorPaymentTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = CollectorPaymentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CollectorPaymentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CollectorPaymentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the collector_payment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CollectorPaymentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CollectorPayment or Criteria object.
     *
     * @param mixed               $criteria Criteria or CollectorPayment object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CollectorPaymentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CollectorPayment object
        }

        if ($criteria->containsKey(CollectorPaymentTableMap::COL_ID) && $criteria->keyContainsValue(CollectorPaymentTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CollectorPaymentTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = CollectorPaymentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CollectorPaymentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CollectorPaymentTableMap::buildTableMap();
