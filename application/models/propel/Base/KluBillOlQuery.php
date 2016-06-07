<?php

namespace Base;

use \KluBillOl as ChildKluBillOl;
use \KluBillOlQuery as ChildKluBillOlQuery;
use \Exception;
use \PDO;
use Map\KluBillOlTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'klu_bill_ol' table.
 *
 *
 *
 * @method     ChildKluBillOlQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKluBillOlQuery orderByRefNo($order = Criteria::ASC) Order by the ref_no column
 * @method     ChildKluBillOlQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildKluBillOlQuery orderByServiceType($order = Criteria::ASC) Order by the service_type column
 * @method     ChildKluBillOlQuery orderByServiceDistrictId($order = Criteria::ASC) Order by the service_district_id column
 * @method     ChildKluBillOlQuery orderByBillingCycle($order = Criteria::ASC) Order by the billing_cycle column
 * @method     ChildKluBillOlQuery orderByDueDate($order = Criteria::ASC) Order by the due_date column
 * @method     ChildKluBillOlQuery orderByBillingFrom($order = Criteria::ASC) Order by the billing_from column
 * @method     ChildKluBillOlQuery orderByBillingTo($order = Criteria::ASC) Order by the billing_to column
 * @method     ChildKluBillOlQuery orderByBillDate($order = Criteria::ASC) Order by the bill_date column
 * @method     ChildKluBillOlQuery orderByRate($order = Criteria::ASC) Order by the Rate column
 * @method     ChildKluBillOlQuery orderByMeternumber($order = Criteria::ASC) Order by the MeterNumber column
 * @method     ChildKluBillOlQuery orderByBillingmethod($order = Criteria::ASC) Order by the BillingMethod column
 * @method     ChildKluBillOlQuery orderByDateoflastreading($order = Criteria::ASC) Order by the DateOfLastReading column
 * @method     ChildKluBillOlQuery orderByDateofcurrentreading($order = Criteria::ASC) Order by the DateOfCurrentReading column
 * @method     ChildKluBillOlQuery orderByDaysusage($order = Criteria::ASC) Order by the DaysUsage column
 * @method     ChildKluBillOlQuery orderByLastmeterreading($order = Criteria::ASC) Order by the LastMeterReading column
 * @method     ChildKluBillOlQuery orderByCurrentmeterreading($order = Criteria::ASC) Order by the CurrentMeterReading column
 * @method     ChildKluBillOlQuery orderByUnitsconsumed($order = Criteria::ASC) Order by the UnitsConsumed column
 * @method     ChildKluBillOlQuery orderByLastpaymentamount($order = Criteria::ASC) Order by the LastPaymentAmount column
 * @method     ChildKluBillOlQuery orderByLastpaymentdate($order = Criteria::ASC) Order by the LastPaymentDate column
 * @method     ChildKluBillOlQuery orderByMetermaintenancecharge($order = Criteria::ASC) Order by the MeterMaintenanceCharge column
 * @method     ChildKluBillOlQuery orderByDiscounts($order = Criteria::ASC) Order by the Discounts column
 * @method     ChildKluBillOlQuery orderByOthercharges($order = Criteria::ASC) Order by the OtherCharges column
 * @method     ChildKluBillOlQuery orderByPenaltycharges($order = Criteria::ASC) Order by the PenaltyCharges column
 * @method     ChildKluBillOlQuery orderByTaxcharges($order = Criteria::ASC) Order by the TaxCharges column
 * @method     ChildKluBillOlQuery orderByRoutinecharges($order = Criteria::ASC) Order by the RoutineCharges column
 * @method     ChildKluBillOlQuery orderByBuildingtype($order = Criteria::ASC) Order by the BuildingType column
 * @method     ChildKluBillOlQuery orderByRoute($order = Criteria::ASC) Order by the Route column
 * @method     ChildKluBillOlQuery orderByUsagetype($order = Criteria::ASC) Order by the UsageType column
 * @method     ChildKluBillOlQuery orderByServiceCharge($order = Criteria::ASC) Order by the service_charge column
 * @method     ChildKluBillOlQuery orderByPreviousBalance($order = Criteria::ASC) Order by the previous_balance column
 * @method     ChildKluBillOlQuery orderByPaymentReceived($order = Criteria::ASC) Order by the payment_received column
 * @method     ChildKluBillOlQuery orderByLastPaymentReceivedDate($order = Criteria::ASC) Order by the last_payment_received_date column
 * @method     ChildKluBillOlQuery orderByCurrentCharge($order = Criteria::ASC) Order by the current_charge column
 * @method     ChildKluBillOlQuery orderByTotalDue($order = Criteria::ASC) Order by the total_due column
 * @method     ChildKluBillOlQuery orderByInvoiceNo($order = Criteria::ASC) Order by the invoice_no column
 * @method     ChildKluBillOlQuery orderByReceiptNo($order = Criteria::ASC) Order by the receipt_no column
 * @method     ChildKluBillOlQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildKluBillOlQuery orderByCreatedDate($order = Criteria::ASC) Order by the created_date column
 *
 * @method     ChildKluBillOlQuery groupById() Group by the id column
 * @method     ChildKluBillOlQuery groupByRefNo() Group by the ref_no column
 * @method     ChildKluBillOlQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildKluBillOlQuery groupByServiceType() Group by the service_type column
 * @method     ChildKluBillOlQuery groupByServiceDistrictId() Group by the service_district_id column
 * @method     ChildKluBillOlQuery groupByBillingCycle() Group by the billing_cycle column
 * @method     ChildKluBillOlQuery groupByDueDate() Group by the due_date column
 * @method     ChildKluBillOlQuery groupByBillingFrom() Group by the billing_from column
 * @method     ChildKluBillOlQuery groupByBillingTo() Group by the billing_to column
 * @method     ChildKluBillOlQuery groupByBillDate() Group by the bill_date column
 * @method     ChildKluBillOlQuery groupByRate() Group by the Rate column
 * @method     ChildKluBillOlQuery groupByMeternumber() Group by the MeterNumber column
 * @method     ChildKluBillOlQuery groupByBillingmethod() Group by the BillingMethod column
 * @method     ChildKluBillOlQuery groupByDateoflastreading() Group by the DateOfLastReading column
 * @method     ChildKluBillOlQuery groupByDateofcurrentreading() Group by the DateOfCurrentReading column
 * @method     ChildKluBillOlQuery groupByDaysusage() Group by the DaysUsage column
 * @method     ChildKluBillOlQuery groupByLastmeterreading() Group by the LastMeterReading column
 * @method     ChildKluBillOlQuery groupByCurrentmeterreading() Group by the CurrentMeterReading column
 * @method     ChildKluBillOlQuery groupByUnitsconsumed() Group by the UnitsConsumed column
 * @method     ChildKluBillOlQuery groupByLastpaymentamount() Group by the LastPaymentAmount column
 * @method     ChildKluBillOlQuery groupByLastpaymentdate() Group by the LastPaymentDate column
 * @method     ChildKluBillOlQuery groupByMetermaintenancecharge() Group by the MeterMaintenanceCharge column
 * @method     ChildKluBillOlQuery groupByDiscounts() Group by the Discounts column
 * @method     ChildKluBillOlQuery groupByOthercharges() Group by the OtherCharges column
 * @method     ChildKluBillOlQuery groupByPenaltycharges() Group by the PenaltyCharges column
 * @method     ChildKluBillOlQuery groupByTaxcharges() Group by the TaxCharges column
 * @method     ChildKluBillOlQuery groupByRoutinecharges() Group by the RoutineCharges column
 * @method     ChildKluBillOlQuery groupByBuildingtype() Group by the BuildingType column
 * @method     ChildKluBillOlQuery groupByRoute() Group by the Route column
 * @method     ChildKluBillOlQuery groupByUsagetype() Group by the UsageType column
 * @method     ChildKluBillOlQuery groupByServiceCharge() Group by the service_charge column
 * @method     ChildKluBillOlQuery groupByPreviousBalance() Group by the previous_balance column
 * @method     ChildKluBillOlQuery groupByPaymentReceived() Group by the payment_received column
 * @method     ChildKluBillOlQuery groupByLastPaymentReceivedDate() Group by the last_payment_received_date column
 * @method     ChildKluBillOlQuery groupByCurrentCharge() Group by the current_charge column
 * @method     ChildKluBillOlQuery groupByTotalDue() Group by the total_due column
 * @method     ChildKluBillOlQuery groupByInvoiceNo() Group by the invoice_no column
 * @method     ChildKluBillOlQuery groupByReceiptNo() Group by the receipt_no column
 * @method     ChildKluBillOlQuery groupByStatus() Group by the status column
 * @method     ChildKluBillOlQuery groupByCreatedDate() Group by the created_date column
 *
 * @method     ChildKluBillOlQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKluBillOlQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKluBillOlQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKluBillOlQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKluBillOlQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKluBillOlQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKluBillOl findOne(ConnectionInterface $con = null) Return the first ChildKluBillOl matching the query
 * @method     ChildKluBillOl findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKluBillOl matching the query, or a new ChildKluBillOl object populated from the query conditions when no match is found
 *
 * @method     ChildKluBillOl findOneById(int $id) Return the first ChildKluBillOl filtered by the id column
 * @method     ChildKluBillOl findOneByRefNo(string $ref_no) Return the first ChildKluBillOl filtered by the ref_no column
 * @method     ChildKluBillOl findOneByCustomerId(string $customer_id) Return the first ChildKluBillOl filtered by the customer_id column
 * @method     ChildKluBillOl findOneByServiceType(string $service_type) Return the first ChildKluBillOl filtered by the service_type column
 * @method     ChildKluBillOl findOneByServiceDistrictId(string $service_district_id) Return the first ChildKluBillOl filtered by the service_district_id column
 * @method     ChildKluBillOl findOneByBillingCycle(string $billing_cycle) Return the first ChildKluBillOl filtered by the billing_cycle column
 * @method     ChildKluBillOl findOneByDueDate(string $due_date) Return the first ChildKluBillOl filtered by the due_date column
 * @method     ChildKluBillOl findOneByBillingFrom(string $billing_from) Return the first ChildKluBillOl filtered by the billing_from column
 * @method     ChildKluBillOl findOneByBillingTo(string $billing_to) Return the first ChildKluBillOl filtered by the billing_to column
 * @method     ChildKluBillOl findOneByBillDate(string $bill_date) Return the first ChildKluBillOl filtered by the bill_date column
 * @method     ChildKluBillOl findOneByRate(string $Rate) Return the first ChildKluBillOl filtered by the Rate column
 * @method     ChildKluBillOl findOneByMeternumber(string $MeterNumber) Return the first ChildKluBillOl filtered by the MeterNumber column
 * @method     ChildKluBillOl findOneByBillingmethod(string $BillingMethod) Return the first ChildKluBillOl filtered by the BillingMethod column
 * @method     ChildKluBillOl findOneByDateoflastreading(string $DateOfLastReading) Return the first ChildKluBillOl filtered by the DateOfLastReading column
 * @method     ChildKluBillOl findOneByDateofcurrentreading(string $DateOfCurrentReading) Return the first ChildKluBillOl filtered by the DateOfCurrentReading column
 * @method     ChildKluBillOl findOneByDaysusage(int $DaysUsage) Return the first ChildKluBillOl filtered by the DaysUsage column
 * @method     ChildKluBillOl findOneByLastmeterreading(int $LastMeterReading) Return the first ChildKluBillOl filtered by the LastMeterReading column
 * @method     ChildKluBillOl findOneByCurrentmeterreading(int $CurrentMeterReading) Return the first ChildKluBillOl filtered by the CurrentMeterReading column
 * @method     ChildKluBillOl findOneByUnitsconsumed(string $UnitsConsumed) Return the first ChildKluBillOl filtered by the UnitsConsumed column
 * @method     ChildKluBillOl findOneByLastpaymentamount(string $LastPaymentAmount) Return the first ChildKluBillOl filtered by the LastPaymentAmount column
 * @method     ChildKluBillOl findOneByLastpaymentdate(string $LastPaymentDate) Return the first ChildKluBillOl filtered by the LastPaymentDate column
 * @method     ChildKluBillOl findOneByMetermaintenancecharge(string $MeterMaintenanceCharge) Return the first ChildKluBillOl filtered by the MeterMaintenanceCharge column
 * @method     ChildKluBillOl findOneByDiscounts(string $Discounts) Return the first ChildKluBillOl filtered by the Discounts column
 * @method     ChildKluBillOl findOneByOthercharges(string $OtherCharges) Return the first ChildKluBillOl filtered by the OtherCharges column
 * @method     ChildKluBillOl findOneByPenaltycharges(string $PenaltyCharges) Return the first ChildKluBillOl filtered by the PenaltyCharges column
 * @method     ChildKluBillOl findOneByTaxcharges(string $TaxCharges) Return the first ChildKluBillOl filtered by the TaxCharges column
 * @method     ChildKluBillOl findOneByRoutinecharges(string $RoutineCharges) Return the first ChildKluBillOl filtered by the RoutineCharges column
 * @method     ChildKluBillOl findOneByBuildingtype(string $BuildingType) Return the first ChildKluBillOl filtered by the BuildingType column
 * @method     ChildKluBillOl findOneByRoute(string $Route) Return the first ChildKluBillOl filtered by the Route column
 * @method     ChildKluBillOl findOneByUsagetype(string $UsageType) Return the first ChildKluBillOl filtered by the UsageType column
 * @method     ChildKluBillOl findOneByServiceCharge(string $service_charge) Return the first ChildKluBillOl filtered by the service_charge column
 * @method     ChildKluBillOl findOneByPreviousBalance(string $previous_balance) Return the first ChildKluBillOl filtered by the previous_balance column
 * @method     ChildKluBillOl findOneByPaymentReceived(string $payment_received) Return the first ChildKluBillOl filtered by the payment_received column
 * @method     ChildKluBillOl findOneByLastPaymentReceivedDate(string $last_payment_received_date) Return the first ChildKluBillOl filtered by the last_payment_received_date column
 * @method     ChildKluBillOl findOneByCurrentCharge(string $current_charge) Return the first ChildKluBillOl filtered by the current_charge column
 * @method     ChildKluBillOl findOneByTotalDue(string $total_due) Return the first ChildKluBillOl filtered by the total_due column
 * @method     ChildKluBillOl findOneByInvoiceNo(string $invoice_no) Return the first ChildKluBillOl filtered by the invoice_no column
 * @method     ChildKluBillOl findOneByReceiptNo(string $receipt_no) Return the first ChildKluBillOl filtered by the receipt_no column
 * @method     ChildKluBillOl findOneByStatus(boolean $status) Return the first ChildKluBillOl filtered by the status column
 * @method     ChildKluBillOl findOneByCreatedDate(string $created_date) Return the first ChildKluBillOl filtered by the created_date column *

 * @method     ChildKluBillOl requirePk($key, ConnectionInterface $con = null) Return the ChildKluBillOl by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOne(ConnectionInterface $con = null) Return the first ChildKluBillOl matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluBillOl requireOneById(int $id) Return the first ChildKluBillOl filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByRefNo(string $ref_no) Return the first ChildKluBillOl filtered by the ref_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByCustomerId(string $customer_id) Return the first ChildKluBillOl filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByServiceType(string $service_type) Return the first ChildKluBillOl filtered by the service_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByServiceDistrictId(string $service_district_id) Return the first ChildKluBillOl filtered by the service_district_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByBillingCycle(string $billing_cycle) Return the first ChildKluBillOl filtered by the billing_cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByDueDate(string $due_date) Return the first ChildKluBillOl filtered by the due_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByBillingFrom(string $billing_from) Return the first ChildKluBillOl filtered by the billing_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByBillingTo(string $billing_to) Return the first ChildKluBillOl filtered by the billing_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByBillDate(string $bill_date) Return the first ChildKluBillOl filtered by the bill_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByRate(string $Rate) Return the first ChildKluBillOl filtered by the Rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByMeternumber(string $MeterNumber) Return the first ChildKluBillOl filtered by the MeterNumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByBillingmethod(string $BillingMethod) Return the first ChildKluBillOl filtered by the BillingMethod column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByDateoflastreading(string $DateOfLastReading) Return the first ChildKluBillOl filtered by the DateOfLastReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByDateofcurrentreading(string $DateOfCurrentReading) Return the first ChildKluBillOl filtered by the DateOfCurrentReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByDaysusage(int $DaysUsage) Return the first ChildKluBillOl filtered by the DaysUsage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByLastmeterreading(int $LastMeterReading) Return the first ChildKluBillOl filtered by the LastMeterReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByCurrentmeterreading(int $CurrentMeterReading) Return the first ChildKluBillOl filtered by the CurrentMeterReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByUnitsconsumed(string $UnitsConsumed) Return the first ChildKluBillOl filtered by the UnitsConsumed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByLastpaymentamount(string $LastPaymentAmount) Return the first ChildKluBillOl filtered by the LastPaymentAmount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByLastpaymentdate(string $LastPaymentDate) Return the first ChildKluBillOl filtered by the LastPaymentDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByMetermaintenancecharge(string $MeterMaintenanceCharge) Return the first ChildKluBillOl filtered by the MeterMaintenanceCharge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByDiscounts(string $Discounts) Return the first ChildKluBillOl filtered by the Discounts column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByOthercharges(string $OtherCharges) Return the first ChildKluBillOl filtered by the OtherCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByPenaltycharges(string $PenaltyCharges) Return the first ChildKluBillOl filtered by the PenaltyCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByTaxcharges(string $TaxCharges) Return the first ChildKluBillOl filtered by the TaxCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByRoutinecharges(string $RoutineCharges) Return the first ChildKluBillOl filtered by the RoutineCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByBuildingtype(string $BuildingType) Return the first ChildKluBillOl filtered by the BuildingType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByRoute(string $Route) Return the first ChildKluBillOl filtered by the Route column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByUsagetype(string $UsageType) Return the first ChildKluBillOl filtered by the UsageType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByServiceCharge(string $service_charge) Return the first ChildKluBillOl filtered by the service_charge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByPreviousBalance(string $previous_balance) Return the first ChildKluBillOl filtered by the previous_balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByPaymentReceived(string $payment_received) Return the first ChildKluBillOl filtered by the payment_received column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByLastPaymentReceivedDate(string $last_payment_received_date) Return the first ChildKluBillOl filtered by the last_payment_received_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByCurrentCharge(string $current_charge) Return the first ChildKluBillOl filtered by the current_charge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByTotalDue(string $total_due) Return the first ChildKluBillOl filtered by the total_due column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByInvoiceNo(string $invoice_no) Return the first ChildKluBillOl filtered by the invoice_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByReceiptNo(string $receipt_no) Return the first ChildKluBillOl filtered by the receipt_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByStatus(boolean $status) Return the first ChildKluBillOl filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillOl requireOneByCreatedDate(string $created_date) Return the first ChildKluBillOl filtered by the created_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluBillOl[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKluBillOl objects based on current ModelCriteria
 * @method     ChildKluBillOl[]|ObjectCollection findById(int $id) Return ChildKluBillOl objects filtered by the id column
 * @method     ChildKluBillOl[]|ObjectCollection findByRefNo(string $ref_no) Return ChildKluBillOl objects filtered by the ref_no column
 * @method     ChildKluBillOl[]|ObjectCollection findByCustomerId(string $customer_id) Return ChildKluBillOl objects filtered by the customer_id column
 * @method     ChildKluBillOl[]|ObjectCollection findByServiceType(string $service_type) Return ChildKluBillOl objects filtered by the service_type column
 * @method     ChildKluBillOl[]|ObjectCollection findByServiceDistrictId(string $service_district_id) Return ChildKluBillOl objects filtered by the service_district_id column
 * @method     ChildKluBillOl[]|ObjectCollection findByBillingCycle(string $billing_cycle) Return ChildKluBillOl objects filtered by the billing_cycle column
 * @method     ChildKluBillOl[]|ObjectCollection findByDueDate(string $due_date) Return ChildKluBillOl objects filtered by the due_date column
 * @method     ChildKluBillOl[]|ObjectCollection findByBillingFrom(string $billing_from) Return ChildKluBillOl objects filtered by the billing_from column
 * @method     ChildKluBillOl[]|ObjectCollection findByBillingTo(string $billing_to) Return ChildKluBillOl objects filtered by the billing_to column
 * @method     ChildKluBillOl[]|ObjectCollection findByBillDate(string $bill_date) Return ChildKluBillOl objects filtered by the bill_date column
 * @method     ChildKluBillOl[]|ObjectCollection findByRate(string $Rate) Return ChildKluBillOl objects filtered by the Rate column
 * @method     ChildKluBillOl[]|ObjectCollection findByMeternumber(string $MeterNumber) Return ChildKluBillOl objects filtered by the MeterNumber column
 * @method     ChildKluBillOl[]|ObjectCollection findByBillingmethod(string $BillingMethod) Return ChildKluBillOl objects filtered by the BillingMethod column
 * @method     ChildKluBillOl[]|ObjectCollection findByDateoflastreading(string $DateOfLastReading) Return ChildKluBillOl objects filtered by the DateOfLastReading column
 * @method     ChildKluBillOl[]|ObjectCollection findByDateofcurrentreading(string $DateOfCurrentReading) Return ChildKluBillOl objects filtered by the DateOfCurrentReading column
 * @method     ChildKluBillOl[]|ObjectCollection findByDaysusage(int $DaysUsage) Return ChildKluBillOl objects filtered by the DaysUsage column
 * @method     ChildKluBillOl[]|ObjectCollection findByLastmeterreading(int $LastMeterReading) Return ChildKluBillOl objects filtered by the LastMeterReading column
 * @method     ChildKluBillOl[]|ObjectCollection findByCurrentmeterreading(int $CurrentMeterReading) Return ChildKluBillOl objects filtered by the CurrentMeterReading column
 * @method     ChildKluBillOl[]|ObjectCollection findByUnitsconsumed(string $UnitsConsumed) Return ChildKluBillOl objects filtered by the UnitsConsumed column
 * @method     ChildKluBillOl[]|ObjectCollection findByLastpaymentamount(string $LastPaymentAmount) Return ChildKluBillOl objects filtered by the LastPaymentAmount column
 * @method     ChildKluBillOl[]|ObjectCollection findByLastpaymentdate(string $LastPaymentDate) Return ChildKluBillOl objects filtered by the LastPaymentDate column
 * @method     ChildKluBillOl[]|ObjectCollection findByMetermaintenancecharge(string $MeterMaintenanceCharge) Return ChildKluBillOl objects filtered by the MeterMaintenanceCharge column
 * @method     ChildKluBillOl[]|ObjectCollection findByDiscounts(string $Discounts) Return ChildKluBillOl objects filtered by the Discounts column
 * @method     ChildKluBillOl[]|ObjectCollection findByOthercharges(string $OtherCharges) Return ChildKluBillOl objects filtered by the OtherCharges column
 * @method     ChildKluBillOl[]|ObjectCollection findByPenaltycharges(string $PenaltyCharges) Return ChildKluBillOl objects filtered by the PenaltyCharges column
 * @method     ChildKluBillOl[]|ObjectCollection findByTaxcharges(string $TaxCharges) Return ChildKluBillOl objects filtered by the TaxCharges column
 * @method     ChildKluBillOl[]|ObjectCollection findByRoutinecharges(string $RoutineCharges) Return ChildKluBillOl objects filtered by the RoutineCharges column
 * @method     ChildKluBillOl[]|ObjectCollection findByBuildingtype(string $BuildingType) Return ChildKluBillOl objects filtered by the BuildingType column
 * @method     ChildKluBillOl[]|ObjectCollection findByRoute(string $Route) Return ChildKluBillOl objects filtered by the Route column
 * @method     ChildKluBillOl[]|ObjectCollection findByUsagetype(string $UsageType) Return ChildKluBillOl objects filtered by the UsageType column
 * @method     ChildKluBillOl[]|ObjectCollection findByServiceCharge(string $service_charge) Return ChildKluBillOl objects filtered by the service_charge column
 * @method     ChildKluBillOl[]|ObjectCollection findByPreviousBalance(string $previous_balance) Return ChildKluBillOl objects filtered by the previous_balance column
 * @method     ChildKluBillOl[]|ObjectCollection findByPaymentReceived(string $payment_received) Return ChildKluBillOl objects filtered by the payment_received column
 * @method     ChildKluBillOl[]|ObjectCollection findByLastPaymentReceivedDate(string $last_payment_received_date) Return ChildKluBillOl objects filtered by the last_payment_received_date column
 * @method     ChildKluBillOl[]|ObjectCollection findByCurrentCharge(string $current_charge) Return ChildKluBillOl objects filtered by the current_charge column
 * @method     ChildKluBillOl[]|ObjectCollection findByTotalDue(string $total_due) Return ChildKluBillOl objects filtered by the total_due column
 * @method     ChildKluBillOl[]|ObjectCollection findByInvoiceNo(string $invoice_no) Return ChildKluBillOl objects filtered by the invoice_no column
 * @method     ChildKluBillOl[]|ObjectCollection findByReceiptNo(string $receipt_no) Return ChildKluBillOl objects filtered by the receipt_no column
 * @method     ChildKluBillOl[]|ObjectCollection findByStatus(boolean $status) Return ChildKluBillOl objects filtered by the status column
 * @method     ChildKluBillOl[]|ObjectCollection findByCreatedDate(string $created_date) Return ChildKluBillOl objects filtered by the created_date column
 * @method     ChildKluBillOl[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KluBillOlQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KluBillOlQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KluBillOl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKluBillOlQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKluBillOlQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKluBillOlQuery) {
            return $criteria;
        }
        $query = new ChildKluBillOlQuery();
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
     * @return ChildKluBillOl|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluBillOlTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KluBillOlTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildKluBillOl A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ref_no, customer_id, service_type, service_district_id, billing_cycle, due_date, billing_from, billing_to, bill_date, Rate, MeterNumber, BillingMethod, DateOfLastReading, DateOfCurrentReading, DaysUsage, LastMeterReading, CurrentMeterReading, UnitsConsumed, LastPaymentAmount, LastPaymentDate, MeterMaintenanceCharge, Discounts, OtherCharges, PenaltyCharges, TaxCharges, RoutineCharges, BuildingType, Route, UsageType, service_charge, previous_balance, payment_received, last_payment_received_date, current_charge, total_due, invoice_no, receipt_no, status, created_date FROM klu_bill_ol WHERE id = :p0';
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
            /** @var ChildKluBillOl $obj */
            $obj = new ChildKluBillOl();
            $obj->hydrate($row);
            KluBillOlTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildKluBillOl|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KluBillOlTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KluBillOlTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillOlTableMap::COL_REF_NO, $refNo, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId('fooValue');   // WHERE customer_id = 'fooValue'
     * $query->filterByCustomerId('%fooValue%'); // WHERE customer_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customerId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $customerId)) {
                $customerId = str_replace('*', '%', $customerId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillOlTableMap::COL_SERVICE_TYPE, $serviceType, $comparison);
    }

    /**
     * Filter the query on the service_district_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceDistrictId('fooValue');   // WHERE service_district_id = 'fooValue'
     * $query->filterByServiceDistrictId('%fooValue%'); // WHERE service_district_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serviceDistrictId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByServiceDistrictId($serviceDistrictId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serviceDistrictId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serviceDistrictId)) {
                $serviceDistrictId = str_replace('*', '%', $serviceDistrictId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_SERVICE_DISTRICT_ID, $serviceDistrictId, $comparison);
    }

    /**
     * Filter the query on the billing_cycle column
     *
     * Example usage:
     * <code>
     * $query->filterByBillingCycle('fooValue');   // WHERE billing_cycle = 'fooValue'
     * $query->filterByBillingCycle('%fooValue%'); // WHERE billing_cycle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billingCycle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByBillingCycle($billingCycle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billingCycle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billingCycle)) {
                $billingCycle = str_replace('*', '%', $billingCycle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_BILLING_CYCLE, $billingCycle, $comparison);
    }

    /**
     * Filter the query on the due_date column
     *
     * Example usage:
     * <code>
     * $query->filterByDueDate('fooValue');   // WHERE due_date = 'fooValue'
     * $query->filterByDueDate('%fooValue%'); // WHERE due_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dueDate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByDueDate($dueDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dueDate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dueDate)) {
                $dueDate = str_replace('*', '%', $dueDate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_DUE_DATE, $dueDate, $comparison);
    }

    /**
     * Filter the query on the billing_from column
     *
     * Example usage:
     * <code>
     * $query->filterByBillingFrom('fooValue');   // WHERE billing_from = 'fooValue'
     * $query->filterByBillingFrom('%fooValue%'); // WHERE billing_from LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billingFrom The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByBillingFrom($billingFrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billingFrom)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billingFrom)) {
                $billingFrom = str_replace('*', '%', $billingFrom);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_BILLING_FROM, $billingFrom, $comparison);
    }

    /**
     * Filter the query on the billing_to column
     *
     * Example usage:
     * <code>
     * $query->filterByBillingTo('fooValue');   // WHERE billing_to = 'fooValue'
     * $query->filterByBillingTo('%fooValue%'); // WHERE billing_to LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billingTo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByBillingTo($billingTo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billingTo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billingTo)) {
                $billingTo = str_replace('*', '%', $billingTo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_BILLING_TO, $billingTo, $comparison);
    }

    /**
     * Filter the query on the bill_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBillDate('fooValue');   // WHERE bill_date = 'fooValue'
     * $query->filterByBillDate('%fooValue%'); // WHERE bill_date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billDate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByBillDate($billDate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billDate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billDate)) {
                $billDate = str_replace('*', '%', $billDate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_BILL_DATE, $billDate, $comparison);
    }

    /**
     * Filter the query on the Rate column
     *
     * Example usage:
     * <code>
     * $query->filterByRate('fooValue');   // WHERE Rate = 'fooValue'
     * $query->filterByRate('%fooValue%'); // WHERE Rate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByRate($rate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rate)) {
                $rate = str_replace('*', '%', $rate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_RATE, $rate, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillOlTableMap::COL_METERNUMBER, $meternumber, $comparison);
    }

    /**
     * Filter the query on the BillingMethod column
     *
     * Example usage:
     * <code>
     * $query->filterByBillingmethod('fooValue');   // WHERE BillingMethod = 'fooValue'
     * $query->filterByBillingmethod('%fooValue%'); // WHERE BillingMethod LIKE '%fooValue%'
     * </code>
     *
     * @param     string $billingmethod The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByBillingmethod($billingmethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($billingmethod)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $billingmethod)) {
                $billingmethod = str_replace('*', '%', $billingmethod);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_BILLINGMETHOD, $billingmethod, $comparison);
    }

    /**
     * Filter the query on the DateOfLastReading column
     *
     * Example usage:
     * <code>
     * $query->filterByDateoflastreading('fooValue');   // WHERE DateOfLastReading = 'fooValue'
     * $query->filterByDateoflastreading('%fooValue%'); // WHERE DateOfLastReading LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateoflastreading The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByDateoflastreading($dateoflastreading = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateoflastreading)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dateoflastreading)) {
                $dateoflastreading = str_replace('*', '%', $dateoflastreading);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_DATEOFLASTREADING, $dateoflastreading, $comparison);
    }

    /**
     * Filter the query on the DateOfCurrentReading column
     *
     * Example usage:
     * <code>
     * $query->filterByDateofcurrentreading('fooValue');   // WHERE DateOfCurrentReading = 'fooValue'
     * $query->filterByDateofcurrentreading('%fooValue%'); // WHERE DateOfCurrentReading LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateofcurrentreading The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByDateofcurrentreading($dateofcurrentreading = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateofcurrentreading)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dateofcurrentreading)) {
                $dateofcurrentreading = str_replace('*', '%', $dateofcurrentreading);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_DATEOFCURRENTREADING, $dateofcurrentreading, $comparison);
    }

    /**
     * Filter the query on the DaysUsage column
     *
     * Example usage:
     * <code>
     * $query->filterByDaysusage(1234); // WHERE DaysUsage = 1234
     * $query->filterByDaysusage(array(12, 34)); // WHERE DaysUsage IN (12, 34)
     * $query->filterByDaysusage(array('min' => 12)); // WHERE DaysUsage > 12
     * </code>
     *
     * @param     mixed $daysusage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByDaysusage($daysusage = null, $comparison = null)
    {
        if (is_array($daysusage)) {
            $useMinMax = false;
            if (isset($daysusage['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_DAYSUSAGE, $daysusage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($daysusage['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_DAYSUSAGE, $daysusage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_DAYSUSAGE, $daysusage, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByLastmeterreading($lastmeterreading = null, $comparison = null)
    {
        if (is_array($lastmeterreading)) {
            $useMinMax = false;
            if (isset($lastmeterreading['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_LASTMETERREADING, $lastmeterreading['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastmeterreading['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_LASTMETERREADING, $lastmeterreading['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_LASTMETERREADING, $lastmeterreading, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByCurrentmeterreading($currentmeterreading = null, $comparison = null)
    {
        if (is_array($currentmeterreading)) {
            $useMinMax = false;
            if (isset($currentmeterreading['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_CURRENTMETERREADING, $currentmeterreading['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentmeterreading['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_CURRENTMETERREADING, $currentmeterreading['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_CURRENTMETERREADING, $currentmeterreading, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByUnitsconsumed($unitsconsumed = null, $comparison = null)
    {
        if (is_array($unitsconsumed)) {
            $useMinMax = false;
            if (isset($unitsconsumed['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_UNITSCONSUMED, $unitsconsumed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitsconsumed['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_UNITSCONSUMED, $unitsconsumed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_UNITSCONSUMED, $unitsconsumed, $comparison);
    }

    /**
     * Filter the query on the LastPaymentAmount column
     *
     * Example usage:
     * <code>
     * $query->filterByLastpaymentamount(1234); // WHERE LastPaymentAmount = 1234
     * $query->filterByLastpaymentamount(array(12, 34)); // WHERE LastPaymentAmount IN (12, 34)
     * $query->filterByLastpaymentamount(array('min' => 12)); // WHERE LastPaymentAmount > 12
     * </code>
     *
     * @param     mixed $lastpaymentamount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByLastpaymentamount($lastpaymentamount = null, $comparison = null)
    {
        if (is_array($lastpaymentamount)) {
            $useMinMax = false;
            if (isset($lastpaymentamount['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_LASTPAYMENTAMOUNT, $lastpaymentamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastpaymentamount['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_LASTPAYMENTAMOUNT, $lastpaymentamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_LASTPAYMENTAMOUNT, $lastpaymentamount, $comparison);
    }

    /**
     * Filter the query on the LastPaymentDate column
     *
     * Example usage:
     * <code>
     * $query->filterByLastpaymentdate('fooValue');   // WHERE LastPaymentDate = 'fooValue'
     * $query->filterByLastpaymentdate('%fooValue%'); // WHERE LastPaymentDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastpaymentdate The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByLastpaymentdate($lastpaymentdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastpaymentdate)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastpaymentdate)) {
                $lastpaymentdate = str_replace('*', '%', $lastpaymentdate);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_LASTPAYMENTDATE, $lastpaymentdate, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByMetermaintenancecharge($metermaintenancecharge = null, $comparison = null)
    {
        if (is_array($metermaintenancecharge)) {
            $useMinMax = false;
            if (isset($metermaintenancecharge['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($metermaintenancecharge['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByDiscounts($discounts = null, $comparison = null)
    {
        if (is_array($discounts)) {
            $useMinMax = false;
            if (isset($discounts['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_DISCOUNTS, $discounts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discounts['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_DISCOUNTS, $discounts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_DISCOUNTS, $discounts, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByOthercharges($othercharges = null, $comparison = null)
    {
        if (is_array($othercharges)) {
            $useMinMax = false;
            if (isset($othercharges['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_OTHERCHARGES, $othercharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($othercharges['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_OTHERCHARGES, $othercharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_OTHERCHARGES, $othercharges, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByPenaltycharges($penaltycharges = null, $comparison = null)
    {
        if (is_array($penaltycharges)) {
            $useMinMax = false;
            if (isset($penaltycharges['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_PENALTYCHARGES, $penaltycharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penaltycharges['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_PENALTYCHARGES, $penaltycharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_PENALTYCHARGES, $penaltycharges, $comparison);
    }

    /**
     * Filter the query on the TaxCharges column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcharges(1234); // WHERE TaxCharges = 1234
     * $query->filterByTaxcharges(array(12, 34)); // WHERE TaxCharges IN (12, 34)
     * $query->filterByTaxcharges(array('min' => 12)); // WHERE TaxCharges > 12
     * </code>
     *
     * @param     mixed $taxcharges The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByTaxcharges($taxcharges = null, $comparison = null)
    {
        if (is_array($taxcharges)) {
            $useMinMax = false;
            if (isset($taxcharges['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_TAXCHARGES, $taxcharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxcharges['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_TAXCHARGES, $taxcharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_TAXCHARGES, $taxcharges, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByRoutinecharges($routinecharges = null, $comparison = null)
    {
        if (is_array($routinecharges)) {
            $useMinMax = false;
            if (isset($routinecharges['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_ROUTINECHARGES, $routinecharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($routinecharges['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_ROUTINECHARGES, $routinecharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_ROUTINECHARGES, $routinecharges, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillOlTableMap::COL_BUILDINGTYPE, $buildingtype, $comparison);
    }

    /**
     * Filter the query on the Route column
     *
     * Example usage:
     * <code>
     * $query->filterByRoute('fooValue');   // WHERE Route = 'fooValue'
     * $query->filterByRoute('%fooValue%'); // WHERE Route LIKE '%fooValue%'
     * </code>
     *
     * @param     string $route The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByRoute($route = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($route)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $route)) {
                $route = str_replace('*', '%', $route);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_ROUTE, $route, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillOlTableMap::COL_USAGETYPE, $usagetype, $comparison);
    }

    /**
     * Filter the query on the service_charge column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceCharge('fooValue');   // WHERE service_charge = 'fooValue'
     * $query->filterByServiceCharge('%fooValue%'); // WHERE service_charge LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serviceCharge The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByServiceCharge($serviceCharge = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serviceCharge)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serviceCharge)) {
                $serviceCharge = str_replace('*', '%', $serviceCharge);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_SERVICE_CHARGE, $serviceCharge, $comparison);
    }

    /**
     * Filter the query on the previous_balance column
     *
     * Example usage:
     * <code>
     * $query->filterByPreviousBalance('fooValue');   // WHERE previous_balance = 'fooValue'
     * $query->filterByPreviousBalance('%fooValue%'); // WHERE previous_balance LIKE '%fooValue%'
     * </code>
     *
     * @param     string $previousBalance The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByPreviousBalance($previousBalance = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($previousBalance)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $previousBalance)) {
                $previousBalance = str_replace('*', '%', $previousBalance);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_PREVIOUS_BALANCE, $previousBalance, $comparison);
    }

    /**
     * Filter the query on the payment_received column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentReceived('fooValue');   // WHERE payment_received = 'fooValue'
     * $query->filterByPaymentReceived('%fooValue%'); // WHERE payment_received LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentReceived The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByPaymentReceived($paymentReceived = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentReceived)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymentReceived)) {
                $paymentReceived = str_replace('*', '%', $paymentReceived);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_PAYMENT_RECEIVED, $paymentReceived, $comparison);
    }

    /**
     * Filter the query on the last_payment_received_date column
     *
     * Example usage:
     * <code>
     * $query->filterByLastPaymentReceivedDate('2011-03-14'); // WHERE last_payment_received_date = '2011-03-14'
     * $query->filterByLastPaymentReceivedDate('now'); // WHERE last_payment_received_date = '2011-03-14'
     * $query->filterByLastPaymentReceivedDate(array('max' => 'yesterday')); // WHERE last_payment_received_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastPaymentReceivedDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByLastPaymentReceivedDate($lastPaymentReceivedDate = null, $comparison = null)
    {
        if (is_array($lastPaymentReceivedDate)) {
            $useMinMax = false;
            if (isset($lastPaymentReceivedDate['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, $lastPaymentReceivedDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastPaymentReceivedDate['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, $lastPaymentReceivedDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, $lastPaymentReceivedDate, $comparison);
    }

    /**
     * Filter the query on the current_charge column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentCharge(1234); // WHERE current_charge = 1234
     * $query->filterByCurrentCharge(array(12, 34)); // WHERE current_charge IN (12, 34)
     * $query->filterByCurrentCharge(array('min' => 12)); // WHERE current_charge > 12
     * </code>
     *
     * @param     mixed $currentCharge The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByCurrentCharge($currentCharge = null, $comparison = null)
    {
        if (is_array($currentCharge)) {
            $useMinMax = false;
            if (isset($currentCharge['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_CURRENT_CHARGE, $currentCharge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentCharge['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_CURRENT_CHARGE, $currentCharge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_CURRENT_CHARGE, $currentCharge, $comparison);
    }

    /**
     * Filter the query on the total_due column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalDue('fooValue');   // WHERE total_due = 'fooValue'
     * $query->filterByTotalDue('%fooValue%'); // WHERE total_due LIKE '%fooValue%'
     * </code>
     *
     * @param     string $totalDue The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByTotalDue($totalDue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totalDue)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $totalDue)) {
                $totalDue = str_replace('*', '%', $totalDue);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_TOTAL_DUE, $totalDue, $comparison);
    }

    /**
     * Filter the query on the invoice_no column
     *
     * Example usage:
     * <code>
     * $query->filterByInvoiceNo('fooValue');   // WHERE invoice_no = 'fooValue'
     * $query->filterByInvoiceNo('%fooValue%'); // WHERE invoice_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invoiceNo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByInvoiceNo($invoiceNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invoiceNo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $invoiceNo)) {
                $invoiceNo = str_replace('*', '%', $invoiceNo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_INVOICE_NO, $invoiceNo, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillOlTableMap::COL_RECEIPT_NO, $receiptNo, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function filterByCreatedDate($createdDate = null, $comparison = null)
    {
        if (is_array($createdDate)) {
            $useMinMax = false;
            if (isset($createdDate['min'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_CREATED_DATE, $createdDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdDate['max'])) {
                $this->addUsingAlias(KluBillOlTableMap::COL_CREATED_DATE, $createdDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillOlTableMap::COL_CREATED_DATE, $createdDate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKluBillOl $kluBillOl Object to remove from the list of results
     *
     * @return $this|ChildKluBillOlQuery The current query, for fluid interface
     */
    public function prune($kluBillOl = null)
    {
        if ($kluBillOl) {
            $this->addUsingAlias(KluBillOlTableMap::COL_ID, $kluBillOl->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the klu_bill_ol table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillOlTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KluBillOlTableMap::clearInstancePool();
            KluBillOlTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillOlTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KluBillOlTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KluBillOlTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KluBillOlTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KluBillOlQuery
