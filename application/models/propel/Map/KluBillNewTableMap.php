<?php

namespace Map;

use \KluBillNew;
use \KluBillNewQuery;
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
 * This class defines the structure of the 'klu_bill_new' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class KluBillNewTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.KluBillNewTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'klu_bill_new';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\KluBillNew';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'KluBillNew';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 30;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 30;

    /**
     * the column name for the UniqueKeyID field
     */
    const COL_UNIQUEKEYID = 'klu_bill_new.UniqueKeyID';

    /**
     * the column name for the AccountNo field
     */
    const COL_ACCOUNTNO = 'klu_bill_new.AccountNo';

    /**
     * the column name for the ServiceDistrict field
     */
    const COL_SERVICEDISTRICT = 'klu_bill_new.ServiceDistrict';

    /**
     * the column name for the LastMeterReading field
     */
    const COL_LASTMETERREADING = 'klu_bill_new.LastMeterReading';

    /**
     * the column name for the CurrentMeterReading field
     */
    const COL_CURRENTMETERREADING = 'klu_bill_new.CurrentMeterReading';

    /**
     * the column name for the UnitsConsumed field
     */
    const COL_UNITSCONSUMED = 'klu_bill_new.UnitsConsumed';

    /**
     * the column name for the LastPayDate field
     */
    const COL_LASTPAYDATE = 'klu_bill_new.LastPayDate';

    /**
     * the column name for the LastPayAmt field
     */
    const COL_LASTPAYAMT = 'klu_bill_new.LastPayAmt';

    /**
     * the column name for the PriorBalance field
     */
    const COL_PRIORBALANCE = 'klu_bill_new.PriorBalance';

    /**
     * the column name for the OutstandingBalance field
     */
    const COL_OUTSTANDINGBALANCE = 'klu_bill_new.OutstandingBalance';

    /**
     * the column name for the AmountDue field
     */
    const COL_AMOUNTDUE = 'klu_bill_new.AmountDue';

    /**
     * the column name for the MeterMaintenanceCharge field
     */
    const COL_METERMAINTENANCECHARGE = 'klu_bill_new.MeterMaintenanceCharge';

    /**
     * the column name for the Discounts field
     */
    const COL_DISCOUNTS = 'klu_bill_new.Discounts';

    /**
     * the column name for the OtherCharges field
     */
    const COL_OTHERCHARGES = 'klu_bill_new.OtherCharges';

    /**
     * the column name for the PenaltyCharges field
     */
    const COL_PENALTYCHARGES = 'klu_bill_new.PenaltyCharges';

    /**
     * the column name for the StampDutyCharges field
     */
    const COL_STAMPDUTYCHARGES = 'klu_bill_new.StampDutyCharges';

    /**
     * the column name for the ServiceCharges field
     */
    const COL_SERVICECHARGES = 'klu_bill_new.ServiceCharges';

    /**
     * the column name for the RoutineCharges field
     */
    const COL_ROUTINECHARGES = 'klu_bill_new.RoutineCharges';

    /**
     * the column name for the BillServiceRate field
     */
    const COL_BILLSERVICERATE = 'klu_bill_new.BillServiceRate';

    /**
     * the column name for the ServiceTypeDesc field
     */
    const COL_SERVICETYPEDESC = 'klu_bill_new.ServiceTypeDesc';

    /**
     * the column name for the BillPeriod field
     */
    const COL_BILLPERIOD = 'klu_bill_new.BillPeriod';

    /**
     * the column name for the UsageType field
     */
    const COL_USAGETYPE = 'klu_bill_new.UsageType';

    /**
     * the column name for the MeterNumber field
     */
    const COL_METERNUMBER = 'klu_bill_new.MeterNumber';

    /**
     * the column name for the MeterType field
     */
    const COL_METERTYPE = 'klu_bill_new.MeterType';

    /**
     * the column name for the MeterCondition field
     */
    const COL_METERCONDITION = 'klu_bill_new.MeterCondition';

    /**
     * the column name for the LeakageStatus field
     */
    const COL_LEAKAGESTATUS = 'klu_bill_new.LeakageStatus';

    /**
     * the column name for the PropertyType field
     */
    const COL_PROPERTYTYPE = 'klu_bill_new.PropertyType';

    /**
     * the column name for the MeterReadDevice field
     */
    const COL_METERREADDEVICE = 'klu_bill_new.MeterReadDevice';

    /**
     * the column name for the Billmethod field
     */
    const COL_BILLMETHOD = 'klu_bill_new.Billmethod';

    /**
     * the column name for the DateCreated field
     */
    const COL_DATECREATED = 'klu_bill_new.DateCreated';

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
        self::TYPE_PHPNAME       => array('Uniquekeyid', 'Accountno', 'Servicedistrict', 'Lastmeterreading', 'Currentmeterreading', 'Unitsconsumed', 'Lastpaydate', 'Lastpayamt', 'Priorbalance', 'Outstandingbalance', 'Amountdue', 'Metermaintenancecharge', 'Discounts', 'Othercharges', 'Penaltycharges', 'Stampdutycharges', 'Servicecharges', 'Routinecharges', 'Billservicerate', 'Servicetypedesc', 'Billperiod', 'Usagetype', 'Meternumber', 'Metertype', 'Metercondition', 'Leakagestatus', 'Propertytype', 'Meterreaddevice', 'Billmethod', 'Datecreated', ),
        self::TYPE_CAMELNAME     => array('uniquekeyid', 'accountno', 'servicedistrict', 'lastmeterreading', 'currentmeterreading', 'unitsconsumed', 'lastpaydate', 'lastpayamt', 'priorbalance', 'outstandingbalance', 'amountdue', 'metermaintenancecharge', 'discounts', 'othercharges', 'penaltycharges', 'stampdutycharges', 'servicecharges', 'routinecharges', 'billservicerate', 'servicetypedesc', 'billperiod', 'usagetype', 'meternumber', 'metertype', 'metercondition', 'leakagestatus', 'propertytype', 'meterreaddevice', 'billmethod', 'datecreated', ),
        self::TYPE_COLNAME       => array(KluBillNewTableMap::COL_UNIQUEKEYID, KluBillNewTableMap::COL_ACCOUNTNO, KluBillNewTableMap::COL_SERVICEDISTRICT, KluBillNewTableMap::COL_LASTMETERREADING, KluBillNewTableMap::COL_CURRENTMETERREADING, KluBillNewTableMap::COL_UNITSCONSUMED, KluBillNewTableMap::COL_LASTPAYDATE, KluBillNewTableMap::COL_LASTPAYAMT, KluBillNewTableMap::COL_PRIORBALANCE, KluBillNewTableMap::COL_OUTSTANDINGBALANCE, KluBillNewTableMap::COL_AMOUNTDUE, KluBillNewTableMap::COL_METERMAINTENANCECHARGE, KluBillNewTableMap::COL_DISCOUNTS, KluBillNewTableMap::COL_OTHERCHARGES, KluBillNewTableMap::COL_PENALTYCHARGES, KluBillNewTableMap::COL_STAMPDUTYCHARGES, KluBillNewTableMap::COL_SERVICECHARGES, KluBillNewTableMap::COL_ROUTINECHARGES, KluBillNewTableMap::COL_BILLSERVICERATE, KluBillNewTableMap::COL_SERVICETYPEDESC, KluBillNewTableMap::COL_BILLPERIOD, KluBillNewTableMap::COL_USAGETYPE, KluBillNewTableMap::COL_METERNUMBER, KluBillNewTableMap::COL_METERTYPE, KluBillNewTableMap::COL_METERCONDITION, KluBillNewTableMap::COL_LEAKAGESTATUS, KluBillNewTableMap::COL_PROPERTYTYPE, KluBillNewTableMap::COL_METERREADDEVICE, KluBillNewTableMap::COL_BILLMETHOD, KluBillNewTableMap::COL_DATECREATED, ),
        self::TYPE_FIELDNAME     => array('UniqueKeyID', 'AccountNo', 'ServiceDistrict', 'LastMeterReading', 'CurrentMeterReading', 'UnitsConsumed', 'LastPayDate', 'LastPayAmt', 'PriorBalance', 'OutstandingBalance', 'AmountDue', 'MeterMaintenanceCharge', 'Discounts', 'OtherCharges', 'PenaltyCharges', 'StampDutyCharges', 'ServiceCharges', 'RoutineCharges', 'BillServiceRate', 'ServiceTypeDesc', 'BillPeriod', 'UsageType', 'MeterNumber', 'MeterType', 'MeterCondition', 'LeakageStatus', 'PropertyType', 'MeterReadDevice', 'Billmethod', 'DateCreated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Uniquekeyid' => 0, 'Accountno' => 1, 'Servicedistrict' => 2, 'Lastmeterreading' => 3, 'Currentmeterreading' => 4, 'Unitsconsumed' => 5, 'Lastpaydate' => 6, 'Lastpayamt' => 7, 'Priorbalance' => 8, 'Outstandingbalance' => 9, 'Amountdue' => 10, 'Metermaintenancecharge' => 11, 'Discounts' => 12, 'Othercharges' => 13, 'Penaltycharges' => 14, 'Stampdutycharges' => 15, 'Servicecharges' => 16, 'Routinecharges' => 17, 'Billservicerate' => 18, 'Servicetypedesc' => 19, 'Billperiod' => 20, 'Usagetype' => 21, 'Meternumber' => 22, 'Metertype' => 23, 'Metercondition' => 24, 'Leakagestatus' => 25, 'Propertytype' => 26, 'Meterreaddevice' => 27, 'Billmethod' => 28, 'Datecreated' => 29, ),
        self::TYPE_CAMELNAME     => array('uniquekeyid' => 0, 'accountno' => 1, 'servicedistrict' => 2, 'lastmeterreading' => 3, 'currentmeterreading' => 4, 'unitsconsumed' => 5, 'lastpaydate' => 6, 'lastpayamt' => 7, 'priorbalance' => 8, 'outstandingbalance' => 9, 'amountdue' => 10, 'metermaintenancecharge' => 11, 'discounts' => 12, 'othercharges' => 13, 'penaltycharges' => 14, 'stampdutycharges' => 15, 'servicecharges' => 16, 'routinecharges' => 17, 'billservicerate' => 18, 'servicetypedesc' => 19, 'billperiod' => 20, 'usagetype' => 21, 'meternumber' => 22, 'metertype' => 23, 'metercondition' => 24, 'leakagestatus' => 25, 'propertytype' => 26, 'meterreaddevice' => 27, 'billmethod' => 28, 'datecreated' => 29, ),
        self::TYPE_COLNAME       => array(KluBillNewTableMap::COL_UNIQUEKEYID => 0, KluBillNewTableMap::COL_ACCOUNTNO => 1, KluBillNewTableMap::COL_SERVICEDISTRICT => 2, KluBillNewTableMap::COL_LASTMETERREADING => 3, KluBillNewTableMap::COL_CURRENTMETERREADING => 4, KluBillNewTableMap::COL_UNITSCONSUMED => 5, KluBillNewTableMap::COL_LASTPAYDATE => 6, KluBillNewTableMap::COL_LASTPAYAMT => 7, KluBillNewTableMap::COL_PRIORBALANCE => 8, KluBillNewTableMap::COL_OUTSTANDINGBALANCE => 9, KluBillNewTableMap::COL_AMOUNTDUE => 10, KluBillNewTableMap::COL_METERMAINTENANCECHARGE => 11, KluBillNewTableMap::COL_DISCOUNTS => 12, KluBillNewTableMap::COL_OTHERCHARGES => 13, KluBillNewTableMap::COL_PENALTYCHARGES => 14, KluBillNewTableMap::COL_STAMPDUTYCHARGES => 15, KluBillNewTableMap::COL_SERVICECHARGES => 16, KluBillNewTableMap::COL_ROUTINECHARGES => 17, KluBillNewTableMap::COL_BILLSERVICERATE => 18, KluBillNewTableMap::COL_SERVICETYPEDESC => 19, KluBillNewTableMap::COL_BILLPERIOD => 20, KluBillNewTableMap::COL_USAGETYPE => 21, KluBillNewTableMap::COL_METERNUMBER => 22, KluBillNewTableMap::COL_METERTYPE => 23, KluBillNewTableMap::COL_METERCONDITION => 24, KluBillNewTableMap::COL_LEAKAGESTATUS => 25, KluBillNewTableMap::COL_PROPERTYTYPE => 26, KluBillNewTableMap::COL_METERREADDEVICE => 27, KluBillNewTableMap::COL_BILLMETHOD => 28, KluBillNewTableMap::COL_DATECREATED => 29, ),
        self::TYPE_FIELDNAME     => array('UniqueKeyID' => 0, 'AccountNo' => 1, 'ServiceDistrict' => 2, 'LastMeterReading' => 3, 'CurrentMeterReading' => 4, 'UnitsConsumed' => 5, 'LastPayDate' => 6, 'LastPayAmt' => 7, 'PriorBalance' => 8, 'OutstandingBalance' => 9, 'AmountDue' => 10, 'MeterMaintenanceCharge' => 11, 'Discounts' => 12, 'OtherCharges' => 13, 'PenaltyCharges' => 14, 'StampDutyCharges' => 15, 'ServiceCharges' => 16, 'RoutineCharges' => 17, 'BillServiceRate' => 18, 'ServiceTypeDesc' => 19, 'BillPeriod' => 20, 'UsageType' => 21, 'MeterNumber' => 22, 'MeterType' => 23, 'MeterCondition' => 24, 'LeakageStatus' => 25, 'PropertyType' => 26, 'MeterReadDevice' => 27, 'Billmethod' => 28, 'DateCreated' => 29, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
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
        $this->setName('klu_bill_new');
        $this->setPhpName('KluBillNew');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\KluBillNew');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('UniqueKeyID', 'Uniquekeyid', 'INTEGER', true, 10, null);
        $this->addColumn('AccountNo', 'Accountno', 'VARCHAR', true, 20, null);
        $this->addColumn('ServiceDistrict', 'Servicedistrict', 'VARCHAR', true, 50, null);
        $this->addColumn('LastMeterReading', 'Lastmeterreading', 'FLOAT', true, null, null);
        $this->addColumn('CurrentMeterReading', 'Currentmeterreading', 'FLOAT', true, null, null);
        $this->addColumn('UnitsConsumed', 'Unitsconsumed', 'FLOAT', true, null, null);
        $this->addColumn('LastPayDate', 'Lastpaydate', 'VARCHAR', true, 20, null);
        $this->addColumn('LastPayAmt', 'Lastpayamt', 'DECIMAL', true, 20, null);
        $this->addColumn('PriorBalance', 'Priorbalance', 'DECIMAL', true, 20, null);
        $this->addColumn('OutstandingBalance', 'Outstandingbalance', 'DECIMAL', true, 20, null);
        $this->addColumn('AmountDue', 'Amountdue', 'DECIMAL', true, 20, null);
        $this->addColumn('MeterMaintenanceCharge', 'Metermaintenancecharge', 'DECIMAL', true, 11, null);
        $this->addColumn('Discounts', 'Discounts', 'DECIMAL', true, 11, null);
        $this->addColumn('OtherCharges', 'Othercharges', 'DECIMAL', true, 11, null);
        $this->addColumn('PenaltyCharges', 'Penaltycharges', 'DECIMAL', true, 11, null);
        $this->addColumn('StampDutyCharges', 'Stampdutycharges', 'DECIMAL', true, 11, null);
        $this->addColumn('ServiceCharges', 'Servicecharges', 'DECIMAL', true, 11, null);
        $this->addColumn('RoutineCharges', 'Routinecharges', 'DECIMAL', true, 11, null);
        $this->addColumn('BillServiceRate', 'Billservicerate', 'DECIMAL', true, 11, null);
        $this->addColumn('ServiceTypeDesc', 'Servicetypedesc', 'VARCHAR', true, 150, null);
        $this->addColumn('BillPeriod', 'Billperiod', 'VARCHAR', true, 79, null);
        $this->addColumn('UsageType', 'Usagetype', 'VARCHAR', true, 255, null);
        $this->addColumn('MeterNumber', 'Meternumber', 'VARCHAR', true, 20, null);
        $this->addColumn('MeterType', 'Metertype', 'VARCHAR', true, 30, null);
        $this->addColumn('MeterCondition', 'Metercondition', 'VARCHAR', true, 50, null);
        $this->addColumn('LeakageStatus', 'Leakagestatus', 'VARCHAR', true, 50, null);
        $this->addColumn('PropertyType', 'Propertytype', 'VARCHAR', true, 255, null);
        $this->addColumn('MeterReadDevice', 'Meterreaddevice', 'VARCHAR', true, 30, null);
        $this->addColumn('Billmethod', 'Billmethod', 'VARCHAR', true, 50, null);
        $this->addColumn('DateCreated', 'Datecreated', 'TIMESTAMP', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uniquekeyid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uniquekeyid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uniquekeyid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uniquekeyid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uniquekeyid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Uniquekeyid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Uniquekeyid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? KluBillNewTableMap::CLASS_DEFAULT : KluBillNewTableMap::OM_CLASS;
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
     * @return array           (KluBillNew object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = KluBillNewTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = KluBillNewTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + KluBillNewTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KluBillNewTableMap::OM_CLASS;
            /** @var KluBillNew $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            KluBillNewTableMap::addInstanceToPool($obj, $key);
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
            $key = KluBillNewTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = KluBillNewTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var KluBillNew $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KluBillNewTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(KluBillNewTableMap::COL_UNIQUEKEYID);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_ACCOUNTNO);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_SERVICEDISTRICT);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_LASTMETERREADING);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_CURRENTMETERREADING);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_UNITSCONSUMED);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_LASTPAYDATE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_LASTPAYAMT);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_PRIORBALANCE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_OUTSTANDINGBALANCE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_AMOUNTDUE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_METERMAINTENANCECHARGE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_DISCOUNTS);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_OTHERCHARGES);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_PENALTYCHARGES);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_STAMPDUTYCHARGES);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_SERVICECHARGES);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_ROUTINECHARGES);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_BILLSERVICERATE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_SERVICETYPEDESC);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_BILLPERIOD);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_USAGETYPE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_METERNUMBER);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_METERTYPE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_METERCONDITION);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_LEAKAGESTATUS);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_PROPERTYTYPE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_METERREADDEVICE);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_BILLMETHOD);
            $criteria->addSelectColumn(KluBillNewTableMap::COL_DATECREATED);
        } else {
            $criteria->addSelectColumn($alias . '.UniqueKeyID');
            $criteria->addSelectColumn($alias . '.AccountNo');
            $criteria->addSelectColumn($alias . '.ServiceDistrict');
            $criteria->addSelectColumn($alias . '.LastMeterReading');
            $criteria->addSelectColumn($alias . '.CurrentMeterReading');
            $criteria->addSelectColumn($alias . '.UnitsConsumed');
            $criteria->addSelectColumn($alias . '.LastPayDate');
            $criteria->addSelectColumn($alias . '.LastPayAmt');
            $criteria->addSelectColumn($alias . '.PriorBalance');
            $criteria->addSelectColumn($alias . '.OutstandingBalance');
            $criteria->addSelectColumn($alias . '.AmountDue');
            $criteria->addSelectColumn($alias . '.MeterMaintenanceCharge');
            $criteria->addSelectColumn($alias . '.Discounts');
            $criteria->addSelectColumn($alias . '.OtherCharges');
            $criteria->addSelectColumn($alias . '.PenaltyCharges');
            $criteria->addSelectColumn($alias . '.StampDutyCharges');
            $criteria->addSelectColumn($alias . '.ServiceCharges');
            $criteria->addSelectColumn($alias . '.RoutineCharges');
            $criteria->addSelectColumn($alias . '.BillServiceRate');
            $criteria->addSelectColumn($alias . '.ServiceTypeDesc');
            $criteria->addSelectColumn($alias . '.BillPeriod');
            $criteria->addSelectColumn($alias . '.UsageType');
            $criteria->addSelectColumn($alias . '.MeterNumber');
            $criteria->addSelectColumn($alias . '.MeterType');
            $criteria->addSelectColumn($alias . '.MeterCondition');
            $criteria->addSelectColumn($alias . '.LeakageStatus');
            $criteria->addSelectColumn($alias . '.PropertyType');
            $criteria->addSelectColumn($alias . '.MeterReadDevice');
            $criteria->addSelectColumn($alias . '.Billmethod');
            $criteria->addSelectColumn($alias . '.DateCreated');
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
        return Propel::getServiceContainer()->getDatabaseMap(KluBillNewTableMap::DATABASE_NAME)->getTable(KluBillNewTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(KluBillNewTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(KluBillNewTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new KluBillNewTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a KluBillNew or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or KluBillNew object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillNewTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \KluBillNew) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KluBillNewTableMap::DATABASE_NAME);
            $criteria->add(KluBillNewTableMap::COL_UNIQUEKEYID, (array) $values, Criteria::IN);
        }

        $query = KluBillNewQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            KluBillNewTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                KluBillNewTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the klu_bill_new table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return KluBillNewQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a KluBillNew or Criteria object.
     *
     * @param mixed               $criteria Criteria or KluBillNew object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillNewTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from KluBillNew object
        }

        if ($criteria->containsKey(KluBillNewTableMap::COL_UNIQUEKEYID) && $criteria->keyContainsValue(KluBillNewTableMap::COL_UNIQUEKEYID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.KluBillNewTableMap::COL_UNIQUEKEYID.')');
        }


        // Set the correct dbName
        $query = KluBillNewQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // KluBillNewTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
KluBillNewTableMap::buildTableMap();
