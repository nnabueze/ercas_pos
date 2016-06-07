<?php

namespace Map;

use \Logs;
use \LogsQuery;
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
 * This class defines the structure of the 'logs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class LogsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.LogsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'logs';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Logs';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Logs';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'logs.id';

    /**
     * the column name for the uri field
     */
    const COL_URI = 'logs.uri';

    /**
     * the column name for the method field
     */
    const COL_METHOD = 'logs.method';

    /**
     * the column name for the params field
     */
    const COL_PARAMS = 'logs.params';

    /**
     * the column name for the api_key field
     */
    const COL_API_KEY = 'logs.api_key';

    /**
     * the column name for the ip_address field
     */
    const COL_IP_ADDRESS = 'logs.ip_address';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'logs.time';

    /**
     * the column name for the rtime field
     */
    const COL_RTIME = 'logs.rtime';

    /**
     * the column name for the authorized field
     */
    const COL_AUTHORIZED = 'logs.authorized';

    /**
     * the column name for the response_code field
     */
    const COL_RESPONSE_CODE = 'logs.response_code';

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
        self::TYPE_PHPNAME       => array('Id', 'Uri', 'Method', 'Params', 'ApiKey', 'IpAddress', 'Time', 'Rtime', 'Authorized', 'ResponseCode', ),
        self::TYPE_CAMELNAME     => array('id', 'uri', 'method', 'params', 'apiKey', 'ipAddress', 'time', 'rtime', 'authorized', 'responseCode', ),
        self::TYPE_COLNAME       => array(LogsTableMap::COL_ID, LogsTableMap::COL_URI, LogsTableMap::COL_METHOD, LogsTableMap::COL_PARAMS, LogsTableMap::COL_API_KEY, LogsTableMap::COL_IP_ADDRESS, LogsTableMap::COL_TIME, LogsTableMap::COL_RTIME, LogsTableMap::COL_AUTHORIZED, LogsTableMap::COL_RESPONSE_CODE, ),
        self::TYPE_FIELDNAME     => array('id', 'uri', 'method', 'params', 'api_key', 'ip_address', 'time', 'rtime', 'authorized', 'response_code', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Uri' => 1, 'Method' => 2, 'Params' => 3, 'ApiKey' => 4, 'IpAddress' => 5, 'Time' => 6, 'Rtime' => 7, 'Authorized' => 8, 'ResponseCode' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'uri' => 1, 'method' => 2, 'params' => 3, 'apiKey' => 4, 'ipAddress' => 5, 'time' => 6, 'rtime' => 7, 'authorized' => 8, 'responseCode' => 9, ),
        self::TYPE_COLNAME       => array(LogsTableMap::COL_ID => 0, LogsTableMap::COL_URI => 1, LogsTableMap::COL_METHOD => 2, LogsTableMap::COL_PARAMS => 3, LogsTableMap::COL_API_KEY => 4, LogsTableMap::COL_IP_ADDRESS => 5, LogsTableMap::COL_TIME => 6, LogsTableMap::COL_RTIME => 7, LogsTableMap::COL_AUTHORIZED => 8, LogsTableMap::COL_RESPONSE_CODE => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'uri' => 1, 'method' => 2, 'params' => 3, 'api_key' => 4, 'ip_address' => 5, 'time' => 6, 'rtime' => 7, 'authorized' => 8, 'response_code' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('logs');
        $this->setPhpName('Logs');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Logs');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('uri', 'Uri', 'VARCHAR', true, 255, null);
        $this->addColumn('method', 'Method', 'VARCHAR', true, 6, null);
        $this->addColumn('params', 'Params', 'LONGVARCHAR', false, null, null);
        $this->addColumn('api_key', 'ApiKey', 'VARCHAR', true, 40, null);
        $this->addColumn('ip_address', 'IpAddress', 'VARCHAR', true, 45, null);
        $this->addColumn('time', 'Time', 'INTEGER', true, null, null);
        $this->addColumn('rtime', 'Rtime', 'FLOAT', false, null, null);
        $this->addColumn('authorized', 'Authorized', 'BOOLEAN', true, 1, null);
        $this->addColumn('response_code', 'ResponseCode', 'SMALLINT', true, 3, null);
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
        return $withPrefix ? LogsTableMap::CLASS_DEFAULT : LogsTableMap::OM_CLASS;
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
     * @return array           (Logs object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = LogsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = LogsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + LogsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LogsTableMap::OM_CLASS;
            /** @var Logs $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            LogsTableMap::addInstanceToPool($obj, $key);
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
            $key = LogsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = LogsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Logs $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LogsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(LogsTableMap::COL_ID);
            $criteria->addSelectColumn(LogsTableMap::COL_URI);
            $criteria->addSelectColumn(LogsTableMap::COL_METHOD);
            $criteria->addSelectColumn(LogsTableMap::COL_PARAMS);
            $criteria->addSelectColumn(LogsTableMap::COL_API_KEY);
            $criteria->addSelectColumn(LogsTableMap::COL_IP_ADDRESS);
            $criteria->addSelectColumn(LogsTableMap::COL_TIME);
            $criteria->addSelectColumn(LogsTableMap::COL_RTIME);
            $criteria->addSelectColumn(LogsTableMap::COL_AUTHORIZED);
            $criteria->addSelectColumn(LogsTableMap::COL_RESPONSE_CODE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.uri');
            $criteria->addSelectColumn($alias . '.method');
            $criteria->addSelectColumn($alias . '.params');
            $criteria->addSelectColumn($alias . '.api_key');
            $criteria->addSelectColumn($alias . '.ip_address');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.rtime');
            $criteria->addSelectColumn($alias . '.authorized');
            $criteria->addSelectColumn($alias . '.response_code');
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
        return Propel::getServiceContainer()->getDatabaseMap(LogsTableMap::DATABASE_NAME)->getTable(LogsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(LogsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(LogsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new LogsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Logs or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Logs object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(LogsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Logs) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LogsTableMap::DATABASE_NAME);
            $criteria->add(LogsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = LogsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            LogsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                LogsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the logs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return LogsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Logs or Criteria object.
     *
     * @param mixed               $criteria Criteria or Logs object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LogsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Logs object
        }

        if ($criteria->containsKey(LogsTableMap::COL_ID) && $criteria->keyContainsValue(LogsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.LogsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = LogsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // LogsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
LogsTableMap::buildTableMap();
