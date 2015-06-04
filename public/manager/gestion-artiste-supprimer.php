<?php
$title = "Supprimer un artiste";

if (empty($_POST) == false) {
    if ($_POST['artistes'] != null) {
        $aGenreArtistes = My_Orm_GenreArtiste::findAll($_POST['artistes']);
        foreach ($aGenreArtistes as $genreArtiste) {
            $genreArtiste->delete();
        }
        $aNationaliteArtistes = My_Orm_NationaliteArtiste::findAll($_POST['artistes']);
        foreach ($aNationaliteArtistes as $nationaliteArtiste) {
            $nationaliteArtiste->delete();
        }
        $oArtiste = My_Orm_Artiste::findForDelete($_POST['artistes']);
        $oArtiste->delete();
    }
}


$aArtistes = My_Orm_Artiste::findAll();

require 'include/header-gestion.php';
?>
<div class="formulaireArtiste">
    <h1 class="titreFormulaire">Supprimer un artiste</h1>
    <form method="post" action="">
        <p><label for="artistes">Choisir un artiste</label>
            <select name="artistes" id="artistes">
                <?php
                foreach ($aArtistes as $artiste) {
                    echo '<option value="' . $artiste->Identifiant . '">' . $artiste->Nom . '</option>';
                }
                ?>
            </select></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Supprimer"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>

