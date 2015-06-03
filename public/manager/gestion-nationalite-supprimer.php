<?php
if (empty($_POST) == false) {
    if (isset($_POST['nationalites'])) {
        $oNationalite = My_Orm_Nationalite::find($_POST['nationalites']);
        if ($oNationalite != null) {
            $aArtistes = My_Orm_Artiste::findAll();
            if ($aArtistes != null) {
                $aSupprimer = true;
                foreach ($aArtistes as $artiste) {
                    foreach ($artiste->NationaliteArtiste as $nationaliteArtiste) {
                        if ($nationaliteArtiste->IdentifiantNationalite == $oNationalite->Identifiant) {
                            $aSupprimer = false;
                        }
                    }
                }
                if ($aSupprimer) {
                    $oNationalite->delete(); 
                } else {
                    echo '<script type="text/javascript">alert("Impossible de supprimer cette nationalité car elle est liée à un artiste")</script>';
                }
            }
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Supprimer une nationalité";

$aNationalites = My_Orm_Nationalite::findAll();

require 'include/header-gestion.php';
?>
<div class="formulaireParametre">
    <h1 class="titreFormulaire">Supprimer une nationalité</h1>
    <form method="post" action="">
        <p><label for="nationalites">Choisir une nationalité</label>
            <select name="nationalites" id="nationalites">
                <?php
                if ($aNationalites != null) {
                    foreach ($aNationalites as $nationalite) {
                        echo '<option value="' . $nationalite->Identifiant . '">' . $nationalite->LibelleLong . '</option>';
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


