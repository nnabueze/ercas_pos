<?php

use Base\Collector as BaseCollector;

/**
* Skeleton subclass for representing a row from the 'collector' table.
*
*
*
* You should add additional methods to this class to meet the
* application requirements.  This class will only be generated as
* long as it does not already exist in the output directory.
*
*/
class Collector extends BaseCollector
{
	public function setCollector($pos_name, $username, $password)
	{
		$collector = new Collector();
		$collector->setCollectorName($pos_name);
		$collector->setUsername($username);
		$collector->setPassword($password);
		$ran = $this->random(8);
		$random = 'ERCAS00'.$ran;
		$collector->setCollectorId($random);
		$collector->save();

		return $random;
	}
	/*Generate random number for each user*/
	public function random($digits) {
		$temp = "";

		for ($i = 0; $i < $digits; $i++) {
			$temp .= rand(0, 9);
		}

		return (int)$temp;
	}
}
