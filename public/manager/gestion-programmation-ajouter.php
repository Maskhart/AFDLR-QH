<?php
if (empty($_POST) == false) {
    if (isset($_POST['edition']) AND isset($_POST['jour']) AND isset($_POST['scene']) AND $_POST['ordrePassage'] != "" 
            AND $_POST['heureDebut'] AND $_POST['heureFin'] != "" AND isset($_POST['artiste'])) {
        if ($_POST['jour'] == "Vendredi" OR $_POST['jour'] == "Samedi") {
            $oPrestation = new My_Orm_Prestation();
            $oEdition = My_Orm_Edition::find($_POST['edition']);
            if ($oEdition != null) {
                $oPrestation->Edition = $oEdition;
            }
            $oPrestation->JourPassage = htmlspecialchars($_POST['jour']);
            $oScene = My_Orm_Scene::find($_POST['scene']);
            if ($oScene != null) {
                $oPrestation->Scene = $oScene;
            }
            $oPrestation->OrdrePassage = htmlspecialchars($_POST['ordrePassage']);
            $oPrestation->HeureDebut = $_POST['heureDebut'];
            $oPrestation->HeureFin = $_POST['heureFin'];
            $oArtiste = My_Orm_Artiste::find($_POST['artiste']);
            if ($oArtiste != null) {
                $oPrestation->Artiste = $oArtiste;
                $oPrestation->save();
                foreach ($oArtiste->Musique as $musique) {
                    $oPrestationMusique = new My_Orm_PrestationMusique();
                    $oPrestationMusique->IdentifiantMusique = $musique->Identifiant;
                    $oPrestationMusique->IdentifiantPrestation = $oPrestation->Identifiant;

                    $oPrestationMusique->save();
                }
            }
        } else {
            echo '<script type="text/javascript">alert("Jour invalide")</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}
$aEditions = My_Orm_Edition::findAll();
$aScenes = My_Orm_Scene::findAll();
$aArtistes = My_Orm_Artiste::findAll();

$title = "Ajouter une programmation";
require 'include/header-gestion.php'
?>
<div class="formulaireProgrammation">
    <h1 class="titreFormulaire">Ajouter une programmation</h1>
    <form method="post" action="">
        <p><label for="edition">Editions</label>
            <select name="edition">
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
            <select name="jour">
                <option value="Vendredi">Vendredi</option>
                <option value="Samedi">Samedi</option>
            </select>
        </p>
        <p><label for="scene">Scène</label>
            <select name="scene">
                <?php
                if ($aScenes != null) {
                    foreach ($aScenes as $scene) {
                        echo '<option value="' . $scene->Identifiant . '">' . $scene->Libelle . '</option>';
                    }
                }
                ?>  
            </select>
        </p>
        <p><label for="ordrePassage">Ordre de passage</label><input id="ordrePassageId" name="ordrePassage" type="number"/></p>
        <p><label for="heureDebut">Début</label><input type="time" name="heureDebut"/></p>
        <p><label for="heureFin">Fin</label><input type="time" name="heureFin"/></p>
        <p><label for="artiste">Artiste</label>
            <select name="artiste">
                <?php
                if ($aArtistes != null) {
                    foreach ($aArtistes as $artiste) {
                        echo '<option value="' . $artiste->Identifiant . '">' . $artiste->Nom . '</option>';
                    }
                }
                ?>  
            </select>
        </p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"</p>
    </form>
</div>
<?php
require 'include/footer.php';
?>
