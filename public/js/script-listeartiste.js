$(document).ready(function()
{
    // A OPTIMISER PASSER L'INFORMATION EN POST ET PAS EN GET
    $.ajax({
        url: 'ajax/get-artiste.php',
        success: function(data, success) {

            var prestations = jQuery.parseJSON(data);
            var hasLSF = 0;
            $.each(prestations, function(i, prestation) {
                hasLSF = 0;
                var artiste = prestation.Artiste,
                        sGenre = null;
                var html = '<a class="lien" href="InfoArtiste.php?ID=' + artiste.Identifiant + '">';
				
                html += '<div class="leftCell">';
                html += '<div class="entete">';
                html += '<span class="artisteliste" id="artistenom">' + artiste.Nom + '</span>';

                html += '</div>';
                $.each(artiste.GenreArtiste, function(k, genreartiste) {
                    if (sGenre == null) {
                        sGenre = genreartiste.Genre.Libelle;
                    }
                    else{
                        sGenre += " / " + genreartiste.Genre.Libelle;
                    }
                });
                html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                html += '</div>';
                html += '<div class="rightCell">';
                $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                    if (prestationmusique.Musique.IdentifiantVideo != null) {
                        hasLSF = hasLSF + 1;
                    }
                });
                if (hasLSF != 0) {
                    html += '<img class="imgLSF" src="../img/front/ConcertSigneblanc-01.png" alt="Lsf" />';
                }
                html += '</div>';
                html += '</a>';

                $('.tablecontainer').append(html);
            });
        }
    });
    
    
    $('#rnom').keyup(function() {


        var champ = $(this).val().toUpperCase();
        var idGenre = $('#filtreGenre').val();
        var idJour = $('#filtreJour').val();
        var compteur = 0;
        var hasLSF = 0;

        if (idGenre == "Defaut" && idJour == "Defaut") {

            $.ajax({
                url: 'ajax/get-artiste.php',
                success: function(data, success) {

                    var prestations = jQuery.parseJSON(data);
                    console.log(prestations);
                    $('.tablecontainer').empty();
                    $.each(prestations, function(i, prestation) {
                        hasLSF = 0;
                        if (prestation.Artiste.Nom.indexOf(champ) != -1) {
                            compteur = compteur + 1;
                            var sGenre = null,
                             html = '<a class="lien" href="InfoArtiste.php?ID=' + prestation.Artiste.Identifiant + '">';

                                    html += '<div class="leftCell">';
                                        html += '<div class="entete">';
                                            html += '<span class="artisteliste" id="artistenom">' + prestation.Artiste.Nom + '</span>';
                                        html += '</div>';
                                        $.each(prestation.Artiste.GenreArtiste, function(k, genreartiste) {
                                            if (sGenre == null) {
                                                sGenre = genreartiste.Genre.Libelle;
                                            }
                                            else{
                                                sGenre += " / " + genreartiste.Genre.Libelle;
                                            }
                                        });
                                        html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                                    html += '</div>';
                                    html += '<div class="rightCell">';
                                    
                                        $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                            if (prestationmusique.Musique.IdentifiantVideo != null) {
                                                hasLSF = hasLSF + 1;
                                            }
                                        });
                                        if (hasLSF != 0) {
                                            html += '<img class="imgLSF" src="../img/front/ConcertSigneblanc-01.png" alt="Lsf" />';
                                        }

                                    html += '</div>';

                            $('.tablecontainer').append(html);
                        }
                    });
                    if (compteur == 0) {
                        $('.tablecontainer').append('<span class="noResult">Aucun résultat</span>');
                    }
                }
            });
        }
        else {
            if (idGenre == "Defaut" && idJour != "Defaut") {
                $.ajax({
                    url: 'ajax/get-artistebyjour.php?jour=' + idJour,
                    success: function(data, success) {

                        var prestations = jQuery.parseJSON(data);
                        $('.tablecontainer').empty();
                        $.each(prestations, function(i, prestation) {
                            hasLSF = 0;
                            if (prestation.Artiste.Nom.indexOf(champ) != -1) {
                                compteur = compteur + 1;
                                var sGenre = null,
                             html = '<a class="lien" href="InfoArtiste.php?ID=' + prestation.Artiste.Identifiant + '">';

                                    html += '<div class="leftCell">';
                                        html += '<div class="entete">';
                                            html += '<span class="artisteliste" id="artistenom">' + prestation.Artiste.Nom + '</span>';
                                        html += '</div>';
                                        $.each(prestation.Artiste.GenreArtiste, function(k, genreartiste) {
                                            if (sGenre == null) {
                                                sGenre = genreartiste.Genre.Libelle;
                                            }
                                            else{
                                                sGenre += " / " + genreartiste.Genre.Libelle;
                                            }
                                        });
                                        html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                                    html += '</div>';
                                    html += '<div class="rightCell">';
                                    
                                        $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                            if (prestationmusique.Musique.IdentifiantVideo != null) {
                                                hasLSF = hasLSF + 1;
                                            }
                                        });
                                        if (hasLSF != 0) {
                                            html += '<img class="imgLSF" src="../img/front/ConcertSigneblanc-01.png" alt="Lsf" />';
                                        }

                                    html += '</div>';

                            $('.tablecontainer').append(html);
                            }
                        });
                        if (compteur == 0) {
                            $('.tablecontainer').append('<span class="noResult">Aucun résultat</span>');
                        }


                    }
                });
            }
            if (idGenre != "Defaut" && idJour == "Defaut") {

                $.ajax({
                    url: 'ajax/get-artistebygenre.php?id=' + idGenre,
                    success: function(data, success) {


                        var prestations = jQuery.parseJSON(data);
                        $('.tablecontainer').empty();
                        $.each(prestations, function(i, prestation) {
                            hasLSF = 0;
                            if (prestation.Artiste.Nom.indexOf(champ) != -1) {
                                compteur = compteur + 1;
                                var sGenre = null,
                             html = '<a class="lien" href="InfoArtiste.php?ID=' + prestation.Artiste.Identifiant + '">';

                                    html += '<div class="leftCell">';
                                        html += '<div class="entete">';
                                            html += '<span class="artisteliste" id="artistenom">' + prestation.Artiste.Nom + '</span>';
                                        html += '</div>';
                                        $.each(prestation.Artiste.GenreArtiste, function(k, genreartiste) {
                                            if (sGenre == null) {
                                                sGenre = genreartiste.Genre.Libelle;
                                            }
                                            else{
                                                sGenre += " / " + genreartiste.Genre.Libelle;
                                            }
                                        });
                                        html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                                    html += '</div>';
                                    html += '<div class="rightCell">';
                                    
                                        $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                            if (prestationmusique.Musique.IdentifiantVideo != null) {
                                                hasLSF = hasLSF + 1;
                                            }
                                        });
                                        if (hasLSF != 0) {
                                            html += '<img class="imgLSF" src="../img/front/ConcertSigneblanc-01.png" alt="Lsf" />';
                                        }

                                    html += '</div>';

                            $('.tablecontainer').append(html);
                            }
                        });
                        if (compteur == 0) {
                            $('.tablecontainer').append('<span class="noResult">Aucun résultat</span>');
                        }
                    }
                });
            }
            else {
                $.ajax({
                    url: 'ajax/get-artistebygenrejour.php?idGenre=' + idGenre + '&jour=' + idJour,
                    success: function(data, success) {

                        var prestations = jQuery.parseJSON(data);
                        $('.tablecontainer').empty();
                        $.each(prestations, function(i, prestation) {
                            hasLSF = 0;
                            if (prestation.Artiste.Nom.indexOf(champ) != -1) {
                                compteur = compteur + 1;
                                var sGenre = null,
                             html = '<a class="lien" href="InfoArtiste.php?ID=' + prestation.Artiste.Identifiant + '">';

                                    html += '<div class="leftCell">';
                                        html += '<div class="entete">';
                                            html += '<span class="artisteliste" id="artistenom">' + prestation.Artiste.Nom + '</span>';
                                        html += '</div>';
                                        $.each(prestation.Artiste.GenreArtiste, function(k, genreartiste) {
                                            if (sGenre == null) {
                                                sGenre = genreartiste.Genre.Libelle;
                                            }
                                            else{
                                                sGenre += " / " + genreartiste.Genre.Libelle;
                                            }
                                        });
                                        html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                                    html += '</div>';
                                    html += '<div class="rightCell">';
                                    
                                        $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                            if (prestationmusique.Musique.IdentifiantVideo != null) {
                                                hasLSF = hasLSF + 1;
                                            }
                                        });
                                        if (hasLSF != 0) {
                                            html += '<img class="imgLSF" src="../img/front/lsficone.png" alt="Lsf" />';
                                        }

                                    html += '</div>';

                            $('.tablecontainer').append(html);
                            }
                        });
                        if (compteur == 0) {
                            $('.tablecontainer').append('<span class="noResult">Aucun résultat</span>');
                        }
                    }
                });
            }
        }

    });

    $('#filtreGenre,#filtreJour').on('change', function() {

        var idGenre = $('#filtreGenre').val();
        var idJour = $('#filtreJour').val();

        if (idGenre == "Defaut" && idJour == "Defaut") {

            $.ajax({
                url: 'ajax/get-artiste.php',
                success: function(data, success) {
                    $('.tablecontainer').empty();
                    var prestations = jQuery.parseJSON(data);

                    $.each(prestations, function(i, prestation) {
                        var hasLSF = 0;
                        var artiste = prestation.Artiste;
                        var sGenre = null;
                        var html = '<a class="lien" href="InfoArtiste.php?ID=' + artiste.Identifiant + '">';

                        html += '<div class="leftCell">';
                        html += '<div class="entete">';
                        html += '<span class="artisteliste" id="artistenom">' + artiste.Nom + '</span>';

                        html += '</div>';
                        $.each(artiste.GenreArtiste, function(k, genreartiste) {
                            if (sGenre == null) {
                                sGenre = genreartiste.Genre.Libelle;
                            }
                            else {
                                sGenre += " / " + genreartiste.Genre.Libelle;
                            }
                        });
                        html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                        html += '</div>';
                        html += '<div class="rightCell">';
                        $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                            if (prestationmusique.Musique.IdentifiantVideo != null) {
                                hasLSF = hasLSF + 1;
                            }
                        });
                        if (hasLSF != 0) {
                            html += '<img class="imgLSF" src="../img/front/lsficone.png" alt="Lsf" />';
                        }
                        html += '</div>';
                        html += '</a>';

                        $('.tablecontainer').append(html);
                    });
                }
            });
        }
        else {
            if (idGenre == "Defaut" && idJour != "Defaut") {
                $.ajax({
                    url: 'ajax/get-artistebyjour.php?jour=' + idJour,
                    success: function(data, success) {
                        $('.tablecontainer').empty();

                        var prestations = jQuery.parseJSON(data);

                        //Remplissage des champs
                        $.each(prestations, function(i, prestation) {
                            var hasLSF = 0;
                            var artiste = prestation.Artiste;
                            var sGenre = null;
                            var html = '<a class="lien" href="InfoArtiste.php?ID=' + artiste.Identifiant + '">';

                            html += '<div class="leftCell">';
                            html += '<div class="entete">';
                            html += '<span class="artisteliste" id="artistenom">' + artiste.Nom + '</span>';

                            html += '</div>';
                            $.each(artiste.GenreArtiste, function(k, genreartiste) {
                                if (sGenre == null) {
                                    sGenre = genreartiste.Genre.Libelle;
                                }
                                else {
                                    sGenre += " / " + genreartiste.Genre.Libelle;
                                }
                            });
                            html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                            html += '</div>';
                            html += '<div class="rightCell">';
                            $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                if (prestationmusique.Musique.IdentifiantVideo != null) {
                                    hasLSF = hasLSF + 1;
                                }
                            });
                            if (hasLSF != 0) {
                                html += '<img class="imgLSF" src="../img/front/lsficone.png" alt="Lsf" />';
                            }
                            html += '</div>';
                            html += '</a>';

                            $('.tablecontainer').append(html);
                        });
                    }
                });
            }
            if (idGenre != "Defaut" && idJour == "Defaut") {

                $.ajax({
                    url: 'ajax/get-artistebygenre.php?id=' + idGenre,
                    success: function(data, success) {
                        $('.tablecontainer').empty();

                        var prestations = jQuery.parseJSON(data);
                        console.log(prestations);
                        //Remplissage des champs
                        $.each(prestations, function(i, prestation) {
                            var hasLSF = 0;
                            var artiste = prestation.Artiste;
                            var sGenre = null;
                            var html = '<a class="lien" href="InfoArtiste.php?ID=' + artiste.Identifiant + '">';

                            html += '<div class="leftCell">';
                            html += '<div class="entete">';
                            html += '<span class="artisteliste" id="artistenom">' + artiste.Nom + '</span>';

                            html += '</div>';
                            $.each(artiste.GenreArtiste, function(k, genreartiste) {
                                if (sGenre == null) {
                                    sGenre = genreartiste.Genre.Libelle;
                                }
                                else {
                                    sGenre += " / " + genreartiste.Genre.Libelle;
                                }
                            });
                            html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                            html += '</div>';
                            html += '<div class="rightCell">';
                            $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                if (prestationmusique.Musique.IdentifiantVideo != null) {
                                    hasLSF = hasLSF + 1;
                                }
                            });
                            if (hasLSF != 0) {
                                html += '<img class="imgLSF" src="../img/front/lsficone.png" alt="Lsf" />';
                            }
                            html += '</div>';
                            html += '</a>';

                            $('.tablecontainer').append(html);
                        });
                    }
                });
            }
            else {
                $.ajax({
                    url: 'ajax/get-artistebygenrejour.php?idGenre=' + idGenre + '&jour=' + idJour,
                    success: function(data, success) {

                        var prestations = jQuery.parseJSON(data);
                        $('.tablecontainer').empty();
                        //Remplissage des champs
                        $.each(prestations, function(i, prestation) {
                            var hasLSF = 0;
                            var artiste = prestation.Artiste;
                            var sGenre = null;
                            var html = '<a class="lien" href="InfoArtiste.php?ID=' + artiste.Identifiant + '">';

                            html += '<div class="leftCell">';
                            html += '<div class="entete">';
                            html += '<span class="artisteliste" id="artistenom">' + artiste.Nom + '</span>';

                            html += '</div>';
                            $.each(artiste.GenreArtiste, function(k, genreartiste) {
                                if (sGenre == null) {
                                    sGenre = genreartiste.Genre.Libelle;
                                }
                                else {
                                    sGenre += " / " + genreartiste.Genre.Libelle;
                                }
                            });
                            html += '<span class="artisteliste" id="artistegenre">' + sGenre + '</span>';
                            html += '</div>';
                            html += '<div class="rightCell">';
                            $.each(prestation.PrestationMusique, function(i, prestationmusique) {
                                if (prestationmusique.Musique.IdentifiantVideo != null) {
                                    hasLSF = hasLSF + 1;
                                }
                            });
                            if (hasLSF != 0) {
                                html += '<img class="imgLSF" src="../img/front/lsficone.png" alt="Lsf" />';
                            }
                            html += '</div>';
                            html += '</a>';

                            $('.tablecontainer').append(html);
                        });
                    }
                });
            }
        }
    });
});


