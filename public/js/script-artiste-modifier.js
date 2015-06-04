function findGenreIndex(genres, genre) {
    for (var i = 0, len = genres.length; i < len; i++) {
        if (genres[i].IdentifiantGenre == genre.Identifiant) {
            return i;
        }
    }
    return -1;
}

function afficheListeGenres(genresArtiste, genres) {
    $.each(genres, function (i, genre) {
        if (findGenreIndex(genresArtiste, genre) == -1) {
            $('#edit #genres').append('<option value="' + genre.Identifiant + '">' + genre.Libelle + '</option>');
        }
    });
}

function findAllGenre(artiste) {
    $.ajax({
        url: 'ajax/get-all-genres.php',
        success: function (data, success) {

            var genres = jQuery.parseJSON(data);
            afficheListeGenres(artiste.GenreArtiste, genres);
        }
    });
}

function findAllNationalite(artiste) {
    $.ajax({
        url: 'ajax/get-all-nationalites.php',
        success: function (data, success) {

            var nationalites = jQuery.parseJSON(data);
            afficheListeNationalites(artiste.NationaliteArtiste, nationalites);
        }
    });
}

function afficheListeNationalites(nationalitesArtiste, nationalites) {
    $.each(nationalites, function (i, nationalite) {
        if (findNationaliteIndex(nationalitesArtiste, nationalite) == -1) {
            $('#edit #nationalites').append('<option value="' + nationalite.Identifiant + '">' + nationalite.LibelleLong + '</option>');
        }
    });
}

function findNationaliteIndex(nationalites, nationalite) {
    for (var i = 0, len = nationalites.length; i < len; i++) {
        if (nationalites[i].IdentifiantNationalite == nationalite.Identifiant) {
            return i;
        }
    }
    return -1;
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
    //Remplit les champs au chargement de la page
    var idArtiste = $("#edit #artistes").val();

    // A OPTIMISER PASSER L'INFORMATION EN POST ET PAS EN GET
    $.ajax({
        url: 'ajax/get-artiste.php?id=' + idArtiste,
        success: function (data, success) {

            var artiste = jQuery.parseJSON(data);
            console.log(artiste);

            //Remplissage des champs
            $('#edit #nom').val(artiste.Nom);
            $('#edit #description').val(artiste.Description);
            if (artiste.Image) {
                $('#edit #banniereTitre').val(artiste.Image.Titre);
            } else {
                $('#edit #banniereTitre').val('Pas de bannière');
            }
            if (artiste.Miniature) {
                $('#edit #miniatureTitre').val(artiste.Miniature.Titre);
            } else {
                $('#edit #miniatureTitre').val('Pas de miniature');
            }
            if (artiste.Video) {
                $('#edit #videoTitre').val(artiste.Video.Titre);
            } else {
                $('#edit #videoTitre').val('Pas de vidéo');
            }
            //On remplit le select genres avec la liste de tous les genres en bdd sauf ceux que l'artiste a déja
            findAllGenre(artiste);
            //On remplit le select genresArtiste avec les genres de l'artiste
            $.each(artiste.GenreArtiste, function (i, val) {
                $('#edit #genresArtiste').append('<option value="' + val.Genre.Identifiant + '">' + val.Genre.Libelle + '</option>');
            });
            serializeGenresArtiste();
            //On remplit le select nationalites avec toutes les nationalites sauf ceux que l'artiste a déja
            findAllNationalite(artiste);
            //On remplit le select nationalitesArtiste avec les nationalites de l'artiste
            $.each(artiste.NationaliteArtiste, function (i, val) {
                $('#edit #nationalitesArtiste').append('<option value="' + val.Nationalite.Identifiant + '">' + val.Nationalite.LibelleLong + '</option>');
            });
            serializeNationalitesArtiste();
        }
    });

    $('#edit #artistes').on('change', function () {

        $('#edit #genres').empty();
        $('#edit #genresArtiste').empty();
        $('#edit #nationalites').empty();
        $('#edit #nationalitesArtiste').empty();

        var idArtiste = $(this).val();

        // A OPTIMISER PASSER L'INFORMATION EN POST ET PAS EN GET
        $.ajax({
            url: 'ajax/get-artiste.php?id=' + idArtiste,
            success: function (data, success) {

                var artiste = jQuery.parseJSON(data);
                console.log(artiste);

                //Remplissage des champs
                $('#edit #nom').val(artiste.Nom);
                $('#edit #description').val(artiste.Description);
                if (artiste.Image) {
                    $('#edit #banniereTitre').val(artiste.Image.Titre);
                } else {
                    $('#edit #banniereTitre').val('Pas de bannière');
                }
                if (artiste.Miniature) {
                    $('#edit #miniatureTitre').val(artiste.Miniature.Titre);
                } else {
                    $('#edit #miniatureTitre').val('Pas de miniature');
                }
                if (artiste.Video) {
                    $('#edit #videoTitre').val(artiste.Video.Titre);
                } else {
                    $('#edit #videoTitre').val('Pas de vidéo');
                }
                //On remplit le select genres avec tous les genres sauf ceux que l'artiste a déja
                findAllGenre(artiste);
                //On remplit le select genresArtiste avec les genres de l'artiste
                $.each(artiste.GenreArtiste, function (i, val) {
                    $('#edit #genresArtiste').append('<option value="' + val.Genre.Identifiant + '">' + val.Genre.Libelle + '</option>');
                });
                serializeGenresArtiste();
                //On remplit le select nationalites avec toutes les nationalites sauf celles que l'artiste a déja
                findAllNationalite(artiste);
                //On remplit le select nationalitesArtiste avec les nationalites de l'artiste
                $.each(artiste.NationaliteArtiste, function (i, val) {
                    $('#edit #nationalitesArtiste').append('<option value="' + val.Nationalite.Identifiant + '">' + val.Nationalite.LibelleLong + '</option>');
                });
                serializeNationalitesArtiste();
            }
        });

    });
    //Clique sur le bouton modifier pour banniere
    $('#edit #modifierBanniere').on('click', function () {
        $('#banniereFile').css("visibility", "visible");
    });
    //Clique sur le bouton modifier pour miniature
    $('#edit #modifierMiniature').on('click', function () {
        $('#miniatureFile').css("visibility", "visible");
    });
    //Clique sur le bouton modifier pour vidéo
    $('#edit #modifierVideo').on('click', function () {
        $('#videoFile').css("visibility", "visible");
    });

    $('#edit #ajoutGenreArtiste').on('click', function () {
        var idGenre = $('#edit #genres option:selected').val();

        $.ajax({
            url: 'ajax/get-genre.php?id=' + idGenre,
            success: function (data, success) {

                var genre = jQuery.parseJSON(data);

                $('#edit #genresArtiste').append('<option value="' + genre.Identifiant + '">' + genre.Libelle + '</option>');
                $('#edit #genres option:selected').remove();
                serializeGenresArtiste();
            }
        });
    });

    $('#edit #supprimerGenreArtiste').on('click', function () {
        var idGenre = $('#edit #genresArtiste option:selected').val();

        $.ajax({
            url: 'ajax/get-genre.php?id=' + idGenre,
            success: function (data, success) {

                var genre = jQuery.parseJSON(data);

                $('#edit #genres').append('<option value="' + genre.Identifiant + '">' + genre.Libelle + '</option>');
                $('#edit #genresArtiste option:selected').remove();
                serializeGenresArtiste();
            }
        });
    });

    $('#edit #ajoutNationaliteArtiste').on('click', function () {
        var idNationalite = $('#edit #nationalites option:selected').val();

        $.ajax({
            url: 'ajax/get-nationalite.php?id=' + idNationalite,
            success: function (data, success) {

                var nationalite = jQuery.parseJSON(data);

                $('#edit #nationalitesArtiste').append('<option value="' + nationalite.Identifiant + '">' + nationalite.LibelleLong + '</option>');
                $('#edit #nationalites option:selected').remove();
                serializeNationalitesArtiste();
            }
        });
    });

    $('#edit #supprimerNationaliteArtiste').on('click', function () {
        var idNationalite = $('#edit #nationalitesArtiste option:selected').val();

        $.ajax({
            url: 'ajax/get-nationalite.php?id=' + idNationalite,
            success: function (data, success) {

                var nationalite = jQuery.parseJSON(data);

                $('#edit #nationalites').append('<option value="' + nationalite.Identifiant + '">' + nationalite.LibelleLong + '</option>');
                $('#edit #nationalitesArtiste option:selected').remove();
                serializeNationalitesArtiste();
            }
        });
    });
});

