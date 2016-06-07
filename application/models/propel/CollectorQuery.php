<?php

use Base\CollectorQuery as BaseCollectorQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'collector' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class CollectorQuery extends BaseCollectorQuery
{
	//getting all user and password registered on the platform
	public function getToken()
	{
		$query = CollectorQuery::create()
		->select(array('username','password'))->find();
		$query = $query->toArray();

		$results = array();
		foreach ($query as $query) {	

			$results[$query['username']] = $query['password'];
		}
		return $results;


	}

	//select a single collector
	public function getCollector($id)
	{
		if (empty($id)) {

			$query = '';
			return $query;
			
		}
		
		$query = CollectorQuery::create()
		->filterByCollectorId($id)
		->findOne();
		return $query;
	}
}
