<?php
if (empty($_POST) == false) {
    if ($_POST['libelleCourt'] != "" AND $_POST['libelleLong'] != "") {
        $oNationalite = new My_Orm_Nationalite();
        $oNationalite->LibelleCourt = htmlspecialchars($_POST['libelleCourt']);
        $oNationalite->LibelleLong = htmlspecialchars($_POST['libelleLong']);
        $oNationalite->save();
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Ajouter une nationalité";

require 'include/header-gestion.php';
?>
<div class="formulaireParametre">
    <h1 class="titreFormulaire">Ajouter une nationalité</h1>
    <form method="post" action="">
        <p><label for="libelleCourt">Libellé court</label><input type="text" id="libelleCourt" name="libelleCourt"/></p>
        <p><label for="libelleLong">Libellé long</label><input type="text" id="libelleLong" name="libelleLong"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>


