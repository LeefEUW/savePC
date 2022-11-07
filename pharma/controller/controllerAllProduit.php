<?php
    include './utils/connectBdd.php';
    include './model/modelPizza.php';
    
    $pizza = new Produit(null,null,null,null,null,null,null,null);
    
    $data = $prod->showAllProduits($bdd);
    // var_dump($data);

    include './view/viewNosPizza.php';
?>