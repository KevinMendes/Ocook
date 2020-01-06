| Endpoint| HTTP Method | Donnée(s) | Comment |
|--|--|--|--|
| `/recipe` | `GET` | - | récupération de toutes les données |
| `/recipe/add` | `POST` | - | Ajout d'une recette |
| `/recipe/[id]/update` | `POST` | id, name, resume, update_at, cook, preparation, ingredients, img | Update d'une recette |
| `/recipe/[id]/delete` | `POST` | id, name | Supprime une recette |
| `/recipe/main` | `GET` | name, resume, create_at, img, id | Récupération des 6 dernières recettes pour la homepage  |
| `/recipe/[a:ingredient]/ingredient` | `GET` | name, resume, create_at, img, ingredients, id |  Récupération des recettes contenants l'ingrédients choisis, trié par date|
| `/recipe/[id]/cook/` | `GET` | name, cook, preparation, id |  Affichage de la recette voulue|
| `/user/admin` | `GET` | pseudo, password, rank |  Récupération des données admins|
