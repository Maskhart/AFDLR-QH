<?php
if (empty($_POST) == false) {
    if (isset($_POST['genres']) AND $_POST['nom'] != "") {
        $oGenre = My_Orm_Genre::find($_POST['genres']);
        if ($oGenre != null) {
            $oGenre->Libelle = htmlspecialchars($_POST['nom']);
            $oGenre->save();
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Modifier un genre";

$aGenres = My_Orm_Genre::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-genre.js"></script>
<div id="edit" class="formulaireParametre">
    <h1 class="titreFormulaire">Modifier un genre</h1>
    <form method="post" action="">
        <p><label for="genres">Choisir un genre</label>
            <select name="genres" id="genres">
                <?php
                if ($aGenres != null) {
                    foreach ($aGenres as $genre) {
                        echo '<option value="' . $genre->Identifiant . '">' . $genre->Libelle . '</option>';
                    }
                }
                ?>
            </select></p>
        <p><label for="nom">Nom</label><input type="text" id="nom" name="nom"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>


