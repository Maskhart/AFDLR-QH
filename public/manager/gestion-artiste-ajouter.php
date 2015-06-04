<?php

$title = "Ajouter un artiste";

if (empty($_POST) == false) {
    if ($_POST['nom'] != "" AND $_POST['description'] != "") {
        if (isset($_POST['inputGenresArtiste']) AND $_POST['inputGenresArtiste'] != "") {
            if (isset($_POST['inputNationalitesArtiste']) AND $_POST['inputNationalitesArtiste'] != "") {
                $oArtiste = new My_Orm_Artiste();
                $oArtiste->Nom = htmlspecialchars($_POST['nom']);
                $oArtiste->Description = htmlspecialchars($_POST['description']);

                $tabIdsGenresArtiste = explode(",", $_POST['inputGenresArtiste']);
                $tabIdsNationalitesArtiste = explode(",", $_POST['inputNationalitesArtiste']);

                //Ajout de la banniere
                if (isset($_FILES['banniere']) AND $_FILES['banniere']['error'] == 0) {
                    move_uploaded_file($_FILES['banniere']['tmp_name'], '../img/data/' . basename($_FILES['banniere']['name']));
                    $oImage = new My_Orm_Image();
                    $oImage->Titre = htmlspecialchars(basename($_FILES['banniere']['name']));
                    $oImage->Chemin = htmlspecialchars('../img/data/' . $_FILES['banniere']['name']);
                    $oImage->save();

                    $oArtiste->Image = $oImage;
                }

                //Ajout de la miniature
                if (isset($_FILES['miniature']) AND $_FILES['miniature']['error'] == 0) {
                    move_uploaded_file($_FILES['miniature']['tmp_name'], '../img/data/' . basename($_FILES['miniature']['name']));
                    $oMiniature = new My_Orm_Miniature();
                    $oMiniature->Titre = htmlspecialchars(basename($_FILES['miniature']['name']));
                    $oMiniature->Chemin = htmlspecialchars('../img/data/' . $_FILES['miniature']['name']);
                    $oMiniature->save();

                    $oArtiste->Miniature = $oMiniature;
                }

                //Ajout de la vidéo s'il y en a une
                if (isset($_FILES['video']) AND $_FILES['video']['error'] == 0) {
                    move_uploaded_file($_FILES['video']['tmp_name'], '../videos/' . basename($_FILES['video']['name']));
                    $oVideo = new My_Orm_Video();
                    $oVideo->Titre = htmlspecialchars(basename($_FILES['video']['name']));
                    $oVideo->Chemin = htmlspecialchars('../videos/' . $_FILES['video']['name']);
                    $oVideo->save();

                    $oArtiste->Video = $oVideo;
                }
                //Inscrit l'artiste en base de donnée
                $oArtiste->save();

                //Recupération du ou des genre(s)
                foreach ($tabIdsGenresArtiste as $idGenre) {
                    $oGenre = My_Orm_Genre::find($idGenre);
                    if ($oGenre != null) {
                        $oGenreArtiste = new My_Orm_GenreArtiste();
                        $oGenreArtiste->IdentifiantGenre = $oGenre->Identifiant;
                        $oGenreArtiste->IdentifiantArtiste = $oArtiste->Identifiant;
                        $oGenreArtiste->save();
                    }
                }

                //Récupération de la ou les nationalité(s)
                foreach ($tabIdsNationalitesArtiste as $idNationalite) {
                    $oNationalite = My_Orm_Nationalite::find($idNationalite);
                    if ($oNationalite != null) {
                        $oNationaliteArtiste = new My_Orm_NationaliteArtiste();
                        $oNationaliteArtiste->IdentifiantNationalite = $oNationalite->Identifiant;
                        $oNationaliteArtiste->IdentifiantArtiste = $oArtiste->Identifiant;
                        $oNationaliteArtiste->save();
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

$aGenres = My_Orm_Genre::findAll();
$aNationalites = My_Orm_Nationalite::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-artiste-ajouter.js"></script>
<div class="formulaireAjoutArtiste">
    <h1 class="titreFormulaire">Ajouter un artiste</h1>
    <form id="add" method="post" action="" enctype="multipart/form-data">
        <p><label for="nom">Nom</label><input type="text" id="nom" name="nom"/></p>
        <p><label for="description">Description</label><textarea name="description" id="description" rows="10"></textarea></p>
        <p><label for="image">Bannière</label><input type="file" value="Parcourir" id="image" name="banniere"/></p>
        <p><label for="image">Miniature</label><input type="file" value="Parcourir" id="image" name="miniature"/></p>
        <p><label for="video">Vidéo</label><input type="file" value="Parcourir" id="video" name="video"/></p>
        <div class="selectGenres"><label for="genre">Genre</label>
            <select id="genres" class="allGenres" multiple>
            </select>
            <div class="conteneurBouton">
                <input type="button" id="ajoutGenre" class="boutonSelect" name="ajoutGenreArtiste" value="-->"/>
                <input type="button" id="supprimerGenre" class="boutonSelect" name="supprimerGenreArtiste" value="<--"/>
            </div>
            <select id="genresArtiste" multiple></select>
            <input type="hidden" id="inputGenresArtiste" name="inputGenresArtiste" />
        </div>
        <div class="selectNationalites"><label for="nationalites">Nationalité</label>
            <select id="nationalites" class="allNationalites" multiple></select>
            <div class="conteneurBouton">
                <input type="button" id="ajoutNationalite" class="boutonSelect" name="ajoutNationaliteArtiste" value="-->"/>
                <input type="button" id="supprimerNationalite" class="boutonSelect" name="supprimerNationaliteArtiste" value="<--"/>
            </div>
            <select id="nationalitesArtiste" multiple></select>
            <input type="hidden" id="inputNationalitesArtiste" name="inputNationalitesArtiste" />
        </div>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/></p>
    </form>
</div>
<?php

require 'include/footer.php';
?>
