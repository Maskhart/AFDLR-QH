<?php
$title = "Modifier une musique";

if (empty($_POST) == false) {
    if (isset($_POST['artistes']) AND isset($_POST['musiques'])) {
        if ($_POST['titre'] != "" AND $_POST['paroles'] != "") {
            $oMusique = My_Orm_Musique::find($_POST['musiques']);
            $oMusique->Titre = htmlspecialchars($_POST['titre']);
            $oMusique->Paroles = htmlspecialchars($_POST['paroles']);
            if (isset($_FILES['videoFile']) AND $_FILES['videoFile']['error'] == 0) {
                move_uploaded_file($_FILES['videoFile']['tmp_name'], '../videos/' . basename($_FILES['videoFile']['name']));
                $oVideo = new My_Orm_Video();
                $oVideo->Titre = htmlspecialchars(basename($_FILES['videoFile']['name']));
                $oVideo->Chemin = htmlspecialchars('../videos/' . $_FILES['videoFile']['name']);
                $oVideo->save();
                
                $oMusique->Video = $oVideo;
            }
            $oMusique->save();
        }else{
            echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
        }
    }
}

$aArtistes = My_Orm_Artiste::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-musique-modifier.js"></script>
<div class="formulaireMusique">
    <h1 class="titreFormulaire">Modifier une musique</h1>
    <form id="edit" method="post" action="" enctype="multipart/form-data">
        <p><label for="artistes">Choisir un artiste : </label>
            <select name="artistes" id="artistes">
                <?php
                if ($aArtistes != null) {
                    foreach ($aArtistes as $artiste) {
                        echo '<option value="' . $artiste->Identifiant . '">' . $artiste->Nom . '</option>';
                    }
                }
                ?>
            </select></p>
        <p><label for="musiques">Choisir une musique</label>
            <select name="musiques" id="musiques">
            </select></p>
        <p><label for="titre">Titre</label><input type="text" id="titre" name="titre"/></p>
        <p><label for="paroles">Paroles</label><textarea name="paroles" id="paroles" rows="10"></textarea></p>
        <p><label for="video">Vidéo</label><input type="text" id="videoTitre" readonly="readonly"/><input type="button" value="Modifier" id="modifierVideo"</p>
        <p class="video" id="videoFile"><input type="file" name="videoFile"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>