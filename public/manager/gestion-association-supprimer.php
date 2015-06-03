<?php
$title = "Supprimer une association";

if (empty($_POST) == false) {
    if (isset($_POST['associations'])) {
        $oAssociation = My_Orm_Association::find($_POST['associations']);

        if ($oAssociation != null) {
            if (isset($oAssociation->Information)) {
                foreach ($oAssociation->Information as $information) {
                    $information->delete();
                }
            }
            if (isset($oAssociation->Action)) {
                foreach ($oAssociation->Action as $action) {
                    $action->delete();
                }
            }
            $oAssociation->delete();
        }
    }
}

$aAssociations = My_Orm_Association::findAll();

require 'include/header-gestion.php';
?>
<div class="formulaireAssociation">
    <h1 class="titreFormulaire">Supprimer une association</h1>
    <form method="post" action="">
        <p><label for="associations">Choisir une association</label>
            <select name="associations" id="associations">
                <?php
                if ($aAssociations != null) {
                    foreach ($aAssociations as $association) {
                        echo '<option value="' . $association->Identifiant . '">' . $association->Libelle . '</option>';
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
