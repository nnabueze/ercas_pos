<?php

namespace Map;

use \AdminOtpToken;
use \AdminOtpTokenQuery;
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
 * This class defines the structure of the 'admin_otp_token' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AdminOtpTokenTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AdminOtpTokenTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'admin_otp_token';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AdminOtpToken';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AdminOtpToken';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'admin_otp_token.id';

    /**
     * the column name for the token_code field
     */
    const COL_TOKEN_CODE = 'admin_otp_token.token_code';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'admin_otp_token.user_id';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'admin_otp_token.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'admin_otp_token.updated_at';

    /**
     * the column name for the deleted_at field
     */
    const COL_DELETED_AT = 'admin_otp_token.deleted_at';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'admin_otp_token.status';

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
        self::TYPE_PHPNAME       => array('Id', 'TokenCode', 'UserId', 'CreatedAt', 'UpdatedAt', 'DeletedAt', 'Status', ),
        self::TYPE_CAMELNAME     => array('id', 'tokenCode', 'userId', 'createdAt', 'updatedAt', 'deletedAt', 'status', ),
        self::TYPE_COLNAME       => array(AdminOtpTokenTableMap::COL_ID, AdminOtpTokenTableMap::COL_TOKEN_CODE, AdminOtpTokenTableMap::COL_USER_ID, AdminOtpTokenTableMap::COL_CREATED_AT, AdminOtpTokenTableMap::COL_UPDATED_AT, AdminOtpTokenTableMap::COL_DELETED_AT, AdminOtpTokenTableMap::COL_STATUS, ),
        self::TYPE_FIELDNAME     => array('id', 'token_code', 'user_id', 'created_at', 'updated_at', 'deleted_at', 'status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'TokenCode' => 1, 'UserId' => 2, 'CreatedAt' => 3, 'UpdatedAt' => 4, 'DeletedAt' => 5, 'Status' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'tokenCode' => 1, 'userId' => 2, 'createdAt' => 3, 'updatedAt' => 4, 'deletedAt' => 5, 'status' => 6, ),
        self::TYPE_COLNAME       => array(AdminOtpTokenTableMap::COL_ID => 0, AdminOtpTokenTableMap::COL_TOKEN_CODE => 1, AdminOtpTokenTableMap::COL_USER_ID => 2, AdminOtpTokenTableMap::COL_CREATED_AT => 3, AdminOtpTokenTableMap::COL_UPDATED_AT => 4, AdminOtpTokenTableMap::COL_DELETED_AT => 5, AdminOtpTokenTableMap::COL_STATUS => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'token_code' => 1, 'user_id' => 2, 'created_at' => 3, 'updated_at' => 4, 'deleted_at' => 5, 'status' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('admin_otp_token');
        $this->setPhpName('AdminOtpToken');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\AdminOtpToken');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('token_code', 'TokenCode', 'VARCHAR', false, 200, '');
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, '0000-00-00 00:00:00');
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, '0000-00-00 00:00:00');
        $this->addColumn('deleted_at', 'DeletedAt', 'DATE', false, null, null);
        $this->addColumn('status', 'Status', 'CHAR', false, null, 'USED');
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
        return $withPrefix ? AdminOtpTokenTableMap::CLASS_DEFAULT : AdminOtpTokenTableMap::OM_CLASS;
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
     * @return array           (AdminOtpToken object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AdminOtpTokenTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AdminOtpTokenTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AdminOtpTokenTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AdminOtpTokenTableMap::OM_CLASS;
            /** @var AdminOtpToken $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AdminOtpTokenTableMap::addInstanceToPool($obj, $key);
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
            $key = AdminOtpTokenTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AdminOtpTokenTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AdminOtpToken $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AdminOtpTokenTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AdminOtpTokenTableMap::COL_ID);
            $criteria->addSelectColumn(AdminOtpTokenTableMap::COL_TOKEN_CODE);
            $criteria->addSelectColumn(AdminOtpTokenTableMap::COL_USER_ID);
            $criteria->addSelectColumn(AdminOtpTokenTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(AdminOtpTokenTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(AdminOtpTokenTableMap::COL_DELETED_AT);
            $criteria->addSelectColumn(AdminOtpTokenTableMap::COL_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.token_code');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.deleted_at');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(AdminOtpTokenTableMap::DATABASE_NAME)->getTable(AdminOtpTokenTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AdminOtpTokenTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AdminOtpTokenTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AdminOtpTokenTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AdminOtpToken or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AdminOtpToken object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AdminOtpTokenTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AdminOtpToken) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AdminOtpTokenTableMap::DATABASE_NAME);
            $criteria->add(AdminOtpTokenTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AdminOtpTokenQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AdminOtpTokenTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AdminOtpTokenTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the admin_otp_token table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AdminOtpTokenQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AdminOtpToken or Criteria object.
     *
     * @param mixed               $criteria Criteria or AdminOtpToken object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdminOtpTokenTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AdminOtpToken object
        }

        if ($criteria->containsKey(AdminOtpTokenTableMap::COL_ID) && $criteria->keyContainsValue(AdminOtpTokenTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AdminOtpTokenTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AdminOtpTokenQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AdminOtpTokenTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AdminOtpTokenTableMap::buildTableMap();
