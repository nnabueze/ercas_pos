<?php

namespace Base;

use \KluBill as ChildKluBill;
use \KluBillQuery as ChildKluBillQuery;
use \Exception;
use \PDO;
use Map\KluBillTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'klu_bill' table.
 *
 *
 *
 * @method     ChildKluBillQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKluBillQuery orderByRefNo($order = Criteria::ASC) Order by the ref_no column
 * @method     ChildKluBillQuery orderByUniquekeyid($order = Criteria::ASC) Order by the UniqueKeyID column
 * @method     ChildKluBillQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildKluBillQuery orderByAccountNo($order = Criteria::ASC) Order by the account_no column
 * @method     ChildKluBillQuery orderByServiceType($order = Criteria::ASC) Order by the service_type column
 * @method     ChildKluBillQuery orderByServiceDistrictId($order = Criteria::ASC) Order by the service_district_id column
 * @method     ChildKluBillQuery orderByBillingCycle($order = Criteria::ASC) Order by the billing_cycle column
 * @method     ChildKluBillQuery orderByDueDate($order = Criteria::ASC) Order by the due_date column
 * @method     ChildKluBillQuery orderByBillingFrom($order = Criteria::ASC) Order by the billing_from column
 * @method     ChildKluBillQuery orderByBillingTo($order = Criteria::ASC) Order by the billing_to column
 * @method     ChildKluBillQuery orderByBillDate($order = Criteria::ASC) Order by the bill_date column
 * @method     ChildKluBillQuery orderByRate($order = Criteria::ASC) Order by the Rate column
 * @method     ChildKluBillQuery orderByMeternumber($order = Criteria::ASC) Order by the MeterNumber column
 * @method     ChildKluBillQuery orderByBillingmethod($order = Criteria::ASC) Order by the BillingMethod column
 * @method     ChildKluBillQuery orderByDateoflastreading($order = Criteria::ASC) Order by the DateOfLastReading column
 * @method     ChildKluBillQuery orderByDateofcurrentreading($order = Criteria::ASC) Order by the DateOfCurrentReading column
 * @method     ChildKluBillQuery orderByDaysusage($order = Criteria::ASC) Order by the DaysUsage column
 * @method     ChildKluBillQuery orderByLastmeterreading($order = Criteria::ASC) Order by the LastMeterReading column
 * @method     ChildKluBillQuery orderByCurrentmeterreading($order = Criteria::ASC) Order by the CurrentMeterReading column
 * @method     ChildKluBillQuery orderByUnitsconsumed($order = Criteria::ASC) Order by the UnitsConsumed column
 * @method     ChildKluBillQuery orderByLastpaymentamount($order = Criteria::ASC) Order by the LastPaymentAmount column
 * @method     ChildKluBillQuery orderByLastpaymentdate($order = Criteria::ASC) Order by the LastPaymentDate column
 * @method     ChildKluBillQuery orderByMetermaintenancecharge($order = Criteria::ASC) Order by the MeterMaintenanceCharge column
 * @method     ChildKluBillQuery orderByDiscounts($order = Criteria::ASC) Order by the Discounts column
 * @method     ChildKluBillQuery orderByOthercharges($order = Criteria::ASC) Order by the OtherCharges column
 * @method     ChildKluBillQuery orderByPenaltycharges($order = Criteria::ASC) Order by the PenaltyCharges column
 * @method     ChildKluBillQuery orderByTaxcharges($order = Criteria::ASC) Order by the TaxCharges column
 * @method     ChildKluBillQuery orderByCharges($order = Criteria::ASC) Order by the Charges column
 * @method     ChildKluBillQuery orderByRoutinecharges($order = Criteria::ASC) Order by the RoutineCharges column
 * @method     ChildKluBillQuery orderByBillservicerate($order = Criteria::ASC) Order by the BillServiceRate column
 * @method     ChildKluBillQuery orderByBuildingtype($order = Criteria::ASC) Order by the BuildingType column
 * @method     ChildKluBillQuery orderByRoute($order = Criteria::ASC) Order by the Route column
 * @method     ChildKluBillQuery orderByUsagetype($order = Criteria::ASC) Order by the UsageType column
 * @method     ChildKluBillQuery orderByServiceCharge($order = Criteria::ASC) Order by the service_charge column
 * @method     ChildKluBillQuery orderByPreviousBalance($order = Criteria::ASC) Order by the previous_balance column
 * @method     ChildKluBillQuery orderByPaymentReceived($order = Criteria::ASC) Order by the payment_received column
 * @method     ChildKluBillQuery orderByLastPaymentReceivedDate($order = Criteria::ASC) Order by the last_payment_received_date column
 * @method     ChildKluBillQuery orderByCurrentCharge($order = Criteria::ASC) Order by the current_charge column
 * @method     ChildKluBillQuery orderByTotalDue($order = Criteria::ASC) Order by the total_due column
 * @method     ChildKluBillQuery orderByInvoiceNo($order = Criteria::ASC) Order by the invoice_no column
 * @method     ChildKluBillQuery orderByReceiptNo($order = Criteria::ASC) Order by the receipt_no column
 * @method     ChildKluBillQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 * @method     ChildKluBillQuery orderByCreator($order = Criteria::ASC) Order by the creator column
 * @method     ChildKluBillQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildKluBillQuery groupById() Group by the id column
 * @method     ChildKluBillQuery groupByRefNo() Group by the ref_no column
 * @method     ChildKluBillQuery groupByUniquekeyid() Group by the UniqueKeyID column
 * @method     ChildKluBillQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildKluBillQuery groupByAccountNo() Group by the account_no column
 * @method     ChildKluBillQuery groupByServiceType() Group by the service_type column
 * @method     ChildKluBillQuery groupByServiceDistrictId() Group by the service_district_id column
 * @method     ChildKluBillQuery groupByBillingCycle() Group by the billing_cycle column
 * @method     ChildKluBillQuery groupByDueDate() Group by the due_date column
 * @method     ChildKluBillQuery groupByBillingFrom() Group by the billing_from column
 * @method     ChildKluBillQuery groupByBillingTo() Group by the billing_to column
 * @method     ChildKluBillQuery groupByBillDate() Group by the bill_date column
 * @method     ChildKluBillQuery groupByRate() Group by the Rate column
 * @method     ChildKluBillQuery groupByMeternumber() Group by the MeterNumber column
 * @method     ChildKluBillQuery groupByBillingmethod() Group by the BillingMethod column
 * @method     ChildKluBillQuery groupByDateoflastreading() Group by the DateOfLastReading column
 * @method     ChildKluBillQuery groupByDateofcurrentreading() Group by the DateOfCurrentReading column
 * @method     ChildKluBillQuery groupByDaysusage() Group by the DaysUsage column
 * @method     ChildKluBillQuery groupByLastmeterreading() Group by the LastMeterReading column
 * @method     ChildKluBillQuery groupByCurrentmeterreading() Group by the CurrentMeterReading column
 * @method     ChildKluBillQuery groupByUnitsconsumed() Group by the UnitsConsumed column
 * @method     ChildKluBillQuery groupByLastpaymentamount() Group by the LastPaymentAmount column
 * @method     ChildKluBillQuery groupByLastpaymentdate() Group by the LastPaymentDate column
 * @method     ChildKluBillQuery groupByMetermaintenancecharge() Group by the MeterMaintenanceCharge column
 * @method     ChildKluBillQuery groupByDiscounts() Group by the Discounts column
 * @method     ChildKluBillQuery groupByOthercharges() Group by the OtherCharges column
 * @method     ChildKluBillQuery groupByPenaltycharges() Group by the PenaltyCharges column
 * @method     ChildKluBillQuery groupByTaxcharges() Group by the TaxCharges column
 * @method     ChildKluBillQuery groupByCharges() Group by the Charges column
 * @method     ChildKluBillQuery groupByRoutinecharges() Group by the RoutineCharges column
 * @method     ChildKluBillQuery groupByBillservicerate() Group by the BillServiceRate column
 * @method     ChildKluBillQuery groupByBuildingtype() Group by the BuildingType column
 * @method     ChildKluBillQuery groupByRoute() Group by the Route column
 * @method     ChildKluBillQuery groupByUsagetype() Group by the UsageType column
 * @method     ChildKluBillQuery groupByServiceCharge() Group by the service_charge column
 * @method     ChildKluBillQuery groupByPreviousBalance() Group by the previous_balance column
 * @method     ChildKluBillQuery groupByPaymentReceived() Group by the payment_received column
 * @method     ChildKluBillQuery groupByLastPaymentReceivedDate() Group by the last_payment_received_date column
 * @method     ChildKluBillQuery groupByCurrentCharge() Group by the current_charge column
 * @method     ChildKluBillQuery groupByTotalDue() Group by the total_due column
 * @method     ChildKluBillQuery groupByInvoiceNo() Group by the invoice_no column
 * @method     ChildKluBillQuery groupByReceiptNo() Group by the receipt_no column
 * @method     ChildKluBillQuery groupByDateCreated() Group by the date_created column
 * @method     ChildKluBillQuery groupByCreator() Group by the creator column
 * @method     ChildKluBillQuery groupByStatus() Group by the status column
 *
 * @method     ChildKluBillQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKluBillQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKluBillQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKluBillQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKluBillQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKluBillQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKluBill findOne(ConnectionInterface $con = null) Return the first ChildKluBill matching the query
 * @method     ChildKluBill findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKluBill matching the query, or a new ChildKluBill object populated from the query conditions when no match is found
 *
 * @method     ChildKluBill findOneById(int $id) Return the first ChildKluBill filtered by the id column
 * @method     ChildKluBill findOneByRefNo(string $ref_no) Return the first ChildKluBill filtered by the ref_no column
 * @method     ChildKluBill findOneByUniquekeyid(int $UniqueKeyID) Return the first ChildKluBill filtered by the UniqueKeyID column
 * @method     ChildKluBill findOneByCustomerId(int $customer_id) Return the first ChildKluBill filtered by the customer_id column
 * @method     ChildKluBill findOneByAccountNo(string $account_no) Return the first ChildKluBill filtered by the account_no column
 * @method     ChildKluBill findOneByServiceType(string $service_type) Return the first ChildKluBill filtered by the service_type column
 * @method     ChildKluBill findOneByServiceDistrictId(string $service_district_id) Return the first ChildKluBill filtered by the service_district_id column
 * @method     ChildKluBill findOneByBillingCycle(string $billing_cycle) Return the first ChildKluBill filtered by the billing_cycle column
 * @method     ChildKluBill findOneByDueDate(string $due_date) Return the first ChildKluBill filtered by the due_date column
 * @method     ChildKluBill findOneByBillingFrom(string $billing_from) Return the first ChildKluBill filtered by the billing_from column
 * @method     ChildKluBill findOneByBillingTo(string $billing_to) Return the first ChildKluBill filtered by the billing_to column
 * @method     ChildKluBill findOneByBillDate(string $bill_date) Return the first ChildKluBill filtered by the bill_date column
 * @method     ChildKluBill findOneByRate(string $Rate) Return the first ChildKluBill filtered by the Rate column
 * @method     ChildKluBill findOneByMeternumber(string $MeterNumber) Return the first ChildKluBill filtered by the MeterNumber column
 * @method     ChildKluBill findOneByBillingmethod(string $BillingMethod) Return the first ChildKluBill filtered by the BillingMethod column
 * @method     ChildKluBill findOneByDateoflastreading(string $DateOfLastReading) Return the first ChildKluBill filtered by the DateOfLastReading column
 * @method     ChildKluBill findOneByDateofcurrentreading(string $DateOfCurrentReading) Return the first ChildKluBill filtered by the DateOfCurrentReading column
 * @method     ChildKluBill findOneByDaysusage(int $DaysUsage) Return the first ChildKluBill filtered by the DaysUsage column
 * @method     ChildKluBill findOneByLastmeterreading(int $LastMeterReading) Return the first ChildKluBill filtered by the LastMeterReading column
 * @method     ChildKluBill findOneByCurrentmeterreading(int $CurrentMeterReading) Return the first ChildKluBill filtered by the CurrentMeterReading column
 * @method     ChildKluBill findOneByUnitsconsumed(string $UnitsConsumed) Return the first ChildKluBill filtered by the UnitsConsumed column
 * @method     ChildKluBill findOneByLastpaymentamount(string $LastPaymentAmount) Return the first ChildKluBill filtered by the LastPaymentAmount column
 * @method     ChildKluBill findOneByLastpaymentdate(string $LastPaymentDate) Return the first ChildKluBill filtered by the LastPaymentDate column
 * @method     ChildKluBill findOneByMetermaintenancecharge(string $MeterMaintenanceCharge) Return the first ChildKluBill filtered by the MeterMaintenanceCharge column
 * @method     ChildKluBill findOneByDiscounts(string $Discounts) Return the first ChildKluBill filtered by the Discounts column
 * @method     ChildKluBill findOneByOthercharges(string $OtherCharges) Return the first ChildKluBill filtered by the OtherCharges column
 * @method     ChildKluBill findOneByPenaltycharges(string $PenaltyCharges) Return the first ChildKluBill filtered by the PenaltyCharges column
 * @method     ChildKluBill findOneByTaxcharges(string $TaxCharges) Return the first ChildKluBill filtered by the TaxCharges column
 * @method     ChildKluBill findOneByCharges(string $Charges) Return the first ChildKluBill filtered by the Charges column
 * @method     ChildKluBill findOneByRoutinecharges(string $RoutineCharges) Return the first ChildKluBill filtered by the RoutineCharges column
 * @method     ChildKluBill findOneByBillservicerate(int $BillServiceRate) Return the first ChildKluBill filtered by the BillServiceRate column
 * @method     ChildKluBill findOneByBuildingtype(string $BuildingType) Return the first ChildKluBill filtered by the BuildingType column
 * @method     ChildKluBill findOneByRoute(string $Route) Return the first ChildKluBill filtered by the Route column
 * @method     ChildKluBill findOneByUsagetype(string $UsageType) Return the first ChildKluBill filtered by the UsageType column
 * @method     ChildKluBill findOneByServiceCharge(string $service_charge) Return the first ChildKluBill filtered by the service_charge column
 * @method     ChildKluBill findOneByPreviousBalance(string $previous_balance) Return the first ChildKluBill filtered by the previous_balance column
 * @method     ChildKluBill findOneByPaymentReceived(string $payment_received) Return the first ChildKluBill filtered by the payment_received column
 * @method     ChildKluBill findOneByLastPaymentReceivedDate(string $last_payment_received_date) Return the first ChildKluBill filtered by the last_payment_received_date column
 * @method     ChildKluBill findOneByCurrentCharge(string $current_charge) Return the first ChildKluBill filtered by the current_charge column
 * @method     ChildKluBill findOneByTotalDue(string $total_due) Return the first ChildKluBill filtered by the total_due column
 * @method     ChildKluBill findOneByInvoiceNo(string $invoice_no) Return the first ChildKluBill filtered by the invoice_no column
 * @method     ChildKluBill findOneByReceiptNo(string $receipt_no) Return the first ChildKluBill filtered by the receipt_no column
 * @method     ChildKluBill findOneByDateCreated(string $date_created) Return the first ChildKluBill filtered by the date_created column
 * @method     ChildKluBill findOneByCreator(string $creator) Return the first ChildKluBill filtered by the creator column
 * @method     ChildKluBill findOneByStatus(boolean $status) Return the first ChildKluBill filtered by the status column *

 * @method     ChildKluBill requirePk($key, ConnectionInterface $con = null) Return the ChildKluBill by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOne(ConnectionInterface $con = null) Return the first ChildKluBill matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluBill requireOneById(int $id) Return the first ChildKluBill filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByRefNo(string $ref_no) Return the first ChildKluBill filtered by the ref_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByUniquekeyid(int $UniqueKeyID) Return the first ChildKluBill filtered by the UniqueKeyID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByCustomerId(int $customer_id) Return the first ChildKluBill filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByAccountNo(string $account_no) Return the first ChildKluBill filtered by the account_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByServiceType(string $service_type) Return the first ChildKluBill filtered by the service_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByServiceDistrictId(string $service_district_id) Return the first ChildKluBill filtered by the service_district_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByBillingCycle(string $billing_cycle) Return the first ChildKluBill filtered by the billing_cycle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByDueDate(string $due_date) Return the first ChildKluBill filtered by the due_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByBillingFrom(string $billing_from) Return the first ChildKluBill filtered by the billing_from column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByBillingTo(string $billing_to) Return the first ChildKluBill filtered by the billing_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByBillDate(string $bill_date) Return the first ChildKluBill filtered by the bill_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByRate(string $Rate) Return the first ChildKluBill filtered by the Rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByMeternumber(string $MeterNumber) Return the first ChildKluBill filtered by the MeterNumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByBillingmethod(string $BillingMethod) Return the first ChildKluBill filtered by the BillingMethod column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByDateoflastreading(string $DateOfLastReading) Return the first ChildKluBill filtered by the DateOfLastReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByDateofcurrentreading(string $DateOfCurrentReading) Return the first ChildKluBill filtered by the DateOfCurrentReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByDaysusage(int $DaysUsage) Return the first ChildKluBill filtered by the DaysUsage column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByLastmeterreading(int $LastMeterReading) Return the first ChildKluBill filtered by the LastMeterReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByCurrentmeterreading(int $CurrentMeterReading) Return the first ChildKluBill filtered by the CurrentMeterReading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByUnitsconsumed(string $UnitsConsumed) Return the first ChildKluBill filtered by the UnitsConsumed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByLastpaymentamount(string $LastPaymentAmount) Return the first ChildKluBill filtered by the LastPaymentAmount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByLastpaymentdate(string $LastPaymentDate) Return the first ChildKluBill filtered by the LastPaymentDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByMetermaintenancecharge(string $MeterMaintenanceCharge) Return the first ChildKluBill filtered by the MeterMaintenanceCharge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByDiscounts(string $Discounts) Return the first ChildKluBill filtered by the Discounts column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByOthercharges(string $OtherCharges) Return the first ChildKluBill filtered by the OtherCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByPenaltycharges(string $PenaltyCharges) Return the first ChildKluBill filtered by the PenaltyCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByTaxcharges(string $TaxCharges) Return the first ChildKluBill filtered by the TaxCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByCharges(string $Charges) Return the first ChildKluBill filtered by the Charges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByRoutinecharges(string $RoutineCharges) Return the first ChildKluBill filtered by the RoutineCharges column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByBillservicerate(int $BillServiceRate) Return the first ChildKluBill filtered by the BillServiceRate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByBuildingtype(string $BuildingType) Return the first ChildKluBill filtered by the BuildingType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByRoute(string $Route) Return the first ChildKluBill filtered by the Route column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByUsagetype(string $UsageType) Return the first ChildKluBill filtered by the UsageType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByServiceCharge(string $service_charge) Return the first ChildKluBill filtered by the service_charge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByPreviousBalance(string $previous_balance) Return the first ChildKluBill filtered by the previous_balance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByPaymentReceived(string $payment_received) Return the first ChildKluBill filtered by the payment_received column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByLastPaymentReceivedDate(string $last_payment_received_date) Return the first ChildKluBill filtered by the last_payment_received_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByCurrentCharge(string $current_charge) Return the first ChildKluBill filtered by the current_charge column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByTotalDue(string $total_due) Return the first ChildKluBill filtered by the total_due column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByInvoiceNo(string $invoice_no) Return the first ChildKluBill filtered by the invoice_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByReceiptNo(string $receipt_no) Return the first ChildKluBill filtered by the receipt_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByDateCreated(string $date_created) Return the first ChildKluBill filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByCreator(string $creator) Return the first ChildKluBill filtered by the creator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBill requireOneByStatus(boolean $status) Return the first ChildKluBill filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluBill[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKluBill objects based on current ModelCriteria
 * @method     ChildKluBill[]|ObjectCollection findById(int $id) Return ChildKluBill objects filtered by the id column
 * @method     ChildKluBill[]|ObjectCollection findByRefNo(string $ref_no) Return ChildKluBill objects filtered by the ref_no column
 * @method     ChildKluBill[]|ObjectCollection findByUniquekeyid(int $UniqueKeyID) Return ChildKluBill objects filtered by the UniqueKeyID column
 * @method     ChildKluBill[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildKluBill objects filtered by the customer_id column
 * @method     ChildKluBill[]|ObjectCollection findByAccountNo(string $account_no) Return ChildKluBill objects filtered by the account_no column
 * @method     ChildKluBill[]|ObjectCollection findByServiceType(string $service_type) Return ChildKluBill objects filtered by the service_type column
 * @method     ChildKluBill[]|ObjectCollection findByServiceDistrictId(string $service_district_id) Return ChildKluBill objects filtered by the service_district_id column
 * @method     ChildKluBill[]|ObjectCollection findByBillingCycle(string $billing_cycle) Return ChildKluBill objects filtered by the billing_cycle column
 * @method     ChildKluBill[]|ObjectCollection findByDueDate(string $due_date) Return ChildKluBill objects filtered by the due_date column
 * @method     ChildKluBill[]|ObjectCollection findByBillingFrom(string $billing_from) Return ChildKluBill objects filtered by the billing_from column
 * @method     ChildKluBill[]|ObjectCollection findByBillingTo(string $billing_to) Return ChildKluBill objects filtered by the billing_to column
 * @method     ChildKluBill[]|ObjectCollection findByBillDate(string $bill_date) Return ChildKluBill objects filtered by the bill_date column
 * @method     ChildKluBill[]|ObjectCollection findByRate(string $Rate) Return ChildKluBill objects filtered by the Rate column
 * @method     ChildKluBill[]|ObjectCollection findByMeternumber(string $MeterNumber) Return ChildKluBill objects filtered by the MeterNumber column
 * @method     ChildKluBill[]|ObjectCollection findByBillingmethod(string $BillingMethod) Return ChildKluBill objects filtered by the BillingMethod column
 * @method     ChildKluBill[]|ObjectCollection findByDateoflastreading(string $DateOfLastReading) Return ChildKluBill objects filtered by the DateOfLastReading column
 * @method     ChildKluBill[]|ObjectCollection findByDateofcurrentreading(string $DateOfCurrentReading) Return ChildKluBill objects filtered by the DateOfCurrentReading column
 * @method     ChildKluBill[]|ObjectCollection findByDaysusage(int $DaysUsage) Return ChildKluBill objects filtered by the DaysUsage column
 * @method     ChildKluBill[]|ObjectCollection findByLastmeterreading(int $LastMeterReading) Return ChildKluBill objects filtered by the LastMeterReading column
 * @method     ChildKluBill[]|ObjectCollection findByCurrentmeterreading(int $CurrentMeterReading) Return ChildKluBill objects filtered by the CurrentMeterReading column
 * @method     ChildKluBill[]|ObjectCollection findByUnitsconsumed(string $UnitsConsumed) Return ChildKluBill objects filtered by the UnitsConsumed column
 * @method     ChildKluBill[]|ObjectCollection findByLastpaymentamount(string $LastPaymentAmount) Return ChildKluBill objects filtered by the LastPaymentAmount column
 * @method     ChildKluBill[]|ObjectCollection findByLastpaymentdate(string $LastPaymentDate) Return ChildKluBill objects filtered by the LastPaymentDate column
 * @method     ChildKluBill[]|ObjectCollection findByMetermaintenancecharge(string $MeterMaintenanceCharge) Return ChildKluBill objects filtered by the MeterMaintenanceCharge column
 * @method     ChildKluBill[]|ObjectCollection findByDiscounts(string $Discounts) Return ChildKluBill objects filtered by the Discounts column
 * @method     ChildKluBill[]|ObjectCollection findByOthercharges(string $OtherCharges) Return ChildKluBill objects filtered by the OtherCharges column
 * @method     ChildKluBill[]|ObjectCollection findByPenaltycharges(string $PenaltyCharges) Return ChildKluBill objects filtered by the PenaltyCharges column
 * @method     ChildKluBill[]|ObjectCollection findByTaxcharges(string $TaxCharges) Return ChildKluBill objects filtered by the TaxCharges column
 * @method     ChildKluBill[]|ObjectCollection findByCharges(string $Charges) Return ChildKluBill objects filtered by the Charges column
 * @method     ChildKluBill[]|ObjectCollection findByRoutinecharges(string $RoutineCharges) Return ChildKluBill objects filtered by the RoutineCharges column
 * @method     ChildKluBill[]|ObjectCollection findByBillservicerate(int $BillServiceRate) Return ChildKluBill objects filtered by the BillServiceRate column
 * @method     ChildKluBill[]|ObjectCollection findByBuildingtype(string $BuildingType) Return ChildKluBill objects filtered by the BuildingType column
 * @method     ChildKluBill[]|ObjectCollection findByRoute(string $Route) Return ChildKluBill objects filtered by the Route column
 * @method     ChildKluBill[]|ObjectCollection findByUsagetype(string $UsageType) Return ChildKluBill objects filtered by the UsageType column
 * @method     ChildKluBill[]|ObjectCollection findByServiceCharge(string $service_charge) Return ChildKluBill objects filtered by the service_charge column
 * @method     ChildKluBill[]|ObjectCollection findByPreviousBalance(string $previous_balance) Return ChildKluBill objects filtered by the previous_balance column
 * @method     ChildKluBill[]|ObjectCollection findByPaymentReceived(string $payment_received) Return ChildKluBill objects filtered by the payment_received column
 * @method     ChildKluBill[]|ObjectCollection findByLastPaymentReceivedDate(string $last_payment_received_date) Return ChildKluBill objects filtered by the last_payment_received_date column
 * @method     ChildKluBill[]|ObjectCollection findByCurrentCharge(string $current_charge) Return ChildKluBill objects filtered by the current_charge column
 * @method     ChildKluBill[]|ObjectCollection findByTotalDue(string $total_due) Return ChildKluBill objects filtered by the total_due column
 * @method     ChildKluBill[]|ObjectCollection findByInvoiceNo(string $invoice_no) Return ChildKluBill objects filtered by the invoice_no column
 * @method     ChildKluBill[]|ObjectCollection findByReceiptNo(string $receipt_no) Return ChildKluBill objects filtered by the receipt_no column
 * @method     ChildKluBill[]|ObjectCollection findByDateCreated(string $date_created) Return ChildKluBill objects filtered by the date_created column
 * @method     ChildKluBill[]|ObjectCollection findByCreator(string $creator) Return ChildKluBill objects filtered by the creator column
 * @method     ChildKluBill[]|ObjectCollection findByStatus(boolean $status) Return ChildKluBill objects filtered by the status column
 * @method     ChildKluBill[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KluBillQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KluBillQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KluBill', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKluBillQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKluBillQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKluBillQuery) {
            return $criteria;
        }
        $query = new ChildKluBillQuery();
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
     * @return ChildKluBill|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluBillTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KluBillTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildKluBill A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ref_no, UniqueKeyID, customer_id, account_no, service_type, service_district_id, billing_cycle, due_date, billing_from, billing_to, bill_date, Rate, MeterNumber, BillingMethod, DateOfLastReading, DateOfCurrentReading, DaysUsage, LastMeterReading, CurrentMeterReading, UnitsConsumed, LastPaymentAmount, LastPaymentDate, MeterMaintenanceCharge, Discounts, OtherCharges, PenaltyCharges, TaxCharges, Charges, RoutineCharges, BillServiceRate, BuildingType, Route, UsageType, service_charge, previous_balance, payment_received, last_payment_received_date, current_charge, total_due, invoice_no, receipt_no, date_created, creator, status FROM klu_bill WHERE id = :p0';
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
            /** @var ChildKluBill $obj */
            $obj = new ChildKluBill();
            $obj->hydrate($row);
            KluBillTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildKluBill|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KluBillTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KluBillTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_REF_NO, $refNo, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByUniquekeyid($uniquekeyid = null, $comparison = null)
    {
        if (is_array($uniquekeyid)) {
            $useMinMax = false;
            if (isset($uniquekeyid['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_UNIQUEKEYID, $uniquekeyid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uniquekeyid['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_UNIQUEKEYID, $uniquekeyid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_UNIQUEKEYID, $uniquekeyid, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_ACCOUNT_NO, $accountNo, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_SERVICE_TYPE, $serviceType, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_SERVICE_DISTRICT_ID, $serviceDistrictId, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_BILLING_CYCLE, $billingCycle, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_DUE_DATE, $dueDate, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_BILLING_FROM, $billingFrom, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_BILLING_TO, $billingTo, $comparison);
    }

    /**
     * Filter the query on the bill_date column
     *
     * Example usage:
     * <code>
     * $query->filterByBillDate('2011-03-14'); // WHERE bill_date = '2011-03-14'
     * $query->filterByBillDate('now'); // WHERE bill_date = '2011-03-14'
     * $query->filterByBillDate(array('max' => 'yesterday')); // WHERE bill_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $billDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByBillDate($billDate = null, $comparison = null)
    {
        if (is_array($billDate)) {
            $useMinMax = false;
            if (isset($billDate['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_BILL_DATE, $billDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($billDate['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_BILL_DATE, $billDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_BILL_DATE, $billDate, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_RATE, $rate, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_METERNUMBER, $meternumber, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_BILLINGMETHOD, $billingmethod, $comparison);
    }

    /**
     * Filter the query on the DateOfLastReading column
     *
     * Example usage:
     * <code>
     * $query->filterByDateoflastreading('2011-03-14'); // WHERE DateOfLastReading = '2011-03-14'
     * $query->filterByDateoflastreading('now'); // WHERE DateOfLastReading = '2011-03-14'
     * $query->filterByDateoflastreading(array('max' => 'yesterday')); // WHERE DateOfLastReading > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateoflastreading The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByDateoflastreading($dateoflastreading = null, $comparison = null)
    {
        if (is_array($dateoflastreading)) {
            $useMinMax = false;
            if (isset($dateoflastreading['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DATEOFLASTREADING, $dateoflastreading['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateoflastreading['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DATEOFLASTREADING, $dateoflastreading['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_DATEOFLASTREADING, $dateoflastreading, $comparison);
    }

    /**
     * Filter the query on the DateOfCurrentReading column
     *
     * Example usage:
     * <code>
     * $query->filterByDateofcurrentreading('2011-03-14'); // WHERE DateOfCurrentReading = '2011-03-14'
     * $query->filterByDateofcurrentreading('now'); // WHERE DateOfCurrentReading = '2011-03-14'
     * $query->filterByDateofcurrentreading(array('max' => 'yesterday')); // WHERE DateOfCurrentReading > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateofcurrentreading The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByDateofcurrentreading($dateofcurrentreading = null, $comparison = null)
    {
        if (is_array($dateofcurrentreading)) {
            $useMinMax = false;
            if (isset($dateofcurrentreading['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DATEOFCURRENTREADING, $dateofcurrentreading['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateofcurrentreading['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DATEOFCURRENTREADING, $dateofcurrentreading['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_DATEOFCURRENTREADING, $dateofcurrentreading, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByDaysusage($daysusage = null, $comparison = null)
    {
        if (is_array($daysusage)) {
            $useMinMax = false;
            if (isset($daysusage['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DAYSUSAGE, $daysusage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($daysusage['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DAYSUSAGE, $daysusage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_DAYSUSAGE, $daysusage, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByLastmeterreading($lastmeterreading = null, $comparison = null)
    {
        if (is_array($lastmeterreading)) {
            $useMinMax = false;
            if (isset($lastmeterreading['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_LASTMETERREADING, $lastmeterreading['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastmeterreading['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_LASTMETERREADING, $lastmeterreading['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_LASTMETERREADING, $lastmeterreading, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByCurrentmeterreading($currentmeterreading = null, $comparison = null)
    {
        if (is_array($currentmeterreading)) {
            $useMinMax = false;
            if (isset($currentmeterreading['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_CURRENTMETERREADING, $currentmeterreading['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentmeterreading['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_CURRENTMETERREADING, $currentmeterreading['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_CURRENTMETERREADING, $currentmeterreading, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByUnitsconsumed($unitsconsumed = null, $comparison = null)
    {
        if (is_array($unitsconsumed)) {
            $useMinMax = false;
            if (isset($unitsconsumed['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_UNITSCONSUMED, $unitsconsumed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitsconsumed['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_UNITSCONSUMED, $unitsconsumed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_UNITSCONSUMED, $unitsconsumed, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByLastpaymentamount($lastpaymentamount = null, $comparison = null)
    {
        if (is_array($lastpaymentamount)) {
            $useMinMax = false;
            if (isset($lastpaymentamount['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_LASTPAYMENTAMOUNT, $lastpaymentamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastpaymentamount['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_LASTPAYMENTAMOUNT, $lastpaymentamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_LASTPAYMENTAMOUNT, $lastpaymentamount, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_LASTPAYMENTDATE, $lastpaymentdate, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByMetermaintenancecharge($metermaintenancecharge = null, $comparison = null)
    {
        if (is_array($metermaintenancecharge)) {
            $useMinMax = false;
            if (isset($metermaintenancecharge['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($metermaintenancecharge['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_METERMAINTENANCECHARGE, $metermaintenancecharge, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByDiscounts($discounts = null, $comparison = null)
    {
        if (is_array($discounts)) {
            $useMinMax = false;
            if (isset($discounts['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DISCOUNTS, $discounts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discounts['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DISCOUNTS, $discounts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_DISCOUNTS, $discounts, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByOthercharges($othercharges = null, $comparison = null)
    {
        if (is_array($othercharges)) {
            $useMinMax = false;
            if (isset($othercharges['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_OTHERCHARGES, $othercharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($othercharges['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_OTHERCHARGES, $othercharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_OTHERCHARGES, $othercharges, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByPenaltycharges($penaltycharges = null, $comparison = null)
    {
        if (is_array($penaltycharges)) {
            $useMinMax = false;
            if (isset($penaltycharges['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_PENALTYCHARGES, $penaltycharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penaltycharges['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_PENALTYCHARGES, $penaltycharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_PENALTYCHARGES, $penaltycharges, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByTaxcharges($taxcharges = null, $comparison = null)
    {
        if (is_array($taxcharges)) {
            $useMinMax = false;
            if (isset($taxcharges['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_TAXCHARGES, $taxcharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxcharges['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_TAXCHARGES, $taxcharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_TAXCHARGES, $taxcharges, $comparison);
    }

    /**
     * Filter the query on the Charges column
     *
     * Example usage:
     * <code>
     * $query->filterByCharges(1234); // WHERE Charges = 1234
     * $query->filterByCharges(array(12, 34)); // WHERE Charges IN (12, 34)
     * $query->filterByCharges(array('min' => 12)); // WHERE Charges > 12
     * </code>
     *
     * @param     mixed $charges The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByCharges($charges = null, $comparison = null)
    {
        if (is_array($charges)) {
            $useMinMax = false;
            if (isset($charges['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_CHARGES, $charges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($charges['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_CHARGES, $charges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_CHARGES, $charges, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByRoutinecharges($routinecharges = null, $comparison = null)
    {
        if (is_array($routinecharges)) {
            $useMinMax = false;
            if (isset($routinecharges['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_ROUTINECHARGES, $routinecharges['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($routinecharges['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_ROUTINECHARGES, $routinecharges['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_ROUTINECHARGES, $routinecharges, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByBillservicerate($billservicerate = null, $comparison = null)
    {
        if (is_array($billservicerate)) {
            $useMinMax = false;
            if (isset($billservicerate['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_BILLSERVICERATE, $billservicerate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($billservicerate['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_BILLSERVICERATE, $billservicerate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_BILLSERVICERATE, $billservicerate, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_BUILDINGTYPE, $buildingtype, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_ROUTE, $route, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_USAGETYPE, $usagetype, $comparison);
    }

    /**
     * Filter the query on the service_charge column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceCharge(1234); // WHERE service_charge = 1234
     * $query->filterByServiceCharge(array(12, 34)); // WHERE service_charge IN (12, 34)
     * $query->filterByServiceCharge(array('min' => 12)); // WHERE service_charge > 12
     * </code>
     *
     * @param     mixed $serviceCharge The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByServiceCharge($serviceCharge = null, $comparison = null)
    {
        if (is_array($serviceCharge)) {
            $useMinMax = false;
            if (isset($serviceCharge['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_SERVICE_CHARGE, $serviceCharge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceCharge['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_SERVICE_CHARGE, $serviceCharge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_SERVICE_CHARGE, $serviceCharge, $comparison);
    }

    /**
     * Filter the query on the previous_balance column
     *
     * Example usage:
     * <code>
     * $query->filterByPreviousBalance(1234); // WHERE previous_balance = 1234
     * $query->filterByPreviousBalance(array(12, 34)); // WHERE previous_balance IN (12, 34)
     * $query->filterByPreviousBalance(array('min' => 12)); // WHERE previous_balance > 12
     * </code>
     *
     * @param     mixed $previousBalance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByPreviousBalance($previousBalance = null, $comparison = null)
    {
        if (is_array($previousBalance)) {
            $useMinMax = false;
            if (isset($previousBalance['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_PREVIOUS_BALANCE, $previousBalance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($previousBalance['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_PREVIOUS_BALANCE, $previousBalance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_PREVIOUS_BALANCE, $previousBalance, $comparison);
    }

    /**
     * Filter the query on the payment_received column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentReceived(1234); // WHERE payment_received = 1234
     * $query->filterByPaymentReceived(array(12, 34)); // WHERE payment_received IN (12, 34)
     * $query->filterByPaymentReceived(array('min' => 12)); // WHERE payment_received > 12
     * </code>
     *
     * @param     mixed $paymentReceived The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByPaymentReceived($paymentReceived = null, $comparison = null)
    {
        if (is_array($paymentReceived)) {
            $useMinMax = false;
            if (isset($paymentReceived['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_PAYMENT_RECEIVED, $paymentReceived['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paymentReceived['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_PAYMENT_RECEIVED, $paymentReceived['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_PAYMENT_RECEIVED, $paymentReceived, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByLastPaymentReceivedDate($lastPaymentReceivedDate = null, $comparison = null)
    {
        if (is_array($lastPaymentReceivedDate)) {
            $useMinMax = false;
            if (isset($lastPaymentReceivedDate['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, $lastPaymentReceivedDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastPaymentReceivedDate['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, $lastPaymentReceivedDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, $lastPaymentReceivedDate, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByCurrentCharge($currentCharge = null, $comparison = null)
    {
        if (is_array($currentCharge)) {
            $useMinMax = false;
            if (isset($currentCharge['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_CURRENT_CHARGE, $currentCharge['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currentCharge['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_CURRENT_CHARGE, $currentCharge['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_CURRENT_CHARGE, $currentCharge, $comparison);
    }

    /**
     * Filter the query on the total_due column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalDue(1234); // WHERE total_due = 1234
     * $query->filterByTotalDue(array(12, 34)); // WHERE total_due IN (12, 34)
     * $query->filterByTotalDue(array('min' => 12)); // WHERE total_due > 12
     * </code>
     *
     * @param     mixed $totalDue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByTotalDue($totalDue = null, $comparison = null)
    {
        if (is_array($totalDue)) {
            $useMinMax = false;
            if (isset($totalDue['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_TOTAL_DUE, $totalDue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalDue['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_TOTAL_DUE, $totalDue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_TOTAL_DUE, $totalDue, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_INVOICE_NO, $invoiceNo, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KluBillTableMap::COL_RECEIPT_NO, $receiptNo, $comparison);
    }

    /**
     * Filter the query on the date_created column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCreated('2011-03-14'); // WHERE date_created = '2011-03-14'
     * $query->filterByDateCreated('now'); // WHERE date_created = '2011-03-14'
     * $query->filterByDateCreated(array('max' => 'yesterday')); // WHERE date_created > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateCreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(KluBillTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query on the creator column
     *
     * Example usage:
     * <code>
     * $query->filterByCreator('fooValue');   // WHERE creator = 'fooValue'
     * $query->filterByCreator('%fooValue%'); // WHERE creator LIKE '%fooValue%'
     * </code>
     *
     * @param     string $creator The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByCreator($creator = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($creator)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $creator)) {
                $creator = str_replace('*', '%', $creator);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KluBillTableMap::COL_CREATOR, $creator, $comparison);
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
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(KluBillTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKluBill $kluBill Object to remove from the list of results
     *
     * @return $this|ChildKluBillQuery The current query, for fluid interface
     */
    public function prune($kluBill = null)
    {
        if ($kluBill) {
            $this->addUsingAlias(KluBillTableMap::COL_ID, $kluBill->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the klu_bill table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KluBillTableMap::clearInstancePool();
            KluBillTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KluBillTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KluBillTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KluBillTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KluBillQuery
