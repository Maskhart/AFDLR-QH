<?php

$title = "Gestion musique";

require 'include/header-gestion.php';
?>
<script src="../js/script-musique.js"></script>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des musiques</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Ajouter une musique" class="boutonChoix" id="boutonAjouter" onclick="document.location.href = 'gestion-musique-ajouter.php'" /></p>
    <p class="boutonChoixCentrer"><input type="button" value="Modifier une musique" class="boutonChoix" id="boutonModifier" onclick="document.location.href = 'gestion-musique-modifier.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Supprimer une musique" class="boutonChoix" id="boutonSupprimer" onclick="document.location.href = 'gestion-musique-supprimer.php'"/></p>
</div>
<?php

require 'include/footer.php';
?>

