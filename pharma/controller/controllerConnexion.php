<?php
// include '../utils/connectBdd.php';
include '../model/modelUtil.php';
include '../view/viewConnexion.php';

//variable qui va contenir les messages erreurs
$message = '';
//test si on à cliqué sur le bouton submit (test si les champs existes)
if (isset($_POST['inscription'])) {
  //test si les champs existent et ne sont pas vides
  if (
    $_POST['nom_inscription'] != "" and $_POST['prenom_inscription'] != ""
    and $_POST['mail_inscription'] != "" and $_POST['mdp_inscription'] != ""
  ) {
    $id_droits = 1;
    //instance d'un nouvel objet Utilisateur
    if (isset($_POST['admin'])) {
      $id_droits = 2;
    }
    $util = new Utilisateur(
      $_POST['nom_inscription'],
      $_POST['prenom_inscription'],
      $_POST['mail_inscription'],
      $_POST['mdp_inscription'],
      $id_droits
    );
    //hashage du mot de passe -> setPwdUtil()
    $util->setMdp(password_hash($util->getMdp(), PASSWORD_DEFAULT));
    //appel de la méthode qui recherche un utilisateur par son mail
    $mail = $util->showUtilByMail($bdd);
    //test si le mail n'existe pas 
    if (empty($mail)) {
      $util->createUtil($bdd);
      //message compté ajouté
      $message = "Vous étes inscrit";
    } else {
      //message erreur le compte existe déja
      $message = "Données saisies incorrectes" ;
    }
  } else {
    //message erreur veuillez compléter les champs de formulaire
    $message =  "Veuillez compléter les champs";
  }
//affichage des erreurs
}
if($message != ''){
  echo '<script defer> alert("'.$message.'")</script>';
}



// Connexion
if(isset($_POST['connexion'])) {
$utilisateur = new Utilisateur("", "", $_POST['mdp_connexion'], $_POST['email_connexion'], '','');
$test = $utilisateur->showUtilByMail($bdd);


if(empty($test)) {
$message = 'Aucun compte n\'existe à cette adresse';

} else {
$hash = $test[0]->mdp_client;
$password = password_verify($_POST['mdp_connexion'], $hash);

if($password){
//créer les super globales SESSION
$_SESSION['connected'] = true;
$_SESSION['prenom'] = $test[0]->prenom_util;
$_SESSION['mail'] = $test[0]->mail_util;
$_SESSION['id_droits'] =$test[0]->id_droits;
//message connecté
$message ="Connecté";


}
else{
//message les informations sont incorrectes
$message =" les informations sont incorrectes";
}
}
}
?>