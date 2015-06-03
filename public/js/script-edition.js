$(document).ready(function ()
{
    var idEdition = $('#edit #editions').val();

    $.ajax({
        url: 'ajax/get-edition.php?id=' + idEdition,
        success: function (data, success) {

            var edition = jQuery.parseJSON(data);

            $('#edit #libelle').val(edition.Libelle);
            $('#edit #annee').val(edition.Annee);
        }
    });

    $('#edit #editions').on('change', function () {

        var idEdition = $(this).val();

        $.ajax({
            url: 'ajax/get-edition.php?id=' + idEdition,
            success: function (data, success) {

                var edition = jQuery.parseJSON(data);

                $('#edit #libelle').val(edition.Libelle);
                $('#edit #annee').val(edition.Annee);
            }
        });
    });
});

