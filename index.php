<?php
$getParams = isset($_GET) ? $_GET : null;
$postParams = isset($_POST) ? $_POST : null;
$params = [
    "get" => $getParams,
    "post" => $postParams
];

if (isset($_GET['front'])) :
    switch ($_GET['front']):
        case "inscription" :
                require_once("./controller/controllerClient.php");
                Inscription();
            break;
        case "connexion" :
                require_once("./controller/controllerClient.php");
                Connexion();
            break;
        default :
                require_once("./controller/controllerSite.php");
                Default404();
            break;
    endswitch;
elseif (isset($_GET['form'])):
    switch ($_GET['form']):
        case "inscription":
            require_once("./controller/controllerClient.php");
            Inscrire($postParams);
            break;
        case "connexion":
            require_once("./controller/controllerClient.php");
            Connecter($postParams);
            break;
    endswitch;
else:
    require_once("./controller/controllerSite.php");
    Accueil();
endif;  