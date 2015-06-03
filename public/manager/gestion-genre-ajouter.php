<?php
if (empty($_POST) == false) {
    if ($_POST['nom'] != "") {
        $oGenre = new My_Orm_Genre();
        $oGenre->Libelle = htmlspecialchars($_POST['nom']);
        $oGenre->save();
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Ajouter un genre";

require 'include/header-gestion.php';
?>
<div class="formulaireAjoutParametre">
    <h1 class="titreFormulaire">Ajouter un genre</h1>
    <form method="post" action="">
        <p><label for="nom">Nom</label><input type="text" id="nom" name="nom"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>


