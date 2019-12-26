let app = {

    init: () => {

        $.ajax('doc/json_files/list.json').done((list) => {
            $.each(list, (index, list) => {
                let mainElement = app.generateListElement(list.name, list.resume, list.img, list.id);
                $('#tpl').append(mainElement);
            })

            $(app.loadingEvent);
        });



    },

    loadingEvent: () => {

        $('.recipeAccess').on('click', app.loadRecipe);
        $('.mainDisplay').on('click', app.mainPageDisplay);

    },

    generateListElement: (name, resume, img, id) => {

        let mainElement = $('#main-template').contents().clone()

        mainElement.find('.card-title').text(name);
        mainElement.find('.card-img-top').attr("src", img);
        mainElement.find('.card-text').text(resume);
        mainElement.find('.recipeAccess').attr('id', 'recipe-' + id);

        return mainElement;


    },

    loadRecipe: () => {

        $.ajax($.ajax('doc/json_files/list.json').done((list) => {
            $.each(list, (index, list) => {


                let recipeElement = app.recipePageDisplay(list.name, list.cook, list.id, list.preparation);

                console.log($(`a[id='recipe-${list.id}']`));
                console.log(list.id);

                if ($(`a[id='recipe-${list.id}']`).attr("id") == `recipe-${list.id}`) {

                    $('#recipe-tpl').append(recipeElement);
                }
            })

        })

        )
    },


    recipePageDisplay: (name, cook, id, preparation) => {




        let recipeElement = $('#recipe-template').contents().clone()
        //On retire le is-active des recettes
        $('.is-active').removeClass('is-active').addClass('is-inactive');

        // On rajoute la classe is-active à la page de recette

        $('.recipe-page').removeClass('is-inactive').addClass('is-active');

        recipeElement.find(".card-header").text("Recette : " + name);
        recipeElement.find(".cook").html(cook);
        recipeElement.find(".prepare").html(preparation);

        return recipeElement;




    },

    mainPageDisplay: () => {

        //On retire le is-active
        $('.is-active').removeClass('is-active').addClass('is-inactive');
        // On rajoute la classe is-active à notre main
        $('.main-page').removeClass('is-inactive').addClass('is-active');


    }
};

$(document).ready(app.init);