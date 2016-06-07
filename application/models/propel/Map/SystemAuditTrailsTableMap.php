<?php

namespace Map;

use \SystemAuditTrails;
use \SystemAuditTrailsQuery;
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
 * This class defines the structure of the 'system_audit_trails' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SystemAuditTrailsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SystemAuditTrailsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'system_audit_trails';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\SystemAuditTrails';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'SystemAuditTrails';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'system_audit_trails.id';

    /**
     * the column name for the tbl field
     */
    const COL_TBL = 'system_audit_trails.tbl';

    /**
     * the column name for the tbl_id field
     */
    const COL_TBL_ID = 'system_audit_trails.tbl_id';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'system_audit_trails.user_id';

    /**
     * the column name for the module field
     */
    const COL_MODULE = 'system_audit_trails.module';

    /**
     * the column name for the audit_title field
     */
    const COL_AUDIT_TITLE = 'system_audit_trails.audit_title';

    /**
     * the column name for the audit_description field
     */
    const COL_AUDIT_DESCRIPTION = 'system_audit_trails.audit_description';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'system_audit_trails.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'system_audit_trails.updated_at';

    /**
     * the column name for the deleted_at field
     */
    const COL_DELETED_AT = 'system_audit_trails.deleted_at';

    /**
     * the column name for the priority field
     */
    const COL_PRIORITY = 'system_audit_trails.priority';

    /**
     * the column name for the activity_type field
     */
    const COL_ACTIVITY_TYPE = 'system_audit_trails.activity_type';

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
        self::TYPE_PHPNAME       => array('Id', 'Tbl', 'TblId', 'UserId', 'Module', 'AuditTitle', 'AuditDescription', 'CreatedAt', 'UpdatedAt', 'DeletedAt', 'Priority', 'ActivityType', ),
        self::TYPE_CAMELNAME     => array('id', 'tbl', 'tblId', 'userId', 'module', 'auditTitle', 'auditDescription', 'createdAt', 'updatedAt', 'deletedAt', 'priority', 'activityType', ),
        self::TYPE_COLNAME       => array(SystemAuditTrailsTableMap::COL_ID, SystemAuditTrailsTableMap::COL_TBL, SystemAuditTrailsTableMap::COL_TBL_ID, SystemAuditTrailsTableMap::COL_USER_ID, SystemAuditTrailsTableMap::COL_MODULE, SystemAuditTrailsTableMap::COL_AUDIT_TITLE, SystemAuditTrailsTableMap::COL_AUDIT_DESCRIPTION, SystemAuditTrailsTableMap::COL_CREATED_AT, SystemAuditTrailsTableMap::COL_UPDATED_AT, SystemAuditTrailsTableMap::COL_DELETED_AT, SystemAuditTrailsTableMap::COL_PRIORITY, SystemAuditTrailsTableMap::COL_ACTIVITY_TYPE, ),
        self::TYPE_FIELDNAME     => array('id', 'tbl', 'tbl_id', 'user_id', 'module', 'audit_title', 'audit_description', 'created_at', 'updated_at', 'deleted_at', 'priority', 'activity_type', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Tbl' => 1, 'TblId' => 2, 'UserId' => 3, 'Module' => 4, 'AuditTitle' => 5, 'AuditDescription' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, 'DeletedAt' => 9, 'Priority' => 10, 'ActivityType' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'tbl' => 1, 'tblId' => 2, 'userId' => 3, 'module' => 4, 'auditTitle' => 5, 'auditDescription' => 6, 'createdAt' => 7, 'updatedAt' => 8, 'deletedAt' => 9, 'priority' => 10, 'activityType' => 11, ),
        self::TYPE_COLNAME       => array(SystemAuditTrailsTableMap::COL_ID => 0, SystemAuditTrailsTableMap::COL_TBL => 1, SystemAuditTrailsTableMap::COL_TBL_ID => 2, SystemAuditTrailsTableMap::COL_USER_ID => 3, SystemAuditTrailsTableMap::COL_MODULE => 4, SystemAuditTrailsTableMap::COL_AUDIT_TITLE => 5, SystemAuditTrailsTableMap::COL_AUDIT_DESCRIPTION => 6, SystemAuditTrailsTableMap::COL_CREATED_AT => 7, SystemAuditTrailsTableMap::COL_UPDATED_AT => 8, SystemAuditTrailsTableMap::COL_DELETED_AT => 9, SystemAuditTrailsTableMap::COL_PRIORITY => 10, SystemAuditTrailsTableMap::COL_ACTIVITY_TYPE => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'tbl' => 1, 'tbl_id' => 2, 'user_id' => 3, 'module' => 4, 'audit_title' => 5, 'audit_description' => 6, 'created_at' => 7, 'updated_at' => 8, 'deleted_at' => 9, 'priority' => 10, 'activity_type' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('system_audit_trails');
        $this->setPhpName('SystemAuditTrails');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\SystemAuditTrails');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('tbl', 'Tbl', 'VARCHAR', false, 45, null);
        $this->addColumn('tbl_id', 'TblId', 'INTEGER', false, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
        $this->addColumn('module', 'Module', 'VARCHAR', false, 150, null);
        $this->addColumn('audit_title', 'AuditTitle', 'VARCHAR', false, 250, null);
        $this->addColumn('audit_description', 'AuditDescription', 'CLOB', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('deleted_at', 'DeletedAt', 'DATE', false, null, null);
        $this->addColumn('priority', 'Priority', 'CHAR', false, null, 'MEDIUM');
        $this->addColumn('activity_type', 'ActivityType', 'CHAR', false, null, null);
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
        return $withPrefix ? SystemAuditTrailsTableMap::CLASS_DEFAULT : SystemAuditTrailsTableMap::OM_CLASS;
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
     * @return array           (SystemAuditTrails object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SystemAuditTrailsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SystemAuditTrailsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SystemAuditTrailsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SystemAuditTrailsTableMap::OM_CLASS;
            /** @var SystemAuditTrails $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SystemAuditTrailsTableMap::addInstanceToPool($obj, $key);
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
            $key = SystemAuditTrailsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SystemAuditTrailsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SystemAuditTrails $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SystemAuditTrailsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_ID);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_TBL);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_TBL_ID);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_USER_ID);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_MODULE);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_AUDIT_TITLE);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_AUDIT_DESCRIPTION);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_DELETED_AT);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_PRIORITY);
            $criteria->addSelectColumn(SystemAuditTrailsTableMap::COL_ACTIVITY_TYPE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.tbl');
            $criteria->addSelectColumn($alias . '.tbl_id');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.module');
            $criteria->addSelectColumn($alias . '.audit_title');
            $criteria->addSelectColumn($alias . '.audit_description');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.deleted_at');
            $criteria->addSelectColumn($alias . '.priority');
            $criteria->addSelectColumn($alias . '.activity_type');
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
        return Propel::getServiceContainer()->getDatabaseMap(SystemAuditTrailsTableMap::DATABASE_NAME)->getTable(SystemAuditTrailsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SystemAuditTrailsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SystemAuditTrailsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SystemAuditTrailsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SystemAuditTrails or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SystemAuditTrails object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SystemAuditTrailsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SystemAuditTrails) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SystemAuditTrailsTableMap::DATABASE_NAME);
            $criteria->add(SystemAuditTrailsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SystemAuditTrailsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SystemAuditTrailsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SystemAuditTrailsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the system_audit_trails table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SystemAuditTrailsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SystemAuditTrails or Criteria object.
     *
     * @param mixed               $criteria Criteria or SystemAuditTrails object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SystemAuditTrailsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SystemAuditTrails object
        }

        if ($criteria->containsKey(SystemAuditTrailsTableMap::COL_ID) && $criteria->keyContainsValue(SystemAuditTrailsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SystemAuditTrailsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SystemAuditTrailsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SystemAuditTrailsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SystemAuditTrailsTableMap::buildTableMap();
