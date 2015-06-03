<?php
if (empty($_POST) == false) {
    if ((ctype_digit($_GET['id'])) == true AND $_POST['titre'] != "" AND $_POST['description'] != "") {
        $oAssociation = My_Orm_Association::find($_GET['id']);
        if ($oAssociation != null) {
            $oInformation = new My_Orm_Information();
            $oInformation->Titre = htmlspecialchars($_POST['titre']);
            $oInformation->Description = htmlspecialchars($_POST['description']);
            $oInformation->DatePublication = date('Y-m-d');
            $oInformation->IdentifiantAssociation = $oAssociation->Identifiant;

            //Ajout de l'image s'il y en a une 
            if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
                move_uploaded_file($_FILES['image']['tmp_name'], '../img/data/' . basename($_FILES['image']['name']));
                $oImage = new My_Orm_Image();
                $oImage->Titre = htmlspecialchars(basename($_FILES['image']['name']));
                $oImage->Chemin = htmlspecialchars('../img/data/' . $_FILES['image']['name']);
                $oImage->save();

                $oInformation->Image = $oImage;
            }

            $oInformation->save();

            header('Location: gestion-association-modifier.php');
        } else {
            echo '<script type="text/javascript">alert("Cette association n\'existe pas")</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Ajouter une information";

require 'include/header-gestion.php';
?>
<div class="formulaireInformation">
    <h2 class="titreFormulaire">Ajouter une information</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <p><label for="titre">Titre</label><input type="text" id="titre" name="titre"/></p>
        <p><label for="description">Description</label><textarea name="description" id="description" rows="10"></textarea>
        <p><label for="image">Image</label><input type="file" value="Parcourir" name="image"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/>
            <input type="button" value="Annuler" onclick="document.location.href = 'gestion-association-modifier.php'" />
        </p>
    </form>
</div>
<?php
require 'include/footer.php';
?>
