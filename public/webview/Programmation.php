<?php
function formath($heure) 
{ 
    $tab = explode(":", $heure); 
    return ($tab[0].'h'.$tab[1]); 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/FrontOffice/Programmation.css"/>
        <script src="../js/jquery-1.11.2.min.js"></script>
        <script src="../js/script-progra.js"></script>
        <title></title>
    </head>
    <body>
        
        <div id="background"></div>
        <div class="subbody">
        <!-- Parametres : jours -->
            <div id="filtre">
                <a class="filtreJour" id="vendredi">Vendredi</a>
                <a class="filtreJour" id="samedi">Samedi</a>
            </div>
        <!-- Block progra scene-->
            <div id="progra">

            </div>
        </div>
    </body>
</html>
