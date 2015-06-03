<?php
$title = "Gestion genre";

require 'include/header-gestion.php';
?>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des genres</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Ajouter un genre" class="boutonChoix" onclick="document.location.href='gestion-genre-ajouter.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Modifier un genre" class="boutonChoix" onclick="document.location.href='gestion-genre-modifier.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Supprimer un genre" class="boutonChoix" onclick="document.location.href='gestion-genre-supprimer.php'"/></p>
</div>
<?php
require 'include/footer.php';
?>


