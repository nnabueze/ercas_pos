<?php

namespace Base;

use \KluBillNew as ChildKluBillNew;
use \KluBillNewQuery as ChildKluBillNewQuery;
use \Exception;
use \PDO;
use Map\KluBillNewTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'klu_bill_new' table.
 *
 *
 *
 * @method     ChildKluBillNewQuery orderByUniquekeyid($order = Criteria::ASC) Order by the UniqueKeyID column
 * @method     ChildKluBillNewQuery orderByAccountno($order = Criteria::ASC) Order by the AccountNo column
 * @method     ChildKluBillNewQuery orderByServicedistrict($order = Criteria::ASC) Order by the ServiceDistrict column
 * @method     ChildKluBillNewQuery orderByLastmeterreading($order = Criteria::ASC) Order by the LastMeterReading column
 * @method     ChildKluBillNewQuery orderByCurrentmeterreading($order = Criteria::ASC) Order by the CurrentMeterReading column
 * @method     ChildKluBillNewQuery orderByUnitsconsumed($order = Criteria::ASC) Order by the UnitsConsumed column
 * @method     ChildKluBillNewQuery orderByLastpaydate($order = Criteria::ASC) Order by the LastPayDate column
 * @method     ChildKluBillNewQuery orderByLastpayamt($order = Criteria::ASC) Order by the LastPayAmt column
 * @method     ChildKluBillNewQuery orderByPriorbalance($order = Criteria::ASC) Order by the PriorBalance column
 * @method     ChildKluBillNewQuery orderByOutstandingbalance($order = Criteria::ASC) Order by the OutstandingBalance column
 * @method     ChildKluBillNewQuery orderByAmountdue($order = Criteria::ASC) Order by the AmountDue column
 * @method     ChildKluBillNewQuery orderByMetermaintenancecharge($order = Criteria::ASC) Order by the MeterMaintenanceCharge column
 * @method     ChildKluBillNewQuery orderByDiscounts($order = Criteria::ASC) Order by the Discounts column
 * @method     ChildKluBillNewQuery orderByOthercharges($order = Criteria::ASC) Order by the OtherCharges column
 * @method     ChildKluBillNewQuery orderByPenaltycharges($order = Criteria::ASC) Order by the PenaltyCharges column
 * @method     ChildKluBillNewQuery orderByStampdutycharges($order = Criteria::ASC) Order by the StampDutyCharges column
 * @method     ChildKluBillNewQuery orderByServicecharges($order = Criteria::ASC) Order by the ServiceCharges column
 * @method     ChildKluBillNewQuery orderByRoutinecharges($order = Criteria::ASC) Order by the RoutineCharges column
 * @method     ChildKluBillNewQuery orderByBillservicerate($order = Criteria::ASC) Order by the BillServiceRate column
 * @method     ChildKluBillNewQuery orderByServicetypedesc($order = Criteria::ASC) Order by the ServiceTypeDesc column
 * @method     ChildKluBillNewQuery orderByBillperiod($order = Criteria::ASC) Order by the BillPeriod column
 * @method     ChildKluBillNewQuery orderByUsagetype($order = Criteria::ASC) Order by the UsageType column
 * @method     ChildKluBillNewQuery orderByMeternumber($order = Criteria::ASC) Order by the MeterNumber column
 * @method     ChildKluBillNewQuery orderByMetertype($order = Criteria::ASC) Order by the MeterType column
 * @method     ChildKluBillNewQuery orderByMetercondition($order = Criteria::ASC) Order by the MeterCondition column
 * @method     ChildKluBillNewQuery orderByLeakagestatus($order = Criteria::ASC) Order by the LeakageStatus column
 * @method     ChildKluBillNewQuery orderByPropertytype($order = Criteria::ASC) Order by the PropertyType column
 * @method     ChildKluBillNewQuery orderByMeterreaddevice($order = Criteria::ASC) Order by the MeterReadDevice column
 * @method     ChildKluBillNewQuery orderByBillmethod($order = Criteria::ASC) Order by the Billmethod column
 * @method     ChildKluBillNewQuery orderByDatecreated($order = Criteria::ASC) Order by the DateCreated column
 *
 * @method     ChildKluBillNewQuery groupByUniquekeyid() Group by the UniqueKeyID column
 * @method     ChildKluBillNewQuery groupByAccountno() Group by the AccountNo column
 * @method     ChildKluBillNewQuery groupByServicedistrict() Group by the ServiceDistrict column
 * @method     ChildKluBillNewQuery groupByLastmeterreading() Group by the LastMeterReading column
 * @method     ChildKluBillNewQuery groupByCurrentmeterreading() Group by the CurrentMeterReading column
 * @method     ChildKluBillNewQuery groupByUnitsconsumed() Group by the UnitsConsumed column
 * @method     ChildKluBillNewQuery groupByLastpaydate() Group by the LastPayDate column
 * @method     ChildKluBillNewQuery groupByLastpayamt() Group by the LastPayAmt column
 * @method     ChildKluBillNewQuery groupByPriorbalance() Group by the PriorBalance column
 * @method     ChildKluBillNewQuery groupByOutstandingbalance() Group by the OutstandingBalance column
 * @method     ChildKluBillNewQuery groupByAmountdue() Group by the AmountDue column
 * @method     ChildKluBillNewQuery groupByMetermaintenancecharge() Group by the MeterMaintenanceCharge column
 * @method     ChildKluBillNewQuery groupByDiscounts() Group by the Discounts column
 * @method     ChildKluBillNewQuery groupByOthercharges() Group by the OtherCharges column
 * @method     ChildKluBillNewQuery groupByPenaltycharges() Group by the PenaltyCharges column
 * @method     ChildKluBillNewQuery groupByStampdutycharges() Group by the StampDutyCharges column
 * @method     ChildKluBillNewQuery groupByServicecharges() Group by the ServiceCharges column
 * @method     ChildKluBillNewQuery groupByRoutinecharges() Group by the RoutineCharges column
 * @method     ChildKluBillNewQuery groupByBillservicerate() Group by the BillServiceRate column
 * @method     ChildKluBillNewQuery groupByServicetypedesc() Group by the ServiceTypeDesc column
 * @method     ChildKluBillNewQuery groupByBillperiod() Group by the BillPeriod column
 * @method     ChildKluBillNewQuery groupByUsagetype() Group by the UsageType column
 * @method     ChildKluBillNewQuery groupByMeternumber() Group by the MeterNumber column
 * @method     ChildKluBillNewQuery groupByMetertype() Group by the MeterType column
 * @method     ChildKluBillNewQuery groupByMetercondition() Group by the MeterCondition column
 * @method     ChildKluBillNewQuery groupByLeakagestatus() Group by the LeakageStatus column
 * @method     ChildKluBillNewQuery groupByPropertytype() Group by the PropertyType column
 * @method     ChildKluBillNewQuery groupByMeterreaddevice() Group by the MeterReadDevice column
 * @method     ChildKluBillNewQuery groupByBillmethod() Group by the Billmethod column
 * @method     ChildKluBillNewQuery groupByDatecreated() Group by the DateCreated column
 *
 * @method     ChildKluBillNewQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKluBillNewQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKluBillNewQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKluBillNewQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKluBillNewQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKluBillNewQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKluBillNew findOne(ConnectionInterface $con = null) Return the first ChildKluBillNew matching the query
 * @method     ChildKluBillNew findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKluBillNew matching the query, or a new ChildKluBillNew object populated from the query conditions when no match is found
 *
 * @method     ChildKluBillNew findOneByUniquekeyid(int $UniqueKeyID) Return the first ChildKluBillNew filtered by the UniqueKeyID column
 * @method     ChildKluBillNew findOneByAccountno(string $AccountNo) Return the first ChildKluBillNew filtered by the AccountNo column
 * @method     ChildKluBillNew findOneByServicedistrict(string $ServiceDistrict) Return the first ChildKluBillNew filtered by the ServiceDistrict column
 * @method     ChildKluBillNew findOneByLastmeterreading(double $LastMeterReading) Return the first ChildKluBillNew filtered by the LastMeterReading column
 * @method     ChildKluBillNew findOneByCurrentmeterreading(double $CurrentMeterReading) Return the first ChildKluBillNew filtered by the CurrentMeterReading column
 * @method     ChildKluBillNew findOneByUnitsconsumed(double $UnitsConsumed) Return the first ChildKluBillNew filtered by the UnitsConsumed column
 * @method     ChildKluBillNew findOneByLastpaydate(string $LastPayDate) Return the first ChildKluBillNew filtered by the LastPayDate column
 * @method     ChildKluBillNew findOneByLastpayamt(string $LastPayAmt) Return the first ChildKluBillNew filtered by the LastPayAmt column
 * @method     ChildKluBillNew findOneByPriorbalance(string $PriorBalance) Return the first ChildKluBillNew filtered by the PriorBalance column
 * @method     ChildKluBillNew findOneByOutstandingbalance(string $OutstandingBalance) Return the first ChildKluBillNew filtered by the OutstandingBalance column
 * @method     ChildKluBillNew findOneByAmountdue(string $AmountDue) Return the first ChildKluBillNew filtered by the AmountDue column
 * @method     ChildKluBillNew findOneByMetermaintenancecharge(string $MeterMaintenanceCharge) Return the first ChildKluBillNew filtered by the MeterMaintenanceCharge column
 * @method     ChildKluBillNew findOneByDiscounts(string $Discounts) Return the first ChildKluBillNew filtered by the Discounts column
 * @method     ChildKluBillNew findOneByOthercharges(string $OtherCharges) Return the first ChildKluBillNew filtered by the OtherCharges column
 * @method     ChildKluBillNew findOneByPenaltycharges(string $PenaltyCharges) Return the first ChildKluBillNew filtered by the PenaltyCharges column
 * @method     ChildKluBillNew findOneByStampdutycharges(string $StampDutyCharges) Return the first ChildKluBillNew filtered by the StampDutyCharges column
 * @method     ChildKluBillNew findOneByServicecharges(string $ServiceCharges) Return the first ChildKluBillNew filtered by the ServiceCharges column
 * @method     ChildKluBillNew findOneByRoutinecharges(string $RoutineCharges) Return the first ChildKluBillNew filtered by the RoutineCharges column
 * @method     ChildKluBillNew findOneByBillservicerate(string $BillServiceRate) Return the first ChildKluBillNew filtered by the BillServiceRate column
 * @method     ChildKluBillNew findOneByServicetypedesc(string $ServiceTypeDesc) Return the first ChildKluBillNew filtered by the ServiceTypeDesc column
 * @method     ChildKluBillNew findOneByBillperiod(string $BillPeriod) Return the first ChildKluBillNew filtered by the BillPeriod column
 * @method     ChildKluBillNew findOneByUsagetype(string $UsageType) Return the first ChildKluBillNew filtered by the UsageType column
 * @method     ChildKluBillNew findOneByMeternumber(string $MeterNumber) Return the first ChildKluBillNew filtered by the MeterNumber column
 * @method     ChildKluBillNew findOneByMetertype(string $MeterType) Return the first ChildKluBillNew filtered by the MeterType column
 * @method     ChildKluBillNew findOneByMetercondition(string $MeterCondition) Return the first ChildKluBillNew filtered by the MeterCondition column
 * @method     ChildKluBillNew findOneByLeakagestatus(string $LeakageStatus) Return the first ChildKluBillNew filtered by the LeakageStatus column
 * @method     ChildKluBillNew findOneByPropertytype(string $PropertyType) Return the first ChildKluBillNew filtered by the PropertyType column
 * @method     ChildKluBillNew findOneByMeterreaddevice(string $MeterReadDevice) Return the first ChildKluBillNew filtered by the MeterReadDevice column
 * @method     ChildKluBillNew findOneByBillmethod(string $Billmethod) Return the first ChildKluBillNew filtered by the Billmethod column
 * @method     ChildKluBillNew findOneByDatecreated(string $DateCreated) Return the first ChildKluBillNew filtered by the DateCreated column *

 * @method     ChildKluBillNew requirePk($key, ConnectionInterface $con = null) Return the ChildKluBillNew by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOne(ConnectionInterface $con = null) Return the first ChildKluBillNew matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluBillNew requireOneByUniquekeyid(int $UniqueKeyID) Return the first ChildKluBillNew filtered by the UniqueKeyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByAccountno(string $AccountNo) Return the first ChildKluBillNew filtered by the AccountNo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByServicedistrict(string $ServiceDistrict) Return the first ChildKluBillNew filtered by the ServiceDistrict column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByLastmeterreading(double $LastMeterReading) Return the first ChildKluBillNew filtered by the LastMeterReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByCurrentmeterreading(double $CurrentMeterReading) Return the first ChildKluBillNew filtered by the CurrentMeterReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByUnitsconsumed(double $UnitsConsumed) Return the first ChildKluBillNew filtered by the UnitsConsumed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByLastpaydate(string $LastPayDate) Return the first ChildKluBillNew filtered by the LastPayDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByLastpayamt(string $LastPayAmt) Return the first ChildKluBillNew filtered by the LastPayAmt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByPriorbalance(string $PriorBalance) Return the first ChildKluBillNew filtered by the PriorBalance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByOutstandingbalance(string $OutstandingBalance) Return the first ChildKluBillNew filtered by the OutstandingBalance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByAmountdue(string $AmountDue) Return the first ChildKluBillNew filtered by the AmountDue column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByMetermaintenancecharge(string $MeterMaintenanceCharge) Return the first ChildKluBillNew filtered by the MeterMaintenanceCharge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByDiscounts(string $Discounts) Return the first ChildKluBillNew filtered by the Discounts column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByOthercharges(string $OtherCharges) Return the first ChildKluBillNew filtered by the OtherCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByPenaltycharges(string $PenaltyCharges) Return the first ChildKluBillNew filtered by the PenaltyCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByStampdutycharges(string $StampDutyCharges) Return the first ChildKluBillNew filtered by the StampDutyCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByServicecharges(string $ServiceCharges) Return the first ChildKluBillNew filtered by the ServiceCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByRoutinecharges(string $RoutineCharges) Return the first ChildKluBillNew filtered by the RoutineCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByBillservicerate(string $BillServiceRate) Return the first ChildKluBillNew filtered by the BillServiceRate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByServicetypedesc(string $ServiceTypeDesc) Return the first ChildKluBillNew filtered by the ServiceTypeDesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByBillperiod(string $BillPeriod) Return the first ChildKluBillNew filtered by the BillPeriod column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByUsagetype(string $UsageType) Return the first ChildKluBillNew filtered by the UsageType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByMeternumber(string $MeterNumber) Return the first ChildKluBillNew filtered by the MeterNumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByMetertype(string $MeterType) Return the first ChildKluBillNew filtered by the MeterType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByMetercondition(string $MeterCondition) Return the first ChildKluBillNew filtered by the MeterCondition column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByLeakagestatus(string $LeakageStatus) Return the first ChildKluBillNew filtered by the LeakageStatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByPropertytype(string $PropertyType) Return the first ChildKluBillNew filtered by the PropertyType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByMeterreaddevice(string $MeterReadDevice) Return the first ChildKluBillNew filtered by the MeterReadDevice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByBillmethod(string $Billmethod) Return the first ChildKluBillNew filtered by the Billmethod column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillNew requireOneByDatecreated(string $DateCreated) Return the first ChildKluBillNew filtered by the DateCreated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluBillNew[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKluBillNew objects based on current ModelCriteria
 * @method     ChildKluBillNew[]|ObjectCollection findByUniquekeyid(int $UniqueKeyID) Return ChildKluBillNew objects filtered by the UniqueKeyID column
 * @method     ChildKluBillNew[]|ObjectCollection findByAccountno(string $AccountNo) Return ChildKluBillNew objects filtered by the AccountNo column
 * @method     ChildKluBillNew[]|ObjectCollection findByServicedistrict(string $ServiceDistrict) Return ChildKluBillNew objects filtered by the ServiceDistrict column
 * @method     ChildKluBillNew[]|ObjectCollection findByLastmeterreading(double $LastMeterReading) Return ChildKluBillNew objects filtered by the LastMeterReading column
 * @method     ChildKluBillNew[]|ObjectCollection findByCurrentmeterreading(double $CurrentMeterReading) Return ChildKluBillNew objects filtered by the CurrentMeterReading column
 * @method     ChildKluBillNew[]|ObjectCollection findByUnitsconsumed(double $UnitsConsumed) Return ChildKluBillNew objects filtered by the UnitsConsumed column
 * @method     ChildKluBillNew[]|ObjectCollection findByLastpaydate(string $LastPayDate) Return ChildKluBillNew objects filtered by the LastPayDate column
 * @method     ChildKluBillNew[]|ObjectCollection findByLastpayamt(string $LastPayAmt) Return ChildKluBillNew objects filtered by the LastPayAmt column
 * @method     ChildKluBillNew[]|ObjectCollection findByPriorbalance(string $PriorBalance) Return ChildKluBillNew objects filtered by the PriorBalance column
 * @method     ChildKluBillNew[]|ObjectCollection findByOutstandingbalance(string $OutstandingBalance) Return ChildKluBillNew objects filtered by the OutstandingBalance column
 * @method     ChildKluBillNew[]|ObjectCollection findByAmountdue(string $AmountDue) Return ChildKluBillNew objects filtered by the AmountDue column
 * @method     ChildKluBillNew[]|ObjectCollection findByMetermaintenancecharge(string $MeterMaintenanceCharge) Return ChildKluBillNew objects filtered by the MeterMaintenanceCharge column
 * @method     ChildKluBillNew[]|ObjectCollection findByDiscounts(string $Discounts) Return ChildKluBillNew objects filtered by the Discounts column
 * @method     ChildKluBillNew[]|ObjectCollection findByOthercharges(string $OtherCharges) Return ChildKluBillNew objects filtered by the OtherCharges column
 * @method     ChildKluBillNew[]|ObjectCollection findByPenaltycharges(string $PenaltyCharges) Return ChildKluBillNew objects filtered by the PenaltyCharges column
 * @method     ChildKluBillNew[]|ObjectCollection findByStampdutycharges(string $StampDutyCharges) Return ChildKluBillNew objects filtered by the StampDutyCharges column
 * @method     ChildKluBillNew[]|ObjectCollection findByServicecharges(string $ServiceCharges) Return ChildKluBillNew objects filtered by the ServiceCharges column
 * @method     ChildKluBillNew[]|ObjectCollection findByRoutinecharges(string $RoutineCharges) Return ChildKluBillNew objects filtered by the RoutineCharges column
 * @method     ChildKluBillNew[]|ObjectCollection findByBillservicerate(string $BillServiceRate) Return ChildKluBillNew objects filtered by the BillServiceRate column
 * @method     ChildKluBillNew[]|ObjectCollection findByServicetypedesc(string $ServiceTypeDesc) Return ChildKluBillNew objects filtered by the ServiceTypeDesc column
 * @method     ChildKluBillNew[]|ObjectCollection findByBillperiod(string $BillPeriod) Return ChildKluBillNew objects filtered by the BillPeriod column
 * @method     ChildKluBillNew[]|ObjectCollection findByUsagetype(string $UsageType) Return ChildKluBillNew objects filtered by the UsageType column
 * @method     ChildKluBillNew[]|ObjectCollection findByMeternumber(string $MeterNumber) Return ChildKluBillNew objects filtered by the MeterNumber column
 * @method     ChildKluBillNew[]|ObjectCollection findByMetertype(string $MeterType) Return ChildKluBillNew objects filtered by the MeterType column
 * @method     ChildKluBillNew[]|ObjectCollection findByMetercondition(string $MeterCondition) Return ChildKluBillNew objects filtered by the MeterCondition column
 * @method     ChildKluBillNew[]|ObjectCollection findByLeakagestatus(string $LeakageStatus) Return ChildKluBillNew objects filtered by the LeakageStatus column
 * @method     ChildKluBillNew[]|ObjectCollection findByPropertytype(string $PropertyType) Return ChildKluBillNew objects filtered by the PropertyType column
 * @method     ChildKluBillNew[]|ObjectCollection findByMeterreaddevice(string $MeterReadDevice) Return ChildKluBillNew objects filtered by the MeterReadDevice column
 * @method     ChildKluBillNew[]|ObjectCollection findByBillmethod(string $Billmethod) Return ChildKluBillNew objects filtered by the Billmethod column
 * @method     ChildKluBillNew[]|ObjectCollection findByDatecreated(string $DateCreated) Return ChildKluBillNew objects filtered by the DateCreated column
 * @method     ChildKluBillNew[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KluBillNewQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KluBillNewQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KluBillNew', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKluBillNewQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKluBillNewQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKluBillNewQuery) {
            return $criteria;
        }
        $query = new ChildKluBillNewQuery();
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
     * @return ChildKluBillNew|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluBillNewTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KluBillNewTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildKluBillNew A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT UniqueKeyID, AccountNo, ServiceDistrict, LastMeterReading, CurrentMeterReading, UnitsConsumed, LastPayDate, LastPayAmt, PriorBalance, OutstandingBalance, AmountDue, MeterMaintenanceCharge, Discounts, OtherCharges, PenaltyCharges, StampDutyCharges, ServiceCharges, RoutineCharges, BillServiceRate, ServiceTypeDesc, BillPeriod, UsageType, MeterNumber, MeterType, MeterCondition, LeakageStatus, PropertyType, MeterReadDevice, Billmethod, DateCreated FROM klu_bill_new WHERE UniqueKeyID = :p0';
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
            /** @var ChildKluBillNew $obj */
            $obj = new ChildKluBillNew();
            $obj->hydrate($row);
            KluBillNewTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildKluBillNew|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KluBillNewTableMap::COL_UNIQUEKEYID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KluBillNewTableMap::COL_UNIQUEKEYID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the UniqueKeyID column
     *
     * Example usage:
     * <code>
     * $query->filterByUniquekeyid(1234); // WHERE UniqueKeyID = 1234
     * $query->filterByUniquekeyid(array(12, 34)); // WHERE UniqueKeyID IN (12, 34)
     * $query->filterByUniquekeyid(array('min' => 12)); // WHERE UniqueKeyID > 12
     * </code>
     *
     * @param     mixed $uniquekeyid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByUniquekeyid($uniquekeyid = null, $comparison = null)
    {
        if (is_array($uniquekeyid)) {
            $useMinMax = false;
            if (isset($uniquekeyid['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_UNIQUEKEYID, $uniquekeyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uniquekeyid['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_UNIQUEKEYID, $uniquekeyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_UNIQUEKEYID, $uniquekeyid, $comparison);
    }

    /**
     * Filter the query on the AccountNo column
     *
     * Example usage:
     * <code>
     * $query->filterByAccountno('fooValue');   // WHERE AccountNo = 'fooValue'
     * $query->filterByAccountno('%fooValue%'); // WHERE AccountNo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $accountno The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByAccountno($accountno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($accountno)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $accountno)) {
                $accountno = str_replace('*', '%', $accountno);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_ACCOUNTNO, $accountno, $comparison);
    }

    /**
     * Filter the query on the ServiceDistrict column
     *
     * Example usage:
     * <code>
     * $query->filterByServicedistrict('fooValue');   // WHERE ServiceDistrict = 'fooValue'
     * $query->filterByServicedistrict('%fooValue%'); // WHERE ServiceDistrict LIKE '%fooValue%'
     * </code>
     *
     * @param     string $servicedistrict The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByServicedistrict($servicedistrict = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($servicedistrict)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $servicedistrict)) {
                $servicedistrict = str_replace('*', '%', $servicedistrict);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_SERVICEDISTRICT, $servicedistrict, $comparison);
    }

    /**
     * Filter the query on the LastMeterReading column
     *
     * Example usage:
     * <code>
     * $query->filterByLastmeterreading(1234); // WHERE LastMeterReading = 1234
     * $query->filterByLastmeterreading(array(12, 34)); // WHERE LastMeterReading IN (12, 34)
     * $query->filterByLastmeterreading(array('min' => 12)); // WHERE LastMeterReading > 12
     * </code>
     *
     * @param     mixed $lastmeterreading The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByLastmeterreading($lastmeterreading = null, $comparison = null)
    {
        if (is_array($lastmeterreading)) {
            $useMinMax = false;
            if (isset($lastmeterreading['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_LASTMETERREADING, $lastmeterreading['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastmeterreading['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_LASTMETERREADING, $lastmeterreading['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_LASTMETERREADING, $lastmeterreading, $comparison);
    }

    /**
     * Filter the query on the CurrentMeterReading column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentmeterreading(1234); // WHERE CurrentMeterReading = 1234
     * $query->filterByCurrentmeterreading(array(12, 34)); // WHERE CurrentMeterReading IN (12, 34)
     * $query->filterByCurrentmeterreading(array('min' => 12)); // WHERE CurrentMeterReading > 12
     * </code>
     *
     * @param     mixed $currentmeterreading The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByCurrentmeterreading($currentmeterreading = null, $comparison = null)
    {
        if (is_array($currentmeterreading)) {
            $useMinMax = false;
            if (isset($currentmeterreading['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_CURRENTMETERREADING, $currentmeterreading['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentmeterreading['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_CURRENTMETERREADING, $currentmeterreading['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_CURRENTMETERREADING, $currentmeterreading, $comparison);
    }

    /**
     * Filter the query on the UnitsConsumed column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitsconsumed(1234); // WHERE UnitsConsumed = 1234
     * $query->filterByUnitsconsumed(array(12, 34)); // WHERE UnitsConsumed IN (12, 34)
     * $query->filterByUnitsconsumed(array('min' => 12)); // WHERE UnitsConsumed > 12
     * </code>
     *
     * @param     mixed $unitsconsumed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByUnitsconsumed($unitsconsumed = null, $comparison = null)
    {
        if (is_array($unitsconsumed)) {
            $useMinMax = false;
            if (isset($unitsconsumed['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_UNITSCONSUMED, $unitsconsumed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitsconsumed['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_UNITSCONSUMED, $unitsconsumed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_UNITSCONSUMED, $unitsconsumed, $comparison);
    }

    /**
     * Filter the query on the LastPayDate column
     *
     * Example usage:
     * <code>
     * $query->filterByLastpaydate('fooValue');   // WHERE LastPayDate = 'fooValue'
     * $query->filterByLastpaydate('%fooValue%'); // WHERE LastPayDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastpaydate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByLastpaydate($lastpaydate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastpaydate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastpaydate)) {
                $lastpaydate = str_replace('*', '%', $lastpaydate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_LASTPAYDATE, $lastpaydate, $comparison);
    }

    /**
     * Filter the query on the LastPayAmt column
     *
     * Example usage:
     * <code>
     * $query->filterByLastpayamt(1234); // WHERE LastPayAmt = 1234
     * $query->filterByLastpayamt(array(12, 34)); // WHERE LastPayAmt IN (12, 34)
     * $query->filterByLastpayamt(array('min' => 12)); // WHERE LastPayAmt > 12
     * </code>
     *
     * @param     mixed $lastpayamt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByLastpayamt($lastpayamt = null, $comparison = null)
    {
        if (is_array($lastpayamt)) {
            $useMinMax = false;
            if (isset($lastpayamt['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_LASTPAYAMT, $lastpayamt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastpayamt['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_LASTPAYAMT, $lastpayamt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_LASTPAYAMT, $lastpayamt, $comparison);
    }

    /**
     * Filter the query on the PriorBalance column
     *
     * Example usage:
     * <code>
     * $query->filterByPriorbalance(1234); // WHERE PriorBalance = 1234
     * $query->filterByPriorbalance(array(12, 34)); // WHERE PriorBalance IN (12, 34)
     * $query->filterByPriorbalance(array('min' => 12)); // WHERE PriorBalance > 12
     * </code>
     *
     * @param     mixed $priorbalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByPriorbalance($priorbalance = null, $comparison = null)
    {
        if (is_array($priorbalance)) {
            $useMinMax = false;
            if (isset($priorbalance['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_PRIORBALANCE, $priorbalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priorbalance['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_PRIORBALANCE, $priorbalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_PRIORBALANCE, $priorbalance, $comparison);
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
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByOutstandingbalance($outstandingbalance = null, $comparison = null)
    {
        if (is_array($outstandingbalance)) {
            $useMinMax = false;
            if (isset($outstandingbalance['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_OUTSTANDINGBALANCE, $outstandingbalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outstandingbalance['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_OUTSTANDINGBALANCE, $outstandingbalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_OUTSTANDINGBALANCE, $outstandingbalance, $comparison);
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
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByAmountdue($amountdue = null, $comparison = null)
    {
        if (is_array($amountdue)) {
            $useMinMax = false;
            if (isset($amountdue['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_AMOUNTDUE, $amountdue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amountdue['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_AMOUNTDUE, $amountdue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_AMOUNTDUE, $amountdue, $comparison);
    }

    /**
     * Filter the query on the MeterMaintenanceCharge column
     *
     * Example usage:
     * <code>
     * $query->filterByMetermaintenancecharge(1234); // WHERE MeterMaintenanceCharge = 1234
     * $query->filterByMetermaintenancecharge(array(12, 34)); // WHERE MeterMaintenanceCharge IN (12, 34)
     * $query->filterByMetermaintenancecharge(array('min' => 12)); // WHERE MeterMaintenanceCharge > 12
     * </code>
     *
     * @param     mixed $metermaintenancecharge The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByMetermaintenancecharge($metermaintenancecharge = null, $comparison = null)
    {
        if (is_array($metermaintenancecharge)) {
            $useMinMax = false;
            if (isset($metermaintenancecharge['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($metermaintenancecharge['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge, $comparison);
    }

    /**
     * Filter the query on the Discounts column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscounts(1234); // WHERE Discounts = 1234
     * $query->filterByDiscounts(array(12, 34)); // WHERE Discounts IN (12, 34)
     * $query->filterByDiscounts(array('min' => 12)); // WHERE Discounts > 12
     * </code>
     *
     * @param     mixed $discounts The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByDiscounts($discounts = null, $comparison = null)
    {
        if (is_array($discounts)) {
            $useMinMax = false;
            if (isset($discounts['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_DISCOUNTS, $discounts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discounts['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_DISCOUNTS, $discounts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_DISCOUNTS, $discounts, $comparison);
    }

    /**
     * Filter the query on the OtherCharges column
     *
     * Example usage:
     * <code>
     * $query->filterByOthercharges(1234); // WHERE OtherCharges = 1234
     * $query->filterByOthercharges(array(12, 34)); // WHERE OtherCharges IN (12, 34)
     * $query->filterByOthercharges(array('min' => 12)); // WHERE OtherCharges > 12
     * </code>
     *
     * @param     mixed $othercharges The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByOthercharges($othercharges = null, $comparison = null)
    {
        if (is_array($othercharges)) {
            $useMinMax = false;
            if (isset($othercharges['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_OTHERCHARGES, $othercharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($othercharges['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_OTHERCHARGES, $othercharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_OTHERCHARGES, $othercharges, $comparison);
    }

    /**
     * Filter the query on the PenaltyCharges column
     *
     * Example usage:
     * <code>
     * $query->filterByPenaltycharges(1234); // WHERE PenaltyCharges = 1234
     * $query->filterByPenaltycharges(array(12, 34)); // WHERE PenaltyCharges IN (12, 34)
     * $query->filterByPenaltycharges(array('min' => 12)); // WHERE PenaltyCharges > 12
     * </code>
     *
     * @param     mixed $penaltycharges The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByPenaltycharges($penaltycharges = null, $comparison = null)
    {
        if (is_array($penaltycharges)) {
            $useMinMax = false;
            if (isset($penaltycharges['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_PENALTYCHARGES, $penaltycharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penaltycharges['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_PENALTYCHARGES, $penaltycharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_PENALTYCHARGES, $penaltycharges, $comparison);
    }

    /**
     * Filter the query on the StampDutyCharges column
     *
     * Example usage:
     * <code>
     * $query->filterByStampdutycharges(1234); // WHERE StampDutyCharges = 1234
     * $query->filterByStampdutycharges(array(12, 34)); // WHERE StampDutyCharges IN (12, 34)
     * $query->filterByStampdutycharges(array('min' => 12)); // WHERE StampDutyCharges > 12
     * </code>
     *
     * @param     mixed $stampdutycharges The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByStampdutycharges($stampdutycharges = null, $comparison = null)
    {
        if (is_array($stampdutycharges)) {
            $useMinMax = false;
            if (isset($stampdutycharges['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_STAMPDUTYCHARGES, $stampdutycharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stampdutycharges['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_STAMPDUTYCHARGES, $stampdutycharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_STAMPDUTYCHARGES, $stampdutycharges, $comparison);
    }

    /**
     * Filter the query on the ServiceCharges column
     *
     * Example usage:
     * <code>
     * $query->filterByServicecharges(1234); // WHERE ServiceCharges = 1234
     * $query->filterByServicecharges(array(12, 34)); // WHERE ServiceCharges IN (12, 34)
     * $query->filterByServicecharges(array('min' => 12)); // WHERE ServiceCharges > 12
     * </code>
     *
     * @param     mixed $servicecharges The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByServicecharges($servicecharges = null, $comparison = null)
    {
        if (is_array($servicecharges)) {
            $useMinMax = false;
            if (isset($servicecharges['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_SERVICECHARGES, $servicecharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($servicecharges['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_SERVICECHARGES, $servicecharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_SERVICECHARGES, $servicecharges, $comparison);
    }

    /**
     * Filter the query on the RoutineCharges column
     *
     * Example usage:
     * <code>
     * $query->filterByRoutinecharges(1234); // WHERE RoutineCharges = 1234
     * $query->filterByRoutinecharges(array(12, 34)); // WHERE RoutineCharges IN (12, 34)
     * $query->filterByRoutinecharges(array('min' => 12)); // WHERE RoutineCharges > 12
     * </code>
     *
     * @param     mixed $routinecharges The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByRoutinecharges($routinecharges = null, $comparison = null)
    {
        if (is_array($routinecharges)) {
            $useMinMax = false;
            if (isset($routinecharges['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_ROUTINECHARGES, $routinecharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($routinecharges['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_ROUTINECHARGES, $routinecharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_ROUTINECHARGES, $routinecharges, $comparison);
    }

    /**
     * Filter the query on the BillServiceRate column
     *
     * Example usage:
     * <code>
     * $query->filterByBillservicerate(1234); // WHERE BillServiceRate = 1234
     * $query->filterByBillservicerate(array(12, 34)); // WHERE BillServiceRate IN (12, 34)
     * $query->filterByBillservicerate(array('min' => 12)); // WHERE BillServiceRate > 12
     * </code>
     *
     * @param     mixed $billservicerate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByBillservicerate($billservicerate = null, $comparison = null)
    {
        if (is_array($billservicerate)) {
            $useMinMax = false;
            if (isset($billservicerate['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_BILLSERVICERATE, $billservicerate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($billservicerate['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_BILLSERVICERATE, $billservicerate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_BILLSERVICERATE, $billservicerate, $comparison);
    }

    /**
     * Filter the query on the ServiceTypeDesc column
     *
     * Example usage:
     * <code>
     * $query->filterByServicetypedesc('fooValue');   // WHERE ServiceTypeDesc = 'fooValue'
     * $query->filterByServicetypedesc('%fooValue%'); // WHERE ServiceTypeDesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $servicetypedesc The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByServicetypedesc($servicetypedesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($servicetypedesc)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $servicetypedesc)) {
                $servicetypedesc = str_replace('*', '%', $servicetypedesc);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_SERVICETYPEDESC, $servicetypedesc, $comparison);
    }

    /**
     * Filter the query on the BillPeriod column
     *
     * Example usage:
     * <code>
     * $query->filterByBillperiod('fooValue');   // WHERE BillPeriod = 'fooValue'
     * $query->filterByBillperiod('%fooValue%'); // WHERE BillPeriod LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billperiod The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByBillperiod($billperiod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billperiod)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billperiod)) {
                $billperiod = str_replace('*', '%', $billperiod);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_BILLPERIOD, $billperiod, $comparison);
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
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillNewTableMap::COL_USAGETYPE, $usagetype, $comparison);
    }

    /**
     * Filter the query on the MeterNumber column
     *
     * Example usage:
     * <code>
     * $query->filterByMeternumber('fooValue');   // WHERE MeterNumber = 'fooValue'
     * $query->filterByMeternumber('%fooValue%'); // WHERE MeterNumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $meternumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByMeternumber($meternumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($meternumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $meternumber)) {
                $meternumber = str_replace('*', '%', $meternumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_METERNUMBER, $meternumber, $comparison);
    }

    /**
     * Filter the query on the MeterType column
     *
     * Example usage:
     * <code>
     * $query->filterByMetertype('fooValue');   // WHERE MeterType = 'fooValue'
     * $query->filterByMetertype('%fooValue%'); // WHERE MeterType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metertype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByMetertype($metertype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metertype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metertype)) {
                $metertype = str_replace('*', '%', $metertype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_METERTYPE, $metertype, $comparison);
    }

    /**
     * Filter the query on the MeterCondition column
     *
     * Example usage:
     * <code>
     * $query->filterByMetercondition('fooValue');   // WHERE MeterCondition = 'fooValue'
     * $query->filterByMetercondition('%fooValue%'); // WHERE MeterCondition LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metercondition The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByMetercondition($metercondition = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metercondition)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metercondition)) {
                $metercondition = str_replace('*', '%', $metercondition);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_METERCONDITION, $metercondition, $comparison);
    }

    /**
     * Filter the query on the LeakageStatus column
     *
     * Example usage:
     * <code>
     * $query->filterByLeakagestatus('fooValue');   // WHERE LeakageStatus = 'fooValue'
     * $query->filterByLeakagestatus('%fooValue%'); // WHERE LeakageStatus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $leakagestatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByLeakagestatus($leakagestatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($leakagestatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $leakagestatus)) {
                $leakagestatus = str_replace('*', '%', $leakagestatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_LEAKAGESTATUS, $leakagestatus, $comparison);
    }

    /**
     * Filter the query on the PropertyType column
     *
     * Example usage:
     * <code>
     * $query->filterByPropertytype('fooValue');   // WHERE PropertyType = 'fooValue'
     * $query->filterByPropertytype('%fooValue%'); // WHERE PropertyType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $propertytype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByPropertytype($propertytype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($propertytype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $propertytype)) {
                $propertytype = str_replace('*', '%', $propertytype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_PROPERTYTYPE, $propertytype, $comparison);
    }

    /**
     * Filter the query on the MeterReadDevice column
     *
     * Example usage:
     * <code>
     * $query->filterByMeterreaddevice('fooValue');   // WHERE MeterReadDevice = 'fooValue'
     * $query->filterByMeterreaddevice('%fooValue%'); // WHERE MeterReadDevice LIKE '%fooValue%'
     * </code>
     *
     * @param     string $meterreaddevice The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByMeterreaddevice($meterreaddevice = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($meterreaddevice)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $meterreaddevice)) {
                $meterreaddevice = str_replace('*', '%', $meterreaddevice);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_METERREADDEVICE, $meterreaddevice, $comparison);
    }

    /**
     * Filter the query on the Billmethod column
     *
     * Example usage:
     * <code>
     * $query->filterByBillmethod('fooValue');   // WHERE Billmethod = 'fooValue'
     * $query->filterByBillmethod('%fooValue%'); // WHERE Billmethod LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billmethod The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByBillmethod($billmethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billmethod)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billmethod)) {
                $billmethod = str_replace('*', '%', $billmethod);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_BILLMETHOD, $billmethod, $comparison);
    }

    /**
     * Filter the query on the DateCreated column
     *
     * Example usage:
     * <code>
     * $query->filterByDatecreated('2011-03-14'); // WHERE DateCreated = '2011-03-14'
     * $query->filterByDatecreated('now'); // WHERE DateCreated = '2011-03-14'
     * $query->filterByDatecreated(array('max' => 'yesterday')); // WHERE DateCreated > '2011-03-13'
     * </code>
     *
     * @param     mixed $datecreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function filterByDatecreated($datecreated = null, $comparison = null)
    {
        if (is_array($datecreated)) {
            $useMinMax = false;
            if (isset($datecreated['min'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_DATECREATED, $datecreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datecreated['max'])) {
                $this->addUsingAlias(KluBillNewTableMap::COL_DATECREATED, $datecreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillNewTableMap::COL_DATECREATED, $datecreated, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKluBillNew $kluBillNew Object to remove from the list of results
     *
     * @return $this|ChildKluBillNewQuery The current query, for fluid interface
     */
    public function prune($kluBillNew = null)
    {
        if ($kluBillNew) {
            $this->addUsingAlias(KluBillNewTableMap::COL_UNIQUEKEYID, $kluBillNew->getUniquekeyid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the klu_bill_new table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillNewTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KluBillNewTableMap::clearInstancePool();
            KluBillNewTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillNewTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KluBillNewTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KluBillNewTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KluBillNewTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KluBillNewQuery
