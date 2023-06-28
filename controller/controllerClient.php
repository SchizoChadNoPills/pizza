<?php
require_once(realpath(__DIR__ . '/../view/part/head.php'));

function Inscription(){
    require_once(realpath(__DIR__ . '/../view/client/inscription.php'));
}

function Connexion(){
    require_once(realpath(__DIR__ . '/../view/client/connexion.php'));
}

function Inscrire($postParams){
    require_once(realpath(__DIR__ . '/../model/modelClient.php'));
    if (insertClient($postParams)):
        $titre = "Succés";
        $message = "Vous êtes bien inscrit";
    else:
        $titre ="Echec";
        $message ="Vous n'êtes pas inscrit. Veuillez réessayer, ou contacter l'administrateur";
    endif;
    require_once(realpath(__DIR__ . '/../view/resultat.php'));
}

/**
 * 
 */
function Connecter($postParams){
    require_once(realpath(__DIR__ . '/../model/modelClient.php'));
    if (testConnexion($postParams) == true){
        $titre = "Succés";
        $message = "Vous êtes bien connecté ";
        $_SESSION['mail'] = $postParams['mail'];
    }else{
        $titre = "Echec";
        $message = "Vous n'êtes pas connecté. Veuillez réessayer, ou contacter l'administraeur";
    }
    require_once(realpath(__DIR__ . '/../view/resultat.php'));
}