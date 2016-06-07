<?php

namespace Base;

use \KluBillMigration as ChildKluBillMigration;
use \KluBillMigrationQuery as ChildKluBillMigrationQuery;
use \Exception;
use \PDO;
use Map\KluBillMigrationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'klu_bill_migration' table.
 *
 *
 *
 * @method     ChildKluBillMigrationQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildKluBillMigrationQuery orderByLastMigratedRecord($order = Criteria::ASC) Order by the last_migrated_record column
 * @method     ChildKluBillMigrationQuery orderByLastMigrationDatetime($order = Criteria::ASC) Order by the last_migration_datetime column
 * @method     ChildKluBillMigrationQuery orderByMigrationCount($order = Criteria::ASC) Order by the migration_count column
 *
 * @method     ChildKluBillMigrationQuery groupById() Group by the ID column
 * @method     ChildKluBillMigrationQuery groupByLastMigratedRecord() Group by the last_migrated_record column
 * @method     ChildKluBillMigrationQuery groupByLastMigrationDatetime() Group by the last_migration_datetime column
 * @method     ChildKluBillMigrationQuery groupByMigrationCount() Group by the migration_count column
 *
 * @method     ChildKluBillMigrationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKluBillMigrationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKluBillMigrationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKluBillMigrationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildKluBillMigrationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildKluBillMigrationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildKluBillMigration findOne(ConnectionInterface $con = null) Return the first ChildKluBillMigration matching the query
 * @method     ChildKluBillMigration findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKluBillMigration matching the query, or a new ChildKluBillMigration object populated from the query conditions when no match is found
 *
 * @method     ChildKluBillMigration findOneById(int $ID) Return the first ChildKluBillMigration filtered by the ID column
 * @method     ChildKluBillMigration findOneByLastMigratedRecord(int $last_migrated_record) Return the first ChildKluBillMigration filtered by the last_migrated_record column
 * @method     ChildKluBillMigration findOneByLastMigrationDatetime(string $last_migration_datetime) Return the first ChildKluBillMigration filtered by the last_migration_datetime column
 * @method     ChildKluBillMigration findOneByMigrationCount(int $migration_count) Return the first ChildKluBillMigration filtered by the migration_count column *

 * @method     ChildKluBillMigration requirePk($key, ConnectionInterface $con = null) Return the ChildKluBillMigration by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillMigration requireOne(ConnectionInterface $con = null) Return the first ChildKluBillMigration matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluBillMigration requireOneById(int $ID) Return the first ChildKluBillMigration filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillMigration requireOneByLastMigratedRecord(int $last_migrated_record) Return the first ChildKluBillMigration filtered by the last_migrated_record column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillMigration requireOneByLastMigrationDatetime(string $last_migration_datetime) Return the first ChildKluBillMigration filtered by the last_migration_datetime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildKluBillMigration requireOneByMigrationCount(int $migration_count) Return the first ChildKluBillMigration filtered by the migration_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildKluBillMigration[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildKluBillMigration objects based on current ModelCriteria
 * @method     ChildKluBillMigration[]|ObjectCollection findById(int $ID) Return ChildKluBillMigration objects filtered by the ID column
 * @method     ChildKluBillMigration[]|ObjectCollection findByLastMigratedRecord(int $last_migrated_record) Return ChildKluBillMigration objects filtered by the last_migrated_record column
 * @method     ChildKluBillMigration[]|ObjectCollection findByLastMigrationDatetime(string $last_migration_datetime) Return ChildKluBillMigration objects filtered by the last_migration_datetime column
 * @method     ChildKluBillMigration[]|ObjectCollection findByMigrationCount(int $migration_count) Return ChildKluBillMigration objects filtered by the migration_count column
 * @method     ChildKluBillMigration[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class KluBillMigrationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\KluBillMigrationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\KluBillMigration', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKluBillMigrationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKluBillMigrationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildKluBillMigrationQuery) {
            return $criteria;
        }
        $query = new ChildKluBillMigrationQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildKluBillMigration|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KluBillMigrationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = KluBillMigrationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildKluBillMigration A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, last_migrated_record, last_migration_datetime, migration_count FROM klu_bill_migration WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildKluBillMigration $obj */
            $obj = new ChildKluBillMigration();
            $obj->hydrate($row);
            KluBillMigrationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildKluBillMigration|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildKluBillMigrationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KluBillMigrationTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildKluBillMigrationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KluBillMigrationTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE ID = 1234
     * $query->filterById(array(12, 34)); // WHERE ID IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE ID > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillMigrationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KluBillMigrationTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KluBillMigrationTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillMigrationTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the last_migrated_record column
     *
     * Example usage:
     * <code>
     * $query->filterByLastMigratedRecord(1234); // WHERE last_migrated_record = 1234
     * $query->filterByLastMigratedRecord(array(12, 34)); // WHERE last_migrated_record IN (12, 34)
     * $query->filterByLastMigratedRecord(array('min' => 12)); // WHERE last_migrated_record > 12
     * </code>
     *
     * @param     mixed $lastMigratedRecord The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillMigrationQuery The current query, for fluid interface
     */
    public function filterByLastMigratedRecord($lastMigratedRecord = null, $comparison = null)
    {
        if (is_array($lastMigratedRecord)) {
            $useMinMax = false;
            if (isset($lastMigratedRecord['min'])) {
                $this->addUsingAlias(KluBillMigrationTableMap::COL_LAST_MIGRATED_RECORD, $lastMigratedRecord['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastMigratedRecord['max'])) {
                $this->addUsingAlias(KluBillMigrationTableMap::COL_LAST_MIGRATED_RECORD, $lastMigratedRecord['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillMigrationTableMap::COL_LAST_MIGRATED_RECORD, $lastMigratedRecord, $comparison);
    }

    /**
     * Filter the query on the last_migration_datetime column
     *
     * Example usage:
     * <code>
     * $query->filterByLastMigrationDatetime('2011-03-14'); // WHERE last_migration_datetime = '2011-03-14'
     * $query->filterByLastMigrationDatetime('now'); // WHERE last_migration_datetime = '2011-03-14'
     * $query->filterByLastMigrationDatetime(array('max' => 'yesterday')); // WHERE last_migration_datetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastMigrationDatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillMigrationQuery The current query, for fluid interface
     */
    public function filterByLastMigrationDatetime($lastMigrationDatetime = null, $comparison = null)
    {
        if (is_array($lastMigrationDatetime)) {
            $useMinMax = false;
            if (isset($lastMigrationDatetime['min'])) {
                $this->addUsingAlias(KluBillMigrationTableMap::COL_LAST_MIGRATION_DATETIME, $lastMigrationDatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastMigrationDatetime['max'])) {
                $this->addUsingAlias(KluBillMigrationTableMap::COL_LAST_MIGRATION_DATETIME, $lastMigrationDatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillMigrationTableMap::COL_LAST_MIGRATION_DATETIME, $lastMigrationDatetime, $comparison);
    }

    /**
     * Filter the query on the migration_count column
     *
     * Example usage:
     * <code>
     * $query->filterByMigrationCount(1234); // WHERE migration_count = 1234
     * $query->filterByMigrationCount(array(12, 34)); // WHERE migration_count IN (12, 34)
     * $query->filterByMigrationCount(array('min' => 12)); // WHERE migration_count > 12
     * </code>
     *
     * @param     mixed $migrationCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildKluBillMigrationQuery The current query, for fluid interface
     */
    public function filterByMigrationCount($migrationCount = null, $comparison = null)
    {
        if (is_array($migrationCount)) {
            $useMinMax = false;
            if (isset($migrationCount['min'])) {
                $this->addUsingAlias(KluBillMigrationTableMap::COL_MIGRATION_COUNT, $migrationCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($migrationCount['max'])) {
                $this->addUsingAlias(KluBillMigrationTableMap::COL_MIGRATION_COUNT, $migrationCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KluBillMigrationTableMap::COL_MIGRATION_COUNT, $migrationCount, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKluBillMigration $kluBillMigration Object to remove from the list of results
     *
     * @return $this|ChildKluBillMigrationQuery The current query, for fluid interface
     */
    public function prune($kluBillMigration = null)
    {
        if ($kluBillMigration) {
            $this->addUsingAlias(KluBillMigrationTableMap::COL_ID, $kluBillMigration->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the klu_bill_migration table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillMigrationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KluBillMigrationTableMap::clearInstancePool();
            KluBillMigrationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KluBillMigrationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KluBillMigrationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            KluBillMigrationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KluBillMigrationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // KluBillMigrationQuery
