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
            "GET",
            "/recipe/main",
            [
                "controllerName" => RecipeController::class, "methodName" => "recipeMain"
            ],
            "recipe-main"
        );
        $this->router->map(
            "GET",
            "/recipe/[a:ingredient]/ingredient",
            [
                "controllerName" => RecipeController::class, "methodName" => "recipesIngredients"
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
