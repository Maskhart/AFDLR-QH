<?php
$title = 'Gestion du live';


// Avant le header - controller (en live ou require'controler/gestion-live.php')


require "include/header.php";
?>
<script src="../js/script-programmation-live.js"></script>
<div id="divMainLive">
    <h1 id="gestionLive">Gestion Live</h1>
    <div id="divDiffusion">
        <h4 class="artisteActif">En ce moment : </h4>
        <?php
        $oLive = My_Orm_Live::find();
        if ($oLive != null) {
            echo '<div>' . $oLive->PrestationMusique->Prestation->Scene->Libelle . '</div>';
            echo '<div>' . $oLive->PrestationMusique->Prestation->Artiste->Nom . '</div>';
            echo '<div>' . $oLive->PrestationMusique->Musique->Titre . '</div>';
        } else {
            echo '<div> Pas de live en ce moment</div>';
        }
        ?>
    </div>
    <h3 class="programmation">Programmation</h3>
    <input type="button" value="Vendredi" id="vendredi"/><input type="button" value="Samedi" id="samedi"/>
    <div id="progra" class="divPrograGenerale">
    </div>
    <div id="listeMusiques">
        <form>
            <h3>Liste des musiques :</h3>
            <div id="divMusiques">
                <select name="musiques" id="musiques">
                </select>
            </div>
            <input type="button" value="Rendre accessible" id="boutonAccessible"/>
        </form>
    </div>
</div>
<?php
require "include/footer.php";
?>
