<?php

namespace ocook\Controllers;



class MainController
{
    // Cette fonction nous permet d'envoyer la reponse de la requete utilisateur sous forme d'un echaine de caractere encodée en JSON
    public function sendJson($data)
    {
       
        $jsonString = json_encode($data);
        // On précise au navigateur qu'on renvoie du json
        header('content-type:application/json');
        
        echo $jsonString;
    }
}
