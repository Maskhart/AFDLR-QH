<?php
$title = "Ajouter une association";
$telephone = "#^0[1-8]([-. ]?[0-9]{2}){4}$#";
$email = "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#";

if (empty($_POST) == false) {
    if ($_POST['nom'] != "" AND $_POST['description'] != "" AND $_POST['telephone'] != "" AND $_POST['email'] != "") {
        if (preg_match($telephone, $_POST['telephone'])) {
            if (preg_match($email, $_POST['email'])) {
                $oAssociation = new My_Orm_Association();
                $oAssociation->Libelle = htmlspecialchars($_POST['nom']);
                $oAssociation->Description = htmlspecialchars($_POST['description']);
                $oAssociation->Telephone = htmlspecialchars($_POST['telephone']);
                $oAssociation->Mail = htmlspecialchars($_POST['email']);
                $oAssociation->save();
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

require 'include/header-gestion.php';
?>
<div class="formulaireAjoutAssociation">
    <h1 class="titreFormulaire">Ajouter une association</h1>
    <form method="post" action="">
        <p><label for="nom">Nom</label><input type="text" id="nom" name="nom"/></p>
        <p><label for="description">Description</label><textarea name="description" id="description" rows="10"></textarea></p>
        <p><label for="telephone">Telephone</label><input type="tel" id="telephone" name="telephone"/></p>
        <p><label for="email">Email</label><input type="email" id="email" name="email" /></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Ajouter"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>

