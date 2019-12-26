let app = {

    init: () => {

        let mainElement = $('#main-template').contents().clone().appendTo('#tpl');
        $(app.loadingEvent);
        return mainElement;
    },

    loadingEvent: () => {
        $('.recipeAccess').on('click', app.recipePageDisplay);
        $('.mainDisplay').on('click', app.mainPageDisplay);

    },


    recipePageDisplay: (event) =>{

        event.preventDefault();

        let pageElement = $('#recipe-template').contents().clone().appendTo('#tpl');
        //On retire le is-active des recettes
        $('.is-active').removeClass('is-active').addClass('is-inactive');

        // On rajoute la classe is-active à la page de recette

        $('.recipe-page').removeClass('is-inactive').addClass('is-active');

        return pageElement;

    },

    mainPageDisplay: () =>{

        //On retire le is-active
        $('.is-active').removeClass('is-active').addClass('is-inactive');
        // On rajoute la classe is-active à notre main
        $('.main-page').removeClass('is-inactive').addClass('is-active');
        

    }
};

$(app.init)