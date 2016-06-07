<?php

namespace Map;

use \PaymentPosOl;
use \PaymentPosOlQuery;
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
 * This class defines the structure of the 'payment_pos_ol' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PaymentPosOlTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PaymentPosOlTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'payment_pos_ol';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\PaymentPosOl';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'PaymentPosOl';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 19;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 19;

    /**
     * the column name for the id field
     */
    const COL_ID = 'payment_pos_ol.id';

    /**
     * the column name for the customer_id field
     */
    const COL_CUSTOMER_ID = 'payment_pos_ol.customer_id';

    /**
     * the column name for the station_id field
     */
    const COL_STATION_ID = 'payment_pos_ol.station_id';

    /**
     * the column name for the customer_name field
     */
    const COL_CUSTOMER_NAME = 'payment_pos_ol.customer_name';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'payment_pos_ol.amount';

    /**
     * the column name for the bill_code field
     */
    const COL_BILL_CODE = 'payment_pos_ol.bill_code';

    /**
     * the column name for the bill_name field
     */
    const COL_BILL_NAME = 'payment_pos_ol.bill_name';

    /**
     * the column name for the bill_category_code field
     */
    const COL_BILL_CATEGORY_CODE = 'payment_pos_ol.bill_category_code';

    /**
     * the column name for the bill_category field
     */
    const COL_BILL_CATEGORY = 'payment_pos_ol.bill_category';

    /**
     * the column name for the month field
     */
    const COL_MONTH = 'payment_pos_ol.month';

    /**
     * the column name for the year field
     */
    const COL_YEAR = 'payment_pos_ol.year';

    /**
     * the column name for the txcode field
     */
    const COL_TXCODE = 'payment_pos_ol.txcode';

    /**
     * the column name for the station field
     */
    const COL_STATION = 'payment_pos_ol.station';

    /**
     * the column name for the operator_code field
     */
    const COL_OPERATOR_CODE = 'payment_pos_ol.operator_code';

    /**
     * the column name for the operator field
     */
    const COL_OPERATOR = 'payment_pos_ol.operator';

    /**
     * the column name for the terminal field
     */
    const COL_TERMINAL = 'payment_pos_ol.terminal';

    /**
     * the column name for the txdate field
     */
    const COL_TXDATE = 'payment_pos_ol.txdate';

    /**
     * the column name for the txtime field
     */
    const COL_TXTIME = 'payment_pos_ol.txtime';

    /**
     * the column name for the current_utc field
     */
    const COL_CURRENT_UTC = 'payment_pos_ol.current_utc';

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
        self::TYPE_PHPNAME       => array('Id', 'CustomerId', 'StationId', 'CustomerName', 'Amount', 'BillCode', 'BillName', 'BillCategoryCode', 'BillCategory', 'Month', 'Year', 'Txcode', 'Station', 'OperatorCode', 'Operator', 'Terminal', 'Txdate', 'Txtime', 'CurrentUtc', ),
        self::TYPE_CAMELNAME     => array('id', 'customerId', 'stationId', 'customerName', 'amount', 'billCode', 'billName', 'billCategoryCode', 'billCategory', 'month', 'year', 'txcode', 'station', 'operatorCode', 'operator', 'terminal', 'txdate', 'txtime', 'currentUtc', ),
        self::TYPE_COLNAME       => array(PaymentPosOlTableMap::COL_ID, PaymentPosOlTableMap::COL_CUSTOMER_ID, PaymentPosOlTableMap::COL_STATION_ID, PaymentPosOlTableMap::COL_CUSTOMER_NAME, PaymentPosOlTableMap::COL_AMOUNT, PaymentPosOlTableMap::COL_BILL_CODE, PaymentPosOlTableMap::COL_BILL_NAME, PaymentPosOlTableMap::COL_BILL_CATEGORY_CODE, PaymentPosOlTableMap::COL_BILL_CATEGORY, PaymentPosOlTableMap::COL_MONTH, PaymentPosOlTableMap::COL_YEAR, PaymentPosOlTableMap::COL_TXCODE, PaymentPosOlTableMap::COL_STATION, PaymentPosOlTableMap::COL_OPERATOR_CODE, PaymentPosOlTableMap::COL_OPERATOR, PaymentPosOlTableMap::COL_TERMINAL, PaymentPosOlTableMap::COL_TXDATE, PaymentPosOlTableMap::COL_TXTIME, PaymentPosOlTableMap::COL_CURRENT_UTC, ),
        self::TYPE_FIELDNAME     => array('id', 'customer_id', 'station_id', 'customer_name', 'amount', 'bill_code', 'bill_name', 'bill_category_code', 'bill_category', 'month', 'year', 'txcode', 'station', 'operator_code', 'operator', 'terminal', 'txdate', 'txtime', 'current_utc', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'CustomerId' => 1, 'StationId' => 2, 'CustomerName' => 3, 'Amount' => 4, 'BillCode' => 5, 'BillName' => 6, 'BillCategoryCode' => 7, 'BillCategory' => 8, 'Month' => 9, 'Year' => 10, 'Txcode' => 11, 'Station' => 12, 'OperatorCode' => 13, 'Operator' => 14, 'Terminal' => 15, 'Txdate' => 16, 'Txtime' => 17, 'CurrentUtc' => 18, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'customerId' => 1, 'stationId' => 2, 'customerName' => 3, 'amount' => 4, 'billCode' => 5, 'billName' => 6, 'billCategoryCode' => 7, 'billCategory' => 8, 'month' => 9, 'year' => 10, 'txcode' => 11, 'station' => 12, 'operatorCode' => 13, 'operator' => 14, 'terminal' => 15, 'txdate' => 16, 'txtime' => 17, 'currentUtc' => 18, ),
        self::TYPE_COLNAME       => array(PaymentPosOlTableMap::COL_ID => 0, PaymentPosOlTableMap::COL_CUSTOMER_ID => 1, PaymentPosOlTableMap::COL_STATION_ID => 2, PaymentPosOlTableMap::COL_CUSTOMER_NAME => 3, PaymentPosOlTableMap::COL_AMOUNT => 4, PaymentPosOlTableMap::COL_BILL_CODE => 5, PaymentPosOlTableMap::COL_BILL_NAME => 6, PaymentPosOlTableMap::COL_BILL_CATEGORY_CODE => 7, PaymentPosOlTableMap::COL_BILL_CATEGORY => 8, PaymentPosOlTableMap::COL_MONTH => 9, PaymentPosOlTableMap::COL_YEAR => 10, PaymentPosOlTableMap::COL_TXCODE => 11, PaymentPosOlTableMap::COL_STATION => 12, PaymentPosOlTableMap::COL_OPERATOR_CODE => 13, PaymentPosOlTableMap::COL_OPERATOR => 14, PaymentPosOlTableMap::COL_TERMINAL => 15, PaymentPosOlTableMap::COL_TXDATE => 16, PaymentPosOlTableMap::COL_TXTIME => 17, PaymentPosOlTableMap::COL_CURRENT_UTC => 18, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'customer_id' => 1, 'station_id' => 2, 'customer_name' => 3, 'amount' => 4, 'bill_code' => 5, 'bill_name' => 6, 'bill_category_code' => 7, 'bill_category' => 8, 'month' => 9, 'year' => 10, 'txcode' => 11, 'station' => 12, 'operator_code' => 13, 'operator' => 14, 'terminal' => 15, 'txdate' => 16, 'txtime' => 17, 'current_utc' => 18, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $this->setName('payment_pos_ol');
        $this->setPhpName('PaymentPosOl');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\PaymentPosOl');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('customer_id', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('station_id', 'StationId', 'INTEGER', true, null, null);
        $this->addColumn('customer_name', 'CustomerName', 'VARCHAR', true, 100, null);
        $this->addColumn('amount', 'Amount', 'VARCHAR', true, 50, null);
        $this->addColumn('bill_code', 'BillCode', 'VARCHAR', true, 64, null);
        $this->addColumn('bill_name', 'BillName', 'VARCHAR', true, 60, null);
        $this->addColumn('bill_category_code', 'BillCategoryCode', 'VARCHAR', true, 64, null);
        $this->addColumn('bill_category', 'BillCategory', 'VARCHAR', true, 64, null);
        $this->addColumn('month', 'Month', 'VARCHAR', true, 20, null);
        $this->addColumn('year', 'Year', 'VARCHAR', true, 20, null);
        $this->addColumn('txcode', 'Txcode', 'VARCHAR', true, 64, null);
        $this->addColumn('station', 'Station', 'VARCHAR', true, 50, null);
        $this->addColumn('operator_code', 'OperatorCode', 'VARCHAR', true, 64, null);
        $this->addColumn('operator', 'Operator', 'VARCHAR', true, 50, null);
        $this->addColumn('terminal', 'Terminal', 'VARCHAR', true, 64, null);
        $this->addColumn('txdate', 'Txdate', 'VARCHAR', true, 60, null);
        $this->addColumn('txtime', 'Txtime', 'VARCHAR', true, 60, null);
        $this->addColumn('current_utc', 'CurrentUtc', 'VARCHAR', true, 50, null);
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
        return $withPrefix ? PaymentPosOlTableMap::CLASS_DEFAULT : PaymentPosOlTableMap::OM_CLASS;
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
     * @return array           (PaymentPosOl object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PaymentPosOlTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PaymentPosOlTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PaymentPosOlTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PaymentPosOlTableMap::OM_CLASS;
            /** @var PaymentPosOl $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PaymentPosOlTableMap::addInstanceToPool($obj, $key);
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
            $key = PaymentPosOlTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PaymentPosOlTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PaymentPosOl $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PaymentPosOlTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_ID);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_CUSTOMER_ID);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_STATION_ID);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_CUSTOMER_NAME);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_BILL_CODE);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_BILL_NAME);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_BILL_CATEGORY_CODE);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_BILL_CATEGORY);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_MONTH);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_YEAR);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_TXCODE);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_STATION);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_OPERATOR_CODE);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_OPERATOR);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_TERMINAL);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_TXDATE);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_TXTIME);
            $criteria->addSelectColumn(PaymentPosOlTableMap::COL_CURRENT_UTC);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.customer_id');
            $criteria->addSelectColumn($alias . '.station_id');
            $criteria->addSelectColumn($alias . '.customer_name');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.bill_code');
            $criteria->addSelectColumn($alias . '.bill_name');
            $criteria->addSelectColumn($alias . '.bill_category_code');
            $criteria->addSelectColumn($alias . '.bill_category');
            $criteria->addSelectColumn($alias . '.month');
            $criteria->addSelectColumn($alias . '.year');
            $criteria->addSelectColumn($alias . '.txcode');
            $criteria->addSelectColumn($alias . '.station');
            $criteria->addSelectColumn($alias . '.operator_code');
            $criteria->addSelectColumn($alias . '.operator');
            $criteria->addSelectColumn($alias . '.terminal');
            $criteria->addSelectColumn($alias . '.txdate');
            $criteria->addSelectColumn($alias . '.txtime');
            $criteria->addSelectColumn($alias . '.current_utc');
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
        return Propel::getServiceContainer()->getDatabaseMap(PaymentPosOlTableMap::DATABASE_NAME)->getTable(PaymentPosOlTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PaymentPosOlTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PaymentPosOlTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PaymentPosOlTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PaymentPosOl or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PaymentPosOl object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentPosOlTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \PaymentPosOl) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PaymentPosOlTableMap::DATABASE_NAME);
            $criteria->add(PaymentPosOlTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PaymentPosOlQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PaymentPosOlTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PaymentPosOlTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the payment_pos_ol table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PaymentPosOlQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PaymentPosOl or Criteria object.
     *
     * @param mixed               $criteria Criteria or PaymentPosOl object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentPosOlTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PaymentPosOl object
        }

        if ($criteria->containsKey(PaymentPosOlTableMap::COL_ID) && $criteria->keyContainsValue(PaymentPosOlTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PaymentPosOlTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PaymentPosOlQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PaymentPosOlTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PaymentPosOlTableMap::buildTableMap();
