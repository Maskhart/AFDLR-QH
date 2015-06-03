<?php
if(empty($_POST) == false){
    if(isset($_POST['scenes']) AND $_POST['nom'] != ""){
        $oScene = My_Orm_Scene::find($_POST['scenes']);
        if($oScene != null){
            $oScene->Libelle = htmlspecialchars($_POST['nom']);
            $oScene->save();
        }
    }else{
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Modifier une scène";

$aScenes = My_Orm_Scene::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-scene.js"></script>
<div id="edit" class="formulaireParametre">
    <h1 class="titreFormulaire">Modifier une scène</h1>
    <form method="post" action="">
        <p><label for="scenes">Choisir une scène</label>
            <select id="scenes" name="scenes">
            <?php
            if ($aScenes != null) {
                foreach ($aScenes as $scene) {
                    echo '<option value="' . $scene->Identifiant . '">' . $scene->Libelle . '</option>';
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

