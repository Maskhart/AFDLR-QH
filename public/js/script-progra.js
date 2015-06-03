$(document).ready(function()
{
    $.ajax({
        url: 'ajax/get-progra.php',
        success: function(data, success) {

            var progra = jQuery.parseJSON(data);
            var tab = [];
            var hasLSF = 0;
            tab.push('debut');
            $.each(progra, function(i, prestation) {
                for (var i = 0; i < tab.length; i++) {
                    if (jQuery.inArray(prestation.Scene.Libelle, tab) == -1) {
                        tab.push(prestation.Scene.Libelle);
                    }
                }
            });
            tab.shift();

            $.each(tab, function(i, scene) {
                var html = '<h3>' + scene + '</h3>';

                $.each(progra, function(i, prestation) {
                    hasLSF = 0;
                    if (prestation.Scene.Libelle == scene && prestation.JourPassage == 'Vendredi') {
                        html += '<a class="lien" href="InfoArtiste.php?ID=' + prestation.Artiste.Identifiant + '">';
                        html += '<div class="blocartiste">';
                        var heureDebut = prestation.HeureDebut.substring(0,5).replace(":","h");
                        var heureFin = prestation.HeureFin.substring(0,5).replace(":","h");
                        html += '<div class="horairepassage"><span>' + heureDebut + '</span></br><span>' + heureFin + '</span>';
                        $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                            if (prestationmusique.Musique.IdentifiantVideo != null) {
                                hasLSF = hasLSF + 1;
                            }
                        });
                        if (hasLSF != 0) {
                            html += '<div class="lsf"><img class="lsficon" src="../img/front/ConcertSigneblanc-01.png" alt="Lsf"/></div>';
                        }
                        html += '</div>';
                        html += '<div class="blockinfo">';
                        html += '<img class ="image" src="'+ prestation.Artiste.Image.Chemin +'"/>';
                        html += '<div class="info">' + prestation.Artiste.Nom + '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</a>';
                    }
                });
                $('#progra').append(html);
            });
        }
    });

    $('#vendredi').on('click', function() {
        var jour = "Vendredi";
        console.log(jour);
        $.ajax({
            url: 'ajax/get-progra.php',
            success: function(data, success) {
                $('#progra').empty();
                var progra = jQuery.parseJSON(data);
                var tab = [];
                var hasLSF = 0;
                tab.push('debut');
                console.log(progra);
                $.each(progra, function(i, prestation) {
                    for (var i = 0; i < tab.length; i++) {
                        console.log(prestation.Scene.Libelle);
                        if (jQuery.inArray(prestation.Scene.Libelle, tab) == -1) {
                            tab.push(prestation.Scene.Libelle);
                        }
                    }
                });
                tab.shift();
                console.log(tab);
                $.each(tab, function(i, scene) {
                    var html = '<h3>' + scene + '</h3>';

                    $.each(progra, function(i, prestation) {
                        hasLSF = 0;
                        var sGenre = null;
                        if (prestation.Scene.Libelle == scene && prestation.JourPassage == jour) {
                            html += '<a class="lien" href="InfoArtiste.php?ID=' + prestation.Artiste.Identifiant + '">';
                            html += '<div class="blocartiste">';
                            var heureDebut = prestation.HeureDebut.substring(0,5).replace(":","h");
                            var heureFin = prestation.HeureFin.substring(0,5).replace(":","h");
                            html += '<div class="horairepassage"><span>' + heureDebut + '</span></br><span>' + heureFin + '</span>';
                            $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                if (prestationmusique.Musique.IdentifiantVideo != null) {
                                    hasLSF = hasLSF + 1;
                                }
                            });
                            if (hasLSF != 0) {
                                html += '<div class="lsf"><img class="lsficon" src="../img/front/ConcertSigneblanc-01.png" alt="Lsf"/></div>';
                            }
                            html += '</div>';
                            html += '<div class="blockinfo">';
                            html += '<img class ="image" src="'+ prestation.Artiste.Image.Chemin +'"/>';
                            html += '<div class="info">' + prestation.Artiste.Nom + '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</a>';
                        }
                    });
                    $('#progra').append(html);
                });
            }
        });
    });

    $('#samedi').on('click', function() {

        var jour = "Samedi";
        console.log(jour);
        $.ajax({
            url: 'ajax/get-progra.php',
            success: function(data, success) {
                $('#progra').empty();
                var progra = jQuery.parseJSON(data);
                var tab = [];
                var hasLSF = 0;
                tab.push('debut');
                console.log(progra);
                $.each(progra, function(i, prestation) {
                    for (var i = 0; i < tab.length; i++) {
                        console.log(prestation.Scene.Libelle);
                        if (jQuery.inArray(prestation.Scene.Libelle, tab) == -1) {
                            tab.push(prestation.Scene.Libelle);
                        }
                    }
                });
                tab.shift();
                console.log(tab);
                $.each(tab, function(i, scene) {
                    var html = '<h3>' + scene + '</h3>';

                    $.each(progra, function(i, prestation) {
                        hasLSF = 0;
                        var sGenre = null;
                        if (prestation.Scene.Libelle == scene && prestation.JourPassage == jour) {
                            html += '<a class="lien" href="InfoArtiste.php?ID=' + prestation.Artiste.Identifiant + '">';
                            html += '<div class="blocartiste">';
                            var heureDebut = prestation.HeureDebut.substring(0,5).replace(":","h");
                            var heureFin = prestation.HeureFin.substring(0,5).replace(":","h");
                            html += '<div class="horairepassage"><span>' + heureDebut + '</span></br><span>' + heureFin + '</span>';
                            $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                if (prestationmusique.Musique.IdentifiantVideo != null) {
                                    hasLSF = hasLSF + 1;
                                }
                            });
                            if (hasLSF != 0) {
                                html += '<div class="lsf"><img class="lsficon" src="../img/front/ConcertSigneblanc-01.png" alt="Lsf"/></div>';
                            }
                            html += '</div>';
                            html += '<div class="blockinfo">';
                            html += '<img class ="image" src="'+ prestation.Artiste.Image.Chemin +'"/>';
                            html += '<div class="info">' + prestation.Artiste.Nom + '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</a>';
                        }
                    });
                    $('#progra').append(html);
                });
            }
        });
    });
});