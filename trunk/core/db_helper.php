<?php
/***
* 	@filename : db_helper.php
*  	@author : Nafis Ahmad
*	@created_on : Friday, October 09, 2009 6:43 AM
*	@type : 
*	@Abstract : 
***/
function dbconnect($database_config )
/***
* 	@method : dbconnect
*  	@author : Nafis Ahmad
*	@created_on : Thursday, October 08, 2009 10:00 AM
*	@parm:  $database_config will be always 
*	@return type : $link(if connect/select db) for close it letter , 
				--> BUT THE CODE WILL DIE IF THE CONNECT IS DEAD <--
*	@Abstract : Just connect the database using the config array information.
*				we will call it infont of our models. 
*	@called_from : autoloaded -> index.php,  
***/
{ 	
    
	$link = @mysql_connect($database_config['server'], $database_config['dbuser'] , $database_config['dbpassword']);
	
	if (!$link) 
	{ 
		die('<h1>ERROR : Database Connection Failed</h1><br />
						<p><b>Please open the <u>core/config.php</u> file  and update information:  </b></p>
						
						<ol>
							<li>$config[\'database\'][\'server\']</li>
							<li>$config[\'database\'][\'username\']</li>
							<li>$config[\'database\'][\'password\'] </li>
						</ol>
						')  ;
	}
	
	if(!@mysql_select_db($database_config['dbname'], $link))
	{ 
		echo '<h1>ERROR :',$database_config['dbname'],' Database Not found 	</h1><br />
						<p>Please <u>check core/config.php</u> file <br/>
						Update the $config[\'database\'][\'dbname\'] information. </p>
						';
		die();
	};
   
    return $link;
}/*@endof_function : dbconnect
*/


	
function fetch_array(&$res)
// @method    fetch_array
// @abstract taking the mySQL $resource id and fetch and return the result array
// @param   string| MySQL resouser 
// @return  array  
{
	if(!empty($res)){
           $data = array();     
        while ($row = mysql_fetch_assoc($res)) 
        {
                $data[] = $row;
        }
		
		mysql_free_result($res);
        return $data;
	}
	
	return NULL;
} //@endof  function fetch_array


function table_arrange($array)
// @method  table_arrange
// @abstract taking the mySQL the result array and return html Table in a string. showing the search content in a diffrent css class.
// @param  array 
// @post_data  search_text
// @return  string | html table 
{
        
        $table_data = ''; // @abstract  returning table
        
        $max =0; // @abstract  max lenth of a row
        
        $max_i =0; // @abstract  number of the row which is maximum max lenth of a row
        
        $search_text = $_POST["search_text"];
        
        for($i=0;$i<sizeof($array);$i++)
        {
                //@abstract table row 
                $table_data .= '<tr class='.(($i&1)?'"odd_row"':'"even_row"') .' >';
                //
                $j=0;
                
                foreach($array[$i] as $key => $data) 
                {
                        
                        //@abstract a class around the search text 
                        $data = preg_replace("|($search_text)|Ui" , "<b>$1</b>" , htmlspecialchars($data));
                        
                        $table_data .= '<td>'. $data .'  </td>';
                        
                        $j++;
                }
                
                if($max<$j)
                {
                        $max = $j;
                        $max_i = $i;
                }
                $table_data .= '</tr>'."\n";
        }
        $table_data .= '</table></div>';
        unset($data);
        // @endof html table
        
        //@abstract populating the table head
        
        // @varname $data_a
        //@abstract  taking the highest sized array and printing the key name.
        $data_a = $array[$max_i];
        
        
        $table_head =  '<tr>';
                foreach($data_a as $key => $value) 
                {
                        $table_head .= '<td class="keys">'. $key.'</td>';
                }
                        
        $table_head .= '</tr>'."\n";
        //@endof populating the table head
        
        // @abstract printing the table data
        return '<div class="table_bor">
                                        <table cellspacing="0" cellpadding="3" border="1" class="data_table">'.$table_head.$table_data;
}//@endof  function table_arrange

function array_to_sql ($array, $prfix='')
/***
* 	@method : array_to_sql
*  	@author : Nafis Ahmad
*	@created_on : Sunday, October 18, 2009 10:22 PM
*	@parm: 
*	@return type : 
*	@Abstract : 
*	@called_from :
***/
{ 
$string = ' set ';

   foreach ($array as $key=>$mal){
	$string .= ' '.$prfix.'`'.$key .'` = "'. $mal .'"  , ';
	}
   
   return trim($string, " \t,");
   
   
    //return $string;
}/*@endof_function : array_to_sql	*/




/*
*@endof file: db_helper.php
*@
*/