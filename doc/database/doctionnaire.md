## Recettes (`recipes`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de notre recette|
| name | VARCHAR(255) | NOT NULL |Le titre de la recette|
| resume | TEXT | NOT NULL|Le résumé de la carte|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de la recette|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la recette|
|cook|TEXT|NOT NULL|Etape de préparation de la recette|
|preparation|TEXT|NOT NULL|Les étapes de préparations des ingrédients de la recette|
|img|varchar(255)|NOT NULL|Lien vers l'image|
|ingredients|VARCHAR(40)|NOT NULL|L'ingrédient carné ou tofu attaché à la recette|

## Utilisateurs (`users`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
| id |INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la liste|
| pseudo | VARCHAR(30) | NOT NULL |Le nom de l'utilisateur|
| password | VARCHAR(40) | ASCII |NOT NULL, UNSIGNED |Stockage du mot de passe en SHA1 sans salt encodé en ASCII|
| rank |VARCHAR(40)|NOT NULL|Rang de l'utilisateur (admin ou utilisateur)|