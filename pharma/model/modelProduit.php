<?php
class Produit {
  private $id;
  private $nomProd;
  private $prix;
  private $desc;
  private $img;
  private $id_type;

  public function __construct($nom,$prix,$desc,$img,$id_type) {
    $this->nom_prod = $nom;
    $this->prix_prod = $prix;
    $this->desc_prod =$desc;
    $this->img_prod =$img;
    $this->type =$id_type;
  }

 // Getter and setter

 public function getId():int{
  return $this -> id_prod;
}
public function getNomProd():string{
  return $this -> nom_prod; 
}
public function getPrixProd():string{
  return $this -> prix_prod;
}
public function getDescProd():string{
  return $this -> desc_prod;
}
public function getImgProd():string{
  return $this -> img_prod;
}
public function getTypeProd():string{
  return $this -> id_type;
}
public function setId($id):void{
  $this -> id_prod = $id;
}
public function setNomProd($nom):void{
  $this -> nom_prod = $nom;
}
public function setPrixProd($prix):void{
$this -> prix_prod = $prix;
}
public function setDescProd($desc):void{
$this -> desc_prod = $desc;
}
public function setTypeProd($id_type):void{
$this -> type = $id_type;

}
  public function __get($property) {
    if(property_exists($this, $property)) {

      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if(property_exists($this, $property)) {
      $this->$property = $value; 
    }
  }

  public function createProd($bdd){

    try{
        $req = $bdd->prepare('INSERT INTO produits(nom_prod,prix_prod,
        desc_prod, img_prod) VALUES (:nom_prod,:prix_prod,
        :desc_prod, :img_prod)');
        $req->execute(array(
            'nom_prod' => $this->__get('nom'),
            'prix_prod' => $this->__get('prix'),
            'desc_prod' => $this->__get('desc'),
            'img_prod' => $this->__get('img'),

            ));
    }
    catch(Exception $e)
    {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }

    return true;
}
public function findProdById($bdd) {
    try{
      $req = $bdd->prepare('SELECT * FROM produits 
      WHERE id_prod = :id_prod');
      $req->execute(array(
          'id_prod' => $this->__get('id'),
          ));
      $data = $req->fetchAll(PDO::FETCH_ASSOC);
      return $data;
  }
  catch(Exception $e)
  {
      //affichage d'une exception en cas d’erreur
      die('Erreur : '.$e->getMessage());
  }
  }

public function showAllProduits($bdd) {
  try{
    $req = $bdd->prepare('SELECT * FROM produits');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
catch(Exception $e)
{
    //affichage d'une exception en cas d’erreur
    die('Erreur : '.$e->getMessage());
}
}
public function modifyArticle($bdd):void{
  $nom = $this->getNomProd();
  $prix = $this->getPrixProd();
  $desc = $this->getDescProd();
  $img = $this->getImgProd();
  $id_type = $this->getTypeProd();
  try{
      $req = $bdd->prepare('UPDATE produits SET nom_prod = :nom_prod, prix_prod = :prix_prod, desc_prod = :desc_prod
      img_prod = :img_prod, id_type = :id_type WHERE id_art = :id_art');
      $req->execute(array(
          'nom_prod' => $nom,
          'prix_prod' => $prix,
          'desc_prod' => $desc,
          'img_prod' => $img,
          'id_type' => $id_type
          ));
  }
  catch(Exception $e)
  {
      //affichage d'une exception en cas d’erreur
      die('Erreur : '.$e->getMessage());
  }
}
}
