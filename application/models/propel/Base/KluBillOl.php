<?php

namespace Base;

use \KluBillOlQuery as ChildKluBillOlQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\KluBillOlTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'klu_bill_ol' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class KluBillOl implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\KluBillOlTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the ref_no field.
     *
     * @var        string
     */
    protected $ref_no;

    /**
     * The value for the customer_id field.
     *
     * @var        string
     */
    protected $customer_id;

    /**
     * The value for the service_type field.
     *
     * @var        string
     */
    protected $service_type;

    /**
     * The value for the service_district_id field.
     *
     * @var        string
     */
    protected $service_district_id;

    /**
     * The value for the billing_cycle field.
     *
     * @var        string
     */
    protected $billing_cycle;

    /**
     * The value for the due_date field.
     *
     * @var        string
     */
    protected $due_date;

    /**
     * The value for the billing_from field.
     *
     * @var        string
     */
    protected $billing_from;

    /**
     * The value for the billing_to field.
     *
     * @var        string
     */
    protected $billing_to;

    /**
     * The value for the bill_date field.
     *
     * @var        string
     */
    protected $bill_date;

    /**
     * The value for the rate field.
     *
     * @var        string
     */
    protected $rate;

    /**
     * The value for the meternumber field.
     *
     * @var        string
     */
    protected $meternumber;

    /**
     * The value for the billingmethod field.
     *
     * @var        string
     */
    protected $billingmethod;

    /**
     * The value for the dateoflastreading field.
     *
     * @var        string
     */
    protected $dateoflastreading;

    /**
     * The value for the dateofcurrentreading field.
     *
     * @var        string
     */
    protected $dateofcurrentreading;

    /**
     * The value for the daysusage field.
     *
     * @var        int
     */
    protected $daysusage;

    /**
     * The value for the lastmeterreading field.
     *
     * @var        int
     */
    protected $lastmeterreading;

    /**
     * The value for the currentmeterreading field.
     *
     * @var        int
     */
    protected $currentmeterreading;

    /**
     * The value for the unitsconsumed field.
     *
     * @var        string
     */
    protected $unitsconsumed;

    /**
     * The value for the lastpaymentamount field.
     *
     * @var        string
     */
    protected $lastpaymentamount;

    /**
     * The value for the lastpaymentdate field.
     *
     * @var        string
     */
    protected $lastpaymentdate;

    /**
     * The value for the metermaintenancecharge field.
     *
     * @var        string
     */
    protected $metermaintenancecharge;

    /**
     * The value for the discounts field.
     *
     * @var        string
     */
    protected $discounts;

    /**
     * The value for the othercharges field.
     *
     * @var        string
     */
    protected $othercharges;

    /**
     * The value for the penaltycharges field.
     *
     * @var        string
     */
    protected $penaltycharges;

    /**
     * The value for the taxcharges field.
     *
     * @var        string
     */
    protected $taxcharges;

    /**
     * The value for the routinecharges field.
     *
     * @var        string
     */
    protected $routinecharges;

    /**
     * The value for the buildingtype field.
     *
     * @var        string
     */
    protected $buildingtype;

    /**
     * The value for the route field.
     *
     * @var        string
     */
    protected $route;

    /**
     * The value for the usagetype field.
     *
     * @var        string
     */
    protected $usagetype;

    /**
     * The value for the service_charge field.
     *
     * @var        string
     */
    protected $service_charge;

    /**
     * The value for the previous_balance field.
     *
     * @var        string
     */
    protected $previous_balance;

    /**
     * The value for the payment_received field.
     *
     * @var        string
     */
    protected $payment_received;

    /**
     * The value for the last_payment_received_date field.
     *
     * @var        DateTime
     */
    protected $last_payment_received_date;

    /**
     * The value for the current_charge field.
     *
     * @var        string
     */
    protected $current_charge;

    /**
     * The value for the total_due field.
     *
     * @var        string
     */
    protected $total_due;

    /**
     * The value for the invoice_no field.
     *
     * @var        string
     */
    protected $invoice_no;

    /**
     * The value for the receipt_no field.
     *
     * @var        string
     */
    protected $receipt_no;

    /**
     * The value for the status field.
     *
     * @var        boolean
     */
    protected $status;

    /**
     * The value for the created_date field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $created_date;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of Base\KluBillOl object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>KluBillOl</code> instance.  If
     * <code>obj</code> is an instance of <code>KluBillOl</code>, delegates to
     * <code>equals(KluBillOl)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|KluBillOl The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [ref_no] column value.
     *
     * @return string
     */
    public function getRefNo()
    {
        return $this->ref_no;
    }

    /**
     * Get the [customer_id] column value.
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Get the [service_type] column value.
     *
     * @return string
     */
    public function getServiceType()
    {
        return $this->service_type;
    }

    /**
     * Get the [service_district_id] column value.
     *
     * @return string
     */
    public function getServiceDistrictId()
    {
        return $this->service_district_id;
    }

    /**
     * Get the [billing_cycle] column value.
     *
     * @return string
     */
    public function getBillingCycle()
    {
        return $this->billing_cycle;
    }

    /**
     * Get the [due_date] column value.
     *
     * @return string
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * Get the [billing_from] column value.
     *
     * @return string
     */
    public function getBillingFrom()
    {
        return $this->billing_from;
    }

    /**
     * Get the [billing_to] column value.
     *
     * @return string
     */
    public function getBillingTo()
    {
        return $this->billing_to;
    }

    /**
     * Get the [bill_date] column value.
     *
     * @return string
     */
    public function getBillDate()
    {
        return $this->bill_date;
    }

    /**
     * Get the [rate] column value.
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Get the [meternumber] column value.
     *
     * @return string
     */
    public function getMeternumber()
    {
        return $this->meternumber;
    }

    /**
     * Get the [billingmethod] column value.
     *
     * @return string
     */
    public function getBillingmethod()
    {
        return $this->billingmethod;
    }

    /**
     * Get the [dateoflastreading] column value.
     *
     * @return string
     */
    public function getDateoflastreading()
    {
        return $this->dateoflastreading;
    }

    /**
     * Get the [dateofcurrentreading] column value.
     *
     * @return string
     */
    public function getDateofcurrentreading()
    {
        return $this->dateofcurrentreading;
    }

    /**
     * Get the [daysusage] column value.
     *
     * @return int
     */
    public function getDaysusage()
    {
        return $this->daysusage;
    }

    /**
     * Get the [lastmeterreading] column value.
     *
     * @return int
     */
    public function getLastmeterreading()
    {
        return $this->lastmeterreading;
    }

    /**
     * Get the [currentmeterreading] column value.
     *
     * @return int
     */
    public function getCurrentmeterreading()
    {
        return $this->currentmeterreading;
    }

    /**
     * Get the [unitsconsumed] column value.
     *
     * @return string
     */
    public function getUnitsconsumed()
    {
        return $this->unitsconsumed;
    }

    /**
     * Get the [lastpaymentamount] column value.
     *
     * @return string
     */
    public function getLastpaymentamount()
    {
        return $this->lastpaymentamount;
    }

    /**
     * Get the [lastpaymentdate] column value.
     *
     * @return string
     */
    public function getLastpaymentdate()
    {
        return $this->lastpaymentdate;
    }

    /**
     * Get the [metermaintenancecharge] column value.
     *
     * @return string
     */
    public function getMetermaintenancecharge()
    {
        return $this->metermaintenancecharge;
    }

    /**
     * Get the [discounts] column value.
     *
     * @return string
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * Get the [othercharges] column value.
     *
     * @return string
     */
    public function getOthercharges()
    {
        return $this->othercharges;
    }

    /**
     * Get the [penaltycharges] column value.
     *
     * @return string
     */
    public function getPenaltycharges()
    {
        return $this->penaltycharges;
    }

    /**
     * Get the [taxcharges] column value.
     *
     * @return string
     */
    public function getTaxcharges()
    {
        return $this->taxcharges;
    }

    /**
     * Get the [routinecharges] column value.
     *
     * @return string
     */
    public function getRoutinecharges()
    {
        return $this->routinecharges;
    }

    /**
     * Get the [buildingtype] column value.
     *
     * @return string
     */
    public function getBuildingtype()
    {
        return $this->buildingtype;
    }

    /**
     * Get the [route] column value.
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the [usagetype] column value.
     *
     * @return string
     */
    public function getUsagetype()
    {
        return $this->usagetype;
    }

    /**
     * Get the [service_charge] column value.
     *
     * @return string
     */
    public function getServiceCharge()
    {
        return $this->service_charge;
    }

    /**
     * Get the [previous_balance] column value.
     *
     * @return string
     */
    public function getPreviousBalance()
    {
        return $this->previous_balance;
    }

    /**
     * Get the [payment_received] column value.
     *
     * @return string
     */
    public function getPaymentReceived()
    {
        return $this->payment_received;
    }

    /**
     * Get the [optionally formatted] temporal [last_payment_received_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastPaymentReceivedDate($format = NULL)
    {
        if ($format === null) {
            return $this->last_payment_received_date;
        } else {
            return $this->last_payment_received_date instanceof \DateTimeInterface ? $this->last_payment_received_date->format($format) : null;
        }
    }

    /**
     * Get the [current_charge] column value.
     *
     * @return string
     */
    public function getCurrentCharge()
    {
        return $this->current_charge;
    }

    /**
     * Get the [total_due] column value.
     *
     * @return string
     */
    public function getTotalDue()
    {
        return $this->total_due;
    }

    /**
     * Get the [invoice_no] column value.
     *
     * @return string
     */
    public function getInvoiceNo()
    {
        return $this->invoice_no;
    }

    /**
     * Get the [receipt_no] column value.
     *
     * @return string
     */
    public function getReceiptNo()
    {
        return $this->receipt_no;
    }

    /**
     * Get the [status] column value.
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [status] column value.
     *
     * @return boolean
     */
    public function isStatus()
    {
        return $this->getStatus();
    }

    /**
     * Get the [optionally formatted] temporal [created_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedDate($format = NULL)
    {
        if ($format === null) {
            return $this->created_date;
        } else {
            return $this->created_date instanceof \DateTimeInterface ? $this->created_date->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [ref_no] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setRefNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ref_no !== $v) {
            $this->ref_no = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_REF_NO] = true;
        }

        return $this;
    } // setRefNo()

    /**
     * Set the value of [customer_id] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setCustomerId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->customer_id !== $v) {
            $this->customer_id = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_CUSTOMER_ID] = true;
        }

        return $this;
    } // setCustomerId()

    /**
     * Set the value of [service_type] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setServiceType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->service_type !== $v) {
            $this->service_type = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_SERVICE_TYPE] = true;
        }

        return $this;
    } // setServiceType()

    /**
     * Set the value of [service_district_id] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setServiceDistrictId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->service_district_id !== $v) {
            $this->service_district_id = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_SERVICE_DISTRICT_ID] = true;
        }

        return $this;
    } // setServiceDistrictId()

    /**
     * Set the value of [billing_cycle] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setBillingCycle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billing_cycle !== $v) {
            $this->billing_cycle = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_BILLING_CYCLE] = true;
        }

        return $this;
    } // setBillingCycle()

    /**
     * Set the value of [due_date] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setDueDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->due_date !== $v) {
            $this->due_date = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_DUE_DATE] = true;
        }

        return $this;
    } // setDueDate()

    /**
     * Set the value of [billing_from] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setBillingFrom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billing_from !== $v) {
            $this->billing_from = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_BILLING_FROM] = true;
        }

        return $this;
    } // setBillingFrom()

    /**
     * Set the value of [billing_to] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setBillingTo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billing_to !== $v) {
            $this->billing_to = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_BILLING_TO] = true;
        }

        return $this;
    } // setBillingTo()

    /**
     * Set the value of [bill_date] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setBillDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bill_date !== $v) {
            $this->bill_date = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_BILL_DATE] = true;
        }

        return $this;
    } // setBillDate()

    /**
     * Set the value of [rate] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setRate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rate !== $v) {
            $this->rate = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_RATE] = true;
        }

        return $this;
    } // setRate()

    /**
     * Set the value of [meternumber] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setMeternumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->meternumber !== $v) {
            $this->meternumber = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_METERNUMBER] = true;
        }

        return $this;
    } // setMeternumber()

    /**
     * Set the value of [billingmethod] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setBillingmethod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billingmethod !== $v) {
            $this->billingmethod = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_BILLINGMETHOD] = true;
        }

        return $this;
    } // setBillingmethod()

    /**
     * Set the value of [dateoflastreading] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setDateoflastreading($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dateoflastreading !== $v) {
            $this->dateoflastreading = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_DATEOFLASTREADING] = true;
        }

        return $this;
    } // setDateoflastreading()

    /**
     * Set the value of [dateofcurrentreading] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setDateofcurrentreading($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dateofcurrentreading !== $v) {
            $this->dateofcurrentreading = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_DATEOFCURRENTREADING] = true;
        }

        return $this;
    } // setDateofcurrentreading()

    /**
     * Set the value of [daysusage] column.
     *
     * @param int $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setDaysusage($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->daysusage !== $v) {
            $this->daysusage = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_DAYSUSAGE] = true;
        }

        return $this;
    } // setDaysusage()

    /**
     * Set the value of [lastmeterreading] column.
     *
     * @param int $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setLastmeterreading($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lastmeterreading !== $v) {
            $this->lastmeterreading = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_LASTMETERREADING] = true;
        }

        return $this;
    } // setLastmeterreading()

    /**
     * Set the value of [currentmeterreading] column.
     *
     * @param int $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setCurrentmeterreading($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->currentmeterreading !== $v) {
            $this->currentmeterreading = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_CURRENTMETERREADING] = true;
        }

        return $this;
    } // setCurrentmeterreading()

    /**
     * Set the value of [unitsconsumed] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setUnitsconsumed($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unitsconsumed !== $v) {
            $this->unitsconsumed = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_UNITSCONSUMED] = true;
        }

        return $this;
    } // setUnitsconsumed()

    /**
     * Set the value of [lastpaymentamount] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setLastpaymentamount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastpaymentamount !== $v) {
            $this->lastpaymentamount = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_LASTPAYMENTAMOUNT] = true;
        }

        return $this;
    } // setLastpaymentamount()

    /**
     * Set the value of [lastpaymentdate] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setLastpaymentdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastpaymentdate !== $v) {
            $this->lastpaymentdate = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_LASTPAYMENTDATE] = true;
        }

        return $this;
    } // setLastpaymentdate()

    /**
     * Set the value of [metermaintenancecharge] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setMetermaintenancecharge($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->metermaintenancecharge !== $v) {
            $this->metermaintenancecharge = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_METERMAINTENANCECHARGE] = true;
        }

        return $this;
    } // setMetermaintenancecharge()

    /**
     * Set the value of [discounts] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setDiscounts($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discounts !== $v) {
            $this->discounts = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_DISCOUNTS] = true;
        }

        return $this;
    } // setDiscounts()

    /**
     * Set the value of [othercharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setOthercharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->othercharges !== $v) {
            $this->othercharges = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_OTHERCHARGES] = true;
        }

        return $this;
    } // setOthercharges()

    /**
     * Set the value of [penaltycharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setPenaltycharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->penaltycharges !== $v) {
            $this->penaltycharges = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_PENALTYCHARGES] = true;
        }

        return $this;
    } // setPenaltycharges()

    /**
     * Set the value of [taxcharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setTaxcharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taxcharges !== $v) {
            $this->taxcharges = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_TAXCHARGES] = true;
        }

        return $this;
    } // setTaxcharges()

    /**
     * Set the value of [routinecharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setRoutinecharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->routinecharges !== $v) {
            $this->routinecharges = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_ROUTINECHARGES] = true;
        }

        return $this;
    } // setRoutinecharges()

    /**
     * Set the value of [buildingtype] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setBuildingtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->buildingtype !== $v) {
            $this->buildingtype = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_BUILDINGTYPE] = true;
        }

        return $this;
    } // setBuildingtype()

    /**
     * Set the value of [route] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setRoute($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->route !== $v) {
            $this->route = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_ROUTE] = true;
        }

        return $this;
    } // setRoute()

    /**
     * Set the value of [usagetype] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setUsagetype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usagetype !== $v) {
            $this->usagetype = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_USAGETYPE] = true;
        }

        return $this;
    } // setUsagetype()

    /**
     * Set the value of [service_charge] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setServiceCharge($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->service_charge !== $v) {
            $this->service_charge = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_SERVICE_CHARGE] = true;
        }

        return $this;
    } // setServiceCharge()

    /**
     * Set the value of [previous_balance] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setPreviousBalance($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->previous_balance !== $v) {
            $this->previous_balance = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_PREVIOUS_BALANCE] = true;
        }

        return $this;
    } // setPreviousBalance()

    /**
     * Set the value of [payment_received] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setPaymentReceived($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_received !== $v) {
            $this->payment_received = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_PAYMENT_RECEIVED] = true;
        }

        return $this;
    } // setPaymentReceived()

    /**
     * Sets the value of [last_payment_received_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setLastPaymentReceivedDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_payment_received_date !== null || $dt !== null) {
            if ($this->last_payment_received_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_payment_received_date->format("Y-m-d H:i:s.u")) {
                $this->last_payment_received_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setLastPaymentReceivedDate()

    /**
     * Set the value of [current_charge] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setCurrentCharge($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->current_charge !== $v) {
            $this->current_charge = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_CURRENT_CHARGE] = true;
        }

        return $this;
    } // setCurrentCharge()

    /**
     * Set the value of [total_due] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setTotalDue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_due !== $v) {
            $this->total_due = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_TOTAL_DUE] = true;
        }

        return $this;
    } // setTotalDue()

    /**
     * Set the value of [invoice_no] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setInvoiceNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->invoice_no !== $v) {
            $this->invoice_no = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_INVOICE_NO] = true;
        }

        return $this;
    } // setInvoiceNo()

    /**
     * Set the value of [receipt_no] column.
     *
     * @param string $v new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setReceiptNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->receipt_no !== $v) {
            $this->receipt_no = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_RECEIPT_NO] = true;
        }

        return $this;
    } // setReceiptNo()

    /**
     * Sets the value of the [status] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[KluBillOlTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Sets the value of [created_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\KluBillOl The current object (for fluent API support)
     */
    public function setCreatedDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_date !== null || $dt !== null) {
            if ($this->created_date === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->created_date->format("Y-m-d H:i:s.u")) {
                $this->created_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[KluBillOlTableMap::COL_CREATED_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedDate()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : KluBillOlTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : KluBillOlTableMap::translateFieldName('RefNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ref_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : KluBillOlTableMap::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : KluBillOlTableMap::translateFieldName('ServiceType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->service_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : KluBillOlTableMap::translateFieldName('ServiceDistrictId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->service_district_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : KluBillOlTableMap::translateFieldName('BillingCycle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billing_cycle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : KluBillOlTableMap::translateFieldName('DueDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->due_date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : KluBillOlTableMap::translateFieldName('BillingFrom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billing_from = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : KluBillOlTableMap::translateFieldName('BillingTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billing_to = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : KluBillOlTableMap::translateFieldName('BillDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bill_date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : KluBillOlTableMap::translateFieldName('Rate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : KluBillOlTableMap::translateFieldName('Meternumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->meternumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : KluBillOlTableMap::translateFieldName('Billingmethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billingmethod = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : KluBillOlTableMap::translateFieldName('Dateoflastreading', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dateoflastreading = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : KluBillOlTableMap::translateFieldName('Dateofcurrentreading', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dateofcurrentreading = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : KluBillOlTableMap::translateFieldName('Daysusage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->daysusage = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : KluBillOlTableMap::translateFieldName('Lastmeterreading', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastmeterreading = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : KluBillOlTableMap::translateFieldName('Currentmeterreading', TableMap::TYPE_PHPNAME, $indexType)];
            $this->currentmeterreading = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : KluBillOlTableMap::translateFieldName('Unitsconsumed', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unitsconsumed = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : KluBillOlTableMap::translateFieldName('Lastpaymentamount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastpaymentamount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : KluBillOlTableMap::translateFieldName('Lastpaymentdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastpaymentdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : KluBillOlTableMap::translateFieldName('Metermaintenancecharge', TableMap::TYPE_PHPNAME, $indexType)];
            $this->metermaintenancecharge = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : KluBillOlTableMap::translateFieldName('Discounts', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discounts = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : KluBillOlTableMap::translateFieldName('Othercharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->othercharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : KluBillOlTableMap::translateFieldName('Penaltycharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->penaltycharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : KluBillOlTableMap::translateFieldName('Taxcharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taxcharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : KluBillOlTableMap::translateFieldName('Routinecharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->routinecharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : KluBillOlTableMap::translateFieldName('Buildingtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->buildingtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : KluBillOlTableMap::translateFieldName('Route', TableMap::TYPE_PHPNAME, $indexType)];
            $this->route = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : KluBillOlTableMap::translateFieldName('Usagetype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usagetype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : KluBillOlTableMap::translateFieldName('ServiceCharge', TableMap::TYPE_PHPNAME, $indexType)];
            $this->service_charge = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : KluBillOlTableMap::translateFieldName('PreviousBalance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->previous_balance = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : KluBillOlTableMap::translateFieldName('PaymentReceived', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_received = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : KluBillOlTableMap::translateFieldName('LastPaymentReceivedDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_payment_received_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : KluBillOlTableMap::translateFieldName('CurrentCharge', TableMap::TYPE_PHPNAME, $indexType)];
            $this->current_charge = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : KluBillOlTableMap::translateFieldName('TotalDue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_due = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : KluBillOlTableMap::translateFieldName('InvoiceNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : KluBillOlTableMap::translateFieldName('ReceiptNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->receipt_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : KluBillOlTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : KluBillOlTableMap::translateFieldName('CreatedDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->created_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 40; // 40 = KluBillOlTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\KluBillOl'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluBillOlTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildKluBillOlQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see KluBillOl::setDeleted()
     * @see KluBillOl::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillOlTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildKluBillOlQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillOlTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                KluBillOlTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[KluBillOlTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . KluBillOlTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(KluBillOlTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_REF_NO)) {
            $modifiedColumns[':p' . $index++]  = 'ref_no';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_CUSTOMER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'customer_id';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_SERVICE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'service_type';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_SERVICE_DISTRICT_ID)) {
            $modifiedColumns[':p' . $index++]  = 'service_district_id';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILLING_CYCLE)) {
            $modifiedColumns[':p' . $index++]  = 'billing_cycle';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DUE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'due_date';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILLING_FROM)) {
            $modifiedColumns[':p' . $index++]  = 'billing_from';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILLING_TO)) {
            $modifiedColumns[':p' . $index++]  = 'billing_to';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'bill_date';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_RATE)) {
            $modifiedColumns[':p' . $index++]  = 'Rate';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_METERNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'MeterNumber';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILLINGMETHOD)) {
            $modifiedColumns[':p' . $index++]  = 'BillingMethod';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DATEOFLASTREADING)) {
            $modifiedColumns[':p' . $index++]  = 'DateOfLastReading';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DATEOFCURRENTREADING)) {
            $modifiedColumns[':p' . $index++]  = 'DateOfCurrentReading';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DAYSUSAGE)) {
            $modifiedColumns[':p' . $index++]  = 'DaysUsage';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_LASTMETERREADING)) {
            $modifiedColumns[':p' . $index++]  = 'LastMeterReading';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_CURRENTMETERREADING)) {
            $modifiedColumns[':p' . $index++]  = 'CurrentMeterReading';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_UNITSCONSUMED)) {
            $modifiedColumns[':p' . $index++]  = 'UnitsConsumed';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_LASTPAYMENTAMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'LastPaymentAmount';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_LASTPAYMENTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'LastPaymentDate';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_METERMAINTENANCECHARGE)) {
            $modifiedColumns[':p' . $index++]  = 'MeterMaintenanceCharge';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DISCOUNTS)) {
            $modifiedColumns[':p' . $index++]  = 'Discounts';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_OTHERCHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'OtherCharges';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_PENALTYCHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'PenaltyCharges';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_TAXCHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'TaxCharges';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_ROUTINECHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'RoutineCharges';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BUILDINGTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'BuildingType';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_ROUTE)) {
            $modifiedColumns[':p' . $index++]  = 'Route';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_USAGETYPE)) {
            $modifiedColumns[':p' . $index++]  = 'UsageType';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_SERVICE_CHARGE)) {
            $modifiedColumns[':p' . $index++]  = 'service_charge';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_PREVIOUS_BALANCE)) {
            $modifiedColumns[':p' . $index++]  = 'previous_balance';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_PAYMENT_RECEIVED)) {
            $modifiedColumns[':p' . $index++]  = 'payment_received';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'last_payment_received_date';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_CURRENT_CHARGE)) {
            $modifiedColumns[':p' . $index++]  = 'current_charge';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_TOTAL_DUE)) {
            $modifiedColumns[':p' . $index++]  = 'total_due';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_INVOICE_NO)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_no';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_RECEIPT_NO)) {
            $modifiedColumns[':p' . $index++]  = 'receipt_no';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_CREATED_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'created_date';
        }

        $sql = sprintf(
            'INSERT INTO klu_bill_ol (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'ref_no':
                        $stmt->bindValue($identifier, $this->ref_no, PDO::PARAM_STR);
                        break;
                    case 'customer_id':
                        $stmt->bindValue($identifier, $this->customer_id, PDO::PARAM_STR);
                        break;
                    case 'service_type':
                        $stmt->bindValue($identifier, $this->service_type, PDO::PARAM_STR);
                        break;
                    case 'service_district_id':
                        $stmt->bindValue($identifier, $this->service_district_id, PDO::PARAM_STR);
                        break;
                    case 'billing_cycle':
                        $stmt->bindValue($identifier, $this->billing_cycle, PDO::PARAM_STR);
                        break;
                    case 'due_date':
                        $stmt->bindValue($identifier, $this->due_date, PDO::PARAM_STR);
                        break;
                    case 'billing_from':
                        $stmt->bindValue($identifier, $this->billing_from, PDO::PARAM_STR);
                        break;
                    case 'billing_to':
                        $stmt->bindValue($identifier, $this->billing_to, PDO::PARAM_STR);
                        break;
                    case 'bill_date':
                        $stmt->bindValue($identifier, $this->bill_date, PDO::PARAM_STR);
                        break;
                    case 'Rate':
                        $stmt->bindValue($identifier, $this->rate, PDO::PARAM_STR);
                        break;
                    case 'MeterNumber':
                        $stmt->bindValue($identifier, $this->meternumber, PDO::PARAM_STR);
                        break;
                    case 'BillingMethod':
                        $stmt->bindValue($identifier, $this->billingmethod, PDO::PARAM_STR);
                        break;
                    case 'DateOfLastReading':
                        $stmt->bindValue($identifier, $this->dateoflastreading, PDO::PARAM_STR);
                        break;
                    case 'DateOfCurrentReading':
                        $stmt->bindValue($identifier, $this->dateofcurrentreading, PDO::PARAM_STR);
                        break;
                    case 'DaysUsage':
                        $stmt->bindValue($identifier, $this->daysusage, PDO::PARAM_INT);
                        break;
                    case 'LastMeterReading':
                        $stmt->bindValue($identifier, $this->lastmeterreading, PDO::PARAM_INT);
                        break;
                    case 'CurrentMeterReading':
                        $stmt->bindValue($identifier, $this->currentmeterreading, PDO::PARAM_INT);
                        break;
                    case 'UnitsConsumed':
                        $stmt->bindValue($identifier, $this->unitsconsumed, PDO::PARAM_STR);
                        break;
                    case 'LastPaymentAmount':
                        $stmt->bindValue($identifier, $this->lastpaymentamount, PDO::PARAM_STR);
                        break;
                    case 'LastPaymentDate':
                        $stmt->bindValue($identifier, $this->lastpaymentdate, PDO::PARAM_STR);
                        break;
                    case 'MeterMaintenanceCharge':
                        $stmt->bindValue($identifier, $this->metermaintenancecharge, PDO::PARAM_STR);
                        break;
                    case 'Discounts':
                        $stmt->bindValue($identifier, $this->discounts, PDO::PARAM_STR);
                        break;
                    case 'OtherCharges':
                        $stmt->bindValue($identifier, $this->othercharges, PDO::PARAM_STR);
                        break;
                    case 'PenaltyCharges':
                        $stmt->bindValue($identifier, $this->penaltycharges, PDO::PARAM_STR);
                        break;
                    case 'TaxCharges':
                        $stmt->bindValue($identifier, $this->taxcharges, PDO::PARAM_STR);
                        break;
                    case 'RoutineCharges':
                        $stmt->bindValue($identifier, $this->routinecharges, PDO::PARAM_STR);
                        break;
                    case 'BuildingType':
                        $stmt->bindValue($identifier, $this->buildingtype, PDO::PARAM_STR);
                        break;
                    case 'Route':
                        $stmt->bindValue($identifier, $this->route, PDO::PARAM_STR);
                        break;
                    case 'UsageType':
                        $stmt->bindValue($identifier, $this->usagetype, PDO::PARAM_STR);
                        break;
                    case 'service_charge':
                        $stmt->bindValue($identifier, $this->service_charge, PDO::PARAM_STR);
                        break;
                    case 'previous_balance':
                        $stmt->bindValue($identifier, $this->previous_balance, PDO::PARAM_STR);
                        break;
                    case 'payment_received':
                        $stmt->bindValue($identifier, $this->payment_received, PDO::PARAM_STR);
                        break;
                    case 'last_payment_received_date':
                        $stmt->bindValue($identifier, $this->last_payment_received_date ? $this->last_payment_received_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'current_charge':
                        $stmt->bindValue($identifier, $this->current_charge, PDO::PARAM_STR);
                        break;
                    case 'total_due':
                        $stmt->bindValue($identifier, $this->total_due, PDO::PARAM_STR);
                        break;
                    case 'invoice_no':
                        $stmt->bindValue($identifier, $this->invoice_no, PDO::PARAM_STR);
                        break;
                    case 'receipt_no':
                        $stmt->bindValue($identifier, $this->receipt_no, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, (int) $this->status, PDO::PARAM_INT);
                        break;
                    case 'created_date':
                        $stmt->bindValue($identifier, $this->created_date ? $this->created_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = KluBillOlTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getRefNo();
                break;
            case 2:
                return $this->getCustomerId();
                break;
            case 3:
                return $this->getServiceType();
                break;
            case 4:
                return $this->getServiceDistrictId();
                break;
            case 5:
                return $this->getBillingCycle();
                break;
            case 6:
                return $this->getDueDate();
                break;
            case 7:
                return $this->getBillingFrom();
                break;
            case 8:
                return $this->getBillingTo();
                break;
            case 9:
                return $this->getBillDate();
                break;
            case 10:
                return $this->getRate();
                break;
            case 11:
                return $this->getMeternumber();
                break;
            case 12:
                return $this->getBillingmethod();
                break;
            case 13:
                return $this->getDateoflastreading();
                break;
            case 14:
                return $this->getDateofcurrentreading();
                break;
            case 15:
                return $this->getDaysusage();
                break;
            case 16:
                return $this->getLastmeterreading();
                break;
            case 17:
                return $this->getCurrentmeterreading();
                break;
            case 18:
                return $this->getUnitsconsumed();
                break;
            case 19:
                return $this->getLastpaymentamount();
                break;
            case 20:
                return $this->getLastpaymentdate();
                break;
            case 21:
                return $this->getMetermaintenancecharge();
                break;
            case 22:
                return $this->getDiscounts();
                break;
            case 23:
                return $this->getOthercharges();
                break;
            case 24:
                return $this->getPenaltycharges();
                break;
            case 25:
                return $this->getTaxcharges();
                break;
            case 26:
                return $this->getRoutinecharges();
                break;
            case 27:
                return $this->getBuildingtype();
                break;
            case 28:
                return $this->getRoute();
                break;
            case 29:
                return $this->getUsagetype();
                break;
            case 30:
                return $this->getServiceCharge();
                break;
            case 31:
                return $this->getPreviousBalance();
                break;
            case 32:
                return $this->getPaymentReceived();
                break;
            case 33:
                return $this->getLastPaymentReceivedDate();
                break;
            case 34:
                return $this->getCurrentCharge();
                break;
            case 35:
                return $this->getTotalDue();
                break;
            case 36:
                return $this->getInvoiceNo();
                break;
            case 37:
                return $this->getReceiptNo();
                break;
            case 38:
                return $this->getStatus();
                break;
            case 39:
                return $this->getCreatedDate();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['KluBillOl'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['KluBillOl'][$this->hashCode()] = true;
        $keys = KluBillOlTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getRefNo(),
            $keys[2] => $this->getCustomerId(),
            $keys[3] => $this->getServiceType(),
            $keys[4] => $this->getServiceDistrictId(),
            $keys[5] => $this->getBillingCycle(),
            $keys[6] => $this->getDueDate(),
            $keys[7] => $this->getBillingFrom(),
            $keys[8] => $this->getBillingTo(),
            $keys[9] => $this->getBillDate(),
            $keys[10] => $this->getRate(),
            $keys[11] => $this->getMeternumber(),
            $keys[12] => $this->getBillingmethod(),
            $keys[13] => $this->getDateoflastreading(),
            $keys[14] => $this->getDateofcurrentreading(),
            $keys[15] => $this->getDaysusage(),
            $keys[16] => $this->getLastmeterreading(),
            $keys[17] => $this->getCurrentmeterreading(),
            $keys[18] => $this->getUnitsconsumed(),
            $keys[19] => $this->getLastpaymentamount(),
            $keys[20] => $this->getLastpaymentdate(),
            $keys[21] => $this->getMetermaintenancecharge(),
            $keys[22] => $this->getDiscounts(),
            $keys[23] => $this->getOthercharges(),
            $keys[24] => $this->getPenaltycharges(),
            $keys[25] => $this->getTaxcharges(),
            $keys[26] => $this->getRoutinecharges(),
            $keys[27] => $this->getBuildingtype(),
            $keys[28] => $this->getRoute(),
            $keys[29] => $this->getUsagetype(),
            $keys[30] => $this->getServiceCharge(),
            $keys[31] => $this->getPreviousBalance(),
            $keys[32] => $this->getPaymentReceived(),
            $keys[33] => $this->getLastPaymentReceivedDate(),
            $keys[34] => $this->getCurrentCharge(),
            $keys[35] => $this->getTotalDue(),
            $keys[36] => $this->getInvoiceNo(),
            $keys[37] => $this->getReceiptNo(),
            $keys[38] => $this->getStatus(),
            $keys[39] => $this->getCreatedDate(),
        );
        if ($result[$keys[33]] instanceof \DateTime) {
            $result[$keys[33]] = $result[$keys[33]]->format('c');
        }

        if ($result[$keys[39]] instanceof \DateTime) {
            $result[$keys[39]] = $result[$keys[39]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\KluBillOl
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = KluBillOlTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\KluBillOl
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setRefNo($value);
                break;
            case 2:
                $this->setCustomerId($value);
                break;
            case 3:
                $this->setServiceType($value);
                break;
            case 4:
                $this->setServiceDistrictId($value);
                break;
            case 5:
                $this->setBillingCycle($value);
                break;
            case 6:
                $this->setDueDate($value);
                break;
            case 7:
                $this->setBillingFrom($value);
                break;
            case 8:
                $this->setBillingTo($value);
                break;
            case 9:
                $this->setBillDate($value);
                break;
            case 10:
                $this->setRate($value);
                break;
            case 11:
                $this->setMeternumber($value);
                break;
            case 12:
                $this->setBillingmethod($value);
                break;
            case 13:
                $this->setDateoflastreading($value);
                break;
            case 14:
                $this->setDateofcurrentreading($value);
                break;
            case 15:
                $this->setDaysusage($value);
                break;
            case 16:
                $this->setLastmeterreading($value);
                break;
            case 17:
                $this->setCurrentmeterreading($value);
                break;
            case 18:
                $this->setUnitsconsumed($value);
                break;
            case 19:
                $this->setLastpaymentamount($value);
                break;
            case 20:
                $this->setLastpaymentdate($value);
                break;
            case 21:
                $this->setMetermaintenancecharge($value);
                break;
            case 22:
                $this->setDiscounts($value);
                break;
            case 23:
                $this->setOthercharges($value);
                break;
            case 24:
                $this->setPenaltycharges($value);
                break;
            case 25:
                $this->setTaxcharges($value);
                break;
            case 26:
                $this->setRoutinecharges($value);
                break;
            case 27:
                $this->setBuildingtype($value);
                break;
            case 28:
                $this->setRoute($value);
                break;
            case 29:
                $this->setUsagetype($value);
                break;
            case 30:
                $this->setServiceCharge($value);
                break;
            case 31:
                $this->setPreviousBalance($value);
                break;
            case 32:
                $this->setPaymentReceived($value);
                break;
            case 33:
                $this->setLastPaymentReceivedDate($value);
                break;
            case 34:
                $this->setCurrentCharge($value);
                break;
            case 35:
                $this->setTotalDue($value);
                break;
            case 36:
                $this->setInvoiceNo($value);
                break;
            case 37:
                $this->setReceiptNo($value);
                break;
            case 38:
                $this->setStatus($value);
                break;
            case 39:
                $this->setCreatedDate($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = KluBillOlTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRefNo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCustomerId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setServiceType($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setServiceDistrictId($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBillingCycle($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDueDate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setBillingFrom($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setBillingTo($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setBillDate($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setRate($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setMeternumber($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setBillingmethod($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setDateoflastreading($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDateofcurrentreading($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDaysusage($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setLastmeterreading($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setCurrentmeterreading($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setUnitsconsumed($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setLastpaymentamount($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setLastpaymentdate($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setMetermaintenancecharge($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setDiscounts($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setOthercharges($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setPenaltycharges($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setTaxcharges($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setRoutinecharges($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setBuildingtype($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setRoute($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setUsagetype($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setServiceCharge($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setPreviousBalance($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setPaymentReceived($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setLastPaymentReceivedDate($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setCurrentCharge($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setTotalDue($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setInvoiceNo($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setReceiptNo($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setStatus($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setCreatedDate($arr[$keys[39]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\KluBillOl The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(KluBillOlTableMap::DATABASE_NAME);

        if ($this->isColumnModified(KluBillOlTableMap::COL_ID)) {
            $criteria->add(KluBillOlTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_REF_NO)) {
            $criteria->add(KluBillOlTableMap::COL_REF_NO, $this->ref_no);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_CUSTOMER_ID)) {
            $criteria->add(KluBillOlTableMap::COL_CUSTOMER_ID, $this->customer_id);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_SERVICE_TYPE)) {
            $criteria->add(KluBillOlTableMap::COL_SERVICE_TYPE, $this->service_type);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_SERVICE_DISTRICT_ID)) {
            $criteria->add(KluBillOlTableMap::COL_SERVICE_DISTRICT_ID, $this->service_district_id);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILLING_CYCLE)) {
            $criteria->add(KluBillOlTableMap::COL_BILLING_CYCLE, $this->billing_cycle);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DUE_DATE)) {
            $criteria->add(KluBillOlTableMap::COL_DUE_DATE, $this->due_date);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILLING_FROM)) {
            $criteria->add(KluBillOlTableMap::COL_BILLING_FROM, $this->billing_from);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILLING_TO)) {
            $criteria->add(KluBillOlTableMap::COL_BILLING_TO, $this->billing_to);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILL_DATE)) {
            $criteria->add(KluBillOlTableMap::COL_BILL_DATE, $this->bill_date);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_RATE)) {
            $criteria->add(KluBillOlTableMap::COL_RATE, $this->rate);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_METERNUMBER)) {
            $criteria->add(KluBillOlTableMap::COL_METERNUMBER, $this->meternumber);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BILLINGMETHOD)) {
            $criteria->add(KluBillOlTableMap::COL_BILLINGMETHOD, $this->billingmethod);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DATEOFLASTREADING)) {
            $criteria->add(KluBillOlTableMap::COL_DATEOFLASTREADING, $this->dateoflastreading);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DATEOFCURRENTREADING)) {
            $criteria->add(KluBillOlTableMap::COL_DATEOFCURRENTREADING, $this->dateofcurrentreading);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DAYSUSAGE)) {
            $criteria->add(KluBillOlTableMap::COL_DAYSUSAGE, $this->daysusage);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_LASTMETERREADING)) {
            $criteria->add(KluBillOlTableMap::COL_LASTMETERREADING, $this->lastmeterreading);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_CURRENTMETERREADING)) {
            $criteria->add(KluBillOlTableMap::COL_CURRENTMETERREADING, $this->currentmeterreading);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_UNITSCONSUMED)) {
            $criteria->add(KluBillOlTableMap::COL_UNITSCONSUMED, $this->unitsconsumed);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_LASTPAYMENTAMOUNT)) {
            $criteria->add(KluBillOlTableMap::COL_LASTPAYMENTAMOUNT, $this->lastpaymentamount);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_LASTPAYMENTDATE)) {
            $criteria->add(KluBillOlTableMap::COL_LASTPAYMENTDATE, $this->lastpaymentdate);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_METERMAINTENANCECHARGE)) {
            $criteria->add(KluBillOlTableMap::COL_METERMAINTENANCECHARGE, $this->metermaintenancecharge);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_DISCOUNTS)) {
            $criteria->add(KluBillOlTableMap::COL_DISCOUNTS, $this->discounts);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_OTHERCHARGES)) {
            $criteria->add(KluBillOlTableMap::COL_OTHERCHARGES, $this->othercharges);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_PENALTYCHARGES)) {
            $criteria->add(KluBillOlTableMap::COL_PENALTYCHARGES, $this->penaltycharges);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_TAXCHARGES)) {
            $criteria->add(KluBillOlTableMap::COL_TAXCHARGES, $this->taxcharges);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_ROUTINECHARGES)) {
            $criteria->add(KluBillOlTableMap::COL_ROUTINECHARGES, $this->routinecharges);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_BUILDINGTYPE)) {
            $criteria->add(KluBillOlTableMap::COL_BUILDINGTYPE, $this->buildingtype);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_ROUTE)) {
            $criteria->add(KluBillOlTableMap::COL_ROUTE, $this->route);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_USAGETYPE)) {
            $criteria->add(KluBillOlTableMap::COL_USAGETYPE, $this->usagetype);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_SERVICE_CHARGE)) {
            $criteria->add(KluBillOlTableMap::COL_SERVICE_CHARGE, $this->service_charge);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_PREVIOUS_BALANCE)) {
            $criteria->add(KluBillOlTableMap::COL_PREVIOUS_BALANCE, $this->previous_balance);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_PAYMENT_RECEIVED)) {
            $criteria->add(KluBillOlTableMap::COL_PAYMENT_RECEIVED, $this->payment_received);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE)) {
            $criteria->add(KluBillOlTableMap::COL_LAST_PAYMENT_RECEIVED_DATE, $this->last_payment_received_date);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_CURRENT_CHARGE)) {
            $criteria->add(KluBillOlTableMap::COL_CURRENT_CHARGE, $this->current_charge);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_TOTAL_DUE)) {
            $criteria->add(KluBillOlTableMap::COL_TOTAL_DUE, $this->total_due);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_INVOICE_NO)) {
            $criteria->add(KluBillOlTableMap::COL_INVOICE_NO, $this->invoice_no);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_RECEIPT_NO)) {
            $criteria->add(KluBillOlTableMap::COL_RECEIPT_NO, $this->receipt_no);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_STATUS)) {
            $criteria->add(KluBillOlTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(KluBillOlTableMap::COL_CREATED_DATE)) {
            $criteria->add(KluBillOlTableMap::COL_CREATED_DATE, $this->created_date);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildKluBillOlQuery::create();
        $criteria->add(KluBillOlTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \KluBillOl (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRefNo($this->getRefNo());
        $copyObj->setCustomerId($this->getCustomerId());
        $copyObj->setServiceType($this->getServiceType());
        $copyObj->setServiceDistrictId($this->getServiceDistrictId());
        $copyObj->setBillingCycle($this->getBillingCycle());
        $copyObj->setDueDate($this->getDueDate());
        $copyObj->setBillingFrom($this->getBillingFrom());
        $copyObj->setBillingTo($this->getBillingTo());
        $copyObj->setBillDate($this->getBillDate());
        $copyObj->setRate($this->getRate());
        $copyObj->setMeternumber($this->getMeternumber());
        $copyObj->setBillingmethod($this->getBillingmethod());
        $copyObj->setDateoflastreading($this->getDateoflastreading());
        $copyObj->setDateofcurrentreading($this->getDateofcurrentreading());
        $copyObj->setDaysusage($this->getDaysusage());
        $copyObj->setLastmeterreading($this->getLastmeterreading());
        $copyObj->setCurrentmeterreading($this->getCurrentmeterreading());
        $copyObj->setUnitsconsumed($this->getUnitsconsumed());
        $copyObj->setLastpaymentamount($this->getLastpaymentamount());
        $copyObj->setLastpaymentdate($this->getLastpaymentdate());
        $copyObj->setMetermaintenancecharge($this->getMetermaintenancecharge());
        $copyObj->setDiscounts($this->getDiscounts());
        $copyObj->setOthercharges($this->getOthercharges());
        $copyObj->setPenaltycharges($this->getPenaltycharges());
        $copyObj->setTaxcharges($this->getTaxcharges());
        $copyObj->setRoutinecharges($this->getRoutinecharges());
        $copyObj->setBuildingtype($this->getBuildingtype());
        $copyObj->setRoute($this->getRoute());
        $copyObj->setUsagetype($this->getUsagetype());
        $copyObj->setServiceCharge($this->getServiceCharge());
        $copyObj->setPreviousBalance($this->getPreviousBalance());
        $copyObj->setPaymentReceived($this->getPaymentReceived());
        $copyObj->setLastPaymentReceivedDate($this->getLastPaymentReceivedDate());
        $copyObj->setCurrentCharge($this->getCurrentCharge());
        $copyObj->setTotalDue($this->getTotalDue());
        $copyObj->setInvoiceNo($this->getInvoiceNo());
        $copyObj->setReceiptNo($this->getReceiptNo());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setCreatedDate($this->getCreatedDate());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \KluBillOl Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->ref_no = null;
        $this->customer_id = null;
        $this->service_type = null;
        $this->service_district_id = null;
        $this->billing_cycle = null;
        $this->due_date = null;
        $this->billing_from = null;
        $this->billing_to = null;
        $this->bill_date = null;
        $this->rate = null;
        $this->meternumber = null;
        $this->billingmethod = null;
        $this->dateoflastreading = null;
        $this->dateofcurrentreading = null;
        $this->daysusage = null;
        $this->lastmeterreading = null;
        $this->currentmeterreading = null;
        $this->unitsconsumed = null;
        $this->lastpaymentamount = null;
        $this->lastpaymentdate = null;
        $this->metermaintenancecharge = null;
        $this->discounts = null;
        $this->othercharges = null;
        $this->penaltycharges = null;
        $this->taxcharges = null;
        $this->routinecharges = null;
        $this->buildingtype = null;
        $this->route = null;
        $this->usagetype = null;
        $this->service_charge = null;
        $this->previous_balance = null;
        $this->payment_received = null;
        $this->last_payment_received_date = null;
        $this->current_charge = null;
        $this->total_due = null;
        $this->invoice_no = null;
        $this->receipt_no = null;
        $this->status = null;
        $this->created_date = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(KluBillOlTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
