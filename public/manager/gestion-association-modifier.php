<?php
$title = "Modifier une association";
$telephone = "#^0[1-8]([-. ]?[0-9]{2}){4}$#";
$email = "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#";

if (empty($_POST) == false) {
    if (isset($_POST['associations']) AND $_POST['nom'] != "" AND $_POST['description'] != "" AND $_POST['telephone'] != "" AND $_POST['email'] != "") {
        if (preg_match($telephone, $_POST['telephone'])) {
            if (preg_match($email, $_POST['email'])) {
                $oAssociation = My_Orm_Association::find($_POST['associations']);
                if ($oAssociation != null) {
                    $oAssociation->Libelle = htmlspecialchars($_POST['nom']);
                    $oAssociation->Description = htmlspecialchars($_POST['description']);
                    $oAssociation->Telephone = htmlspecialchars($_POST['telephone']);
                    $oAssociation->Mail = htmlspecialchars($_POST['email']);
                    $oAssociation->save();
                } else {
                    echo '<script type="text/javascript">alert("Cette association n\'existe pas")</script>';
                }
            } else {
                echo '<script type="text/javascript">alert("Email invalide")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Telephone invalide")</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}


$aAssociations = My_Orm_Association::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-association.js"></script>
<div class="formulaireAssociation">
    <h1 class="titreFormulaire">Modifier une association</h1>
    <form id="edit" method="post" action="">
        <p><label for="associations">Choisir une association</label>
            <select name="associations" id="associations">
                <?php
                if ($aAssociations != null) {
                    foreach ($aAssociations as $association) {
                        echo '<option value="' . $association->Identifiant . '">' . $association->Libelle . '</option>';
                    }
                }
                ?>
            </select></p>
        <p><label for="nom">Nom</label><input type="text" id="nom" name="nom"/></p>
        <p><label for="description">Description</label><textarea id="description" name="description"></textarea></p>
        <p><label for="telephone">Telephone</label><input type="tel" id="telephone" name="telephone"/></p>
        <p><label for="email">Email</label><input type="email" id="email" name="email" /></p>
        <div class="divInfoAction">
        <p><label for="informations">Informations</label><select id="informations" name="informations"></select>
            <input type="button" id="supprimerInfo" value="Supprimer"/>
        </p>
        <p><input type="button" id="ajoutInfo" class="gestionInfo" value="Ajouter une information"/></p>
        <p><input type="button" id="modifierInfo" class="gestionInfo" value="Modifier une information"/></p>
        </div>
        <div class="divInfoAction">
        <p><label for="actions">Actions</label><select id="actions" name="actions"></select>
            <input type="button" id="supprimerAction" value="Supprimer"/>
        </p>
        <p><input type="button" id="ajoutAction" class="gestionInfo" value="Ajouter une action"/></p>
        <p><input type="button" id="modifierAction" class="gestionInfo" value="Modifier une action"/></p>
        </div>
        <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>
