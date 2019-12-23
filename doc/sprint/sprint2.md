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
 
Pour ce sprint nous partirons d'une base de 2 semaines de travail au vue de la difficulté (je pense qu'il faut environ 16h max pour réussir cette partie)

On passe toutes ces cartes dans "sprint backlog" et on crée la carte "sprint 2" comportant la deadline.



## Avant de commencer 

Dans la doc du projet vous trouverez un jeux de fichier json, ce sont les fichiers qui nous serviront à faire fonctionner nos app Jquery avant que nous aillons construit notre API ;)

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
<!-- Mais vous allez me dire "on a pas fait la fausse route pour afficher toutes les recettes possédants un type d'ingrédient!" Et ne vous inquiétez pas, on n'en aura pas besoin. On utilisera notre API pour ça, en effet on utilisera la template de la main-page, mais ça vous le verez bientôt ;) 


### Sous-étape 4 : réafficher la page d'accueil 

Pour ce faire nous donnerons la classe "mainDisplay" au bouton permettant d'afficher la page d'accueil. Pourquoi cette classe? Car si nous devons plus tard (peut être très loin dans le futur) refaire des boutons permettant d'afficher la page d'accueil nous nous y retrouveront mieux. Nous n'oublions pas non plus d'utiliser l'attribut de bootstrap pour fermer la modal

## Etape 3 : Affichage des 6 recettes -->



<details><summary>Aide</summary>

<details><summary>réponse</summary>
</details>
</details>