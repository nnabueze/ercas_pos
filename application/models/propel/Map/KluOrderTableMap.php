<?php

namespace Map;

use \KluOrder;
use \KluOrderQuery;
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
 * This class defines the structure of the 'klu_order' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class KluOrderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.KluOrderTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'klu_order';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\KluOrder';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'KluOrder';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 21;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 21;

    /**
     * the column name for the OrderID field
     */
    const COL_ORDERID = 'klu_order.OrderID';

    /**
     * the column name for the ref_no field
     */
    const COL_REF_NO = 'klu_order.ref_no';

    /**
     * the column name for the bill_id field
     */
    const COL_BILL_ID = 'klu_order.bill_id';

    /**
     * the column name for the account_no field
     */
    const COL_ACCOUNT_NO = 'klu_order.account_no';

    /**
     * the column name for the service_type field
     */
    const COL_SERVICE_TYPE = 'klu_order.service_type';

    /**
     * the column name for the payment_date field
     */
    const COL_PAYMENT_DATE = 'klu_order.payment_date';

    /**
     * the column name for the payment_due_date field
     */
    const COL_PAYMENT_DUE_DATE = 'klu_order.payment_due_date';

    /**
     * the column name for the payment_time field
     */
    const COL_PAYMENT_TIME = 'klu_order.payment_time';

    /**
     * the column name for the payment_platform field
     */
    const COL_PAYMENT_PLATFORM = 'klu_order.payment_platform';

    /**
     * the column name for the cust_email field
     */
    const COL_CUST_EMAIL = 'klu_order.cust_email';

    /**
     * the column name for the cust_phone field
     */
    const COL_CUST_PHONE = 'klu_order.cust_phone';

    /**
     * the column name for the billing_period field
     */
    const COL_BILLING_PERIOD = 'klu_order.billing_period';

    /**
     * the column name for the solid_waste_rate field
     */
    const COL_SOLID_WASTE_RATE = 'klu_order.solid_waste_rate';

    /**
     * the column name for the solid_waste_vat field
     */
    const COL_SOLID_WASTE_VAT = 'klu_order.solid_waste_vat';

    /**
     * the column name for the solid_waste_tax field
     */
    const COL_SOLID_WASTE_TAX = 'klu_order.solid_waste_tax';

    /**
     * the column name for the liquid_waste_rate field
     */
    const COL_LIQUID_WASTE_RATE = 'klu_order.liquid_waste_rate';

    /**
     * the column name for the liquid_waste_vat field
     */
    const COL_LIQUID_WASTE_VAT = 'klu_order.liquid_waste_vat';

    /**
     * the column name for the liquid_waste_tax field
     */
    const COL_LIQUID_WASTE_TAX = 'klu_order.liquid_waste_tax';

    /**
     * the column name for the previous_balance field
     */
    const COL_PREVIOUS_BALANCE = 'klu_order.previous_balance';

    /**
     * the column name for the payment_received field
     */
    const COL_PAYMENT_RECEIVED = 'klu_order.payment_received';

    /**
     * the column name for the total_amount field
     */
    const COL_TOTAL_AMOUNT = 'klu_order.total_amount';

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
        self::TYPE_PHPNAME       => array('Orderid', 'RefNo', 'BillId', 'AccountNo', 'ServiceType', 'PaymentDate', 'PaymentDueDate', 'PaymentTime', 'PaymentPlatform', 'CustEmail', 'CustPhone', 'BillingPeriod', 'SolidWasteRate', 'SolidWasteVat', 'SolidWasteTax', 'LiquidWasteRate', 'LiquidWasteVat', 'LiquidWasteTax', 'PreviousBalance', 'PaymentReceived', 'TotalAmount', ),
        self::TYPE_CAMELNAME     => array('orderid', 'refNo', 'billId', 'accountNo', 'serviceType', 'paymentDate', 'paymentDueDate', 'paymentTime', 'paymentPlatform', 'custEmail', 'custPhone', 'billingPeriod', 'solidWasteRate', 'solidWasteVat', 'solidWasteTax', 'liquidWasteRate', 'liquidWasteVat', 'liquidWasteTax', 'previousBalance', 'paymentReceived', 'totalAmount', ),
        self::TYPE_COLNAME       => array(KluOrderTableMap::COL_ORDERID, KluOrderTableMap::COL_REF_NO, KluOrderTableMap::COL_BILL_ID, KluOrderTableMap::COL_ACCOUNT_NO, KluOrderTableMap::COL_SERVICE_TYPE, KluOrderTableMap::COL_PAYMENT_DATE, KluOrderTableMap::COL_PAYMENT_DUE_DATE, KluOrderTableMap::COL_PAYMENT_TIME, KluOrderTableMap::COL_PAYMENT_PLATFORM, KluOrderTableMap::COL_CUST_EMAIL, KluOrderTableMap::COL_CUST_PHONE, KluOrderTableMap::COL_BILLING_PERIOD, KluOrderTableMap::COL_SOLID_WASTE_RATE, KluOrderTableMap::COL_SOLID_WASTE_VAT, KluOrderTableMap::COL_SOLID_WASTE_TAX, KluOrderTableMap::COL_LIQUID_WASTE_RATE, KluOrderTableMap::COL_LIQUID_WASTE_VAT, KluOrderTableMap::COL_LIQUID_WASTE_TAX, KluOrderTableMap::COL_PREVIOUS_BALANCE, KluOrderTableMap::COL_PAYMENT_RECEIVED, KluOrderTableMap::COL_TOTAL_AMOUNT, ),
        self::TYPE_FIELDNAME     => array('OrderID', 'ref_no', 'bill_id', 'account_no', 'service_type', 'payment_date', 'payment_due_date', 'payment_time', 'payment_platform', 'cust_email', 'cust_phone', 'billing_period', 'solid_waste_rate', 'solid_waste_vat', 'solid_waste_tax', 'liquid_waste_rate', 'liquid_waste_vat', 'liquid_waste_tax', 'previous_balance', 'payment_received', 'total_amount', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Orderid' => 0, 'RefNo' => 1, 'BillId' => 2, 'AccountNo' => 3, 'ServiceType' => 4, 'PaymentDate' => 5, 'PaymentDueDate' => 6, 'PaymentTime' => 7, 'PaymentPlatform' => 8, 'CustEmail' => 9, 'CustPhone' => 10, 'BillingPeriod' => 11, 'SolidWasteRate' => 12, 'SolidWasteVat' => 13, 'SolidWasteTax' => 14, 'LiquidWasteRate' => 15, 'LiquidWasteVat' => 16, 'LiquidWasteTax' => 17, 'PreviousBalance' => 18, 'PaymentReceived' => 19, 'TotalAmount' => 20, ),
        self::TYPE_CAMELNAME     => array('orderid' => 0, 'refNo' => 1, 'billId' => 2, 'accountNo' => 3, 'serviceType' => 4, 'paymentDate' => 5, 'paymentDueDate' => 6, 'paymentTime' => 7, 'paymentPlatform' => 8, 'custEmail' => 9, 'custPhone' => 10, 'billingPeriod' => 11, 'solidWasteRate' => 12, 'solidWasteVat' => 13, 'solidWasteTax' => 14, 'liquidWasteRate' => 15, 'liquidWasteVat' => 16, 'liquidWasteTax' => 17, 'previousBalance' => 18, 'paymentReceived' => 19, 'totalAmount' => 20, ),
        self::TYPE_COLNAME       => array(KluOrderTableMap::COL_ORDERID => 0, KluOrderTableMap::COL_REF_NO => 1, KluOrderTableMap::COL_BILL_ID => 2, KluOrderTableMap::COL_ACCOUNT_NO => 3, KluOrderTableMap::COL_SERVICE_TYPE => 4, KluOrderTableMap::COL_PAYMENT_DATE => 5, KluOrderTableMap::COL_PAYMENT_DUE_DATE => 6, KluOrderTableMap::COL_PAYMENT_TIME => 7, KluOrderTableMap::COL_PAYMENT_PLATFORM => 8, KluOrderTableMap::COL_CUST_EMAIL => 9, KluOrderTableMap::COL_CUST_PHONE => 10, KluOrderTableMap::COL_BILLING_PERIOD => 11, KluOrderTableMap::COL_SOLID_WASTE_RATE => 12, KluOrderTableMap::COL_SOLID_WASTE_VAT => 13, KluOrderTableMap::COL_SOLID_WASTE_TAX => 14, KluOrderTableMap::COL_LIQUID_WASTE_RATE => 15, KluOrderTableMap::COL_LIQUID_WASTE_VAT => 16, KluOrderTableMap::COL_LIQUID_WASTE_TAX => 17, KluOrderTableMap::COL_PREVIOUS_BALANCE => 18, KluOrderTableMap::COL_PAYMENT_RECEIVED => 19, KluOrderTableMap::COL_TOTAL_AMOUNT => 20, ),
        self::TYPE_FIELDNAME     => array('OrderID' => 0, 'ref_no' => 1, 'bill_id' => 2, 'account_no' => 3, 'service_type' => 4, 'payment_date' => 5, 'payment_due_date' => 6, 'payment_time' => 7, 'payment_platform' => 8, 'cust_email' => 9, 'cust_phone' => 10, 'billing_period' => 11, 'solid_waste_rate' => 12, 'solid_waste_vat' => 13, 'solid_waste_tax' => 14, 'liquid_waste_rate' => 15, 'liquid_waste_vat' => 16, 'liquid_waste_tax' => 17, 'previous_balance' => 18, 'payment_received' => 19, 'total_amount' => 20, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $this->setName('klu_order');
        $this->setPhpName('KluOrder');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\KluOrder');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('OrderID', 'Orderid', 'INTEGER', true, null, null);
        $this->addColumn('ref_no', 'RefNo', 'VARCHAR', true, 50, null);
        $this->addColumn('bill_id', 'BillId', 'INTEGER', true, null, null);
        $this->addColumn('account_no', 'AccountNo', 'VARCHAR', true, 50, null);
        $this->addColumn('service_type', 'ServiceType', 'VARCHAR', true, 100, null);
        $this->addColumn('payment_date', 'PaymentDate', 'DATE', true, null, null);
        $this->addColumn('payment_due_date', 'PaymentDueDate', 'VARCHAR', true, 50, null);
        $this->addColumn('payment_time', 'PaymentTime', 'VARCHAR', true, 10, null);
        $this->addColumn('payment_platform', 'PaymentPlatform', 'VARCHAR', true, 100, null);
        $this->addColumn('cust_email', 'CustEmail', 'VARCHAR', true, 100, null);
        $this->addColumn('cust_phone', 'CustPhone', 'VARCHAR', true, 15, null);
        $this->addColumn('billing_period', 'BillingPeriod', 'VARCHAR', true, 100, null);
        $this->addColumn('solid_waste_rate', 'SolidWasteRate', 'DECIMAL', true, 11, null);
        $this->addColumn('solid_waste_vat', 'SolidWasteVat', 'DECIMAL', true, 11, null);
        $this->addColumn('solid_waste_tax', 'SolidWasteTax', 'DECIMAL', true, 11, null);
        $this->addColumn('liquid_waste_rate', 'LiquidWasteRate', 'DECIMAL', true, 11, null);
        $this->addColumn('liquid_waste_vat', 'LiquidWasteVat', 'DECIMAL', true, 11, null);
        $this->addColumn('liquid_waste_tax', 'LiquidWasteTax', 'DECIMAL', true, 11, null);
        $this->addColumn('previous_balance', 'PreviousBalance', 'DECIMAL', true, 11, null);
        $this->addColumn('payment_received', 'PaymentReceived', 'DECIMAL', true, 11, null);
        $this->addColumn('total_amount', 'TotalAmount', 'DECIMAL', true, 11, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Orderid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Orderid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? KluOrderTableMap::CLASS_DEFAULT : KluOrderTableMap::OM_CLASS;
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
     * @return array           (KluOrder object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = KluOrderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = KluOrderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + KluOrderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KluOrderTableMap::OM_CLASS;
            /** @var KluOrder $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            KluOrderTableMap::addInstanceToPool($obj, $key);
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
            $key = KluOrderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = KluOrderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var KluOrder $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KluOrderTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(KluOrderTableMap::COL_ORDERID);
            $criteria->addSelectColumn(KluOrderTableMap::COL_REF_NO);
            $criteria->addSelectColumn(KluOrderTableMap::COL_BILL_ID);
            $criteria->addSelectColumn(KluOrderTableMap::COL_ACCOUNT_NO);
            $criteria->addSelectColumn(KluOrderTableMap::COL_SERVICE_TYPE);
            $criteria->addSelectColumn(KluOrderTableMap::COL_PAYMENT_DATE);
            $criteria->addSelectColumn(KluOrderTableMap::COL_PAYMENT_DUE_DATE);
            $criteria->addSelectColumn(KluOrderTableMap::COL_PAYMENT_TIME);
            $criteria->addSelectColumn(KluOrderTableMap::COL_PAYMENT_PLATFORM);
            $criteria->addSelectColumn(KluOrderTableMap::COL_CUST_EMAIL);
            $criteria->addSelectColumn(KluOrderTableMap::COL_CUST_PHONE);
            $criteria->addSelectColumn(KluOrderTableMap::COL_BILLING_PERIOD);
            $criteria->addSelectColumn(KluOrderTableMap::COL_SOLID_WASTE_RATE);
            $criteria->addSelectColumn(KluOrderTableMap::COL_SOLID_WASTE_VAT);
            $criteria->addSelectColumn(KluOrderTableMap::COL_SOLID_WASTE_TAX);
            $criteria->addSelectColumn(KluOrderTableMap::COL_LIQUID_WASTE_RATE);
            $criteria->addSelectColumn(KluOrderTableMap::COL_LIQUID_WASTE_VAT);
            $criteria->addSelectColumn(KluOrderTableMap::COL_LIQUID_WASTE_TAX);
            $criteria->addSelectColumn(KluOrderTableMap::COL_PREVIOUS_BALANCE);
            $criteria->addSelectColumn(KluOrderTableMap::COL_PAYMENT_RECEIVED);
            $criteria->addSelectColumn(KluOrderTableMap::COL_TOTAL_AMOUNT);
        } else {
            $criteria->addSelectColumn($alias . '.OrderID');
            $criteria->addSelectColumn($alias . '.ref_no');
            $criteria->addSelectColumn($alias . '.bill_id');
            $criteria->addSelectColumn($alias . '.account_no');
            $criteria->addSelectColumn($alias . '.service_type');
            $criteria->addSelectColumn($alias . '.payment_date');
            $criteria->addSelectColumn($alias . '.payment_due_date');
            $criteria->addSelectColumn($alias . '.payment_time');
            $criteria->addSelectColumn($alias . '.payment_platform');
            $criteria->addSelectColumn($alias . '.cust_email');
            $criteria->addSelectColumn($alias . '.cust_phone');
            $criteria->addSelectColumn($alias . '.billing_period');
            $criteria->addSelectColumn($alias . '.solid_waste_rate');
            $criteria->addSelectColumn($alias . '.solid_waste_vat');
            $criteria->addSelectColumn($alias . '.solid_waste_tax');
            $criteria->addSelectColumn($alias . '.liquid_waste_rate');
            $criteria->addSelectColumn($alias . '.liquid_waste_vat');
            $criteria->addSelectColumn($alias . '.liquid_waste_tax');
            $criteria->addSelectColumn($alias . '.previous_balance');
            $criteria->addSelectColumn($alias . '.payment_received');
            $criteria->addSelectColumn($alias . '.total_amount');
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
        return Propel::getServiceContainer()->getDatabaseMap(KluOrderTableMap::DATABASE_NAME)->getTable(KluOrderTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(KluOrderTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(KluOrderTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new KluOrderTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a KluOrder or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or KluOrder object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(KluOrderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \KluOrder) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KluOrderTableMap::DATABASE_NAME);
            $criteria->add(KluOrderTableMap::COL_ORDERID, (array) $values, Criteria::IN);
        }

        $query = KluOrderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            KluOrderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                KluOrderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the klu_order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return KluOrderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a KluOrder or Criteria object.
     *
     * @param mixed               $criteria Criteria or KluOrder object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluOrderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from KluOrder object
        }

        if ($criteria->containsKey(KluOrderTableMap::COL_ORDERID) && $criteria->keyContainsValue(KluOrderTableMap::COL_ORDERID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.KluOrderTableMap::COL_ORDERID.')');
        }


        // Set the correct dbName
        $query = KluOrderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // KluOrderTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
KluOrderTableMap::buildTableMap();
