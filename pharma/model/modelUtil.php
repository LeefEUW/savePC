<?php
class Utilisateur {
  private $nom;
  private $prenom;
  private $mail;
  private $mdp;
  private $id_droits;

  public function __construct($nom,$prenom,$mail,$mdp,$id_droits) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
    $this->mdp = $mdp;
    $this->id_droits = $id_droits;
  }
 // Getter and setter

public function getNom():string{
  return $this -> nom; 
}
public function getPrenom():string{
  return $this -> prenom;
}
public function getMail():string{
  return $this -> mail;
}
public function getMdp():string{
  return $this -> mdp;
}
public function getIdDroits():int{
  return $this ->id_droits;
}
public function setNom($nom):void{
  $this -> nom = $nom;
}
public function setPrenom($prenom):void{
  $this -> prenom = $prenom;
}
public function setMail($mail):void{
$this -> mail = $mail;
}
public function setMdp($mdp):void{
$this -> mdp = $mdp;
}
public function setIdDroits($id_droits):void{
  $this -> id_droits = $id_droits;
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

  //Méthodes
        //création d'un utilisateur en BDD (utilisateur)
        public function createUtil($bdd){

          try{
              $req = $bdd->prepare('INSERT INTO utilisateurs(nom_util,prenom_util,
              mail_util, mdp_util, id_droits) VALUES (:nom_util,:prenom_util,
              :mail_util, :mdp_util, :id_droits)');
              $req->execute(array(
                  'nom_util' => $this->__get('nom'),
                  'prenom_util' => $this->__get('prenom'),
                  'mail_util' => $this->__get('mail'),
                  'mdp_util' => $this->__get('mdp'),
                  'id_droits' => $this->__get('id_droits')
                  ));
          }
          catch(Exception $e)
          {
              //affichage d'une exception en cas d’erreur
              die('Erreur : '.$e->getMessage());
          }

          return true;
      }

      public function showUtilByMail($bdd){
          try{
              $req = $bdd->prepare('SELECT * FROM utilisateurs 
              WHERE mail_util = :mail_util');
              $req->execute(array(
                  'mail_util' => $this->__get('mail'),
              ));
              $data = $req->fetchAll(PDO::FETCH_OBJ);
              return $data;
          }
          catch(Exception $e)
          {
              //affichage d'une exception en cas d’erreur
              die('Erreur : '.$e->getMessage());
          }
      }


}