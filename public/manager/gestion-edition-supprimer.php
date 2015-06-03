<?php
if (empty($_POST) == false) {
    if (isset($_POST['editions'])) {
        $oEdition = My_Orm_Edition::find($_POST['editions']);
        if ($oEdition != null) {
            $aPrestations = My_Orm_Prestation::findAll();
            if ($aPrestations != null) {
                $aSupprimer = true;
                foreach ($aPrestations as $prestation) {
                    if ($prestation->IdentifiantEdition == $oEdition->Identifiant) {
                        $aSupprimer = false;
                    }
                }
                if ($aSupprimer) {
                    $oEdition->delete();
                } else {
                    echo '<script type="text/javascript">alert("Impossible de supprimer cette éditon car elle est liée à une prestation")</script>';
                }
            }
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Gestion Editions";

$aEditions = My_Orm_Edition::findAll();

require 'include/header-gestion.php';
?>
<div class="formulaireParametre">
    <h1 class="titreFormulaire">Supprimer une édition</h1>
    <form method="post" action="">
        <p><label for="editions">Choisir une édition</label>
            <select name="editions" id="editions">
                <?php
                if ($aEditions != null) {
                    foreach ($aEditions as $edition) {
                        echo '<option value="' . $edition->Identifiant . '">' . $edition->Libelle . '</option>';
                    }
                }
                ?>
            </select></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Supprimer"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>


