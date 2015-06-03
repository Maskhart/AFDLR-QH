function findAllEditions(identifiantEdition) {
    $.ajax({
        url: 'ajax/get-all-editions.php',
        success: function (data, success) {

            var editions = jQuery.parseJSON(data);
            afficheListeEditions(editions, identifiantEdition);
        }
    });
}

function afficheListeEditions(editions, identifiantEdition) {
    $('#edit #editionEdit').empty();
    $.each(editions, function (i, edition) {
        if (edition.Identifiant == identifiantEdition) {
            $('#edit #editionEdit').append('<option value="' + edition.Identifiant + '" selected="selected">' + edition.Libelle + '</option>');
        } else {
            $('#edit #editionEdit').append('<option value="' + edition.Identifiant + '">' + edition.Libelle + '</option>');
        }
    });
}

function findAllScenes(identifiantScene) {
    $.ajax({
        url: 'ajax/get-all-scenes.php',
        success: function (data, success) {

            var scenes = jQuery.parseJSON(data);
            afficheListeScenes(scenes, identifiantScene);
        }
    });
}

function afficheListeScenes(scenes, identifiantScene) {
    $('#edit #sceneEdit').empty();
    $.each(scenes, function (i, scene) {
        if (scene.Identifiant == identifiantScene) {
            $('#edit #sceneEdit').append('<option value="' + scene.Identifiant + '" selected="selected">' + scene.Libelle + '</option>');
        } else {
            $('#edit #sceneEdit').append('<option value="' + scene.Identifiant + '">' + scene.Libelle + '</option>');
        }
    });
}

function findAllJours(jour) {
    var jours = ['Vendredi', 'Samedi'];

    afficheListeJours(jours, jour);
}

function afficheListeJours(jours, jour) {
    $('#edit #jourEdit').empty();
    $.each(jours, function (i, j) {
        if (j == jour) {
            $('#edit #jourEdit').append('<option value="' + j + '" selected="selected">' + j + '</option>');
        } else {
            $('#edit #jourEdit').append('<option value="' + j + '">' + j + '</option>');
        }
    });
}

$(document).ready(function ()
{
    //Clique sur le bouton Rechercher
    $('#edit #rechercher').on('click', function () {
        //On vide le select des artistes
        $('#edit #artiste').empty();
        $('#edit #heureDebut').val('');
        $('#edit #heureFin').val('');

        var idEdition = $('#edit #edition').val();
        var jour = $('#edit #jour').val();
        var idScene = $('#edit #scene').val();

        $.ajax({
            url: 'ajax/get-prestation-by-Edition-Scene-Jour.php?idEdition=' + idEdition + '&jour=' + jour + '&idScene=' + idScene,
            success: function (data, success) {

                var prestations = jQuery.parseJSON(data);

                //Remplissage des champs
                if (prestations != null) {
                    findAllEditions(prestations[0].Edition.Identifiant);
                    findAllJours(prestations[0].JourPassage);
                    findAllScenes(prestations[0].Scene.Identifiant);
                    $.each(prestations, function (i, prestation) {
                        $('#edit #artiste').append('<option value="' + prestation.Artiste.Identifiant + '">' + prestation.Artiste.Nom + '</option>');
                    });
                    $('#edit #ordrePassage').val(prestations[0].OrdrePassage);
                    $('#edit #heureDebut').val(prestations[0].HeureDebut);
                    $('#edit #heureFin').val(prestations[0].HeureFin);
                    $('#edit #hidden').val(prestations[0].Identifiant);
                } else {
                    alert('Pas de programmation pour les champs recherchés');
                }
            }
        });
    });

    $('#edit #artiste').on('change', function () {

        var idEdition = $('#edit #edition').val();
        var idArtiste = $('#edit #artiste').val();

        $.ajax({
            url: 'ajax/get-prestation-by-artiste.php?idEdition=' + idEdition + '&idArtiste=' + idArtiste,
            success: function (data, success) {

                var prestation = jQuery.parseJSON(data);

                //Remplissage des champs
                if (prestation != null) {
                    $('#edit #hidden').val(prestation.Identifiant);
                    $('#edit #ordrePassage').val(prestation.OrdrePassage);
                    $('#edit #heureDebut').val(prestation.HeureDebut);
                    $('#edit #heureFin').val(prestation.HeureFin);
                } else {
                    alert('Erreur sur l\'artiste sélectionné');
                }
            }
        });

    });
});

