$(document).ready(function ()
{
    var idGenre = $('#edit #genres').val();

    $.ajax({
        url: 'ajax/get-genre.php?id=' + idGenre,
        success: function (data, success) {

            var genre = jQuery.parseJSON(data);

            $('#edit #nom').val(genre.Libelle);
        }
    });

    $('#edit #genres').on('change', function () {

        var idGenre = $(this).val();

        $.ajax({
            url: 'ajax/get-genre.php?id=' + idGenre,
            success: function (data, success) {

                var genre = jQuery.parseJSON(data);

                $('#edit #nom').val(genre.Libelle);
            }
        });
    });
});

