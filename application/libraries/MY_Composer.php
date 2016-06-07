<?php

/**
* Composer autoload class
*/
class MY_Composer
{
	
	function __construct()
	{
		include ("./vendor/autoload.php");
        include("./generated-conf/config.php");
	}

}