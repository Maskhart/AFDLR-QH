$(document).ready(function ()
{
    //Au démarage de la page GESTION-MUSIQUE-MODIFICATION chargement du contenu de la liste des musiques en fonction de l'artiste
    var idArtiste = $('#edit #artistes').val();
    $.ajax({
        url: 'ajax/get-musiques-artiste.php?id=' + idArtiste,
        success: function (data, success) {

            var musiques = jQuery.parseJSON(data);

            if (musiques != null && musiques.length > 0) {
                //Remplissage des champs
                $.each(musiques, function (i, val) {
                    $('#edit #musiques').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
                });

                $('#edit #titre').val(musiques[0].Titre);
                $('#edit #paroles').val(musiques[0].Paroles);
                if (musiques[0].Video) {
                    $('#edit #videoTitre').val(musiques[0].Video.Titre);
                } else {
                    $('#edit #videoTitre').val('Pas de vidéo');
                }

            } else {
                $('#edit #musiques').append('<option value="pas de musique">Pas de musique</option>');
            }
        }
    });

    //GESTION-MUSIQUE-MODIFICATION remplissage de la liste de musique en foncion de l'artiste choisi
    $('#edit #artistes').on('change', function () {

        $('#edit #musiques').empty();
        $('#edit #titre').val("");
        $('#edit #paroles').val("");
        $('#edit #videoTitre').val("");
        var idArtiste = $(this).val();

        // A OPTIMISER PASSER L'INFORMATION EN POST ET PAS EN GET
        $.ajax({
            url: 'ajax/get-musiques-artiste.php?id=' + idArtiste,
            success: function (data, success) {

                var musiques = jQuery.parseJSON(data);

                if(musiques != null && musiques.length > 0) {
                    //Remplissage des champs
                    $.each(musiques, function (i, val) {
                        $('#edit #musiques').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
                    });
                    $('#edit #titre').val(musiques[0].Titre);
                    $('#edit #paroles').val(musiques[0].Paroles);
                    if (musiques[0].Video) {
                        $('#edit #videoTitre').val(musiques[0].Video.Titre);
                    } else {
                        $('#edit #videoTitre').val('Pas de vidéo');
                    }
                }else{
                    $('#edit #musiques').append('<option value="pas de musique">Pas de musique</option>');
                }
            }
        });
    });

    $('#edit #musiques').on('change', function () {

        var idMusique = $(this).val();

        // A OPTIMISER PASSER L'INFORMATION EN POST ET PAS EN GET
        $.ajax({
            url: 'ajax/get-musique.php?id=' + idMusique,
            success: function (data, success) {

                var musique = jQuery.parseJSON(data);

                //Remplissage des champs
                $('#edit #titre').val(musique.Titre);
                $('#edit #paroles').val(musique.Paroles);
                if (musique.Video) {
                    $('#edit #videoTitre').val(musique.Video.Titre);
                } else {
                    $('#edit #videoTitre').val('Pas de vidéo');
                }
            }
        });

    });

    //Rend visible le paragraphe pour modifier un fichier au clique sur le bouton modifier
    $('#modifierVideo').on('click', function () {
        $('#videoFile').css("visibility", "visible");
    });
});

