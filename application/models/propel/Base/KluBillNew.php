<?php

namespace Base;

use \KluBillNewQuery as ChildKluBillNewQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\KluBillNewTableMap;
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
 * Base class that represents a row from the 'klu_bill_new' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class KluBillNew implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\KluBillNewTableMap';


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
     * The value for the uniquekeyid field.
     *
     * @var        int
     */
    protected $uniquekeyid;

    /**
     * The value for the accountno field.
     *
     * @var        string
     */
    protected $accountno;

    /**
     * The value for the servicedistrict field.
     *
     * @var        string
     */
    protected $servicedistrict;

    /**
     * The value for the lastmeterreading field.
     *
     * @var        double
     */
    protected $lastmeterreading;

    /**
     * The value for the currentmeterreading field.
     *
     * @var        double
     */
    protected $currentmeterreading;

    /**
     * The value for the unitsconsumed field.
     *
     * @var        double
     */
    protected $unitsconsumed;

    /**
     * The value for the lastpaydate field.
     *
     * @var        string
     */
    protected $lastpaydate;

    /**
     * The value for the lastpayamt field.
     *
     * @var        string
     */
    protected $lastpayamt;

    /**
     * The value for the priorbalance field.
     *
     * @var        string
     */
    protected $priorbalance;

    /**
     * The value for the outstandingbalance field.
     *
     * @var        string
     */
    protected $outstandingbalance;

    /**
     * The value for the amountdue field.
     *
     * @var        string
     */
    protected $amountdue;

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
     * The value for the stampdutycharges field.
     *
     * @var        string
     */
    protected $stampdutycharges;

    /**
     * The value for the servicecharges field.
     *
     * @var        string
     */
    protected $servicecharges;

    /**
     * The value for the routinecharges field.
     *
     * @var        string
     */
    protected $routinecharges;

    /**
     * The value for the billservicerate field.
     *
     * @var        string
     */
    protected $billservicerate;

    /**
     * The value for the servicetypedesc field.
     *
     * @var        string
     */
    protected $servicetypedesc;

    /**
     * The value for the billperiod field.
     *
     * @var        string
     */
    protected $billperiod;

    /**
     * The value for the usagetype field.
     *
     * @var        string
     */
    protected $usagetype;

    /**
     * The value for the meternumber field.
     *
     * @var        string
     */
    protected $meternumber;

    /**
     * The value for the metertype field.
     *
     * @var        string
     */
    protected $metertype;

    /**
     * The value for the metercondition field.
     *
     * @var        string
     */
    protected $metercondition;

    /**
     * The value for the leakagestatus field.
     *
     * @var        string
     */
    protected $leakagestatus;

    /**
     * The value for the propertytype field.
     *
     * @var        string
     */
    protected $propertytype;

    /**
     * The value for the meterreaddevice field.
     *
     * @var        string
     */
    protected $meterreaddevice;

    /**
     * The value for the billmethod field.
     *
     * @var        string
     */
    protected $billmethod;

    /**
     * The value for the datecreated field.
     *
     * @var        DateTime
     */
    protected $datecreated;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\KluBillNew object.
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
     * Compares this with another <code>KluBillNew</code> instance.  If
     * <code>obj</code> is an instance of <code>KluBillNew</code>, delegates to
     * <code>equals(KluBillNew)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|KluBillNew The current object, for fluid interface
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
     * Get the [uniquekeyid] column value.
     *
     * @return int
     */
    public function getUniquekeyid()
    {
        return $this->uniquekeyid;
    }

    /**
     * Get the [accountno] column value.
     *
     * @return string
     */
    public function getAccountno()
    {
        return $this->accountno;
    }

    /**
     * Get the [servicedistrict] column value.
     *
     * @return string
     */
    public function getServicedistrict()
    {
        return $this->servicedistrict;
    }

    /**
     * Get the [lastmeterreading] column value.
     *
     * @return double
     */
    public function getLastmeterreading()
    {
        return $this->lastmeterreading;
    }

    /**
     * Get the [currentmeterreading] column value.
     *
     * @return double
     */
    public function getCurrentmeterreading()
    {
        return $this->currentmeterreading;
    }

    /**
     * Get the [unitsconsumed] column value.
     *
     * @return double
     */
    public function getUnitsconsumed()
    {
        return $this->unitsconsumed;
    }

    /**
     * Get the [lastpaydate] column value.
     *
     * @return string
     */
    public function getLastpaydate()
    {
        return $this->lastpaydate;
    }

    /**
     * Get the [lastpayamt] column value.
     *
     * @return string
     */
    public function getLastpayamt()
    {
        return $this->lastpayamt;
    }

    /**
     * Get the [priorbalance] column value.
     *
     * @return string
     */
    public function getPriorbalance()
    {
        return $this->priorbalance;
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
     * Get the [amountdue] column value.
     *
     * @return string
     */
    public function getAmountdue()
    {
        return $this->amountdue;
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
     * Get the [stampdutycharges] column value.
     *
     * @return string
     */
    public function getStampdutycharges()
    {
        return $this->stampdutycharges;
    }

    /**
     * Get the [servicecharges] column value.
     *
     * @return string
     */
    public function getServicecharges()
    {
        return $this->servicecharges;
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
     * Get the [billservicerate] column value.
     *
     * @return string
     */
    public function getBillservicerate()
    {
        return $this->billservicerate;
    }

    /**
     * Get the [servicetypedesc] column value.
     *
     * @return string
     */
    public function getServicetypedesc()
    {
        return $this->servicetypedesc;
    }

    /**
     * Get the [billperiod] column value.
     *
     * @return string
     */
    public function getBillperiod()
    {
        return $this->billperiod;
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
     * Get the [meternumber] column value.
     *
     * @return string
     */
    public function getMeternumber()
    {
        return $this->meternumber;
    }

    /**
     * Get the [metertype] column value.
     *
     * @return string
     */
    public function getMetertype()
    {
        return $this->metertype;
    }

    /**
     * Get the [metercondition] column value.
     *
     * @return string
     */
    public function getMetercondition()
    {
        return $this->metercondition;
    }

    /**
     * Get the [leakagestatus] column value.
     *
     * @return string
     */
    public function getLeakagestatus()
    {
        return $this->leakagestatus;
    }

    /**
     * Get the [propertytype] column value.
     *
     * @return string
     */
    public function getPropertytype()
    {
        return $this->propertytype;
    }

    /**
     * Get the [meterreaddevice] column value.
     *
     * @return string
     */
    public function getMeterreaddevice()
    {
        return $this->meterreaddevice;
    }

    /**
     * Get the [billmethod] column value.
     *
     * @return string
     */
    public function getBillmethod()
    {
        return $this->billmethod;
    }

    /**
     * Get the [optionally formatted] temporal [datecreated] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDatecreated($format = NULL)
    {
        if ($format === null) {
            return $this->datecreated;
        } else {
            return $this->datecreated instanceof \DateTimeInterface ? $this->datecreated->format($format) : null;
        }
    }

    /**
     * Set the value of [uniquekeyid] column.
     *
     * @param int $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setUniquekeyid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->uniquekeyid !== $v) {
            $this->uniquekeyid = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_UNIQUEKEYID] = true;
        }

        return $this;
    } // setUniquekeyid()

    /**
     * Set the value of [accountno] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setAccountno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->accountno !== $v) {
            $this->accountno = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_ACCOUNTNO] = true;
        }

        return $this;
    } // setAccountno()

    /**
     * Set the value of [servicedistrict] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setServicedistrict($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->servicedistrict !== $v) {
            $this->servicedistrict = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_SERVICEDISTRICT] = true;
        }

        return $this;
    } // setServicedistrict()

    /**
     * Set the value of [lastmeterreading] column.
     *
     * @param double $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setLastmeterreading($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->lastmeterreading !== $v) {
            $this->lastmeterreading = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_LASTMETERREADING] = true;
        }

        return $this;
    } // setLastmeterreading()

    /**
     * Set the value of [currentmeterreading] column.
     *
     * @param double $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setCurrentmeterreading($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->currentmeterreading !== $v) {
            $this->currentmeterreading = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_CURRENTMETERREADING] = true;
        }

        return $this;
    } // setCurrentmeterreading()

    /**
     * Set the value of [unitsconsumed] column.
     *
     * @param double $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setUnitsconsumed($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->unitsconsumed !== $v) {
            $this->unitsconsumed = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_UNITSCONSUMED] = true;
        }

        return $this;
    } // setUnitsconsumed()

    /**
     * Set the value of [lastpaydate] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setLastpaydate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastpaydate !== $v) {
            $this->lastpaydate = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_LASTPAYDATE] = true;
        }

        return $this;
    } // setLastpaydate()

    /**
     * Set the value of [lastpayamt] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setLastpayamt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastpayamt !== $v) {
            $this->lastpayamt = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_LASTPAYAMT] = true;
        }

        return $this;
    } // setLastpayamt()

    /**
     * Set the value of [priorbalance] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setPriorbalance($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->priorbalance !== $v) {
            $this->priorbalance = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_PRIORBALANCE] = true;
        }

        return $this;
    } // setPriorbalance()

    /**
     * Set the value of [outstandingbalance] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setOutstandingbalance($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->outstandingbalance !== $v) {
            $this->outstandingbalance = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_OUTSTANDINGBALANCE] = true;
        }

        return $this;
    } // setOutstandingbalance()

    /**
     * Set the value of [amountdue] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setAmountdue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->amountdue !== $v) {
            $this->amountdue = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_AMOUNTDUE] = true;
        }

        return $this;
    } // setAmountdue()

    /**
     * Set the value of [metermaintenancecharge] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setMetermaintenancecharge($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->metermaintenancecharge !== $v) {
            $this->metermaintenancecharge = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_METERMAINTENANCECHARGE] = true;
        }

        return $this;
    } // setMetermaintenancecharge()

    /**
     * Set the value of [discounts] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setDiscounts($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discounts !== $v) {
            $this->discounts = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_DISCOUNTS] = true;
        }

        return $this;
    } // setDiscounts()

    /**
     * Set the value of [othercharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setOthercharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->othercharges !== $v) {
            $this->othercharges = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_OTHERCHARGES] = true;
        }

        return $this;
    } // setOthercharges()

    /**
     * Set the value of [penaltycharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setPenaltycharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->penaltycharges !== $v) {
            $this->penaltycharges = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_PENALTYCHARGES] = true;
        }

        return $this;
    } // setPenaltycharges()

    /**
     * Set the value of [stampdutycharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setStampdutycharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->stampdutycharges !== $v) {
            $this->stampdutycharges = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_STAMPDUTYCHARGES] = true;
        }

        return $this;
    } // setStampdutycharges()

    /**
     * Set the value of [servicecharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setServicecharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->servicecharges !== $v) {
            $this->servicecharges = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_SERVICECHARGES] = true;
        }

        return $this;
    } // setServicecharges()

    /**
     * Set the value of [routinecharges] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setRoutinecharges($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->routinecharges !== $v) {
            $this->routinecharges = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_ROUTINECHARGES] = true;
        }

        return $this;
    } // setRoutinecharges()

    /**
     * Set the value of [billservicerate] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setBillservicerate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billservicerate !== $v) {
            $this->billservicerate = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_BILLSERVICERATE] = true;
        }

        return $this;
    } // setBillservicerate()

    /**
     * Set the value of [servicetypedesc] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setServicetypedesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->servicetypedesc !== $v) {
            $this->servicetypedesc = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_SERVICETYPEDESC] = true;
        }

        return $this;
    } // setServicetypedesc()

    /**
     * Set the value of [billperiod] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setBillperiod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billperiod !== $v) {
            $this->billperiod = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_BILLPERIOD] = true;
        }

        return $this;
    } // setBillperiod()

    /**
     * Set the value of [usagetype] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setUsagetype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->usagetype !== $v) {
            $this->usagetype = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_USAGETYPE] = true;
        }

        return $this;
    } // setUsagetype()

    /**
     * Set the value of [meternumber] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setMeternumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->meternumber !== $v) {
            $this->meternumber = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_METERNUMBER] = true;
        }

        return $this;
    } // setMeternumber()

    /**
     * Set the value of [metertype] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setMetertype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->metertype !== $v) {
            $this->metertype = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_METERTYPE] = true;
        }

        return $this;
    } // setMetertype()

    /**
     * Set the value of [metercondition] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setMetercondition($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->metercondition !== $v) {
            $this->metercondition = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_METERCONDITION] = true;
        }

        return $this;
    } // setMetercondition()

    /**
     * Set the value of [leakagestatus] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setLeakagestatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->leakagestatus !== $v) {
            $this->leakagestatus = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_LEAKAGESTATUS] = true;
        }

        return $this;
    } // setLeakagestatus()

    /**
     * Set the value of [propertytype] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setPropertytype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->propertytype !== $v) {
            $this->propertytype = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_PROPERTYTYPE] = true;
        }

        return $this;
    } // setPropertytype()

    /**
     * Set the value of [meterreaddevice] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setMeterreaddevice($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->meterreaddevice !== $v) {
            $this->meterreaddevice = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_METERREADDEVICE] = true;
        }

        return $this;
    } // setMeterreaddevice()

    /**
     * Set the value of [billmethod] column.
     *
     * @param string $v new value
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setBillmethod($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billmethod !== $v) {
            $this->billmethod = $v;
            $this->modifiedColumns[KluBillNewTableMap::COL_BILLMETHOD] = true;
        }

        return $this;
    } // setBillmethod()

    /**
     * Sets the value of [datecreated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\KluBillNew The current object (for fluent API support)
     */
    public function setDatecreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->datecreated !== null || $dt !== null) {
            if ($this->datecreated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->datecreated->format("Y-m-d H:i:s.u")) {
                $this->datecreated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[KluBillNewTableMap::COL_DATECREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDatecreated()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : KluBillNewTableMap::translateFieldName('Uniquekeyid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uniquekeyid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : KluBillNewTableMap::translateFieldName('Accountno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->accountno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : KluBillNewTableMap::translateFieldName('Servicedistrict', TableMap::TYPE_PHPNAME, $indexType)];
            $this->servicedistrict = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : KluBillNewTableMap::translateFieldName('Lastmeterreading', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastmeterreading = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : KluBillNewTableMap::translateFieldName('Currentmeterreading', TableMap::TYPE_PHPNAME, $indexType)];
            $this->currentmeterreading = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : KluBillNewTableMap::translateFieldName('Unitsconsumed', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unitsconsumed = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : KluBillNewTableMap::translateFieldName('Lastpaydate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastpaydate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : KluBillNewTableMap::translateFieldName('Lastpayamt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastpayamt = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : KluBillNewTableMap::translateFieldName('Priorbalance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->priorbalance = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : KluBillNewTableMap::translateFieldName('Outstandingbalance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->outstandingbalance = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : KluBillNewTableMap::translateFieldName('Amountdue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->amountdue = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : KluBillNewTableMap::translateFieldName('Metermaintenancecharge', TableMap::TYPE_PHPNAME, $indexType)];
            $this->metermaintenancecharge = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : KluBillNewTableMap::translateFieldName('Discounts', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discounts = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : KluBillNewTableMap::translateFieldName('Othercharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->othercharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : KluBillNewTableMap::translateFieldName('Penaltycharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->penaltycharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : KluBillNewTableMap::translateFieldName('Stampdutycharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->stampdutycharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : KluBillNewTableMap::translateFieldName('Servicecharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->servicecharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : KluBillNewTableMap::translateFieldName('Routinecharges', TableMap::TYPE_PHPNAME, $indexType)];
            $this->routinecharges = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : KluBillNewTableMap::translateFieldName('Billservicerate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billservicerate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : KluBillNewTableMap::translateFieldName('Servicetypedesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->servicetypedesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : KluBillNewTableMap::translateFieldName('Billperiod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billperiod = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : KluBillNewTableMap::translateFieldName('Usagetype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->usagetype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : KluBillNewTableMap::translateFieldName('Meternumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->meternumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : KluBillNewTableMap::translateFieldName('Metertype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->metertype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : KluBillNewTableMap::translateFieldName('Metercondition', TableMap::TYPE_PHPNAME, $indexType)];
            $this->metercondition = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : KluBillNewTableMap::translateFieldName('Leakagestatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->leakagestatus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : KluBillNewTableMap::translateFieldName('Propertytype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->propertytype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : KluBillNewTableMap::translateFieldName('Meterreaddevice', TableMap::TYPE_PHPNAME, $indexType)];
            $this->meterreaddevice = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : KluBillNewTableMap::translateFieldName('Billmethod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billmethod = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : KluBillNewTableMap::translateFieldName('Datecreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->datecreated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 30; // 30 = KluBillNewTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\KluBillNew'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(KluBillNewTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildKluBillNewQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see KluBillNew::setDeleted()
     * @see KluBillNew::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillNewTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildKluBillNewQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillNewTableMap::DATABASE_NAME);
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
                KluBillNewTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[KluBillNewTableMap::COL_UNIQUEKEYID] = true;
        if (null !== $this->uniquekeyid) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . KluBillNewTableMap::COL_UNIQUEKEYID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(KluBillNewTableMap::COL_UNIQUEKEYID)) {
            $modifiedColumns[':p' . $index++]  = 'UniqueKeyID';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_ACCOUNTNO)) {
            $modifiedColumns[':p' . $index++]  = 'AccountNo';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_SERVICEDISTRICT)) {
            $modifiedColumns[':p' . $index++]  = 'ServiceDistrict';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_LASTMETERREADING)) {
            $modifiedColumns[':p' . $index++]  = 'LastMeterReading';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_CURRENTMETERREADING)) {
            $modifiedColumns[':p' . $index++]  = 'CurrentMeterReading';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_UNITSCONSUMED)) {
            $modifiedColumns[':p' . $index++]  = 'UnitsConsumed';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_LASTPAYDATE)) {
            $modifiedColumns[':p' . $index++]  = 'LastPayDate';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_LASTPAYAMT)) {
            $modifiedColumns[':p' . $index++]  = 'LastPayAmt';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_PRIORBALANCE)) {
            $modifiedColumns[':p' . $index++]  = 'PriorBalance';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_OUTSTANDINGBALANCE)) {
            $modifiedColumns[':p' . $index++]  = 'OutstandingBalance';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_AMOUNTDUE)) {
            $modifiedColumns[':p' . $index++]  = 'AmountDue';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERMAINTENANCECHARGE)) {
            $modifiedColumns[':p' . $index++]  = 'MeterMaintenanceCharge';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_DISCOUNTS)) {
            $modifiedColumns[':p' . $index++]  = 'Discounts';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_OTHERCHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'OtherCharges';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_PENALTYCHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'PenaltyCharges';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_STAMPDUTYCHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'StampDutyCharges';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_SERVICECHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'ServiceCharges';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_ROUTINECHARGES)) {
            $modifiedColumns[':p' . $index++]  = 'RoutineCharges';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_BILLSERVICERATE)) {
            $modifiedColumns[':p' . $index++]  = 'BillServiceRate';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_SERVICETYPEDESC)) {
            $modifiedColumns[':p' . $index++]  = 'ServiceTypeDesc';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_BILLPERIOD)) {
            $modifiedColumns[':p' . $index++]  = 'BillPeriod';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_USAGETYPE)) {
            $modifiedColumns[':p' . $index++]  = 'UsageType';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'MeterNumber';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'MeterType';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERCONDITION)) {
            $modifiedColumns[':p' . $index++]  = 'MeterCondition';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_LEAKAGESTATUS)) {
            $modifiedColumns[':p' . $index++]  = 'LeakageStatus';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_PROPERTYTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'PropertyType';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERREADDEVICE)) {
            $modifiedColumns[':p' . $index++]  = 'MeterReadDevice';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_BILLMETHOD)) {
            $modifiedColumns[':p' . $index++]  = 'Billmethod';
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_DATECREATED)) {
            $modifiedColumns[':p' . $index++]  = 'DateCreated';
        }

        $sql = sprintf(
            'INSERT INTO klu_bill_new (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'UniqueKeyID':
                        $stmt->bindValue($identifier, $this->uniquekeyid, PDO::PARAM_INT);
                        break;
                    case 'AccountNo':
                        $stmt->bindValue($identifier, $this->accountno, PDO::PARAM_STR);
                        break;
                    case 'ServiceDistrict':
                        $stmt->bindValue($identifier, $this->servicedistrict, PDO::PARAM_STR);
                        break;
                    case 'LastMeterReading':
                        $stmt->bindValue($identifier, $this->lastmeterreading, PDO::PARAM_STR);
                        break;
                    case 'CurrentMeterReading':
                        $stmt->bindValue($identifier, $this->currentmeterreading, PDO::PARAM_STR);
                        break;
                    case 'UnitsConsumed':
                        $stmt->bindValue($identifier, $this->unitsconsumed, PDO::PARAM_STR);
                        break;
                    case 'LastPayDate':
                        $stmt->bindValue($identifier, $this->lastpaydate, PDO::PARAM_STR);
                        break;
                    case 'LastPayAmt':
                        $stmt->bindValue($identifier, $this->lastpayamt, PDO::PARAM_STR);
                        break;
                    case 'PriorBalance':
                        $stmt->bindValue($identifier, $this->priorbalance, PDO::PARAM_STR);
                        break;
                    case 'OutstandingBalance':
                        $stmt->bindValue($identifier, $this->outstandingbalance, PDO::PARAM_STR);
                        break;
                    case 'AmountDue':
                        $stmt->bindValue($identifier, $this->amountdue, PDO::PARAM_STR);
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
                    case 'StampDutyCharges':
                        $stmt->bindValue($identifier, $this->stampdutycharges, PDO::PARAM_STR);
                        break;
                    case 'ServiceCharges':
                        $stmt->bindValue($identifier, $this->servicecharges, PDO::PARAM_STR);
                        break;
                    case 'RoutineCharges':
                        $stmt->bindValue($identifier, $this->routinecharges, PDO::PARAM_STR);
                        break;
                    case 'BillServiceRate':
                        $stmt->bindValue($identifier, $this->billservicerate, PDO::PARAM_STR);
                        break;
                    case 'ServiceTypeDesc':
                        $stmt->bindValue($identifier, $this->servicetypedesc, PDO::PARAM_STR);
                        break;
                    case 'BillPeriod':
                        $stmt->bindValue($identifier, $this->billperiod, PDO::PARAM_STR);
                        break;
                    case 'UsageType':
                        $stmt->bindValue($identifier, $this->usagetype, PDO::PARAM_STR);
                        break;
                    case 'MeterNumber':
                        $stmt->bindValue($identifier, $this->meternumber, PDO::PARAM_STR);
                        break;
                    case 'MeterType':
                        $stmt->bindValue($identifier, $this->metertype, PDO::PARAM_STR);
                        break;
                    case 'MeterCondition':
                        $stmt->bindValue($identifier, $this->metercondition, PDO::PARAM_STR);
                        break;
                    case 'LeakageStatus':
                        $stmt->bindValue($identifier, $this->leakagestatus, PDO::PARAM_STR);
                        break;
                    case 'PropertyType':
                        $stmt->bindValue($identifier, $this->propertytype, PDO::PARAM_STR);
                        break;
                    case 'MeterReadDevice':
                        $stmt->bindValue($identifier, $this->meterreaddevice, PDO::PARAM_STR);
                        break;
                    case 'Billmethod':
                        $stmt->bindValue($identifier, $this->billmethod, PDO::PARAM_STR);
                        break;
                    case 'DateCreated':
                        $stmt->bindValue($identifier, $this->datecreated ? $this->datecreated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
        $this->setUniquekeyid($pk);

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
        $pos = KluBillNewTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getUniquekeyid();
                break;
            case 1:
                return $this->getAccountno();
                break;
            case 2:
                return $this->getServicedistrict();
                break;
            case 3:
                return $this->getLastmeterreading();
                break;
            case 4:
                return $this->getCurrentmeterreading();
                break;
            case 5:
                return $this->getUnitsconsumed();
                break;
            case 6:
                return $this->getLastpaydate();
                break;
            case 7:
                return $this->getLastpayamt();
                break;
            case 8:
                return $this->getPriorbalance();
                break;
            case 9:
                return $this->getOutstandingbalance();
                break;
            case 10:
                return $this->getAmountdue();
                break;
            case 11:
                return $this->getMetermaintenancecharge();
                break;
            case 12:
                return $this->getDiscounts();
                break;
            case 13:
                return $this->getOthercharges();
                break;
            case 14:
                return $this->getPenaltycharges();
                break;
            case 15:
                return $this->getStampdutycharges();
                break;
            case 16:
                return $this->getServicecharges();
                break;
            case 17:
                return $this->getRoutinecharges();
                break;
            case 18:
                return $this->getBillservicerate();
                break;
            case 19:
                return $this->getServicetypedesc();
                break;
            case 20:
                return $this->getBillperiod();
                break;
            case 21:
                return $this->getUsagetype();
                break;
            case 22:
                return $this->getMeternumber();
                break;
            case 23:
                return $this->getMetertype();
                break;
            case 24:
                return $this->getMetercondition();
                break;
            case 25:
                return $this->getLeakagestatus();
                break;
            case 26:
                return $this->getPropertytype();
                break;
            case 27:
                return $this->getMeterreaddevice();
                break;
            case 28:
                return $this->getBillmethod();
                break;
            case 29:
                return $this->getDatecreated();
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

        if (isset($alreadyDumpedObjects['KluBillNew'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['KluBillNew'][$this->hashCode()] = true;
        $keys = KluBillNewTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getUniquekeyid(),
            $keys[1] => $this->getAccountno(),
            $keys[2] => $this->getServicedistrict(),
            $keys[3] => $this->getLastmeterreading(),
            $keys[4] => $this->getCurrentmeterreading(),
            $keys[5] => $this->getUnitsconsumed(),
            $keys[6] => $this->getLastpaydate(),
            $keys[7] => $this->getLastpayamt(),
            $keys[8] => $this->getPriorbalance(),
            $keys[9] => $this->getOutstandingbalance(),
            $keys[10] => $this->getAmountdue(),
            $keys[11] => $this->getMetermaintenancecharge(),
            $keys[12] => $this->getDiscounts(),
            $keys[13] => $this->getOthercharges(),
            $keys[14] => $this->getPenaltycharges(),
            $keys[15] => $this->getStampdutycharges(),
            $keys[16] => $this->getServicecharges(),
            $keys[17] => $this->getRoutinecharges(),
            $keys[18] => $this->getBillservicerate(),
            $keys[19] => $this->getServicetypedesc(),
            $keys[20] => $this->getBillperiod(),
            $keys[21] => $this->getUsagetype(),
            $keys[22] => $this->getMeternumber(),
            $keys[23] => $this->getMetertype(),
            $keys[24] => $this->getMetercondition(),
            $keys[25] => $this->getLeakagestatus(),
            $keys[26] => $this->getPropertytype(),
            $keys[27] => $this->getMeterreaddevice(),
            $keys[28] => $this->getBillmethod(),
            $keys[29] => $this->getDatecreated(),
        );
        if ($result[$keys[29]] instanceof \DateTime) {
            $result[$keys[29]] = $result[$keys[29]]->format('c');
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
     * @return $this|\KluBillNew
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = KluBillNewTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\KluBillNew
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setUniquekeyid($value);
                break;
            case 1:
                $this->setAccountno($value);
                break;
            case 2:
                $this->setServicedistrict($value);
                break;
            case 3:
                $this->setLastmeterreading($value);
                break;
            case 4:
                $this->setCurrentmeterreading($value);
                break;
            case 5:
                $this->setUnitsconsumed($value);
                break;
            case 6:
                $this->setLastpaydate($value);
                break;
            case 7:
                $this->setLastpayamt($value);
                break;
            case 8:
                $this->setPriorbalance($value);
                break;
            case 9:
                $this->setOutstandingbalance($value);
                break;
            case 10:
                $this->setAmountdue($value);
                break;
            case 11:
                $this->setMetermaintenancecharge($value);
                break;
            case 12:
                $this->setDiscounts($value);
                break;
            case 13:
                $this->setOthercharges($value);
                break;
            case 14:
                $this->setPenaltycharges($value);
                break;
            case 15:
                $this->setStampdutycharges($value);
                break;
            case 16:
                $this->setServicecharges($value);
                break;
            case 17:
                $this->setRoutinecharges($value);
                break;
            case 18:
                $this->setBillservicerate($value);
                break;
            case 19:
                $this->setServicetypedesc($value);
                break;
            case 20:
                $this->setBillperiod($value);
                break;
            case 21:
                $this->setUsagetype($value);
                break;
            case 22:
                $this->setMeternumber($value);
                break;
            case 23:
                $this->setMetertype($value);
                break;
            case 24:
                $this->setMetercondition($value);
                break;
            case 25:
                $this->setLeakagestatus($value);
                break;
            case 26:
                $this->setPropertytype($value);
                break;
            case 27:
                $this->setMeterreaddevice($value);
                break;
            case 28:
                $this->setBillmethod($value);
                break;
            case 29:
                $this->setDatecreated($value);
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
        $keys = KluBillNewTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setUniquekeyid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setAccountno($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setServicedistrict($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setLastmeterreading($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCurrentmeterreading($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setUnitsconsumed($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setLastpaydate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLastpayamt($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPriorbalance($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setOutstandingbalance($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setAmountdue($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setMetermaintenancecharge($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDiscounts($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setOthercharges($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setPenaltycharges($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setStampdutycharges($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setServicecharges($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setRoutinecharges($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setBillservicerate($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setServicetypedesc($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setBillperiod($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setUsagetype($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setMeternumber($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setMetertype($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setMetercondition($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setLeakagestatus($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setPropertytype($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setMeterreaddevice($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setBillmethod($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setDatecreated($arr[$keys[29]]);
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
     * @return $this|\KluBillNew The current object, for fluid interface
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
        $criteria = new Criteria(KluBillNewTableMap::DATABASE_NAME);

        if ($this->isColumnModified(KluBillNewTableMap::COL_UNIQUEKEYID)) {
            $criteria->add(KluBillNewTableMap::COL_UNIQUEKEYID, $this->uniquekeyid);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_ACCOUNTNO)) {
            $criteria->add(KluBillNewTableMap::COL_ACCOUNTNO, $this->accountno);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_SERVICEDISTRICT)) {
            $criteria->add(KluBillNewTableMap::COL_SERVICEDISTRICT, $this->servicedistrict);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_LASTMETERREADING)) {
            $criteria->add(KluBillNewTableMap::COL_LASTMETERREADING, $this->lastmeterreading);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_CURRENTMETERREADING)) {
            $criteria->add(KluBillNewTableMap::COL_CURRENTMETERREADING, $this->currentmeterreading);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_UNITSCONSUMED)) {
            $criteria->add(KluBillNewTableMap::COL_UNITSCONSUMED, $this->unitsconsumed);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_LASTPAYDATE)) {
            $criteria->add(KluBillNewTableMap::COL_LASTPAYDATE, $this->lastpaydate);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_LASTPAYAMT)) {
            $criteria->add(KluBillNewTableMap::COL_LASTPAYAMT, $this->lastpayamt);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_PRIORBALANCE)) {
            $criteria->add(KluBillNewTableMap::COL_PRIORBALANCE, $this->priorbalance);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_OUTSTANDINGBALANCE)) {
            $criteria->add(KluBillNewTableMap::COL_OUTSTANDINGBALANCE, $this->outstandingbalance);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_AMOUNTDUE)) {
            $criteria->add(KluBillNewTableMap::COL_AMOUNTDUE, $this->amountdue);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERMAINTENANCECHARGE)) {
            $criteria->add(KluBillNewTableMap::COL_METERMAINTENANCECHARGE, $this->metermaintenancecharge);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_DISCOUNTS)) {
            $criteria->add(KluBillNewTableMap::COL_DISCOUNTS, $this->discounts);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_OTHERCHARGES)) {
            $criteria->add(KluBillNewTableMap::COL_OTHERCHARGES, $this->othercharges);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_PENALTYCHARGES)) {
            $criteria->add(KluBillNewTableMap::COL_PENALTYCHARGES, $this->penaltycharges);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_STAMPDUTYCHARGES)) {
            $criteria->add(KluBillNewTableMap::COL_STAMPDUTYCHARGES, $this->stampdutycharges);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_SERVICECHARGES)) {
            $criteria->add(KluBillNewTableMap::COL_SERVICECHARGES, $this->servicecharges);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_ROUTINECHARGES)) {
            $criteria->add(KluBillNewTableMap::COL_ROUTINECHARGES, $this->routinecharges);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_BILLSERVICERATE)) {
            $criteria->add(KluBillNewTableMap::COL_BILLSERVICERATE, $this->billservicerate);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_SERVICETYPEDESC)) {
            $criteria->add(KluBillNewTableMap::COL_SERVICETYPEDESC, $this->servicetypedesc);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_BILLPERIOD)) {
            $criteria->add(KluBillNewTableMap::COL_BILLPERIOD, $this->billperiod);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_USAGETYPE)) {
            $criteria->add(KluBillNewTableMap::COL_USAGETYPE, $this->usagetype);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERNUMBER)) {
            $criteria->add(KluBillNewTableMap::COL_METERNUMBER, $this->meternumber);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERTYPE)) {
            $criteria->add(KluBillNewTableMap::COL_METERTYPE, $this->metertype);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERCONDITION)) {
            $criteria->add(KluBillNewTableMap::COL_METERCONDITION, $this->metercondition);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_LEAKAGESTATUS)) {
            $criteria->add(KluBillNewTableMap::COL_LEAKAGESTATUS, $this->leakagestatus);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_PROPERTYTYPE)) {
            $criteria->add(KluBillNewTableMap::COL_PROPERTYTYPE, $this->propertytype);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_METERREADDEVICE)) {
            $criteria->add(KluBillNewTableMap::COL_METERREADDEVICE, $this->meterreaddevice);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_BILLMETHOD)) {
            $criteria->add(KluBillNewTableMap::COL_BILLMETHOD, $this->billmethod);
        }
        if ($this->isColumnModified(KluBillNewTableMap::COL_DATECREATED)) {
            $criteria->add(KluBillNewTableMap::COL_DATECREATED, $this->datecreated);
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
        $criteria = ChildKluBillNewQuery::create();
        $criteria->add(KluBillNewTableMap::COL_UNIQUEKEYID, $this->uniquekeyid);

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
        $validPk = null !== $this->getUniquekeyid();

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
        return $this->getUniquekeyid();
    }

    /**
     * Generic method to set the primary key (uniquekeyid column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setUniquekeyid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getUniquekeyid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \KluBillNew (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAccountno($this->getAccountno());
        $copyObj->setServicedistrict($this->getServicedistrict());
        $copyObj->setLastmeterreading($this->getLastmeterreading());
        $copyObj->setCurrentmeterreading($this->getCurrentmeterreading());
        $copyObj->setUnitsconsumed($this->getUnitsconsumed());
        $copyObj->setLastpaydate($this->getLastpaydate());
        $copyObj->setLastpayamt($this->getLastpayamt());
        $copyObj->setPriorbalance($this->getPriorbalance());
        $copyObj->setOutstandingbalance($this->getOutstandingbalance());
        $copyObj->setAmountdue($this->getAmountdue());
        $copyObj->setMetermaintenancecharge($this->getMetermaintenancecharge());
        $copyObj->setDiscounts($this->getDiscounts());
        $copyObj->setOthercharges($this->getOthercharges());
        $copyObj->setPenaltycharges($this->getPenaltycharges());
        $copyObj->setStampdutycharges($this->getStampdutycharges());
        $copyObj->setServicecharges($this->getServicecharges());
        $copyObj->setRoutinecharges($this->getRoutinecharges());
        $copyObj->setBillservicerate($this->getBillservicerate());
        $copyObj->setServicetypedesc($this->getServicetypedesc());
        $copyObj->setBillperiod($this->getBillperiod());
        $copyObj->setUsagetype($this->getUsagetype());
        $copyObj->setMeternumber($this->getMeternumber());
        $copyObj->setMetertype($this->getMetertype());
        $copyObj->setMetercondition($this->getMetercondition());
        $copyObj->setLeakagestatus($this->getLeakagestatus());
        $copyObj->setPropertytype($this->getPropertytype());
        $copyObj->setMeterreaddevice($this->getMeterreaddevice());
        $copyObj->setBillmethod($this->getBillmethod());
        $copyObj->setDatecreated($this->getDatecreated());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setUniquekeyid(NULL); // this is a auto-increment column, so set to default value
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
     * @return \KluBillNew Clone of current object.
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
        $this->uniquekeyid = null;
        $this->accountno = null;
        $this->servicedistrict = null;
        $this->lastmeterreading = null;
        $this->currentmeterreading = null;
        $this->unitsconsumed = null;
        $this->lastpaydate = null;
        $this->lastpayamt = null;
        $this->priorbalance = null;
        $this->outstandingbalance = null;
        $this->amountdue = null;
        $this->metermaintenancecharge = null;
        $this->discounts = null;
        $this->othercharges = null;
        $this->penaltycharges = null;
        $this->stampdutycharges = null;
        $this->servicecharges = null;
        $this->routinecharges = null;
        $this->billservicerate = null;
        $this->servicetypedesc = null;
        $this->billperiod = null;
        $this->usagetype = null;
        $this->meternumber = null;
        $this->metertype = null;
        $this->metercondition = null;
        $this->leakagestatus = null;
        $this->propertytype = null;
        $this->meterreaddevice = null;
        $this->billmethod = null;
        $this->datecreated = null;
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
        return (string) $this->exportTo(KluBillNewTableMap::DEFAULT_STRING_FORMAT);
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
