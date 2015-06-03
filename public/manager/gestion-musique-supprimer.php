<?php
$title = "Supprimer une musique";

if (empty($_POST) == false) {
    if (($_POST['artistes'] != null) && ($_POST['musiques'] != null)) {
        $ok = true;
        $oMusique = My_Orm_Musique::find($_POST['musiques']);
        $aPrestationsMusique = My_Orm_PrestationMusique::findAll();
        foreach ($aPrestationsMusique as $prestationMusique) {
            if ($prestationMusique->IdentifiantMusique == $oMusique->Identifiant) {
                $ok = false;
            }
        }
        if ($ok) {
            $oMusique->delete();
        } else {
            echo '<script type="text/javascript">alert("Impossible de supprimer ' . $oMusique->Titre . ' car elle est liée à une prestation musique")</script>';
        }
    }
}

$aArtistes = My_Orm_Artiste::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-musique-supprimer.js"></script>
<div class="formulaireMusique">
    <h1 class="titreFormulaire">Supprimer une musique</h1>
    <form id="delete" method="post" action="">
        <p><label for="artistes">Choisir un artiste : </label>
            <select name="artistes" id="artistes">
                <?php
                foreach ($aArtistes as $artiste) {
                    echo '<option value="' . $artiste->Identifiant . '">' . $artiste->Nom . '</option>';
                }
                ?>
            </select></p>
        <p><label for="musiques">Choisir une musique</label>
            <select name="musiques" id="musiques">
            </select></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Supprimer"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>