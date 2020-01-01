<?php

namespace ocook\Controllers;

use ocook\Models\UserModel;

// vrai nom c'est oKanban\Controllers\ListController
class UserController extends MainController
{
    public function admin($param)
    {
       
        if (isset($_GET['name']) &&
        isset($_GET['password'])
        ) {
            $name = $_GET['name'];
            $password = $_GET['password'];
            $admin = UserModel::findAdmin($name, $password);
            // j'utilise la fonction showJson de la classe mere MainController pour envoyer les données au client
            $this->sendJson($admin);
        } else {
            echo "error";
        }
    }
}