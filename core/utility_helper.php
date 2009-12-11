<?php
/***
* 	@filename : utility_helper.php
*  	@author : Nafis Ahmad
*	@created_on : Thursday, October 08, 2009 9:41 AM
*	@type : Helper file
*	@Abstract :  all the functions needed every here will be in this file.
***/
global $URI;

function pre($array, $die='')
/***
* 	@method : pre
*  	@author : Nafis Ahmad
*	@created_on : Thursday, October 08, 2009 10:42 AM
*	@parm: (array  ==> object which will be showed, , die ==> php code needs to die there)
*	@return type : none
*	@Abstract : shows all the value in the object / arrary
*	@called_from : anywhere
***/
{
   echo '<pre>';
	print_r($array);
   echo '</pre>';
   if($die!='')
   {
	die("<br /><h1>Your Pre is called Die!!</h1>");
   }

	//return ;
}/*@endof_function : pre
*/


function paginate_links ($url, $active, $perpage, $total)
/***
* 	@method : paginate_links
*  	@author : Nafis Ahmad
*	@created_on : Monday, October 12, 2009 12:15 PM
*	@parm: $url<-- must have trailing slash, $active, $perpage, $total
*	@return type : array
*	@Abstract : $next = $active+$perpage, $previous = $active - $perpage
*	@called_from : inbox() -> controler, sendmail() ->controler, Search !! 
***/
{

	if( $total <= $perpage){return;}
	if($active<=($total-$perpage)){
		$page['next']=  $url. ($active+$perpage);
	}
	else{$page['next']='#';}

	if(($active-$perpage)>0){
		$page['previous']=  $url. ($active-$perpage);
	}
	else{$page['previous']='#';}
	
	if(floor($total/$perpage)>0){
		$page['last']['pagenumber']=   floor($total/$perpage);
		$page['last']['url']=  $url. ($total-($total%$perpage));
	}

	
	
	$start = $active - (floor(MESSAGE_PAGINATOR_SHOWS/2 ))*$perpage;
	
	for($i=0,$j=0;$i<MESSAGE_PAGINATOR_SHOWS;$i++,$j++)
	{
		if($start>=0 )
		{
			if($start<=($total-$perpage))
			{
				
				$page['pager'][$j]['pagenumber'] = floor($start/$perpage)+1;
				$page['pager'][$j]['url'] = $url. $start;
				
				if($start == $active){
				$page['pager'][$j]['active'] = 'active';
				
				}
				
			}else{break;}
		;
		}else{$i--;}
		//echo $start,$active .'<br />';
		$start += $perpage;
		
	}
	

	//pre($page,'die');
    return $page;
}/*@endof_function : paginate_links
*/



function must_login( )
/***
* 	@method : must_login
*  	@author : Nafis Ahmad
*	@created_on : Thursday, October 08, 2009 12:27 PM
*	@parm: Nothing
*	@return type : Nothing BUT there is redirect to the login page ...
*	@Abstract : Check the user login or not. if not then it will redirect to login page.
*	@called_from : anywhere
***/
{

    // not implemented yet !!

	 if(empty($_SESSION['code_artiste']))

	/****
	* @name : not_loggedin
	* @Abstract : redirect to the login page. with callback_url
	*
	*
	***/
	{
	  // it will be loing url of the site
	  header('Refresh:0; url='.MESSAGEURL.'login/');
		//header();

	}
	/***
	* @endof: not_loggedin
	*/


	return $_SESSION['code_artiste'];

}/*@endof_function : must_login
*/
function is_loggedin( )
/***
* 	@method : is_loggedin
*  	@author : Nafis Ahmad
*	@created_on : Friday, October 09, 2009 7:45 AM
*	@parm: none
*	@return type : it will return logged in user id
*	@Abstract :
*	@called_from :
***/
{

   //not impemented
   if(empty($_SESSION['code_artiste']))
      return FALSE;
	return $_SESSION['code_artiste'];
}/*@endof_function : is_loggedin
	*/

function current_url($segment= -1 )
/***
* 	@method : current_url
*  	@author : Nafis Ahmad
*	@created_on : Thursday, October 08, 2009 12:50 PM
*	@parm:
*	@return type : current url of the page
*	@Abstract : it will send the current url
*	@called_from : anywhere
***/
{
   global $URI;
    // not implemented yet !!
   if($segment ==-1)
		return $URI;
	else {
		return $URI[$segment];
	}

}/*@endof_function : current_url
*/
function loadfiles($array)
/***
* 	@method : loadfiles
*  	@author : Nafis Ahmad
*	@created_on : Thursday, October 08, 2009 1:08 PM
*	@parm: $array
*	@return type : NONE
*	@Abstract : it will include files
*	@called_from :
***/
{

   if(!empty($array))
   {
		foreach($array as $file)
		{
			require_once($file);

		}
   }
   return ;
}/*@endof_function : loadfiles
	*/

function clean_post_array ( )
/***
* 	@method : clean_post_array
*  	@author : Nafis Ahmad
*	@created_on : Saturday, October 10, 2009 11:30 AM
*	@parm: none / $_POST
*	@return type : none
*	@Abstract : it will clean all the $_POST data.
*	@called_from : message_controler -> sent()
***/
{
   foreach ($_POST as &$e)
   {

		$e= htmlentities($e);
   }



    //return ;
	}/*@endof_function : clean_post_array
	*/


/*
*@endof file: utility_helper.php
*@
*/