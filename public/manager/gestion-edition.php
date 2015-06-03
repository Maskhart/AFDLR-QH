<?php

$title = "Gestion édition";

require 'include/header-gestion.php';
?>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des éditions</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Ajouter une édition" class="boutonChoix" onclick="document.location.href='gestion-edition-ajouter.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Modifier une édition" class="boutonChoix" onclick="document.location.href='gestion-edition-modifier.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Supprimer une édition" class="boutonChoix" onclick="document.location.href='gestion-edition-supprimer.php'"/></p>
</div>
<?php
require 'include/footer.php';
?>


