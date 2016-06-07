<?php

namespace Map;

use \Accountbalance;
use \AccountbalanceQuery;
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
 * This class defines the structure of the 'accountbalance' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AccountbalanceTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AccountbalanceTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'accountbalance';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Accountbalance';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Accountbalance';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the Account_id field
     */
    const COL_ACCOUNT_ID = 'accountbalance.Account_id';

    /**
     * the column name for the Starting_balance field
     */
    const COL_STARTING_BALANCE = 'accountbalance.Starting_balance';

    /**
     * the column name for the Starting_date field
     */
    const COL_STARTING_DATE = 'accountbalance.Starting_date';

    /**
     * the column name for the Lastaccount_balance field
     */
    const COL_LASTACCOUNT_BALANCE = 'accountbalance.Lastaccount_balance';

    /**
     * the column name for the paymenttransaction_id field
     */
    const COL_PAYMENTTRANSACTION_ID = 'accountbalance.paymenttransaction_id';

    /**
     * the column name for the payment_amount field
     */
    const COL_PAYMENT_AMOUNT = 'accountbalance.payment_amount';

    /**
     * the column name for the payment_date field
     */
    const COL_PAYMENT_DATE = 'accountbalance.payment_date';

    /**
     * the column name for the Current_balance field
     */
    const COL_CURRENT_BALANCE = 'accountbalance.Current_balance';

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
        self::TYPE_PHPNAME       => array('AccountId', 'StartingBalance', 'StartingDate', 'LastaccountBalance', 'PaymenttransactionId', 'PaymentAmount', 'PaymentDate', 'CurrentBalance', ),
        self::TYPE_CAMELNAME     => array('accountId', 'startingBalance', 'startingDate', 'lastaccountBalance', 'paymenttransactionId', 'paymentAmount', 'paymentDate', 'currentBalance', ),
        self::TYPE_COLNAME       => array(AccountbalanceTableMap::COL_ACCOUNT_ID, AccountbalanceTableMap::COL_STARTING_BALANCE, AccountbalanceTableMap::COL_STARTING_DATE, AccountbalanceTableMap::COL_LASTACCOUNT_BALANCE, AccountbalanceTableMap::COL_PAYMENTTRANSACTION_ID, AccountbalanceTableMap::COL_PAYMENT_AMOUNT, AccountbalanceTableMap::COL_PAYMENT_DATE, AccountbalanceTableMap::COL_CURRENT_BALANCE, ),
        self::TYPE_FIELDNAME     => array('Account_id', 'Starting_balance', 'Starting_date', 'Lastaccount_balance', 'paymenttransaction_id', 'payment_amount', 'payment_date', 'Current_balance', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('AccountId' => 0, 'StartingBalance' => 1, 'StartingDate' => 2, 'LastaccountBalance' => 3, 'PaymenttransactionId' => 4, 'PaymentAmount' => 5, 'PaymentDate' => 6, 'CurrentBalance' => 7, ),
        self::TYPE_CAMELNAME     => array('accountId' => 0, 'startingBalance' => 1, 'startingDate' => 2, 'lastaccountBalance' => 3, 'paymenttransactionId' => 4, 'paymentAmount' => 5, 'paymentDate' => 6, 'currentBalance' => 7, ),
        self::TYPE_COLNAME       => array(AccountbalanceTableMap::COL_ACCOUNT_ID => 0, AccountbalanceTableMap::COL_STARTING_BALANCE => 1, AccountbalanceTableMap::COL_STARTING_DATE => 2, AccountbalanceTableMap::COL_LASTACCOUNT_BALANCE => 3, AccountbalanceTableMap::COL_PAYMENTTRANSACTION_ID => 4, AccountbalanceTableMap::COL_PAYMENT_AMOUNT => 5, AccountbalanceTableMap::COL_PAYMENT_DATE => 6, AccountbalanceTableMap::COL_CURRENT_BALANCE => 7, ),
        self::TYPE_FIELDNAME     => array('Account_id' => 0, 'Starting_balance' => 1, 'Starting_date' => 2, 'Lastaccount_balance' => 3, 'paymenttransaction_id' => 4, 'payment_amount' => 5, 'payment_date' => 6, 'Current_balance' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('accountbalance');
        $this->setPhpName('Accountbalance');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Accountbalance');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('Account_id', 'AccountId', 'VARCHAR', true, 225, null);
        $this->addColumn('Starting_balance', 'StartingBalance', 'DECIMAL', true, 15, null);
        $this->addColumn('Starting_date', 'StartingDate', 'DATE', true, null, null);
        $this->addColumn('Lastaccount_balance', 'LastaccountBalance', 'DECIMAL', true, 15, null);
        $this->addColumn('paymenttransaction_id', 'PaymenttransactionId', 'VARCHAR', true, 255, null);
        $this->addColumn('payment_amount', 'PaymentAmount', 'INTEGER', true, 15, null);
        $this->addColumn('payment_date', 'PaymentDate', 'DATE', true, null, null);
        $this->addColumn('Current_balance', 'CurrentBalance', 'DECIMAL', true, 15, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccountId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccountId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccountId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccountId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccountId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('AccountId', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('AccountId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AccountbalanceTableMap::CLASS_DEFAULT : AccountbalanceTableMap::OM_CLASS;
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
     * @return array           (Accountbalance object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AccountbalanceTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AccountbalanceTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AccountbalanceTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AccountbalanceTableMap::OM_CLASS;
            /** @var Accountbalance $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AccountbalanceTableMap::addInstanceToPool($obj, $key);
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
            $key = AccountbalanceTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AccountbalanceTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Accountbalance $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AccountbalanceTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AccountbalanceTableMap::COL_ACCOUNT_ID);
            $criteria->addSelectColumn(AccountbalanceTableMap::COL_STARTING_BALANCE);
            $criteria->addSelectColumn(AccountbalanceTableMap::COL_STARTING_DATE);
            $criteria->addSelectColumn(AccountbalanceTableMap::COL_LASTACCOUNT_BALANCE);
            $criteria->addSelectColumn(AccountbalanceTableMap::COL_PAYMENTTRANSACTION_ID);
            $criteria->addSelectColumn(AccountbalanceTableMap::COL_PAYMENT_AMOUNT);
            $criteria->addSelectColumn(AccountbalanceTableMap::COL_PAYMENT_DATE);
            $criteria->addSelectColumn(AccountbalanceTableMap::COL_CURRENT_BALANCE);
        } else {
            $criteria->addSelectColumn($alias . '.Account_id');
            $criteria->addSelectColumn($alias . '.Starting_balance');
            $criteria->addSelectColumn($alias . '.Starting_date');
            $criteria->addSelectColumn($alias . '.Lastaccount_balance');
            $criteria->addSelectColumn($alias . '.paymenttransaction_id');
            $criteria->addSelectColumn($alias . '.payment_amount');
            $criteria->addSelectColumn($alias . '.payment_date');
            $criteria->addSelectColumn($alias . '.Current_balance');
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
        return Propel::getServiceContainer()->getDatabaseMap(AccountbalanceTableMap::DATABASE_NAME)->getTable(AccountbalanceTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AccountbalanceTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AccountbalanceTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AccountbalanceTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Accountbalance or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Accountbalance object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AccountbalanceTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Accountbalance) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AccountbalanceTableMap::DATABASE_NAME);
            $criteria->add(AccountbalanceTableMap::COL_ACCOUNT_ID, (array) $values, Criteria::IN);
        }

        $query = AccountbalanceQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AccountbalanceTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AccountbalanceTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the accountbalance table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AccountbalanceQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Accountbalance or Criteria object.
     *
     * @param mixed               $criteria Criteria or Accountbalance object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AccountbalanceTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Accountbalance object
        }


        // Set the correct dbName
        $query = AccountbalanceQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AccountbalanceTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AccountbalanceTableMap::buildTableMap();
