# Avant de commencer 

Vous avez un dossier de correction pour chaque sprint, évitez de vous spoil ! :) 

# 2 1er Sprint
Ouf on va enfin coder! C'est partie pour les joies de l'intégration.

## 2.1 Organisation du sprint
INFO DU JOUR
Notre client à oublié de préciser! Il veut un footer en plus, une simple bande noir avec écrit en blanc "Copyright Ocook"! Oubliez pas d'ajouter une carte trello "en tant que client je veux avoir un footer noir avec écrit en blanc copyright Occok sur toutes mes pages" avec le label correspond!

FIN DE L'INFO DU JOUR

Je vous propose un sprint d'une semaine pour ce premier (bon en réalité vous aurez besoin que de quelques heures, mais on va respecter la méthodo!). En effet il ne sera question que d'intégration, il devrait être assez rapide. Cette carte nous servira pour la deadline. Une semaine de travail correspond à 5 jours, je vous propose de compter 5 jours à partir du début de ce sprint pour générer la deadline. Pour afficher une deadline, cliquez sur cette carte, et choisissez "Date limite" dans les options. Si vous travaillez à plusieurs, n'oubliez pas le daily scrum chaque jours.

Nous allons créer une carte "Sprint 1" dans sprint Backlog 4 tâches se démarque : Templating de l'intégration, intégration page d'accueil et intégration page recette, et l'ajout du footer (et oui le sprint n'a pas commencé on peut l'ajouter). On va alors les ajouter à notre sprintBacklog (un simple glissé déposé depuis la partie Productbacklog)

Le templating me semble être la partie la plus simple de ce sprint, il ne s'agit que de découper notre fichier HTML dans des fichiers PHP. Je lui donnerait bien la difficulté de 1. Ensuite, pour l'intégration de la maquette de la page d'accueil, il va falloir créer toutes la navbar et tous le contenu! Je trouve ça bien plus difficile et chronophage, alors j'aurais mis un bon gros 13. Le footer on va le rajouter directement dans cette page, et ça n'est qu'une ligne, pour moi ça vaut également 1 ou au mieux 3. Allez on va dire 1, parce que je suis seul dans mon équipe, et je trouve que 2 balises HTML c'est pas bien dur.

Pour la maquette de la recette c'est déjà plus complexe. Au final le header et le footer, seront les mêmes que sur la page d'accueil, donc je n'aurais que le corps à coder. Alors j'aurais mis un 8 car ça reste tout de même complexe, surtout que ce sera en 3 parties! (préparation, cuisson, et le modal)

## 2.2 Réalisation du sprint

On oublie pas de déplacer la carte sur la quelle on travail dans "doing".

On va commencer par l'intégration de la page d'accueil.

### Etape 1 Structure de la page

On créait la structure basique avec le head et body.

On y inclu le CDN de bootstrap
<details><summary>Débuter avec bootstrap</summary>
https://getbootstrap.com/docs/4.3/getting-started/introduction/
</details>

### Etape 2 navbar

Dans la balise adapté dans le body, on créait notre navbar

On oublie pas, on est des VRAIS dev, on pense alors mobile first! (ctrl + shift +i; puis ctrl + shift + m pour tester votre site en différent format).
En mobile nous voulons un menu burger, qui devient automatiquement un dropdown menu en format laptop (1024x520).

<details><summary>Un peu d'aide avec bootstrap?</summary>



https://getbootstrap.com/docs/4.3/components/navbar/

Pour le logo et le bg : 

https://getbootstrap.com/docs/4.0/utilities/colors/
https://getbootstrap.com/docs/4.0/utilities/borders/

<details><summary>Solution</summary

<details><summary>Navbar</summary>
``` html
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <a class="navbar-brand" href="#"><span class="text-light">O</span><span
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
    ```
</details>

</details>
</details>
### Etape 3 main

On veut un background avec un gradient. Sur ce body, on notre client veut voir afficher les 6 dernieres recette. On en disposera 3 par ligne sur 2 lignes. En format mobile <576px on ne veut qu'une carte par ligne, et à 768px nous en voulons 2 par ligne. on en veut seulement 2.
Ces 6 recettes prendront la forme de carte, avec d'abord une image en height 180px, un titre, une courte description et un lien vers la recette.

<details><summary>documentation utiles</summary>
Pour le background https://developer.mozilla.org/fr/docs/Web/CSS/linear-gradient

Pour les cartes et la gestion de leur disposition :
https://getbootstrap.com/docs/4.0/layout/grid/
https://getbootstrap.com/docs/4.0/components/card/
https://getbootstrap.com/docs/4.0/utilities/spacing/

Pour la taille des images :
https://www.w3schools.com/css/css_dimension.asp
<details><summary>Solution</summary>
</details>
``` html
    <main>
        <div class="container mx-auto my-4">
            <div class="row d-flex justify-content-around">
                <div class="card col-lg-3 m-2">
                    <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                    <div class="card-body">
                        <h5 class="card-title">Tarte à la claque</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iure consequatur aperiam repudiandae ipsam exercitationem dolorum rem quaerat vitae officia?
                            content.</p>
                        <a href="#" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
                <div class="card col-lg-3 m-2">
                    <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                    <div class="card-body">
                        <h5 class="card-title">Churros de m&m's</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ratione in repudiandae consequuntur ad repellendus vero numquam eius! Earum, eligendi!
                            </p>
                        <a href="#" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
                <div class="card col-lg-3 m-2">
                    <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                    <div class="card-body">
                        <h5 class="card-title">Recette random #2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ratione in repudiandae consequuntur ad repellendus vero
                        numquam eius! Earum, eligendi!</p>
                        <a href="#" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
                <div class="card col-lg-3 m-2">
                    <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                    <div class="card-body">
                        <h5 class="card-title">Croquette pour oiseau</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ratione in repudiandae consequuntur ad repellendus vero
                        numquam eius! Earum, eligendi!</p>
                        <a href="#" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
                <div class="card col-lg-3 m-2">
                    <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                    <div class="card-body">
                        <h5 class="card-title">Canard au Pierre</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ratione in repudiandae consequuntur ad repellendus vero
                        numquam eius! Earum, eligendi!</p>
                        <a href="#" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
                <div class="card col-lg-3 m-2">
                    <img class="card-img-top center mt-1" src="utils/images/img1.jpg" alt="Churos">
                    <div class="card-body">
                        <h5 class="card-title">O'clock's special cake</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis ratione in repudiandae consequuntur ad repellendus vero
                        numquam eius! Earum, eligendi!</p>
                        <a href="#" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
            </div>
        </div>
    </main>```

    ``` css
/** GENERAL CSS **/
    html {
        padding: 0;
        margin: 0;
    }
    body {
        font-size: 18px;
        background: rgb(115,62,5);
        background: linear-gradient(90deg, rgba(115,62,5,1) 0%, rgba(190,85,9,1) 100%, rgba(230,144,31,1) 100%);

    }
/** CARD CUSTOM CSS **/
    .card{
        width: 18rem;
    }

    .card-img-top{
        max-height: 180px;
        width: auto;
    }
    ```
</details>
</details>

### Etape 4 footer

Rien de bien compliqué ici, vous aurez aucune aide. 

### Etape 5 page recette

On est de VRAI dev! Alors on fait des copiers collés ! :D 

Rien de bien différent, les spoilers précédents ou ce que vous avez déjà fait suffirant!
Allez je suis gentil pour les bouttons en bootstrap.
<details><summary>Button</summary>
https://getbootstrap.com/docs/4.0/components/buttons/

<details><summary>Solution</summary>
    ``` html
        <main>
        
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
        
    </main>
    ```
</details>
</details>
