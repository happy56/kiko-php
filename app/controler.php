<?php  
/***
* 	@filename : controler.php
*  	@author : Nafis Ahmad
*	@created_on : Wednesday, November 11, 2009 1:51 PM
*	@type : 
*	@Abstract : 
***/


require_once('model.php');

function index ( )
/***
* 	@method : index
*  	@author : Nafis Ahmad
*	@created_on : Wednesday, November 11, 2009 1:51 PM
*	@parm: 
*	@return type : 
*	@Abstract : 
*	@called_from :
***/
{ 
   $val = 'some txt';
   $smoe = array('some'=>'asasa','some1'=>'asasa','s1'=>'asasa','asasa','aqsasas3');
   echo array_to_sql($smoe);
 require_once('views/welcome_view.php');
   
    
    return ;
}/*@endof_function : index
	*/






/*
*@endof file: controler.php
*@
*/