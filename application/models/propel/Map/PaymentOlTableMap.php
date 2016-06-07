<?php

namespace Map;

use \PaymentOl;
use \PaymentOlQuery;
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
 * This class defines the structure of the 'payment_ol' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PaymentOlTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PaymentOlTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'payment_ol';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\PaymentOl';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'PaymentOl';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 25;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 25;

    /**
     * the column name for the id field
     */
    const COL_ID = 'payment_ol.id';

    /**
     * the column name for the account_no field
     */
    const COL_ACCOUNT_NO = 'payment_ol.account_no';

    /**
     * the column name for the BillReferenceNumber field
     */
    const COL_BILLREFERENCENUMBER = 'payment_ol.BillReferenceNumber';

    /**
     * the column name for the TransactionID field
     */
    const COL_TRANSACTIONID = 'payment_ol.TransactionID';

    /**
     * the column name for the SourceBank field
     */
    const COL_SOURCEBANK = 'payment_ol.SourceBank';

    /**
     * the column name for the DestinationBank field
     */
    const COL_DESTINATIONBANK = 'payment_ol.DestinationBank';

    /**
     * the column name for the BuildingType field
     */
    const COL_BUILDINGTYPE = 'payment_ol.BuildingType';

    /**
     * the column name for the CustomerName field
     */
    const COL_CUSTOMERNAME = 'payment_ol.CustomerName';

    /**
     * the column name for the District field
     */
    const COL_DISTRICT = 'payment_ol.District';

    /**
     * the column name for the Email field
     */
    const COL_EMAIL = 'payment_ol.Email';

    /**
     * the column name for the Phone field
     */
    const COL_PHONE = 'payment_ol.Phone';

    /**
     * the column name for the OutstandingBalance field
     */
    const COL_OUTSTANDINGBALANCE = 'payment_ol.OutstandingBalance';

    /**
     * the column name for the TransactionDate field
     */
    const COL_TRANSACTIONDATE = 'payment_ol.TransactionDate';

    /**
     * the column name for the date_initiated field
     */
    const COL_DATE_INITIATED = 'payment_ol.date_initiated';

    /**
     * the column name for the date_completed field
     */
    const COL_DATE_COMPLETED = 'payment_ol.date_completed';

    /**
     * the column name for the amount_paid field
     */
    const COL_AMOUNT_PAID = 'payment_ol.amount_paid';

    /**
     * the column name for the AmountDue field
     */
    const COL_AMOUNTDUE = 'payment_ol.AmountDue';

    /**
     * the column name for the platform field
     */
    const COL_PLATFORM = 'payment_ol.platform';

    /**
     * the column name for the receipt_no field
     */
    const COL_RECEIPT_NO = 'payment_ol.receipt_no';

    /**
     * the column name for the ServiceAddress field
     */
    const COL_SERVICEADDRESS = 'payment_ol.ServiceAddress';

    /**
     * the column name for the UsageType field
     */
    const COL_USAGETYPE = 'payment_ol.UsageType';

    /**
     * the column name for the payment_status field
     */
    const COL_PAYMENT_STATUS = 'payment_ol.payment_status';

    /**
     * the column name for the reconcile_status field
     */
    const COL_RECONCILE_STATUS = 'payment_ol.reconcile_status';

    /**
     * the column name for the created_date field
     */
    const COL_CREATED_DATE = 'payment_ol.created_date';

    /**
     * the column name for the uploadstatus field
     */
    const COL_UPLOADSTATUS = 'payment_ol.uploadstatus';

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
        self::TYPE_PHPNAME       => array('Id', 'AccountNo', 'Billreferencenumber', 'Transactionid', 'Sourcebank', 'Destinationbank', 'Buildingtype', 'Customername', 'District', 'Email', 'Phone', 'Outstandingbalance', 'Transactiondate', 'DateInitiated', 'DateCompleted', 'AmountPaid', 'Amountdue', 'Platform', 'ReceiptNo', 'Serviceaddress', 'Usagetype', 'PaymentStatus', 'ReconcileStatus', 'CreatedDate', 'Uploadstatus', ),
        self::TYPE_CAMELNAME     => array('id', 'accountNo', 'billreferencenumber', 'transactionid', 'sourcebank', 'destinationbank', 'buildingtype', 'customername', 'district', 'email', 'phone', 'outstandingbalance', 'transactiondate', 'dateInitiated', 'dateCompleted', 'amountPaid', 'amountdue', 'platform', 'receiptNo', 'serviceaddress', 'usagetype', 'paymentStatus', 'reconcileStatus', 'createdDate', 'uploadstatus', ),
        self::TYPE_COLNAME       => array(PaymentOlTableMap::COL_ID, PaymentOlTableMap::COL_ACCOUNT_NO, PaymentOlTableMap::COL_BILLREFERENCENUMBER, PaymentOlTableMap::COL_TRANSACTIONID, PaymentOlTableMap::COL_SOURCEBANK, PaymentOlTableMap::COL_DESTINATIONBANK, PaymentOlTableMap::COL_BUILDINGTYPE, PaymentOlTableMap::COL_CUSTOMERNAME, PaymentOlTableMap::COL_DISTRICT, PaymentOlTableMap::COL_EMAIL, PaymentOlTableMap::COL_PHONE, PaymentOlTableMap::COL_OUTSTANDINGBALANCE, PaymentOlTableMap::COL_TRANSACTIONDATE, PaymentOlTableMap::COL_DATE_INITIATED, PaymentOlTableMap::COL_DATE_COMPLETED, PaymentOlTableMap::COL_AMOUNT_PAID, PaymentOlTableMap::COL_AMOUNTDUE, PaymentOlTableMap::COL_PLATFORM, PaymentOlTableMap::COL_RECEIPT_NO, PaymentOlTableMap::COL_SERVICEADDRESS, PaymentOlTableMap::COL_USAGETYPE, PaymentOlTableMap::COL_PAYMENT_STATUS, PaymentOlTableMap::COL_RECONCILE_STATUS, PaymentOlTableMap::COL_CREATED_DATE, PaymentOlTableMap::COL_UPLOADSTATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'account_no', 'BillReferenceNumber', 'TransactionID', 'SourceBank', 'DestinationBank', 'BuildingType', 'CustomerName', 'District', 'Email', 'Phone', 'OutstandingBalance', 'TransactionDate', 'date_initiated', 'date_completed', 'amount_paid', 'AmountDue', 'platform', 'receipt_no', 'ServiceAddress', 'UsageType', 'payment_status', 'reconcile_status', 'created_date', 'uploadstatus', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'AccountNo' => 1, 'Billreferencenumber' => 2, 'Transactionid' => 3, 'Sourcebank' => 4, 'Destinationbank' => 5, 'Buildingtype' => 6, 'Customername' => 7, 'District' => 8, 'Email' => 9, 'Phone' => 10, 'Outstandingbalance' => 11, 'Transactiondate' => 12, 'DateInitiated' => 13, 'DateCompleted' => 14, 'AmountPaid' => 15, 'Amountdue' => 16, 'Platform' => 17, 'ReceiptNo' => 18, 'Serviceaddress' => 19, 'Usagetype' => 20, 'PaymentStatus' => 21, 'ReconcileStatus' => 22, 'CreatedDate' => 23, 'Uploadstatus' => 24, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'accountNo' => 1, 'billreferencenumber' => 2, 'transactionid' => 3, 'sourcebank' => 4, 'destinationbank' => 5, 'buildingtype' => 6, 'customername' => 7, 'district' => 8, 'email' => 9, 'phone' => 10, 'outstandingbalance' => 11, 'transactiondate' => 12, 'dateInitiated' => 13, 'dateCompleted' => 14, 'amountPaid' => 15, 'amountdue' => 16, 'platform' => 17, 'receiptNo' => 18, 'serviceaddress' => 19, 'usagetype' => 20, 'paymentStatus' => 21, 'reconcileStatus' => 22, 'createdDate' => 23, 'uploadstatus' => 24, ),
        self::TYPE_COLNAME       => array(PaymentOlTableMap::COL_ID => 0, PaymentOlTableMap::COL_ACCOUNT_NO => 1, PaymentOlTableMap::COL_BILLREFERENCENUMBER => 2, PaymentOlTableMap::COL_TRANSACTIONID => 3, PaymentOlTableMap::COL_SOURCEBANK => 4, PaymentOlTableMap::COL_DESTINATIONBANK => 5, PaymentOlTableMap::COL_BUILDINGTYPE => 6, PaymentOlTableMap::COL_CUSTOMERNAME => 7, PaymentOlTableMap::COL_DISTRICT => 8, PaymentOlTableMap::COL_EMAIL => 9, PaymentOlTableMap::COL_PHONE => 10, PaymentOlTableMap::COL_OUTSTANDINGBALANCE => 11, PaymentOlTableMap::COL_TRANSACTIONDATE => 12, PaymentOlTableMap::COL_DATE_INITIATED => 13, PaymentOlTableMap::COL_DATE_COMPLETED => 14, PaymentOlTableMap::COL_AMOUNT_PAID => 15, PaymentOlTableMap::COL_AMOUNTDUE => 16, PaymentOlTableMap::COL_PLATFORM => 17, PaymentOlTableMap::COL_RECEIPT_NO => 18, PaymentOlTableMap::COL_SERVICEADDRESS => 19, PaymentOlTableMap::COL_USAGETYPE => 20, PaymentOlTableMap::COL_PAYMENT_STATUS => 21, PaymentOlTableMap::COL_RECONCILE_STATUS => 22, PaymentOlTableMap::COL_CREATED_DATE => 23, PaymentOlTableMap::COL_UPLOADSTATUS => 24, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'account_no' => 1, 'BillReferenceNumber' => 2, 'TransactionID' => 3, 'SourceBank' => 4, 'DestinationBank' => 5, 'BuildingType' => 6, 'CustomerName' => 7, 'District' => 8, 'Email' => 9, 'Phone' => 10, 'OutstandingBalance' => 11, 'TransactionDate' => 12, 'date_initiated' => 13, 'date_completed' => 14, 'amount_paid' => 15, 'AmountDue' => 16, 'platform' => 17, 'receipt_no' => 18, 'ServiceAddress' => 19, 'UsageType' => 20, 'payment_status' => 21, 'reconcile_status' => 22, 'created_date' => 23, 'uploadstatus' => 24, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
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
        $this->setName('payment_ol');
        $this->setPhpName('PaymentOl');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\PaymentOl');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
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
        $this->addColumn('amount_paid', 'AmountPaid', 'VARCHAR', true, 50, null);
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
        return $withPrefix ? PaymentOlTableMap::CLASS_DEFAULT : PaymentOlTableMap::OM_CLASS;
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
     * @return array           (PaymentOl object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PaymentOlTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PaymentOlTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PaymentOlTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PaymentOlTableMap::OM_CLASS;
            /** @var PaymentOl $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PaymentOlTableMap::addInstanceToPool($obj, $key);
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
            $key = PaymentOlTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PaymentOlTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PaymentOl $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PaymentOlTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PaymentOlTableMap::COL_ID);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_ACCOUNT_NO);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_BILLREFERENCENUMBER);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_TRANSACTIONID);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_SOURCEBANK);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_DESTINATIONBANK);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_BUILDINGTYPE);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_CUSTOMERNAME);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_DISTRICT);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_EMAIL);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_PHONE);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_OUTSTANDINGBALANCE);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_TRANSACTIONDATE);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_DATE_INITIATED);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_DATE_COMPLETED);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_AMOUNT_PAID);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_AMOUNTDUE);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_PLATFORM);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_RECEIPT_NO);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_SERVICEADDRESS);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_USAGETYPE);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_PAYMENT_STATUS);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_RECONCILE_STATUS);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_CREATED_DATE);
            $criteria->addSelectColumn(PaymentOlTableMap::COL_UPLOADSTATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
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
        return Propel::getServiceContainer()->getDatabaseMap(PaymentOlTableMap::DATABASE_NAME)->getTable(PaymentOlTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PaymentOlTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PaymentOlTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PaymentOlTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PaymentOl or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PaymentOl object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentOlTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \PaymentOl) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PaymentOlTableMap::DATABASE_NAME);
            $criteria->add(PaymentOlTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PaymentOlQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PaymentOlTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PaymentOlTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the payment_ol table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PaymentOlQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PaymentOl or Criteria object.
     *
     * @param mixed               $criteria Criteria or PaymentOl object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentOlTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PaymentOl object
        }

        if ($criteria->containsKey(PaymentOlTableMap::COL_ID) && $criteria->keyContainsValue(PaymentOlTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PaymentOlTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PaymentOlQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PaymentOlTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PaymentOlTableMap::buildTableMap();
