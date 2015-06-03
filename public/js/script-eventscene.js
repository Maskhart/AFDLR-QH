$(document).ready(function ()
{
    $("#scenes").change(function () {
        var id = $('#scenes option:selected').attr('value');
        var action = $('div.active').attr('id');
        window.location.href = "gestion-scene.php?action="+ action + "&id=" + id;
    });
});

