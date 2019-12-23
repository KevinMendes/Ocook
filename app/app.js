let app = {

    init: () => {
        
        $('.btn').on('click', app.recipePageDisplay)
        
    },

    recipePageDisplay: () =>{

        event.preventDefault();
        //On retire le is-active des 6 recettes
        $('.main-page').removeClass('is-active').addClass('is-inactive');

        // On rajoute la classe is-active à la page de recette

        $('.recipe-page').removeClass('is-inactive').addClass('is-active')

    },

    mainPageDisplay: (event) =>{

        

    }
};

$(app.init)