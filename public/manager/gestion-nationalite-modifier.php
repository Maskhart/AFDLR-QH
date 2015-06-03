<?php
if(empty($_POST) == false){
    if(isset($_POST['nationalites']) AND $_POST['libelleCourt'] != "" AND $_POST['libelleLong'] != ""){
        $oNationalite = My_Orm_Nationalite::find($_POST['nationalites']);
        if($oNationalite != null){
            $oNationalite->LibelleCourt = htmlspecialchars($_POST['libelleCourt']);
            $oNationalite->LibelleLong = htmlspecialchars($_POST['libelleLong']);
            $oNationalite->save();
        }
    }else{
        echo '<script type="text/javascript">alert("Veuillez remplir tous les champs svp")</script>';
    }
}

$title = "Modifier une nationalité";

$aNationalites = My_Orm_Nationalite::findAll();

require 'include/header-gestion.php';
?>
<script src="../js/script-nationalite.js"></script>
<div id="edit" class="formulaireParametre">
    <h1 class="titreFormulaire">Modifier une nationalité</h1>
    <form method="post" action="">
        <p><label for="nationalites">Choisir une nationalité</label>
            <select name="nationalites" id="nationalites">
                <?php
                if ($aNationalites != null) {
                    foreach ($aNationalites as $nationalite) {
                        echo '<option value="' . $nationalite->Identifiant . '">' . $nationalite->LibelleLong . '</option>';
                    }
                }
                ?>
            </select></p>
        <p><label for="libelleCourt">Libellé court</label><input type="text" id="libelleCourt" name="libelleCourt"/></p>
        <p><label for="libelleLong">Libellé long</label><input type="text" id="libelleLong" name="libelleLong"/></p>
        <p class="boutonValidationFormulaire"><input type="submit" value="Modifier"/></p>
    </form>
</div>
<?php
require 'include/footer.php';
?>


