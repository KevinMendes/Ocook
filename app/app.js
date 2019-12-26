let app = {

    init: () => {

        $.ajax('doc/json_files/list.json').done((list) => {
            $.each(list, (index, list) => {
                let mainElement = app.generateListElement(list.name, list.resume, list.img, list.id);

                $("#recipe-" + list.id).append(mainElement);


            })

            $(app.loadingEvent);
        });



    },

    loadingEvent: () => {

        console.log('test');
        $('.recipeAccess').on('click', app.recipePageDisplay);
        $('.mainDisplay').on('click', app.mainPageDisplay);

    },

    generateListElement: (name, resume, img, id) => {

        let mainElement = $('#main-template').contents().clone().appendTo('#tpl');

        mainElement.find('.card-title').text(name);
        mainElement.find('.card-img-top').attr("src", img);
        mainElement.find('.card-text').text(resume);

        return mainElement;


    },



    recipePageDisplay: (event) => {

        console.log(event);

        event.preventDefault();

        let pageElement = $('#recipe-template').contents().clone().appendTo('#recipe-tpl');
        //On retire le is-active des recettes
        $('.is-active').removeClass('is-active').addClass('is-inactive');

        // On rajoute la classe is-active à la page de recette

        $('.recipe-page').removeClass('is-inactive').addClass('is-active');

        return pageElement;

    },

    mainPageDisplay: () => {

        //On retire le is-active
        $('.is-active').removeClass('is-active').addClass('is-inactive');
        // On rajoute la classe is-active à notre main
        $('.main-page').removeClass('is-inactive').addClass('is-active');


    }
};

$(app.init)