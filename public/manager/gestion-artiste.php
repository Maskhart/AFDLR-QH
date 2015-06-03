<?php

$title = "Gestion artiste";

require 'include/header-gestion.php';
?>
<script src="../js/script-artiste.js"></script>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des artistes</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Ajouter un Artiste" class="boutonChoix" id="boutonAjouter" onclick="document.location.href = 'gestion-artiste-ajouter.php'" /></p>
    <p class="boutonChoixCentrer"><input type="button" value="Modifier un Artiste" class="boutonChoix" id="boutonModifier" onclick="document.location.href = 'gestion-artiste-modifier.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Supprimer un Artiste" class="boutonChoix" id="boutonSupprimer" onclick="document.location.href = 'gestion-artiste-supprimer.php'"/></p>
</div>
<?php require 'include/footer.php'; ?>
