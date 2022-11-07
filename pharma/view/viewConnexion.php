<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/connexion.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Bitter">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Josefin+Sans">
    <title>Pharma & Cie - Connexion / Inscription</title>
</head>
<body>
    <header><?php include '../view/viewNavbar.php'?></header>
<div class="container"> 
    <div class="Connexion">
        <h3>Connexion</h3>
    <form action="" method="POST" id="formCo">
    <p>Email :</p>
    <input type="email" name="mail_connexion" required>
    <p>Mot de passe</p>
    <input type="password" name="mdp_connexion" required>
    <hr>
    <p><input class="btn" type="submit" value="Connexion" name="connexion" required></p>
    </div>   
    </form>  
    <div class="Inscription">
        <div class="content">
            <h3>Inscription</h3>
            <form action="" method="POST" id="FormIns">
                <p>Nom :</p>
                <input type="text" name="nom_inscription" required>
                <p>Prénom :</p>
                <input type="text" name="prenom_inscription" required>
                <p>Email :</p>
                <input type="email" name="mail_inscription" required>
                <p>Mot de passe :</p>
                <input type="password" name="mdp_inscription" required>
                <hr>
                <label for="admin">Administrateur ?</label>
                <input type="checkbox" name="admin">
                <p><input class="btn" type="submit" value="inscription" name="inscription" required></p>
                </form>
            </div>
        </div>
</div> 
<footer>
<?php include '../view/viewFooter.php'?>
</footer>
</body>
</html>