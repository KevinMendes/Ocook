<?php

namespace ocook\Models;

use ocook\Utils\Database;
use PDO;

class UserModel extends MainModel
{
    protected static $tableName = 'users';

    public function jsonSerialize()
    {
        // je crée mon tableau associatif avec toute les données de mon objet car je souhaite tout serialiser
        // ca ne serait pas le cas par exmeple si mon objet contenait un mot de passe
        $serializedObject = [
            "name" => $this->name,
            "rank" => $this->rank,
        ];
        // et je renvoi ce tableau
        return $serializedObject;
    }

    public function findAdmin($name, $password)
    {

        
        $sql = "SELECT `name`, `password`, `rank` FROM `users` WHERE `name` = :name AND `password` = SHA1(:password)";

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(":name", $name, PDO::PARAM_STR);
        $pdoStatement->bindParam(":password", $password, PDO::PARAM_STR);

        $pdoStatement->execute();

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $results;

    }
}
