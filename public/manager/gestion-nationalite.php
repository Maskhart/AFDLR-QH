<?php

$title = "Gestion nationalités";

require 'include/header-gestion.php';
?>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des nationalités</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Ajouter une nationalité" class="boutonChoix" onclick="document.location.href='gestion-nationalite-ajouter.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Modifier une nationalité" class="boutonChoix" onclick="document.location.href='gestion-nationalite-modifier.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Supprimer une nationalité" class="boutonChoix" onclick="document.location.href='gestion-nationalite-supprimer.php'"/></p>
</div>
<?php
require 'include/footer.php';
?>


