<?php

$title = "Gestion association";

require 'include/header-gestion.php';
?>
<script src="../js/script-association.js"></script>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des associations</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Ajouter une association" class="boutonChoix" id="boutonAjouter" onclick="document.location.href = 'gestion-association-ajouter.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Modifier une association" class="boutonChoix" id="boutonModifier" onclick="document.location.href = 'gestion-association-modifier.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Supprimer une association" class="boutonChoix" id="boutonSupprimer" onclick="document.location.href = 'gestion-association-supprimer.php'"/></p>
</div>
<?php

require 'include/footer.php';
?>
