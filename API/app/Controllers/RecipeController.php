<?php

namespace ocook\Controllers;

use ocook\Models\RecipeModel;
// vrai nom c'est oKanban\Controllers\recipeController
class RecipeController extends MainController
{

    public function recipe(){
        $recipes = RecipeModel::findAll();
        $this->sendJson($recipes);
    }
    public function recipesIngredients($params)
    {
        $recipeIngredient = $params['ingredient'];
        // recupérer le model qui correspond a la table que je veux interoger
        $recipes = RecipeModel::findIngredients($recipeIngredient);
        // j'utilise la fonction showJson de la classe mere BaseController pour envoyer les données au client
        $this->sendJson($recipes);
    }
    public function recipeCreate($params)
    {
        // on récupère les données en POST pour ajouter de nouvelles lignes
        $name = $_POST['name'];
        $resume = $_POST['resume'];
        $cook = $_POST['cook'];
        $preparation = $_POST['preparation'];
        $ingredients = $_POST['ingredients'];
        $img = $_POST['img'];
        
        // On crée un objet = une ligne dans la BDD
        $recipe = new RecipeModel();
        // J'utilise les methodes de mon modèle pour remplir les lignes de ma BDD
        $recipe->setName($name);
        $recipe->setResume($resume);
        $recipe->setCook($cook);
        $recipe->setPreparation($preparation);
        $recipe->setIngredients($ingredients);
        $recipe->setImg($img);
        // Et je l'envoie en BDD
        $recipe->insert();
        // 
        $this->sendJson([
            "success" => true,
            "id" => $recipe->getId()
        ]);
    }

    public function recipeDelete($params)
    {
        $recipeId = $params['id'];

        $recipe = RecipeModel::find($recipeId);
        // j'envoi cette recipee au client grace a la methode sendJson()
        $recipe->delete();
    }

    public function recipeMain(){
        $recipe = RecipeModel::find6();
        $this->sendJson($recipe);
    }

    public function cook($params){

        $recipeId = $params['id'];
        // recupérer le model qui correspond a la table que je veux interoger
        $recipes = RecipeModel::findCook($recipeId);
        // j'utilise la fonction showJson de la classe mere BaseController pour envoyer les données au client
        $this->sendJson($recipes);
    }

}
