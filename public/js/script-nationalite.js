$(document).ready(function ()
{
    var idNationalite = $('#edit #nationalites').val();

    $.ajax({
        url: 'ajax/get-nationalite.php?id=' + idNationalite,
        success: function (data, success) {

            var nationalite = jQuery.parseJSON(data);

            $('#edit #libelleCourt').val(nationalite.LibelleCourt);
            $('#edit #libelleLong').val(nationalite.LibelleLong);
        }
    });

    $('#edit #nationalites').on('change', function () {

        var idNationalite = $(this).val();

        $.ajax({
            url: 'ajax/get-nationalite.php?id=' + idNationalite,
            success: function (data, success) {

                var nationalite = jQuery.parseJSON(data);

                $('#edit #libelleCourt').val(nationalite.LibelleCourt);
                $('#edit #libelleLong').val(nationalite.LibelleLong);
            }
        });
    });
});

