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

Avec des conditions on gère si jamais le mdp ou le pseudo sont faux.

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
if ($results === []){
            return $results = "error";
        }else{
            echo "Success";
            return $results;
        }
        $pdoStatement->bindParam(":name", $name, PDO::PARAM_STR);
        $pdoStatement->bindParam(":password", $password, PDO::PARAM_STR);

        $pdoStatement->execute();

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        if ($results === []){
            return $results = "error";
        }else{
            echo "Success";
            return $results;
        }

    }
}

```


</details>
</details>

### Sous-étape 6 : Création du form de login

A partir d'ici on va arrêter de bosser sur la branche backoffice, puisqu'on passe sur le front. 

Si tout fonctionne on va alors merge ce travail sur notre branche de pre_prod. git checkout pre_prod pour bouger, et git merge backoffice pour fusionner le travail. 

On va rebasculer sur notre branche routeur, qui elle ne dispose pas du travail du backoffice, on va donc également merge. git checkout routeur puis git merge pre_prod

On va commencer par créer sur notre document HTML un bouton de connexion, et le form sera dans une modale. Ce bouton aura une bordure blanche, l'intérieur de la couleur de la navbar et aura une class "admin-panel", ce bouton devra ouvrir la modal. Ce bouton doit être dans le dropdown menu sur les petits ecrans. La modal devra avoir la class admin-access. Pour finir le bouton du form aura la class "connect". Et on ajoute sur la modal un bouton permettant de fermer la modale avec la class "connection-close".

On rajoute aussi une section avec l'id "admin-tpl"
Doc : 

https://getbootstrap.com/docs/4.3/components/forms/
https://getbootstrap.com/docs/4.0/components/buttons/

<details><summary>réponse</summary>

Navbar: 

```html
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <a class="navbar-brand" href="index.html"><span class="text-light">O</span><span
                    class="text-success bg-light border border-left-0 border rounded-circle">cook</span></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Viandes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Boeuf</a>
                            <a class="dropdown-item" href="#">Poulet</a>
                            <a class="dropdown-item" href="#">Tofu</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-success border-white admin-panel" data-toggle="modal"
                            data-target="#admin-access">Administrateur</button>
                    </li>
                </ul>
            </div>

        </nav>
```

Modal 

```html
  <div class="modal" id="admin-access" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Connexion</h5>
                    </div>
                    <form class="p-2">
                        <div class="form-group">
                            <label for="name">Pseudo</label>
                            <input type="name" class="form-control" id="name" aria-describedby="emailHelp"
                                placeholder="Pseudo">
                            <small id="nameHelp" class="form-text text-muted">User : ocook</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <small id="passwordHelp" class="form-text text-muted">Password : ocook</small>
                        </div>
                        <button type="submit" class="btn btn-primary connect" value="submit">Envoyer</button>
                        <button type="button connection-close" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

```

section :

```html
        <section id="admin-tpl">
        </section>
```
</details>

### Sous-étape 7 : Création de la page admin + adaptation de l'app JS


Notre page va commencer à devenir énorme, désolé! Mais on va éviter de rentrer dans des techniques bizarre d'incluse de HTML, et on va aussi éviter les requires PHP pour bien séparer les concepts, mais sachez que vous pouvez alléger l'index.html. On va continuer de le faire grossir en en créant 3 nouveau template.

On va faire un truc très très simple : 

2 boutons : Un bouton supprimer et un bouton ajouter une recette. Cette template s'appelera "admin-template"

On va uniquement gérer le jQuery permettant d'afficher ça quand le MDP est bon histoire de voir que ça fonctionne. 

On utilisera une fonction appelée "connect"
Si les champs ne sont pas renseignés on envoie une alert.
Sinon on fait une requête ajax. On récupère le nom et le rank comme prévu dans le model.
Si l'user est un admin on affiche la page avec les 2 boutons (page dégueulasse!).
dans cette fonction on bloquera le comportement pas défault du bouton submit, et on récupère les informations saisie.
On a utilisé la méthode GET dans le controlleur, on peut donc passer les pramètres directement dans l'URL.
Il faudra également déclencher un faux clic sur le bouton permettant de fermer la modal.
doc : 

https://api.jquery.com/event.preventdefault/
https://api.jquery.com/val/
https://api.jquery.com/trigger/

<details><summary>Réponse HTML</summary>

```html
<template id="admin-template">
    <div>
        <button type="button" class="btn btn-danger">Supprimer</button>
        <button type="button" class="btn btn-primary">Ajouter</button>
    </div>
</template>
```

</details>

<details><summary>Aide</summary>

Il faut d'abord empêche le bouton d'effectuer le submit avec un preventDefault

Ensuite récupérer les valeurs de name et password

Ensuite créer une condition pour vérifier que les champs ne sont pas vide si ils sont vide envoyer une alerte, sinon faire notre requête ajax vers API/user/admin?name="LE PSEUDO"&password="LE PASSWORD"
si c'est OK fermer la modale, enlever la template active et passer à la template de la page admin (on oublie pas de reharcger loadingEvent).
Si ça fail, afficher un message d'erreur.
<details><summary>réponse</summary>

``` js
   connect: (event) => {
        // on bloque l'effet par défault du bouton
        event.preventDefault();
        //on récupère les valeurs des champs inputs
        let name = $('#name').val();
        let password = $('#password').val();

        if (name == "" || password == "") {
            alert("Tous les champs doivent être remplis");
        } else {
            $.ajax({
                type: "get",
                url: `http://localhost/projet/Ocook/API/public/user/admin?name=${name}&password=${password}`,
            }).done((results) => {
                $.each(results, (index, result) => {

                    if (result.rank == "admin") {
                        $('.is-active').removeClass('is-active').addClass('is-inactive');
                        $('.connection-close').trigger('click')
                        let adminPanel = $('#admin-template').contents().clone()
                       $('#admin-tpl').append(adminPanel);
                        $(app.loadingEvent);

                    } else {
                        alert("vous n'êtes pas autorisé");
                    }
                   
                })
                

            }).fail(() => {
                $('#nameHelp').html("<p> Erreur, vérifiez vos identifiants");;
            });
            
            return false;
        }
    }
```

</details>
</details>

# BRAVO

On peut aller fièrement sur trello et boucler ce sprint, et on merge ça sur pre_prod!

Ce sprint qui fait pleurer du sang est terminé! On part en route vers le dernier sprint! 

[sprint 4](sprint4.md)