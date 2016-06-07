<?php

namespace Map;

use \KluBillOl;
use \KluBillOlQuery;
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
 * This class defines the structure of the 'klu_bill_ol' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class KluBillOlTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.KluBillOlTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'klu_bill_ol';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\KluBillOl';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'KluBillOl';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 40;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 40;

    /**
     * the column name for the id field
     */
    const COL_ID = 'klu_bill_ol.id';

    /**
     * the column name for the ref_no field
     */
    const COL_REF_NO = 'klu_bill_ol.ref_no';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'klu_bill_ol.customer_id';

    /**
     * the column name for the service_type field
     */
    const COL_SERVICE_TYPE = 'klu_bill_ol.service_type';

    /**
     * the column name for the service_district_id field
     */
    const COL_SERVICE_DISTRICT_ID = 'klu_bill_ol.service_district_id';

    /**
     * the column name for the billing_cycle field
     */
    const COL_BILLING_CYCLE = 'klu_bill_ol.billing_cycle';

    /**
     * the column name for the due_date field
     */
    const COL_DUE_DATE = 'klu_bill_ol.due_date';

    /**
     * the column name for the billing_from field
     */
    const COL_BILLING_FROM = 'klu_bill_ol.billing_from';

    /**
     * the column name for the billing_to field
     */
    const COL_BILLING_TO = 'klu_bill_ol.billing_to';

    /**
     * the column name for the bill_date field
     */
    const COL_BILL_DATE = 'klu_bill_ol.bill_date';

    /**
     * the column name for the Rate field
     */
    const COL_RATE = 'klu_bill_ol.Rate';

    /**
     * the column name for the MeterNumber field
     */
    const COL_METERNUMBER = 'klu_bill_ol.MeterNumber';

    /**
     * the column name for the BillingMethod field
     */
    const COL_BILLINGMETHOD = 'klu_bill_ol.BillingMethod';

    /**
     * the column name for the DateOfLastReading field
     */
    const COL_DATEOFLASTREADING = 'klu_bill_ol.DateOfLastReading';

    /**
     * the column name for the DateOfCurrentReading field
     */
    const COL_DATEOFCURRENTREADING = 'klu_bill_ol.DateOfCurrentReading';

    /**
     * the column name for the DaysUsage field
     */
    const COL_DAYSUSAGE = 'klu_bill_ol.DaysUsage';

    /**
     * the column name for the LastMeterReading field
     */
    const COL_LASTMETERREADING = 'klu_bill_ol.LastMeterReading';

    /**
     * the column name for the CurrentMeterReading field
     */
    const COL_CURRENTMETERREADING = 'klu_bill_ol.CurrentMeterReading';

    /**
     * the column name for the UnitsConsumed field
     */
    const COL_UNITSCONSUMED = 'klu_bill_ol.UnitsConsumed';

    /**
     * the column name for the LastPaymentAmount field
     */
    const COL_LASTPAYMENTAMOUNT = 'klu_bill_ol.LastPaymentAmount';

    /**
     * the column name for the LastPaymentDate field
     */
    const COL_LASTPAYMENTDATE = 'klu_bill_ol.LastPaymentDate';

    /**
     * the column name for the MeterMaintenanceCharge field
     */
    const COL_METERMAINTENANCECHARGE = 'klu_bill_ol.MeterMaintenanceCharge';

    /**
     * the column name for the Discounts field
     */
    const COL_DISCOUNTS = 'klu_bill_ol.Discounts';

    /**
     * the column name for the OtherCharges field
     */
    const COL_OTHERCHARGES = 'klu_bill_ol.OtherCharges';

    /**
     * the column name for the PenaltyCharges field
     */
    const COL_PENALTYCHARGES = 'klu_bill_ol.PenaltyCharges';

    /**
     * the column name for the TaxCharges field
     */
    const COL_TAXCHARGES = 'klu_bill_ol.TaxCharges';

    /**
     * the column name for the RoutineCharges field
     */
    const COL_ROUTINECHARGES = 'klu_bill_ol.RoutineCharges';

    /**
     * the column name for the BuildingType field
     */
    const COL_BUILDINGTYPE = 'klu_bill_ol.BuildingType';

    /**
     * the column name for the Route field
     */
    const COL_ROUTE = 'klu_bill_ol.Route';

    /**
     * the column name for the UsageType field
     */
    const COL_USAGETYPE = 'klu_bill_ol.UsageType';

    /**
     * the column name for the service_charge field
     */
    const COL_SERVICE_CHARGE = 'klu_bill_ol.service_charge';

    /**
     * the column name for the previous_balance field
     */
    const COL_PREVIOUS_BALANCE = 'klu_bill_ol.previous_balance';

    /**
     * the column name for the payment_received field
     */
    const COL_PAYMENT_RECEIVED = 'klu_bill_ol.payment_received';

    /**
     * the column name for the last_payment_received_date field
     */
    const COL_LAST_PAYMENT_RECEIVED_DATE = 'klu_bill_ol.last_payment_received_date';

    /**
     * the column name for the current_charge field
     */
    const COL_CURRENT_CHARGE = 'klu_bill_ol.current_charge';

    /**
     * the column name for the total_due field
     */
    const COL_TOTAL_DUE = 'klu_bill_ol.total_due';

    /**
     * the column name for the invoice_no field
     */
    const COL_INVOICE_NO = 'klu_bill_ol.invoice_no';

    /**
     * the column name for the receipt_no field
     */
    const COL_RECEIPT_NO = 'klu_bill_ol.receipt_no';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'klu_bill_ol.status';

    /**
     * the column name for the created_date field
     */
    const COL_CREATED_DATE = 'klu_bill_ol.created_date';

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
        self::TYPE_PHPNAME       => array('Id', 'RefNo', 'CustomerId', 'ServiceType', 'ServiceDistrictId', 'BillingCycle', 'DueDate', 'BillingFrom', 'BillingTo', 'BillDate', 'Rate', 'Meternumber', 'Billingmethod', 'Dateoflastreading', 'Dateofcurrentreading', 'Daysusage', 'Lastmeterreading', 'Currentmeterreading', 'Unitsconsumed', 'Lastpaymentamount', 'Lastpaymentdate', 'Metermaintenancecharge', 'Discounts', 'Othercharges', 'Penaltycharges', 'Taxcharges', 'Routinecharges', 'Buildingtype', 'Route', 'Usagetype', 'ServiceCharge', 'PreviousBalance', 'PaymentReceived', 'LastPaymentReceivedDate', 'CurrentCharge', 'TotalDue', 'InvoiceNo', 'ReceiptNo', 'Status', 'CreatedDate', ),
        self::TYPE_CAMELNAME     => array('id', 'refNo', 'customerId', 'serviceType', 'serviceDistrictId', 'billingCycle', 'dueDate', 'billingFrom', 'billingTo', 'billDate', 'rate', 'meternumber', 'billingmethod', 'dateoflastreading', 'dateofcurrentreading', 'daysusage', 'lastmeterreading', 'currentmeterreading', 'unitsconsumed', 'lastpaymentamount', 'lastpaymentdate', 'metermaintenancecharge', 'discounts', 'othercharges', 'penaltycharges', 'taxcharges', 'routinecharges', 'buildingtype', 'route', 'usagetype', 'serviceCharge', 'previousBalance', 'paymentReceived', 'lastPaymentReceivedDate', 'currentCharge', 'totalDue', 'invoiceNo', 'receiptNo', 'status', 'createdDate', ),
        self::TYPE_COLNAME       => array(KluBillOlTableMap::COL_ID, KluBillOlTableMap::COL_REF_NO, KluBillOlTableMap::COL_CUSTOMER_ID, KluBillOlTableMap::COL_SERVICE_TYPE, KluBillOlTableMap::COL_SERVICE_DISTRICT_ID, KluBillOlTableMap::COL_BILLING_CYCLE, KluBillOlTableMap::COL_DUE_DATE, KluBillOlTableMap::COL_BILLING_FROM, KluBillOlTableMap::COL_BILLING_TO, KluBillOlTableMap::COL_BILL_DATE, KluBillOlTableMap::COL_RATE, KluBillOlTableMap::COL_METERNUMBER, KluBillOlTableMap::COL_BILLINGMETHOD, KluBillOlTableMap::COL_DATEOFLASTREADING, KluBillOlTableMap::COL_DATEOFCURRENTREADING, KluBillOlTableMap::COL_DAYSUSAGE, KluBillOlTableMap::COL_LASTMETERREADING, KluBillOlTableMap::COL_CURRENTMETERREADING, KluBillOlTableMap::COL_UNITSCONSUMED, KluBillOlTableMap::COL_LASTPAYMENTAMOUNT, KluBillOlTableMap::COL_LASTPAYMENTDATE, KluBillOlTableMap::COL_METERMAINTENANCECHARGE, KluBillOlTableMap::COL_DISCOUNTS, KluBillOlTableMap::COL_OTHERCHARGES, KluBillOlTableMap::COL_PENALTYCHARGES, KluBillOlTableMap::COL_TAXCHARGES, KluBillOlTableMap::COL_ROUTINECHARGES, KluBillOlTableMap::COL_BUILDINGTYPE, KluBillOlTableMap::COL_ROUTE, KluBillOlTableMap::COL_USAGETYPE, KluBillOlTableMap::COL_SERVICE_CHARGE, KluBillOlTableMap::COL_PREVIOUS_BALANCE, KluBillOlTableMap::COL_PAYMENT_RECEIVED, KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, KluBillOlTableMap::COL_CURRENT_CHARGE, KluBillOlTableMap::COL_TOTAL_DUE, KluBillOlTableMap::COL_INVOICE_NO, KluBillOlTableMap::COL_RECEIPT_NO, KluBillOlTableMap::COL_STATUS, KluBillOlTableMap::COL_CREATED_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'ref_no', 'customer_id', 'service_type', 'service_district_id', 'billing_cycle', 'due_date', 'billing_from', 'billing_to', 'bill_date', 'Rate', 'MeterNumber', 'BillingMethod', 'DateOfLastReading', 'DateOfCurrentReading', 'DaysUsage', 'LastMeterReading', 'CurrentMeterReading', 'UnitsConsumed', 'LastPaymentAmount', 'LastPaymentDate', 'MeterMaintenanceCharge', 'Discounts', 'OtherCharges', 'PenaltyCharges', 'TaxCharges', 'RoutineCharges', 'BuildingType', 'Route', 'UsageType', 'service_charge', 'previous_balance', 'payment_received', 'last_payment_received_date', 'current_charge', 'total_due', 'invoice_no', 'receipt_no', 'status', 'created_date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'RefNo' => 1, 'CustomerId' => 2, 'ServiceType' => 3, 'ServiceDistrictId' => 4, 'BillingCycle' => 5, 'DueDate' => 6, 'BillingFrom' => 7, 'BillingTo' => 8, 'BillDate' => 9, 'Rate' => 10, 'Meternumber' => 11, 'Billingmethod' => 12, 'Dateoflastreading' => 13, 'Dateofcurrentreading' => 14, 'Daysusage' => 15, 'Lastmeterreading' => 16, 'Currentmeterreading' => 17, 'Unitsconsumed' => 18, 'Lastpaymentamount' => 19, 'Lastpaymentdate' => 20, 'Metermaintenancecharge' => 21, 'Discounts' => 22, 'Othercharges' => 23, 'Penaltycharges' => 24, 'Taxcharges' => 25, 'Routinecharges' => 26, 'Buildingtype' => 27, 'Route' => 28, 'Usagetype' => 29, 'ServiceCharge' => 30, 'PreviousBalance' => 31, 'PaymentReceived' => 32, 'LastPaymentReceivedDate' => 33, 'CurrentCharge' => 34, 'TotalDue' => 35, 'InvoiceNo' => 36, 'ReceiptNo' => 37, 'Status' => 38, 'CreatedDate' => 39, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'refNo' => 1, 'customerId' => 2, 'serviceType' => 3, 'serviceDistrictId' => 4, 'billingCycle' => 5, 'dueDate' => 6, 'billingFrom' => 7, 'billingTo' => 8, 'billDate' => 9, 'rate' => 10, 'meternumber' => 11, 'billingmethod' => 12, 'dateoflastreading' => 13, 'dateofcurrentreading' => 14, 'daysusage' => 15, 'lastmeterreading' => 16, 'currentmeterreading' => 17, 'unitsconsumed' => 18, 'lastpaymentamount' => 19, 'lastpaymentdate' => 20, 'metermaintenancecharge' => 21, 'discounts' => 22, 'othercharges' => 23, 'penaltycharges' => 24, 'taxcharges' => 25, 'routinecharges' => 26, 'buildingtype' => 27, 'route' => 28, 'usagetype' => 29, 'serviceCharge' => 30, 'previousBalance' => 31, 'paymentReceived' => 32, 'lastPaymentReceivedDate' => 33, 'currentCharge' => 34, 'totalDue' => 35, 'invoiceNo' => 36, 'receiptNo' => 37, 'status' => 38, 'createdDate' => 39, ),
        self::TYPE_COLNAME       => array(KluBillOlTableMap::COL_ID => 0, KluBillOlTableMap::COL_REF_NO => 1, KluBillOlTableMap::COL_CUSTOMER_ID => 2, KluBillOlTableMap::COL_SERVICE_TYPE => 3, KluBillOlTableMap::COL_SERVICE_DISTRICT_ID => 4, KluBillOlTableMap::COL_BILLING_CYCLE => 5, KluBillOlTableMap::COL_DUE_DATE => 6, KluBillOlTableMap::COL_BILLING_FROM => 7, KluBillOlTableMap::COL_BILLING_TO => 8, KluBillOlTableMap::COL_BILL_DATE => 9, KluBillOlTableMap::COL_RATE => 10, KluBillOlTableMap::COL_METERNUMBER => 11, KluBillOlTableMap::COL_BILLINGMETHOD => 12, KluBillOlTableMap::COL_DATEOFLASTREADING => 13, KluBillOlTableMap::COL_DATEOFCURRENTREADING => 14, KluBillOlTableMap::COL_DAYSUSAGE => 15, KluBillOlTableMap::COL_LASTMETERREADING => 16, KluBillOlTableMap::COL_CURRENTMETERREADING => 17, KluBillOlTableMap::COL_UNITSCONSUMED => 18, KluBillOlTableMap::COL_LASTPAYMENTAMOUNT => 19, KluBillOlTableMap::COL_LASTPAYMENTDATE => 20, KluBillOlTableMap::COL_METERMAINTENANCECHARGE => 21, KluBillOlTableMap::COL_DISCOUNTS => 22, KluBillOlTableMap::COL_OTHERCHARGES => 23, KluBillOlTableMap::COL_PENALTYCHARGES => 24, KluBillOlTableMap::COL_TAXCHARGES => 25, KluBillOlTableMap::COL_ROUTINECHARGES => 26, KluBillOlTableMap::COL_BUILDINGTYPE => 27, KluBillOlTableMap::COL_ROUTE => 28, KluBillOlTableMap::COL_USAGETYPE => 29, KluBillOlTableMap::COL_SERVICE_CHARGE => 30, KluBillOlTableMap::COL_PREVIOUS_BALANCE => 31, KluBillOlTableMap::COL_PAYMENT_RECEIVED => 32, KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE => 33, KluBillOlTableMap::COL_CURRENT_CHARGE => 34, KluBillOlTableMap::COL_TOTAL_DUE => 35, KluBillOlTableMap::COL_INVOICE_NO => 36, KluBillOlTableMap::COL_RECEIPT_NO => 37, KluBillOlTableMap::COL_STATUS => 38, KluBillOlTableMap::COL_CREATED_DATE => 39, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'ref_no' => 1, 'customer_id' => 2, 'service_type' => 3, 'service_district_id' => 4, 'billing_cycle' => 5, 'due_date' => 6, 'billing_from' => 7, 'billing_to' => 8, 'bill_date' => 9, 'Rate' => 10, 'MeterNumber' => 11, 'BillingMethod' => 12, 'DateOfLastReading' => 13, 'DateOfCurrentReading' => 14, 'DaysUsage' => 15, 'LastMeterReading' => 16, 'CurrentMeterReading' => 17, 'UnitsConsumed' => 18, 'LastPaymentAmount' => 19, 'LastPaymentDate' => 20, 'MeterMaintenanceCharge' => 21, 'Discounts' => 22, 'OtherCharges' => 23, 'PenaltyCharges' => 24, 'TaxCharges' => 25, 'RoutineCharges' => 26, 'BuildingType' => 27, 'Route' => 28, 'UsageType' => 29, 'service_charge' => 30, 'previous_balance' => 31, 'payment_received' => 32, 'last_payment_received_date' => 33, 'current_charge' => 34, 'total_due' => 35, 'invoice_no' => 36, 'receipt_no' => 37, 'status' => 38, 'created_date' => 39, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, )
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
        $this->setName('klu_bill_ol');
        $this->setPhpName('KluBillOl');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\KluBillOl');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('ref_no', 'RefNo', 'VARCHAR', true, 50, null);
        $this->addColumn('customer_id', 'CustomerId', 'VARCHAR', true, 100, null);
        $this->addColumn('service_type', 'ServiceType', 'VARCHAR', true, 50, null);
        $this->addColumn('service_district_id', 'ServiceDistrictId', 'VARCHAR', true, 20, null);
        $this->addColumn('billing_cycle', 'BillingCycle', 'VARCHAR', true, 50, null);
        $this->addColumn('due_date', 'DueDate', 'VARCHAR', true, 50, null);
        $this->addColumn('billing_from', 'BillingFrom', 'VARCHAR', true, 50, null);
        $this->addColumn('billing_to', 'BillingTo', 'VARCHAR', true, 50, null);
        $this->addColumn('bill_date', 'BillDate', 'VARCHAR', true, 50, null);
        $this->addColumn('Rate', 'Rate', 'VARCHAR', true, 100, null);
        $this->addColumn('MeterNumber', 'Meternumber', 'VARCHAR', true, 20, null);
        $this->addColumn('BillingMethod', 'Billingmethod', 'VARCHAR', true, 100, null);
        $this->addColumn('DateOfLastReading', 'Dateoflastreading', 'VARCHAR', true, 50, null);
        $this->addColumn('DateOfCurrentReading', 'Dateofcurrentreading', 'VARCHAR', true, 50, null);
        $this->addColumn('DaysUsage', 'Daysusage', 'INTEGER', true, null, null);
        $this->addColumn('LastMeterReading', 'Lastmeterreading', 'INTEGER', true, null, null);
        $this->addColumn('CurrentMeterReading', 'Currentmeterreading', 'INTEGER', true, null, null);
        $this->addColumn('UnitsConsumed', 'Unitsconsumed', 'DECIMAL', true, 11, null);
        $this->addColumn('LastPaymentAmount', 'Lastpaymentamount', 'DECIMAL', true, 11, null);
        $this->addColumn('LastPaymentDate', 'Lastpaymentdate', 'VARCHAR', true, 50, null);
        $this->addColumn('MeterMaintenanceCharge', 'Metermaintenancecharge', 'DECIMAL', true, 11, null);
        $this->addColumn('Discounts', 'Discounts', 'DECIMAL', true, 11, null);
        $this->addColumn('OtherCharges', 'Othercharges', 'DECIMAL', true, 11, null);
        $this->addColumn('PenaltyCharges', 'Penaltycharges', 'DECIMAL', true, 11, null);
        $this->addColumn('TaxCharges', 'Taxcharges', 'DECIMAL', true, 11, null);
        $this->addColumn('RoutineCharges', 'Routinecharges', 'DECIMAL', true, 11, null);
        $this->addColumn('BuildingType', 'Buildingtype', 'VARCHAR', true, 100, null);
        $this->addColumn('Route', 'Route', 'VARCHAR', true, 10, null);
        $this->addColumn('UsageType', 'Usagetype', 'VARCHAR', true, 255, null);
        $this->addColumn('service_charge', 'ServiceCharge', 'VARCHAR', true, 50, null);
        $this->addColumn('previous_balance', 'PreviousBalance', 'VARCHAR', true, 50, null);
        $this->addColumn('payment_received', 'PaymentReceived', 'VARCHAR', true, 50, null);
        $this->addColumn('last_payment_received_date', 'LastPaymentReceivedDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('current_charge', 'CurrentCharge', 'DECIMAL', true, 11, null);
        $this->addColumn('total_due', 'TotalDue', 'VARCHAR', true, 50, null);
        $this->addColumn('invoice_no', 'InvoiceNo', 'VARCHAR', true, 50, null);
        $this->addColumn('receipt_no', 'ReceiptNo', 'VARCHAR', true, 50, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, null);
        $this->addColumn('created_date', 'CreatedDate', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
        return $withPrefix ? KluBillOlTableMap::CLASS_DEFAULT : KluBillOlTableMap::OM_CLASS;
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
     * @return array           (KluBillOl object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = KluBillOlTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = KluBillOlTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + KluBillOlTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KluBillOlTableMap::OM_CLASS;
            /** @var KluBillOl $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            KluBillOlTableMap::addInstanceToPool($obj, $key);
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
            $key = KluBillOlTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = KluBillOlTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var KluBillOl $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KluBillOlTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(KluBillOlTableMap::COL_ID);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_REF_NO);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_SERVICE_TYPE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_SERVICE_DISTRICT_ID);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_BILLING_CYCLE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_DUE_DATE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_BILLING_FROM);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_BILLING_TO);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_BILL_DATE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_RATE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_METERNUMBER);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_BILLINGMETHOD);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_DATEOFLASTREADING);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_DATEOFCURRENTREADING);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_DAYSUSAGE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_LASTMETERREADING);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_CURRENTMETERREADING);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_UNITSCONSUMED);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_LASTPAYMENTAMOUNT);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_LASTPAYMENTDATE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_METERMAINTENANCECHARGE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_DISCOUNTS);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_OTHERCHARGES);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_PENALTYCHARGES);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_TAXCHARGES);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_ROUTINECHARGES);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_BUILDINGTYPE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_ROUTE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_USAGETYPE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_SERVICE_CHARGE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_PREVIOUS_BALANCE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_PAYMENT_RECEIVED);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_CURRENT_CHARGE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_TOTAL_DUE);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_INVOICE_NO);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_RECEIPT_NO);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_STATUS);
            $criteria->addSelectColumn(KluBillOlTableMap::COL_CREATED_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ref_no');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.service_type');
            $criteria->addSelectColumn($alias . '.service_district_id');
            $criteria->addSelectColumn($alias . '.billing_cycle');
            $criteria->addSelectColumn($alias . '.due_date');
            $criteria->addSelectColumn($alias . '.billing_from');
            $criteria->addSelectColumn($alias . '.billing_to');
            $criteria->addSelectColumn($alias . '.bill_date');
            $criteria->addSelectColumn($alias . '.Rate');
            $criteria->addSelectColumn($alias . '.MeterNumber');
            $criteria->addSelectColumn($alias . '.BillingMethod');
            $criteria->addSelectColumn($alias . '.DateOfLastReading');
            $criteria->addSelectColumn($alias . '.DateOfCurrentReading');
            $criteria->addSelectColumn($alias . '.DaysUsage');
            $criteria->addSelectColumn($alias . '.LastMeterReading');
            $criteria->addSelectColumn($alias . '.CurrentMeterReading');
            $criteria->addSelectColumn($alias . '.UnitsConsumed');
            $criteria->addSelectColumn($alias . '.LastPaymentAmount');
            $criteria->addSelectColumn($alias . '.LastPaymentDate');
            $criteria->addSelectColumn($alias . '.MeterMaintenanceCharge');
            $criteria->addSelectColumn($alias . '.Discounts');
            $criteria->addSelectColumn($alias . '.OtherCharges');
            $criteria->addSelectColumn($alias . '.PenaltyCharges');
            $criteria->addSelectColumn($alias . '.TaxCharges');
            $criteria->addSelectColumn($alias . '.RoutineCharges');
            $criteria->addSelectColumn($alias . '.BuildingType');
            $criteria->addSelectColumn($alias . '.Route');
            $criteria->addSelectColumn($alias . '.UsageType');
            $criteria->addSelectColumn($alias . '.service_charge');
            $criteria->addSelectColumn($alias . '.previous_balance');
            $criteria->addSelectColumn($alias . '.payment_received');
            $criteria->addSelectColumn($alias . '.last_payment_received_date');
            $criteria->addSelectColumn($alias . '.current_charge');
            $criteria->addSelectColumn($alias . '.total_due');
            $criteria->addSelectColumn($alias . '.invoice_no');
            $criteria->addSelectColumn($alias . '.receipt_no');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.created_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(KluBillOlTableMap::DATABASE_NAME)->getTable(KluBillOlTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(KluBillOlTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(KluBillOlTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new KluBillOlTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a KluBillOl or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or KluBillOl object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillOlTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \KluBillOl) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KluBillOlTableMap::DATABASE_NAME);
            $criteria->add(KluBillOlTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = KluBillOlQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            KluBillOlTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                KluBillOlTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the klu_bill_ol table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return KluBillOlQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a KluBillOl or Criteria object.
     *
     * @param mixed               $criteria Criteria or KluBillOl object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillOlTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from KluBillOl object
        }

        if ($criteria->containsKey(KluBillOlTableMap::COL_ID) && $criteria->keyContainsValue(KluBillOlTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.KluBillOlTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = KluBillOlQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // KluBillOlTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
KluBillOlTableMap::buildTableMap();
