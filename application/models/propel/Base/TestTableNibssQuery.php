<?php

namespace Base;

use \TestTableNibss as ChildTestTableNibss;
use \TestTableNibssQuery as ChildTestTableNibssQuery;
use \Exception;
use \PDO;
use Map\TestTableNibssTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'test_table_nibss' table.
 *
 *
 *
 * @method     ChildTestTableNibssQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTestTableNibssQuery orderByCol1($order = Criteria::ASC) Order by the col1 column
 * @method     ChildTestTableNibssQuery orderByCol2($order = Criteria::ASC) Order by the col2 column
 *
 * @method     ChildTestTableNibssQuery groupById() Group by the id column
 * @method     ChildTestTableNibssQuery groupByCol1() Group by the col1 column
 * @method     ChildTestTableNibssQuery groupByCol2() Group by the col2 column
 *
 * @method     ChildTestTableNibssQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTestTableNibssQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTestTableNibssQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTestTableNibssQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTestTableNibssQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTestTableNibssQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTestTableNibss findOne(ConnectionInterface $con = null) Return the first ChildTestTableNibss matching the query
 * @method     ChildTestTableNibss findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTestTableNibss matching the query, or a new ChildTestTableNibss object populated from the query conditions when no match is found
 *
 * @method     ChildTestTableNibss findOneById(int $id) Return the first ChildTestTableNibss filtered by the id column
 * @method     ChildTestTableNibss findOneByCol1(string $col1) Return the first ChildTestTableNibss filtered by the col1 column
 * @method     ChildTestTableNibss findOneByCol2(string $col2) Return the first ChildTestTableNibss filtered by the col2 column *

 * @method     ChildTestTableNibss requirePk($key, ConnectionInterface $con = null) Return the ChildTestTableNibss by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTestTableNibss requireOne(ConnectionInterface $con = null) Return the first ChildTestTableNibss matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTestTableNibss requireOneById(int $id) Return the first ChildTestTableNibss filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTestTableNibss requireOneByCol1(string $col1) Return the first ChildTestTableNibss filtered by the col1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTestTableNibss requireOneByCol2(string $col2) Return the first ChildTestTableNibss filtered by the col2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTestTableNibss[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTestTableNibss objects based on current ModelCriteria
 * @method     ChildTestTableNibss[]|ObjectCollection findById(int $id) Return ChildTestTableNibss objects filtered by the id column
 * @method     ChildTestTableNibss[]|ObjectCollection findByCol1(string $col1) Return ChildTestTableNibss objects filtered by the col1 column
 * @method     ChildTestTableNibss[]|ObjectCollection findByCol2(string $col2) Return ChildTestTableNibss objects filtered by the col2 column
 * @method     ChildTestTableNibss[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TestTableNibssQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TestTableNibssQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\TestTableNibss', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTestTableNibssQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTestTableNibssQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTestTableNibssQuery) {
            return $criteria;
        }
        $query = new ChildTestTableNibssQuery();
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
     * @return ChildTestTableNibss|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TestTableNibssTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TestTableNibssTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTestTableNibss A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, col1, col2 FROM test_table_nibss WHERE id = :p0';
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
            /** @var ChildTestTableNibss $obj */
            $obj = new ChildTestTableNibss();
            $obj->hydrate($row);
            TestTableNibssTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTestTableNibss|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTestTableNibssQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TestTableNibssTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTestTableNibssQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TestTableNibssTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTestTableNibssQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TestTableNibssTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TestTableNibssTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TestTableNibssTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the col1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCol1('fooValue');   // WHERE col1 = 'fooValue'
     * $query->filterByCol1('%fooValue%'); // WHERE col1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $col1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTestTableNibssQuery The current query, for fluid interface
     */
    public function filterByCol1($col1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($col1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $col1)) {
                $col1 = str_replace('*', '%', $col1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TestTableNibssTableMap::COL_COL1, $col1, $comparison);
    }

    /**
     * Filter the query on the col2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCol2('2011-03-14'); // WHERE col2 = '2011-03-14'
     * $query->filterByCol2('now'); // WHERE col2 = '2011-03-14'
     * $query->filterByCol2(array('max' => 'yesterday')); // WHERE col2 > '2011-03-13'
     * </code>
     *
     * @param     mixed $col2 The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTestTableNibssQuery The current query, for fluid interface
     */
    public function filterByCol2($col2 = null, $comparison = null)
    {
        if (is_array($col2)) {
            $useMinMax = false;
            if (isset($col2['min'])) {
                $this->addUsingAlias(TestTableNibssTableMap::COL_COL2, $col2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($col2['max'])) {
                $this->addUsingAlias(TestTableNibssTableMap::COL_COL2, $col2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TestTableNibssTableMap::COL_COL2, $col2, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTestTableNibss $testTableNibss Object to remove from the list of results
     *
     * @return $this|ChildTestTableNibssQuery The current query, for fluid interface
     */
    public function prune($testTableNibss = null)
    {
        if ($testTableNibss) {
            $this->addUsingAlias(TestTableNibssTableMap::COL_ID, $testTableNibss->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the test_table_nibss table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TestTableNibssTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TestTableNibssTableMap::clearInstancePool();
            TestTableNibssTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TestTableNibssTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TestTableNibssTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TestTableNibssTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TestTableNibssTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TestTableNibssQuery
