# Sprint 2

Alors, la 1ere étape, pas trop compliqué? Parce que là on monte d'un niveau! :) 

On passe directement à ce qui en a fait pleurer plus d'un... JQUERY BADAM BADOUM

## Trello 

Côté Trello , on va organiser une fois de notre travail. Notre API est assez simple.
On veut récupérer les 6 dernières recette, et que jQuery nous les affiches sur la page d'accueil.

Dans un second temps, on veut que sur la page de recette, les butouns "c'est fait" déclenche des évènements. Nous n'oublions pas qu'un sprint doit servir à livrer de petit morceau fonctionnel et visible! On va donc pas tout faire d'un coup pour que notre client ait des updates régulières

Nous avons donc les cartes "jquery affichage de recette page d'accueil", "c'est fait me permet de cacher les ingrédients", "c'est fait m'ouvre un modal me souhaitant bon appétit", "le modal me permet de revenir à ma recette ou d'aller sur la page d'accueil"

L'apparition de la modal me semble le plus simple à gérer, je lui mettrais donc une difficuté de 1. On oublie pas qu'en méthodologie agile on explique ses choix extrême. Je pense qu'il ne suffit que d'écouter un évènement click, pour afficher la modale en lui changeant ça classe CSS (display: none -> display: contents) pour l'afficher, 
Le "c'est fait me permet de cacher les ingréddents" me semble tout aussi simple pour les mêmes raisons qu'au dessus. Il faudra juste pensé à un système pour remettre la liste d'ingrédient en cas d'erreurs je lui mettrais donc une difficulté de 3. Les boutons me semble un peu plus complexe encore, étant donné qu'il faut gérer l'affichage soit de l'accueil soit de la recette, je pense qu'une difficulté de 5 est adapté.

L'app permettant d'afficher les 6 recettes sur la page d'accueil tout en créant un lien vers la recette me semble cette fois beaucoup beaucoup plus dure... Je m'en arrache déjà ma calvitie! Je sais pas comment faire, je vais devoir lire ce fichue manuel... 34!

Je pense aussi qu'il faut gérer dès maintenant et en priorité l'aspect SPA (single page application), et donc travailler dessus en priorité pour ne pas se compliquer la vie plus tard... Ca me semble tout aussi dure, je lui met un 34!

Pour ce sprint nous partirons d'une base d'1 semaine de travail au vue de la difficulté (je pense qu'il faut environ 16h max pour réussir cette partie)



## Avant de commencer 

Dans la doc du projet vous trouverez un jeux de fichier json, ce sont les fichiers qui nous serviront à faire fonctionner nos app Jquery avant que nous aillons construit notre API ;)

# ATTENTION

IL FAUT ATTENDRE QUE LE SERVEUR CHARGE LA PAGE (Cc luc)! On oublie pas le côté asynchrone de JS! ;)