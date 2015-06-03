$(document).ready(function ()
{
    //Au démarage de la page GESTION-ASSOCIATION-MODIFIER chargement des champs en fonction de l'association 
    var idAssociation = $('#edit #associations').val();
    $.ajax({
        url: 'ajax/get-association.php?id=' + idAssociation,
        success: function (data, success) {

            var association = jQuery.parseJSON(data);

            //Remplissage des champs
            $('#edit #nom').val(association.Libelle);
            $('#edit #description').val(association.Description);
            $('#edit #telephone').val(association.Telephone);
            $('#edit #email').val(association.Mail);
            $.each(association.Information, function (i, val) {
                $('#edit #informations').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
            });

            $.each(association.Action, function (i, val) {
                $('#edit #actions').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
            });
        }
    });

    //GESTION-ASSOCIATION-MODIFIER remplissage des champs quand on change d'association
    $('#edit #associations').on('change', function () {

        $('#edit #informations').empty();
        $('#edit #actions').empty();

        var idAssociation = $('#edit #associations').val();
        $.ajax({
            url: 'ajax/get-association.php?id=' + idAssociation,
            success: function (data, success) {

                var association = jQuery.parseJSON(data);

                //Remplissage des champs
                $('#edit #nom').val(association.Libelle);
                $('#edit #description').val(association.Description);
                $('#edit #telephone').val(association.Telephone);
                $('#edit #email').val(association.Mail);
                $.each(association.Information, function (i, val) {
                    $('#edit #informations').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
                });
                $.each(association.Action, function (i, val) {
                    $('#actions').append('<option value="' + val.Identifiant + '">' + val.Titre + '</option>');
                })

            }
        });
    });

    //INFORMATIONS
    $('#edit #ajoutInfo').on('click', function () {
        //On recupère l'id de l'association
        var idAssociation = $('#edit #associations').val();

        document.location.href = "gestion-information-ajouter.php?id=" + idAssociation;
    });

    $('#edit #modifierInfo').on('click', function () {
        //On recupère l'id de l'information
        var idInformation = $('#edit #informations').val();

        document.location.href = "gestion-information-modifier.php?id=" + idInformation;
    });

    $('#edit #supprimerInfo').on('click', function () {
        //On recupère l'id de l'association
        var idInformation = $('#edit #informations').val();

        if (idInformation != null) {
            $.ajax({
                url: 'ajax/delete-information.php',
                method: 'POST',
                data: 'id=' + idInformation,
                success: function (data, success) {

                    var supprimer = jQuery.parseJSON(data);

                    if (supprimer == null || supprimer == false) {
                        alert('Erreur lors de la suppression');
                    }
                }
            });
            document.location.href = "gestion-association-modifier.php";
        } else {
            alert('Aucune information selectionnée');
        }
    });

    //ACTIONS
    $('#edit #ajoutAction').on('click', function () {
        //On recupère l'id de l'association
        var idAssociation = $('#edit #associations').val();

        document.location.href = "gestion-action-ajouter.php?id=" + idAssociation;
    });

    $('#edit #modifierAction').on('click', function () {
        //On recupère l'id de l'information
        var idAction = $('#edit #actions').val();

        document.location.href = "gestion-action-modifier.php?id=" + idAction;
    });

    $('#edit #supprimerAction').on('click', function () {
        //On recupère l'id de l'association
        var idAction = $('#edit #actions').val();

        if (idAction != null) {
            $.ajax({
                url: 'ajax/delete-action.php',
                method: 'POST',
                data: 'id=' + idAction,
                success: function (data, success) {

                    var supprimer = jQuery.parseJSON(data);

                    if (supprimer == null || supprimer == false) {
                        alert('Erreur lors de la suppression');
                    }
                }
            });
            document.location.href = "gestion-association-modifier.php";
        } else {
            alert('Aucune action selectionnée');
        }
    });
});

