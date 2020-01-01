<?php

namespace ocook\Controllers;



class MainController
{
    // Cette fonction nous permet d'envoyer la reponse de la requete utilisateur sous forme d'un echaine de caractere encodée en JSON
    public function sendJson($data)
    {
        // en entrée on recoit dans la variable $data les données à encoder et envoyer au client
        // on transforme $data en JSON
        $jsonString = json_encode($data);
        // j'envoi un header pour dire au client que je vais lui repondre en JSON
        header('content-type:application/json');
        // on va envoyer la reponse au format JSON
        echo $jsonString;
    }
}
