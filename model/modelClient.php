<?php

/**
 * Fonction qui permet l'insertion d'un client en BDD
 * @param array $params mutliple valeurs comme le mail, password, nom, prenom, telephone, adresse, ville, cp
 * @return boolean Indique si le client à bien été ajouter à la BDD
 */

function insertClient($params){
    try{
        $db = Bdd::getInstance()->getConnection();
        $rq = $db->prepare("SELECT count(num_client) as nb FROM client WHERE email_client = ?");
        $rq->execute([$params['mail']]);
        if ($rq->fetchColumn() != 0) {
            return false;
        } else {
            $rq = $db->prepare('INSERT INTO client(nom_client,prenom_client,email_client,adresse_client,cp_client,ville_client,tel_client,mdp_client,num_role) VALUES (:nom_client,:prenom_client,:email_client,:adresse_client,:cp_client,:ville_client,:tel_client,:mdp_client,:num_role)');
            $rq->bindValue('nom_client', $params['nom'], PDO::PARAM_STR);
            $rq->bindValue('prenom_client', $params['prenom'], PDO::PARAM_STR);
            $rq->bindValue('email_client', $params['mail'], PDO::PARAM_STR);
            $rq->bindValue('adresse_client', $params['adresse'], PDO::PARAM_STR);
            $rq->bindValue('cp_client', $params['cp'], PDO::PARAM_STR);
            $rq->bindValue('ville_client', $params['ville'], PDO::PARAM_STR);
            $rq->bindValue('tel_client', $params['tel'], PDO::PARAM_STR);
            $rq->bindValue('mdp_client', password_hash($params['password'], PASSWORD_DEFAULT));
            $rq->bindValue('num_role', 2);
            return $rq->execute();
        }
    } catch (\Throwable $th) {
        throw $th;
    }
}

/**
 * Fonction qui permet de verifier qu'un utilisateur ainsi que son mot de passe associé est juste
 * @param array $params multiple valeurs mail et password
 * @return boolean indique vrai si la personne existe et que le mot de passe correspondant est bon.
 */
function testConnexion ($params){
    try {
        $db = Bdd::getInstance()->getConnection();
        $rq = $db->prepare('SELECT mdp_client FROM client WHERE email_client = ?');
        $rq->execute([$params['mail']]);
        if (password_verify($params['password'], $rq->fetchColumn())){
            return getNumClientByEmail($params['mail']);
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        throw $th;
    }

}

/**
 * Fonction qui permet de récuperer les informations d'un client à partir d'un ID
 * 
 * @param int $id Identifiant du client
 * @return array
 */

function getClientByNumClient($num_client){
    try {
        $db = Bdd::getInstance()->getConnection();
        $rq = $db->query("SELECT nom_client,prenom_client,email_client,adresse_client,cp_client,ville_client,tel_client,mdp_client,num_role FROM client WHERE num_client = {$num_client} ");
        $donnees = $rq->fetch(PDO::FETCH_ASSOC);
        return $donnees;
    } catch (\Throwable $th) {
        //throw $th;
    }
}


/**
 * Fonction qui permet de récuperer le numéro d'un client à partir de son email
 * 
 * @param string $mail Email de l'utilisateur
 * @return int
 */
function getNumClientByEmail (string $mail): int{
    $db = Bdd::getInstance()->getConnection();
    $rq = $db->prepare('SELECT num_client FROM client WHERE email_client = ?');
    $rq->execute([$mail]);
    return $rq->fetchColumn();
}