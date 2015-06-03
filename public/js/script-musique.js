$(document).ready(function ()
{
    var idArtiste = $('#delete #artistes').val();
    $.ajax({
        url: 'ajax/get-musique.php?id=' + idArtiste,
        success: function (data, success) {

            var musiques = jQuery.parseJSON(data);

            //Remplissage des champs
            $.each(musiques, function (i, val) {
                $('#delete #musiques').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
            });
        }
    });

    $('#delete #artistes').on('change', function () {
        
        $('#delete #musiques').empty();
        
        var idArtiste = $(this).val();

        // A OPTIMISER PASSER L'INFORMATION EN POST ET PAS EN GET
        $.ajax({
            url: 'ajax/get-musique.php?id=' + idArtiste,
            success: function (data, success) {

                var musiques = jQuery.parseJSON(data);

                //Remplissage des champs
                $.each(musiques, function (i,val) {
                    $('#delete #musiques').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
                });
            }
        });

    });
});

