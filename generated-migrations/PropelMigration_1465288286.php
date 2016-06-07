<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1465288286.
 * Generated on 2016-06-07 10:31:26 
 */
class PropelMigration_1465288286
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `collector_payment`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `collector_id` VARCHAR(50) NOT NULL,
    `account_no` VARCHAR(50) NOT NULL,
    `BillReferenceNumber` VARCHAR(50) NOT NULL,
    `TransactionID` VARCHAR(255) NOT NULL,
    `SourceBank` VARCHAR(255) NOT NULL,
    `DestinationBank` VARCHAR(255),
    `BuildingType` VARCHAR(100) NOT NULL,
    `CustomerName` VARCHAR(200) NOT NULL,
    `District` VARCHAR(100) NOT NULL,
    `Email` VARCHAR(100) NOT NULL,
    `Phone` VARCHAR(15) NOT NULL,
    `OutstandingBalance` DECIMAL(11,2) NOT NULL,
    `TransactionDate` DATETIME NOT NULL,
    `date_initiated` VARCHAR(50) NOT NULL,
    `date_completed` VARCHAR(50) NOT NULL,
    `amount_paid` DECIMAL(20,2) NOT NULL,
    `AmountDue` DECIMAL(11,2) NOT NULL,
    `platform` VARCHAR(50) NOT NULL,
    `receipt_no` VARCHAR(50) NOT NULL,
    `ServiceAddress` VARCHAR(255) NOT NULL,
    `UsageType` VARCHAR(255) NOT NULL,
    `payment_status` enum(\'P\',\'U\') DEFAULT \'P\' NOT NULL,
    `reconcile_status` TINYINT(1) NOT NULL,
    `created_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `uploadstatus` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `key2` (`BillReferenceNumber`, `TransactionID`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `collector_payment`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}