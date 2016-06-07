<?php

namespace Base;

use \KluOrderQuery as ChildKluOrderQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\KluOrderTableMap;
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
 * Base class that represents a row from the 'klu_order' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class KluOrder implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\KluOrderTableMap';


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
     * The value for the orderid field.
     *
     * @var        int
     */
    protected $orderid;

    /**
     * The value for the ref_no field.
     *
     * @var        string
     */
    protected $ref_no;

    /**
     * The value for the bill_id field.
     *
     * @var        int
     */
    protected $bill_id;

    /**
     * The value for the account_no field.
     *
     * @var        string
     */
    protected $account_no;

    /**
     * The value for the service_type field.
     *
     * @var        string
     */
    protected $service_type;

    /**
     * The value for the payment_date field.
     *
     * @var        DateTime
     */
    protected $payment_date;

    /**
     * The value for the payment_due_date field.
     *
     * @var        string
     */
    protected $payment_due_date;

    /**
     * The value for the payment_time field.
     *
     * @var        string
     */
    protected $payment_time;

    /**
     * The value for the payment_platform field.
     *
     * @var        string
     */
    protected $payment_platform;

    /**
     * The value for the cust_email field.
     *
     * @var        string
     */
    protected $cust_email;

    /**
     * The value for the cust_phone field.
     *
     * @var        string
     */
    protected $cust_phone;

    /**
     * The value for the billing_period field.
     *
     * @var        string
     */
    protected $billing_period;

    /**
     * The value for the solid_waste_rate field.
     *
     * @var        string
     */
    protected $solid_waste_rate;

    /**
     * The value for the solid_waste_vat field.
     *
     * @var        string
     */
    protected $solid_waste_vat;

    /**
     * The value for the solid_waste_tax field.
     *
     * @var        string
     */
    protected $solid_waste_tax;

    /**
     * The value for the liquid_waste_rate field.
     *
     * @var        string
     */
    protected $liquid_waste_rate;

    /**
     * The value for the liquid_waste_vat field.
     *
     * @var        string
     */
    protected $liquid_waste_vat;

    /**
     * The value for the liquid_waste_tax field.
     *
     * @var        string
     */
    protected $liquid_waste_tax;

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
     * The value for the total_amount field.
     *
     * @var        string
     */
    protected $total_amount;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\KluOrder object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>KluOrder</code> instance.  If
     * <code>obj</code> is an instance of <code>KluOrder</code>, delegates to
     * <code>equals(KluOrder)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|KluOrder The current object, for fluid interface
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
     * Get the [orderid] column value.
     *
     * @return int
     */
    public function getOrderid()
    {
        return $this->orderid;
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
     * Get the [bill_id] column value.
     *
     * @return int
     */
    public function getBillId()
    {
        return $this->bill_id;
    }

    /**
     * Get the [account_no] column value.
     *
     * @return string
     */
    public function getAccountNo()
    {
        return $this->account_no;
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
     * Get the [optionally formatted] temporal [payment_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPaymentDate($format = NULL)
    {
        if ($format === null) {
            return $this->payment_date;
        } else {
            return $this->payment_date instanceof \DateTimeInterface ? $this->payment_date->format($format) : null;
        }
    }

    /**
     * Get the [payment_due_date] column value.
     *
     * @return string
     */
    public function getPaymentDueDate()
    {
        return $this->payment_due_date;
    }

    /**
     * Get the [payment_time] column value.
     *
     * @return string
     */
    public function getPaymentTime()
    {
        return $this->payment_time;
    }

    /**
     * Get the [payment_platform] column value.
     *
     * @return string
     */
    public function getPaymentPlatform()
    {
        return $this->payment_platform;
    }

    /**
     * Get the [cust_email] column value.
     *
     * @return string
     */
    public function getCustEmail()
    {
        return $this->cust_email;
    }

    /**
     * Get the [cust_phone] column value.
     *
     * @return string
     */
    public function getCustPhone()
    {
        return $this->cust_phone;
    }

    /**
     * Get the [billing_period] column value.
     *
     * @return string
     */
    public function getBillingPeriod()
    {
        return $this->billing_period;
    }

    /**
     * Get the [solid_waste_rate] column value.
     *
     * @return string
     */
    public function getSolidWasteRate()
    {
        return $this->solid_waste_rate;
    }

    /**
     * Get the [solid_waste_vat] column value.
     *
     * @return string
     */
    public function getSolidWasteVat()
    {
        return $this->solid_waste_vat;
    }

    /**
     * Get the [solid_waste_tax] column value.
     *
     * @return string
     */
    public function getSolidWasteTax()
    {
        return $this->solid_waste_tax;
    }

    /**
     * Get the [liquid_waste_rate] column value.
     *
     * @return string
     */
    public function getLiquidWasteRate()
    {
        return $this->liquid_waste_rate;
    }

    /**
     * Get the [liquid_waste_vat] column value.
     *
     * @return string
     */
    public function getLiquidWasteVat()
    {
        return $this->liquid_waste_vat;
    }

    /**
     * Get the [liquid_waste_tax] column value.
     *
     * @return string
     */
    public function getLiquidWasteTax()
    {
        return $this->liquid_waste_tax;
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
     * Get the [total_amount] column value.
     *
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    /**
     * Set the value of [orderid] column.
     *
     * @param int $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setOrderid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->orderid !== $v) {
            $this->orderid = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_ORDERID] = true;
        }

        return $this;
    } // setOrderid()

    /**
     * Set the value of [ref_no] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setRefNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ref_no !== $v) {
            $this->ref_no = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_REF_NO] = true;
        }

        return $this;
    } // setRefNo()

    /**
     * Set the value of [bill_id] column.
     *
     * @param int $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setBillId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->bill_id !== $v) {
            $this->bill_id = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_BILL_ID] = true;
        }

        return $this;
    } // setBillId()

    /**
     * Set the value of [account_no] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setAccountNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->account_no !== $v) {
            $this->account_no = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_ACCOUNT_NO] = true;
        }

        return $this;
    } // setAccountNo()

    /**
     * Set the value of [service_type] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setServiceType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->service_type !== $v) {
            $this->service_type = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_SERVICE_TYPE] = true;
        }

        return $this;
    } // setServiceType()

    /**
     * Sets the value of [payment_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setPaymentDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->payment_date !== null || $dt !== null) {
            if ($this->payment_date === null || $dt === null || $dt->format("Y-m-d") !== $this->payment_date->format("Y-m-d")) {
                $this->payment_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[KluOrderTableMap::COL_PAYMENT_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setPaymentDate()

    /**
     * Set the value of [payment_due_date] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setPaymentDueDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_due_date !== $v) {
            $this->payment_due_date = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_PAYMENT_DUE_DATE] = true;
        }

        return $this;
    } // setPaymentDueDate()

    /**
     * Set the value of [payment_time] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setPaymentTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_time !== $v) {
            $this->payment_time = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_PAYMENT_TIME] = true;
        }

        return $this;
    } // setPaymentTime()

    /**
     * Set the value of [payment_platform] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setPaymentPlatform($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_platform !== $v) {
            $this->payment_platform = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_PAYMENT_PLATFORM] = true;
        }

        return $this;
    } // setPaymentPlatform()

    /**
     * Set the value of [cust_email] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setCustEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cust_email !== $v) {
            $this->cust_email = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_CUST_EMAIL] = true;
        }

        return $this;
    } // setCustEmail()

    /**
     * Set the value of [cust_phone] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setCustPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cust_phone !== $v) {
            $this->cust_phone = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_CUST_PHONE] = true;
        }

        return $this;
    } // setCustPhone()

    /**
     * Set the value of [billing_period] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setBillingPeriod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billing_period !== $v) {
            $this->billing_period = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_BILLING_PERIOD] = true;
        }

        return $this;
    } // setBillingPeriod()

    /**
     * Set the value of [solid_waste_rate] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setSolidWasteRate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->solid_waste_rate !== $v) {
            $this->solid_waste_rate = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_SOLID_WASTE_RATE] = true;
        }

        return $this;
    } // setSolidWasteRate()

    /**
     * Set the value of [solid_waste_vat] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setSolidWasteVat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->solid_waste_vat !== $v) {
            $this->solid_waste_vat = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_SOLID_WASTE_VAT] = true;
        }

        return $this;
    } // setSolidWasteVat()

    /**
     * Set the value of [solid_waste_tax] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setSolidWasteTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->solid_waste_tax !== $v) {
            $this->solid_waste_tax = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_SOLID_WASTE_TAX] = true;
        }

        return $this;
    } // setSolidWasteTax()

    /**
     * Set the value of [liquid_waste_rate] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setLiquidWasteRate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->liquid_waste_rate !== $v) {
            $this->liquid_waste_rate = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_LIQUID_WASTE_RATE] = true;
        }

        return $this;
    } // setLiquidWasteRate()

    /**
     * Set the value of [liquid_waste_vat] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setLiquidWasteVat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->liquid_waste_vat !== $v) {
            $this->liquid_waste_vat = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_LIQUID_WASTE_VAT] = true;
        }

        return $this;
    } // setLiquidWasteVat()

    /**
     * Set the value of [liquid_waste_tax] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setLiquidWasteTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->liquid_waste_tax !== $v) {
            $this->liquid_waste_tax = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_LIQUID_WASTE_TAX] = true;
        }

        return $this;
    } // setLiquidWasteTax()

    /**
     * Set the value of [previous_balance] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setPreviousBalance($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->previous_balance !== $v) {
            $this->previous_balance = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_PREVIOUS_BALANCE] = true;
        }

        return $this;
    } // setPreviousBalance()

    /**
     * Set the value of [payment_received] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setPaymentReceived($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_received !== $v) {
            $this->payment_received = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_PAYMENT_RECEIVED] = true;
        }

        return $this;
    } // setPaymentReceived()

    /**
     * Set the value of [total_amount] column.
     *
     * @param string $v new value
     * @return $this|\KluOrder The current object (for fluent API support)
     */
    public function setTotalAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_amount !== $v) {
            $this->total_amount = $v;
            $this->modifiedColumns[KluOrderTableMap::COL_TOTAL_AMOUNT] = true;
        }

        return $this;
    } // setTotalAmount()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : KluOrderTableMap::translateFieldName('Orderid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orderid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : KluOrderTableMap::translateFieldName('RefNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ref_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : KluOrderTableMap::translateFieldName('BillId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bill_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : KluOrderTableMap::translateFieldName('AccountNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->account_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : KluOrderTableMap::translateFieldName('ServiceType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->service_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : KluOrderTableMap::translateFieldName('PaymentDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->payment_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : KluOrderTableMap::translateFieldName('PaymentDueDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_due_date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : KluOrderTableMap::translateFieldName('PaymentTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_time = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : KluOrderTableMap::translateFieldName('PaymentPlatform', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_platform = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : KluOrderTableMap::translateFieldName('CustEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cust_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : KluOrderTableMap::translateFieldName('CustPhone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cust_phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : KluOrderTableMap::translateFieldName('BillingPeriod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billing_period = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : KluOrderTableMap::translateFieldName('SolidWasteRate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->solid_waste_rate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : KluOrderTableMap::translateFieldName('SolidWasteVat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->solid_waste_vat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : KluOrderTableMap::translateFieldName('SolidWasteTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->solid_waste_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : KluOrderTableMap::translateFieldName('LiquidWasteRate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->liquid_waste_rate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : KluOrderTableMap::translateFieldName('LiquidWasteVat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->liquid_waste_vat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : KluOrderTableMap::translateFieldName('LiquidWasteTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->liquid_waste_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : KluOrderTableMap::translateFieldName('PreviousBalance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->previous_balance = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : KluOrderTableMap::translateFieldName('PaymentReceived', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_received = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : KluOrderTableMap::translateFieldName('TotalAmount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_amount = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = KluOrderTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\KluOrder'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(KluOrderTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildKluOrderQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see KluOrder::setDeleted()
     * @see KluOrder::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluOrderTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildKluOrderQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(KluOrderTableMap::DATABASE_NAME);
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
                KluOrderTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[KluOrderTableMap::COL_ORDERID] = true;
        if (null !== $this->orderid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . KluOrderTableMap::COL_ORDERID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(KluOrderTableMap::COL_ORDERID)) {
            $modifiedColumns[':p' . $index++]  = 'OrderID';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_REF_NO)) {
            $modifiedColumns[':p' . $index++]  = 'ref_no';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_BILL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'bill_id';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_ACCOUNT_NO)) {
            $modifiedColumns[':p' . $index++]  = 'account_no';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_SERVICE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'service_type';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'payment_date';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_DUE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'payment_due_date';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'payment_time';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_PLATFORM)) {
            $modifiedColumns[':p' . $index++]  = 'payment_platform';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_CUST_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'cust_email';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_CUST_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'cust_phone';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_BILLING_PERIOD)) {
            $modifiedColumns[':p' . $index++]  = 'billing_period';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_SOLID_WASTE_RATE)) {
            $modifiedColumns[':p' . $index++]  = 'solid_waste_rate';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_SOLID_WASTE_VAT)) {
            $modifiedColumns[':p' . $index++]  = 'solid_waste_vat';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_SOLID_WASTE_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'solid_waste_tax';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_LIQUID_WASTE_RATE)) {
            $modifiedColumns[':p' . $index++]  = 'liquid_waste_rate';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_LIQUID_WASTE_VAT)) {
            $modifiedColumns[':p' . $index++]  = 'liquid_waste_vat';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_LIQUID_WASTE_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'liquid_waste_tax';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PREVIOUS_BALANCE)) {
            $modifiedColumns[':p' . $index++]  = 'previous_balance';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_RECEIVED)) {
            $modifiedColumns[':p' . $index++]  = 'payment_received';
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_TOTAL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'total_amount';
        }

        $sql = sprintf(
            'INSERT INTO klu_order (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'OrderID':
                        $stmt->bindValue($identifier, $this->orderid, PDO::PARAM_INT);
                        break;
                    case 'ref_no':
                        $stmt->bindValue($identifier, $this->ref_no, PDO::PARAM_STR);
                        break;
                    case 'bill_id':
                        $stmt->bindValue($identifier, $this->bill_id, PDO::PARAM_INT);
                        break;
                    case 'account_no':
                        $stmt->bindValue($identifier, $this->account_no, PDO::PARAM_STR);
                        break;
                    case 'service_type':
                        $stmt->bindValue($identifier, $this->service_type, PDO::PARAM_STR);
                        break;
                    case 'payment_date':
                        $stmt->bindValue($identifier, $this->payment_date ? $this->payment_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'payment_due_date':
                        $stmt->bindValue($identifier, $this->payment_due_date, PDO::PARAM_STR);
                        break;
                    case 'payment_time':
                        $stmt->bindValue($identifier, $this->payment_time, PDO::PARAM_STR);
                        break;
                    case 'payment_platform':
                        $stmt->bindValue($identifier, $this->payment_platform, PDO::PARAM_STR);
                        break;
                    case 'cust_email':
                        $stmt->bindValue($identifier, $this->cust_email, PDO::PARAM_STR);
                        break;
                    case 'cust_phone':
                        $stmt->bindValue($identifier, $this->cust_phone, PDO::PARAM_STR);
                        break;
                    case 'billing_period':
                        $stmt->bindValue($identifier, $this->billing_period, PDO::PARAM_STR);
                        break;
                    case 'solid_waste_rate':
                        $stmt->bindValue($identifier, $this->solid_waste_rate, PDO::PARAM_STR);
                        break;
                    case 'solid_waste_vat':
                        $stmt->bindValue($identifier, $this->solid_waste_vat, PDO::PARAM_STR);
                        break;
                    case 'solid_waste_tax':
                        $stmt->bindValue($identifier, $this->solid_waste_tax, PDO::PARAM_STR);
                        break;
                    case 'liquid_waste_rate':
                        $stmt->bindValue($identifier, $this->liquid_waste_rate, PDO::PARAM_STR);
                        break;
                    case 'liquid_waste_vat':
                        $stmt->bindValue($identifier, $this->liquid_waste_vat, PDO::PARAM_STR);
                        break;
                    case 'liquid_waste_tax':
                        $stmt->bindValue($identifier, $this->liquid_waste_tax, PDO::PARAM_STR);
                        break;
                    case 'previous_balance':
                        $stmt->bindValue($identifier, $this->previous_balance, PDO::PARAM_STR);
                        break;
                    case 'payment_received':
                        $stmt->bindValue($identifier, $this->payment_received, PDO::PARAM_STR);
                        break;
                    case 'total_amount':
                        $stmt->bindValue($identifier, $this->total_amount, PDO::PARAM_STR);
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
        $this->setOrderid($pk);

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
        $pos = KluOrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getOrderid();
                break;
            case 1:
                return $this->getRefNo();
                break;
            case 2:
                return $this->getBillId();
                break;
            case 3:
                return $this->getAccountNo();
                break;
            case 4:
                return $this->getServiceType();
                break;
            case 5:
                return $this->getPaymentDate();
                break;
            case 6:
                return $this->getPaymentDueDate();
                break;
            case 7:
                return $this->getPaymentTime();
                break;
            case 8:
                return $this->getPaymentPlatform();
                break;
            case 9:
                return $this->getCustEmail();
                break;
            case 10:
                return $this->getCustPhone();
                break;
            case 11:
                return $this->getBillingPeriod();
                break;
            case 12:
                return $this->getSolidWasteRate();
                break;
            case 13:
                return $this->getSolidWasteVat();
                break;
            case 14:
                return $this->getSolidWasteTax();
                break;
            case 15:
                return $this->getLiquidWasteRate();
                break;
            case 16:
                return $this->getLiquidWasteVat();
                break;
            case 17:
                return $this->getLiquidWasteTax();
                break;
            case 18:
                return $this->getPreviousBalance();
                break;
            case 19:
                return $this->getPaymentReceived();
                break;
            case 20:
                return $this->getTotalAmount();
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

        if (isset($alreadyDumpedObjects['KluOrder'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['KluOrder'][$this->hashCode()] = true;
        $keys = KluOrderTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getOrderid(),
            $keys[1] => $this->getRefNo(),
            $keys[2] => $this->getBillId(),
            $keys[3] => $this->getAccountNo(),
            $keys[4] => $this->getServiceType(),
            $keys[5] => $this->getPaymentDate(),
            $keys[6] => $this->getPaymentDueDate(),
            $keys[7] => $this->getPaymentTime(),
            $keys[8] => $this->getPaymentPlatform(),
            $keys[9] => $this->getCustEmail(),
            $keys[10] => $this->getCustPhone(),
            $keys[11] => $this->getBillingPeriod(),
            $keys[12] => $this->getSolidWasteRate(),
            $keys[13] => $this->getSolidWasteVat(),
            $keys[14] => $this->getSolidWasteTax(),
            $keys[15] => $this->getLiquidWasteRate(),
            $keys[16] => $this->getLiquidWasteVat(),
            $keys[17] => $this->getLiquidWasteTax(),
            $keys[18] => $this->getPreviousBalance(),
            $keys[19] => $this->getPaymentReceived(),
            $keys[20] => $this->getTotalAmount(),
        );
        if ($result[$keys[5]] instanceof \DateTime) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
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
     * @return $this|\KluOrder
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = KluOrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\KluOrder
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setOrderid($value);
                break;
            case 1:
                $this->setRefNo($value);
                break;
            case 2:
                $this->setBillId($value);
                break;
            case 3:
                $this->setAccountNo($value);
                break;
            case 4:
                $this->setServiceType($value);
                break;
            case 5:
                $this->setPaymentDate($value);
                break;
            case 6:
                $this->setPaymentDueDate($value);
                break;
            case 7:
                $this->setPaymentTime($value);
                break;
            case 8:
                $this->setPaymentPlatform($value);
                break;
            case 9:
                $this->setCustEmail($value);
                break;
            case 10:
                $this->setCustPhone($value);
                break;
            case 11:
                $this->setBillingPeriod($value);
                break;
            case 12:
                $this->setSolidWasteRate($value);
                break;
            case 13:
                $this->setSolidWasteVat($value);
                break;
            case 14:
                $this->setSolidWasteTax($value);
                break;
            case 15:
                $this->setLiquidWasteRate($value);
                break;
            case 16:
                $this->setLiquidWasteVat($value);
                break;
            case 17:
                $this->setLiquidWasteTax($value);
                break;
            case 18:
                $this->setPreviousBalance($value);
                break;
            case 19:
                $this->setPaymentReceived($value);
                break;
            case 20:
                $this->setTotalAmount($value);
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
        $keys = KluOrderTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setOrderid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRefNo($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setBillId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAccountNo($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setServiceType($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPaymentDate($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPaymentDueDate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPaymentTime($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPaymentPlatform($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCustEmail($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCustPhone($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setBillingPeriod($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSolidWasteRate($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSolidWasteVat($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setSolidWasteTax($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setLiquidWasteRate($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setLiquidWasteVat($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setLiquidWasteTax($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPreviousBalance($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setPaymentReceived($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setTotalAmount($arr[$keys[20]]);
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
     * @return $this|\KluOrder The current object, for fluid interface
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
        $criteria = new Criteria(KluOrderTableMap::DATABASE_NAME);

        if ($this->isColumnModified(KluOrderTableMap::COL_ORDERID)) {
            $criteria->add(KluOrderTableMap::COL_ORDERID, $this->orderid);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_REF_NO)) {
            $criteria->add(KluOrderTableMap::COL_REF_NO, $this->ref_no);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_BILL_ID)) {
            $criteria->add(KluOrderTableMap::COL_BILL_ID, $this->bill_id);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_ACCOUNT_NO)) {
            $criteria->add(KluOrderTableMap::COL_ACCOUNT_NO, $this->account_no);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_SERVICE_TYPE)) {
            $criteria->add(KluOrderTableMap::COL_SERVICE_TYPE, $this->service_type);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_DATE)) {
            $criteria->add(KluOrderTableMap::COL_PAYMENT_DATE, $this->payment_date);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_DUE_DATE)) {
            $criteria->add(KluOrderTableMap::COL_PAYMENT_DUE_DATE, $this->payment_due_date);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_TIME)) {
            $criteria->add(KluOrderTableMap::COL_PAYMENT_TIME, $this->payment_time);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_PLATFORM)) {
            $criteria->add(KluOrderTableMap::COL_PAYMENT_PLATFORM, $this->payment_platform);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_CUST_EMAIL)) {
            $criteria->add(KluOrderTableMap::COL_CUST_EMAIL, $this->cust_email);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_CUST_PHONE)) {
            $criteria->add(KluOrderTableMap::COL_CUST_PHONE, $this->cust_phone);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_BILLING_PERIOD)) {
            $criteria->add(KluOrderTableMap::COL_BILLING_PERIOD, $this->billing_period);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_SOLID_WASTE_RATE)) {
            $criteria->add(KluOrderTableMap::COL_SOLID_WASTE_RATE, $this->solid_waste_rate);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_SOLID_WASTE_VAT)) {
            $criteria->add(KluOrderTableMap::COL_SOLID_WASTE_VAT, $this->solid_waste_vat);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_SOLID_WASTE_TAX)) {
            $criteria->add(KluOrderTableMap::COL_SOLID_WASTE_TAX, $this->solid_waste_tax);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_LIQUID_WASTE_RATE)) {
            $criteria->add(KluOrderTableMap::COL_LIQUID_WASTE_RATE, $this->liquid_waste_rate);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_LIQUID_WASTE_VAT)) {
            $criteria->add(KluOrderTableMap::COL_LIQUID_WASTE_VAT, $this->liquid_waste_vat);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_LIQUID_WASTE_TAX)) {
            $criteria->add(KluOrderTableMap::COL_LIQUID_WASTE_TAX, $this->liquid_waste_tax);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PREVIOUS_BALANCE)) {
            $criteria->add(KluOrderTableMap::COL_PREVIOUS_BALANCE, $this->previous_balance);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_PAYMENT_RECEIVED)) {
            $criteria->add(KluOrderTableMap::COL_PAYMENT_RECEIVED, $this->payment_received);
        }
        if ($this->isColumnModified(KluOrderTableMap::COL_TOTAL_AMOUNT)) {
            $criteria->add(KluOrderTableMap::COL_TOTAL_AMOUNT, $this->total_amount);
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
        $criteria = ChildKluOrderQuery::create();
        $criteria->add(KluOrderTableMap::COL_ORDERID, $this->orderid);

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
        $validPk = null !== $this->getOrderid();

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
        return $this->getOrderid();
    }

    /**
     * Generic method to set the primary key (orderid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setOrderid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getOrderid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \KluOrder (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRefNo($this->getRefNo());
        $copyObj->setBillId($this->getBillId());
        $copyObj->setAccountNo($this->getAccountNo());
        $copyObj->setServiceType($this->getServiceType());
        $copyObj->setPaymentDate($this->getPaymentDate());
        $copyObj->setPaymentDueDate($this->getPaymentDueDate());
        $copyObj->setPaymentTime($this->getPaymentTime());
        $copyObj->setPaymentPlatform($this->getPaymentPlatform());
        $copyObj->setCustEmail($this->getCustEmail());
        $copyObj->setCustPhone($this->getCustPhone());
        $copyObj->setBillingPeriod($this->getBillingPeriod());
        $copyObj->setSolidWasteRate($this->getSolidWasteRate());
        $copyObj->setSolidWasteVat($this->getSolidWasteVat());
        $copyObj->setSolidWasteTax($this->getSolidWasteTax());
        $copyObj->setLiquidWasteRate($this->getLiquidWasteRate());
        $copyObj->setLiquidWasteVat($this->getLiquidWasteVat());
        $copyObj->setLiquidWasteTax($this->getLiquidWasteTax());
        $copyObj->setPreviousBalance($this->getPreviousBalance());
        $copyObj->setPaymentReceived($this->getPaymentReceived());
        $copyObj->setTotalAmount($this->getTotalAmount());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setOrderid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \KluOrder Clone of current object.
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
        $this->orderid = null;
        $this->ref_no = null;
        $this->bill_id = null;
        $this->account_no = null;
        $this->service_type = null;
        $this->payment_date = null;
        $this->payment_due_date = null;
        $this->payment_time = null;
        $this->payment_platform = null;
        $this->cust_email = null;
        $this->cust_phone = null;
        $this->billing_period = null;
        $this->solid_waste_rate = null;
        $this->solid_waste_vat = null;
        $this->solid_waste_tax = null;
        $this->liquid_waste_rate = null;
        $this->liquid_waste_vat = null;
        $this->liquid_waste_tax = null;
        $this->previous_balance = null;
        $this->payment_received = null;
        $this->total_amount = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
        return (string) $this->exportTo(KluOrderTableMap::DEFAULT_STRING_FORMAT);
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
