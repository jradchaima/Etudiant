<?php

include 'classes/dbconnect.php';


if(isset($_GET['user'])){
$req = $bdd->prepare("SELECT * FROM users WHERE id = ?");
$req->execute(array($id));
if($req->rowCount() == 1)
{
$user 
}

else{

    die('Utilisateur introuvable')
}
}
else{
    die('Aucun utilisateur precise')
}
