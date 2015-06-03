<?php
if(empty($_POST) == false){
    if(isset($_POST['genres'])){
        $oGenre = My_Orm_Genre::find($_POST['genres']);
        if($oGenre != null){
            $aArtistes = My_Orm_Artiste::findAll();
            if($aArtistes != null){
                $aSupprimer = true;
                foreach ($aArtistes as $artiste) {
                    foreach ($artiste->GenreArtiste as $genreArtiste) {
                        if($genreArtiste->IdentifiantGenre == $oGenre->Identifiant){
                            $aSupprimer = false;
                        }
                    }
                }
                if($aSupprimer){
                    $oGenre->delete();
                }else{
                    echo '<script type="text/javascript">alert("Impossible de supprimer ce genre car il est lié à un artiste")</script>';
                }
            }
        }
    }else{
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Supprimer un genre";

$aGenres = My_Orm_Genre::findAll();

require 'include/header-gestion.php';
?>
<div class="formulaireParametre">
    <h1 class="titreFormulaire">Supprimer un genre</h1>
    <form method="post" action="">
        <p><label for="genres">Choisir un genre</label>
            <select name="genres" id="genres">
            <?php
            if($aGenres != null){
                foreach ($aGenres as $genre) {
                    echo '<option value="' . $genre->Identifiant . '">' . $genre->Libelle . '</option>';
                }
            }
            ?>
            </select></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Supprimer"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>


