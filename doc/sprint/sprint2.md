# Sprint 2

Alors, la 1ere étape, pas trop compliqué? Parce que là on monte d'un niveau! :) 

On passe directement à ce qui en a fait pleurer plus d'un... JQUERY BADAM BADOUM

# IMPORTANT

A partir d'ici nous n'allons plus bosser sur la branche master!

Nous allons créer une branche "pre_prod" qui nous servira à tester notre code "globale". Pour ce faire nous allons taper la commande suivante `git checkout -b pre_prod` 
Ensuite nous allons créer différentes branche en fonction du bout de code sur lequel nous bosserons! 

Quand vous voulez créer une nouvelle branche et la push sur github une erreure peut apparaitre avec en fin d'erreur la commande `git push --set-upstream origin pre_prod` proposée. Il suffit de faire cette commande pour résoudre le problème.

## Trello 

Côté Trello , on va organiser une fois de notre travail. Notre API est assez simple.
On veut récupérer les 6 dernières recette, et que jQuery nous les affiches sur la page d'accueil.

Dans un second temps, on veut que sur la page de recette, les butouns "c'est fait" déclenche des évènements. Nous n'oublions pas qu'un sprint doit servir à livrer de petit morceau fonctionnel et visible! On va donc pas tout faire d'un coup pour que notre client ait des updates régulières

Nous avons donc les cartes "jquery affichage de recette page d'accueil", "c'est fait me permet de cacher les ingrédients", "c'est fait m'ouvre un modal me souhaitant bon appétit", "le modal me permet de revenir à ma recette ou d'aller sur la page d'accueil"

L'apparition de la modal me semble le plus simple à gérer, je lui mettrais donc une difficuté de 1. On oublie pas qu'en méthodologie agile on explique ses choix extrême. Je pense qu'il ne suffit que d'écouter un évènement click, pour afficher la modale en lui changeant ça classe CSS (display: none -> display: contents) pour l'afficher, 
Le "c'est fait me permet de cacher les ingréddents" me semble tout aussi simple pour les mêmes raisons qu'au dessus. Il faudra juste pensé à un système pour remettre la liste d'ingrédient en cas d'erreurs je lui mettrais donc une difficulté de 3. Les boutons me semble un peu plus complexe encore, étant donné qu'il faut gérer l'affichage soit de l'accueil soit de la recette, je pense qu'une difficulté de 5 est adapté.

L'app permettant d'afficher les 6 recettes sur la page d'accueil tout en créant un lien vers la recette me semble cette fois beaucoup beaucoup plus dure... Je m'en arrache déjà ma calvitie! Je sais pas comment faire, je vais devoir lire ce fichue manuel... 34!

Je pense aussi qu'il faut gérer dès maintenant et en priorité l'aspect SPA (single page application), et donc travailler dessus en priorité pour ne pas se compliquer la vie plus tard... Ca me semble tout aussi dure, je lui met un 34! (Vous verrez qu'ici le plus dure est de se dire "comment je vais faire" plus que de l'appliquer! Et la conception fait partie du challenge). On va donc également ajouter la carte "SPA gestion des routes"
 
Pour ce sprint nous partirons d'une base de 2 semaines de travail au vue de la difficulté (je pense qu'il faut environ 21h max pour réussir cette partie)

On passe toutes ces cartes dans "sprint backlog" et on crée la carte "sprint 2" comportant la deadline.



## Avant de commencer 

Dans la doc du projet vous trouverez un fichier json, ce sont les fichiers qui nous serviront à faire fonctionner notre app Jquery avant que nous aillons construit notre API ;). Essayez d'abord de la créer vous-même avant de les utiliser.

# ATTENTION

IL FAUT ATTENDRE QUE LE SERVEUR CHARGE LA PAGE (Cc luc)! On oublie pas le côté asynchrone de JS! ;)

N'oubliez pas non plus d'effacer le cache à chaque manip js/css !  shift + F5

## Etape 1 : Installer jQuery

2 méthodes, installer directement jQuery, ou utiliser le MDN. A vous de choisir, dans mon cas j'utiliserais le CDN minifié (pas le slim).

https://code.jquery.com/

## Etape 2 : "Routing" 

Nous allons créer une nouvelle branche depuis la branche pre_prod. Pour voir vos branche tapez `git branch`, puis `git checkout NOMDELABRANCHE` pour aller dans la branche voulu. Dans notre cas `git checkout pre_prod`. Et nous allons créer et nous déplacer dans une nouvelle branche "router" `git checkout -b router` 

On va tricher un peu. Notre site aura peu de contenu alors nous n'allons pas créer un routeur à proprement parlé.


### Sous étape 1 : Initialiser notre app JS


Nous allons intégréer notre `<main>` de recipe.html à l'intérieur de index.html.
On les affichera à l'aide de 2 classes : is-active et is-inactive, jQuery viendra changer ses classes au besoin. Notre CSS permettra de cacher ou non les `<div>` possédant ses classes!

Je vous conseil également de leur donner la classe "main-page" pour la div regroupant les 6 recettes de la page d'accueil, et "recipe-page" pour celle ayant la div contenant le déroulé de la recette.

<details><summary>Aide</summary>
On utilisera "display" en CSS pour afficher ou non.
<details><summary>réponse</summary>

``` html
    <main>

        <!-- affichage des 6 recettes-->
        <div class="is-active main-page">
            <div class="container mx-auto my-4">
                <div class="row d-flex justify-content-around">
                    <div class="card col-lg-3 m-2">
                        <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                        <div class="card-body">
                            <h5 class="card-title">Tarte à la claque</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iure
                                consequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitae officia?
                                content.</p>
                            <a href="recipephp" class="btn btn-primary">Voir la recette</a>
                        </div>
                    </div>
                    <div class="card col-lg-3 m-2">
                        <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                        <div class="card-body">
                            <h5 class="card-title">Churros de m&m's</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                                ratione in repudiandae consequuntur ad repellendus vero numquam eius! Earum, eligendi!
                            </p>
                            <a href="recipe.php" class="btn btn-primary">Voir la recette</a>
                        </div>
                    </div>
                    <div class="card col-lg-3 m-2">
                        <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                        <div class="card-body">
                            <h5 class="card-title">Recette random #2</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                                ratione in repudiandae consequuntur ad repellendus vero
                                numquam eius! Earum, eligendi!</p>
                            <a href="#" class="btn btn-primary">Voir la recette</a>
                        </div>
                    </div>
                    <div class="card col-lg-3 m-2">
                        <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                        <div class="card-body">
                            <h5 class="card-title">Croquette pour oiseau</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                                ratione in repudiandae consequuntur ad repellendus vero
                                numquam eius! Earum, eligendi!</p>
                            <a href="#" class="btn btn-primary">Voir la recette</a>
                        </div>
                    </div>
                    <div class="card col-lg-3 m-2">
                        <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                        <div class="card-body">
                            <h5 class="card-title">Canard au Pierre</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                                ratione in repudiandae consequuntur ad repellendus vero
                                numquam eius! Earum, eligendi!</p>
                            <a href="#" class="btn btn-primary">Voir la recette</a>
                        </div>
                    </div>
                    <div class="card col-lg-3 m-2">
                        <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                        <div class="card-body">
                            <h5 class="card-title">O'clock's special cake</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
                                ratione in repudiandae consequuntur ad repellendus vero
                                numquam eius! Earum, eligendi!</p>
                            <a href="#" class="btn btn-primary">Voir la recette</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Affichage de la page recette -->
        <div class="is-inactive recipe-page">
            <div class="card border-success mx-auto my-4 w-75">
                <div class="card-header bg-success">Recette : dev en sauce</div>
                <div class="card-body">

                    <h5 class="card-title">Préparation des ingrédients</h5>
                </div>
                <ul class="list-group list-group-flush"></ul>
                <li class="list-group-item">
                    <p class="card-text">Etape 1 : Emincer un helper</p>
                </li>
                <li class="list-group-item">
                    <p class="card-text">Etape 2 : Couper en cube un dev</p>
                </li>
                <div class="card-body mx-auto">
                    <button type="button" class="btn btn-success">C'est fait</button>
                </div>


                <div class="card-body">
                    <h5 class="card-title">Cuisson</h5>
                </div>
                <ul class="list-group list-group-flush"></ul>
                <li class="list-group-item">Etape 1 : Mettre la préparation dans une vessie de jument</li>
                <li class="list-group-item">Etape 2 : Mettre à 1240° dans un volcan pendant 3 secondes</li>
                <div class="card-body mx-auto">
                    <button type="button" class="btn btn-success">C'est fait</button>
                </div>
            </div>
        </div>
        </div>
    </main>

```

``` css

.is-active {
    display: content;
}

.is-inactive {
    display: none;
}

```

</details>
</details>

Voilà c'est fait, on peut maintenant supprimer la "recipe.html", elle ne nous servira plus à rien!

Maintenant on va gérer l'affichage avec jQuery. On va à la racine de notre dossier, créer un dossier "app" et à l'intérieur un dossier "app.js". 

On n'oublie pas d'inclure ce fichier dans notre index.html.

Dans notre fichier app, nous allons créer un objet qui portera le nom de "app"

<details><summary> Déclaration</summary>

``` js
let app = {

};
```

</details>


On crééra une fonction flêchée "init" vide pour le moment, qui nous servira de "démarreur", puis en dehors de notre objet nous appeleront la fonction init.

<details><summary>Aide</summary>

```js
let app = {

    init: () => {
    }
};

$(app.init)
 ```

</details>


On va maintenant devoir se débrouiller pour lancer une fonction permettant de faire intervertir les deux div HTML. 

### Sous étape 2: changer de div

On va créer 2 fonctions, une nommée mainPageDisplay et une nommée recipePageDisplay. 

On va devoir intercepter l'évènement permettant d'aller vers une page de recette dans init, bloquer son comportement par défaut (sinon nous iront vers le lien), pour ensuite activer la fonction recipePageDisplay, qui nous permettra de cacher la main page pour afficher la div de la recette voulue. On utilisera une classe nommée "recipeAccess" sur les liens afin de pouvoir agir correctement dessus.

<details><summary>Aide</summary>

$(app.init)
Pour le passage vers les recettes on va devoir intercepter le clic sur les boutons. On va retirer la class is-active et la remplacer par is-inactive sur la classe main-page et inversement sur la class recipe-page. 

<details><summary>réponse</summary>

``` js
let app = {

    init: () => {
        $('.recipeAccess').on('click', app.recipePageDisplay)  
    },

    recipePageDisplay: () =>{

        event.preventDefault();
        //On retire le is-active des 6 recettes
        $('.is-active').removeClass('is-active').addClass('is-inactive');

        // On rajoute la classe is-active à la page de recette

        $('.recipe-page').removeClass('is-inactive').addClass('is-active')

    },

    mainPageDisplay: (event) =>{

    }
};
```

</details>
</details>

Pour pouvoir faire la suite nous allons devoir créer notre modal permettant de faire un retour à la recette, ou à la page d'accueil. Nous allons donc créer une modal avec la class "is-inactive" et les 2 boutons prévus (n'oubliez pas de passer les cartes dans Doing).

### Sous étape 3 : Création de la modale "bon appétit" 


Pour créer cette modal vous aurez besoin de la doc bootstrap : https://getbootstrap.com/docs/4.0/components/modal/


Vous pouvez très bien faire l'affichage de la modal à la main en jQuery, et aussi la fermeture de celle-ci mais bootstrap propose déjà de le faire, donc pourquoi ne pas l'exploiter ?

Pour l'identifier nous donneront l'id "bonAppetitModal" à la modal.

<details><summary>Aide</summary>
N'oubliez pas de modifier le dernier bouton de l'affichage de la recette pour ouvrir votre modal
<details><summary>réponse</summary>

La modal : 

``` html

        <div class="modal" id="bonAppetitModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bon appétit!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Retour à la page d'accueil</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
```

La modification du bouton : 

``` html

div class="card-body mx-auto">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bonAppetitModal">C'est fait</button>
                    </div>

```

</details>
</details>



### Sous-étape 4 : réafficher la page d'accueil 

Pour ce faire nous donnerons la classe "mainDisplay" au bouton permettant d'afficher la page d'accueil. Pourquoi cette classe? Car si nous devons plus tard (peut être très loin dans le futur) refaire des boutons permettant d'afficher la page d'accueil nous nous y retrouveront mieux. Nous n'oublions pas non plus d'utiliser l'attribut de bootstrap pour fermer la modal

<details><summary>Aide</summary>
Le data-dismiss du bouton close devrait vous aider à fermer la modal.
C'est presque la même chose que pour l'affichage de la recette.

<details><summary>réponse</summary>

Modification du bouton "retour à la page d'accueil"

```html
<div class="modal-footer">
    <button type="button" class="btn btn-primary mainDisplay" data-dismiss="modal">Retour à la page d'accueil</button>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
</div>

```

Changement d'affichage :

``` js
init: () => {
        $('.recipeAccess').on('click', app.recipePageDisplay);
        $('.mainDisplay').on('click', app.mainPageDisplay);

    },
mainPageDisplay: () =>{

        //On retire le is-active
        $('.is-active').removeClass('is-active').addClass('is-inactive');
        // On rajoute la classe is-active à notre main
        $('.main-page').removeClass('is-inactive').addClass('is-active');
    }
```

</details>
</details>

Mais vous allez me dire "on a pas fait la fausse route pour afficher toutes les recettes possédants un type d'ingrédient!" Et ne vous inquiétez pas, on n'en aura pas besoin. On utilisera notre API pour ça, en effet on utilisera la template de la main-page, mais ça vous le verez bientôt ;) 

Notre gestion des routes (en tout cas pour celle-ci) est FINIE :D
On a également fini la modale, et le retour à la page d'accueil depuis la modale. On peut donc passer ces 3 cartes en done!

## Etape 3 : Affichage des 6 recettes & selection de la recette

On passe notre carte "Jquery affichage recette page d'accueil" vers le doing.

On va compliquer techniquement les choses. Dans l'idéal on aimerait récupérer les données de l'API (qu'on a pas encore) pour afficher les bonnes choses. On va donc utiliser pour ça un fichier JSON qui simulera notre API.

On va également templater notre HTML (pas de la même manière qu'en php!), mais entre des balises `<template>`. On aura plus besoin par exemple de 6 div "dernière recette" mais d'une seule.

### Sous étape 1 : Création du fichier JSON


On aura besoin de l'id de la recette, de son résumé, de son titre, de ses ingrédients (viande),de sa cuisson et de ses étapes de préparation.

<details><summary>réponse</summary>

```json
[
    {
        "id": 1,
        "name": "Tarte au dev",
        "resume": "Lorem ipsum dolor sit amet consectetur adipisicing iureconsequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitaeofficia?content.",
        "img": "utils/images/img1.jpg",
        "ingredients": "Etape 1: émincer un dev <br> Etape 2: l'écraser",
        "cook": "Etape 1: l'ébouillanter <br> Etape 3 : le cracher"
    },

    {
        "id": 2,
        "name": "Pizza d'helper",
        "resume": "Lorem ipsum dolor sit amet consectetur adipisicing iureconsequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitaeofficia?content.",
        "img": "utils/images/img1.jpg",
        "ingredient": "poulet",
        "preparation": "Etape 1: émincer un helper <br> Etape 2: l'écraser",
        "cook": "Etape 1: l'ébouillanter <br> Etape 3 : le cracher"
    },
    {
        "id": 3,
        "name": "larme de sang au poulet",
        "resume": "Lorem ipsum dolor sit amet consectetur adipisicing iureconsequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitaeofficia?content.",
        "img": "utils/images/img1.jpg",
        "ingredient": "tofu",
        "preparation": "Etape 1: émincer un étudiant <br> Etape 2: l'écraser",
        "cook": "Etape 1: l'ébouillanter <br> Etape 3 : le cracher"
    },
    {
        "id": 4,
        "name": "AJAX en papillotte",
        "resume": "Lorem ipsum dolor sit amet consectetur adipisicing iureconsequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitaeofficia?content.",
        "img": "utils/images/img1.jpg",
        "ingredient": "poulet",
        "preparation": "Etape 1: émincer une fonction <br> Etape 2: l'écraser",
        "cook": "Etape 1: l'ébouillanter <br> Etape 3 : le cracher"
    },
    {
        "id": 5,
        "name": "PHP en pleure",
        "resume": "Lorem ipsum dolor sit amet consectetur adipisicing iureconsequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitaeofficia?content.",
        "img": "utils/images/img1.jpg",
        "ingredient": "dev",
        "preparation": "Etape 1: émincer un dev symfony <br> Etape 2: l'écraser",
        "cook": "Etape 1: l'ébouillanter <br> Etape 3 : le cracher"
    },
    {
        "id": 6,
        "name": "BDD desossée et caramélisée",
        "resume": "Lorem ipsum dolor sit amet consectetur adipisicing iureconsequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitaeofficia?content.",
        "img": "utils/images/img1.jpg",
        "ingredient": "boeuf",
        "preparation": "Etape 1: émincer une BDD <br> Etape 2: l'écraser",
        "cook": "Etape 1: l'ébouillanter <br> Etape 3 : le cracher"
    }
]
```

</details>

### Sous étape 2 : templating & AJAX

Le templating de notre HTML ne va pas être très dure. On va utiliser les balises templates auxquelles on va donner les ID "main-template" et "recipe-template", et on va aussi ajouter l'id 'tpl' à une de nos div (la bonne à vous de la trouver, pas au piff) qui nous servira à afficher nos différents résumés de recette, et une id 'recipe-tpl' à la balise section servant à afficher nos redette (qui ne doit pas être dans la template). Une seule carte de la page d'accueil suffira pour afficher nos 6 dernières recettes (vous commencez à voir comment on va gérer les recettes listées par viande? ;) ). On va devoir regarder du côté de notre fichier JS pour les utiliser. On oublie pas de mettre nos <template> au bon endroit.

Nos 6 dernières recettes doivent être affichée dès le chargement de la page. On va donc devoir charger nos cards de la page d'accueil directement dans le init, et on affichera tout ça grâce à un return. Qui dit return dit impossibilité de coder après ce return, on va donc créer une fonction "loadingEvent" qui nous servira en quelque sorte de controller pour la gestion de nos évènements CLICK. 

A l'aide de $.contents $.clones et $.append on affichera la template souhaitée. 


On va devoir changer la fonction recipePageDisplay pour aussi cloner sa template.

Et on oublie pas le plus important : IL FAUT ATTENDRE QUE LE SERVEUR CHARGE :) 

Ca va être compliqué pour la récupération de la bonne recette, et vous aurez besoin de cette page de doc: 

https://api.jquery.com/on/#on-events-selector-data-handler
https://api.jquery.com/attr/

<details><summary>Aide</summary>

On vire 5 des 6 cartes recette pour n'en garder qu'une qu'on entoure de `<template>` et on balise aussi la div contenant l'affichage de la recette.

Avant le return du init, on déclenche notre fonction loadingEvent qui devra contenir les fonctionnalités qu'on avait avant dans le init.

Il faut modifier la page recipePageDisplay pour charger nouvelle fonction loadingEvent pour être certains que nos différentes fonctionnalités soient disponibles.

On oublie pas d'ajouter un identifiant utilisant l'id de notre recette afin de pouvoir générer la bonne page de recette.

Pour la gestion des recettes c'est plus complexe, il faut récupérer l'ID de la carte sur laquelle on clic pour récupérer la bonne recette. Il faudra créer une fonction loadRecipe qui permet au clic du bouton d'afficher la bonne recette via notre fonction display correspondante.
Comme dit plus haut il faudra récupérer l'id, pour se faire on va utiliser un code semblable à ça : 

``` js
$('.maClassAFocus').on('click', function () {
            var maVariable = $(this).attr("id");
            $(app.maFOnction(maVariable))
        });
```

Cette manip permettra de joindre l'attribut id correspondant, il n'y aura plus qu'à le comparer via un IF dans notre loadRecipe. Si c'est OK afficher la carte.

Pour récupérer le bon ID, il faudra au moment du clic sur le bouton (qui est un lien) "Voir la recette" récupérer l'ID qui lui est attacher grâce à $.attr et le transmettre un loadRecipe().

<details><summary>réponse</summary>

``` JS
let app = {

    init: () => {

        $.ajax('doc/json_files/list.json').done((list) => {
            $.each(list, (index, list) => {
                let mainElement = app.generateListElement(list.name, list.resume, list.img, list.id);
                $('#tpl').append(mainElement);
            })

            $(app.loadingEvent);
        });



    },

    loadingEvent: () => {

        // je récupère l'ID correspondant à l'endroit où je clic et je transmet cette ID à loadrecipe
        $('.recipeAccess').on('click', function () {
            var eventId = $(this).attr("id");
            $(app.loadRecipe(eventId))
        });

        $('.mainDisplay').on('click', app.mainPageDisplay);
    },

    generateListElement: (name, resume, img, id) => {

        let mainElement = $('#main-template').contents().clone()

        mainElement.find('.card-title').text(name);
        mainElement.find('.card-img-top').attr("src", img);
        mainElement.find('.card-text').text(resume);
        mainElement.find('.recipeAccess').attr('id', 'recipe-' + id);

        return mainElement;


    },

    loadRecipe: (eventId) => {

        console.log(eventId);

        $.ajax('doc/json_files/list.json').done((list) => {
            $.each(list, (index, list) => {


                let recipeElement = app.recipePageDisplay(list.name, list.cook, list.id, list.preparation);


              // Je vérifie que mon tour sur la boucle correspond à l'id voulu, quand c'est le cas j'affiche la recette
                if (eventId === `recipe-${list.id}`) {


                    return $('#recipe-tpl').append(recipeElement);
                }
            })

        })

        )
    },


    recipePageDisplay: (name, cook, id, preparation) => {




        let recipeElement = $('#recipe-template').contents().clone()
        //On retire le is-active des recettes
        $('.is-active').removeClass('is-active').addClass('is-inactive');

        // On rajoute la classe is-active à la page de recette

        $('.recipe-page').removeClass('is-inactive').addClass('is-active');

        recipeElement.find(".card-header").text("Recette : " + name);
        recipeElement.find(".cook").html(cook);
        recipeElement.find(".prepare").html(preparation);

        return recipeElement;




    },

    mainPageDisplay: () => {

        //On retire le is-active
        $('.is-active').removeClass('is-active').addClass('is-inactive');
        // On rajoute la classe is-active à notre main
        $('.main-page').removeClass('is-inactive').addClass('is-active');


    }
};

$(document).ready(app.init);
```

``` html
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Ocook</title>
</head>

<body>
    <header>
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
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <!-- affichage des résumés de recette-->
        <section>
            <div>
                <div class="is-active main-page">
                    <div class="container mx-auto my-4">
                        <div class="row d-flex justify-content-around" id="tpl">

                        </div>
                    </div>

                </div>
        </section>
        <!-- affichage de la recette -->
        <section id="recipe-tpl">

        </section>
        <!-- MODAL BON APPETIT-->

        <div class="modal" id="bonAppetitModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bon appétit!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary mainDisplay" data-dismiss="modal">Retour à la
                            page d'accueil</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="bg-dark mb-0">
        <p class="text-light text-center mb-0 pt-2 pb-1">© 2076 Gandalf le Cuisto</p>
    </footer>
    <!-- END OF FOOTER-->
    <!-- Bootstrap CDN-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- jQuery CDN-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- homemade script-->
    <script src="app/app.js"></script>
</body>

<!-- affichage des 6 recettes-->
<template id="main-template">
    <div class="card col-lg-3 m-2">
        <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
        <div class="card-body">
            <h5 class="card-title">Tarte à la claque</h5>

            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
                iure
                consequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitae
                officia?
                content.</p>
            <a href="#" class="btn btn-primary recipeAccess" id="recipe-">Voir la recette</a>
        </div>
    </div>
</template>
<!-- Affichage de la page recette -->
<template id="recipe-template">
        <div class="is-inactive recipe-page">
            <div class="card border-success mx-auto my-4 w-75">
                <div class="card-header bg-success">Recette : dev en sauce</div>
                <div class="card-body">

                    <h5 class="card-title">Préparation des ingrédients</h5>
                </div>
                <ul class="list-group list-group-flush"></ul>
                <li class="list-group-item">
                    <p class="card-text">Etape 1 : Emincer un helper</p>
                </li>
                <li class="list-group-item">
                    <p class="card-text">Etape 2 : Couper en cube un dev</p>
                </li>
                <div class="card-body mx-auto">
                    <button type="button" class="btn btn-success">C'est fait</button>
                </div>


                <div class="card-body">
                    <h5 class="card-title">Cuisson</h5>
                </div>
                <ul class="list-group list-group-flush"></ul>
                <li class="list-group-item">Etape 1 : Mettre la préparation dans une vessie de jument</li>
                <li class="list-group-item">Etape 2 : Mettre à 1240° dans un volcan pendant 3 secondes</li>
                <div class="card-body mx-auto">
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#bonAppetitModal">C'est fait</button>
                </div>
            </div>
        </div>
</template>

</html>
```

## Etape 4 : Cacher les ingrédient

Ouf, cette fois on va faire plus simple! 

Au clic sur le bouton, on ajoute la class is-inactive à la bonne div. c'est tout ! :) On ajoutera la classe "ingredients" au bouton pour se faire.

On peut même aller plus loin et changer le bouton par un autre permettant de remontrer les ingrédients, mais dans ce cas il faudra créer une nouvelle fonction et l'appeler via le loadingEvent. On appelera la fonction à appeler ingredientsHide().

/!\ ON ATTEND QUE LE SERVEUR CHARGE :) 

</details>
</details>

<details><summary>Aide</summary>

Alors on c'est fait avoir par le côté asynchrone ?

Il faut appeler notre fonction permettant de cacher le bouton dans loadingEvent. Quand on affiche la page de la recette "loadingEvent" a chargé ces 2 fonctions :
``` js
 $('.recipeAccess').on('click', function () {
            var eventId = $(this).attr("id");
            $(app.loadRecipe(eventId))
        });

        $('.mainDisplay').on('click', app.mainPageDisplay);
```

mais ingredientsHide qui cherche le bouton avec la classe "ingredients" lui est bien chargé, mais sans savoir ou se trouve cette classe! Et oui sur la page d'accueil "ingredients" n'est qu'à l'état de template, JS ne va donc pas le chercher! Il faut alors dans à la fin de l'affichage de la page de la recette rappeler la fonction loadEvent. 

Et ça sera pareil au moment ou vous cachez le bouton! Si vous le réaffichez, JS ne connait pas le nouveau "ingredients" que vous allez réafficher! (Bon pour palier à ça pour pourriez passer par les basic effect $.hide() et $.show() mais je voulais aller au plus simple)


<details><summary>réponse</summary>

```JS
loadingEvent: () => {

        // je récupère l'ID correspondant à l'endroit où je clic et je transmet cette ID à loadrecipe
        $('.recipeAccess').on('click', function () {
            var eventId = $(this).attr("id");
            $(app.loadRecipe(eventId))
        });

        $('.mainDisplay').on('click', app.mainPageDisplay);

        $('.ingredients').on('click', app.ingredientsHide);
    },
    recipePageDisplay: (name, cook, id, preparation) => {




        let recipeElement = $('#recipe-template').contents().clone()
        //On retire le is-active des recettes
        $('.is-active').removeClass('is-active').addClass('is-inactive');

        // On rajoute la classe is-active à la page de recette

        $('.recipe-page').removeClass('is-inactive').addClass('is-active');

        recipeElement.find(".card-header").text("Recette : " + name);
        recipeElement.find(".cook").html(cook);
        recipeElement.find(".prepare").html(preparation);
        $(app.loadingEvent);

        return recipeElement;
    },

    ingredientsHide: () =>{
        
            $('.prepare').addClass('is-inactive');
            $('.ingredients').removeClass('ingredients').addClass('show').text("revoir");
            $('.show').on('click', function () {
                $('.prepare').removeClass('is-inactive');
                $('.show').removeClass('show').addClass('ingredients').text("C'est fait");
                $(app.loadingEvent);
            })
    },
```

</details>
</details>

# BRAVO ! 

Notre app front est presque finie, je vois dans le trello qu'il ne reste qu'à gérer l'affichage des recettes par ingrédients! On verra ça après notre API, le front commence à me donner mal à la tête! :) 

Il nous reste plus qu'à merge notre branch sur la branch pre_prod.

On va déjà commencer par commit et push notre travail sur la branch router.

Ensuite, on va se deplacer avec git checkout sur la branch pre_prod
Et sur cette branch on va fusionner le travail fait sur le router. On va taper git merge pre_prod
Il restera qu'à push cette branche :)

[sprint 3](sprint3.md)