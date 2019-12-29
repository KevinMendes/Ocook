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


Pour user on aura besoin de l'id, du pseudo, du mot de passe, et du rang (user, admin, etc...)

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
INSERT INTO `users` (`id`, `pseudo`, `password`, `rank`) VALUES (NULL, 'ocook', SHA1('ocook'), 'admin');
```

<details><summary>réponse</summary>

doc/database
</details>
</details>

## Etape 2 : Création de l'API

Ca va être dure, courage! 

### Sous-étape 1 : Connecter la l'API à la BDD

### Sous-étape 2 : Préparation des dépendances 

### Sous-étape 3 : Réalisation de la DOC relative aux routes

### Sous-étape 4 : Création des routes

### Sous-étape 5 : Création des modèles et controllers

JSON + SESSION + COOKIE ?

### Sous-étape 6 : Création du form de login + adaptation de l'app JS

### Sous-étape 7 : Création de la page admin + adaptation de l'app JS

## Etape 3 : Remplacer le list.json par notre API

### Sous-étape 1: Ajout de routes dans la doc

### Sous-étape 2: Création des routes sur l'API

### Sous-étape 3: Création des models et controllers nécessaire

### Sous-étape 4: Modification de l'app JS
