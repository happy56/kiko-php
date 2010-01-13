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
define(ENV,'DEV'); #DEV = development , # RUN = deployment 



if(ENV == 'DEV')
/**************************************************************************************
** @name : Development ENVIONMENT
** @Abstract : all the variables are set for the development work not for the deployment 
****************************************************************************************/
{
    define(SITEURL, "http://localhost/kiko/");
    define('REDIRECTCODE','Refresh:0;url='.SITEURL);
   
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
    
    
}else
/**************************************************************************************
** @name : Develoployment  ENVIONMENT # part RUN
** @Abstract : all the variables are set for the deployment 
****************************************************************************************/
{
    
    define(SITEURL, "http://talgol.com/demo/kiko/");
    define('REDIRECTCODE','Refresh:0;url='.SITEURL);
   
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
    $config['database']['dbuser'] = '';
    $config['database']['dbpassword']= '';
    $config['database']['dbname'] = '';
    /***
    * @endof: Database Configaration
    */
        
   
}


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