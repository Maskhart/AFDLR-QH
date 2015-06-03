<?php
if (empty($_POST) == false) {
    if (isset($_POST['scenes'])) {
        $oScene = My_Orm_Scene::find($_POST['scenes']);
        if ($oScene != null) {
            $aPrestations = My_Orm_Prestation::findAll();
            if ($aPrestations != null) {
                $aSupprimer = true;
                foreach ($aPrestations as $prestation) {
                    if($prestation->IdentifiantScene == $oScene->Identifiant){
                        $aSupprimer = false;
                    }
                }
                if ($aSupprimer) {
                    $oScene->delete();
                } else {
                    echo '<script type="text/javascript">alert("Impossible de supprimer cette scène car elle est liée à une prestation")</script>';
                }
            }
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Supprimer une scène";

$aScenes = My_Orm_Scene::findAll();

require 'include/header-gestion.php';
?>
<div class="formulaireParametre">
    <h1 class="titreFormulaire">Supprimer une scène</h1>
    <form method="post" action="" >
        <p><label for="scenes">Choisir une scène</label>
            <select name="scenes" id="scenes">
                <?php
                if ($aScenes != null) {
                    foreach ($aScenes as $scene) {
                        echo '<option value="' . $scene->Identifiant . '">' . $scene->Libelle . '</option>';
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

