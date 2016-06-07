<?php

namespace Base;

use \ReversalQuery as ChildReversalQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ReversalTableMap;
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
 * Base class that represents a row from the 'reversal' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Reversal implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ReversalTableMap';


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
     * The value for the revid field.
     *
     * @var        int
     */
    protected $revid;

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the account_no field.
     *
     * @var        string
     */
    protected $account_no;

    /**
     * The value for the billreferencenumber field.
     *
     * @var        string
     */
    protected $billreferencenumber;

    /**
     * The value for the transactionid field.
     *
     * @var        string
     */
    protected $transactionid;

    /**
     * The value for the sourcebank field.
     *
     * @var        string
     */
    protected $sourcebank;

    /**
     * The value for the destinationbank field.
     *
     * @var        string
     */
    protected $destinationbank;

    /**
     * The value for the buildingtype field.
     *
     * @var        string
     */
    protected $buildingtype;

    /**
     * The value for the customername field.
     *
     * @var        string
     */
    protected $customername;

    /**
     * The value for the district field.
     *
     * @var        string
     */
    protected $district;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the phone field.
     *
     * @var        string
     */
    protected $phone;

    /**
     * The value for the outstandingbalance field.
     *
     * @var        string
     */
    protected $outstandingbalance;

    /**
     * The value for the transactiondate field.
     *
     * @var        DateTime
     */
    protected $transactiondate;

    /**
     * The value for the date_initiated field.
     *
     * @var        string
     */
    protected $date_initiated;

    /**
     * The value for the date_completed field.
     *
     * @var        string
     */
    protected $date_completed;

    /**
     * The value for the amount_paid field.
     *
     * @var        string
     */
    protected $amount_paid;

    /**
     * The value for the amountdue field.
     *
     * @var        string
     */
    protected $amountdue;

    /**
     * The value for the platform field.
     *
     * @var        string
     */
    protected $platform;

    /**
     * The value for the receipt_no field.
     *
     * @var        string
     */
    protected $receipt_no;

    /**
     * The value for the serviceaddress field.
     *
     * @var        string
     */
    protected $serviceaddress;

    /**
     * The value for the usagetype field.
     *
     * @var        string
     */
    protected $usagetype;

    /**
     * The value for the payment_status field.
     *
     * Note: this column has a database default value of: 'P'
     * @var        string
     */
    protected $payment_status;

    /**
     * The value for the reconcile_status field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $reconcile_status;

    /**
     * The value for the created_date field.
     *
     * @var        DateTime
     */
    protected $created_date;

    /**
     * The value for the uploadstatus field.
     *
     * @var        int
     */
    protected $uploadstatus;

    /**
     * The value for the reversal_reason field.
     *
     * @var        string
     */
    protected $reversal_reason;

    /**
     * The value for the executor field.
     *
     * @var        string
     */
    protected $executor;

    /**
     * The value for the reversal_date field.
     *
     * @var        DateTime
     */
    protected $reversal_date;

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
        $this->payment_status = 'P';
        $this->reconcile_status = false;
    }

    /**
     * Initializes internal state of Base\Reversal object.
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
     * Compares this with another <code>Reversal</code> instance.  If
     * <code>obj</code> is an instance of <code>Reversal</code>, delegates to
     * <code>equals(Reversal)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Reversal The current object, for fluid interface
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
     * Get the [revid] column value.
     *
     * @return int
     */
    public function getRevid()
    {
        return $this->revid;
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
     * Get the [account_no] column value.
     *
     * @return string
     */
    public function getAccountNo()
    {
        return $this->account_no;
    }

    /**
     * Get the [billreferencenumber] column value.
     *
     * @return string
     */
    public function getBillreferencenumber()
    {
        return $this->billreferencenumber;
    }

    /**
     * Get the [transactionid] column value.
     *
     * @return string
     */
    public function getTransactionid()
    {
        return $this->transactionid;
    }

    /**
     * Get the [sourcebank] column value.
     *
     * @return string
     */
    public function getSourcebank()
    {
        return $this->sourcebank;
    }

    /**
     * Get the [destinationbank] column value.
     *
     * @return string
     */
    public function getDestinationbank()
    {
        return $this->destinationbank;
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
     * Get the [customername] column value.
     *
     * @return string
     */
    public function getCustomername()
    {
        return $this->customername;
    }

    /**
     * Get the [district] column value.
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [outstandingbalance] column value.
     *
     * @return string
     */
    public function getOutstandingbalance()
    {
        return $this->outstandingbalance;
    }

    /**
     * Get the [optionally formatted] temporal [transactiondate] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTransactiondate($format = NULL)
    {
        if ($format === null) {
            return $this->transactiondate;
        } else {
            return $this->transactiondate instanceof \DateTimeInterface ? $this->transactiondate->format($format) : null;
        }
    }

    /**
     * Get the [date_initiated] column value.
     *
     * @return string
     */
    public function getDateInitiated()
    {
        return $this->date_initiated;
    }

    /**
     * Get the [date_completed] column value.
     *
     * @return string
     */
    public function getDateCompleted()
    {
        return $this->date_completed;
    }

    /**
     * Get the [amount_paid] column value.
     *
     * @return string
     */
    public function getAmountPaid()
    {
        return $this->amount_paid;
    }

    /**
     * Get the [amountdue] column value.
     *
     * @return string
     */
    public function getAmountdue()
    {
        return $this->amountdue;
    }

    /**
     * Get the [platform] column value.
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
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
     * Get the [serviceaddress] column value.
     *
     * @return string
     */
    public function getServiceaddress()
    {
        return $this->serviceaddress;
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
     * Get the [payment_status] column value.
     *
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->payment_status;
    }

    /**
     * Get the [reconcile_status] column value.
     *
     * @return boolean
     */
    public function getReconcileStatus()
    {
        return $this->reconcile_status;
    }

    /**
     * Get the [reconcile_status] column value.
     *
     * @return boolean
     */
    public function isReconcileStatus()
    {
        return $this->getReconcileStatus();
    }

    /**
     * Get the [optionally formatted] temporal [created_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
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
     * Get the [uploadstatus] column value.
     *
     * @return int
     */
    public function getUploadstatus()
    {
        return $this->uploadstatus;
    }

    /**
     * Get the [reversal_reason] column value.
     *
     * @return string
     */
    public function getReversalReason()
    {
        return $this->reversal_reason;
    }

    /**
     * Get the [executor] column value.
     *
     * @return string
     */
    public function getExecutor()
    {
        return $this->executor;
    }

    /**
     * Get the [optionally formatted] temporal [reversal_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getReversalDate($format = NULL)
    {
        if ($format === null) {
            return $this->reversal_date;
        } else {
            return $this->reversal_date instanceof \DateTimeInterface ? $this->reversal_date->format($format) : null;
        }
    }

    /**
     * Set the value of [revid] column.
     *
     * @param int $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setRevid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->revid !== $v) {
            $this->revid = $v;
            $this->modifiedColumns[ReversalTableMap::COL_REVID] = true;
        }

        return $this;
    } // setRevid()

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ReversalTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [account_no] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setAccountNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->account_no !== $v) {
            $this->account_no = $v;
            $this->modifiedColumns[ReversalTableMap::COL_ACCOUNT_NO] = true;
        }

        return $this;
    } // setAccountNo()

    /**
     * Set the value of [billreferencenumber] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setBillreferencenumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billreferencenumber !== $v) {
            $this->billreferencenumber = $v;
            $this->modifiedColumns[ReversalTableMap::COL_BILLREFERENCENUMBER] = true;
        }

        return $this;
    } // setBillreferencenumber()

    /**
     * Set the value of [transactionid] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setTransactionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->transactionid !== $v) {
            $this->transactionid = $v;
            $this->modifiedColumns[ReversalTableMap::COL_TRANSACTIONID] = true;
        }

        return $this;
    } // setTransactionid()

    /**
     * Set the value of [sourcebank] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setSourcebank($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sourcebank !== $v) {
            $this->sourcebank = $v;
            $this->modifiedColumns[ReversalTableMap::COL_SOURCEBANK] = true;
        }

        return $this;
    } // setSourcebank()

    /**
     * Set the value of [destinationbank] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setDestinationbank($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->destinationbank !== $v) {
            $this->destinationbank = $v;
            $this->modifiedColumns[ReversalTableMap::COL_DESTINATIONBANK] = true;
        }

        return $this;
    } // setDestinationbank()

    /**
     * Set the value of [buildingtype] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setBuildingtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->buildingtype !== $v) {
            $this->buildingtype = $v;
            $this->modifiedColumns[ReversalTableMap::COL_BUILDINGTYPE] = true;
        }

        return $this;
    } // setBuildingtype()

    /**
     * Set the value of [customername] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setCustomername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->customername !== $v) {
            $this->customername = $v;
            $this->modifiedColumns[ReversalTableMap::COL_CUSTOMERNAME] = true;
        }

        return $this;
    } // setCustomername()

    /**
     * Set the value of [district] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setDistrict($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->district !== $v) {
            $this->district = $v;
            $this->modifiedColumns[ReversalTableMap::COL_DISTRICT] = true;
        }

        return $this;
    } // setDistrict()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[ReversalTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[ReversalTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [outstandingbalance] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setOutstandingbalance($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->outstandingbalance !== $v) {
            $this->outstandingbalance = $v;
            $this->modifiedColumns[ReversalTableMap::COL_OUTSTANDINGBALANCE] = true;
        }

        return $this;
    } // setOutstandingbalance()

    /**
     * Sets the value of [transactiondate] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setTransactiondate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->transactiondate !== null || $dt !== null) {
            if ($this->transactiondate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->transactiondate->format("Y-m-d H:i:s.u")) {
                $this->transactiondate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ReversalTableMap::COL_TRANSACTIONDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setTransactiondate()

    /**
     * Set the value of [date_initiated] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setDateInitiated($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->date_initiated !== $v) {
            $this->date_initiated = $v;
            $this->modifiedColumns[ReversalTableMap::COL_DATE_INITIATED] = true;
        }

        return $this;
    } // setDateInitiated()

    /**
     * Set the value of [date_completed] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setDateCompleted($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->date_completed !== $v) {
            $this->date_completed = $v;
            $this->modifiedColumns[ReversalTableMap::COL_DATE_COMPLETED] = true;
        }

        return $this;
    } // setDateCompleted()

    /**
     * Set the value of [amount_paid] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setAmountPaid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amount_paid !== $v) {
            $this->amount_paid = $v;
            $this->modifiedColumns[ReversalTableMap::COL_AMOUNT_PAID] = true;
        }

        return $this;
    } // setAmountPaid()

    /**
     * Set the value of [amountdue] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setAmountdue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amountdue !== $v) {
            $this->amountdue = $v;
            $this->modifiedColumns[ReversalTableMap::COL_AMOUNTDUE] = true;
        }

        return $this;
    } // setAmountdue()

    /**
     * Set the value of [platform] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setPlatform($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->platform !== $v) {
            $this->platform = $v;
            $this->modifiedColumns[ReversalTableMap::COL_PLATFORM] = true;
        }

        return $this;
    } // setPlatform()

    /**
     * Set the value of [receipt_no] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setReceiptNo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->receipt_no !== $v) {
            $this->receipt_no = $v;
            $this->modifiedColumns[ReversalTableMap::COL_RECEIPT_NO] = true;
        }

        return $this;
    } // setReceiptNo()

    /**
     * Set the value of [serviceaddress] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setServiceaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->serviceaddress !== $v) {
            $this->serviceaddress = $v;
            $this->modifiedColumns[ReversalTableMap::COL_SERVICEADDRESS] = true;
        }

        return $this;
    } // setServiceaddress()

    /**
     * Set the value of [usagetype] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setUsagetype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usagetype !== $v) {
            $this->usagetype = $v;
            $this->modifiedColumns[ReversalTableMap::COL_USAGETYPE] = true;
        }

        return $this;
    } // setUsagetype()

    /**
     * Set the value of [payment_status] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setPaymentStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->payment_status !== $v) {
            $this->payment_status = $v;
            $this->modifiedColumns[ReversalTableMap::COL_PAYMENT_STATUS] = true;
        }

        return $this;
    } // setPaymentStatus()

    /**
     * Sets the value of the [reconcile_status] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setReconcileStatus($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->reconcile_status !== $v) {
            $this->reconcile_status = $v;
            $this->modifiedColumns[ReversalTableMap::COL_RECONCILE_STATUS] = true;
        }

        return $this;
    } // setReconcileStatus()

    /**
     * Sets the value of [created_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setCreatedDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_date !== null || $dt !== null) {
            if ($this->created_date === null || $dt === null || $dt->format("Y-m-d") !== $this->created_date->format("Y-m-d")) {
                $this->created_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ReversalTableMap::COL_CREATED_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedDate()

    /**
     * Set the value of [uploadstatus] column.
     *
     * @param int $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setUploadstatus($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->uploadstatus !== $v) {
            $this->uploadstatus = $v;
            $this->modifiedColumns[ReversalTableMap::COL_UPLOADSTATUS] = true;
        }

        return $this;
    } // setUploadstatus()

    /**
     * Set the value of [reversal_reason] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setReversalReason($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->reversal_reason !== $v) {
            $this->reversal_reason = $v;
            $this->modifiedColumns[ReversalTableMap::COL_REVERSAL_REASON] = true;
        }

        return $this;
    } // setReversalReason()

    /**
     * Set the value of [executor] column.
     *
     * @param string $v new value
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setExecutor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->executor !== $v) {
            $this->executor = $v;
            $this->modifiedColumns[ReversalTableMap::COL_EXECUTOR] = true;
        }

        return $this;
    } // setExecutor()

    /**
     * Sets the value of [reversal_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Reversal The current object (for fluent API support)
     */
    public function setReversalDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->reversal_date !== null || $dt !== null) {
            if ($this->reversal_date === null || $dt === null || $dt->format("Y-m-d") !== $this->reversal_date->format("Y-m-d")) {
                $this->reversal_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ReversalTableMap::COL_REVERSAL_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setReversalDate()

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
            if ($this->payment_status !== 'P') {
                return false;
            }

            if ($this->reconcile_status !== false) {
                return false;
            }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ReversalTableMap::translateFieldName('Revid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->revid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ReversalTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ReversalTableMap::translateFieldName('AccountNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->account_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ReversalTableMap::translateFieldName('Billreferencenumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billreferencenumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ReversalTableMap::translateFieldName('Transactionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->transactionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ReversalTableMap::translateFieldName('Sourcebank', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sourcebank = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ReversalTableMap::translateFieldName('Destinationbank', TableMap::TYPE_PHPNAME, $indexType)];
            $this->destinationbank = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ReversalTableMap::translateFieldName('Buildingtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->buildingtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ReversalTableMap::translateFieldName('Customername', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customername = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ReversalTableMap::translateFieldName('District', TableMap::TYPE_PHPNAME, $indexType)];
            $this->district = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ReversalTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ReversalTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ReversalTableMap::translateFieldName('Outstandingbalance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->outstandingbalance = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ReversalTableMap::translateFieldName('Transactiondate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->transactiondate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ReversalTableMap::translateFieldName('DateInitiated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date_initiated = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ReversalTableMap::translateFieldName('DateCompleted', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date_completed = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : ReversalTableMap::translateFieldName('AmountPaid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount_paid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : ReversalTableMap::translateFieldName('Amountdue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amountdue = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : ReversalTableMap::translateFieldName('Platform', TableMap::TYPE_PHPNAME, $indexType)];
            $this->platform = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : ReversalTableMap::translateFieldName('ReceiptNo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->receipt_no = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : ReversalTableMap::translateFieldName('Serviceaddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->serviceaddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : ReversalTableMap::translateFieldName('Usagetype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usagetype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : ReversalTableMap::translateFieldName('PaymentStatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->payment_status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : ReversalTableMap::translateFieldName('ReconcileStatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reconcile_status = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : ReversalTableMap::translateFieldName('CreatedDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->created_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : ReversalTableMap::translateFieldName('Uploadstatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uploadstatus = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : ReversalTableMap::translateFieldName('ReversalReason', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reversal_reason = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : ReversalTableMap::translateFieldName('Executor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->executor = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : ReversalTableMap::translateFieldName('ReversalDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->reversal_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 29; // 29 = ReversalTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Reversal'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(ReversalTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildReversalQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Reversal::setDeleted()
     * @see Reversal::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ReversalTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildReversalQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ReversalTableMap::DATABASE_NAME);
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
                ReversalTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[ReversalTableMap::COL_REVID] = true;
        if (null !== $this->revid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ReversalTableMap::COL_REVID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ReversalTableMap::COL_REVID)) {
            $modifiedColumns[':p' . $index++]  = 'revid';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_ACCOUNT_NO)) {
            $modifiedColumns[':p' . $index++]  = 'account_no';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_BILLREFERENCENUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'BillReferenceNumber';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_TRANSACTIONID)) {
            $modifiedColumns[':p' . $index++]  = 'TransactionID';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_SOURCEBANK)) {
            $modifiedColumns[':p' . $index++]  = 'SourceBank';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_DESTINATIONBANK)) {
            $modifiedColumns[':p' . $index++]  = 'DestinationBank';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_BUILDINGTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'BuildingType';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_CUSTOMERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'CustomerName';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_DISTRICT)) {
            $modifiedColumns[':p' . $index++]  = 'District';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'Email';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'Phone';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_OUTSTANDINGBALANCE)) {
            $modifiedColumns[':p' . $index++]  = 'OutstandingBalance';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_TRANSACTIONDATE)) {
            $modifiedColumns[':p' . $index++]  = 'TransactionDate';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_DATE_INITIATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_initiated';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_DATE_COMPLETED)) {
            $modifiedColumns[':p' . $index++]  = 'date_completed';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_AMOUNT_PAID)) {
            $modifiedColumns[':p' . $index++]  = 'amount_paid';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_AMOUNTDUE)) {
            $modifiedColumns[':p' . $index++]  = 'AmountDue';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_PLATFORM)) {
            $modifiedColumns[':p' . $index++]  = 'platform';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_RECEIPT_NO)) {
            $modifiedColumns[':p' . $index++]  = 'receipt_no';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_SERVICEADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'ServiceAddress';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_USAGETYPE)) {
            $modifiedColumns[':p' . $index++]  = 'UsageType';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_PAYMENT_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'payment_status';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_RECONCILE_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'reconcile_status';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_CREATED_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'created_date';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_UPLOADSTATUS)) {
            $modifiedColumns[':p' . $index++]  = 'uploadstatus';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_REVERSAL_REASON)) {
            $modifiedColumns[':p' . $index++]  = 'reversal_reason';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_EXECUTOR)) {
            $modifiedColumns[':p' . $index++]  = 'executor';
        }
        if ($this->isColumnModified(ReversalTableMap::COL_REVERSAL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'reversal_date';
        }

        $sql = sprintf(
            'INSERT INTO reversal (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'revid':
                        $stmt->bindValue($identifier, $this->revid, PDO::PARAM_INT);
                        break;
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'account_no':
                        $stmt->bindValue($identifier, $this->account_no, PDO::PARAM_STR);
                        break;
                    case 'BillReferenceNumber':
                        $stmt->bindValue($identifier, $this->billreferencenumber, PDO::PARAM_STR);
                        break;
                    case 'TransactionID':
                        $stmt->bindValue($identifier, $this->transactionid, PDO::PARAM_STR);
                        break;
                    case 'SourceBank':
                        $stmt->bindValue($identifier, $this->sourcebank, PDO::PARAM_STR);
                        break;
                    case 'DestinationBank':
                        $stmt->bindValue($identifier, $this->destinationbank, PDO::PARAM_STR);
                        break;
                    case 'BuildingType':
                        $stmt->bindValue($identifier, $this->buildingtype, PDO::PARAM_STR);
                        break;
                    case 'CustomerName':
                        $stmt->bindValue($identifier, $this->customername, PDO::PARAM_STR);
                        break;
                    case 'District':
                        $stmt->bindValue($identifier, $this->district, PDO::PARAM_STR);
                        break;
                    case 'Email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'Phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'OutstandingBalance':
                        $stmt->bindValue($identifier, $this->outstandingbalance, PDO::PARAM_STR);
                        break;
                    case 'TransactionDate':
                        $stmt->bindValue($identifier, $this->transactiondate ? $this->transactiondate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'date_initiated':
                        $stmt->bindValue($identifier, $this->date_initiated, PDO::PARAM_STR);
                        break;
                    case 'date_completed':
                        $stmt->bindValue($identifier, $this->date_completed, PDO::PARAM_STR);
                        break;
                    case 'amount_paid':
                        $stmt->bindValue($identifier, $this->amount_paid, PDO::PARAM_STR);
                        break;
                    case 'AmountDue':
                        $stmt->bindValue($identifier, $this->amountdue, PDO::PARAM_STR);
                        break;
                    case 'platform':
                        $stmt->bindValue($identifier, $this->platform, PDO::PARAM_STR);
                        break;
                    case 'receipt_no':
                        $stmt->bindValue($identifier, $this->receipt_no, PDO::PARAM_STR);
                        break;
                    case 'ServiceAddress':
                        $stmt->bindValue($identifier, $this->serviceaddress, PDO::PARAM_STR);
                        break;
                    case 'UsageType':
                        $stmt->bindValue($identifier, $this->usagetype, PDO::PARAM_STR);
                        break;
                    case 'payment_status':
                        $stmt->bindValue($identifier, $this->payment_status, PDO::PARAM_STR);
                        break;
                    case 'reconcile_status':
                        $stmt->bindValue($identifier, (int) $this->reconcile_status, PDO::PARAM_INT);
                        break;
                    case 'created_date':
                        $stmt->bindValue($identifier, $this->created_date ? $this->created_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'uploadstatus':
                        $stmt->bindValue($identifier, $this->uploadstatus, PDO::PARAM_INT);
                        break;
                    case 'reversal_reason':
                        $stmt->bindValue($identifier, $this->reversal_reason, PDO::PARAM_STR);
                        break;
                    case 'executor':
                        $stmt->bindValue($identifier, $this->executor, PDO::PARAM_STR);
                        break;
                    case 'reversal_date':
                        $stmt->bindValue($identifier, $this->reversal_date ? $this->reversal_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
        $this->setRevid($pk);

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
        $pos = ReversalTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRevid();
                break;
            case 1:
                return $this->getId();
                break;
            case 2:
                return $this->getAccountNo();
                break;
            case 3:
                return $this->getBillreferencenumber();
                break;
            case 4:
                return $this->getTransactionid();
                break;
            case 5:
                return $this->getSourcebank();
                break;
            case 6:
                return $this->getDestinationbank();
                break;
            case 7:
                return $this->getBuildingtype();
                break;
            case 8:
                return $this->getCustomername();
                break;
            case 9:
                return $this->getDistrict();
                break;
            case 10:
                return $this->getEmail();
                break;
            case 11:
                return $this->getPhone();
                break;
            case 12:
                return $this->getOutstandingbalance();
                break;
            case 13:
                return $this->getTransactiondate();
                break;
            case 14:
                return $this->getDateInitiated();
                break;
            case 15:
                return $this->getDateCompleted();
                break;
            case 16:
                return $this->getAmountPaid();
                break;
            case 17:
                return $this->getAmountdue();
                break;
            case 18:
                return $this->getPlatform();
                break;
            case 19:
                return $this->getReceiptNo();
                break;
            case 20:
                return $this->getServiceaddress();
                break;
            case 21:
                return $this->getUsagetype();
                break;
            case 22:
                return $this->getPaymentStatus();
                break;
            case 23:
                return $this->getReconcileStatus();
                break;
            case 24:
                return $this->getCreatedDate();
                break;
            case 25:
                return $this->getUploadstatus();
                break;
            case 26:
                return $this->getReversalReason();
                break;
            case 27:
                return $this->getExecutor();
                break;
            case 28:
                return $this->getReversalDate();
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

        if (isset($alreadyDumpedObjects['Reversal'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Reversal'][$this->hashCode()] = true;
        $keys = ReversalTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRevid(),
            $keys[1] => $this->getId(),
            $keys[2] => $this->getAccountNo(),
            $keys[3] => $this->getBillreferencenumber(),
            $keys[4] => $this->getTransactionid(),
            $keys[5] => $this->getSourcebank(),
            $keys[6] => $this->getDestinationbank(),
            $keys[7] => $this->getBuildingtype(),
            $keys[8] => $this->getCustomername(),
            $keys[9] => $this->getDistrict(),
            $keys[10] => $this->getEmail(),
            $keys[11] => $this->getPhone(),
            $keys[12] => $this->getOutstandingbalance(),
            $keys[13] => $this->getTransactiondate(),
            $keys[14] => $this->getDateInitiated(),
            $keys[15] => $this->getDateCompleted(),
            $keys[16] => $this->getAmountPaid(),
            $keys[17] => $this->getAmountdue(),
            $keys[18] => $this->getPlatform(),
            $keys[19] => $this->getReceiptNo(),
            $keys[20] => $this->getServiceaddress(),
            $keys[21] => $this->getUsagetype(),
            $keys[22] => $this->getPaymentStatus(),
            $keys[23] => $this->getReconcileStatus(),
            $keys[24] => $this->getCreatedDate(),
            $keys[25] => $this->getUploadstatus(),
            $keys[26] => $this->getReversalReason(),
            $keys[27] => $this->getExecutor(),
            $keys[28] => $this->getReversalDate(),
        );
        if ($result[$keys[13]] instanceof \DateTime) {
            $result[$keys[13]] = $result[$keys[13]]->format('c');
        }

        if ($result[$keys[24]] instanceof \DateTime) {
            $result[$keys[24]] = $result[$keys[24]]->format('c');
        }

        if ($result[$keys[28]] instanceof \DateTime) {
            $result[$keys[28]] = $result[$keys[28]]->format('c');
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
     * @return $this|\Reversal
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ReversalTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Reversal
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setRevid($value);
                break;
            case 1:
                $this->setId($value);
                break;
            case 2:
                $this->setAccountNo($value);
                break;
            case 3:
                $this->setBillreferencenumber($value);
                break;
            case 4:
                $this->setTransactionid($value);
                break;
            case 5:
                $this->setSourcebank($value);
                break;
            case 6:
                $this->setDestinationbank($value);
                break;
            case 7:
                $this->setBuildingtype($value);
                break;
            case 8:
                $this->setCustomername($value);
                break;
            case 9:
                $this->setDistrict($value);
                break;
            case 10:
                $this->setEmail($value);
                break;
            case 11:
                $this->setPhone($value);
                break;
            case 12:
                $this->setOutstandingbalance($value);
                break;
            case 13:
                $this->setTransactiondate($value);
                break;
            case 14:
                $this->setDateInitiated($value);
                break;
            case 15:
                $this->setDateCompleted($value);
                break;
            case 16:
                $this->setAmountPaid($value);
                break;
            case 17:
                $this->setAmountdue($value);
                break;
            case 18:
                $this->setPlatform($value);
                break;
            case 19:
                $this->setReceiptNo($value);
                break;
            case 20:
                $this->setServiceaddress($value);
                break;
            case 21:
                $this->setUsagetype($value);
                break;
            case 22:
                $this->setPaymentStatus($value);
                break;
            case 23:
                $this->setReconcileStatus($value);
                break;
            case 24:
                $this->setCreatedDate($value);
                break;
            case 25:
                $this->setUploadstatus($value);
                break;
            case 26:
                $this->setReversalReason($value);
                break;
            case 27:
                $this->setExecutor($value);
                break;
            case 28:
                $this->setReversalDate($value);
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
        $keys = ReversalTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRevid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAccountNo($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setBillreferencenumber($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTransactionid($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setSourcebank($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDestinationbank($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setBuildingtype($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCustomername($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setDistrict($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setEmail($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPhone($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setOutstandingbalance($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTransactiondate($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDateInitiated($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setDateCompleted($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setAmountPaid($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setAmountdue($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setPlatform($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setReceiptNo($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setServiceaddress($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setUsagetype($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setPaymentStatus($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setReconcileStatus($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setCreatedDate($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setUploadstatus($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setReversalReason($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setExecutor($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setReversalDate($arr[$keys[28]]);
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
     * @return $this|\Reversal The current object, for fluid interface
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
        $criteria = new Criteria(ReversalTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ReversalTableMap::COL_REVID)) {
            $criteria->add(ReversalTableMap::COL_REVID, $this->revid);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_ID)) {
            $criteria->add(ReversalTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_ACCOUNT_NO)) {
            $criteria->add(ReversalTableMap::COL_ACCOUNT_NO, $this->account_no);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_BILLREFERENCENUMBER)) {
            $criteria->add(ReversalTableMap::COL_BILLREFERENCENUMBER, $this->billreferencenumber);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_TRANSACTIONID)) {
            $criteria->add(ReversalTableMap::COL_TRANSACTIONID, $this->transactionid);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_SOURCEBANK)) {
            $criteria->add(ReversalTableMap::COL_SOURCEBANK, $this->sourcebank);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_DESTINATIONBANK)) {
            $criteria->add(ReversalTableMap::COL_DESTINATIONBANK, $this->destinationbank);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_BUILDINGTYPE)) {
            $criteria->add(ReversalTableMap::COL_BUILDINGTYPE, $this->buildingtype);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_CUSTOMERNAME)) {
            $criteria->add(ReversalTableMap::COL_CUSTOMERNAME, $this->customername);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_DISTRICT)) {
            $criteria->add(ReversalTableMap::COL_DISTRICT, $this->district);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_EMAIL)) {
            $criteria->add(ReversalTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_PHONE)) {
            $criteria->add(ReversalTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_OUTSTANDINGBALANCE)) {
            $criteria->add(ReversalTableMap::COL_OUTSTANDINGBALANCE, $this->outstandingbalance);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_TRANSACTIONDATE)) {
            $criteria->add(ReversalTableMap::COL_TRANSACTIONDATE, $this->transactiondate);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_DATE_INITIATED)) {
            $criteria->add(ReversalTableMap::COL_DATE_INITIATED, $this->date_initiated);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_DATE_COMPLETED)) {
            $criteria->add(ReversalTableMap::COL_DATE_COMPLETED, $this->date_completed);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_AMOUNT_PAID)) {
            $criteria->add(ReversalTableMap::COL_AMOUNT_PAID, $this->amount_paid);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_AMOUNTDUE)) {
            $criteria->add(ReversalTableMap::COL_AMOUNTDUE, $this->amountdue);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_PLATFORM)) {
            $criteria->add(ReversalTableMap::COL_PLATFORM, $this->platform);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_RECEIPT_NO)) {
            $criteria->add(ReversalTableMap::COL_RECEIPT_NO, $this->receipt_no);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_SERVICEADDRESS)) {
            $criteria->add(ReversalTableMap::COL_SERVICEADDRESS, $this->serviceaddress);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_USAGETYPE)) {
            $criteria->add(ReversalTableMap::COL_USAGETYPE, $this->usagetype);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_PAYMENT_STATUS)) {
            $criteria->add(ReversalTableMap::COL_PAYMENT_STATUS, $this->payment_status);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_RECONCILE_STATUS)) {
            $criteria->add(ReversalTableMap::COL_RECONCILE_STATUS, $this->reconcile_status);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_CREATED_DATE)) {
            $criteria->add(ReversalTableMap::COL_CREATED_DATE, $this->created_date);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_UPLOADSTATUS)) {
            $criteria->add(ReversalTableMap::COL_UPLOADSTATUS, $this->uploadstatus);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_REVERSAL_REASON)) {
            $criteria->add(ReversalTableMap::COL_REVERSAL_REASON, $this->reversal_reason);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_EXECUTOR)) {
            $criteria->add(ReversalTableMap::COL_EXECUTOR, $this->executor);
        }
        if ($this->isColumnModified(ReversalTableMap::COL_REVERSAL_DATE)) {
            $criteria->add(ReversalTableMap::COL_REVERSAL_DATE, $this->reversal_date);
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
        $criteria = ChildReversalQuery::create();
        $criteria->add(ReversalTableMap::COL_REVID, $this->revid);

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
        $validPk = null !== $this->getRevid();

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
        return $this->getRevid();
    }

    /**
     * Generic method to set the primary key (revid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRevid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getRevid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Reversal (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setId($this->getId());
        $copyObj->setAccountNo($this->getAccountNo());
        $copyObj->setBillreferencenumber($this->getBillreferencenumber());
        $copyObj->setTransactionid($this->getTransactionid());
        $copyObj->setSourcebank($this->getSourcebank());
        $copyObj->setDestinationbank($this->getDestinationbank());
        $copyObj->setBuildingtype($this->getBuildingtype());
        $copyObj->setCustomername($this->getCustomername());
        $copyObj->setDistrict($this->getDistrict());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setOutstandingbalance($this->getOutstandingbalance());
        $copyObj->setTransactiondate($this->getTransactiondate());
        $copyObj->setDateInitiated($this->getDateInitiated());
        $copyObj->setDateCompleted($this->getDateCompleted());
        $copyObj->setAmountPaid($this->getAmountPaid());
        $copyObj->setAmountdue($this->getAmountdue());
        $copyObj->setPlatform($this->getPlatform());
        $copyObj->setReceiptNo($this->getReceiptNo());
        $copyObj->setServiceaddress($this->getServiceaddress());
        $copyObj->setUsagetype($this->getUsagetype());
        $copyObj->setPaymentStatus($this->getPaymentStatus());
        $copyObj->setReconcileStatus($this->getReconcileStatus());
        $copyObj->setCreatedDate($this->getCreatedDate());
        $copyObj->setUploadstatus($this->getUploadstatus());
        $copyObj->setReversalReason($this->getReversalReason());
        $copyObj->setExecutor($this->getExecutor());
        $copyObj->setReversalDate($this->getReversalDate());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRevid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \Reversal Clone of current object.
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
        $this->revid = null;
        $this->id = null;
        $this->account_no = null;
        $this->billreferencenumber = null;
        $this->transactionid = null;
        $this->sourcebank = null;
        $this->destinationbank = null;
        $this->buildingtype = null;
        $this->customername = null;
        $this->district = null;
        $this->email = null;
        $this->phone = null;
        $this->outstandingbalance = null;
        $this->transactiondate = null;
        $this->date_initiated = null;
        $this->date_completed = null;
        $this->amount_paid = null;
        $this->amountdue = null;
        $this->platform = null;
        $this->receipt_no = null;
        $this->serviceaddress = null;
        $this->usagetype = null;
        $this->payment_status = null;
        $this->reconcile_status = null;
        $this->created_date = null;
        $this->uploadstatus = null;
        $this->reversal_reason = null;
        $this->executor = null;
        $this->reversal_date = null;
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
        return (string) $this->exportTo(ReversalTableMap::DEFAULT_STRING_FORMAT);
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
