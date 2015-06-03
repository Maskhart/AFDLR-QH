<?php
// Controlle ici même
if (empty($_POST) == false) {
    if (empty($_POST['login']) == false) {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        //$passwordHach = sha1($password);
        //Verification en base de données
        $oUser = My_Orm_Administrateur::authentification($login, $password);

        if ($oUser != null) {
            header('Location: manager/home.php');
        } else {
            $ErrorLogin = "Login ou mot de passe invalide";
        }
    } else {
        $ErrorLogin = "Login ou mot de passe invalide";
    }
}
//My_Main::sessionUserDestroy();
$title = 'Connexion';

require "manager/include/header-connexion.php";
?>
<div class="connexion">
    <h1>Connexion</h1>
    <form method="post" action="">
        <p><label for="login">Login </label><input type="text" name="login" id="login"/></p>
        <p><label for="password">Mot de passe </label><input type="password" name="password" id="password"/></p>
            <?php
            if (isset($ErrorLogin) == true) {
                echo '<p class="error">'. $ErrorLogin . '</p>';
            }
            ?>
        <p><input type="submit" value="Se connecter"/></p>
    </form>
</div>
<?php
require "manager/include/footer.php";
?>