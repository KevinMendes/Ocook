<?php

namespace ocook\Models;

use ocook\Utils\Database;
use PDO;

class RecipeModel extends MainModel
{

    protected static $tableName = 'recipe';
    // j'ajoute les propriété qui correspondent au nom des colonnes de ma table
    protected $name; 
    protected $resume; 
    protected $cook; 
    protected $preparation; 
    protected $ingredients;
    protected $img;
    protected $create_at;
    protected $id;
        
    // les propriété commune a toutes les tables peuvent etre placées dans BaseMOdel
    // ici j'implemente la fonction jsonSerialize (je m'y était engagé car j'hérite de BaseModel qui LUI s'est engagé 'implements' à implémenter JsonSerializable)
    // cette fonction va renvoyer les données que l'on souhaite sérialiser sous forme d'un tableau associatif
    // cette fonction va etre automatiquement utilisée par json_encode() qui va essayer de la trouver avec de serialiser cet objet
    public function jsonSerialize()
    {
        // je crée mon tableau associatif avec toute les données de mon objet car je souhaite tout serialiser
        // ca ne serait pas le cas par exmeple si mon objet contenait un mot de passe
        $serializedObject = [
            "id" => $this->id,
            "name" => $this->name,
            "resume" => $this->resume,
            "cook" => $this->cook,
            "preparation" => $this->preparation,
            "ingredients" => $this->ingredients,
            "img" => $this->img,
            "created_at" => $this->created_at,
        ];
        // et je renvoi ce tableau
        return $serializedObject;
    }


    public function insert()
    {
       
        $sql = "INSERT INTO recipe (name, resume, cook, preparation, ingredients, img) VALUES (:name, :resume, :cook, :preparation, :ingredients, :img)";
        
        $pdo = Database::getPDO();
       
        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->bindParam(":name", $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(":resume", $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(":cook", $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(":preparation", $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(":ingredients", $this->name, PDO::PARAM_STR);
        $pdoStatement->bindParam(":img", $this->name, PDO::PARAM_STR);

        
        
        $pdoStatement->execute();
       
        if ($pdoStatement->rowCount() === 1) {
            //
            $this->id = $pdo->lastInsertId();
            
            return true;
        } else {
            
            return false;
        }
    }

    public function findIngredients (){

        $sql = "SELECT * FROM recipe WHERE ingredients = :ingredients";
        // je recupere PDO grace a la classe database
        $pdo = Database::getPDO();
        // j'execute ma requete grace a PDO
        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindParam(":ingredients", $this->name, PDO::PARAM_STR);
        // j'extrait mes resultats du pdoStatement
        // self fait reference à la classe dans laquelle nous sommes (ListModel)
        // et ::class me ermet de recupèrer le nom complet (avec namespace) de la classe
        $pdoStatement->execute($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        // je renvoi un tableau contenant toute les listes qui sont dans la BDD
        return $results;
    }
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of resume
     */ 
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     *
     * @return  self
     */ 
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get the value of cook
     */ 
    public function getCook()
    {
        return $this->cook;
    }

    /**
     * Set the value of cook
     *
     * @return  self
     */ 
    public function setCook($cook)
    {
        $this->cook = $cook;

        return $this;
    }

    /**
     * Get the value of preparation
     */ 
    public function getPreparation()
    {
        return $this->preparation;
    }

    /**
     * Set the value of preparation
     *
     * @return  self
     */ 
    public function setPreparation($preparation)
    {
        $this->preparation = $preparation;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of ingredients
     */ 
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set the value of ingredients
     *
     * @return  self
     */ 
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * Get the value of create_at
     */ 
    public function getCreate_at()
    {
        return $this->create_at;
    }

    /**
     * Set the value of create_at
     *
     * @return  self
     */ 
    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    }