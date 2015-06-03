$(document).ready(function ()
{
    $.ajax({
        url: 'ajax/get-progra.php',
        success: function (data, success) {

            var progra = jQuery.parseJSON(data);
            var tab = [];
            tab.push('debut');
            $.each(progra, function (i, prestation) {
                for (var i = 0; i < tab.length; i++) {
                    if (jQuery.inArray(prestation.Scene.Libelle, tab) == -1) {
                        tab.push(prestation.Scene.Libelle);
                    }
                }
            });
            tab.shift();
            $.each(tab, function (i, scene) {
                var html = '<div class="divScene"><h3>' + scene + '</h3>';

                $.each(progra, function (i, prestation) {
                    if (prestation.Scene.Libelle == scene && prestation.JourPassage == 'Vendredi') {
                        html += '<div class="divClick" presta-id="' + prestation.Identifiant + '">';
                        html += '<div>' + prestation.HeureDebut + ' - ' + prestation.HeureFin + '</div>';
                        html += '<div>';
                        html += '<div>';
                        html += '<div>' + prestation.Artiste.Nom + '</div>';
                        $.each(prestation.Artiste.GenreArtiste, function (i, genreartiste) {
                            html += '<div>' + genreartiste.Genre.Libelle + '</div>';
                        });
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }
                });
                html += '</div>';
                $('#progra').append(html);
            });
        }
    });

    $('#vendredi').on('click', function () {
        $('#progra').empty();
        $('#musiques').empty();
        var jour = "Vendredi";
        $.ajax({
            url: 'ajax/get-progra.php',
            success: function (data, success) {

                var progra = jQuery.parseJSON(data);
                var tab = [];
                tab.push('debut');
                $.each(progra, function (i, prestation) {
                    for (var i = 0; i < tab.length; i++) {
                        if (jQuery.inArray(prestation.Scene.Libelle, tab) == -1) {
                            tab.push(prestation.Scene.Libelle);
                        }
                    }
                });
                tab.shift();
                $.each(tab, function (i, scene) {
                    var html = '<h3>' + scene + '</h3>';

                    $.each(progra, function (i, prestation) {
                        if (prestation.Scene.Libelle == scene && prestation.JourPassage == jour) {
                            html += '<div class="divClick" presta-id="' + prestation.Identifiant + '">';
                            html += '<div>' + prestation.HeureDebut + ' - ' + prestation.HeureFin + '</div>';
                            html += '<div>';
                            html += '<div>';
                            html += '<div>' + prestation.Artiste.Nom + '</div>';
                            $.each(prestation.Artiste.GenreArtiste, function (i, genreartiste) {
                                html += '<div class="info">' + genreartiste.Genre.Libelle + '</div>';
                            });
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        }
                    });
                    $('#progra').append(html);
                });
            }
        });
    });

    $('#samedi').on('click', function () {
        $('#progra').empty();
        $('#musiques').empty();
        var jour = "Samedi";
        $.ajax({
            url: 'ajax/get-progra.php',
            success: function (data, success) {

                var progra = jQuery.parseJSON(data);
                var tab = [];
                tab.push('debut');
                $.each(progra, function (i, prestation) {
                    for (var i = 0; i < tab.length; i++) {
                        if (jQuery.inArray(prestation.Scene.Libelle, tab) == -1) {
                            tab.push(prestation.Scene.Libelle);
                        }
                    }
                });
                tab.shift();
                $.each(tab, function (i, scene) {
                    var html = '<h3>' + scene + '</h3>';

                    $.each(progra, function (i, prestation) {
                        if (prestation.Scene.Libelle == scene && prestation.JourPassage == jour) {
                            html += '<div class="divClick" presta-id="' + prestation.Identifiant + '">';
                            html += '<div>' + prestation.HeureDebut + ' - ' + prestation.HeureFin + '</div>';
                            html += '<div>';
                            html += '<div>';
                            html += '<div>' + prestation.Artiste.Nom + '</div>';
                            $.each(prestation.Artiste.GenreArtiste, function (i, genreartiste) {
                                html += '<div>' + genreartiste.Genre.Libelle + '</div>';
                            });
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        }
                    });
                    $('#progra').append(html);
                });
            }
        });
    });

    $(document).delegate('.divClick', 'click', function () {
        $('#musiques').empty();

        var idPrestation = $(this).attr('presta-id');

        $.ajax({
            url: 'ajax/get-prestation.php?id=' + idPrestation,
            success: function (data, success) {

                var prestation = jQuery.parseJSON(data);
                $.each(prestation.PrestationMusique, function (i, pm) {
                    $('#musiques').append('<option value="' + pm.Identifiant + '">' + pm.Musique.Titre + '</option>');
                });
            }
        });
    });

    $('#boutonAccessible').on('click', function () {

        var idPrestationMusique = $('#musiques').val();

        if (idPrestationMusique != null) {
            $.ajax({
                url: 'ajax/add-live.php',
                method: 'POST',
                data: 'id=' + idPrestationMusique,
                success: function (data, success) {

                    var ajouter = jQuery.parseJSON(data);

                    if (ajouter == null || ajouter == false) {
                        alert('Erreur lors de la suppression');
                    }
                }
            });
            document.location.href = "gestion-live.php";
        } else {
            alert('Aucune musique selectionnée');
        }

    });
});


