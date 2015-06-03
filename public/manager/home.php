<?php
$title = 'Accueil';

require "include/header.php";
?>

<div class="connexion">
    <p><input type="button" value="Gestion Live" id="menuBouton" onclick="document.location.href = 'gestion-live.php'"/></p>
    <p><input type="button" value="Gestion Contenu" id="menuBouton" onclick="document.location.href = 'gestion-contenu.php'"/></p>
</div>

<?php
require "include/footer.php";
