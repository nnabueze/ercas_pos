<?php

namespace Map;

use \UsersKeys;
use \UsersKeysQuery;
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
 * This class defines the structure of the 'users_keys' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UsersKeysTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UsersKeysTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'users_keys';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\UsersKeys';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'UsersKeys';

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
     * the column name for the id field
     */
    const COL_ID = 'users_keys.id';

    /**
     * the column name for the api_key field
     */
    const COL_API_KEY = 'users_keys.api_key';

    /**
     * the column name for the secret_key field
     */
    const COL_SECRET_KEY = 'users_keys.secret_key';

    /**
     * the column name for the level field
     */
    const COL_LEVEL = 'users_keys.level';

    /**
     * the column name for the ignore_limits field
     */
    const COL_IGNORE_LIMITS = 'users_keys.ignore_limits';

    /**
     * the column name for the is_private_key field
     */
    const COL_IS_PRIVATE_KEY = 'users_keys.is_private_key';

    /**
     * the column name for the ip_addresses field
     */
    const COL_IP_ADDRESSES = 'users_keys.ip_addresses';

    /**
     * the column name for the date_created field
     */
    const COL_DATE_CREATED = 'users_keys.date_created';

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
        self::TYPE_PHPNAME       => array('Id', 'ApiKey', 'SecretKey', 'Level', 'IgnoreLimits', 'IsPrivateKey', 'IpAddresses', 'DateCreated', ),
        self::TYPE_CAMELNAME     => array('id', 'apiKey', 'secretKey', 'level', 'ignoreLimits', 'isPrivateKey', 'ipAddresses', 'dateCreated', ),
        self::TYPE_COLNAME       => array(UsersKeysTableMap::COL_ID, UsersKeysTableMap::COL_API_KEY, UsersKeysTableMap::COL_SECRET_KEY, UsersKeysTableMap::COL_LEVEL, UsersKeysTableMap::COL_IGNORE_LIMITS, UsersKeysTableMap::COL_IS_PRIVATE_KEY, UsersKeysTableMap::COL_IP_ADDRESSES, UsersKeysTableMap::COL_DATE_CREATED, ),
        self::TYPE_FIELDNAME     => array('id', 'api_key', 'secret_key', 'level', 'ignore_limits', 'is_private_key', 'ip_addresses', 'date_created', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ApiKey' => 1, 'SecretKey' => 2, 'Level' => 3, 'IgnoreLimits' => 4, 'IsPrivateKey' => 5, 'IpAddresses' => 6, 'DateCreated' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'apiKey' => 1, 'secretKey' => 2, 'level' => 3, 'ignoreLimits' => 4, 'isPrivateKey' => 5, 'ipAddresses' => 6, 'dateCreated' => 7, ),
        self::TYPE_COLNAME       => array(UsersKeysTableMap::COL_ID => 0, UsersKeysTableMap::COL_API_KEY => 1, UsersKeysTableMap::COL_SECRET_KEY => 2, UsersKeysTableMap::COL_LEVEL => 3, UsersKeysTableMap::COL_IGNORE_LIMITS => 4, UsersKeysTableMap::COL_IS_PRIVATE_KEY => 5, UsersKeysTableMap::COL_IP_ADDRESSES => 6, UsersKeysTableMap::COL_DATE_CREATED => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'api_key' => 1, 'secret_key' => 2, 'level' => 3, 'ignore_limits' => 4, 'is_private_key' => 5, 'ip_addresses' => 6, 'date_created' => 7, ),
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
        $this->setName('users_keys');
        $this->setPhpName('UsersKeys');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\UsersKeys');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('api_key', 'ApiKey', 'VARCHAR', true, 40, null);
        $this->addColumn('secret_key', 'SecretKey', 'VARCHAR', true, 256, null);
        $this->addColumn('level', 'Level', 'INTEGER', true, 2, null);
        $this->addColumn('ignore_limits', 'IgnoreLimits', 'BOOLEAN', true, 1, false);
        $this->addColumn('is_private_key', 'IsPrivateKey', 'BOOLEAN', true, 1, false);
        $this->addColumn('ip_addresses', 'IpAddresses', 'LONGVARCHAR', false, null, null);
        $this->addColumn('date_created', 'DateCreated', 'INTEGER', true, null, null);
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
        return $withPrefix ? UsersKeysTableMap::CLASS_DEFAULT : UsersKeysTableMap::OM_CLASS;
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
     * @return array           (UsersKeys object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UsersKeysTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UsersKeysTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UsersKeysTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsersKeysTableMap::OM_CLASS;
            /** @var UsersKeys $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UsersKeysTableMap::addInstanceToPool($obj, $key);
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
            $key = UsersKeysTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UsersKeysTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var UsersKeys $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsersKeysTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UsersKeysTableMap::COL_ID);
            $criteria->addSelectColumn(UsersKeysTableMap::COL_API_KEY);
            $criteria->addSelectColumn(UsersKeysTableMap::COL_SECRET_KEY);
            $criteria->addSelectColumn(UsersKeysTableMap::COL_LEVEL);
            $criteria->addSelectColumn(UsersKeysTableMap::COL_IGNORE_LIMITS);
            $criteria->addSelectColumn(UsersKeysTableMap::COL_IS_PRIVATE_KEY);
            $criteria->addSelectColumn(UsersKeysTableMap::COL_IP_ADDRESSES);
            $criteria->addSelectColumn(UsersKeysTableMap::COL_DATE_CREATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.api_key');
            $criteria->addSelectColumn($alias . '.secret_key');
            $criteria->addSelectColumn($alias . '.level');
            $criteria->addSelectColumn($alias . '.ignore_limits');
            $criteria->addSelectColumn($alias . '.is_private_key');
            $criteria->addSelectColumn($alias . '.ip_addresses');
            $criteria->addSelectColumn($alias . '.date_created');
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
        return Propel::getServiceContainer()->getDatabaseMap(UsersKeysTableMap::DATABASE_NAME)->getTable(UsersKeysTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UsersKeysTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UsersKeysTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UsersKeysTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a UsersKeys or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or UsersKeys object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersKeysTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \UsersKeys) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsersKeysTableMap::DATABASE_NAME);
            $criteria->add(UsersKeysTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = UsersKeysQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UsersKeysTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UsersKeysTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the users_keys table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UsersKeysQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a UsersKeys or Criteria object.
     *
     * @param mixed               $criteria Criteria or UsersKeys object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersKeysTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from UsersKeys object
        }

        if ($criteria->containsKey(UsersKeysTableMap::COL_ID) && $criteria->keyContainsValue(UsersKeysTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsersKeysTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = UsersKeysQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UsersKeysTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UsersKeysTableMap::buildTableMap();
