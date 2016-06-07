<?php

namespace Base;

use \PaymentPosOlQuery as ChildPaymentPosOlQuery;
use \Exception;
use \PDO;
use Map\PaymentPosOlTableMap;
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

/**
 * Base class that represents a row from the 'payment_pos_ol' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class PaymentPosOl implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PaymentPosOlTableMap';


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
     * The value for the customer_id field.
     *
     * @var        int
     */
    protected $customer_id;

    /**
     * The value for the station_id field.
     *
     * @var        int
     */
    protected $station_id;

    /**
     * The value for the customer_name field.
     *
     * @var        string
     */
    protected $customer_name;

    /**
     * The value for the amount field.
     *
     * @var        string
     */
    protected $amount;

    /**
     * The value for the bill_code field.
     *
     * @var        string
     */
    protected $bill_code;

    /**
     * The value for the bill_name field.
     *
     * @var        string
     */
    protected $bill_name;

    /**
     * The value for the bill_category_code field.
     *
     * @var        string
     */
    protected $bill_category_code;

    /**
     * The value for the bill_category field.
     *
     * @var        string
     */
    protected $bill_category;

    /**
     * The value for the month field.
     *
     * @var        string
     */
    protected $month;

    /**
     * The value for the year field.
     *
     * @var        string
     */
    protected $year;

    /**
     * The value for the txcode field.
     *
     * @var        string
     */
    protected $txcode;

    /**
     * The value for the station field.
     *
     * @var        string
     */
    protected $station;

    /**
     * The value for the operator_code field.
     *
     * @var        string
     */
    protected $operator_code;

    /**
     * The value for the operator field.
     *
     * @var        string
     */
    protected $operator;

    /**
     * The value for the terminal field.
     *
     * @var        string
     */
    protected $terminal;

    /**
     * The value for the txdate field.
     *
     * @var        string
     */
    protected $txdate;

    /**
     * The value for the txtime field.
     *
     * @var        string
     */
    protected $txtime;

    /**
     * The value for the current_utc field.
     *
     * @var        string
     */
    protected $current_utc;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\PaymentPosOl object.
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
     * Compares this with another <code>PaymentPosOl</code> instance.  If
     * <code>obj</code> is an instance of <code>PaymentPosOl</code>, delegates to
     * <code>equals(PaymentPosOl)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|PaymentPosOl The current object, for fluid interface
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
     * Get the [customer_id] column value.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Get the [station_id] column value.
     *
     * @return int
     */
    public function getStationId()
    {
        return $this->station_id;
    }

    /**
     * Get the [customer_name] column value.
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customer_name;
    }

    /**
     * Get the [amount] column value.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the [bill_code] column value.
     *
     * @return string
     */
    public function getBillCode()
    {
        return $this->bill_code;
    }

    /**
     * Get the [bill_name] column value.
     *
     * @return string
     */
    public function getBillName()
    {
        return $this->bill_name;
    }

    /**
     * Get the [bill_category_code] column value.
     *
     * @return string
     */
    public function getBillCategoryCode()
    {
        return $this->bill_category_code;
    }

    /**
     * Get the [bill_category] column value.
     *
     * @return string
     */
    public function getBillCategory()
    {
        return $this->bill_category;
    }

    /**
     * Get the [month] column value.
     *
     * @return string
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Get the [year] column value.
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Get the [txcode] column value.
     *
     * @return string
     */
    public function getTxcode()
    {
        return $this->txcode;
    }

    /**
     * Get the [station] column value.
     *
     * @return string
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * Get the [operator_code] column value.
     *
     * @return string
     */
    public function getOperatorCode()
    {
        return $this->operator_code;
    }

    /**
     * Get the [operator] column value.
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Get the [terminal] column value.
     *
     * @return string
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * Get the [txdate] column value.
     *
     * @return string
     */
    public function getTxdate()
    {
        return $this->txdate;
    }

    /**
     * Get the [txtime] column value.
     *
     * @return string
     */
    public function getTxtime()
    {
        return $this->txtime;
    }

    /**
     * Get the [current_utc] column value.
     *
     * @return string
     */
    public function getCurrentUtc()
    {
        return $this->current_utc;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [customer_id] column.
     *
     * @param int $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setCustomerId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->customer_id !== $v) {
            $this->customer_id = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_CUSTOMER_ID] = true;
        }

        return $this;
    } // setCustomerId()

    /**
     * Set the value of [station_id] column.
     *
     * @param int $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setStationId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->station_id !== $v) {
            $this->station_id = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_STATION_ID] = true;
        }

        return $this;
    } // setStationId()

    /**
     * Set the value of [customer_name] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setCustomerName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->customer_name !== $v) {
            $this->customer_name = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_CUSTOMER_NAME] = true;
        }

        return $this;
    } // setCustomerName()

    /**
     * Set the value of [amount] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amount !== $v) {
            $this->amount = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_AMOUNT] = true;
        }

        return $this;
    } // setAmount()

    /**
     * Set the value of [bill_code] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setBillCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bill_code !== $v) {
            $this->bill_code = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_BILL_CODE] = true;
        }

        return $this;
    } // setBillCode()

    /**
     * Set the value of [bill_name] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setBillName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bill_name !== $v) {
            $this->bill_name = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_BILL_NAME] = true;
        }

        return $this;
    } // setBillName()

    /**
     * Set the value of [bill_category_code] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setBillCategoryCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bill_category_code !== $v) {
            $this->bill_category_code = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_BILL_CATEGORY_CODE] = true;
        }

        return $this;
    } // setBillCategoryCode()

    /**
     * Set the value of [bill_category] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setBillCategory($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bill_category !== $v) {
            $this->bill_category = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_BILL_CATEGORY] = true;
        }

        return $this;
    } // setBillCategory()

    /**
     * Set the value of [month] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setMonth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->month !== $v) {
            $this->month = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_MONTH] = true;
        }

        return $this;
    } // setMonth()

    /**
     * Set the value of [year] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setYear($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->year !== $v) {
            $this->year = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_YEAR] = true;
        }

        return $this;
    } // setYear()

    /**
     * Set the value of [txcode] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setTxcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txcode !== $v) {
            $this->txcode = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_TXCODE] = true;
        }

        return $this;
    } // setTxcode()

    /**
     * Set the value of [station] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setStation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->station !== $v) {
            $this->station = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_STATION] = true;
        }

        return $this;
    } // setStation()

    /**
     * Set the value of [operator_code] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setOperatorCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->operator_code !== $v) {
            $this->operator_code = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_OPERATOR_CODE] = true;
        }

        return $this;
    } // setOperatorCode()

    /**
     * Set the value of [operator] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setOperator($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->operator !== $v) {
            $this->operator = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_OPERATOR] = true;
        }

        return $this;
    } // setOperator()

    /**
     * Set the value of [terminal] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setTerminal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->terminal !== $v) {
            $this->terminal = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_TERMINAL] = true;
        }

        return $this;
    } // setTerminal()

    /**
     * Set the value of [txdate] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setTxdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txdate !== $v) {
            $this->txdate = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_TXDATE] = true;
        }

        return $this;
    } // setTxdate()

    /**
     * Set the value of [txtime] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setTxtime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->txtime !== $v) {
            $this->txtime = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_TXTIME] = true;
        }

        return $this;
    } // setTxtime()

    /**
     * Set the value of [current_utc] column.
     *
     * @param string $v new value
     * @return $this|\PaymentPosOl The current object (for fluent API support)
     */
    public function setCurrentUtc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->current_utc !== $v) {
            $this->current_utc = $v;
            $this->modifiedColumns[PaymentPosOlTableMap::COL_CURRENT_UTC] = true;
        }

        return $this;
    } // setCurrentUtc()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PaymentPosOlTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PaymentPosOlTableMap::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PaymentPosOlTableMap::translateFieldName('StationId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->station_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PaymentPosOlTableMap::translateFieldName('CustomerName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->customer_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PaymentPosOlTableMap::translateFieldName('Amount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PaymentPosOlTableMap::translateFieldName('BillCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bill_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PaymentPosOlTableMap::translateFieldName('BillName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bill_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PaymentPosOlTableMap::translateFieldName('BillCategoryCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bill_category_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PaymentPosOlTableMap::translateFieldName('BillCategory', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bill_category = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PaymentPosOlTableMap::translateFieldName('Month', TableMap::TYPE_PHPNAME, $indexType)];
            $this->month = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PaymentPosOlTableMap::translateFieldName('Year', TableMap::TYPE_PHPNAME, $indexType)];
            $this->year = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PaymentPosOlTableMap::translateFieldName('Txcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : PaymentPosOlTableMap::translateFieldName('Station', TableMap::TYPE_PHPNAME, $indexType)];
            $this->station = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : PaymentPosOlTableMap::translateFieldName('OperatorCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->operator_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : PaymentPosOlTableMap::translateFieldName('Operator', TableMap::TYPE_PHPNAME, $indexType)];
            $this->operator = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : PaymentPosOlTableMap::translateFieldName('Terminal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->terminal = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : PaymentPosOlTableMap::translateFieldName('Txdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : PaymentPosOlTableMap::translateFieldName('Txtime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->txtime = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : PaymentPosOlTableMap::translateFieldName('CurrentUtc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->current_utc = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 19; // 19 = PaymentPosOlTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\PaymentPosOl'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(PaymentPosOlTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPaymentPosOlQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see PaymentPosOl::setDeleted()
     * @see PaymentPosOl::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentPosOlTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPaymentPosOlQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentPosOlTableMap::DATABASE_NAME);
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
                PaymentPosOlTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[PaymentPosOlTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PaymentPosOlTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_CUSTOMER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'customer_id';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_STATION_ID)) {
            $modifiedColumns[':p' . $index++]  = 'station_id';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_CUSTOMER_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'customer_name';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'amount';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_BILL_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'bill_code';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_BILL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'bill_name';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_BILL_CATEGORY_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'bill_category_code';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_BILL_CATEGORY)) {
            $modifiedColumns[':p' . $index++]  = 'bill_category';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_MONTH)) {
            $modifiedColumns[':p' . $index++]  = 'month';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_YEAR)) {
            $modifiedColumns[':p' . $index++]  = 'year';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_TXCODE)) {
            $modifiedColumns[':p' . $index++]  = 'txcode';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_STATION)) {
            $modifiedColumns[':p' . $index++]  = 'station';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_OPERATOR_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'operator_code';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_OPERATOR)) {
            $modifiedColumns[':p' . $index++]  = 'operator';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_TERMINAL)) {
            $modifiedColumns[':p' . $index++]  = 'terminal';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_TXDATE)) {
            $modifiedColumns[':p' . $index++]  = 'txdate';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_TXTIME)) {
            $modifiedColumns[':p' . $index++]  = 'txtime';
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_CURRENT_UTC)) {
            $modifiedColumns[':p' . $index++]  = 'current_utc';
        }

        $sql = sprintf(
            'INSERT INTO payment_pos_ol (%s) VALUES (%s)',
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
                    case 'customer_id':
                        $stmt->bindValue($identifier, $this->customer_id, PDO::PARAM_INT);
                        break;
                    case 'station_id':
                        $stmt->bindValue($identifier, $this->station_id, PDO::PARAM_INT);
                        break;
                    case 'customer_name':
                        $stmt->bindValue($identifier, $this->customer_name, PDO::PARAM_STR);
                        break;
                    case 'amount':
                        $stmt->bindValue($identifier, $this->amount, PDO::PARAM_STR);
                        break;
                    case 'bill_code':
                        $stmt->bindValue($identifier, $this->bill_code, PDO::PARAM_STR);
                        break;
                    case 'bill_name':
                        $stmt->bindValue($identifier, $this->bill_name, PDO::PARAM_STR);
                        break;
                    case 'bill_category_code':
                        $stmt->bindValue($identifier, $this->bill_category_code, PDO::PARAM_STR);
                        break;
                    case 'bill_category':
                        $stmt->bindValue($identifier, $this->bill_category, PDO::PARAM_STR);
                        break;
                    case 'month':
                        $stmt->bindValue($identifier, $this->month, PDO::PARAM_STR);
                        break;
                    case 'year':
                        $stmt->bindValue($identifier, $this->year, PDO::PARAM_STR);
                        break;
                    case 'txcode':
                        $stmt->bindValue($identifier, $this->txcode, PDO::PARAM_STR);
                        break;
                    case 'station':
                        $stmt->bindValue($identifier, $this->station, PDO::PARAM_STR);
                        break;
                    case 'operator_code':
                        $stmt->bindValue($identifier, $this->operator_code, PDO::PARAM_STR);
                        break;
                    case 'operator':
                        $stmt->bindValue($identifier, $this->operator, PDO::PARAM_STR);
                        break;
                    case 'terminal':
                        $stmt->bindValue($identifier, $this->terminal, PDO::PARAM_STR);
                        break;
                    case 'txdate':
                        $stmt->bindValue($identifier, $this->txdate, PDO::PARAM_STR);
                        break;
                    case 'txtime':
                        $stmt->bindValue($identifier, $this->txtime, PDO::PARAM_STR);
                        break;
                    case 'current_utc':
                        $stmt->bindValue($identifier, $this->current_utc, PDO::PARAM_STR);
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
        $pos = PaymentPosOlTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCustomerId();
                break;
            case 2:
                return $this->getStationId();
                break;
            case 3:
                return $this->getCustomerName();
                break;
            case 4:
                return $this->getAmount();
                break;
            case 5:
                return $this->getBillCode();
                break;
            case 6:
                return $this->getBillName();
                break;
            case 7:
                return $this->getBillCategoryCode();
                break;
            case 8:
                return $this->getBillCategory();
                break;
            case 9:
                return $this->getMonth();
                break;
            case 10:
                return $this->getYear();
                break;
            case 11:
                return $this->getTxcode();
                break;
            case 12:
                return $this->getStation();
                break;
            case 13:
                return $this->getOperatorCode();
                break;
            case 14:
                return $this->getOperator();
                break;
            case 15:
                return $this->getTerminal();
                break;
            case 16:
                return $this->getTxdate();
                break;
            case 17:
                return $this->getTxtime();
                break;
            case 18:
                return $this->getCurrentUtc();
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

        if (isset($alreadyDumpedObjects['PaymentPosOl'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PaymentPosOl'][$this->hashCode()] = true;
        $keys = PaymentPosOlTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCustomerId(),
            $keys[2] => $this->getStationId(),
            $keys[3] => $this->getCustomerName(),
            $keys[4] => $this->getAmount(),
            $keys[5] => $this->getBillCode(),
            $keys[6] => $this->getBillName(),
            $keys[7] => $this->getBillCategoryCode(),
            $keys[8] => $this->getBillCategory(),
            $keys[9] => $this->getMonth(),
            $keys[10] => $this->getYear(),
            $keys[11] => $this->getTxcode(),
            $keys[12] => $this->getStation(),
            $keys[13] => $this->getOperatorCode(),
            $keys[14] => $this->getOperator(),
            $keys[15] => $this->getTerminal(),
            $keys[16] => $this->getTxdate(),
            $keys[17] => $this->getTxtime(),
            $keys[18] => $this->getCurrentUtc(),
        );
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
     * @return $this|\PaymentPosOl
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PaymentPosOlTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\PaymentPosOl
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setCustomerId($value);
                break;
            case 2:
                $this->setStationId($value);
                break;
            case 3:
                $this->setCustomerName($value);
                break;
            case 4:
                $this->setAmount($value);
                break;
            case 5:
                $this->setBillCode($value);
                break;
            case 6:
                $this->setBillName($value);
                break;
            case 7:
                $this->setBillCategoryCode($value);
                break;
            case 8:
                $this->setBillCategory($value);
                break;
            case 9:
                $this->setMonth($value);
                break;
            case 10:
                $this->setYear($value);
                break;
            case 11:
                $this->setTxcode($value);
                break;
            case 12:
                $this->setStation($value);
                break;
            case 13:
                $this->setOperatorCode($value);
                break;
            case 14:
                $this->setOperator($value);
                break;
            case 15:
                $this->setTerminal($value);
                break;
            case 16:
                $this->setTxdate($value);
                break;
            case 17:
                $this->setTxtime($value);
                break;
            case 18:
                $this->setCurrentUtc($value);
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
        $keys = PaymentPosOlTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCustomerId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setStationId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCustomerName($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setAmount($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBillCode($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setBillName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setBillCategoryCode($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setBillCategory($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setMonth($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setYear($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setTxcode($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setStation($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setOperatorCode($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setOperator($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setTerminal($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTxdate($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setTxtime($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setCurrentUtc($arr[$keys[18]]);
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
     * @return $this|\PaymentPosOl The current object, for fluid interface
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
        $criteria = new Criteria(PaymentPosOlTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PaymentPosOlTableMap::COL_ID)) {
            $criteria->add(PaymentPosOlTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_CUSTOMER_ID)) {
            $criteria->add(PaymentPosOlTableMap::COL_CUSTOMER_ID, $this->customer_id);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_STATION_ID)) {
            $criteria->add(PaymentPosOlTableMap::COL_STATION_ID, $this->station_id);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_CUSTOMER_NAME)) {
            $criteria->add(PaymentPosOlTableMap::COL_CUSTOMER_NAME, $this->customer_name);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_AMOUNT)) {
            $criteria->add(PaymentPosOlTableMap::COL_AMOUNT, $this->amount);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_BILL_CODE)) {
            $criteria->add(PaymentPosOlTableMap::COL_BILL_CODE, $this->bill_code);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_BILL_NAME)) {
            $criteria->add(PaymentPosOlTableMap::COL_BILL_NAME, $this->bill_name);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_BILL_CATEGORY_CODE)) {
            $criteria->add(PaymentPosOlTableMap::COL_BILL_CATEGORY_CODE, $this->bill_category_code);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_BILL_CATEGORY)) {
            $criteria->add(PaymentPosOlTableMap::COL_BILL_CATEGORY, $this->bill_category);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_MONTH)) {
            $criteria->add(PaymentPosOlTableMap::COL_MONTH, $this->month);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_YEAR)) {
            $criteria->add(PaymentPosOlTableMap::COL_YEAR, $this->year);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_TXCODE)) {
            $criteria->add(PaymentPosOlTableMap::COL_TXCODE, $this->txcode);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_STATION)) {
            $criteria->add(PaymentPosOlTableMap::COL_STATION, $this->station);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_OPERATOR_CODE)) {
            $criteria->add(PaymentPosOlTableMap::COL_OPERATOR_CODE, $this->operator_code);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_OPERATOR)) {
            $criteria->add(PaymentPosOlTableMap::COL_OPERATOR, $this->operator);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_TERMINAL)) {
            $criteria->add(PaymentPosOlTableMap::COL_TERMINAL, $this->terminal);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_TXDATE)) {
            $criteria->add(PaymentPosOlTableMap::COL_TXDATE, $this->txdate);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_TXTIME)) {
            $criteria->add(PaymentPosOlTableMap::COL_TXTIME, $this->txtime);
        }
        if ($this->isColumnModified(PaymentPosOlTableMap::COL_CURRENT_UTC)) {
            $criteria->add(PaymentPosOlTableMap::COL_CURRENT_UTC, $this->current_utc);
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
        $criteria = ChildPaymentPosOlQuery::create();
        $criteria->add(PaymentPosOlTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \PaymentPosOl (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCustomerId($this->getCustomerId());
        $copyObj->setStationId($this->getStationId());
        $copyObj->setCustomerName($this->getCustomerName());
        $copyObj->setAmount($this->getAmount());
        $copyObj->setBillCode($this->getBillCode());
        $copyObj->setBillName($this->getBillName());
        $copyObj->setBillCategoryCode($this->getBillCategoryCode());
        $copyObj->setBillCategory($this->getBillCategory());
        $copyObj->setMonth($this->getMonth());
        $copyObj->setYear($this->getYear());
        $copyObj->setTxcode($this->getTxcode());
        $copyObj->setStation($this->getStation());
        $copyObj->setOperatorCode($this->getOperatorCode());
        $copyObj->setOperator($this->getOperator());
        $copyObj->setTerminal($this->getTerminal());
        $copyObj->setTxdate($this->getTxdate());
        $copyObj->setTxtime($this->getTxtime());
        $copyObj->setCurrentUtc($this->getCurrentUtc());
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
     * @return \PaymentPosOl Clone of current object.
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
        $this->customer_id = null;
        $this->station_id = null;
        $this->customer_name = null;
        $this->amount = null;
        $this->bill_code = null;
        $this->bill_name = null;
        $this->bill_category_code = null;
        $this->bill_category = null;
        $this->month = null;
        $this->year = null;
        $this->txcode = null;
        $this->station = null;
        $this->operator_code = null;
        $this->operator = null;
        $this->terminal = null;
        $this->txdate = null;
        $this->txtime = null;
        $this->current_utc = null;
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
        return (string) $this->exportTo(PaymentPosOlTableMap::DEFAULT_STRING_FORMAT);
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
