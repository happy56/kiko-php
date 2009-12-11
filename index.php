<?php
/***
* 	@filename : index.php
*  	@author : Nafis Ahmad
*	@created_on : Thursday, October 08, 2009 9:34 AM
*	@type :  message project 
*	@Abstract : this will be the main handdler all the request will come to this file and this call the other functions. 
***/

session_start(); // start up your PHP session! 

require_once("core/config.php");// loads the config file


/****
* @name : url_parm_control
* @Abstract : Single controler will call one function with at best 5 paramerter
* @parm : $_GET['f'] name of function
* 		  $_GET['p1'] .. $_GET['p4'] => parameters 
***/

//$URI = array();

$fun = '';
if (!empty($_GET['q']))
{
	//global $URI;
	$URI = split('[/.-]', $_GET['q']);

	$fun = $URI[0] ;
	
	//echo "function name ", $_GET['f'], " with parameters --> " ;
}else{
	$fun = $config['default_route'];

};


/***
* @endof: url_parm_control
*/

/****
* @name: fileloader 
* @Abstract: Loads all files needed
*
*
***/
require_once("core/utility_helper.php");// loads the utility helper file
require_once("core/db_helper.php");// loads the utility helper file
/***
* @endof : fileloader
**/

/****
* @name : functionloader
* @Abstract : 
*
*
***/
$dblink = dbconnect($config['database']); // please comment_out close_db_link

/***
* @endof: functionloader
*/






/****
* @name : url_parm_control part 2
* @Abstract : Single controler will call one function with at best 5 paramerter
* @parm : $_GET['f'] name of function
* 		  $_GET['p1'] .. $_GET['p4'] => parameters 
***/


require_once('app/controler.php');

	
	if(function_exists($fun))
		$fun($URI[1],$URI[2],$URI[3],$URI[4],$URI[5]);
		
	else	
		echo 'function not found found!! ';

		
		

/***
* @endof: url_parm_control part2
*/




/****
* @name : unit_testing 
* @Abstract : 
*
*
***/
include_once("core/unit_testing.php");
/***
* @endof: unit_testing 
*/
// 
/****
* @name : close_db_link
* @Abstract : killing DB_link 
*
*
***/

@mysql_close($dblink);

/***
* @endof: close_db_link
*/
/*
*@endof file: index.php
*@
*/