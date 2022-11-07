<?php
class Article {
  private $id;
  private $titre;
  private $img;
  private $contenu;
  private $id_cat;

  public function __construct($titre,$img,$contenu,$id_cat) {
    $this->titre = $titre;
    $this->img = $img;
    $this->contenu =$contenu;
    $this->id_cat =$id_cat;
  }
 // Getter and setter

  public function getIdArt():int{
    return $this -> id_article;
}
public function getTitreArt():string{
    return $this -> name_art; 
}
public function getImgArt():string{
    return $this -> img_art;
}
public function getContenuArt():string{
    return $this -> date_art;
}
public function getIdCat():int{
    return $this -> id_cat;
}
public function setIdArt($id):void{
    $this -> id_art = $id;
}
public function setTitreArt($titre):void{
    $this -> titre_art = $titre;
}
public function setImgArt($img):void{
  $this -> img_art = $img;
}
public function setContenuArt($contenu):void{
  $this -> contenu_art = $contenu;
}
public function setIdCat($id_cat):void{
  $this -> id_cat = $id_cat;
}

 // Methodes
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
        $req = $bdd->prepare('INSERT INTO article(titre_art,img_art,
        contenu_art, id_cat) VALUES (:titre_art,:img_art,
        :contenu_art, :id_cat)');
        $req->execute(array(
            'titre_art' => $this->__get('titre'),
            'img_art' => $this->__get('img'),
            'contenu_art' => $this->__get('desc'),
            'id_cat' => $this->__get('id_cat')
            ));
    }
    catch(Exception $e)
    {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
    }

    return true;
}
public function findArtById($bdd) {
    try{
      $req = $bdd->prepare('SELECT * FROM article 
      WHERE id_art = :id_art');
      $req->execute(array(
          'id_art' => $this->__get('id'),
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
public function showAllArticles($bdd) {
  try{
    $req = $bdd->prepare('SELECT * FROM article');
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
  $nom = $this->getTitreArt();
  $img = $this->getImgArt();
  $contenu = $this->getContenuArt();
  $id_art = $this->getIdArt();
  try{
      $req = $bdd->prepare('UPDATE article SET titre_art = :titre_art, img_art = :img_art, 
      contenu_art = :content_art WHERE id_art = :id_art');
      $req->execute(array(
          'name_art' => $nom,
          'img_art' => $img,
          'contenu_art' => $contenu,
          'id_art' => $id_art
          ));
  }
  catch(Exception $e)
  {
      //affichage d'une exception en cas d’erreur
      die('Erreur : '.$e->getMessage());
  }
}
}

