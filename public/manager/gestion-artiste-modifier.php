<?php
$title = "Modifier un artiste";

if (empty($_POST) == false) {
    if (isset($_POST['artistes']) AND $_POST['nom'] != "" AND $_POST['description'] != "") {
        if (isset($_POST['inputGenresArtiste']) AND $_POST['inputGenresArtiste'] != "") {
            if (isset($_POST['inputNationalitesArtiste']) AND $_POST['inputNationalitesArtiste'] != "") {
                $oArtiste = My_Orm_Artiste::find($_POST['artistes']);
                $oArtiste->Nom = htmlspecialchars($_POST['nom']);
                $oArtiste->Description = htmlspecialchars($_POST['description']);

                $tabIdsGenresArtiste = explode(",", $_POST['inputGenresArtiste']);
                $tabIdsNationalitesArtiste = explode(",", $_POST['inputNationalitesArtiste']);

                if (isset($_FILES['banniereFile']) AND $_FILES['banniereFile']['error'] == 0) {
                    move_uploaded_file($_FILES['banniereFile']['tmp_name'], '../img/data/' . basename($_FILES['banniereFile']['name']));
                    $oImage = new My_Orm_Image();
                    $oImage->Titre = htmlspecialchars(basename($_FILES['banniereFile']['name']));
                    $oImage->Chemin = htmlspecialchars('../img/data/' . $_FILES['banniereFile']['name']);
                    $oImage->save();

                    $oArtiste->Image = $oImage;
                }

                if (isset($_FILES['miniatureFile']) AND $_FILES['miniatureFile']['error'] == 0) {
                    move_uploaded_file($_FILES['miniatureFile']['tmp_name'], '../img/data/' . basename($_FILES['miniatureFile']['name']));
                    $oMiniature = new My_Orm_Miniature();
                    $oMiniature->Titre = htmlspecialchars(basename($_FILES['miniatureFile']['name']));
                    $oMiniature->Chemin = htmlspecialchars('../img/data/' . $_FILES['miniatureFile']['name']);
                    $oMiniature->save();

                    $oArtiste->Miniature = $oMiniature;
                }

                if (isset($_FILES['videoFile']) AND $_FILES['videoFile']['error'] == 0) {
                    move_uploaded_file($_FILES['videoFile']['tmp_name'], '../videos/' . basename($_FILES['videoFile']['name']));
                    $oVideo = new My_Orm_Video();
                    $oVideo->Titre = htmlspecialchars(basename($_FILES['videoFile']['name']));
                    $oVideo->Chemin = htmlspecialchars('../videos/' . $_FILES['videoFile']['name']);
                    $oVideo->save();

                    $oArtiste->Video = $oVideo;
                }
                //Save l'artiste en base de donnée
                $oArtiste->save();

                //Recupération du ou des genre(s)
                //Ajout des genres s'il y en a a ajouter
                foreach ($tabIdsGenresArtiste as $idGenre) {
                    $aAjouter = true;
                    foreach ($oArtiste->GenreArtiste as $genreArtiste) {
                        if ($idGenre == $genreArtiste->IdentifiantGenre) {
                            $aAjouter = false;
                        }
                    }
                    if ($aAjouter) {
                        $oGenreArtiste = new My_Orm_GenreArtiste();
                        $oGenreArtiste->IdentifiantArtiste = $oArtiste->Identifiant;
                        $oGenreArtiste->IdentifiantGenre = $idGenre;
                        $oGenreArtiste->save();
                    }
                }
                //Suppression des genres s'il y en a supprimer
                foreach ($oArtiste->GenreArtiste as $genreArtiste) {
                    if (!in_array($genreArtiste->IdentifiantGenre, $tabIdsGenresArtiste)) {
                        $genreArtiste->delete();
                    }
                }
                //Récupération de la ou les nationalité(s)
                //Ajout des nationalites s'il y en a a ajouter
                foreach ($tabIdsNationalitesArtiste as $idNationalite) {
                    $aAjouter = true;
                    foreach ($oArtiste->NationaliteArtiste as $nationaliteArtiste) {
                        if ($idNationalite == $nationaliteArtiste->IdentifiantNationalite) {
                            $aAjouter = false;
                        }
                    }
                    if ($aAjouter) {
                        $oNationaliteArtiste = new My_Orm_NationaliteArtiste();
                        $oNationaliteArtiste->IdentifiantArtiste = $oArtiste->Identifiant;
                        $oNationaliteArtiste->IdentifiantNationalite = $idNationalite;
                        $oNationaliteArtiste->save();
                    }
                }
                //Suppression des genres s'il y en a supprimer
                foreach ($oArtiste->NationaliteArtiste as $nationaliteArtiste) {
                    if (!in_array($nationaliteArtiste->IdentifiantNationalite, $tabIdsNationalitesArtiste)) {
                        $nationaliteArtiste->delete();
                    }
                }
            } else {
                echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$aArtistes = My_Orm_Artiste::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-artiste-modifier.js"></script>
<div class="formulaireArtiste">
    <h1 class="titreFormulaire">Modifier un artiste</h1>
    <form id="edit" method="post" action="" enctype="multipart/form-data">
        <p>
            <label for="artistes">Choisir un artiste</label>
            <select name="artistes" id="artistes">
                <?php
                if ($aArtistes != null) {
                    foreach ($aArtistes as $artiste) {
                        echo '<option value="' . $artiste->Identifiant . '">' . $artiste->Nom . '</option>';
                    }
                }
                ?>
            </select>
        </p>
        <p><label for="nom">Nom</label><input type="text" id="nom" name="nom"/></p>
        <p><label for="description">Description</label><textarea name="description" id="description" rows="10"></textarea></p>
        <p><label for="modifierBanniere">Bannière</label><input type="text" id="banniereTitre" readonly="readonly"/><input type="button" value="Modifier" id="modifierBanniere"/></p>
        <p class="image" id="banniereFile"><input type="file" name="banniereFile"/></p>
        <p><label for="modifierMiniature">Miniature</label><input type="text" id="miniatureTitre" readonly="readonly"/><input type="button" value="Modifier" id="modifierMiniature"/></p>
        <p class="image" id="miniatureFile"><input type="file" name="miniatureFile"/></p>
        <p><label for="video">Vidéo</label><input type="text" id="videoTitre" readonly="readonly"/><input type="button" value="Modifier" id="modifierVideo"/></p>
        <p class="video" id="videoFile"><input type="file" name="videoFile"/></p>
        <div class="selectGenres"><label for="genres">Genre</label>
            <select id="genres" class="allGenres" multiple></select>
            <div class="conteneurBouton">
                <input type="button" id="ajoutGenreArtiste" class="boutonSelect" name="ajoutGenreArtiste" value="-->"/>
                <input type="button" id="supprimerGenreArtiste" class="boutonSelect" name="supprimerGenreArtiste" value="<--"/>
            </div>
            <select id="genresArtiste" multiple></select>
            <input type="hidden" id="inputGenresArtiste" name="inputGenresArtiste" />
        </div>
        <div class="selectNationalites"><label for="nationalites">Nationalité</label>
            <select id="nationalites" class="allNationalites" multiple></select>
            <div class="conteneurBouton">
                <input type="button" id="ajoutNationaliteArtiste" class="boutonSelect" name="ajoutNationaliteArtiste" value="-->"/>
                <input type="button" id="supprimerNationaliteArtiste" class="boutonSelect" name="supprimerNationaliteArtiste" value="<--"/>
            </div>
            <select id="nationalitesArtiste" multiple></select>
            <input type="hidden" id="inputNationalitesArtiste" name="inputNationalitesArtiste" />
        </div>
        <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>