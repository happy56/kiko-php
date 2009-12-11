<?php
/***
* 	@filename : config.php
*  	@author : Nafis Ahmad
*	@created_on : Thursday, October 08, 2009 9:36 AM
*	@type : configartion file
*	@Abstract : array will initiated here $CONFIG
***/
//require_once('../common_config.php');
/****************************************************************************
	WARRING  : PLEASE BE CAREFUL BEFORE YOU EDIT AND UPDATE THIS FILE !!!
*****************************************************************************/
define('ACTIVE_MESSAGE',1); // selection on the 


define('REDIRECTCODE','Refresh:0;url='.SITEURL);

define('BID_PER_LIST_PAGE',10);
define('BID_PAGINATOR_SHOWS',5); // how many page will be shown in the paginator for 5, it will show  1 2 3 4 5

define('SYSTEM_MESSAGE_RESPONSE_CHANGED',' Seller Has Changed Bid Response !! ');




/****
* @name : Database Configaration
* @Abstract :
* @Example : $config['database']['server'] = 'localhost';
*		   	$config['database']['dbname'] = 'dbname';;
*		   	$config['database']['dbuser'] = 'dbuser';;
*  			$config['database']['password']= 'dbpassword';;
*
***/
//*
$config['database']['server'] = 'localhost';
$config['database']['dbuser'] = 'root';
$config['database']['dbpassword']= '';
$config['database']['dbname'] = 'message';
/***
* @endof: Database Configaration
*/


/****
* @name : default_route
* @Abstract : when there is no in
*
*
***/

$config['default_route'] = 'index';
/***
* @endof: default route
*/








/*
*@endof file: config.php
*@
*/