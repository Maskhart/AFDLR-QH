<?php
$title = "Gestion programmation";

require 'include/header-gestion.php';
?>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des programmations</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Ajouter une programmation" class="boutonChoix" onclick="document.location.href='gestion-programmation-ajouter.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Modifier une programmation" class="boutonChoix" onclick="document.location.href='gestion-programmation-modifier.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Supprimer une programmation" class="boutonChoix" onclick="document.location.href='gestion-programmation-supprimer.php'"/></p>
</div>
<?php
require 'include/footer.php';
?>

