$(document).ready(function ()
{
    var idScene = $('#edit #scenes').val();

    $.ajax({
        url: 'ajax/get-scene.php?id=' + idScene,
        success: function (data, success) {

            var scene = jQuery.parseJSON(data);

            $('#edit #nom').val(scene.Libelle);
        }
    });

    $('#edit #scenes').on('change', function () {
        
        var idScene = $(this).val();

        $.ajax({
            url: 'ajax/get-scene.php?id=' + idScene,
            success: function (data, success) {

                var scene = jQuery.parseJSON(data);

                $('#edit #nom').val(scene.Libelle);
            }
        });
    });
});

