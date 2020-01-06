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

        // je récupère l'ID correspondant à l'endroit où je clic et je transmet cette ID à loadrecipe
        $('.recipeAccess').on('click', function () {
            var eventId = $(this).attr("id");
            $(app.loadRecipe(eventId))
        });

        $('.mainDisplay').on('click', app.mainPageDisplay);

        $('.ingredients').on('click', app.ingredientsHide);

        $('.connect').on('click', app.connect);
    },

    generateListElement: (name, resume, img, id) => {

        let mainElement = $('#main-template').contents().clone()

        mainElement.find('.card-title').text(name);
        mainElement.find('.card-img-top').attr("src", img);
        mainElement.find('.card-text').text(resume);
        mainElement.find('.recipeAccess').attr('id', 'recipe-' + id);

        return mainElement;


    },

    loadRecipe: (eventId) => {

        console.log(eventId);

        $.ajax('doc/json_files/list.json').done((list) => {
            $.each(list, (index, list) => {


                let recipeElement = app.recipePageDisplay(list.name, list.cook, list.id, list.preparation);


                // Je vérifie que mon tour sur la boucle correspond à l'id voulu, quand c'est le cas j'affiche la recette
                if (eventId === `recipe-${list.id}`) {


                    return $('#recipe-tpl').append(recipeElement);
                }
            })

        })
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
        $(app.loadingEvent);

        return recipeElement;
    },

    ingredientsHide: () => {

        $('.prepare').addClass('is-inactive');
        $('.ingredients').removeClass('ingredients').addClass('show').text("revoir");
        $('.show').on('click', function () {
            $('.prepare').removeClass('is-inactive');
            $('.show').removeClass('show').addClass('ingredients').text("C'est fait");
            $(app.loadingEvent);
        })
    },

    mainPageDisplay: () => {

        //On retire le is-active
        $('.is-active').removeClass('is-active').addClass('is-inactive');
        // On rajoute la classe is-active à notre main
        $('.main-page').removeClass('is-inactive').addClass('is-active');
        $(app.loadingEvent);


    },

    connect: (event) => {
        // on bloque l'effet par défault du bouton
        event.preventDefault();
        //on récupère les valeurs des champs inputs
        let name = $('#name').val();
        let password = $('#password').val();


        console.log(name + " " + password);
        if (name == "" || password == "") {
            alert("Tous les champs doivent être remplis");
        } else {
            $.ajax({
                type: "get",
                url: `http://localhost/projet/Ocook/API/public/user/admin?name=${name}&password=${password}`,
            }).done((results) => {
                $.each(results, (index, result) => {

                    if (result.rank == "admin") {
                        $('.is-active').removeClass('is-active').addClass('is-inactive');
                        $('.connection-close').trigger('click');
                        let adminPanel = $('#admin-template').contents().clone();
                       $('#admin-tpl').append(adminPanel);
                        $(app.loadingEvent);
                        
                        
                    } else {
                        alert("vous n'êtes pas autorisé");
                    }
                   
                })
                

            }).fail(() => {
                $('#nameHelp').html("<p> Erreur, vérifiez vos identifiants");;
            });
            
            return false;
        }
    }



};

$(document).ready(app.init);