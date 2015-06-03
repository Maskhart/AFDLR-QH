<?php
if (empty($_POST) == false) {
    if ($_POST['nom'] != "") {
        $oScene = new My_Orm_Scene();
        $oScene->Libelle = htmlspecialchars($_POST['nom']);
        $oScene->save();
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Ajouter une scène";

require 'include/header-gestion.php';
?>
<div class="formulaireAjoutParametre">
    <h1 class="titreFormulaire">Ajouter une scène</h1>
    <form method="post" action="">
        <p><label for="nom">Nom</label><input type="text" id="nom" name="nom"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>

