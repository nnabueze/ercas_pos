<?php

namespace Base;

use \SystemAuditTrails as ChildSystemAuditTrails;
use \SystemAuditTrailsQuery as ChildSystemAuditTrailsQuery;
use \Exception;
use \PDO;
use Map\SystemAuditTrailsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'system_audit_trails' table.
 *
 *
 *
 * @method     ChildSystemAuditTrailsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSystemAuditTrailsQuery orderByTbl($order = Criteria::ASC) Order by the tbl column
 * @method     ChildSystemAuditTrailsQuery orderByTblId($order = Criteria::ASC) Order by the tbl_id column
 * @method     ChildSystemAuditTrailsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildSystemAuditTrailsQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method     ChildSystemAuditTrailsQuery orderByAuditTitle($order = Criteria::ASC) Order by the audit_title column
 * @method     ChildSystemAuditTrailsQuery orderByAuditDescription($order = Criteria::ASC) Order by the audit_description column
 * @method     ChildSystemAuditTrailsQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSystemAuditTrailsQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildSystemAuditTrailsQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 * @method     ChildSystemAuditTrailsQuery orderByPriority($order = Criteria::ASC) Order by the priority column
 * @method     ChildSystemAuditTrailsQuery orderByActivityType($order = Criteria::ASC) Order by the activity_type column
 *
 * @method     ChildSystemAuditTrailsQuery groupById() Group by the id column
 * @method     ChildSystemAuditTrailsQuery groupByTbl() Group by the tbl column
 * @method     ChildSystemAuditTrailsQuery groupByTblId() Group by the tbl_id column
 * @method     ChildSystemAuditTrailsQuery groupByUserId() Group by the user_id column
 * @method     ChildSystemAuditTrailsQuery groupByModule() Group by the module column
 * @method     ChildSystemAuditTrailsQuery groupByAuditTitle() Group by the audit_title column
 * @method     ChildSystemAuditTrailsQuery groupByAuditDescription() Group by the audit_description column
 * @method     ChildSystemAuditTrailsQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSystemAuditTrailsQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildSystemAuditTrailsQuery groupByDeletedAt() Group by the deleted_at column
 * @method     ChildSystemAuditTrailsQuery groupByPriority() Group by the priority column
 * @method     ChildSystemAuditTrailsQuery groupByActivityType() Group by the activity_type column
 *
 * @method     ChildSystemAuditTrailsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSystemAuditTrailsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSystemAuditTrailsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSystemAuditTrailsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSystemAuditTrailsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSystemAuditTrailsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSystemAuditTrails findOne(ConnectionInterface $con = null) Return the first ChildSystemAuditTrails matching the query
 * @method     ChildSystemAuditTrails findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSystemAuditTrails matching the query, or a new ChildSystemAuditTrails object populated from the query conditions when no match is found
 *
 * @method     ChildSystemAuditTrails findOneById(int $id) Return the first ChildSystemAuditTrails filtered by the id column
 * @method     ChildSystemAuditTrails findOneByTbl(string $tbl) Return the first ChildSystemAuditTrails filtered by the tbl column
 * @method     ChildSystemAuditTrails findOneByTblId(int $tbl_id) Return the first ChildSystemAuditTrails filtered by the tbl_id column
 * @method     ChildSystemAuditTrails findOneByUserId(int $user_id) Return the first ChildSystemAuditTrails filtered by the user_id column
 * @method     ChildSystemAuditTrails findOneByModule(string $module) Return the first ChildSystemAuditTrails filtered by the module column
 * @method     ChildSystemAuditTrails findOneByAuditTitle(string $audit_title) Return the first ChildSystemAuditTrails filtered by the audit_title column
 * @method     ChildSystemAuditTrails findOneByAuditDescription(string $audit_description) Return the first ChildSystemAuditTrails filtered by the audit_description column
 * @method     ChildSystemAuditTrails findOneByCreatedAt(string $created_at) Return the first ChildSystemAuditTrails filtered by the created_at column
 * @method     ChildSystemAuditTrails findOneByUpdatedAt(string $updated_at) Return the first ChildSystemAuditTrails filtered by the updated_at column
 * @method     ChildSystemAuditTrails findOneByDeletedAt(string $deleted_at) Return the first ChildSystemAuditTrails filtered by the deleted_at column
 * @method     ChildSystemAuditTrails findOneByPriority(string $priority) Return the first ChildSystemAuditTrails filtered by the priority column
 * @method     ChildSystemAuditTrails findOneByActivityType(string $activity_type) Return the first ChildSystemAuditTrails filtered by the activity_type column *

 * @method     ChildSystemAuditTrails requirePk($key, ConnectionInterface $con = null) Return the ChildSystemAuditTrails by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOne(ConnectionInterface $con = null) Return the first ChildSystemAuditTrails matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSystemAuditTrails requireOneById(int $id) Return the first ChildSystemAuditTrails filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByTbl(string $tbl) Return the first ChildSystemAuditTrails filtered by the tbl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByTblId(int $tbl_id) Return the first ChildSystemAuditTrails filtered by the tbl_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByUserId(int $user_id) Return the first ChildSystemAuditTrails filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByModule(string $module) Return the first ChildSystemAuditTrails filtered by the module column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByAuditTitle(string $audit_title) Return the first ChildSystemAuditTrails filtered by the audit_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByAuditDescription(string $audit_description) Return the first ChildSystemAuditTrails filtered by the audit_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByCreatedAt(string $created_at) Return the first ChildSystemAuditTrails filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByUpdatedAt(string $updated_at) Return the first ChildSystemAuditTrails filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByDeletedAt(string $deleted_at) Return the first ChildSystemAuditTrails filtered by the deleted_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByPriority(string $priority) Return the first ChildSystemAuditTrails filtered by the priority column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSystemAuditTrails requireOneByActivityType(string $activity_type) Return the first ChildSystemAuditTrails filtered by the activity_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSystemAuditTrails[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSystemAuditTrails objects based on current ModelCriteria
 * @method     ChildSystemAuditTrails[]|ObjectCollection findById(int $id) Return ChildSystemAuditTrails objects filtered by the id column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByTbl(string $tbl) Return ChildSystemAuditTrails objects filtered by the tbl column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByTblId(int $tbl_id) Return ChildSystemAuditTrails objects filtered by the tbl_id column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByUserId(int $user_id) Return ChildSystemAuditTrails objects filtered by the user_id column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByModule(string $module) Return ChildSystemAuditTrails objects filtered by the module column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByAuditTitle(string $audit_title) Return ChildSystemAuditTrails objects filtered by the audit_title column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByAuditDescription(string $audit_description) Return ChildSystemAuditTrails objects filtered by the audit_description column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSystemAuditTrails objects filtered by the created_at column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSystemAuditTrails objects filtered by the updated_at column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByDeletedAt(string $deleted_at) Return ChildSystemAuditTrails objects filtered by the deleted_at column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByPriority(string $priority) Return ChildSystemAuditTrails objects filtered by the priority column
 * @method     ChildSystemAuditTrails[]|ObjectCollection findByActivityType(string $activity_type) Return ChildSystemAuditTrails objects filtered by the activity_type column
 * @method     ChildSystemAuditTrails[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SystemAuditTrailsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SystemAuditTrailsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\SystemAuditTrails', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSystemAuditTrailsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSystemAuditTrailsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSystemAuditTrailsQuery) {
            return $criteria;
        }
        $query = new ChildSystemAuditTrailsQuery();
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
     * @return ChildSystemAuditTrails|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SystemAuditTrailsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SystemAuditTrailsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSystemAuditTrails A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tbl, tbl_id, user_id, module, audit_title, audit_description, created_at, updated_at, deleted_at, priority, activity_type FROM system_audit_trails WHERE id = :p0';
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
            /** @var ChildSystemAuditTrails $obj */
            $obj = new ChildSystemAuditTrails();
            $obj->hydrate($row);
            SystemAuditTrailsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSystemAuditTrails|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the tbl column
     *
     * Example usage:
     * <code>
     * $query->filterByTbl('fooValue');   // WHERE tbl = 'fooValue'
     * $query->filterByTbl('%fooValue%'); // WHERE tbl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tbl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByTbl($tbl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tbl)) {
                $tbl = str_replace('*', '%', $tbl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_TBL, $tbl, $comparison);
    }

    /**
     * Filter the query on the tbl_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTblId(1234); // WHERE tbl_id = 1234
     * $query->filterByTblId(array(12, 34)); // WHERE tbl_id IN (12, 34)
     * $query->filterByTblId(array('min' => 12)); // WHERE tbl_id > 12
     * </code>
     *
     * @param     mixed $tblId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByTblId($tblId = null, $comparison = null)
    {
        if (is_array($tblId)) {
            $useMinMax = false;
            if (isset($tblId['min'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_TBL_ID, $tblId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tblId['max'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_TBL_ID, $tblId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_TBL_ID, $tblId, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the module column
     *
     * Example usage:
     * <code>
     * $query->filterByModule('fooValue');   // WHERE module = 'fooValue'
     * $query->filterByModule('%fooValue%'); // WHERE module LIKE '%fooValue%'
     * </code>
     *
     * @param     string $module The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByModule($module = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($module)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $module)) {
                $module = str_replace('*', '%', $module);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_MODULE, $module, $comparison);
    }

    /**
     * Filter the query on the audit_title column
     *
     * Example usage:
     * <code>
     * $query->filterByAuditTitle('fooValue');   // WHERE audit_title = 'fooValue'
     * $query->filterByAuditTitle('%fooValue%'); // WHERE audit_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $auditTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByAuditTitle($auditTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($auditTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $auditTitle)) {
                $auditTitle = str_replace('*', '%', $auditTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_AUDIT_TITLE, $auditTitle, $comparison);
    }

    /**
     * Filter the query on the audit_description column
     *
     * Example usage:
     * <code>
     * $query->filterByAuditDescription('fooValue');   // WHERE audit_description = 'fooValue'
     * $query->filterByAuditDescription('%fooValue%'); // WHERE audit_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $auditDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByAuditDescription($auditDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($auditDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $auditDescription)) {
                $auditDescription = str_replace('*', '%', $auditDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_AUDIT_DESCRIPTION, $auditDescription, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the deleted_at column
     *
     * Example usage:
     * <code>
     * $query->filterByDeletedAt('2011-03-14'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt('now'); // WHERE deleted_at = '2011-03-14'
     * $query->filterByDeletedAt(array('max' => 'yesterday')); // WHERE deleted_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $deletedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByDeletedAt($deletedAt = null, $comparison = null)
    {
        if (is_array($deletedAt)) {
            $useMinMax = false;
            if (isset($deletedAt['min'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deletedAt['max'])) {
                $this->addUsingAlias(SystemAuditTrailsTableMap::COL_DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_DELETED_AT, $deletedAt, $comparison);
    }

    /**
     * Filter the query on the priority column
     *
     * Example usage:
     * <code>
     * $query->filterByPriority('fooValue');   // WHERE priority = 'fooValue'
     * $query->filterByPriority('%fooValue%'); // WHERE priority LIKE '%fooValue%'
     * </code>
     *
     * @param     string $priority The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByPriority($priority = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($priority)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $priority)) {
                $priority = str_replace('*', '%', $priority);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_PRIORITY, $priority, $comparison);
    }

    /**
     * Filter the query on the activity_type column
     *
     * Example usage:
     * <code>
     * $query->filterByActivityType('fooValue');   // WHERE activity_type = 'fooValue'
     * $query->filterByActivityType('%fooValue%'); // WHERE activity_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $activityType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function filterByActivityType($activityType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($activityType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $activityType)) {
                $activityType = str_replace('*', '%', $activityType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SystemAuditTrailsTableMap::COL_ACTIVITY_TYPE, $activityType, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSystemAuditTrails $systemAuditTrails Object to remove from the list of results
     *
     * @return $this|ChildSystemAuditTrailsQuery The current query, for fluid interface
     */
    public function prune($systemAuditTrails = null)
    {
        if ($systemAuditTrails) {
            $this->addUsingAlias(SystemAuditTrailsTableMap::COL_ID, $systemAuditTrails->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the system_audit_trails table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SystemAuditTrailsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SystemAuditTrailsTableMap::clearInstancePool();
            SystemAuditTrailsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SystemAuditTrailsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SystemAuditTrailsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SystemAuditTrailsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SystemAuditTrailsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SystemAuditTrailsQuery
