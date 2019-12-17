# Ocook
Création d'un site factice regroupant des recettes de cuisine. Ce projet est à but éducatif. Ce cours est à destination des étudiants de l'école Oclock

Objectif : Assimiler git et github, comprendre et utiliser la POO, les API Rest, les requêtes AJAX, JQuery, html & css, bootstrap, SQL via phpmyadmin, structure MVC, méthodologie AGILE, templating et quelques élements de composer. (altorooter principalement)

##Avant propos
Prérequis
Avoir git installé et configuré, un serveur apache et une base de donnée mySql.

Notions de HTML, CSS, PHP, mySql, javascript, et POO.

Et oui c'est pas un cours, mais une application !

## Difficulté et aide
Afin de permettre à tous de réussir ce projet sans frustration, chaque étape va être définie en 3 niveaux de difficulté représentés par des spoilers.

Les étapes seront données en mode guidé, avec des informations basiques, comme par exemple le nom des variables à utiliser. Vous serez libre de faire à votre manière et si ça marche youpi. Si vous n'y arrivait pas vous aurez la possibilité de déplier les menus d'indices corresponds à l'étape. Dans ces derniers vous trouverez des liens renvoyant à la documentation (pour la partie dev). Dans ces mêmes indices, si vous n'y arrivez toujours pas, vous pourrez une fois encore déplier pour cette fois-ci obtenir la réponse de cette étape.

Sémantique
Comme je viens de le préciser, vous aurez les réponses fournies. Afin de ne pas être bloqué plus loin par un soucis de code différent rendant cette correction innutile je vous conseil soit, de remplacer votre code par celui-ci, en le relisant bien-sûr pour le comprendre, ce qui ne devrait pas être bien difficile si vous aviez déjà réussi de votre côté. La seconde solution, (mais qui peut tout de même potentiellement amener des problèmes sur la durée), sera de bien respecter les noms qui vous seront proposés pour les différentes variables et autres, et de bien respecter le contenu attendu dedans.

## Organisation
Ce projet est faisable seul. Si vous souhaitez vous perfectionner ou revoir des notions, il sera tout à fait adapté. Toutefois, l'organisation de ce projet sera également adapté à une petite équipe de développeurs (max 4) vous permettant de vous confronter au travail collaboratif.

# 1/ Commençons par le commencement
Puisqu'il s'agit d'un projet de dev, nous allons commencer par ne pas dev! Et oui, chaque chose en son temps, et commençons déjà par nous organiser! Je vous rassure nous allons faire vite!

## 1.1 Cahier des charges
Notre client souhaite réaliser un site internet responsive permettant à ses utilisateurs de pouvoir consulter ses recettes. Il a déjà pensé à un plan !

Page d'accueil : - Visuel : il souhaite que le site ressemble à cette maquette faite par son chien aveugle :

////AJOUTER LE VISUEL////
- Sur la page d'accueil les 6 dernières recettes qu'il a créé
- Quand on clique sur la carte d'une recette, on veut arriver sur la page correspondante à la recette
- Un menu déroulant permettant d'afficher différents-types d'aliment (poulet, boeuf, poisson, végétarien), renvoyant sur une page ressemblant à celle de l'accueil mais sans limitation de nombre de recette

Page de recette :

- La recette est faite en 3 étapes : Préparation des ingrédients, cuissons, et un message bon apétit
- Un bouton "c'est fait" doit être clicable, ce bouton doit réduire la totalité de l'étape "préparation des ingrédients", et doit être à nouveau visible en cas d'érreur en cliquant sur un bouton "revoir"
- Quand je clique sur le bouton "c'est fait" de la partie cuisson je veux qu'une modal s'ouvre avec pour message "Bon apétit!", un bouton permettant de revoir la recette si on a cliqué par erreur, et un bouton permettant d'aller à la page d'accueil.
AdminPanel :

- Le client souhaite pouvoir créer, modifier et supprimer ses recettes depuis un admin panel sécurisé par mot de passe.
## 1.2 Methodologie AGILE
### 1.2.1 Méthodologie Agile
(Ce qui va venir n'est qu'un copier coller raccourci du manifeste que vous trouverez en fin de ce point)
La méthodologie Agile est basée sur le manifeste Agile. Ce manifeste fait ressortir 4 points fondamentaux à ce moyen d'organisation.

L'équipe comme moteur, en effet l'équipe n'est pas un outil, mais le coeur du projet, les relations humaines doivent donc être travaillée, qui en sont les valeurs ;

L’application, on veut que ça marche, pas une documentation digne d'une notice de fusée nucléaire à refroissement par eau de mers gazeuse;

Avoir une relation avec le client, plus qu'une contractualisation. Ce dernier fait partie du processus de développement ;

S'adapter et accepter le changement plutôt que suivre le plan.

De ces 4 valeurs découlent 12 principes :

Satisfaire le client en livrant rapidement et régulièrement des solutions qui apportent de la valeur.

Accueillez chaleureusement les changements de besoins.

Livrez souvent des solutions opérationnelles.

Les personnes en charge du métier ou des affaires et les personnes en charge de la réalisation doivent travailler ensemble chaque jour.

Construisez les projets à partir de personnes motivées et donnez leurs en les moyens.

La conversation en face à face est la méthode la plus efficace et la plus économique pour donner des informations.

La disponibilité de solutions opérationnelles est la principale mesure d’avancement.

Les processus agiles encouragent à respecter un rythme soutenable lors de la réalisation.

Porter continuellement attention à l’excellence technique et à la qualité de la conception renforce l’agilité.

La simplicité – l’art de maximiser la quantité de travail qu’on ne fait pas – est essentielle.

Les meilleures architectures, les meilleures spécifications de besoins, et les meilleures conceptions émergent d’équipes auto-organisées.

À intervalles réguliers, l’équipe réfléchit aux façons de devenir plus efficace, puis modifie son comportement et l’ajuste en conséquence.

Rendez-vous sur le manifeste Agile. - Original : Manifesto for Agile Software Development pour voir son contenue un peu plus dévelppé de la chose. Ce que vous venez de lire

### 1.2.2 Scrum
Scrum, est la manière d'implémentation des méthodes Agile la plus connues, mais n'est pas la seule. Mais nous, on va se concentrer sur ça!

Le scrum est une mêlée de rugby. Mais pas de panique, on va rester assis.

Des équipes auto-organisée bossent sur un projet sur des phases durant de 1 à 4 semaines, ces phases s'appelent des "sprints". Un sprint a une date de début, et une date de fin, et n'est jamais repoussée, et on ne rajoute jamais de nouvelle tâche à un sprint. Fini ou non. Si ça n'est pas fini, retour à la 4 eme valeur de la méthode AGILE, on s'adapte.

En général une équipe est composés de 3 types de membre :

Product owner :
- Le responsable du produit, souvent un exper du métier qui est là pour représenter le client. Il n'est pas forcément un membre de la société qui s'occupera du développement. Il assure le retour sur investissement.
Scrum master
- Il est le responsable du projet, il s'assure du respect de la méthodo et des postes, et ne dois surtout pas être le product owner.
Équipe
- Pluridisciplinaire, elle ne regroupe pas que des devs, mais aussi les services RH, les analystes, les designers, le gentils personnels en charge de l'entretien des locaux et qui nous permet de bien travailler (ok je pousse un peu loin, mais ils participent aussi à la réalisation des projets! Et je range de suite mon panneau de bisounours), etc ..., ils construisent le produits et travaillent TOUS ensemble pour permettre d'atteindre les objectifs.
L'équipe et le Scrum Master, se réunissement pour déterminer la durée et ce qui devra être fait durant ce sprint pour réaliser des livrables tangibles. L'équipe se réunit également chaque jour, pour rapidement pour expliquer ce qu'ils vont faire dans la journée, ce qui leur a posé problème la veille.

#### 1.2.3.1 Product Backlog
On y détermine tout ce qui doit être fait, c'est un document qui sert de feuille de route et qui est maintenu par le product owner. Ce document doit être fait d'une manière clair.

Priorité	Élement	Détails	Effort	Sprint
1	En tant que ... je veux ...	...	5	1
2	Amélioration des performances de ...	...	13	3
3	Mise à jour des serveurs ...	...	8	1
4	En tant que ... je veux ...	...	21	2
...	...	...	-	-
L'effort et le sprint sont bien sûr édité par l'équipe.

#### 1.2.3.2 Sprint Backlog
Le Sprint Backlog est le Todo, des éléments identifés dans le product backlog et qui vont être fait durant le sprint.

Les phases
Sprint planning
On rassemble toute l'équipe pour poser le planning de ce qui doit être fait. Elle ne doit pas prendre plus d'une journée. On y estime la difficulté des tâches à faire afin d'y adapter le planning.

Planning Poker
Permet de déterminer la complexité d'une tâche de façon ludique
La complexité est définie par l'ensemble de l'équipe
Amène un échange entre les différents intervenants
Plus la tâche est longue ou complexe, moins la mesure est précise
Déroulement
On utilise la suite de finobacci (1,2,3,5,8,12,31,34,55,89) pour déterminer la difficulté des tâches à venir.

On sélectionne une tâche semblant simple pour qu'elle serve d'étalon à la quelle nous donnerons une valeure.

    (copité collé de votre cours sur le scrum) 
Ensuite, pour chaque tâche :

Le PO explique la tâche
Chacun choisit une carte (avec un numéro de la suite) et la pose face cachée
Les cartes sont toutes retournées en même temps
Si tout le monde est d'accord, on choisit cette mesure, sinon les extrêmes expliquent les raisons de leur choix
On revient à l'étape 2 jusqu'à l'unanimité
Daily Scrum
La fameuse réunion ou on explique nos difficultés et ce qu'on va faire vu plus haut.

Sprint review
Une réunion de fin de sprint, un peu plus longue, environ 1 heure avec l'équipe.

    (copier coller de votre cours sur le scrum; vous sentez la flemme arriver ?)
Objectifs : Rappels des objectifs du sprint (roadmap, étapes, ...)
Statut : Items planifiés, achevés ou non, changement de priorité, ...
Démo : Démo de quelques fonctionnalités, feedback
Stats : Statistiques du sprint (efficacité, retard / avance)
BLocage : Éventuels points bloquants, risques découverts pendant le sprint
Feedback : Retour sur le sprint écoulé et quelques infos sur le sprint suivant
Sprint retrospective
Pareil qu'avant environ 1h avec toute l'équipe en fin de sprint

    (copier coller de votre cours sur le scrum; vous sentez la flemme s'installer ?)
Prévision : Le sprint s'est passé comme ça... que faut-il prévoir pour les suivants ?
Processus : Le process est le suivant... qu'est ce qui peut être amélioré (communication, docs, infos)
Stats : Les stats ont montré une situation... va t-elle durer, s'améliorer, empirer ?
Les outils
Nous utiliseront Trello pour nous organiser

Pour plus d'information sur le Scrum framework

## 1.3 Trello
Enfin un peu de pratique!

Nous allons créer un tableau Trello et y inviter tous les membres de l'équipe.

Dans ce trello nous auront besoin de créer 4 listes : Product Backlog, Sprint Backlog, Doing, Done.

Nous allons créer une première carte pour nous entrainer dans le product backlog, que nous appeleront "préparation Trello"

1.3.1 Préparation de l'environnement
Sur la carte que nous venons de créer, cliquer sur le petit icône en forme de crayon, et dans le menu qui s'ouvre cliquez sur "Modifier les étiquettes". Nous allons ajouter les chiffres suivants 1,2,3,5,8,12,31,34,55 aux étiquettes, pour cela cliquez sur "créer une nouvelle étiquettes". Attention, les couleurs sont données dans l'ordre d'affichage par trello, alors créais les dans l'ordre des couleurs! Et comme nom donnez leur les numéros les un après les autres. Ces étiquettes nous serviront pour la difficulté des tâches de notres sprints.

Créez deux nouvelles étiquettes l'une nomée BackOffice, qui nous servira à référencer ce qui ne sera pas visible par le visiteurs, une autre nomée Template, qui nous servira à créer les éléments visuel en HTML, et l'une nomée Recipe (on va faire une site de cuisine hein!), qui nous servira à identifier les cartes relevants de l'application "visuel".

Archiver cette carte.

### 1.3.2 Préparation du ProductBaclog
Voilà maintenant, on va préparer notre Product Backlog qui servira à tout notre projet. Nous allong également ajouter les labels correspondant qui seront donnés entre parenthèse, certains n'en auront pas, c'est normal

### 1.3.2.1 L'intégration
Première étape on doit penser à l'intégration. On va créer une première carte "Intégration maquette page d'accueil" (template) et une seconde "intégration maquette page de recette" (template). On utilisera celle de l'accueil pour les pages catégories, donc pas besoin de l'intégrer.

Nous devront ensuite templater cette intégration, noous allong donc créer une carte "templating de l'intégration".

### 1.3.2.2 BDD
C'est un site composé de recettes, nous allons donc créer une BDD pour les récupérer. Créez une carte "Modélisation et création de la BDD" (backoffice)

#### 1.3.2.2 font-end
#### 1.3.2.1 jQuery
Notre site va utiliser plusieurs petites app jQuery.

Une pour gérer l'affichage des recettes sur la page d'accueil. Créez une carte Jquery affichage recette page d'accueil (template) (recipe)

Une pour l'afficage du bouton "c'est fait" la demande vient directement d'une user story on créait alors une carte "en tant qu'utilisateur je veux avoir un bouton "c'est fait me permettant de cacher la préparation des ingrédients" -Une "en tant qu'utilisateur je veux avoir un bouton "c'est fait" me permettant d'ouvrir une modale me souhaitant un bon appétit" -Une "en tant qu'utilisateur je veux que cette modale ait un bouton me permettant de revenir à ma recette, ou à la page d'accueil"

#### 1.2.1.2 Bootstrap
En tant qu'utilisateur je veux avoir un menu me permettant de sélectioner un type de produit et afficher ces recette sur une nouvelle page (recipe) (template)
#### 1.3.2.3 BackOffice
On reprend notre user story et on accélère.

En tant qu'administrateur je veux accéder à un panel sécurisé par mot de passe (backoffice)
En tant qu'administrateur je veux pouvoir ajouter une recette à mon site (backoffice)
En tant qu'administrateur je veux pouvoir modifier une recette (backoffice)
En tant qu'administrateur je veux pouvoir supprimer une recette (backoffice)
Un gros titre pour un point important
Si vous travaillez en équipe vous n'êtes pas obligé de suivre les sprints dans le même ordre, ou même de faire les mêmes sprint! A vous de juger

# 2 1er Sprint
Ouf on va enfin coder! C'est partie pour les joies de l'intégration.

## 2.1 Organisation du sprint
INFO DU JOUR
Notre client à oublié de préciser! Il veut un footer en plus, une simple bande noir avec écrit en blanc "Copyright Ocook"! Oubliez pas d'ajouter une carte trello "en tant que client je veux avoir un footer noir avec écrit en blanc copyright Occok sur toutes mes pages" avec le label correspond!

FIN DE L'INFO DU JOUR

Je vous propose un sprint d'une semaine pour ce premier. En effet il ne sera question que d'intégration, il devrait être assez rapide. Cette carte nous servira pour la deadline. Une semaine de travail correspond à 5 jours, je vous propose de compter 5 jours à partir du début de ce sprint pour générer la deadline. Pour afficher une deadline, cliquez sur cette carte, et choisissez "Date limite" dans les options. Si vous travaillez à plusieurs, n'oubliez pas le daily scrum chaque jours.

Nous allons créer une carte "Sprint 1" dans sprint Backlog 4 tâches se démarque : Templating de l'intégration, intégration page d'accueil et intégration page recette, et l'ajout du footer (et oui le sprint n'a pas commencé on peut l'ajouter). On va alors les ajouter à notre sprintBacklog (un simple glissé déposé depuis la partie Productbacklog)

Le templating me semble être la partie la plus simple de ce sprint, il ne s'agit que de découper notre fichier HTML dans des fichiers PHP. Je lui donnerait bien la difficulté de 1. Ensuite, pour l'intégration de la maquette de la page d'accueil, il va falloir créer toutes la navbar et tous le contenu! Je trouve ça bien plus difficile et chronophage, alors j'aurais mis un bon gros 13. Le footer on va le rajouter directement dans cette page, et ça n'est qu'une ligne, pour moi ça vaut également 1 ou au mieux 3. Allez on va dire 1, parce que je suis seul dans mon équipe, et je trouve que 2 balises HTML c'est pas bien dur.

Pour la maquette de la recette c'est déjà plus complexe. Au final le header et le footer, seront les mêmes que sur la page d'accueil, donc je n'aurais que le corps à coder. Alors j'aurais mis un 8 car ça reste tout de même complexe, surtout que ce sera en 3 parties! (préparation, cuisson, et le modal)

## 2.2 Réalisation du sprint
On oublie pas de déplacer la carte sur la quelle on travail dans "doing".

On va commencer par l'intégration de la page d'accueil.

### Etape 1 Structure de la page

On créait la structure basique avec le head et body.
On y inclu le CDN de bootstrap

### Etape 2 navbar

Dans la balise adapté dans le body, on créait notre navbar

### Etape 3 body

### Etape 4 footer

### Etape 5 page recette

Indices
A rajouter en cours de prod
composer require symfony/var-dumper
composer require altorouter/altorouter
composer dump-autoload

