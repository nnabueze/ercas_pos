<?php

namespace Map;

use \KluBill;
use \KluBillQuery;
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
 * This class defines the structure of the 'klu_bill' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class KluBillTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.KluBillTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'klu_bill';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\KluBill';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'KluBill';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 45;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 45;

    /**
     * the column name for the id field
     */
    const COL_ID = 'klu_bill.id';

    /**
     * the column name for the ref_no field
     */
    const COL_REF_NO = 'klu_bill.ref_no';

    /**
     * the column name for the UniqueKeyID field
     */
    const COL_UNIQUEKEYID = 'klu_bill.UniqueKeyID';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'klu_bill.customer_id';

    /**
     * the column name for the account_no field
     */
    const COL_ACCOUNT_NO = 'klu_bill.account_no';

    /**
     * the column name for the service_type field
     */
    const COL_SERVICE_TYPE = 'klu_bill.service_type';

    /**
     * the column name for the service_district_id field
     */
    const COL_SERVICE_DISTRICT_ID = 'klu_bill.service_district_id';

    /**
     * the column name for the billing_cycle field
     */
    const COL_BILLING_CYCLE = 'klu_bill.billing_cycle';

    /**
     * the column name for the due_date field
     */
    const COL_DUE_DATE = 'klu_bill.due_date';

    /**
     * the column name for the billing_from field
     */
    const COL_BILLING_FROM = 'klu_bill.billing_from';

    /**
     * the column name for the billing_to field
     */
    const COL_BILLING_TO = 'klu_bill.billing_to';

    /**
     * the column name for the bill_date field
     */
    const COL_BILL_DATE = 'klu_bill.bill_date';

    /**
     * the column name for the Rate field
     */
    const COL_RATE = 'klu_bill.Rate';

    /**
     * the column name for the MeterNumber field
     */
    const COL_METERNUMBER = 'klu_bill.MeterNumber';

    /**
     * the column name for the BillingMethod field
     */
    const COL_BILLINGMETHOD = 'klu_bill.BillingMethod';

    /**
     * the column name for the DateOfLastReading field
     */
    const COL_DATEOFLASTREADING = 'klu_bill.DateOfLastReading';

    /**
     * the column name for the DateOfCurrentReading field
     */
    const COL_DATEOFCURRENTREADING = 'klu_bill.DateOfCurrentReading';

    /**
     * the column name for the DaysUsage field
     */
    const COL_DAYSUSAGE = 'klu_bill.DaysUsage';

    /**
     * the column name for the LastMeterReading field
     */
    const COL_LASTMETERREADING = 'klu_bill.LastMeterReading';

    /**
     * the column name for the CurrentMeterReading field
     */
    const COL_CURRENTMETERREADING = 'klu_bill.CurrentMeterReading';

    /**
     * the column name for the UnitsConsumed field
     */
    const COL_UNITSCONSUMED = 'klu_bill.UnitsConsumed';

    /**
     * the column name for the LastPaymentAmount field
     */
    const COL_LASTPAYMENTAMOUNT = 'klu_bill.LastPaymentAmount';

    /**
     * the column name for the LastPaymentDate field
     */
    const COL_LASTPAYMENTDATE = 'klu_bill.LastPaymentDate';

    /**
     * the column name for the MeterMaintenanceCharge field
     */
    const COL_METERMAINTENANCECHARGE = 'klu_bill.MeterMaintenanceCharge';

    /**
     * the column name for the Discounts field
     */
    const COL_DISCOUNTS = 'klu_bill.Discounts';

    /**
     * the column name for the OtherCharges field
     */
    const COL_OTHERCHARGES = 'klu_bill.OtherCharges';

    /**
     * the column name for the PenaltyCharges field
     */
    const COL_PENALTYCHARGES = 'klu_bill.PenaltyCharges';

    /**
     * the column name for the TaxCharges field
     */
    const COL_TAXCHARGES = 'klu_bill.TaxCharges';

    /**
     * the column name for the Charges field
     */
    const COL_CHARGES = 'klu_bill.Charges';

    /**
     * the column name for the RoutineCharges field
     */
    const COL_ROUTINECHARGES = 'klu_bill.RoutineCharges';

    /**
     * the column name for the BillServiceRate field
     */
    const COL_BILLSERVICERATE = 'klu_bill.BillServiceRate';

    /**
     * the column name for the BuildingType field
     */
    const COL_BUILDINGTYPE = 'klu_bill.BuildingType';

    /**
     * the column name for the Route field
     */
    const COL_ROUTE = 'klu_bill.Route';

    /**
     * the column name for the UsageType field
     */
    const COL_USAGETYPE = 'klu_bill.UsageType';

    /**
     * the column name for the service_charge field
     */
    const COL_SERVICE_CHARGE = 'klu_bill.service_charge';

    /**
     * the column name for the previous_balance field
     */
    const COL_PREVIOUS_BALANCE = 'klu_bill.previous_balance';

    /**
     * the column name for the payment_received field
     */
    const COL_PAYMENT_RECEIVED = 'klu_bill.payment_received';

    /**
     * the column name for the last_payment_received_date field
     */
    const COL_LAST_PAYMENT_RECEIVED_DATE = 'klu_bill.last_payment_received_date';

    /**
     * the column name for the current_charge field
     */
    const COL_CURRENT_CHARGE = 'klu_bill.current_charge';

    /**
     * the column name for the total_due field
     */
    const COL_TOTAL_DUE = 'klu_bill.total_due';

    /**
     * the column name for the invoice_no field
     */
    const COL_INVOICE_NO = 'klu_bill.invoice_no';

    /**
     * the column name for the receipt_no field
     */
    const COL_RECEIPT_NO = 'klu_bill.receipt_no';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'klu_bill.date_created';

    /**
     * the column name for the creator field
     */
    const COL_CREATOR = 'klu_bill.creator';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'klu_bill.status';

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
        self::TYPE_PHPNAME       => array('Id', 'RefNo', 'Uniquekeyid', 'CustomerId', 'AccountNo', 'ServiceType', 'ServiceDistrictId', 'BillingCycle', 'DueDate', 'BillingFrom', 'BillingTo', 'BillDate', 'Rate', 'Meternumber', 'Billingmethod', 'Dateoflastreading', 'Dateofcurrentreading', 'Daysusage', 'Lastmeterreading', 'Currentmeterreading', 'Unitsconsumed', 'Lastpaymentamount', 'Lastpaymentdate', 'Metermaintenancecharge', 'Discounts', 'Othercharges', 'Penaltycharges', 'Taxcharges', 'Charges', 'Routinecharges', 'Billservicerate', 'Buildingtype', 'Route', 'Usagetype', 'ServiceCharge', 'PreviousBalance', 'PaymentReceived', 'LastPaymentReceivedDate', 'CurrentCharge', 'TotalDue', 'InvoiceNo', 'ReceiptNo', 'DateCreated', 'Creator', 'Status', ),
        self::TYPE_CAMELNAME     => array('id', 'refNo', 'uniquekeyid', 'customerId', 'accountNo', 'serviceType', 'serviceDistrictId', 'billingCycle', 'dueDate', 'billingFrom', 'billingTo', 'billDate', 'rate', 'meternumber', 'billingmethod', 'dateoflastreading', 'dateofcurrentreading', 'daysusage', 'lastmeterreading', 'currentmeterreading', 'unitsconsumed', 'lastpaymentamount', 'lastpaymentdate', 'metermaintenancecharge', 'discounts', 'othercharges', 'penaltycharges', 'taxcharges', 'charges', 'routinecharges', 'billservicerate', 'buildingtype', 'route', 'usagetype', 'serviceCharge', 'previousBalance', 'paymentReceived', 'lastPaymentReceivedDate', 'currentCharge', 'totalDue', 'invoiceNo', 'receiptNo', 'dateCreated', 'creator', 'status', ),
        self::TYPE_COLNAME       => array(KluBillTableMap::COL_ID, KluBillTableMap::COL_REF_NO, KluBillTableMap::COL_UNIQUEKEYID, KluBillTableMap::COL_CUSTOMER_ID, KluBillTableMap::COL_ACCOUNT_NO, KluBillTableMap::COL_SERVICE_TYPE, KluBillTableMap::COL_SERVICE_DISTRICT_ID, KluBillTableMap::COL_BILLING_CYCLE, KluBillTableMap::COL_DUE_DATE, KluBillTableMap::COL_BILLING_FROM, KluBillTableMap::COL_BILLING_TO, KluBillTableMap::COL_BILL_DATE, KluBillTableMap::COL_RATE, KluBillTableMap::COL_METERNUMBER, KluBillTableMap::COL_BILLINGMETHOD, KluBillTableMap::COL_DATEOFLASTREADING, KluBillTableMap::COL_DATEOFCURRENTREADING, KluBillTableMap::COL_DAYSUSAGE, KluBillTableMap::COL_LASTMETERREADING, KluBillTableMap::COL_CURRENTMETERREADING, KluBillTableMap::COL_UNITSCONSUMED, KluBillTableMap::COL_LASTPAYMENTAMOUNT, KluBillTableMap::COL_LASTPAYMENTDATE, KluBillTableMap::COL_METERMAINTENANCECHARGE, KluBillTableMap::COL_DISCOUNTS, KluBillTableMap::COL_OTHERCHARGES, KluBillTableMap::COL_PENALTYCHARGES, KluBillTableMap::COL_TAXCHARGES, KluBillTableMap::COL_CHARGES, KluBillTableMap::COL_ROUTINECHARGES, KluBillTableMap::COL_BILLSERVICERATE, KluBillTableMap::COL_BUILDINGTYPE, KluBillTableMap::COL_ROUTE, KluBillTableMap::COL_USAGETYPE, KluBillTableMap::COL_SERVICE_CHARGE, KluBillTableMap::COL_PREVIOUS_BALANCE, KluBillTableMap::COL_PAYMENT_RECEIVED, KluBillTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, KluBillTableMap::COL_CURRENT_CHARGE, KluBillTableMap::COL_TOTAL_DUE, KluBillTableMap::COL_INVOICE_NO, KluBillTableMap::COL_RECEIPT_NO, KluBillTableMap::COL_DATE_CREATED, KluBillTableMap::COL_CREATOR, KluBillTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'ref_no', 'UniqueKeyID', 'customer_id', 'account_no', 'service_type', 'service_district_id', 'billing_cycle', 'due_date', 'billing_from', 'billing_to', 'bill_date', 'Rate', 'MeterNumber', 'BillingMethod', 'DateOfLastReading', 'DateOfCurrentReading', 'DaysUsage', 'LastMeterReading', 'CurrentMeterReading', 'UnitsConsumed', 'LastPaymentAmount', 'LastPaymentDate', 'MeterMaintenanceCharge', 'Discounts', 'OtherCharges', 'PenaltyCharges', 'TaxCharges', 'Charges', 'RoutineCharges', 'BillServiceRate', 'BuildingType', 'Route', 'UsageType', 'service_charge', 'previous_balance', 'payment_received', 'last_payment_received_date', 'current_charge', 'total_due', 'invoice_no', 'receipt_no', 'date_created', 'creator', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'RefNo' => 1, 'Uniquekeyid' => 2, 'CustomerId' => 3, 'AccountNo' => 4, 'ServiceType' => 5, 'ServiceDistrictId' => 6, 'BillingCycle' => 7, 'DueDate' => 8, 'BillingFrom' => 9, 'BillingTo' => 10, 'BillDate' => 11, 'Rate' => 12, 'Meternumber' => 13, 'Billingmethod' => 14, 'Dateoflastreading' => 15, 'Dateofcurrentreading' => 16, 'Daysusage' => 17, 'Lastmeterreading' => 18, 'Currentmeterreading' => 19, 'Unitsconsumed' => 20, 'Lastpaymentamount' => 21, 'Lastpaymentdate' => 22, 'Metermaintenancecharge' => 23, 'Discounts' => 24, 'Othercharges' => 25, 'Penaltycharges' => 26, 'Taxcharges' => 27, 'Charges' => 28, 'Routinecharges' => 29, 'Billservicerate' => 30, 'Buildingtype' => 31, 'Route' => 32, 'Usagetype' => 33, 'ServiceCharge' => 34, 'PreviousBalance' => 35, 'PaymentReceived' => 36, 'LastPaymentReceivedDate' => 37, 'CurrentCharge' => 38, 'TotalDue' => 39, 'InvoiceNo' => 40, 'ReceiptNo' => 41, 'DateCreated' => 42, 'Creator' => 43, 'Status' => 44, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'refNo' => 1, 'uniquekeyid' => 2, 'customerId' => 3, 'accountNo' => 4, 'serviceType' => 5, 'serviceDistrictId' => 6, 'billingCycle' => 7, 'dueDate' => 8, 'billingFrom' => 9, 'billingTo' => 10, 'billDate' => 11, 'rate' => 12, 'meternumber' => 13, 'billingmethod' => 14, 'dateoflastreading' => 15, 'dateofcurrentreading' => 16, 'daysusage' => 17, 'lastmeterreading' => 18, 'currentmeterreading' => 19, 'unitsconsumed' => 20, 'lastpaymentamount' => 21, 'lastpaymentdate' => 22, 'metermaintenancecharge' => 23, 'discounts' => 24, 'othercharges' => 25, 'penaltycharges' => 26, 'taxcharges' => 27, 'charges' => 28, 'routinecharges' => 29, 'billservicerate' => 30, 'buildingtype' => 31, 'route' => 32, 'usagetype' => 33, 'serviceCharge' => 34, 'previousBalance' => 35, 'paymentReceived' => 36, 'lastPaymentReceivedDate' => 37, 'currentCharge' => 38, 'totalDue' => 39, 'invoiceNo' => 40, 'receiptNo' => 41, 'dateCreated' => 42, 'creator' => 43, 'status' => 44, ),
        self::TYPE_COLNAME       => array(KluBillTableMap::COL_ID => 0, KluBillTableMap::COL_REF_NO => 1, KluBillTableMap::COL_UNIQUEKEYID => 2, KluBillTableMap::COL_CUSTOMER_ID => 3, KluBillTableMap::COL_ACCOUNT_NO => 4, KluBillTableMap::COL_SERVICE_TYPE => 5, KluBillTableMap::COL_SERVICE_DISTRICT_ID => 6, KluBillTableMap::COL_BILLING_CYCLE => 7, KluBillTableMap::COL_DUE_DATE => 8, KluBillTableMap::COL_BILLING_FROM => 9, KluBillTableMap::COL_BILLING_TO => 10, KluBillTableMap::COL_BILL_DATE => 11, KluBillTableMap::COL_RATE => 12, KluBillTableMap::COL_METERNUMBER => 13, KluBillTableMap::COL_BILLINGMETHOD => 14, KluBillTableMap::COL_DATEOFLASTREADING => 15, KluBillTableMap::COL_DATEOFCURRENTREADING => 16, KluBillTableMap::COL_DAYSUSAGE => 17, KluBillTableMap::COL_LASTMETERREADING => 18, KluBillTableMap::COL_CURRENTMETERREADING => 19, KluBillTableMap::COL_UNITSCONSUMED => 20, KluBillTableMap::COL_LASTPAYMENTAMOUNT => 21, KluBillTableMap::COL_LASTPAYMENTDATE => 22, KluBillTableMap::COL_METERMAINTENANCECHARGE => 23, KluBillTableMap::COL_DISCOUNTS => 24, KluBillTableMap::COL_OTHERCHARGES => 25, KluBillTableMap::COL_PENALTYCHARGES => 26, KluBillTableMap::COL_TAXCHARGES => 27, KluBillTableMap::COL_CHARGES => 28, KluBillTableMap::COL_ROUTINECHARGES => 29, KluBillTableMap::COL_BILLSERVICERATE => 30, KluBillTableMap::COL_BUILDINGTYPE => 31, KluBillTableMap::COL_ROUTE => 32, KluBillTableMap::COL_USAGETYPE => 33, KluBillTableMap::COL_SERVICE_CHARGE => 34, KluBillTableMap::COL_PREVIOUS_BALANCE => 35, KluBillTableMap::COL_PAYMENT_RECEIVED => 36, KluBillTableMap::COL_LAST_PAYMENT_RECEIVED_DATE => 37, KluBillTableMap::COL_CURRENT_CHARGE => 38, KluBillTableMap::COL_TOTAL_DUE => 39, KluBillTableMap::COL_INVOICE_NO => 40, KluBillTableMap::COL_RECEIPT_NO => 41, KluBillTableMap::COL_DATE_CREATED => 42, KluBillTableMap::COL_CREATOR => 43, KluBillTableMap::COL_STATUS => 44, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'ref_no' => 1, 'UniqueKeyID' => 2, 'customer_id' => 3, 'account_no' => 4, 'service_type' => 5, 'service_district_id' => 6, 'billing_cycle' => 7, 'due_date' => 8, 'billing_from' => 9, 'billing_to' => 10, 'bill_date' => 11, 'Rate' => 12, 'MeterNumber' => 13, 'BillingMethod' => 14, 'DateOfLastReading' => 15, 'DateOfCurrentReading' => 16, 'DaysUsage' => 17, 'LastMeterReading' => 18, 'CurrentMeterReading' => 19, 'UnitsConsumed' => 20, 'LastPaymentAmount' => 21, 'LastPaymentDate' => 22, 'MeterMaintenanceCharge' => 23, 'Discounts' => 24, 'OtherCharges' => 25, 'PenaltyCharges' => 26, 'TaxCharges' => 27, 'Charges' => 28, 'RoutineCharges' => 29, 'BillServiceRate' => 30, 'BuildingType' => 31, 'Route' => 32, 'UsageType' => 33, 'service_charge' => 34, 'previous_balance' => 35, 'payment_received' => 36, 'last_payment_received_date' => 37, 'current_charge' => 38, 'total_due' => 39, 'invoice_no' => 40, 'receipt_no' => 41, 'date_created' => 42, 'creator' => 43, 'status' => 44, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, )
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
        $this->setName('klu_bill');
        $this->setPhpName('KluBill');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\KluBill');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 20, null);
        $this->addColumn('ref_no', 'RefNo', 'VARCHAR', true, 50, null);
        $this->addColumn('UniqueKeyID', 'Uniquekeyid', 'INTEGER', true, 50, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('account_no', 'AccountNo', 'VARCHAR', true, 50, null);
        $this->addColumn('service_type', 'ServiceType', 'VARCHAR', true, 50, null);
        $this->addColumn('service_district_id', 'ServiceDistrictId', 'VARCHAR', true, 20, null);
        $this->addColumn('billing_cycle', 'BillingCycle', 'VARCHAR', true, 50, null);
        $this->addColumn('due_date', 'DueDate', 'VARCHAR', true, 50, null);
        $this->addColumn('billing_from', 'BillingFrom', 'VARCHAR', true, 50, null);
        $this->addColumn('billing_to', 'BillingTo', 'VARCHAR', true, 50, null);
        $this->addColumn('bill_date', 'BillDate', 'DATE', true, null, null);
        $this->addColumn('Rate', 'Rate', 'VARCHAR', true, 100, null);
        $this->addColumn('MeterNumber', 'Meternumber', 'VARCHAR', true, 20, null);
        $this->addColumn('BillingMethod', 'Billingmethod', 'VARCHAR', true, 100, null);
        $this->addColumn('DateOfLastReading', 'Dateoflastreading', 'DATE', true, null, null);
        $this->addColumn('DateOfCurrentReading', 'Dateofcurrentreading', 'DATE', true, null, null);
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
        $this->addColumn('Charges', 'Charges', 'DECIMAL', true, 20, null);
        $this->addColumn('RoutineCharges', 'Routinecharges', 'DECIMAL', true, 20, null);
        $this->addColumn('BillServiceRate', 'Billservicerate', 'INTEGER', true, 10, null);
        $this->addColumn('BuildingType', 'Buildingtype', 'VARCHAR', true, 100, null);
        $this->addColumn('Route', 'Route', 'VARCHAR', true, 10, null);
        $this->addColumn('UsageType', 'Usagetype', 'VARCHAR', true, 255, null);
        $this->addColumn('service_charge', 'ServiceCharge', 'DECIMAL', true, 20, null);
        $this->addColumn('previous_balance', 'PreviousBalance', 'DECIMAL', true, 20, null);
        $this->addColumn('payment_received', 'PaymentReceived', 'DECIMAL', true, 20, null);
        $this->addColumn('last_payment_received_date', 'LastPaymentReceivedDate', 'TIMESTAMP', true, null, null);
        $this->addColumn('current_charge', 'CurrentCharge', 'DECIMAL', true, 11, null);
        $this->addColumn('total_due', 'TotalDue', 'DECIMAL', true, 20, null);
        $this->addColumn('invoice_no', 'InvoiceNo', 'VARCHAR', true, 50, null);
        $this->addColumn('receipt_no', 'ReceiptNo', 'VARCHAR', true, 50, null);
        $this->addColumn('date_created', 'DateCreated', 'TIMESTAMP', true, null, null);
        $this->addColumn('creator', 'Creator', 'VARCHAR', true, 50, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, null);
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
        return $withPrefix ? KluBillTableMap::CLASS_DEFAULT : KluBillTableMap::OM_CLASS;
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
     * @return array           (KluBill object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = KluBillTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = KluBillTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + KluBillTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KluBillTableMap::OM_CLASS;
            /** @var KluBill $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            KluBillTableMap::addInstanceToPool($obj, $key);
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
            $key = KluBillTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = KluBillTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var KluBill $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KluBillTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(KluBillTableMap::COL_ID);
            $criteria->addSelectColumn(KluBillTableMap::COL_REF_NO);
            $criteria->addSelectColumn(KluBillTableMap::COL_UNIQUEKEYID);
            $criteria->addSelectColumn(KluBillTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(KluBillTableMap::COL_ACCOUNT_NO);
            $criteria->addSelectColumn(KluBillTableMap::COL_SERVICE_TYPE);
            $criteria->addSelectColumn(KluBillTableMap::COL_SERVICE_DISTRICT_ID);
            $criteria->addSelectColumn(KluBillTableMap::COL_BILLING_CYCLE);
            $criteria->addSelectColumn(KluBillTableMap::COL_DUE_DATE);
            $criteria->addSelectColumn(KluBillTableMap::COL_BILLING_FROM);
            $criteria->addSelectColumn(KluBillTableMap::COL_BILLING_TO);
            $criteria->addSelectColumn(KluBillTableMap::COL_BILL_DATE);
            $criteria->addSelectColumn(KluBillTableMap::COL_RATE);
            $criteria->addSelectColumn(KluBillTableMap::COL_METERNUMBER);
            $criteria->addSelectColumn(KluBillTableMap::COL_BILLINGMETHOD);
            $criteria->addSelectColumn(KluBillTableMap::COL_DATEOFLASTREADING);
            $criteria->addSelectColumn(KluBillTableMap::COL_DATEOFCURRENTREADING);
            $criteria->addSelectColumn(KluBillTableMap::COL_DAYSUSAGE);
            $criteria->addSelectColumn(KluBillTableMap::COL_LASTMETERREADING);
            $criteria->addSelectColumn(KluBillTableMap::COL_CURRENTMETERREADING);
            $criteria->addSelectColumn(KluBillTableMap::COL_UNITSCONSUMED);
            $criteria->addSelectColumn(KluBillTableMap::COL_LASTPAYMENTAMOUNT);
            $criteria->addSelectColumn(KluBillTableMap::COL_LASTPAYMENTDATE);
            $criteria->addSelectColumn(KluBillTableMap::COL_METERMAINTENANCECHARGE);
            $criteria->addSelectColumn(KluBillTableMap::COL_DISCOUNTS);
            $criteria->addSelectColumn(KluBillTableMap::COL_OTHERCHARGES);
            $criteria->addSelectColumn(KluBillTableMap::COL_PENALTYCHARGES);
            $criteria->addSelectColumn(KluBillTableMap::COL_TAXCHARGES);
            $criteria->addSelectColumn(KluBillTableMap::COL_CHARGES);
            $criteria->addSelectColumn(KluBillTableMap::COL_ROUTINECHARGES);
            $criteria->addSelectColumn(KluBillTableMap::COL_BILLSERVICERATE);
            $criteria->addSelectColumn(KluBillTableMap::COL_BUILDINGTYPE);
            $criteria->addSelectColumn(KluBillTableMap::COL_ROUTE);
            $criteria->addSelectColumn(KluBillTableMap::COL_USAGETYPE);
            $criteria->addSelectColumn(KluBillTableMap::COL_SERVICE_CHARGE);
            $criteria->addSelectColumn(KluBillTableMap::COL_PREVIOUS_BALANCE);
            $criteria->addSelectColumn(KluBillTableMap::COL_PAYMENT_RECEIVED);
            $criteria->addSelectColumn(KluBillTableMap::COL_LAST_PAYMENT_RECEIVED_DATE);
            $criteria->addSelectColumn(KluBillTableMap::COL_CURRENT_CHARGE);
            $criteria->addSelectColumn(KluBillTableMap::COL_TOTAL_DUE);
            $criteria->addSelectColumn(KluBillTableMap::COL_INVOICE_NO);
            $criteria->addSelectColumn(KluBillTableMap::COL_RECEIPT_NO);
            $criteria->addSelectColumn(KluBillTableMap::COL_DATE_CREATED);
            $criteria->addSelectColumn(KluBillTableMap::COL_CREATOR);
            $criteria->addSelectColumn(KluBillTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.ref_no');
            $criteria->addSelectColumn($alias . '.UniqueKeyID');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.account_no');
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
            $criteria->addSelectColumn($alias . '.Charges');
            $criteria->addSelectColumn($alias . '.RoutineCharges');
            $criteria->addSelectColumn($alias . '.BillServiceRate');
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
            $criteria->addSelectColumn($alias . '.date_created');
            $criteria->addSelectColumn($alias . '.creator');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(KluBillTableMap::DATABASE_NAME)->getTable(KluBillTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(KluBillTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(KluBillTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new KluBillTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a KluBill or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or KluBill object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \KluBill) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KluBillTableMap::DATABASE_NAME);
            $criteria->add(KluBillTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = KluBillQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            KluBillTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                KluBillTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the klu_bill table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return KluBillQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a KluBill or Criteria object.
     *
     * @param mixed               $criteria Criteria or KluBill object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from KluBill object
        }

        if ($criteria->containsKey(KluBillTableMap::COL_ID) && $criteria->keyContainsValue(KluBillTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.KluBillTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = KluBillQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // KluBillTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
KluBillTableMap::buildTableMap();
