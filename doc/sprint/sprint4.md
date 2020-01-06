# Sprint 4

C'est la dernière ligne droite! On a fait le plus dure!



## Trello 

Comme d'habitude on passe par l'organisation du trello. On archive toutes les cartes du derniers sprint.

On a plusieurs choix pour commencer, le côté admin ou le côté client ? On aurait pu faire ça en 2 sprint, mais ce ne sont pas des fonctionnalités très complexe alors on fera un dernier gros sprint.

On oublie pas également une chose : On a fait du cache misère avec nos fichiers JSON, il faudra les remplacer ;).

On va commencer avec ce que je pense le plus simple, notre dernière carte touchant au recipe! Il va falloir faire le controller, le modèle, la requête ajax, et cloner son template. Tout ce qu'on sait maintenant faire, je lui aurais mis une difficulté de 13. Je voulais partir sur 8, mais en tenant compte du temps, 13 me parait pas mal.

Côté back-office, pouvoir supprimer une recette ne me semble pas très dure. Il suffit de faire une requête permettant de supprimer de la base de donnée. Je pense à une difficulté de 5, mais il faudra à ça rajouté sa template & donc sa génération avec jQuery, donc 8.

Enfin, la possibilité d'ajouter une recette sera un peu plus long au niveau de la création de la template donc je dirais 13.

Un sprint d'une semaine (ou 16h de travail pour nous!) devrait suffir! HAVE FUN.



## Etape 1 : Réaliser notre controller et notre modèle pour TOUTES les routes.

On va commencer par le controller RecipeController. On récupère le nom de nos méthods dans nos routes sur App.php. Pour le recipecreate on appelera les setter du futur RecipeModel (setNOMDEMONELEMENT exemple : setName). Normalement vous avez 4 routes à faire. On cré

Pour les models, on va récupérer les noms des éléments de notre base de données pour nommer nos variables (protected pour que ça transite malgré le private). On fait les getters et setters pour chaque variable, et on code les méthodes nécessaire.

</details><summary>Correction getters/setters</summary>

<detail>

### Sous-étape 1 : Add de recette 

Surement notre requête la plus complexe.

#### Controller : 

Il faudra dans le controller récupérer en POST les différentes données à update insérer dans la BDD. On utilisera une méthode recipeCreate($params). On recevera un JSON avec l'id de la recette en retour ainsi qu'un petit message de succès.

On utilisera l'objet RecipeModel. On utilisera la méthode "insert" de cette objet pour push les informations en BDD

<details><summary>Aide</summary>

Récupérez dans des variables, les $_POST[''] de chaque ligne de la BDD.

Il faudra créer un objet RecipeModel, afin d'utiliser les getters et setters créé précédement, et enfin la méthode insert afin d'envoyer ces données dans la BDD. 


<details><summary>réponse</summary>

``` php

        $_POST['name'];
        $resume = $_POST['resume'];
        $cook = $_POST['cook'];
        $preparation = $_POST['preparation'];
        $ingredients = $_POST['ingredients'];
        $img = $_POST['img'];
        $recipe = new RecipeModel();
        // J'utilise les methodes de mon modèle pour remplir les lignes de ma BDD
        $recipe->setName($name);
        $recipe->setResume($resume);
        $recipe->setCook($cook);
        $recipe->setPreparation($preparation);
        $recipe->setIngredients($ingredients);
        $recipe->setImg($img);
        // Et je l'envoie en BDD
        $recipe->insert();
        //Je renvoie un petit JSON me confirmant le bon envoie
        $this->sendJson([
            "success" => true,
            "id" => $recipe->getId()
        ]);
```

</details>
</details>

#### Modele : 

/!\ Une fois le Modèle et le controller créé, vous pourrez utiliser postman pour vérifier que ton fonctionne. COllez le lien dans la barre d'url du logiciel, passez bien le verbe http en "POST", et allez dans l'onglet "body". Selectionnez "form-data" puis remplissez les champs Key avec les noms définie dans votre controller, et avec les valeurs de votre choix. Si un json vous est renvoyé c'est que ça fonctionne. /!\

Il faudra éxécuter la requête SQL ici.  On prépare bien son JSON serialize (dans réponse).
On fait une méthode insert qui permet de passer les données saisies en BDD. On peut utiliser "bindParam" pour sécuriser la requête SQL. Rien de très différent que ce qu'on a put faire pour la connexion admin, si ce n'est l'utiliser d' "INSERT".

<details><summary>Aide</summary>

``` sql
$sql = "INSERT INTO table (ligne1, ligne2, ..., ligneN) VALUES (:ligne1, :ligne2, :...,:ligneN)";
```

<details><summary>Réponse </summary>

Serialize : 

``` php
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
```

insert : 

```php
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
```

</details>
</details>


### Sous-étape 4: Modification de l'app JS

Quand on clic sur supprimer la liste de nos recettes avec un bouton delete.

Quand on clic sur le bouton ajouter un form permettant d'ajouter un titre, une image, un menu déroulant permettant de choisir son ingrédient, une textarea pour la partie préparation, et une textarea pour ajouter la cook.
</details>
</details>

<details><summary>Aide</summary>


<details><summary>réponse</summary>


</details>
</details>



