<?php
if (ctype_digit($_GET['id']) == true) {
    $oAction = My_Orm_Action::find($_GET['id']);
    if (empty($_POST) == false) {
        if ($_POST['titre'] != "" AND $_POST['description'] != "" AND $_POST['date'] != null
                AND $_POST['benevole'] != "" AND $_POST['adresse'] != "") {
            if ($oAction != null) {
                $oAction->Titre = htmlspecialchars($_POST['titre']);
                $oAction->Description = htmlspecialchars($_POST['description']);
                $oAction->DateAction = htmlspecialchars($_POST['date']);
                $oAction->NbBenevole = $_POST['benevole'];

                //Changement d'image s'il y en a une
                if (isset($_FILES['imageFile']) AND $_FILES['imageFile']['error'] == 0) {
                    move_uploaded_file($_FILES['imageFile']['tmp_name'], '../img/data/' . basename($_FILES['imageFile']['name']));
                    $oImage = new My_Orm_Image();
                    $oImage->Titre = htmlspecialchars(basename($_FILES['imageFile']['name']));
                    $oImage->Chemin = htmlspecialchars('../img/data/' . $_FILES['imageFile']['name']);
                    $oImage->save();

                    $oAction->Image = $oImage;
                }
                $oAction->save();

                $oAdresse = My_Orm_Adresse::find($oAction->Adresse->Identifiant);
                if ($oAdresse != null) {
                    $oAdresse->Numero = (int) $_POST['numero'];
                    $oAdresse->Adresse = htmlspecialchars($_POST['adresse']);
                    $oAdresse->CP = (int) $_POST['codePostal'];
                    $oAdresse->Ville = htmlspecialchars($_POST['ville']);

                    $oAdresse->save();
                }
                //Redirection vers la page modifier association
                header('Location: gestion-association-modifier.php');
            } else {
                echo '<script type="text/javascript">alert("Cette information n\'existe pas")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Veuillez remplir tous les champs")</script>';
        }
    }
}

$title = "Modifier une action";

require 'include/header-gestion.php';
?>
<script src="../js/script-action-modifier.js"></script>
<div class="formulaireInformation">
    <h2 class="titreFormulaire">Modifier une action</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <p><label for="titre">Titre</label><input type="text" id="titre" name="titre" value="<?php echo $oAction->Titre; ?>"/></p>
        <p><label for="description">Description</label><textarea name="description" id="description" rows="10"><?php echo $oAction->Description;?></textarea>
        <p><label for="date">Date</label><input type="date" id="date" name="date" value="<?php echo $oAction->DateAction; ?>"/></p>
        <p><label for="benevole">Bénévoles</label><input type="number" id="benevole" name="benevole" min="0" max="1000" value="<?php echo $oAction->NbBenevole;?>"/></p>
        <p><label for="image">Image</label><input type="text" id="image" name="image" readonly="readonly" value="<?php if($oAction->Image){echo $oAction->Image->Titre;}else{ echo "Pas d'image";}?>"/><input type="button" value="Modifier" id="modifierImage"/></p>
        <p class="image" id="imageFile"><input type="file" name="imageFile"/></p>
        <p><label for="numero">Numéro</label><input type="number" id="numero" name="numero" value="<?php echo $oAction->Adresse->Numero;?>"/></p>
        <p><label for="adresse">Rue</label><input type="text" id="adresse" name="adresse" value="<?php echo $oAction->Adresse->Adresse;?>"/></p>
        <p><label for="codePostal">Code postal</label><input type="number" id="codePostal" name="codePostal" value="<?php echo $oAction->Adresse->CP;?>"/></p>
        <p><label for="ville">Ville</label><input type="text" id="ville" name="ville" value="<?php echo $oAction->Adresse->Ville;?>"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"/>
            <input type="button" value="Annuler" onclick="document.location.href = 'gestion-association-modifier.php'" />
        </p>
    </form>
</div>
<?php
require 'include/footer.php';
?>
