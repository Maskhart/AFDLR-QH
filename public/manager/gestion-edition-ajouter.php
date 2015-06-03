<?php
if (empty($_POST) == false) {
    if ($_POST['libelle'] != "" AND $_POST['annee'] != "") {
        $oEdition = new My_Orm_Edition();
        $oEdition->Libelle = htmlspecialchars($_POST['libelle']);
        $oEdition->Annee = htmlspecialchars($_POST['annee']);
        $oEdition->save();
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$anneeMin = date("Y");
$anneeMax = $anneeMin + 50;
$title = "Ajouter une édition";

require 'include/header-gestion.php';
?>
<div class="formulaireAjoutParametre">
    <h1 class="titreFormulaire">Ajouter une édition</h1>
    <form method="post" action="">
        <p><label for="libelle">Libellé</label><input type="text" id="libelle" name="libelle"/></p>
        <p><label for="annee">Année</label><input type="number" name="annee" id="annee" min="<?php echo $anneeMin?>" max="<?php echo $anneeMax?>" /></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>


