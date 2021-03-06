<?php

namespace ocook\Models;

use JsonSerializable;
use ocook\Utils\Database;
use PDO;

abstract class MainModel implements JsonSerializable
{
    static protected $tableName;

    // une methode abstract permet d'obliger les enfant de cette classe a declarer une methode find($id)
    abstract public function findAdmin($name, $password);
}