<?php
if (empty($_POST) == false) {
    if ((ctype_digit($_GET['id'])) == true AND $_POST['titre'] != "" AND $_POST['description'] != "") {
        if ($_POST['date'] != null AND $_POST['benevole'] != "" AND $_POST['adresse'] != "" 
                ) {

            $oAssociation = My_Orm_Association::find($_GET['id']);
            if ($oAssociation != null) {
                $oAction = new My_Orm_Action();
                $oAction->Titre = htmlspecialchars($_POST['titre']);
                $oAction->Description = htmlspecialchars($_POST['description']);
                $oAction->DateAction = htmlspecialchars($_POST['date']);
                $oAction->NbBenevole = $_POST['benevole'];
                $oAction->IdentifiantAssociation = $oAssociation->Identifiant;

                //Ajout de l'image s'il y en a une 
                if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
                    move_uploaded_file($_FILES['image']['tmp_name'], '../img/data/' . basename($_FILES['image']['name']));
                    $oImage = new My_Orm_Image();
                    $oImage->Titre = htmlspecialchars(basename($_FILES['image']['name']));
                    $oImage->Chemin = htmlspecialchars('../img/data/' . $_FILES['image']['name']);
                    $oImage->save();

                    $oAction->Image = $oImage;
                }

                $oAdresse = new My_Orm_Adresse();
                $oAdresse->Numero = (int)$_POST['numero'];
                $oAdresse->Adresse = htmlspecialchars($_POST['adresse']);
                $oAdresse->CP = (int)$_POST['codePostal'];
                $oAdresse->Ville = htmlspecialchars($_POST['ville']);
                $oAdresse->save();

                $oAction->Adresse = $oAdresse;
                $oAction->save();

                header('Location: gestion-association-modifier.php');
            } else {
                echo '<script type="text/javascript">alert("Cette association n\'existe pas")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Ajouter une action";

require 'include/header-gestion.php';
?>
<div class="formulaireInformation">
    <h2 class="titreFormulaire">Ajouter une action</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <p><label for="titre">Titre</label><input type="text" id="titre" name="titre"/></p>
        <p><label for="description">Description</label><textarea name="description" id="description" rows="10"></textarea>
        <p><label for="date">Date</label><input type="date" id="date" name="date"/></p>
        <p><label for="benevole">Bénévoles</label><input type="number" id="benevole" name="benevole" min="0" max="1000"/></p>
        <p><label for="image">Image</label><input type="file" id="image" name="image"/></p>
        <p><label for="numero">Numéro</label><input type="number" id="numero" name="numero"/></p>
        <p><label for="adresse">Rue</label><input type="text" id="adresse" name="adresse"/></p>
        <p><label for="codePostal">Code postal</label><input type="number" id="codePostal" name="codePostal"/></p>
        <p><label for="ville">Ville</label><input type="text" id="ville" name="ville"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/>
            <input type="button" value="Annuler" onclick="document.location.href = 'gestion-association-modifier.php'" />
        </p>
    </form>
</div>
<?php
require 'include/footer.php';
?>
