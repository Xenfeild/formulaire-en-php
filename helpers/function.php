<?php 
// fait un print_r propre d'un tableau
    function debug_array($arr) 
    {
        
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    }



// affiche les messages d'errur
function errorMsg($name) 
{
    global $error;
    if(isset($error[$name])) {
        echo $error[$name]; 
    }
 
}


// sauvegarde la valeur de l'input aprés submit
function showInputValue ($name){
     if (isset($_POST[$name])) { 
    echo $_POST [$name]; 
   }
}