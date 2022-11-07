<?php
    //gestion d'une erreur avec un paramètre get (error)
    if(isset($_GET['error']) AND $_GET['error'] == 1){
        echo "SUPER ERROR";
    }
    else{
        echo "La page à laquelle vous essayez d'accéder est inexistante ou indisponible.";
    }
?>