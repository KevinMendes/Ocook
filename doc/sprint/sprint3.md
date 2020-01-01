# Sprint 3

C'est un sacré morceau qu'on vient de faire! Maintenant un peu de back !

# IMPORTANT

On va créer une autre branche : backoffice

git checkout -b backoffice

## Trello 

Comme d'habitude on passe par l'organisation du trello. On archive toutes les cartes du derniers sprint.

Commençons par le commencement, et concentrons nous sur la création et modélisation de la BDD. C'est une tâche importante minutieuse, et on doit en plus rédiger les docs. Je mettrais bien un 13 en terme difficulté. Plus par le temps que ça va prendre que par la difficulté à proprement parler. Ensuite, l'autre bout de code important pour pouvoir utiliser cette bdd, l'accès par MDP. Ca va être assez complexe! On va devoir créer la template du form de login, lier ce form à la BDD, créer le controller et le model, la route et enfin la template qui permettra plus tard de mettre nos autres fonctionnalités! Je propose une difficulté jamais atteinte de... 55! 

Pour ce sprint que 2 étapes, assez longue tout de même, je propose un sprint de d'une semaine! (Je pense à un travail effectif d'une vingtaine d'heure). On passe tout ça dans le sprint backlog, on créait notre carte de deadline et c'est partie! 



## Avant de commencer 

Essayez de modeliser la BDD par vous même, mais à la fin prenez la mienne (dans doc), juste pour être sûre que vous puissez faire la suite avec mes corrections.


## Etape 1 : Modélisation de la BDD

2 méthodes, installer directement jQuery, ou utiliser le MDN. A vous de choisir, dans mon cas j'utiliserais le CDN minifié (pas le slim).

On aura besoin de 2 tables 

User

Recipe


Pour user on aura besoin de l'id, du name, du mot de passe, et du rang (user, admin, etc...)

Même si on ne va pas faire le formulaire d'inscription, il le faut tout de même pour identifier l'admin.


Pour la table Recipe : 

Debrouillez vous :D

### Sous-étape 1 : MCD

Direction mocodo.

</details>
</details>

<details><summary>Aide</summary>
Table recipe : 

id
name
resume
img
ingredient
preparation
cook
create_at
update_at

Nos tables n'ont pas de lien. Mais nous aurions put penser à un id_author par exemple lié à l'id utilisateur nous permettant de faire une jointure afin d'afficher le nom de l'auteur! (Pourquoi pas dans une V2?).
<details><summary>réponse</summary>
Dans doc/database
</details>
</details>

### Sous-étape 2 : Dictionnaire des données

Pas d'aide particulière donner. Juste que le mot de passe sera encodé en SHA1 et l'encodage de cette colonne sera en ASCII pour éviter que l'utf-8 utilise 3 octets par caractère.
</details>
</details>

<details><summary>Aide</summary>
S06-E04 :)
<details><summary>réponse</summary>
Dans doc/database
</details>
</details>

### Sous-étape 3 : Création de la BDD

On oublie pas de créer une user et un password (ocook et ocook) dédié à cette table qu'on appellera Ocook.

Enfin dans la table user, nous allons créer une entrée, l'utilisateur ocook avec le mot de passe ocook hashé en sha1, et en rank admin (Nous utiliserons peu ce rang, mais il sert si vous souhaitez pousser un peu plus le projet).


### 

</details>
</details>

<details><summary>Aide</summary>

Pour la requête SQL : 

``` sql
INSERT INTO `users` (`id`, `name`, `password`, `rank`) VALUES (NULL, 'ocook', SHA1('ocook'), 'admin');
```

<details><summary>réponse</summary>

doc/database
</details>
</details>

## Etape 2 : Création de l'API
On peut deplacer dans done, la carte trello, et passer en doing notre dernière.

Ca va être dure, courage! 

### Sous-étape 1 : Connecter la l'API à la BDD

On va créer notre dossier API. On ne va travailler que dans ce dossier pour nous y retrouver un peu plus facilement dans l'arborescence.

On va d'abord se connecter à la database, vous aurez le fichier Database.php dans API/Utils et le htaccess et le fichier de configuration dans le dossier API/conf

/!\ Si vous regardez dans le fichier database.php vous verrez qu'il y a un namespace, si vous n'utilisez pas le même oubliez pas de l'update!

### Sous-étape 2 : Préparation des dépendances

Nous allons utilisez var-dumper, aultorouteur et autoload (psr-4).


/!\ Si vous récupérez les fichiers de correction  n'oubliez pas de toujours faire un dumpautoload.

<details><summary>Réponse</summary>

Créez le fichier composer.json suivant dans API :

```json
{
    "name": "ocook",
    "description": "Un super site de recette",
    "autoload": {
        "psr-4": {
            "ocook\\": "app/"
        }
    },
    "require": {
        "symfony/var-dumper": "^5.0",
        "altorouter/altorouter": "^2.0"
    }
}

```

Dans le terminal (dans votre dossier API!) tapez :

composer install

composer dumpautoload

</details>

De votre côté faite un fichier .gitignore à la racine de votre API, avec à l'intérieur un /vendor pour éviter de mettre le vendor sur github.

### Sous-étape 3 : Réalisation de la DOC relative aux routes

Un peu de doc avant de coder

On va créer un dossier "doc" dans notre dossier API, histoire de ne pas avoir à réouvrir les autres dossiers.

dedans on va créer un document routes.md et y ajouter nos routes

</details>
</details>

<details><summary>Aide</summary>

## Sprint 3

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `homeAction` | Dans les shoe | 6 dernière recette | Home page |

Complétez ce model

<details><summary>réponse</summary>

| Endpoint| HTTP Method | Donnée(s) | Comment |
|--|--|--|--|
| `/recipe` | `GET` | - | récupération de toutes les données |
| `/recipe/add` | `POST` | - | Ajout d'une recette |
| `/recipe/[id]/update` | `POST` | id, name, resume, update_at, cook, preparation, ingredients, img | Update d'une recette |
| `/recipe/[id]/delete` | `POST` | id, name | Supprime une recette |
| `/recipe/main` | `GET` | name, resume, create_at, img, id | Récupération des 6 dernières recettes pour la homepage  |
| `/recipe/ingredients` | `GET` | name, resume, create_at, img, ingredients, id |  Récupération des recettes contenants l'ingrédients choisis, trié par date|
| `/recipe/[id]/cook/` | `GET` | name, cook, preparation, id |  Affichage de la recette voulue|
| `/user/admin` | `GET` | pseudo, password, rank |  Récupération des données admins|


</details>
</details>

### Sous-étape 4 : Création des routes

Allez enfin un peu de code ouf (ou pas).

On va démarrer en partant du résultat voulu. (c'est une méthode de travail parmis tant d'autre).

On va créer un dossier public, dans lequel nous mettrons le fichier htaccess permettant de gérer les routes, ainsi que notre index.php qui va require l'autoload, et instancier l'objet App.

Le htaccess est dans le spoiler en dessous


<details><summary>Aide</summary>

``` md
RewriteEngine On

# dynamically setup base URI
RewriteCond %{REQUEST_URI}::$1 ^(/.+)/(.*)::\2$
RewriteRule ^(.*) - [E=BASE_URI:%1]

# redirect every request to index.php
# and give the relative URL in "_url" GET param
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?_url=/$1 [QSA,L]
```
<details><summary>réponse</summary>

index.php :

``` php
<?php

// Ceci est mon frontcontroller
require "../vendor/autoload.php";

use ocook\App;



$app = new App();

$app->handleRequest();

```

</details>
</details>

On va ensuite créer un dossier app au sein d'API, dans le quel nous allons deplacer notre dossier utils.

Dans app créez un fichier App.php. 

Commencez par ajouter le bon namespace, le use d'Altorouteur et créez la class App.

On va utilisez la variable $router, qui doit être utilisable dans tout le document.
On va faire un constructeur permettant d'utilisez Altorouteur & le rewriteUrl du .htaccess (vous trouverez ce constructure dans le spoil en dessous).

Nous allons créer une fonction initRoutes avec toutes nos routes travaillées dans la doc.
Dans ces routes nous allons devoir préciser les methodes utilisées et les controllers. Nous Pour nos controllers ce sera recipeControllers et userControllers. Votre ID va vous sortir plein d'erreur, c'est normal puisque nous n'avons pas créé les controllers et les models. On va alors rajouter directement les uses des deux controllers pour ne pas les oublier.

 Et une fonction handleRequest permettant de vérifier qu'il y a un match de nos routes et sinon renvoyer une 404

<details><summary>Aide</summary>

``` php
    
    protected $router;

 public function __construct()
    {
        $baseUri = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
        $this->router = new AltoRouter();
        $this->router->setBasePath($baseUri);
        $this->initRoutes();
    }

```


<details><summary>réponse</summary>

``` PHP
<?php

namespace ocook;

use AltoRouter;

use ocook\Controllers\RecipeController;
use ocook\Controllers\UserController;

class App
{


    protected $router;
    // init the app
    public function __construct()
    {
        $baseUri = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
        $this->router = new AltoRouter();
        $this->router->setBasePath($baseUri);
        $this->initRoutes();
    }



    private function initRoutes()
    {

        $this->router->map(
            "GET",
            "/recipe",
            [
                "controllerName" => RecipeController::class, "methodName" => "recipe"
            ],
            "recipe"
        );

        $this->router->map(
            "POST",
            "/recipe/add",
            [
                "controllerName" => RecipeController::class, "methodName" => "recipeCreate"
            ],
            "recipe-add"
        );
        $this->router->map(
            "GET",
            "/recipe/[i:id]/delete",
            [
                "controllerName" => RecipeController::class, "methodName" => "recipeDelete"
            ],
            "recipe-delete"
        );

        $this->router->map(
            "POST",
            "/recipe/[i:id]/update",
            [
                "controllerName" => RecipeController::class, "methodName" => "recipeUpdate"
            ],
            "recipe-update"
        );
        $this->router->map(
            "GET",
            "/recipe/main",
            [
                "controllerName" => RecipeController::class, "methodName" => "recipeMain"
            ],
            "recipe-main"
        );
        $this->router->map(
            "GET",
            "/recipe/ingredient",
            [
                "controllerName" => RecipeController::class, "methodName" => "recipeIngredient"
            ],
            "recipe-ingredient"
        );

        $this->router->map(
            "GET",
            "/recipe/[i:id]/cook",
            [
                "controllerName" => RecipeController::class, "methodName" => "cook"
            ],
            "recipe-cook"
        );


        $this->router->map(
            "GET",
            "/user/admin",
            [
                "controllerName" => UserController::class,
                "methodName" => "admin"
            ],
            "admin"
        );
    }
    // let run the app
    public function handleRequest()
    {
        $route = $this->router->match();

        if ($route) {
            $controllerName = $route['target']['controllerName'];
            $methodName = $route['target']['methodName'];

            $controller = new $controllerName();

            $controller->$methodName($route['params']);
        } else {
            header("HTTP:1.0 404 not Found");
            echo json_encode([
                "error_code" => 404,
                "reason" => "page not found"
            ]);
        }
    }
}
```

</details>
</details>

### Sous-étape 5 : Création des modèles et controllers

Nous allons créer 2 nouveaux dossier dans app : Controllers et Models.

JSON + SESSION + COOKIE ? $.get(mapagephp, function(data){ var bidule = ma var})

#### 1 : Les controllers

##### HS Technique :
Pour ceux qui ont du mal avec l'utilité du MVC, une tentative d'explication : 

La vue va gérer l'affichage de la page (donc chez nous notre vue est notre app front! :))
Le modèle permet d'effectuer les différentes requêtes nécessitant une manipulation des données. 
Le controlleur c'est un gros bordel qui gère un peu tout le reste (on aurait très bien pu y mettre nos routes, mais je trouve ça moins lisible), c'est la partie qui va controller (captain obvious) les saisie de l'utilisateur et qui va les réorientés au bon endroit (modèle, vue, etc...). C'est un peu notre chef de gare qui évite que tout ne dérail! 


Nous avons fait toutes les routes de tout notre projet pour être tranquille une fois pour toute. Mais là nous allons nous concentrer uniquement sur notre doing : Accéder à un panel sécurisé par mot de passe.

Nous allons créer notre MainController qui va nous servir à envoyer nos données sous forme de json à notre app front. On va avoir besoin du json_encode et du header.

https://www.php.net/manual/fr/function.json-encode.php
https://www.php.net/manual/fr/function.header.php
<details><summary>Réponse</summary>

``` PHP
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
```

</details>

Une fois que c'est fait nous allons passer à notre UserController. Notre UserController hérite du MainController.
On oublie pas le namespace. Nous devront aussi utiliser un modèle pour nos requêtes, ce model sera UserModel, on peut déjà ajouter son use. Dans nos route, nous avons précisé une méthode à utiliser, notre fonction devra donc porter ce nom.

Notre controller devra utiliser le UserModel, on oublie pas de faire un use.
Nous utiliseront le model "findAdmin" que nous créerons plus tard dans le UserModel.
On doit vérifier dans notre controller que name et password ont bien été renseigné.
Le controlleur devra récupérer les infos saisie en $_POST
On passe en paramètre name et password à la fonction findAdmin. On oublie pas que nous voulons récupérer un json.


<details><summary>Aide</summary>


Pour la route allez voir du côté de "methodName =>" pour utiliser les bons nom de methodes.

Les isset permette de vérifier que les champs sont biens passés.


<details><summary>réponse</summary>

MainController : 

``` php
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

```

UserController : 

``` php
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
```

</details>
</details>





#### 2 : Les models


/!\ Ca va être la phase la plus complexe; alors faites cette partie bien reposés! /!\

On va créer un MainModel et un UserModel.
Le main model permettra de faire hérité les autres models du USE PDO, mais permettra aussi de nous obliger à fournir certains élément. On va commencer par créer notre classe en abstract avec un implements JsonSerializable, permettra de nous forcer à faire un json_encode() (que nous avons déjà fait dans notre MainController), si ça n'est pas fait, une fatal erreure sera retournée. Ensuite un abstract de la fonction findAdmin, afin de nous forcer à créer findAdmin, sinon fatal error aussi.
Enfin nous puisque ce Model servira de donnateur à nos models qui en hériterons, nous créerons une petite variable nous permettant de récupérer la table sur la quelle nous travaillons, afin de pouvoir hériter correctement des fonctions communes si il y en a. (Spoiler, il n'y en aura pas, alors si vous voyez pas comment faire c'est que du bonus)

Le modèle UserModel s'occupera de faire la requête SQL et de renvoyer un tableau.
Dû au JsonSerialize, nous devont créer une méthod permettant à notre BaseControler de faire le json_encode(), que nous appelerons JsonSerialize().
On oublie pas de se lier à la BDD avec un use.
Il faudra alors aussi créer la method findAdmin (dû à l'abstract), faire notre requête, et faire un return du tableau.

/!\ On oublie pas les namespaces /!\


<details><summary>Aide</summary>

Pour le MainModel, on fait un use de JsonSerializable, un use de ocook\Utils\Database
On fait aussi un use PDO, afin de le transmettre à tous les héritiers.
Enfin on déclare la classe en abstract class et avec un implements de JsonSerialize

Pour le jsonSerialize, on utilise un array $serializeObject permettant de passer les différents éléments que nous souhaitons exploiter de la base de donnée au json_encode.

exemple :

``` php

$serializedObject = [
            "mamie" => $this->mamie,
            "age" => $this->age,
        ];
        // et je renvoi ce tableau
        return $serializedObject;
```
Pour le findAdmin, pas d'aide particulière, c'est assez compliqué mais vous savez le faire. On fait notre requête à l'aide des paramètres récupéré, on fetchAll et on retourne ce fetAll.

<details><summary>réponse</summary>


MainModel : 

``` php
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
```

UserModel :

``` php
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

```


</details>
</details>

### Sous-étape 6 : Création du form de login + adaptation de l'app JS

A partir d'ici on va arrêter de bosser sur la branche backoffice, puisqu'on passe sur le front. 

Si tout fonctionne on va alors merge ce travail sur notre branche de pre_prod. git checkout pre_prod pour bouger, et git merge backoffice pour fusionner le travail. 

On va rebasculer sur notre branche routeur, qui elle ne dispose pas du travail du backoffice, on va donc également merge. git checkout routeur puis git merge pre_prod




<details><summary>Aide</summary>


<details><summary>réponse</summary>


</details>
</details>
### Sous-étape 7 : Création de la page admin + adaptation de l'app JS

</details>
</details>

<details><summary>Aide</summary>


<details><summary>réponse</summary>


</details>
</details>

# BRAVO

Ce sprint qui fait pleurer du sang est terminé! On part en route vers le dernier sprint! 