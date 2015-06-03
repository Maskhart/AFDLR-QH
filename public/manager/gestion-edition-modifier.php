<?php
if (empty($_POST) == false) {
    if (isset($_POST['editions']) AND $_POST['libelle'] != "" AND $_POST['annee'] != "") {
        $oEdition = My_Orm_Edition::find($_POST['editions']);
        if ($oEdition != null) {
            $oEdition->Libelle = htmlspecialchars($_POST['libelle']);
            $oEdition->Annee = htmlspecialchars($_POST['annee']);
            $oEdition->save();
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$anneeMin = date("Y");
$anneeMax = $anneeMin + 50;

$title = "Modifier une édition";

$aEditions = My_Orm_Edition::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-edition.js"></script>
<div id="edit" class="formulaireParametre">
    <h1 class="titreFormulaire">Modifier une édition</h1>
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
        <p><label for="libelle">Libellé</label><input type="text" id="libelle" name="libelle"/></p>
        <p><label for="annee">Année</label><input type="number" name="annee" id="annee" min="<?php echo $anneeMin ?>" max="<?php echo $anneeMax ?>" /></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>


