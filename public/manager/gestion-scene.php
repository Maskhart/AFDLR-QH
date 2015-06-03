<?php
$title = "Gestion scène";

require 'include/header-gestion.php';
?>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des scènes</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Ajouter une scène" class="boutonChoix" onclick="document.location.href='gestion-scene-ajouter.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Modifier une scène" class="boutonChoix" onclick="document.location.href='gestion-scene-modifier.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Supprimer une scène" class="boutonChoix" onclick="document.location.href='gestion-scene-supprimer.php'"/></p>
</div>
<?php
require 'include/footer.php';
?>

