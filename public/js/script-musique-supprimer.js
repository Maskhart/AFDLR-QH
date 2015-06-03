$(document).ready(function ()
{
    //Au démarage de la page GESTION-MUSIQUE-SUPPRESSION chargement du contenu de la liste des musiques en fonction de l'artiste
    var idArtiste = $('#delete #artistes').val();
    $.ajax({
        url: 'ajax/get-musiques-artiste.php?id=' + idArtiste,
        success: function (data, success) {

            var musiques = jQuery.parseJSON(data);
            
            if (musiques != null && musiques.length > 0) {
                //Remplissage des champs
                $.each(musiques, function (i, val) {
                    $('#delete #musiques').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
                });
            } else {
                $('#delete #musiques').append('<option value="pas de musique">Pas de musique</option>');
            }
        }
    });


    //GESTION-MUSIQUE-SUPPRIMER remplissage de la liste de musique quand on change d'artiste
    $('#delete #artistes').on('change', function () {

        $('#delete #musiques').empty();

        var idArtiste = $(this).val();

        // A OPTIMISER PASSER L'INFORMATION EN POST ET PAS EN GET
        $.ajax({
            url: 'ajax/get-musiques-artiste.php?id=' + idArtiste,
            success: function (data, success) {

                var musiques = jQuery.parseJSON(data);
               
                if(musiques != null && musiques.length > 0) {
                    //Remplissage des champs
                    $.each(musiques, function (i, val) {
                        $('#delete #musiques').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
                    });
                } else {
                    $('#delete #musiques').append('<option value="pas de musique">Pas de musique</option>');
                }
            }
        });

    });
});

