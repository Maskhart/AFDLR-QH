<?php
if (empty($_POST) == false) {
    if (isset($_POST['editionEdit']) AND $_POST['jourEdit'] != "" AND isset($_POST['sceneEdit'])
            AND isset($_POST['artiste']) AND $_POST['ordrePassage'] != "" AND $_POST['heureDebut'] != ""
            AND $_POST['heureFin'] != "" AND $_POST['hidden'] != "") {
        if ($_POST['jourEdit'] == "Vendredi" OR $_POST['jourEdit'] == "Samedi") {
            $oPrestation = My_Orm_Prestation::find($_POST['hidden']);
            if ($oPrestation != null) {
                $oPrestation->JourPassage = htmlspecialchars($_POST['jourEdit']);
                $oPrestation->OrdrePassage = htmlspecialchars($_POST['ordrePassage']);
                $oPrestation->HeureDebut = $_POST['heureDebut'];
                $oPrestation->HeureFin = $_POST['heureFin'];

                $oEdition = My_Orm_Edition::find($_POST['editionEdit']);
                if ($oEdition != null) {
                    $oPrestation->Edition = $oEdition;
                }
                $oScene = My_Orm_Scene::find($_POST['sceneEdit']);
                if ($oScene != null) {
                    $oPrestation->Scene = $oScene;
                }

                $oPrestation->save();
            } else {
                echo '<script type="text/javascript">alert("La prestation est invalide")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Jour invalide")</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs")</script>';
    }
}
$aEditions = My_Orm_Edition::findAll();
$aScenes = My_Orm_Scene::findAll();

$title = "Modifier une programmation";
require 'include/header-gestion.php'
?>
<script src="../js/script-programmation.js"></script>
<div class="formulaireProgrammation">
    <h1 class="titreFormulaire">Modifier une programmation</h1>
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
            <p><label for="editionEdit">Editions</label><select id="editionEdit" name="editionEdit"></select></p>
            <p><label for="jourEdit">Jour</label><select id="jourEdit" name="jourEdit"></select></p>
            <p><label for="sceneEdit">Scène</label><select id="sceneEdit" name="sceneEdit"></select></p>
            <p><label for="artiste">Artiste</label> <select id="artiste" name="artiste"></select></p>
            <p><label for="ordrePassage">Ordre de passage</label><input type="number" id="ordrePassage" name="ordrePassage"/></p>
            <p><label for="heureDebut">Début</label><input type="time" id="heureDebut" name="heureDebut"/></p>
            <p><label for="heureFin">Fin</label><input type="time" id="heureFin" name="heureFin"/></p>
            <input type="hidden" id="hidden" name="hidden"/>
            <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"</p>
        </div>
    </form>
</div>
<?php
require 'include/footer.php';
?>
