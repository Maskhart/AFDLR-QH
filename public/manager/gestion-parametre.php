<?php

$title = "Gestion paramètres";

require 'include/header-gestion.php';
?>
<div class="choixParametre">
    <h1 class="titreFormulaire">Gestion des paramètres</h1>
    <p class="boutonChoixCentrer"><input type="button" value="Scènes" class="boutonChoix" onclick="document.location.href='gestion-scene.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Genres" class="boutonChoix" onclick="document.location.href='gestion-genre.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Editions des foin" class="boutonChoix" onclick="document.location.href='gestion-edition.php'"/></p>
    <p class="boutonChoixCentrer"><input type="button" value="Nationalités" class="boutonChoix" onclick="document.location.href='gestion-nationalite.php'"/></p>
</div>
<?php
require 'include/footer.php';
?>
