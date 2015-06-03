<?php
if (empty($_POST) == false) {
    if (isset($_POST['hidden'])) {
        $oPrestation = My_Orm_Prestation::find($_POST['hidden']);
        if ($oPrestation != null) {
            foreach ($oPrestation->PrestationMusique as $prestationMusique) {
                $prestationMusique->delete();
            }
            $oPrestation->delete();
        }else{
            echo '<script type="text/javascript">alert("Cette prestation n\'existe pas")</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Aucune prestation séléctionée")</script>';
    }
}
$aEditions = My_Orm_Edition::findAll();
$aScenes = My_Orm_Scene::findAll();

$title = "Supprimer une programmation";
require 'include/header-gestion.php'
?>
<script src="../js/script-programmation.js"></script>
<div class="formulaireProgrammation">
    <h1 class="titreFormulaire">Supprimer une programmation</h1>
    <form id="edit" method="post" action="">
        <div class="divInfoAction">
            <p><label for="edition">Editions</label>
                <select id="edition" name="edition">
                    <?php
                    if ($aEditions != null) {
                        foreach ($aEditions as $edition) {
                            echo '<option value="' . $edition->Identifiant . '">' . $edition->Libelle . '</option>';
                        }
                    }
                    ?>
                </select>
            </p>
            <p><label for="jour">Jour</label>
                <select id="jour" name="jour">
                    <option value="Vendredi">Vendredi</option>
                    <option value="Samedi">Samedi</option>
                </select>
                <input type="button" id="rechercher" name="rechercher" value="Rechercher"/>
            </p>
            <p><label for="scene">Scène</label>
                <select id="scene" name="scene">
                    <?php
                    if ($aScenes != null) {
                        foreach ($aScenes as $scene) {
                            echo '<option value="' . $scene->Identifiant . '">' . $scene->Libelle . '</option>';
                        }
                    }
                    ?>  
                </select>
            </p>
        </div>
        <div class="divInfoAction">
            <p><label for="artiste">Artiste</label>
                <select id="artiste" name="artiste">
                </select>
            </p>
            <input type="hidden" id="hidden" name="hidden"/>
            <p class="boutonValidationFormulaire"><input type="submit" value="Supprimer"</p>
        </div>
    </form>
</div>
<?php
require 'include/footer.php';
?>
