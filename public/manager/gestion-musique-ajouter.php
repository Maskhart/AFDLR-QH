<?php
$title = "Ajouter une musique";

if (empty($_POST) == false) {
    if ($_POST['titre'] != "" AND $_POST['paroles'] != "") {
        $oArtiste = My_Orm_Artiste::find(htmlspecialchars($_POST['artistes']));

        $oMusique = new My_Orm_Musique();
        $oMusique->Titre = htmlspecialchars($_POST['titre']);
        $oMusique->Paroles = htmlspecialchars($_POST['paroles']);
        $oMusique->Artiste = $oArtiste;
        if (isset($_FILES['video']) AND $_FILES['video']['error'] == 0) {
            move_uploaded_file($_FILES['video']['tmp_name'], '../videos/' . basename($_FILES['video']['name']));
            $oVideo = new My_Orm_Video();
            $oVideo->Titre = htmlspecialchars(basename($_FILES['video']['name']));
            $oVideo->Chemin = htmlspecialchars('../videos/' . $_FILES['video']['name']);
            $oVideo->save();

            $oMusique->Video = $oVideo;
        }
        $oMusique->save();
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$aArtistes = My_Orm_Artiste::findAll();

require 'include/header-gestion.php';
?>
<div class="formulaireMusique">
    <h1 class="titreFormulaire">Ajouter une musique</h1>
    <form method="post" action="" enctype="multipart/form-data">
        <p><label for="artistes">Choisir un artiste : </label>
            <select name="artistes" id="artistes">
                <?php
                foreach ($aArtistes as $artiste) {
                    echo '<option value="' . $artiste->Identifiant . '">' . $artiste->Nom . '</option>';
                }
                ?>
            </select></p>
        <p><label for="titre">Titre</label><input type="text" id="titre" name="titre"/></p>
        <p><label for="paroles">Paroles</label><textarea name="paroles" id="paroles" rows="10"></textarea></p>
        <p><label for="video">Vidéo</label><input type="file" id="video" name="video"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>