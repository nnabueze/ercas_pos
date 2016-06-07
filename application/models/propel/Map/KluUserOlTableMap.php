<?php

namespace Map;

use \KluUserOl;
use \KluUserOlQuery;
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
 * This class defines the structure of the 'klu_user_ol' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class KluUserOlTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.KluUserOlTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'klu_user_ol';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\KluUserOl';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'KluUserOl';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the id field
     */
    const COL_ID = 'klu_user_ol.id';

    /**
     * the column name for the passw field
     */
    const COL_PASSW = 'klu_user_ol.passw';

    /**
     * the column name for the account_no field
     */
    const COL_ACCOUNT_NO = 'klu_user_ol.account_no';

    /**
     * the column name for the customer_name field
     */
    const COL_CUSTOMER_NAME = 'klu_user_ol.customer_name';

    /**
     * the column name for the customer_address field
     */
    const COL_CUSTOMER_ADDRESS = 'klu_user_ol.customer_address';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'klu_user_ol.email';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'klu_user_ol.phone';

    /**
     * the column name for the street field
     */
    const COL_STREET = 'klu_user_ol.street';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'klu_user_ol.city';

    /**
     * the column name for the district field
     */
    const COL_DISTRICT = 'klu_user_ol.district';

    /**
     * the column name for the is_active field
     */
    const COL_IS_ACTIVE = 'klu_user_ol.is_active';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'klu_user_ol.date_added';

    /**
     * the column name for the last_login field
     */
    const COL_LAST_LOGIN = 'klu_user_ol.last_login';

    /**
     * the column name for the created_date field
     */
    const COL_CREATED_DATE = 'klu_user_ol.created_date';

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
        self::TYPE_PHPNAME       => array('Id', 'Passw', 'AccountNo', 'CustomerName', 'CustomerAddress', 'Email', 'Phone', 'Street', 'City', 'District', 'IsActive', 'DateAdded', 'LastLogin', 'CreatedDate', ),
        self::TYPE_CAMELNAME     => array('id', 'passw', 'accountNo', 'customerName', 'customerAddress', 'email', 'phone', 'street', 'city', 'district', 'isActive', 'dateAdded', 'lastLogin', 'createdDate', ),
        self::TYPE_COLNAME       => array(KluUserOlTableMap::COL_ID, KluUserOlTableMap::COL_PASSW, KluUserOlTableMap::COL_ACCOUNT_NO, KluUserOlTableMap::COL_CUSTOMER_NAME, KluUserOlTableMap::COL_CUSTOMER_ADDRESS, KluUserOlTableMap::COL_EMAIL, KluUserOlTableMap::COL_PHONE, KluUserOlTableMap::COL_STREET, KluUserOlTableMap::COL_CITY, KluUserOlTableMap::COL_DISTRICT, KluUserOlTableMap::COL_IS_ACTIVE, KluUserOlTableMap::COL_DATE_ADDED, KluUserOlTableMap::COL_LAST_LOGIN, KluUserOlTableMap::COL_CREATED_DATE, ),
        self::TYPE_FIELDNAME     => array('id', 'passw', 'account_no', 'customer_name', 'customer_address', 'email', 'phone', 'street', 'city', 'district', 'is_active', 'date_added', 'last_login', 'created_date', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Passw' => 1, 'AccountNo' => 2, 'CustomerName' => 3, 'CustomerAddress' => 4, 'Email' => 5, 'Phone' => 6, 'Street' => 7, 'City' => 8, 'District' => 9, 'IsActive' => 10, 'DateAdded' => 11, 'LastLogin' => 12, 'CreatedDate' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'passw' => 1, 'accountNo' => 2, 'customerName' => 3, 'customerAddress' => 4, 'email' => 5, 'phone' => 6, 'street' => 7, 'city' => 8, 'district' => 9, 'isActive' => 10, 'dateAdded' => 11, 'lastLogin' => 12, 'createdDate' => 13, ),
        self::TYPE_COLNAME       => array(KluUserOlTableMap::COL_ID => 0, KluUserOlTableMap::COL_PASSW => 1, KluUserOlTableMap::COL_ACCOUNT_NO => 2, KluUserOlTableMap::COL_CUSTOMER_NAME => 3, KluUserOlTableMap::COL_CUSTOMER_ADDRESS => 4, KluUserOlTableMap::COL_EMAIL => 5, KluUserOlTableMap::COL_PHONE => 6, KluUserOlTableMap::COL_STREET => 7, KluUserOlTableMap::COL_CITY => 8, KluUserOlTableMap::COL_DISTRICT => 9, KluUserOlTableMap::COL_IS_ACTIVE => 10, KluUserOlTableMap::COL_DATE_ADDED => 11, KluUserOlTableMap::COL_LAST_LOGIN => 12, KluUserOlTableMap::COL_CREATED_DATE => 13, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'passw' => 1, 'account_no' => 2, 'customer_name' => 3, 'customer_address' => 4, 'email' => 5, 'phone' => 6, 'street' => 7, 'city' => 8, 'district' => 9, 'is_active' => 10, 'date_added' => 11, 'last_login' => 12, 'created_date' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $this->setName('klu_user_ol');
        $this->setPhpName('KluUserOl');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\KluUserOl');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('passw', 'Passw', 'VARCHAR', true, 200, null);
        $this->addColumn('account_no', 'AccountNo', 'VARCHAR', true, 50, null);
        $this->addColumn('customer_name', 'CustomerName', 'VARCHAR', true, 150, null);
        $this->addColumn('customer_address', 'CustomerAddress', 'VARCHAR', true, 150, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 100, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 15, null);
        $this->addColumn('street', 'Street', 'VARCHAR', true, 100, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 50, null);
        $this->addColumn('district', 'District', 'VARCHAR', true, 50, null);
        $this->addColumn('is_active', 'IsActive', 'CHAR', true, null, 'Y');
        $this->addColumn('date_added', 'DateAdded', 'TIMESTAMP', true, null, null);
        $this->addColumn('last_login', 'LastLogin', 'TIMESTAMP', true, null, null);
        $this->addColumn('created_date', 'CreatedDate', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
        return $withPrefix ? KluUserOlTableMap::CLASS_DEFAULT : KluUserOlTableMap::OM_CLASS;
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
     * @return array           (KluUserOl object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = KluUserOlTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = KluUserOlTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + KluUserOlTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KluUserOlTableMap::OM_CLASS;
            /** @var KluUserOl $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            KluUserOlTableMap::addInstanceToPool($obj, $key);
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
            $key = KluUserOlTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = KluUserOlTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var KluUserOl $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KluUserOlTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(KluUserOlTableMap::COL_ID);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_PASSW);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_ACCOUNT_NO);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_CUSTOMER_NAME);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_CUSTOMER_ADDRESS);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_EMAIL);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_PHONE);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_STREET);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_CITY);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_DISTRICT);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_IS_ACTIVE);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_LAST_LOGIN);
            $criteria->addSelectColumn(KluUserOlTableMap::COL_CREATED_DATE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.passw');
            $criteria->addSelectColumn($alias . '.account_no');
            $criteria->addSelectColumn($alias . '.customer_name');
            $criteria->addSelectColumn($alias . '.customer_address');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.street');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.district');
            $criteria->addSelectColumn($alias . '.is_active');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.last_login');
            $criteria->addSelectColumn($alias . '.created_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(KluUserOlTableMap::DATABASE_NAME)->getTable(KluUserOlTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(KluUserOlTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(KluUserOlTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new KluUserOlTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a KluUserOl or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or KluUserOl object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(KluUserOlTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \KluUserOl) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KluUserOlTableMap::DATABASE_NAME);
            $criteria->add(KluUserOlTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = KluUserOlQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            KluUserOlTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                KluUserOlTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the klu_user_ol table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return KluUserOlQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a KluUserOl or Criteria object.
     *
     * @param mixed               $criteria Criteria or KluUserOl object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluUserOlTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from KluUserOl object
        }

        if ($criteria->containsKey(KluUserOlTableMap::COL_ID) && $criteria->keyContainsValue(KluUserOlTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.KluUserOlTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = KluUserOlQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // KluUserOlTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
KluUserOlTableMap::buildTableMap();
