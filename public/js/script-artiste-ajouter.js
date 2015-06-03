function afficheListeGenres(genres) {
    $.each(genres, function (i, genre) {
        $('#add #genres').append('<option value="' + genre.Identifiant + '">' + genre.Libelle + '</option>');
    });
}

function findAllGenre() {
    $.ajax({
        url: 'ajax/get-all-genres.php',
        success: function (data, success) {

            var genres = jQuery.parseJSON(data);
            afficheListeGenres(genres);
        }
    });
}

function findAllNationalite(artiste) {
    $.ajax({
        url: 'ajax/get-all-nationalites.php',
        success: function (data, success) {

            var nationalites = jQuery.parseJSON(data);
            afficheListeNationalites(nationalites);
        }
    });
}

function afficheListeNationalites(nationalites) {
    $.each(nationalites, function (i, nationalite) {
        $('#add #nationalites').append('<option value="' + nationalite.Identifiant + '">' + nationalite.LibelleLong + '</option>');
    });
}

function serializeGenresArtiste() {

    var ids = [];

    $('#genresArtiste option').each(function () {
        ids.push($(this).val());
    });

    $('#inputGenresArtiste').val(ids.join());
}

function serializeNationalitesArtiste() {

    var ids = [];

    $('#nationalitesArtiste option').each(function () {
        ids.push($(this).val());
    });

    $('#inputNationalitesArtiste').val(ids.join());
}

$(document).ready(function ()
{
    //Remplit les select genres et nationalites au chargement de la page
    findAllGenre();
    findAllNationalite();

    $('#add #ajoutGenre').on('click', function () {
        var idGenre = $('#add #genres option:selected').val();

        $.ajax({
            url: 'ajax/get-genre.php?id=' + idGenre,
            success: function (data, success) {

                var genre = jQuery.parseJSON(data);

                $('#add #genresArtiste').append('<option value="' + genre.Identifiant + '">' + genre.Libelle + '</option>');
                $('#add #genres option:selected').remove();
                serializeGenresArtiste();
            }
        });
    });

    $('#add #supprimerGenre').on('click', function () {
        var idGenre = $('#add #genresArtiste option:selected').val();

        $.ajax({
            url: 'ajax/get-genre.php?id=' + idGenre,
            success: function (data, success) {

                var genre = jQuery.parseJSON(data);

                $('#add #genres').append('<option value="' + genre.Identifiant + '">' + genre.Libelle + '</option>');
                $('#add #genresArtiste option:selected').remove();
                serializeGenresArtiste();
            }
        });
    });

    $('#add #ajoutNationalite').on('click', function () {
        var idNationalite = $('#add #nationalites option:selected').val();

        $.ajax({
            url: 'ajax/get-nationalite.php?id=' + idNationalite,
            success: function (data, success) {

                var nationalite = jQuery.parseJSON(data);

                $('#add #nationalitesArtiste').append('<option value="' + nationalite.Identifiant + '">' + nationalite.LibelleLong + '</option>');
                $('#add #nationalites option:selected').remove();
                serializeNationalitesArtiste();
            }
        });
    });

    $('#add #supprimerNationalite').on('click', function () {
        var idNationalite = $('#add #nationalitesArtiste option:selected').val();

        $.ajax({
            url: 'ajax/get-nationalite.php?id=' + idNationalite,
            success: function (data, success) {

                var nationalite = jQuery.parseJSON(data);

                $('#add #nationalites').append('<option value="' + nationalite.Identifiant + '">' + nationalite.LibelleLong + '</option>');
                $('#add #nationalitesArtiste option:selected').remove();
                serializeNationalitesArtiste();
            }
        });
    });
});

