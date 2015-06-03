<?php
if (ctype_digit($_GET['id']) == true) {
    $oInformation = My_Orm_Information::find($_GET['id']);
    if (empty($_POST) == false) {
        if ($_POST['titre'] != "" AND $_POST['description'] != "") {
            if ($oInformation != null) {
                $oInformation->Titre = htmlspecialchars($_POST['titre']);
                $oInformation->Description = htmlspecialchars($_POST['description']);
                $oInformation->DatePublication = date('Y-m-d');

                if (isset($_FILES['imageFile']) AND $_FILES['imageFile']['error'] == 0) {
                    move_uploaded_file($_FILES['imageFile']['tmp_name'], '../img/data/' . basename($_FILES['imageFile']['name']));
                    $oImage = new My_Orm_Image();
                    $oImage->Titre = htmlspecialchars(basename($_FILES['imageFile']['name']));
                    $oImage->Chemin = htmlspecialchars('../img/data/' . $_FILES['imageFile']['name']);
                    $oImage->save();

                    $oInformation->Image = $oImage;
                }
                $oInformation->save();

                header('Location: gestion-association-modifier.php');
            } else {
                echo '<script type="text/javascript">alert("Cette information n\'existe pas")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Veuillez remplir tous les champs")</script>';
        }
    }
}

$title = "Modifier une information";

require 'include/header-gestion.php';
?>
<script src="../js/script-information-modifier.js"></script>
<div class="formulaireInformation">
    <h2 class="titreFormulaire">Modifier une information</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <?php
        if ($oInformation != null) {
            ?>
            <p><label for="titre">Titre</label><input type="text" id="titre" name="titre" value="<?php echo $oInformation->Titre; ?>"/></p>
            <p><label for="description">Description</label><textarea name="description" id="description" rows="10"><?php echo $oInformation->Description; ?></textarea>
            <p><label for="image">Image</label><input type="text" readonly="readonly" value="<?php echo ($oInformation->IdentifiantImage != null) ? $oInformation->Image->Titre : "Pas d'image" ?>"/><input type="button" value="Modifier" id="modifierImageInformation"/></p>
            <p id="informationImage"><input type="file" name="imageFile"/></p>
            <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"/>
                <input type="button" value="Annuler" onclick="document.location.href = 'gestion-association-modifier.php'" />
            </p>
            <?php
        } else {
            echo '<script type="text/javascript">alert("Cette association n\'existe pas")</script>';
        }
        ?>
    </form>
</div>
<?php
require 'include/footer.php';
?>
