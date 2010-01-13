
<!------ Header  -->


<div class="Content">
<?php
    if(empty($error404)){
        require('views/'.$fun.'_view.php'); # convetion over configaration    
    }else{
        
        echo $error404;
    }
    
?>
</div>


<!------ footter -------->




