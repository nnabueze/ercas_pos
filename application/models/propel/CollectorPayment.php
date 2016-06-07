<?php

use Base\CollectorPayment as BaseCollectorPayment;

/**
 * Skeleton subclass for representing a row from the 'collector_payment' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class CollectorPayment extends BaseCollectorPayment
{
	public function setData($id,$date,$acct,$amt, $phone, $sbank, $dbank, $collectorid)
	{

		$collector = new CollectorPayment();
		$collector->setCollectorId($collectorid);
		$collector->setTransactionid($id);
		$collector->setTransactiondate($date);		
		$collector->setAccountNo($acct);
		$collector->setAmountPaid($amt);
		$collector->setSourcebank($sbank);
		$collector->setDestinationbank($dbank);
		$collector->setPhone($phone);
		$collector->save();
	}

}
